<?php
$files = ['header.php', 'footer.php', 'index.php'];
$assetDir = __DIR__ . '/assets/live_assets';

if (!is_dir($assetDir)) {
    mkdir($assetDir, 0777, true);
}

function sanitizeFilename($url) {
    // Remove query string
    $url = strtok($url, '?');
    // Get basename
    $basename = basename($url);
    // Remove weird characters
    $basename = preg_replace('/[^a-zA-Z0-9_\.-]/', '', $basename);
    return $basename;
}

foreach ($files as $file) {
    if (!file_exists($file)) continue;
    
    $content = file_get_contents($file);
    
    // Match anything starting with https://aku.ac.in/ or https://aku.thetask.in/ inside src="" or href=""
    // e.g. href='https://aku.ac.in/wp-content/themes/aku/style.css?ver=1.0.0'
    $pattern = '/(?:src|href)=[\'"](https?:\/\/(?:aku\.ac\.in|aku\.thetask\.in)\/[^\'"]+)[\'"]/i';
    
    if (preg_match_all($pattern, $content, $matches)) {
        foreach ($matches[1] as $url) {
            $filename = sanitizeFilename($url);
            $localPath = "assets/live_assets/" . $filename;
            $absoluteLocalPath = $assetDir . '/' . $filename;
            
            // Download if it doesn't exist
            if (!file_exists($absoluteLocalPath)) {
                echo "Downloading: $url\n";
                // Suppress errors and try to download
                $fileContent = @file_get_contents(str_replace('&#038;', '&', $url));
                if ($fileContent !== false) {
                    file_put_contents($absoluteLocalPath, $fileContent);
                    echo "Saved to $localPath\n";
                } else {
                    echo "Failed to download $url\n";
                    continue; // Skip replacement if failed
                }
            } else {
                echo "Already exists: $localPath\n";
            }
            
            // Replace the URL in the file content
            $content = str_replace($url, $localPath, $content);
        }
    }
    
    file_put_contents($file, $content);
    echo "Updated $file\n";
}

// Special case: oEmbed links in header.php can just be removed or left alone since they are just meta tags
echo "Done.\n";
