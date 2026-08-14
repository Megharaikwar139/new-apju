<?php
$pdo = new PDO('mysql:host=localhost;dbname=apju_custom_db;charset=utf8mb4', 'root', '');
$stmt = $pdo->query('SELECT slug, LENGTH(content) FROM pages');
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($res);
?>
