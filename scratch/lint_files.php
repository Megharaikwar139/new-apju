<?php
$files = [
    'about-sidebar.php', 'admission-sidebar.php', 'exam-sidebar.php', 'committee-sidebar.php',
    'placement-sidebar.php', 'research-sidebar.php', 'student-sidebar.php', 'campus-sidebar.php',
    'the-pro-vice-chancellor.php', 'ugc-recognition.php', 'world-class-infrastructure.php',
    'upcoming-events-and-news.php', 'academic-calendar.php', 'fees-details.php',
    'apply-now.php', 'admission-assistance.php', 'admission-procedure.php',
    'admission-committee.php', 'department-intake.php', 'faqs.php',
    'general-rules-and-regulations.php', 'hostel-rules-regulations.php',
    'scholarships.php', 'download-form.php', 'payment-terms.php',
    'refund-cancellation.php', 'single.php', 'header.php'
];

$allPassed = true;
foreach ($files as $f) {
    $out = [];
    $ret = 0;
    exec('C:\\xampp\\php\\php.exe -l ' . escapeshellarg(__DIR__ . '/../' . $f), $out, $ret);
    if ($ret !== 0) {
        echo "FAIL: $f\n";
        echo implode("\n", $out) . "\n";
        $allPassed = false;
    }
}

if ($allPassed) {
    echo "SUCCESS: All " . count($files) . " modified files passed PHP syntax validation perfectly!\n";
}
