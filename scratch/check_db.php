<?php
require 'db.php';
$rows = $pdo->query("SELECT * FROM about_pages_config")->fetchAll(PDO::FETCH_ASSOC);
echo "=== about_pages_config ===\n";
foreach ($rows as $r) {
    echo "Slug: " . $r['page_slug'] . " | Title: " . $r['page_title'] . "\n";
}

$pages = $pdo->query("SELECT id, title, slug FROM pages")->fetchAll(PDO::FETCH_ASSOC);
echo "\n=== pages table ===\n";
foreach ($pages as $p) {
    echo "ID: " . $p['id'] . " | Slug: " . $p['slug'] . " | Title: " . $p['title'] . "\n";
}
