<?php
$pdo = new PDO('mysql:host=localhost;dbname=apju_custom_db;charset=utf8mb4', 'root', '');
$stmt = $pdo->query("SELECT SUBSTRING(content, 1, 1000) FROM pages WHERE slug='our-recruiters'");
echo $stmt->fetchColumn();
?>
