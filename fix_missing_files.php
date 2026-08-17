<?php
set_time_limit(0);

$baseDir = __DIR__;
$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($baseDir));

function cleanUrl($url) {
    $parts = explode('?', $url);
    $url = $parts[0];
    $parts = explode('#', $url);
    $url = $parts[0];
    return $url;
}

function downloadFile($sourceUrl, $destPath) {
    if (file_exists($destPath)) {
        return true;
    }
    $dir = dirname($destPath);
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
    
    // Set a very short timeout so we don't hang on 404s
    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
        "http" => array(
            "timeout" => 3
        )
    );  
    $content = @file_get_contents($sourceUrl, false, stream_context_create($arrContextOptions));
    
    if ($content !== false) {
        file_put_contents($destPath, $content);
        return true;
    }
    return false;
}

foreach ($files as $file) {
    if ($file->getExtension() === 'php') {
        $filename = $file->getFilename();
        if (in_array($filename, ['scraper.php', 'test_scrape.php', 'fix_missing_files.php', 'check_missing.php', 'download_assets.php', 'fix_gallery_images.php'])) {
            continue;
        }
        
        $content = file_get_contents($file->getPathname());
        $changed = false;
        
        // 1. Process absolute URLs
        $patternAbs = '/(?:src|href)=[\'"](https?:\/\/(?:www\.)?(?:aku\.ac\.in|aku\.thetask\.in)\/([^\'"]+))[\'"]/i';
        if (preg_match_all($patternAbs, $content, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $fullMatch = $match[0]; 
                $originalUrl = $match[1]; 
                $relativePath = $match[2]; 
                
                $cleanPath = cleanUrl($relativePath);
                $ext = strtolower(pathinfo($cleanPath, PATHINFO_EXTENSION));
                if (empty($ext) || in_array($ext, ['php', 'html'])) {
                    continue; 
                }
                
                if (strpos($cleanPath, 'wp-content/uploads/') === 0) {
                    $localPath = str_replace('wp-content/uploads/', 'uploads/', $relativePath);
                    $cleanLocalPath = str_replace('wp-content/uploads/', 'uploads/', $cleanPath);
                } else {
                    $localPath = 'uploads/' . $relativePath;
                    $cleanLocalPath = 'uploads/' . $cleanPath;
                }
                
                $absoluteLocalPath = $baseDir . '/' . $cleanLocalPath;
                
                if (!file_exists($absoluteLocalPath)) {
                    downloadFile(cleanUrl($originalUrl), $absoluteLocalPath);
                }
                
                // ALWAYS replace URL so we don't depend on live site
                $newAttr = str_replace($originalUrl, $localPath, $fullMatch);
                $content = str_replace($fullMatch, $newAttr, $content);
                $changed = true;
            }
        }
        
        // 2. Process local relative URLs that might be missing
        $patternRel = '/(?:src|href)=[\'"](uploads\/([^\'"]+))[\'"]/i';
        if (preg_match_all($patternRel, $content, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $originalUrl = $match[1]; 
                $relativePath = $match[2]; 
                
                $cleanUrl = cleanUrl($originalUrl);
                $absoluteLocalPath = $baseDir . '/' . $cleanUrl;
                
                if (!file_exists($absoluteLocalPath)) {
                    $sourceUrl = "https://aku.ac.in/wp-content/uploads/" . cleanUrl($relativePath);
                    if (!downloadFile($sourceUrl, $absoluteLocalPath)) {
                        $sourceUrl = "https://aku.thetask.in/wp-content/uploads/" . cleanUrl($relativePath);
                        downloadFile($sourceUrl, $absoluteLocalPath);
                    }
                }
            }
        }
        
        if ($changed) {
            file_put_contents($file->getPathname(), $content);
        }
    }
}
echo "Done.\n";
