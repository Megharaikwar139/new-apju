<?php
require 'db.php';

$cols = $pdo->query("DESCRIBE about_pages_config")->fetchAll(PDO::FETCH_ASSOC);
echo "Columns in about_pages_config:\n";
foreach ($cols as $c) {
    echo " - " . $c['Field'] . "\n";
}

$exists = $pdo->prepare("SELECT id FROM about_pages_config WHERE page_slug = 'sponsoring-body'");
$exists->execute();
$row = $exists->fetch();

if (!$row) {
    $stmt = $pdo->prepare("
        INSERT INTO about_pages_config (
            page_slug, page_title, hero_eyebrow, hero_subtitle, leader_name, leader_designation,
            badge_text, quote, main_content, image_path, doc_file_1, doc_title_1
        ) VALUES (
            'sponsoring-body',
            'Sponsoring Body',
            'FOUNDING SOCIETY & GOVERNANCE',
            'Ayushmati Education and Social Society · Established under M.P. Society Registrikaran Adhiniyam',
            'Dr. Sunil Kapoor',
            'Chairman & Founder Trustee',
            'FOUNDING TRUST 1999',
            'Empowering generations through quality education, scientific research, and technological distinction across Central India.',
            'The Ayushmati Education and Social Society is the statutory Sponsoring Body of Dr. A.P.J. Abdul Kalam University, Indore. Registered in 1999 under the Madhya Pradesh Society Registrikaran Adhiniyam, the society holds a pioneering track record in creating benchmark technical, medical, and higher education institutions in Central India.',
            'assets/lovable/aku-logo.jpeg',
            'uploads/2025/04/Gazetted_Notification.pdf',
            'Official M.P. Government Gazette Notification (Establishment by Sponsoring Body)'
        )
    ");
    $stmt->execute();
    echo "Inserted 'sponsoring-body' record into about_pages_config successfully!\n";
} else {
    echo "'sponsoring-body' already exists in about_pages_config!\n";
}
