<?php
$pdo = new PDO('mysql:host=localhost;dbname=apju_custom_db;charset=utf8mb4', 'root', '');

$stmt = $pdo->query("SELECT id, slug, content FROM pages");
$pages = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($pages as $page) {
    // Replace live URLs with local uploads folder path
    $new_content = str_replace('uploads/', 'uploads/', $page['content']);
    $new_content = str_replace('http://aku.ac.in/uploads/', 'uploads/', $new_content);

    // Also update any link tags if they point to live gallery URLs
    // e.g. href="https://aku.ac.in/galleries/..." 
    $new_content = str_replace('https://aku.ac.in/galleries/', 'gallery/', $new_content);
    $new_content = str_replace('http://aku.ac.in/galleries/', 'gallery/', $new_content);

    if ($new_content !== $page['content']) {
        $update = $pdo->prepare("UPDATE pages SET content = :content WHERE id = :id");
        $update->execute(['content' => $new_content, 'id' => $page['id']]);
        echo "Updated URLs for page: " . $page['slug'] . "\n";
    }
}
echo "Done replacing image paths.\n";
?>
