<?php
$pdo = new PDO('mysql:host=localhost;dbname=apju_custom_db;charset=utf8mb4', 'root', '');
$stmt = $pdo->query("SELECT * FROM media_coverage");
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
