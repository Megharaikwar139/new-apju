<?php
require_once 'db.php';
$stmt = $pdo->prepare("SELECT * FROM pages WHERE slug LIKE '%award%' OR title LIKE '%award%'");
$stmt->execute();
$pages = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "=== PAGES ===\n";
print_r($pages);

$stmt2 = $pdo->prepare("SELECT * FROM posts WHERE slug LIKE '%award%' OR title LIKE '%award%'");
$stmt2->execute();
$posts = $stmt2->fetchAll(PDO::FETCH_ASSOC);
echo "=== POSTS ===\n";
print_r($posts);
