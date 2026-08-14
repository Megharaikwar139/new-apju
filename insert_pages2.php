<?php
$pdo = new PDO('mysql:host=localhost;dbname=apju_custom_db;charset=utf8mb4', 'root', '');

function extract_content($file) {
    if (!file_exists($file)) return "";
    $html = file_get_contents($file);
    if (preg_match('/<div class="site-main"[^>]*>(.*?)<\/div><!-- #main -->/is', $html, $matches)) {
        return $matches[1];
    } else if (preg_match('/<div class="vc_row wpb_row vc_row-fluid[^>]*>(.*?)<\/footer>/is', $html, $matches)) {
        return '<div class="vc_row wpb_row vc_row-fluid">' . $matches[1];
    }
    return "";
}

$pages = [
    [
        'title' => 'Gallery',
        'slug' => 'gallery',
        'file' => 'page_gallery.html'
    ],
    [
        'title' => 'Awards & Recognition',
        'slug' => 'awardsand-recognigation', // Yes, this is the exact slug used on the live site
        'file' => 'page_awards.html'
    ],
    [
        'title' => 'Faculty Welfare',
        'slug' => 'faculty-welfare',
        'file' => 'page_faculty.html'
    ]
];

foreach ($pages as $p) {
    $content = extract_content($p['file']);
    $stmt = $pdo->prepare("INSERT INTO pages (title, slug, content) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE content = VALUES(content)");
    $stmt->execute([$p['title'], $p['slug'], $content]);
}
echo "Remaining pages inserted.\n";
?>
