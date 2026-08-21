<?php
require_once "db.php";

$currentDeptSlug = basename($_SERVER['PHP_SELF'], '.php');
if (isset($_GET['dept'])) {
    $currentDeptSlug = trim($_GET['dept']);
}

// 1. Fetch Department Info from DB
$deptStmt = $pdo->prepare("SELECT * FROM departments WHERE slug = ? AND status = 1 LIMIT 1");
$deptStmt->execute([$currentDeptSlug]);
$dept = $deptStmt->fetch();

$pageTitle = $dept['name'] ?? ucwords(str_replace('-', ' ', $currentDeptSlug));
$facultyGroupTitle = $dept['faculty_group'] ?? 'FACULTY OF ENGINEERING & TECHNOLOGY';
$heroSubtitle = $dept['hero_subtitle'] ?? 'Dr. A.P.J. Abdul Kalam University · Indore, Madhya Pradesh';

// 2. Fetch Active Tabs for this Department from DB
$tabsStmt = $pdo->prepare("SELECT * FROM department_tabs WHERE department_slug = ? AND status = 1 ORDER BY sort_order ASC, id ASC");
$tabsStmt->execute([$currentDeptSlug]);
$dbTabs = $tabsStmt->fetchAll();

// 3. Helper layout functions
function renderDepartmentTabPane($tab, $deptSlug, $pdo) {
    $title = $tab['tab_title'];
    $rawContent = $tab['tab_content'];
    
    // Faculty & Staff Profile (100% Dynamic from department_faculty table)
    if (stripos($title, 'Faculty') !== false || stripos($title, 'Staff') !== false) {
        $facultyStmt = $pdo->prepare("SELECT * FROM department_faculty WHERE department_slug = ? AND status = 1 ORDER BY sort_order ASC, id ASC");
        $facultyStmt->execute([$deptSlug]);
        $facultyList = $facultyStmt->fetchAll();
        
        if (!empty($facultyList)) {
            $out = '<div class="row g-3 g-md-4 my-2">';
            foreach ($facultyList as $f) {
                $hasImg = (!empty($f['image_path']) && file_exists($f['image_path']));
                $imgMarkup = $hasImg 
                    ? '<div class="position-relative d-inline-block mb-3">
                         <img src="' . htmlspecialchars($f['image_path']) . '" alt="' . htmlspecialchars($f['faculty_name']) . '" class="rounded-circle border border-custom shadow-xs" style="width: 80px; height: 80px; object-fit: cover;" onerror="this.style.display=\'none\'; this.nextElementSibling.style.display=\'flex\';">
                         <div class="d-none rounded-circle bg-primary bg-opacity-10 align-items-center justify-content-center border border-custom shadow-xs mx-auto" style="width: 80px; height: 80px;"><i class="fa-solid fa-user-graduate text-primary fs-3"></i></div>
                       </div>'
                    : '<div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center border border-custom shadow-xs mb-3" style="width: 80px; height: 80px;"><i class="fa-solid fa-user-graduate text-primary fs-3"></i></div>';
                
                $detailsArr = [];
                if (!empty($f['designation'])) $detailsArr[] = $f['designation'];
                if (!empty($f['qualification'])) $detailsArr[] = $f['qualification'];
                if (!empty($f['experience'])) $detailsArr[] = $f['experience'];
                $detailsStr = implode(" ", $detailsArr);
                
                $out .= '
                <div class="col-sm-6 col-lg-4">
                    <div class="p-4 rounded-4 border border-custom bg-white shadow-xs h-100 text-center d-flex flex-column align-items-center justify-content-between hover-shadow transition-all" style="transition: all 0.25s ease;">
                        ' . $imgMarkup . '
                        <div>
                            <h4 class="font-serif text-primary fs-6 fw-bold mb-1">' . htmlspecialchars($f['faculty_name']) . '</h4>
                            <p class="text-muted-custom small mb-0" style="font-size: 0.82rem; line-height: 1.45;">' . htmlspecialchars($detailsStr) . '</p>
                        </div>
                    </div>
                </div>';
            }
            $out .= '</div>';
            return $out;
        } else {
            return '<div class="text-center py-4 text-muted"><i class="fa-solid fa-user-graduate fs-2 text-primary opacity-50 mb-2 d-block"></i><p class="small mb-0">Department faculty profiles will be updated shortly.</p></div>';
        }
    }
    
    $out = '';
    // Vision & Mission Layout
    if (stripos($title, 'Vision') !== false) {
        $out = formatVisionMissionTab($rawContent);
    }
    // Dean / Principal / HOD Message Layout
    elseif (stripos($title, 'Dean') !== false || stripos($title, 'Principal') !== false || stripos($title, 'HOD') !== false) {
        $out = formatDeanMessageTab($rawContent, $title);
    }
    // Events & News Layout
    elseif (stripos($title, 'Event') !== false || stripos($title, 'News') !== false) {
        $out = formatEventsTab($rawContent);
    }
    // Standard Content (Tables, HTML, Highlights)
    else {
        $clean = $rawContent;
        if (stripos($clean, 'table-responsive') === false) {
            $clean = preg_replace('/(<table[^>]*>.*?<\/table>)/is', '<div class="table-responsive rounded-3 border border-custom overflow-hidden shadow-sm my-3">$1</div>', $clean);
        }
        $out = $clean;
    }
    
    libxml_use_internal_errors(true);
    $doc = new DOMDocument();
    $doc->loadHTML('<?xml encoding="utf-8" ?><div id="pane-dom-root">' . $out . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();
    $root = $doc->getElementById('pane-dom-root');
    $balanced = '';
    if ($root) {
        foreach ($root->childNodes as $child) {
            $balanced .= $doc->saveHTML($child);
        }
    }
    return empty($balanced) ? $out : $balanced;
}

function formatVisionMissionTab($rawContent) {
    preg_match_all('/<img[^>]*src="([^"]*)"/i', $rawContent, $imgMatches);
    $images = $imgMatches[1] ?? [];
    $visionImg = 'uploads/2025/06/vissio11-150x150.jpg';
    $missionImg = 'uploads/2025/06/mission11-150x150.jpg';
    
    foreach ($images as $img) {
        if (stripos($img, 'vissio') !== false || stripos($img, 'vision') !== false) $visionImg = $img;
        elseif (stripos($img, 'mission') !== false) $missionImg = $img;
    }
    
    preg_match_all('/<div class="[^"]*(vision-box|mission-box|wpb_text_column)[^"]*"[^>]*>(.*?)<\/div>\s*<\/div>/is', $rawContent, $boxMatches);
    $visionText = '';
    $missionText = '';
    
    if (count($boxMatches[2]) >= 2) {
        $visionText = cleanVMParagraphs($boxMatches[2][0]);
        $missionText = cleanVMParagraphs($boxMatches[2][1]);
    } else {
        preg_match_all('/<p[^>]*>(.*?)<\/p>/is', $rawContent, $pMatches);
        if (count($pMatches[1]) >= 2) {
            $visionText = '<p>' . trim($pMatches[1][0]) . '</p>';
            $missionText = '<p>' . trim($pMatches[1][1]) . '</p>';
        }
    }
    if (empty($visionText)) $visionText = '<p>To promote excellence in design, research, technical education, and societal impact.</p>';
    if (empty($missionText)) $missionText = '<p>To provide quality technical education in fundamentals and modern industrial applications.</p>';
    
    return '
    <div class="vision-mission-wrapper d-flex flex-column gap-4 my-2">
        <div class="p-4 rounded-4 border border-custom bg-white shadow-sm">
            <div class="row g-4 align-items-center">
                <div class="col-md-3 text-center">
                    <div class="d-inline-block p-2 rounded-circle bg-light border border-custom shadow-xs mb-2">
                        <img src="' . htmlspecialchars($visionImg) . '" alt="Vision" class="rounded-circle img-fluid" style="width: 115px; height: 115px; object-fit: cover;" onerror="this.onerror=null;this.src=\'assets/images/logo.png\';">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="eyebrow-label text-primary mb-1" style="font-size: 0.72rem; letter-spacing: 0.12em;"><i class="fa-solid fa-eye text-gold me-1.5"></i> FUTURE PERSPECTIVE</div>
                    <h3 class="font-serif text-primary fs-4 fw-bold mb-3">Our Vision</h3>
                    <div class="lh-lg" style="color: #443738; font-size: 0.95rem;">' . $visionText . '</div>
                </div>
            </div>
        </div>
        <div class="p-4 rounded-4 border border-custom bg-white shadow-sm">
            <div class="row g-4 align-items-center">
                <div class="col-md-3 text-center">
                    <div class="d-inline-block p-2 rounded-circle bg-light border border-custom shadow-xs mb-2">
                        <img src="' . htmlspecialchars($missionImg) . '" alt="Mission" class="rounded-circle img-fluid" style="width: 115px; height: 115px; object-fit: cover;" onerror="this.onerror=null;this.src=\'assets/images/logo.png\';">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="eyebrow-label text-primary mb-1" style="font-size: 0.72rem; letter-spacing: 0.12em;"><i class="fa-solid fa-bullseye text-gold me-1.5"></i> PURPOSE & STRATEGY</div>
                    <h3 class="font-serif text-primary fs-4 fw-bold mb-3">Our Mission</h3>
                    <div class="lh-lg" style="color: #443738; font-size: 0.95rem;">' . $missionText . '</div>
                </div>
            </div>
        </div>
    </div>';
}

function cleanVMParagraphs($raw) {
    $raw = preg_replace('/<h[1-6][^>]*>.*?<\/h[1-6]>/is', '', $raw);
    $raw = preg_replace('/<div[^>]*>|<\/div>/is', '', $raw);
    $raw = preg_replace('/<p>&nbsp;<\/p>|<p>\s*<\/p>/i', '', $raw);
    return trim($raw);
}

function formatDeanMessageTab($panelHtml, $title) {
    $hasCol3 = preg_match('/<div\s+class="[^"]*col-sm-3[^"]*">(.*?)<\/div>\s*<\/div>\s*<\/div>/is', $panelHtml, $col1);
    $hasCol9 = preg_match('/<div\s+class="[^"]*col-sm-9[^"]*">(.*?)<\/div>\s*<\/div>\s*<\/div>/is', $panelHtml, $col2);
    
    $profileClean = '';
    $messageClean = '';
    
    if ($hasCol3 && $hasCol9) {
        $profileClean = trim(strip_tags($col1[1], '<p><br><strong><b><em><ul><li>'));
        $messageClean = trim(strip_tags($col2[1], '<p><br><strong><b><em><ul><li>'));
    } else {
        $messageClean = trim(strip_tags($panelHtml, '<p><br><strong><b><em><ul><li>'));
    }
    
    $profileClean = preg_replace('/<p>&nbsp;<\/p>|<p>\s*<\/p>/i', '', $profileClean);
    $messageClean = preg_replace('/<p>&nbsp;<\/p>|<p>\s*<\/p>/i', '', $messageClean);
    $messageClean = preg_replace('/<p[^>]*>/i', '<p class="mb-2" style="margin-bottom: 0.85rem; line-height: 1.75; color: #3c3031;">', $messageClean);
    
    $avatarMarkup = '<div class="rounded-4 bg-light border border-custom d-flex flex-column align-items-center justify-content-center p-3 mb-3 shadow-xs">
                        <div class="rounded-circle bg-white p-3 shadow-xs mb-2 border border-custom d-flex align-items-center justify-content-center" style="width: 65px; height: 65px;">
                            <i class="fa-solid fa-user-tie text-primary fs-2"></i>
                        </div>
                        <span class="badge rounded-pill bg-gold text-dark fw-bold px-2.5 py-0.5" style="font-size: 0.7rem;">Leadership Desk</span>
                     </div>';
    
    if (!empty($profileClean)) {
        return '
        <div class="dean-message-wrapper my-2">
            <div class="row g-4 align-items-start">
                <div class="col-lg-4 col-md-5">
                    <div class="p-4 rounded-4 border border-custom bg-white shadow-sm position-sticky" style="top: 90px;">
                        ' . $avatarMarkup . '
                        <div class="profile-info-block border-top border-custom pt-3">
                            <div class="lh-base" style="color: #332627; font-size: 0.9rem;">' . $profileClean . '</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="p-4 p-md-4 rounded-4 border border-custom bg-white shadow-sm">
                        <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom border-custom">
                            <i class="fa-solid fa-quote-left text-gold fs-4"></i>
                            <div class="eyebrow-label text-primary m-0" style="font-size: 0.75rem; letter-spacing: 0.1em;">' . htmlspecialchars(strtoupper($title)) . '</div>
                        </div>
                        <div class="dean-message-body" style="font-size: 0.93rem;">' . $messageClean . '</div>
                    </div>
                </div>
            </div>
        </div>';
    } else {
        return '
        <div class="dean-message-wrapper my-2">
            <div class="p-4 p-md-5 rounded-4 border border-custom bg-white shadow-sm">
                <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom border-custom">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-3 border border-custom d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="fa-solid fa-user-tie text-primary fs-3"></i>
                    </div>
                    <div>
                        <div class="eyebrow-label text-primary mb-1" style="font-size: 0.72rem; letter-spacing: 0.1em;">ACADEMIC LEADERSHIP</div>
                        <h3 class="font-serif text-primary fs-4 fw-bold m-0">' . htmlspecialchars($title) . '</h3>
                    </div>
                </div>
                <div class="dean-message-body" style="font-size: 0.93rem;">' . $messageClean . '</div>
            </div>
        </div>';
    }
}

function formatEventsTab($panelHtml) {
    preg_match_all('/<div\s+class="grid-item">(.*?)<\/div>/is', $panelHtml, $items);
    if (empty($items[1])) {
        preg_match_all('/<a[^>]*href="([^"]+)"[^>]*>.*?<img[^>]*src="([^"]+)".*?<p[^>]*>(.*?)<\/p>.*?<\/a>/is', $panelHtml, $aItems, PREG_SET_ORDER);
        if (!empty($aItems)) {
            $cards = '';
            foreach ($aItems as $ai) {
                $cards .= formatSingleEventBox($ai[1], $ai[2], trim(strip_tags($ai[3])));
            }
            return '<div class="row g-3 g-md-4 my-2">' . $cards . '</div>';
        }
        return '<div class="my-2">' . trim($panelHtml) . '</div>';
    }
    
    $cards = '';
    foreach ($items[1] as $item) {
        $link = preg_match('/href="([^"]+)"/i', $item, $lm) ? $lm[1] : '#';
        $img = preg_match('/src="([^"]+)"/i', $item, $im) ? $im[1] : 'uploads/2025/06/u37.jpg';
        $title = preg_match('/<p[^>]*>(.*?)<\/p>/is', $item, $pm) ? trim(strip_tags($pm[1])) : 'AKU Update';
        $cards .= formatSingleEventBox($link, $img, $title);
    }
    return '<div class="row g-3 g-md-4 my-2">' . $cards . '</div>';
}

function formatSingleEventBox($link, $img, $title) {
    return '
    <div class="col-sm-6 col-lg-6 col-xl-4">
        <div class="card h-100 rounded-4 border border-custom bg-white shadow-xs overflow-hidden hover-shadow transition-all d-flex flex-column justify-content-between" style="transition: all 0.25s ease;">
            <div class="position-relative overflow-hidden bg-light" style="height: 180px;">
                <img src="' . htmlspecialchars($img) . '" alt="' . htmlspecialchars($title) . '" class="w-100 h-100" style="object-fit: cover; transition: transform 0.4s ease;" onerror="this.onerror=null;this.src=\'assets/images/logo.png\';">
                <div class="position-absolute top-0 start-0 m-2.5">
                    <span class="badge rounded-pill bg-gold text-dark fw-bold px-2.5 py-1" style="font-size: 0.68rem;"><i class="fa-solid fa-camera me-1"></i> Media Coverage</span>
                </div>
            </div>
            <div class="p-3.5 d-flex flex-column justify-content-between flex-grow-1" style="padding: 1.25rem !important;">
                <h5 class="font-serif text-primary fs-6 fw-bold mb-3" style="line-height: 1.45; font-size: 0.95rem; margin-top: 0.25rem;">
                    <a href="' . htmlspecialchars($link) . '" target="_blank" class="text-decoration-none text-primary" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 2.8em; transition: color 0.2s ease;">
                        ' . htmlspecialchars($title) . '
                    </a>
                </h5>
                <div class="pt-2.5 border-top border-custom d-flex align-items-center justify-content-between mt-auto">
                    <span class="text-muted-custom small" style="font-size: 0.75rem;"><i class="fa-regular fa-newspaper text-gold me-1"></i> AKU Updates</span>
                    <a href="' . htmlspecialchars($link) . '" target="_blank" class="btn-report-pill">
                        View Report <i class="fa-solid fa-arrow-up-right-from-square ms-1" style="font-size: 0.68rem;"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>';
}

include "header.php";
?>

<!-- Inner Page Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="<?php echo htmlspecialchars($currentDeptSlug); ?>.php">Faculty</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium"><?php echo htmlspecialchars($pageTitle); ?></span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> <?php echo htmlspecialchars($facultyGroupTitle); ?>
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 900px; line-height: 1.15;">
            <?php echo htmlspecialchars($pageTitle); ?>
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            <?php echo htmlspecialchars($heroSubtitle); ?>
        </p>
    </div>
</section>

<main class="py-5" style="background-color: var(--bg-ivory);">
    <div class="container-custom">
        <div class="row g-4 g-xl-5">
            
            <!-- Left Main Content Area -->
            <div class="col-lg-8 col-xl-9">
                <article class="inner-main-card">
                    <!-- Dynamic Navigation Tabs -->
                    <ul class="nav nav-pills department-tabs mb-4 p-2 rounded-4 border border-custom bg-white" id="deptTab" role="tablist">
                        <?php foreach ($dbTabs as $idx => $t): ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?php echo ($idx === 0) ? 'active' : ''; ?> rounded-pill px-3.5 py-2 small fw-semibold" id="<?php echo htmlspecialchars($t['tab_slug']); ?>-btn" data-bs-toggle="pill" data-bs-target="#<?php echo htmlspecialchars($t['tab_slug']); ?>" type="button" role="tab">
                                <i class="<?php echo htmlspecialchars($t['tab_icon']); ?> me-1.5"></i> <?php echo htmlspecialchars_decode($t['tab_title']); ?>
                            </button>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <!-- Dynamic Tab Contents Container -->
                    <div class="tab-content pt-2" id="deptTabContent">
                        <?php foreach ($dbTabs as $idx => $t): ?>
                        <?php 
                        $activeClass = ($idx === 0) ? 'show active' : '';
                        $hideHeader = (stripos($t['tab_title'], 'Vision') !== false || stripos($t['tab_title'], 'Dean') !== false || stripos($t['tab_title'], 'Principal') !== false || stripos($t['tab_title'], 'HOD') !== false);
                        ?>
                        <!-- Tab: <?php echo htmlspecialchars_decode($t['tab_title']); ?> -->
                        <div class="tab-pane fade <?php echo $activeClass; ?>" id="<?php echo htmlspecialchars($t['tab_slug']); ?>" role="tabpanel">
                            <?php if (!$hideHeader): ?>
                            <div class="tab-section-header mb-4 pb-2 border-bottom border-custom d-flex align-items-center gap-2">
                                <i class="<?php echo htmlspecialchars($t['tab_icon']); ?> text-gold fs-5"></i>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0"><?php echo htmlspecialchars_decode($t['tab_title']); ?></h3>
                            </div>
                            <?php endif; ?>
                            <div class="inner-page-body-text mb-4" style="line-height: 1.8; color: #3d3233;">
                                <?php echo renderDepartmentTabPane($t, $currentDeptSlug, $pdo); ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Dynamic Offered Courses & Programs Section -->
                    <?php 
                    $dynamicCoursesStmt = $pdo->prepare("SELECT * FROM courses WHERE department_slug = ? AND status = 1 ORDER BY degree_type ASC, title ASC");
                    $dynamicCoursesStmt->execute([$currentDeptSlug]);
                    $dynamicDeptCourses = $dynamicCoursesStmt->fetchAll();

                    $dynamicGrouped = [];
                    foreach ($dynamicDeptCourses as $dc) {
                        $lvl = strtoupper(trim($dc['degree_type'] ?? 'UG'));
                        if (strpos($lvl, 'DIPLOMA') !== false) {
                            $cat = 'DIPLOMA PROGRAMS';
                        } elseif (strpos($lvl, 'PG') !== false || strpos($lvl, 'POST') !== false || strpos($lvl, 'MASTER') !== false) {
                            $cat = 'POST GRADUATION PROGRAMS';
                        } elseif (strpos($lvl, 'DOCTOR') !== false || strpos($lvl, 'PH.D') !== false || strpos($lvl, 'PHD') !== false) {
                            $cat = 'DOCTORAL RESEARCH (PH.D.) PROGRAMS';
                        } else {
                            $cat = 'UNDER GRADUATE PROGRAMS';
                        }
                        $dynamicGrouped[$cat][] = $dc;
                    }
                    ?>

                    <?php if (!empty($dynamicGrouped)): ?>
                    <div class="courses-section" id="offered-courses">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
                            <div>
                                <div class="eyebrow-label gold-eyebrow mb-1" style="color: var(--gold-color) !important;">
                                    <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> ACADEMIC CURRICULUM
                                </div>
                                <h3 class="font-serif text-primary fs-3 fw-bold m-0">Offered Programs &amp; Degree Courses</h3>
                            </div>
                            <span class="badge bg-gold text-dark fw-bold rounded-pill px-3 py-2" style="font-size: 0.75rem;">ADMISSIONS OPEN 2026-27</span>
                        </div>

                        <?php 
                        $order = ['DIPLOMA PROGRAMS', 'UNDER GRADUATE PROGRAMS', 'POST GRADUATION PROGRAMS', 'DOCTORAL RESEARCH (PH.D.) PROGRAMS'];
                        foreach ($order as $catTitle): 
                            if (empty($dynamicGrouped[$catTitle])) continue;
                        ?>
                        <div class="course-category-group">
                            <div class="course-category-title">
                                <i class="fa-solid fa-circle-check text-gold"></i> <?php echo $catTitle; ?>
                            </div>
                            <div class="row g-3">
                                <?php foreach ($dynamicGrouped[$catTitle] as $dc): 
                                    $cUrl = "course/" . htmlspecialchars($dc['slug']) . ".php";
                                ?>
                                <div class="col-md-6">
                                    <a href="<?php echo $cUrl; ?>" class="offered-course-card">
                                        <div class="course-icon-badge">
                                            <i class="fa-solid fa-book-bookmark"></i>
                                        </div>
                                        <span class="course-title-text"><?php echo htmlspecialchars($dc['title']); ?></span>
                                        <div class="course-arrow-badge">
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </div>
                                    </a>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php elseif (!empty($dept['courses_html'])): ?>
                        <?php 
                        $cHtml = $dept['courses_html'];
                        libxml_use_internal_errors(true);
                        $cDoc = new DOMDocument();
                        $cDoc->loadHTML('<?xml encoding="utf-8" ?><div id="c-wrap">' . $cHtml . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                        libxml_clear_errors();
                        $cRoot = $cDoc->getElementById('c-wrap');
                        $cBalanced = '';
                        if ($cRoot) {
                            foreach ($cRoot->childNodes as $child) {
                                $cBalanced .= $cDoc->saveHTML($child);
                            }
                        }
                        echo empty($cBalanced) ? $cHtml : $cBalanced;
                        ?>
                    <?php endif; ?>

                    <!-- Bottom Statutory Approvals Strip -->
                    <div class="p-4 rounded-4 mt-5 border border-custom d-flex align-items-center justify-content-between flex-wrap gap-3" style="background: #ffffff; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
                        <div class="d-flex align-items-center gap-3">
                            <i class="fa-solid fa-graduation-cap text-gold fs-3"></i>
                            <div>
                                <div class="font-serif text-primary fw-bold fs-6">Recognized Degree Programs</div>
                                <div class="text-muted-custom small" style="font-size: 0.78rem;">Approved by apex statutory councils: AICTE, PCI, UGC &amp; MP Govt.</div>
                            </div>
                        </div>
                        <a href="admission-procedure.php" class="btn btn-sm btn-gold-pill px-3.5 py-1.5 fw-bold">
                            <i class="fa-solid fa-paper-plane me-1"></i> Apply for 2026-27
                        </a>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar Area -->
            <div class="col-lg-4 col-xl-3">
                <?php include "faculty-sidebar.php"; ?>
            </div>

        </div>
    </div>
</main>

<?php include "footer.php"; ?>
