<?php
require 'db.php';
$stmt = $pdo->prepare("SELECT content FROM events WHERE slug = ?");
$stmt->execute(['techfest-2025-national-level-technical-symposium']);
echo $stmt->fetchColumn();