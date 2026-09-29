<?php
$header = file_get_contents(__DIR__ . '/../header.php');

// Extract submenus from header.php
// 1. About Us
preg_match('/<!-- 1\. About Us Dropdown.*?<div class="dropdown-menu.*?>(.*?)<!-- 2\. Faculty Mega Menu/s', $header, $mAbout);
preg_match_all('/href="([^"]+)"[^>]*>(?:<i[^>]*><\/i>)?\s*([^<]+)<\/a>/i', $mAbout[1] ?? '', $aboutLinks);

// 2. Examination
preg_match('/<!-- 4\. Examination Dropdown.*?<ul class="dropdown-menu.*?>(.*?)<\/ul>/s', $header, $mExam);
preg_match_all('/href="([^"]+)"[^>]*>(?:<i[^>]*><\/i>)?\s*([^<]+)<\/a>/i', $mExam[1] ?? '', $examLinks);

// 3. Committees
preg_match('/<!-- 5\. Committees Dropdown.*?<ul class="dropdown-menu.*?>(.*?)<\/ul>/s', $header, $mComm);
preg_match_all('/href="([^"]+)"[^>]*>(?:<i[^>]*><\/i>)?\s*([^<]+)<\/a>/i', $mComm[1] ?? '', $commLinks);

// 4. Admissions
preg_match('/<!-- 6\. Admissions Dropdown.*?<ul class="dropdown-menu.*?>(.*?)<\/ul>/s', $header, $mAdm);
preg_match_all('/href="([^"]+)"[^>]*>(?:<i[^>]*><\/i>)?\s*([^<]+)<\/a>/i', $mAdm[1] ?? '', $admLinks);

// 5. Placements
preg_match('/<!-- 7\. Placements Dropdown.*?<ul class="dropdown-menu.*?>(.*?)<\/ul>/s', $header, $mPlace);
preg_match_all('/href="([^"]+)"[^>]*>(?:<i[^>]*><\/i>)?\s*([^<]+)<\/a>/i', $mPlace[1] ?? '', $placeLinks);

// 6. Research
preg_match('/<!-- 8\. Research Dropdown.*?<ul class="dropdown-menu.*?>(.*?)<\/ul>/s', $header, $mRes);
preg_match_all('/href="([^"]+)"[^>]*>(?:<i[^>]*><\/i>)?\s*([^<]+)<\/a>/i', $mRes[1] ?? '', $resLinks);

// 7. Student Zone
preg_match('/<!-- 9\. Student Zone Dropdown.*?<ul class="dropdown-menu.*?>(.*?)<\/ul>/s', $header, $mStud);
preg_match_all('/href="([^"]+)"[^>]*>(?:<i[^>]*><\/i>)?\s*([^<]+)<\/a>/i', $mStud[1] ?? '', $studLinks);

// 8. Event
preg_match('/<!-- 10\. Event Dropdown.*?<ul class="dropdown-menu.*?>(.*?)<\/ul>/s', $header, $mEvent);
preg_match_all('/href="([^"]+)"[^>]*>(?:<i[^>]*><\/i>)?\s*([^<]+)<\/a>/i', $mEvent[1] ?? '', $eventLinks);

function checkSidebar($sidebarFile, $headerUrls, $title) {
    echo "========================================\n";
    echo "CHECKING: {$title} ({$sidebarFile})\n";
    echo "Header URLs count: " . count($headerUrls) . "\n";
    $content = file_get_contents(__DIR__ . '/../' . $sidebarFile);
    preg_match_all('/href="<\?php echo \$url; \?>"|href="([^"]+)"/i', $content, $m);
    
    // Check array keys
    preg_match_all('/\'([^\'"]+\.php|https?:\/\/[^\'"]+)\'\s*=>/i', $content, $mKeys);
    $sidebarUrls = $mKeys[1];
    echo "Sidebar URLs count: " . count($sidebarUrls) . "\n";
    
    $missingInSidebar = array_diff($headerUrls, $sidebarUrls);
    $extraInSidebar = array_diff($sidebarUrls, $headerUrls);
    
    if (empty($missingInSidebar) && empty($extraInSidebar)) {
        echo "[PERFECT MATCH 100%]\n";
    } else {
        if (!empty($missingInSidebar)) {
            echo "  Missing in sidebar: " . implode(', ', $missingInSidebar) . "\n";
        }
        if (!empty($extraInSidebar)) {
            echo "  Extra in sidebar: " . implode(', ', $extraInSidebar) . "\n";
        }
    }
    echo "\n";
}

checkSidebar('about-sidebar.php', $aboutLinks[1], 'About Us');
checkSidebar('admission-sidebar.php', $admLinks[1], 'Admissions');
checkSidebar('exam-sidebar.php', $examLinks[1], 'Examination');
checkSidebar('committee-sidebar.php', $commLinks[1], 'Committees');
checkSidebar('placement-sidebar.php', $placeLinks[1], 'Placements');
checkSidebar('research-sidebar.php', $resLinks[1], 'Research');
checkSidebar('student-sidebar.php', $studLinks[1], 'Student Zone');
checkSidebar('campus-sidebar.php', $eventLinks[1], 'Event');
