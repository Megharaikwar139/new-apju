<?php
$pdo = new PDO('mysql:host=localhost;dbname=apju_custom_db;charset=utf8mb4', 'root', '');
$pdo->exec("UPDATE page_carousel SET image_path = 'assets/images/about.jpg' WHERE title = 'Why AKU'");
$pdo->exec("UPDATE page_carousel SET image_path = 'assets/images/facultywa.jpg' WHERE title = 'Faculty Welfare'");
$pdo->exec("UPDATE page_carousel SET image_path = 'assets/images/award1.jpg' WHERE title = 'Awards'");
$pdo->exec("UPDATE page_carousel SET image_path = 'assets/images/placement.jpg' WHERE title = 'Our Recruiters'");
$pdo->exec("UPDATE page_carousel SET image_path = 'assets/images/gallery.jpg' WHERE title = 'Gallery'");
echo 'Done';
?>
