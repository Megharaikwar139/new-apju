<?php
$pdo = new PDO('mysql:host=localhost;dbname=apju_custom_db;charset=utf8mb4', 'root', '');
$pdo->exec("
CREATE TABLE IF NOT EXISTS pages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    slug VARCHAR(255) UNIQUE,
    content TEXT,
    image_path VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
");
echo "Pages table created successfully.\n";
