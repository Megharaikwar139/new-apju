<?php
require_once 'db.php';

function scrapeAndSave($url, $savePath, $depth) {
    $html = @file_get_contents($url);
    if (!$html) {
        echo "Failed to download $url\n";
        return;
    }
    
    if (preg_match('/<div id="page" class="site-main">(.*?)<footer id="colophon"/s', $html, $matches)) {
        $content = $matches[1];
        
        $prefix = str_repeat('../', $depth);
        
        // Replace URLs
        $content = str_replace([
            'https://aku.thetask.in/wp-content/uploads/',
            'https://aku.ac.in/wp-content/uploads/',
            '../wp-content/uploads/',
            'wp-content/uploads/',
            'https://aku.ac.in/wp-content/themes/aku/assets/img/',
            'https://aku.ac.in/wp-content/themes/aku/assets/images/',
            'https://aku.ac.in/'
        ], [
            $prefix . 'uploads/',
            $prefix . 'uploads/',
            $prefix . 'uploads/',
            $prefix . 'uploads/',
            $prefix . 'assets/images/',
            $prefix . 'assets/images/',
            $prefix
        ], $content);
        
        $final = "<?php include '{$prefix}header.php'; ?>\n<div id=\"page\" class=\"site-main\">\n" . $content . "\n</div>\n<?php include '{$prefix}footer.php'; ?>";
        
        $dir = dirname($savePath);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        
        file_put_contents($savePath, $final);
        echo "Successfully scraped: $url -> $savePath\n";
    } else {
        echo "Could not find main content block for $url\n";
    }
}

// 1. Events
$stmt = $pdo->query("SELECT slug FROM events");
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($events as $event) {
    $slug = $event['slug'];
    $url = "https://aku.ac.in/event/" . $slug . "/";
    $savePath = "event/" . $slug . "/index.php";
    scrapeAndSave($url, $savePath, 2);
}

// 2. Notices
$stmt = $pdo->query("SELECT slug FROM notices");
$notices = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($notices as $notice) {
    $slug = $notice['slug'];
    $url = "https://aku.ac.in/notice-board/" . $slug . "/";
    $savePath = "notice-board/" . $slug . "/index.php";
    scrapeAndSave($url, $savePath, 2);
}

echo "Scraping complete.\n";