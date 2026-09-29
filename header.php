<?php
require_once 'db.php';

// Base HREF determination (Rock-Solid for Root, Subdirectories and Virtual Hosts)
$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
$appRootUrl = preg_replace('#/(course|admin)/?$#i', '', $scriptDir);
$siteBaseHref = rtrim($appRootUrl, '/') . '/';
if ($siteBaseHref === '//' || empty($siteBaseHref)) {
    $siteBaseHref = '/';
}

// Fetch site settings if available
try {
    $settings_row = $pdo->query("SELECT * FROM site_settings_custom LIMIT 1")->fetch();
} catch (Exception $e) {
    $settings_row = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <base href="<?php echo htmlspecialchars($siteBaseHref, ENT_QUOTES, 'UTF-8'); ?>">
    
    <title><?php echo htmlspecialchars($pageTitle ?? ($settings_row['site_title'] ?? 'Dr. A.P.J. Abdul Kalam University, Indore')); ?></title>
    <meta name="description" content="Dr. A.P.J. Abdul Kalam University, Indore — a multidisciplinary university nurturing India's next generation of engineers, researchers, and citizens."/>
    
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Inter:wght@300;400;500;600;700&display=swap">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Lovable Custom Theme Styles (With Dynamic Cache-Buster) -->
    <link rel="stylesheet" href="assets/css/lovable-theme.css?v=<?php echo file_exists(__DIR__ . '/assets/css/lovable-theme.css') ? filemtime(__DIR__ . '/assets/css/lovable-theme.css') : '3.5'; ?>">
    <!-- Universal In-Page PDF & Image Previewer Styles -->
    <link rel="stylesheet" href="assets/css/pdf-preview-modal.css?v=<?php echo file_exists(__DIR__ . '/assets/css/pdf-preview-modal.css') ? filemtime(__DIR__ . '/assets/css/pdf-preview-modal.css') : '2.3'; ?>">
    <link rel="icon" href="assets/lovable/aku-logo.jpeg" type="image/x-icon">
</head>
<body>

<!-- 1. TOP CRIMSON STRIP (Normal Text Links: Contact, Life @ AKU, Portals, Verify, Login, Admission) -->
<div class="header-top-bar">
    <div class="container-fluid px-2 px-sm-3 px-xl-4 px-xxl-5 d-flex align-items-center justify-content-between flex-wrap gap-2 py-1">
        <!-- Left Quick Statutory Links & Contact -->
        <div class="d-flex align-items-center gap-1.5 gap-md-2 small flex-wrap">
            <a href="tel:180030026072" class="top-link d-flex align-items-center gap-1.5">
                <i class="fa-solid fa-phone-volume text-gold"></i>
                <span class="d-none d-sm-inline">Toll Free:</span> <strong>180030026072</strong>
            </a>
            <span class="top-bar-divider">|</span>
            <a href="world-class-infrastructure.php" class="top-link">
                <i class="fa-solid fa-graduation-cap text-gold me-1"></i> Life @ AKU
            </a>
            <span class="top-bar-divider d-none d-md-inline">|</span>
            <a href="iqac.php" class="top-link d-none d-md-inline">IQAC</a>
            <span class="top-bar-divider d-none d-md-inline">|</span>
            <a href="rti-act.php" class="top-link d-none d-md-inline">RTI Act</a>
            <span class="top-bar-divider d-none d-lg-inline">|</span>
            <a href="https://samadhaan.ugc.ac.in/" target="_blank" class="top-link d-none d-lg-inline">UGC e-Samadhan</a>
        </div>
        
        <!-- Right Normal Text Links (Matches Left Side Style) & Social Icons -->
        <div class="d-flex align-items-center gap-1.5 gap-md-2 small flex-wrap">
            
            <!-- Portals Dropdown as clean top text link -->
            <div class="dropdown">
                <a href="#" class="top-link dropdown-toggle text-decoration-none" role="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                    <i class="fa-solid fa-layer-group text-gold me-1"></i> Portals
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-custom rounded-3 py-2 mt-1" style="min-width: 240px;">
                    <li><a class="dropdown-item py-1.5 small" href="https://www.universitymanagementsystem.in/aku/Home/Dashboard" target="_blank"><i class="fa-solid fa-file-circle-check text-primary me-2"></i> Document Verify (UMS)</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="https://login.rssrcampusconnect.com/" target="_blank"><i class="fa-solid fa-right-to-bracket text-success me-2"></i> Student ERP Login</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="https://samadhaan.ugc.ac.in/" target="_blank"><i class="fa-solid fa-building-columns me-2"></i> UGC e-Samadhan Portal</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="iqac.php"><i class="fa-solid fa-certificate text-primary me-2"></i> IQAC (NAAC / NIRF)</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="career.php"><i class="fa-solid fa-briefcase me-2"></i> Careers @ AKU</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="rti-act.php"><i class="fa-solid fa-scale-balanced me-2"></i> RTI Act Portal</a></li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li><a class="dropdown-item py-1.5 small text-primary fw-medium" href="admin/login.php"><i class="fa-solid fa-lock text-primary me-2"></i> CMS Admin Login</a></li>
                </ul>
            </div>

            <span class="top-bar-divider">|</span>
            <a href="https://www.universitymanagementsystem.in/aku/Home/Dashboard" target="_blank" class="top-link text-decoration-none">
                <i class="fa-regular fa-file-lines text-gold me-1"></i> Document Verify
            </a>

            <span class="top-bar-divider">|</span>
            <a href="https://login.rssrcampusconnect.com/" target="_blank" class="top-link text-decoration-none">
                <i class="fa-solid fa-user text-gold me-1"></i> Login
            </a>

            <span class="top-bar-divider">|</span>
            <a href="apply-now.php" class="top-link text-decoration-none fw-semibold">
                <i class="fa-solid fa-bolt text-gold me-1"></i> Admission Open
            </a>

            <!-- Social Links (Desktop) -->
            <div class="d-none d-xxl-flex align-items-center gap-1 ms-1">
                <span class="top-bar-divider">|</span>
                <a href="https://facebook.com" target="_blank" class="top-social-icon" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="https://instagram.com" target="_blank" class="top-social-icon" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://twitter.com" target="_blank" class="top-social-icon" title="X"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="https://youtube.com" target="_blank" class="top-social-icon" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
                <a href="https://linkedin.com" target="_blank" class="top-social-icon" title="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>

        </div>
    </div>
</div>

<!-- 2. PRIMARY NAVIGATION BAR (Sticky, Glassmorphic & Original Header Layout) -->
<?php
$currentScript = basename($_SERVER['PHP_SELF'] ?? '');
$isAboutActive = in_array($currentScript, ['why-aku.php', 'the-founder-2.php', 'the-chancellor.php', 'pro-chancellor.php', 'the-vice-chancellor.php', 'the-pro-vice-chancellor.php', 'the-chairman.php', 'registrar.php', 'chief-proctor.php', 'governing-body.php', 'board-of-management.php', 'academic-council.php', 'sponsoring-body.php', 'finance-committee.php', 'mandatory-disclosers.php', 'awardsand-recognigation.php', 'ugc-recognition.php', 'naac.php', 'nirf.php', 'ariia.php', 'aicte-approvals.php', 'approvals.php', 'mous.php', 'aku-in-media.php', 'world-class-infrastructure.php']);
$isFacultyActive = (strpos($currentScript, 'department-') === 0 || strpos($currentScript, 'faculty') === 0 || strpos($currentScript, 'polytechnic') === 0 || strpos($currentScript, 'diploma-') === 0 || in_array($currentScript, ['college-of-pharmacy.php', 'institute-of-pharmacy.php', 'school-of-pharmacy.php', 'school-of-engineering.php', 'school-of-business-administration-management.php', 'dean-principal-messege.php', 'faculty-staff-profile.php', 'syllabus-scheme.php', 'so-po.php', 'time-table.php', 'activities.php', 'notice-board-department.php', 'about-the-department.php', 'vision-mission.php', 'm-tech-cse.php']));
$isAdmissionsActive = in_array($currentScript, ['programs.php', 'admission-procedure.php', 'admission-assistance.php', 'admission-committee.php', 'department-intake.php', 'fee-structure.php', 'fees-details.php', 'payment-terms.php', 'refund-cancellation.php', 'scholarships.php', 'general-rules-and-regulations.php', 'hostel-rules-regulations.php', 'faqs.php', 'download-form.php', 'apply-now.php']);
$isExamActive = in_array($currentScript, ['about-the-section.php', 'examination-committee.php', 'examination-board.php', 'examination-calendar.php', 'results.php', 'exam-notice.php', 'exam-policy.php', 'exam-code.php', 'old-question-papers.php', 'convocation.php', 'digi-locker-nad-gov-in.php', 'admit-card-download.php', 'forms.php']);
$isCommitteesActive = in_array($currentScript, ['anti-reggiging-committee.php', 'anti-ragging-squad.php', 'academic-committee.php', 'cultruaral-committee.php', 'staff-selection-screening-committee.php', 'employee-grievance-wellfare-cell.php', 'equalization-committee.php', 'infrastructure-campus-beautification-committee.php', 'regulatory-committee.php', 'management-information-system-erp-committee.php', 'library-committee.php', 'purchase-committee.php', 'sports-committee.php', 'sprots-committee.php', 'jan-aushadhi-committee.php', 'fdp-committee.php', 'icc.php', 'womens-grievance-redressal-and-welfare-cell.php', 'intellectual-property-rights-cell-ipr-cell.php', 'hostel-disciplinary-committee.php', 'i-block-seminar-hall-committee.php']);
$isPlacementActive = in_array($currentScript, ['placement-cell.php', 'our-recruiters.php', 'corporate-interaction.php', 'visits-events.php', 'tp-industry.php', 'placement-chart.php']);
$isResearchActive = in_array($currentScript, ['research-area.php', 'research-committee.php', 'fees-details.php', 'ph-d-selection-process.php', 'faculty-publications.php', 'incubation-center.php', 'profile.php']);
$isStudentZoneActive = in_array($currentScript, ['notice-board.php', 'academic-calendar.php', 'student-holiday-calender.php', 'download-form-student.php', 'student-assistance.php', 'student-grievance-cell.php', 'sc-st-committee.php', 'scholarship-committee.php', 'transport-committee.php', 'sgrc.php', 'ncc-nss-cell.php', 'alumini-committee.php']);
$isEventActive = in_array($currentScript, ['gallery.php', 'university-events.php', 'upcoming-events-and-news.php', 'visiters-testomonials.php', 'students-testomonials.php']);
?>
<header id="mainHeader" class="site-header-navbar">
    <div class="container-fluid px-2 px-sm-3 px-xl-4 px-xxl-5 py-2.5 py-md-3 d-flex align-items-center justify-content-between header-inner-container">
        
        <!-- Logo & University Title (Exact Live Match) -->
        <a href="index.php" class="d-flex align-items-center gap-2 gap-sm-3 text-decoration-none text-dark flex-shrink-0">
            <img src="assets/lovable/aku-logo.jpeg" alt="Dr. A. P. J. Abdul Kalam University Logo" class="rounded object-fit-contain" style="height: 48px; width: auto;"/>
            <div class="lh-sm">
                <div class="font-serif fw-bold text-primary fs-5" style="letter-spacing: -0.01em;">Dr. A. P. J. Abdul Kalam University</div>
                <div class="text-muted-custom text-uppercase fw-semibold" style="font-size: 0.62rem; letter-spacing: 0.16em;">NURTURING TALENT TO SUCCESS</div>
            </div>
        </a>

        <!-- Desktop Navigation Links -->
        <nav class="d-none d-xl-flex align-items-center header-nav-links mx-1 mx-xxl-3">
            
            <!-- Home -->
            <a href="index.php" class="nav-link-item <?php echo ($currentScript == 'index.php') ? 'active' : ''; ?>">
                Home
            </a>

            <!-- 1. About Us Dropdown (Multi-Column Layout) -->
            <div class="dropdown">
                <a href="why-aku.php" class="nav-link-item <?php echo $isAboutActive ? 'active' : ''; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                    About Us <i class="fa-solid fa-chevron-down ms-1" style="font-size: 0.65rem;"></i>
                </a>
                <div class="dropdown-menu shadow-lg border-custom rounded-4 p-3 mt-2" style="min-width: 680px;">
                    <div class="row g-3">
                        <!-- Col 1: University & Leadership -->
                        <div class="col-md-4 border-end border-custom">
                            <div class="dropdown-header text-uppercase fw-bold text-primary px-2 pb-1" style="font-size: 0.72rem; letter-spacing: 0.08em;">
                                <i class="fa-solid fa-crown text-gold me-1.5"></i> Leadership
                            </div>
                            <ul class="list-unstyled mb-0">
                                <li><a class="dropdown-item py-1.5 small fw-semibold text-primary" href="why-aku.php"><i class="fa-solid fa-star text-gold me-1.5"></i> Why AKU</a></li>
                                <li><a class="dropdown-item py-1 small" href="the-founder-2.php">The Founder</a></li>
                                <li><a class="dropdown-item py-1 small" href="the-chairman.php">The Chairman</a></li>
                                <li><a class="dropdown-item py-1 small" href="the-chancellor.php">Chancellor</a></li>
                                <li><a class="dropdown-item py-1 small" href="pro-chancellor.php">Pro Chancellor</a></li>
                                <li><a class="dropdown-item py-1 small" href="the-vice-chancellor.php">Vice Chancellor</a></li>
                                <li><a class="dropdown-item py-1 small" href="the-pro-vice-chancellor.php">Pro Vice Chancellor</a></li>
                                <li><a class="dropdown-item py-1 small" href="registrar.php">Registrar</a></li>
                                <li><a class="dropdown-item py-1 small" href="chief-proctor.php">Chief Proctor</a></li>
                            </ul>
                        </div>

                        <!-- Col 2: Governance & Council -->
                        <div class="col-md-4 border-end border-custom">
                            <div class="dropdown-header text-uppercase fw-bold text-primary px-2 pb-1" style="font-size: 0.72rem; letter-spacing: 0.08em;">
                                <i class="fa-solid fa-landmark text-gold me-1.5"></i> Governance
                            </div>
                            <ul class="list-unstyled mb-0">
                                <li><a class="dropdown-item py-1 small" href="governing-body.php">Governing Body</a></li>
                                <li><a class="dropdown-item py-1 small" href="board-of-management.php">Board of Management</a></li>
                                <li><a class="dropdown-item py-1 small" href="academic-council.php">Academic Council</a></li>
                                <li><a class="dropdown-item py-1 small" href="sponsoring-body.php">Sponsoring Body</a></li>
                                <li><a class="dropdown-item py-1 small" href="finance-committee.php">Finance Committee</a></li>
                                <li><a class="dropdown-item py-1 small" href="mandatory-disclosers.php">Mandatory Disclosures</a></li>
                                <li><a class="dropdown-item py-1 small" href="awardsand-recognigation.php">Awards &amp; Recognition</a></li>
                                <li><a class="dropdown-item py-1 small" href="aku-in-media.php">AKU in Media</a></li>
                            </ul>
                        </div>

                        <!-- Col 3: Accreditations & Approvals -->
                        <div class="col-md-4">
                            <div class="dropdown-header text-uppercase fw-bold text-primary px-2 pb-1" style="font-size: 0.72rem; letter-spacing: 0.08em;">
                                <i class="fa-solid fa-certificate text-gold me-1.5"></i> Accreditations
                            </div>
                            <ul class="list-unstyled mb-0">
                                <li><a class="dropdown-item py-1 small" href="ugc-recognition.php">UGC Recognition</a></li>
                                <li><a class="dropdown-item py-1 small" href="naac.php">NAAC Accreditation</a></li>
                                <li><a class="dropdown-item py-1 small" href="nirf.php">NIRF Ranking</a></li>
                                <li><a class="dropdown-item py-1 small" href="ariia.php">ARIIA Ranking</a></li>
                                <li><a class="dropdown-item py-1 small" href="aicte-approvals.php">AICTE Approvals</a></li>
                                <li><a class="dropdown-item py-1 small" href="approvals.php">Statutory Approvals</a></li>
                                <li><a class="dropdown-item py-1 small" href="mous.php">Institutional MOUs</a></li>
                                <li><a class="dropdown-item py-1 small" href="world-class-infrastructure.php">Campus Infrastructure</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Faculty Mega Menu (Complete Live Website Hierarchy) -->
            <div class="dropdown dropdown-mega position-static">
                <a href="department-of-computer-science-engineering.php" class="nav-link-item <?php echo $isFacultyActive ? 'active' : ''; ?>" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                    Faculty <i class="fa-solid fa-chevron-down ms-1" style="font-size: 0.65rem;"></i>
                </a>
                <div class="dropdown-menu faculty-mega-menu shadow border-custom">
                    <div class="row g-4">
                        
                        <!-- Col 1: Faculty of Engineering -->
                        <div class="col-lg-3">
                            <div class="mega-column-title">
                                <i class="fa-solid fa-microchip text-gold me-1.5"></i> Faculty of Engineering
                            </div>
                            
                            <div class="mega-sub-header">College of Engineering</div>
                            <a href="department-of-civil-engineering.php" class="mega-item-link">Dept of Civil Engineering</a>
                            <a href="department-of-computer-science-engineering.php" class="mega-item-link">Dept of Computer Science &amp; Engg</a>
                            <a href="department-of-information-technology.php" class="mega-item-link">Dept of Information Technology</a>
                            <a href="department-of-electrical-electronics-engineering.php" class="mega-item-link">Dept of Electrical &amp; Electronics</a>
                            <a href="department-of-mechanical-engineering.php" class="mega-item-link">Dept of Mechanical Engineering</a>
                            <a href="department-of-management-studies-coe.php" class="mega-item-link">Dept of Management Studies – COE</a>
                            <a href="department-of-computer-applications-coe.php" class="mega-item-link">Dept of Computer Applications</a>

                            <div class="mega-sub-header">School of Engineering</div>
                            <a href="school-of-engineering.php" class="mega-item-link fw-semibold text-primary">School of Engineering Overview</a>
                            <a href="diploma-in-enginering.php" class="mega-item-link">Diploma in Engineering</a>
                            <a href="department-of-computer-science-engineering-soe.php" class="mega-item-link">Dept of CSE (SOE)</a>
                            <a href="department-of-electrical-electronics-engineering-soe.php" class="mega-item-link">Dept of EEE (SOE)</a>
                            <a href="department-of-civil-engineering-soe.php" class="mega-item-link">Dept of Civil (SOE)</a>
                            <a href="department-of-mechanical-engineering-soe.php" class="mega-item-link">Dept of Mechanical (SOE)</a>
                            <a href="department-of-mca-soe.php" class="mega-item-link">Dept of MCA (SOE)</a>

                            <div class="mega-sub-header">College of Polytechnic Engineering</div>
                            <a href="department-of-civil-engineering-polytechnic.php" class="mega-item-link">Civil Engg (Polytechnic)</a>
                            <a href="department-of-mechanical-engineering-polytechnic.php" class="mega-item-link">Mechanical Engg (Polytechnic)</a>
                        </div>

                        <!-- Col 2: Faculty of Health Science -->
                        <div class="col-lg-3">
                            <div class="mega-column-title">
                                <i class="fa-solid fa-prescription text-gold me-1.5"></i> Faculty of Health Science
                            </div>
                            
                            <div class="mega-sub-header">School of Pharmacy</div>
                            <a href="school-of-pharmacy.php" class="mega-item-link fw-semibold text-primary">School of Pharmacy Overview</a>
                            <a href="department-of-pharmacy-sop.php" class="mega-item-link">Department of Pharmacy (SOP)</a>

                            <div class="mega-sub-header">College of Pharmacy</div>
                            <a href="college-of-pharmacy.php" class="mega-item-link fw-semibold text-primary">College of Pharmacy Overview</a>
                            <a href="department-of-pharmacy.php" class="mega-item-link">Department of Pharmacy (COP)</a>

                            <div class="mega-sub-header">Institute Of Pharmacy</div>
                            <a href="institute-of-pharmacy.php" class="mega-item-link fw-semibold text-primary">Institute of Pharmacy Overview</a>
                            <a href="department-of-pharmacy-iop.php" class="mega-item-link">Department of Pharmacy (IOP)</a>

                            <div class="p-3 rounded-3 mt-4 border border-custom" style="background: #fbf9f6;">
                                <div class="fw-bold text-primary small mb-1"><i class="fa-solid fa-award text-gold me-1"></i> PCI &amp; AICTE Approved</div>
                                <div class="text-muted-custom" style="font-size: 0.72rem;">All health science &amp; pharmacy degrees comply with statutory guidelines.</div>
                            </div>
                        </div>

                        <!-- Col 3: College of Professional Studies -->
                        <div class="col-lg-3">
                            <div class="mega-column-title">
                                <i class="fa-solid fa-briefcase text-gold me-1.5"></i> Professional Studies
                            </div>
                            
                            <div class="mega-sub-header">Management &amp; Commerce</div>
                            <a href="school-of-business-administration-management.php" class="mega-item-link">College of Management (SBAM)</a>
                            <a href="department-of-management-studies.php" class="mega-item-link">Department of Management Studies</a>
                            <a href="department-of-commerce.php" class="mega-item-link">College &amp; Dept of Commerce</a>

                            <div class="mega-sub-header">Arts, Humanities &amp; Social Work</div>
                            <a href="department-of-arts.php" class="mega-item-link">College of Arts and Humanities</a>
                            <a href="department-of-social-work.php" class="mega-item-link">Department of Social Work</a>

                            <div class="mega-sub-header">Life Sciences &amp; Agriculture</div>
                            <a href="department-of-science.php" class="mega-item-link">College of Life Science</a>
                            <a href="department-of-zoology.php" class="mega-item-link">Department of Zoology</a>
                            <a href="department-of-chemistry.php" class="mega-item-link">Department of Chemistry</a>
                            <a href="department-of-physics.php" class="mega-item-link">Department of Physics</a>
                            <a href="department-of-agriculture.php" class="mega-item-link">School of Agricultural Sciences</a>

                            <div class="mega-sub-header">Education, IT &amp; Law</div>
                            <a href="department-of-education.php" class="mega-item-link">College of Education</a>
                            <a href="department-of-computer-science.php" class="mega-item-link">College of Computer Application</a>
                            <a href="department-of-law.php" class="mega-item-link">College of Legal Studies (Law)</a>
                        </div>

                        <!-- Col 4: Faculty of Medical Science & Academic Calendar -->
                        <div class="col-lg-3">
                            <div class="mega-column-title">
                                <i class="fa-solid fa-heart-pulse text-gold me-1.5"></i> Faculty of Medical Science
                            </div>
                            
                            <div class="mega-sub-header">AYUSH &amp; Medical Sciences</div>
                            <a href="https://rnkmamc.in" target="_blank" class="mega-item-link">
                                <i class="fa-solid fa-arrow-up-right-from-square text-muted me-1" style="font-size: 0.65rem;"></i> School of Ayurveda &amp; Panchkarma
                            </a>
                            <a href="https://rnkmhmc.in" target="_blank" class="mega-item-link">
                                <i class="fa-solid fa-arrow-up-right-from-square text-muted me-1" style="font-size: 0.65rem;"></i> School of Homeopathy
                            </a>

                            <div class="mega-column-title mt-4">
                                <i class="fa-solid fa-folder-open text-gold me-1.5"></i> Academic Resources
                            </div>
                            <a href="syllabus-scheme.php" class="mega-item-link"><i class="fa-solid fa-book-open text-muted me-1"></i> Syllabus &amp; Scheme</a>
                            <a href="time-table.php" class="mega-item-link"><i class="fa-solid fa-clock text-muted me-1"></i> Class Time Table</a>
                            <a href="so-po.php" class="mega-item-link"><i class="fa-solid fa-bullseye text-muted me-1"></i> Program Outcomes (SO / PO)</a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- 4. Examination Dropdown -->
            <div class="dropdown">
                <a href="about-the-section.php" class="nav-link-item <?php echo $isExamActive ? 'active' : ''; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                    Examination <i class="fa-solid fa-chevron-down ms-1" style="font-size: 0.65rem;"></i>
                </a>
                <ul class="dropdown-menu shadow border-custom rounded-3 py-2 mt-2" style="min-width: 250px;">
                    <li><a class="dropdown-item py-1.5 small" href="about-the-section.php">About The Section</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="examination-committee.php">Examination Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="examination-board.php">Examination Board</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="exam-policy.php">Examination Policy</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="exam-code.php">Examination Code</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="examination-calendar.php">Examination Schedule</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="old-question-papers.php">Old Question Papers</a></li>
                    <li><a class="dropdown-item py-1.5 small fw-medium" href="results.php"><i class="fa-solid fa-award text-gold me-2"></i> Results</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="convocation.php">Convocation</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="digi-locker-nad-gov-in.php">Digi Locker (nad.gov.in)</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="admit-card-download.php">Admit Card Download</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="forms.php">Forms</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="exam-notice.php">Exam Notice</a></li>
                </ul>
            </div>

            <!-- 5. Committees Dropdown -->
            <div class="dropdown">
                <a href="anti-reggiging-committee.php" class="nav-link-item <?php echo $isCommitteesActive ? 'active' : ''; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                    Committees <i class="fa-solid fa-chevron-down ms-1" style="font-size: 0.65rem;"></i>
                </a>
                <ul class="dropdown-menu shadow border-custom rounded-3 py-2 mt-2" style="min-width: 320px; max-height: 80vh; overflow-y: auto;">
                    <li><a class="dropdown-item py-1.5 small" href="anti-reggiging-committee.php"><i class="fa-solid fa-shield-halved text-gold me-2"></i> Anti Ragging Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="anti-ragging-squad.php"><i class="fa-solid fa-shield-cat text-gold me-2"></i> Anti Ragging Squad</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="academic-committee.php">Academic Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="cultruaral-committee.php">Cultural Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="employee-grievance-wellfare-cell.php">Employee Grievance/ Welfare Cell</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="equalization-committee.php">Equalization Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="infrastructure-campus-beautification-committee.php">Infrastructure /Campus Beautification Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="regulatory-committee.php">Regulatory Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="management-information-system-erp-committee.php">Management Information System/ERP Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="library-committee.php">Library Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="womens-grievance-redressal-and-welfare-cell.php">Women’s Grievance Redressal and Welfare Cell</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="jan-aushadhi-committee.php">Jan Aushadhi Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="fdp-committee.php">Faculty Development Programme (FDP) Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="purchase-committee.php">Purchase Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="intellectual-property-rights-cell-ipr-cell.php">Intellectual Property Rights Cell (IPR Cell)</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="icc.php">Internal Complaint Committee (ICC)</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="sprots-committee.php">Sports Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="hostel-disciplinary-committee.php">Hostel Disciplinary Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="i-block-seminar-hall-committee.php">I-Block Seminar Hall Committee</a></li>
                </ul>
            </div>

            <!-- 6. Admissions Dropdown -->
            <div class="dropdown">
                <a href="admission-procedure.php" class="nav-link-item <?php echo $isAdmissionsActive ? 'active' : ''; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                    Admissions <i class="fa-solid fa-chevron-down ms-1" style="font-size: 0.65rem;"></i>
                </a>
                <ul class="dropdown-menu shadow border-custom rounded-3 py-2 mt-2" style="min-width: 260px;">
                    <li><a class="dropdown-item py-1.5 small fw-bold" href="programs.php"><i class="fa-solid fa-graduation-cap text-gold me-2"></i> All Academic Programs</a></li>
                    <li><a class="dropdown-item py-1.5 small fw-semibold text-primary" href="apply-now.php"><i class="fa-solid fa-bolt text-gold me-2"></i> Apply Online 2026</a></li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li><a class="dropdown-item py-1.5 small" href="admission-assistance.php">Admission Assistance</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="admission-procedure.php">Admission Procedure</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="admission-committee.php">Admission Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="department-intake.php">Department Intake Capacity</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="faqs.php">FAQs</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="fee-structure.php">Fee Structure</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="general-rules-and-regulations.php">General Rules and Regulations</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="hostel-rules-regulations.php">Hostel Rules &amp; Regulations</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="scholarships.php">Scholarships</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="download-form.php">Admission Application Form</a></li>
                </ul>
            </div>

            <!-- 7. Placements Dropdown -->
            <div class="dropdown">
                <a href="placement-cell.php" class="nav-link-item <?php echo $isPlacementActive ? 'active' : ''; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                    Placements <i class="fa-solid fa-chevron-down ms-1" style="font-size: 0.65rem;"></i>
                </a>
                <ul class="dropdown-menu shadow border-custom rounded-3 py-2 mt-2" style="min-width: 260px;">
                    <li><a class="dropdown-item py-1.5 small fw-medium" href="our-recruiters.php"><i class="fa-solid fa-handshake text-gold me-2"></i> Our Recruiters</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="placement-cell.php">Placement Cell</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="corporate-interaction.php">Corporate Interaction</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="visits-events.php">Visits/Events</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="tp-industry.php">T&amp;P/Industry Linkage Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="placement-chart.php">Placement Chart</a></li>
                </ul>
            </div>

            <!-- 8. Research Dropdown -->
            <div class="dropdown">
                <a href="research-committee.php" class="nav-link-item <?php echo $isResearchActive ? 'active' : ''; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                    Research <i class="fa-solid fa-chevron-down ms-1" style="font-size: 0.65rem;"></i>
                </a>
                <ul class="dropdown-menu shadow border-custom rounded-3 py-2 mt-2" style="min-width: 270px;">
                    <li><a class="dropdown-item py-1.5 small" href="research-area.php">Research Areas</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="research-committee.php">Research and Development Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="fees-details.php">Fees Details</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="ph-d-selection-process.php">Ph.D. Selection Process</a></li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li class="dropdown-header text-uppercase fw-bold text-muted-custom" style="font-size: 0.68rem; letter-spacing: 0.08em;">E-Resources &amp; Journals</li>
                    <li><a class="dropdown-item py-1.5 small" href="https://jiips.in/" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square text-muted me-2"></i> JIIPS Research Journal</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="https://jier.co.in/" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square text-muted me-2"></i> JIER Research Journal</a></li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li><a class="dropdown-item py-1.5 small" href="faculty-publications.php">Faculty Publications</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="incubation-center.php"><i class="fa-solid fa-lightbulb text-gold me-2"></i> Kalam Incubation Center</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="profile.php">Academic &amp; Research Profile</a></li>
                </ul>
            </div>

            <!-- 9. Student Zone Dropdown -->
            <div class="dropdown">
                <a href="notice-board.php" class="nav-link-item <?php echo $isStudentZoneActive ? 'active' : ''; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                    Student Zone <i class="fa-solid fa-chevron-down ms-1" style="font-size: 0.65rem;"></i>
                </a>
                <ul class="dropdown-menu shadow border-custom rounded-3 py-2 mt-2" style="min-width: 270px;">
                    <li><a class="dropdown-item py-1.5 small fw-medium" href="notice-board.php"><i class="fa-solid fa-bell text-gold me-2"></i> Notice Board</a></li>
                    <li><a class="dropdown-item py-1.5 small fw-medium" href="academic-calendar.php"><i class="fa-solid fa-calendar text-gold me-2"></i> Academic Calendar</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="student-holiday-calender.php"><i class="fa-regular fa-calendar-days text-gold me-2"></i> Student Holiday Calendar</a></li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li class="dropdown-header text-uppercase fw-bold text-muted-custom" style="font-size: 0.68rem; letter-spacing: 0.08em;">Student Support Cells</li>
                    <li><a class="dropdown-item py-1.5 small" href="student-assistance.php"><i class="fa-solid fa-hand-holding-heart text-gold me-2"></i> Student Assistance</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="student-grievance-cell.php">Student Grievance Cell</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="sc-st-committee.php">SC/ST Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="scholarship-committee.php">Scholarship Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="transport-committee.php">Hostel/Canteen/Transport Committee</a></li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li><a class="dropdown-item py-1.5 small" href="download-form-student.php"><i class="fa-solid fa-file-signature text-gold me-2"></i> Student Request Forms</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="sgrc.php">SGRC (Grievance Redressal)</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="ncc-nss-cell.php">NCC/NSS Cell</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="alumini-committee.php">Alumni Committee</a></li>
                </ul>
            </div>

            <!-- 10. Event Dropdown -->
            <div class="dropdown">
                <a href="university-events.php" class="nav-link-item <?php echo $isEventActive ? 'active' : ''; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                    Event <i class="fa-solid fa-chevron-down ms-1" style="font-size: 0.65rem;"></i>
                </a>
                <ul class="dropdown-menu shadow border-custom rounded-3 py-2 mt-2" style="min-width: 240px;">
                    <li><a class="dropdown-item py-1.5 small" href="gallery.php"><i class="fa-solid fa-images text-gold me-2"></i> Gallery</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="university-events.php">University Events &amp; Fests</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="upcoming-events-and-news.php">Upcoming Events and News</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="visiters-testomonials.php">Visiters Testomonials</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="students-testomonials.php">Students Testomonials</a></li>
                </ul>
            </div>

        </nav>

        <!-- Right Quick Action Button (Contact Us) & Mobile Offcanvas Trigger -->
        <div class="d-flex align-items-center gap-2 flex-shrink-0">
            <a href="contact-us.php" class="btn btn-apply-pill d-none d-sm-inline-flex">
                <i class="fa-solid fa-envelope text-gold" style="font-size: 13px;"></i> Contact Us
            </a>

            <!-- Mobile Offcanvas Trigger Button -->
            <button class="btn btn-outline-dark border-custom d-xl-none rounded-3 px-2 py-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileNavOffcanvas" aria-controls="mobileNavOffcanvas" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars fs-5"></i>
            </button>
        </div>

    </div>
</header>

<!-- Bootstrap 5 Offcanvas Drawer for Mobile -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileNavOffcanvas" aria-labelledby="mobileNavOffcanvasLabel" style="width: 330px;">
    <div class="offcanvas-header border-bottom border-custom bg-white">
        <div class="d-flex align-items-center gap-2">
            <img src="assets/lovable/aku-logo.jpeg" alt="Logo" style="height: 38px; width: auto;" class="rounded"/>
            <div>
                <span class="font-serif fw-bold text-primary fs-6 d-block lh-1" id="mobileNavOffcanvasLabel">Dr. A. P. J. Abdul Kalam University</span>
                <span class="text-muted-custom small text-uppercase fw-semibold" style="font-size: 0.58rem; letter-spacing: 0.12em;">NURTURING TALENT TO SUCCESS</span>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3">
        
        <!-- Mobile Quick Action Buttons -->
        <div class="d-flex flex-column gap-2 mb-3 pb-3 border-bottom border-custom">
            <a href="apply-now.php" class="top-btn-admission text-center justify-content-center py-2">
                <i class="fa-solid fa-bolt text-gold"></i> ADMISSION OPEN 2026
            </a>
            <div class="d-flex gap-2">
                <a href="https://www.universitymanagementsystem.in/aku/Home/Dashboard" target="_blank" class="top-btn-verify flex-fill text-center justify-content-center py-1.5">
                    <i class="fa-regular fa-file-lines"></i> Verify
                </a>
                <a href="https://login.rssrcampusconnect.com/" target="_blank" class="top-btn-login flex-fill text-center justify-content-center py-1.5">
                    <i class="fa-solid fa-user"></i> Login
                </a>
            </div>
        </div>

        <nav class="nav flex-column gap-1 fw-medium small">
            <a href="index.php" class="nav-link py-1.5 px-2 rounded text-primary fw-bold bg-secondary-tint"><i class="fa-solid fa-house me-2"></i> Home</a>
            <a href="why-aku.php" class="nav-link py-1.5 px-2 rounded text-dark">About Us</a>
            <a href="academic-calendar.php" class="nav-link py-1.5 px-2 rounded text-dark">Academic Calendar</a>
            <a href="department-of-computer-science-engineering.php" class="nav-link py-1.5 px-2 rounded text-dark">Faculty &amp; Departments</a>
            <a href="about-the-section.php" class="nav-link py-1.5 px-2 rounded text-dark">Examination</a>
            <a href="anti-reggiging-committee.php" class="nav-link py-1.5 px-2 rounded text-dark">Committees</a>
            <a href="programs.php" class="nav-link py-1.5 px-2 rounded text-dark fw-semibold">Academic Programs</a>
            <a href="admission-procedure.php" class="nav-link py-1.5 px-2 rounded text-dark">Admissions</a>
            <a href="placement-cell.php" class="nav-link py-1.5 px-2 rounded text-dark">Placements</a>
            <a href="research-committee.php" class="nav-link py-1.5 px-2 rounded text-dark">Research</a>
            <a href="notice-board.php" class="nav-link py-1.5 px-2 rounded text-dark">Notice Board</a>
            <a href="gallery.php" class="nav-link py-1.5 px-2 rounded text-dark">Gallery &amp; Events</a>
            <a href="world-class-infrastructure.php" class="nav-link py-1.5 px-2 rounded text-dark">Life @ AKU</a>
            <a href="contact-us.php" class="nav-link py-1.5 px-2 rounded text-primary fw-semibold"><i class="fa-solid fa-location-dot text-gold me-2"></i> Contact Us</a>
            <a href="iqac.php" class="nav-link py-1.5 px-2 rounded text-dark">IQAC</a>
            <a href="rti-act.php" class="nav-link py-1.5 px-2 rounded text-dark">RTI Act</a>
        </nav>
        
        <div class="mt-4 pt-3 border-top border-custom">
            <a href="admin/login.php" class="btn btn-outline-dark w-100 rounded-pill py-2 fw-medium small">
                <i class="fa-solid fa-lock me-1"></i> CMS Admin Login
            </a>
        </div>
    </div>
</div>

<!-- Header Scroll Sticky Handler -->
<script>
    (function() {
        const header = document.getElementById('mainHeader');
        if (header) {
            const handleScroll = function() {
                if (window.scrollY > 40) {
                    header.classList.add('navbar-scrolled');
                } else {
                    header.classList.remove('navbar-scrolled');
                }
            };
            window.addEventListener('scroll', handleScroll, { passive: true });
            handleScroll();
        }
    })();
</script>

<!-- Desktop Navigation Smooth Hover & Submenu Click Handler -->
<script>
    (function() {
        function initNavHover() {
            if (window.innerWidth < 992) return;
            
            const dropdowns = document.querySelectorAll('.site-header-navbar .dropdown');
            dropdowns.forEach(function(dd) {
                const toggle = dd.querySelector('.nav-link-item');
                const menu = dd.querySelector('.dropdown-menu');
                if (!toggle || !menu) return;
                
                let closeTimer = null;
                
                function openDropdown() {
                    clearTimeout(closeTimer);
                    // Close other dropdowns
                    dropdowns.forEach(function(other) {
                        if (other !== dd) {
                            const otherMenu = other.querySelector('.dropdown-menu');
                            const otherToggle = other.querySelector('.nav-link-item');
                            if (otherMenu) otherMenu.classList.remove('show');
                            if (otherToggle) otherToggle.setAttribute('aria-expanded', 'false');
                        }
                    });
                    menu.classList.add('show');
                    toggle.setAttribute('aria-expanded', 'true');
                }
                
                function closeDropdown() {
                    closeTimer = setTimeout(function() {
                        menu.classList.remove('show');
                        toggle.setAttribute('aria-expanded', 'false');
                    }, 220); // 220ms grace buffer ensures cursor transition never drops hover
                }
                
                dd.addEventListener('mouseenter', openDropdown);
                dd.addEventListener('mouseleave', closeDropdown);
                menu.addEventListener('mouseenter', openDropdown);
                menu.addEventListener('mouseleave', closeDropdown);
                
                // Allow clicking the parent nav link on desktop to navigate to its URL
                toggle.addEventListener('click', function(e) {
                    if (window.innerWidth >= 992) {
                        const href = this.getAttribute('href');
                        if (href && href !== '#' && !href.startsWith('javascript:')) {
                            window.location.href = href;
                        }
                    }
                });
            });
        }
        
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initNavHover);
        } else {
            initNavHover();
        }
        window.addEventListener('resize', initNavHover);
    })();
</script>
