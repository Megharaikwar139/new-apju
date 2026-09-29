<?php
require 'db.php';

$exists = $pdo->prepare("SELECT id FROM about_pages_config WHERE page_slug = 'academic-council'");
$exists->execute();
$row = $exists->fetch();

if (!$row) {
    $stmt = $pdo->prepare("
        INSERT INTO about_pages_config (
            page_slug, page_title, hero_eyebrow, hero_subtitle, leader_name, leader_designation,
            badge_text, quote, main_content, image_path, doc_file_1, doc_title_1
        ) VALUES (
            'academic-council',
            'Academic Council',
            'STATUTORY ACADEMIC GOVERNANCE',
            'Apex Academic Authority · Dr. A.P.J. Abdul Kalam University, Indore',
            'Vice Chancellor',
            'Chairman, Academic Council',
            'STATUTORY COUNCIL',
            'Fostering pedagogical excellence, outcome-based curricula, high-impact research, and global academic standards across all university disciplines.',
            'The Academic Council is the apex statutory academic body of Dr. A.P.J. Abdul Kalam University, Indore, constituted under Section 23 of the Madhya Pradesh Niji Vishwavidyalaya (Sthapana Avam Sanchalan) Adhiniyam, 2007. It is responsible for the maintenance of standards of education, teaching, research, and examination in the University. The Council exercises overall supervision over all academic curricula, syllabi formulation, credit frameworks, semester evaluation schemes, and admission regulations.',
            'assets/lovable/aku-logo.jpeg',
            'uploads/2025/06/ACADEMIC-COUNCIL_2024-25.pdf',
            'Official Academic Council Notification & Statutory Members Roster'
        )
    ");
    $stmt->execute();
    echo "Inserted 'academic-council' into about_pages_config successfully!\n";
} else {
    echo "'academic-council' already exists in about_pages_config!\n";
}
