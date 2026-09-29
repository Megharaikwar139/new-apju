<?php
$c = @file_get_contents('http://localhost/new-apju/sponsoring-body.php');
if ($c && strpos($c, 'Ayushmati Education and Social Society') !== false) {
    echo "SUCCESS: sponsoring-body.php loaded with full content! Total Length: " . strlen($c) . " bytes\n";
    if (strpos($c, 'about-sidebar.php') !== false || strpos($c, 'ABOUT US') !== false) {
        echo "Sidebar: About Us sidebar rendered on page!\n";
    }
    if (strpos($c, 'Gazetted_Notification.pdf') !== false) {
        echo "Gazette: Government Gazette document and preview modal button rendered!\n";
    }
} else {
    echo "FAILED: Could not find content or HTTP failed.\n";
    echo substr($c, 0, 500) . "\n";
}
