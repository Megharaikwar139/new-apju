<?php
$host = 'localhost';
$db   = 'apju_custom_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Create tables
$pdo->exec("
    CREATE TABLE IF NOT EXISTS banners (
        id INT AUTO_INCREMENT PRIMARY KEY,
        image_path VARCHAR(255) NOT NULL,
        title VARCHAR(255) DEFAULT NULL,
        sort_order INT DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE IF NOT EXISTS stats_counter (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        value VARCHAR(50) NOT NULL,
        sort_order INT DEFAULT 0
    );

    CREATE TABLE IF NOT EXISTS page_carousel (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        content TEXT,
        image_path VARCHAR(255),
        link_url VARCHAR(255),
        sort_order INT DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
");

// Insert initial data if empty
// Banners
$bannerCount = $pdo->query("SELECT COUNT(*) FROM banners")->fetchColumn();
if ($bannerCount == 0) {
    $pdo->exec("
        INSERT INTO banners (image_path, sort_order) VALUES 
        ('assets/images/home-slider01.jpg', 1)
    ");
}

// Stats
$statsCount = $pdo->query("SELECT COUNT(*) FROM stats_counter")->fetchColumn();
if ($statsCount == 0) {
    $pdo->exec("
        INSERT INTO stats_counter (title, value, sort_order) VALUES 
        ('Years', '10', 1),
        ('Courses', '51', 2),
        ('Students', '3,000', 3),
        ('Company Visits', '240+', 4),
        ('Student Placed', '240+', 5)
    ");
}

// Page Carousel
$carouselCount = $pdo->query("SELECT COUNT(*) FROM page_carousel")->fetchColumn();
if ($carouselCount == 0) {
    $pdo->exec("
        INSERT INTO page_carousel (title, content, image_path, link_url, sort_order) VALUES 
        ('Why AKU', 'Our Faculty-to-Student Ratio allows faculties to focus on the individual learning styles and needs of each student in our University.', 'assets/images/slider1.jpg', 'why-aku/', 1),
        ('Faculty Welfare', 'Our Faculty-to-Student Ratio allows faculties to focus on the individual learning styles and needs of each student in our University.', 'assets/images/Welfare.jpg', 'faculty-welfare/', 2),
        ('Awards', 'Our Faculty-to-Student Ratio allows faculties to focus on the individual learning styles and needs of each student in our University.', 'assets/images/awards.jpg', 'awards/', 3),
        ('Our Recruiters', 'Our Faculty-to-Student Ratio allows faculties to focus on the individual learning styles and needs of each student in our University.', 'assets/images/placement.jpg', 'our-recruiters/', 4),
        ('Gallery', 'Our Faculty-to-Student Ratio allows faculties to focus on the individual learning styles and needs of each student in our University.', 'assets/images/gallery.jpg', 'gallery/', 5)
    ");
}

// Insert Welcome text settings if not exists
$settingsCheck = $pdo->query("SELECT COUNT(*) FROM settings WHERE setting_key = 'welcome_title'")->fetchColumn();
if ($settingsCheck == 0) {
    $pdo->exec("
        INSERT INTO settings (setting_key, setting_value) VALUES 
        ('welcome_title', 'Welcome to <br><span>Dr. A. P. J. Abdul Kalam University</span>'),
        ('welcome_content', '<p>Dr. A. P. J. Abdul Kalam University is located in a lush green environment on the Indore–Dewas bypass road, approximately 10 km from Indore Railway Station. The University boasts a spacious campus and one of the finest infrastructures in the state.</p><p>The University is supported by highly experienced faculty members and department heads who are committed to imparting quality education and nurturing responsible citizens with strong ethical values and professional competence.</p><p>Established in 2004 under the Ayushmati Education and Social Society, the University has consistently promoted excellence in teaching, research, and academic innovation, emerging as a benchmark institution in central India.</p>'),
        ('welcome_image', 'assets/images/New-Dron-Campus-Pic01-1.jpg')
    ");
}

echo "Tables created and seeded successfully.\n";
