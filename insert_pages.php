<?php
$pdo = new PDO('mysql:host=localhost;dbname=apju_custom_db;charset=utf8mb4', 'root', '');

// Helper to extract content
function extract_content($file) {
    if (!file_exists($file)) return "";
    $html = file_get_contents($file);
    // Usually the main content is inside <div class="container"> or a specific wrapper
    // For now, let's extract the main inner content or just the HTML
    // WPBakery page builder wraps things in .wpb_wrapper or vc_row
    // Let's just try to extract the main content container
    if (preg_match('/<div class="site-main"[^>]*>(.*?)<\/div><!-- #main -->/is', $html, $matches)) {
        return $matches[1];
    } else if (preg_match('/<div class="vc_row wpb_row vc_row-fluid[^>]*>(.*?)<\/footer>/is', $html, $matches)) {
        return '<div class="vc_row wpb_row vc_row-fluid">' . $matches[1];
    }
    return "";
}

$pages = [
    [
        'title' => 'Why AKU',
        'slug' => 'why-aku',
        'file' => 'page_why_aku.html'
    ],
    [
        'title' => 'Our Recruiters',
        'slug' => 'our-recruiters',
        'file' => 'page_recruiters.html'
    ]
];

foreach ($pages as $p) {
    $content = extract_content($p['file']);
    $stmt = $pdo->prepare("INSERT INTO pages (title, slug, content) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE content = VALUES(content)");
    $stmt->execute([$p['title'], $p['slug'], $content]);
}
echo "Pages inserted.\n";
?>
