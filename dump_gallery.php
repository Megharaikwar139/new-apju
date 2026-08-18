<?php
$pdo = new PDO('mysql:host=localhost;dbname=apju_custom_db;charset=utf8mb4', 'root', '');
$stmt = $pdo->query("SELECT content FROM pages WHERE slug='gallery'");
$content = $stmt->fetchColumn();
file_put_contents('gallery_content.txt', $content);
?>
