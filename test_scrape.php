<?php
$url = "https://aku.ac.in/event/techfest-2025-national-level-technical-symposium/";
$html = file_get_contents($url);

if (preg_match('/<div id="page" class="site-main">(.*?)<footer id="colophon"/s', $html, $matches)) {
    $content = $matches[1];
    
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
        '../uploads/',
        '../uploads/',
        '../uploads/',
        '../uploads/',
        '../assets/images/',
        '../assets/images/',
        '../'
    ], $content);
    
    $final = "<?php include '../header.php'; ?>\n<div id=\"page\" class=\"site-main\">\n" . $content . "\n</div>\n<?php include '../footer.php'; ?>";
    @mkdir('event/techfest-2025-national-level-technical-symposium', 0777, true);
    file_put_contents('event/techfest-2025-national-level-technical-symposium/index.php', $final);
    echo "Scraped successfully! Length: " . strlen($content);
} else {
    echo "Failed to match.";
}