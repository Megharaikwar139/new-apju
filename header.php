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
    
    <title><?php echo htmlspecialchars($settings_row['site_title'] ?? 'Dr. A.P.J. Abdul Kalam University, Indore'); ?></title>
    <meta name="description" content="Dr. A.P.J. Abdul Kalam University, Indore — a multidisciplinary university nurturing India's next generation of engineers, researchers, and citizens."/>
    
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Inter:wght@300;400;500;600;700&display=swap">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Lovable Custom Theme Styles -->
    <link rel="stylesheet" href="assets/css/lovable-theme.css">
    <link rel="icon" href="assets/lovable/aku-logo.jpeg" type="image/x-icon">
</head>
<body>

<!-- Modern Sticky Navbar (Glassmorphic On Scroll) -->
<header id="mainHeader" class="site-header-navbar">
    <div class="container-fluid px-2 px-sm-3 px-xl-4 px-xxl-5 py-2.5 py-md-3 d-flex align-items-center justify-content-between header-inner-container">
        
        <!-- Logo & University Title -->
        <a href="index.php" class="d-flex align-items-center gap-2 gap-sm-3 text-decoration-none text-dark flex-shrink-0">
            <img src="assets/lovable/aku-logo.jpeg" alt="AKU Indore Logo" class="rounded object-fit-contain" style="height: 42px; width: auto;"/>
            <div class="lh-sm">
                <div class="font-serif fw-bold text-primary fs-5" style="letter-spacing: -0.01em;">Dr. A.P.J. Abdul Kalam</div>
                <div class="text-muted-custom text-uppercase fw-semibold" style="font-size: 0.62rem; letter-spacing: 0.2em;">UNIVERSITY · INDORE</div>
            </div>
        </a>

        <!-- Desktop Navigation Links (Responsive Flex & Zero Clipping) -->
        <nav class="d-none d-xl-flex align-items-center header-nav-links mx-1 mx-xxl-3">
            
            <!-- 1. About Us Dropdown -->
            <div class="dropdown">
                <a href="why-aku.php" class="nav-link-item" data-bs-toggle="dropdown" aria-expanded="false">
                    About
                </a>
                <ul class="dropdown-menu shadow border-custom rounded-3 py-2 mt-2" style="min-width: 240px;">
                    <li><a class="dropdown-item py-1.5 small fw-medium text-primary" href="why-aku.php"><i class="fa-solid fa-star text-gold me-2"></i> Why AKU</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="the-founder-2.php">The Founder</a></li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li class="dropdown-header text-uppercase fw-bold text-muted-custom" style="font-size: 0.68rem; letter-spacing: 0.08em;">Leadership</li>
                    <li><a class="dropdown-item py-1.5 small" href="the-chancellor.php">The Chancellor</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="pro-chancellor.php">The Pro Chancellor</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="the-vice-chancellor.php">The Vice Chancellor</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="registrar.php">The Registrar</a></li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li><a class="dropdown-item py-1.5 small" href="governing-body.php">Governing Body</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="board-of-management.php">Board of Management</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="finance-committee.php">Finance Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="mandatory-disclosers.php">Mandatory Disclosures</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="awardsand-recognigation.php">Awards & Recognition</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="ugc-recognition.php">UGC Recognition</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="aku-in-media.php">AKU in Media</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="world-class-infrastructure.php">Campus Infrastructure</a></li>
                </ul>
            </div>

            <!-- 2. Faculty Dropdown (Complete Old Website Structure: 4 Faculties & All 23 Departments) -->
            <div class="dropdown dropdown-mega position-static">
                <a href="department-of-computer-science-engineering.php" class="nav-link-item" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                    Faculty
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
                            <a href="department-of-computer-science-engineering.php" class="mega-item-link">Dept of Computer Science & Engg</a>
                            <a href="department-of-information-technology.php" class="mega-item-link">Dept of Information Technology</a>
                            <a href="department-of-electrical-electronics-engineering.php" class="mega-item-link">Dept of Electrical & Electronics</a>
                            <a href="department-of-mechanical-engineering.php" class="mega-item-link">Dept of Mechanical Engineering</a>
                            <a href="department-of-management-studies-coe.php" class="mega-item-link">Dept of Management Studies (COE)</a>
                            <a href="department-of-computer-applications-coe.php" class="mega-item-link">Dept of Computer Applications</a>

                            <div class="mega-sub-header">School of Engineering</div>
                            <a href="diploma-in-enginering.php" class="mega-item-link">Diploma in Engineering</a>
                            <a href="department-of-computer-science-engineering-soe.php" class="mega-item-link">Dept of CSE (SOE)</a>
                            <a href="department-of-electrical-electronics-engineering-soe.php" class="mega-item-link">Dept of EEE (SOE)</a>
                            <a href="department-of-civil-engineering-soe.php" class="mega-item-link">Dept of Civil (SOE)</a>
                            <a href="department-of-mechanical-engineering-soe.php" class="mega-item-link">Dept of Mechanical (SOE)</a>

                            <div class="mega-sub-header">Polytechnic Engineering</div>
                            <a href="department-of-civil-engineering-polytechnic.php" class="mega-item-link">Civil Engineering (Polytechnic)</a>
                            <a href="department-of-mechanical-engineering-polytechnic.php" class="mega-item-link">Mechanical Engg (Polytechnic)</a>
                        </div>

                        <!-- Col 2: Faculty of Health Science -->
                        <div class="col-lg-3">
                            <div class="mega-column-title">
                                <i class="fa-solid fa-prescription text-gold me-1.5"></i> Faculty of Health Science
                            </div>
                            
                            <div class="mega-sub-header">School of Pharmacy</div>
                            <a href="department-of-pharmacy-sop.php" class="mega-item-link">Department of Pharmacy (SOP)</a>

                            <div class="mega-sub-header">College of Pharmacy</div>
                            <a href="college-of-pharmacy.php" class="mega-item-link">College of Pharmacy Overview</a>
                            <a href="department-of-pharmacy.php" class="mega-item-link">Department of Pharmacy</a>

                            <div class="mega-sub-header">Institute of Pharmacy</div>
                            <a href="institute-of-pharmacy.php" class="mega-item-link">Institute of Pharmacy Overview</a>
                            <a href="department-of-pharmacy-iop.php" class="mega-item-link">Department of Pharmacy (IOP)</a>

                            <div class="p-3 rounded-3 mt-4 border border-custom" style="background: #fbf9f6;">
                                <div class="fw-bold text-primary small mb-1"><i class="fa-solid fa-award text-gold me-1"></i> PCI & AICTE Approved</div>
                                <div class="text-muted-custom" style="font-size: 0.72rem;">All health science and pharmacy degrees comply with national statutory norms.</div>
                            </div>
                        </div>

                        <!-- Col 3: College of Professional Studies -->
                        <div class="col-lg-3">
                            <div class="mega-column-title">
                                <i class="fa-solid fa-briefcase text-gold me-1.5"></i> Professional Studies
                            </div>
                            
                            <div class="mega-sub-header">Management & Commerce</div>
                            <a href="school-of-business-administration-management.php" class="mega-item-link">School of Business Administration</a>
                            <a href="department-of-management-studies.php" class="mega-item-link">Department of Management Studies</a>
                            <a href="department-of-commerce.php" class="mega-item-link">Department of Commerce</a>

                            <div class="mega-sub-header">Sciences & Humanities</div>
                            <a href="department-of-arts.php" class="mega-item-link">Department of Arts & Social Sciences</a>
                            <a href="department-of-science.php" class="mega-item-link">Department of Science</a>
                            <a href="department-of-agriculture.php" class="mega-item-link">School of Agricultural Sciences</a>

                            <div class="mega-sub-header">Education & Law</div>
                            <a href="department-of-education.php" class="mega-item-link">Department of Education</a>
                            <a href="department-of-law.php" class="mega-item-link">College of Legal Studies (Law)</a>
                        </div>

                        <!-- Col 4: Faculty of Medical Science & Academic Calendar -->
                        <div class="col-lg-3">
                            <div class="mega-column-title">
                                <i class="fa-solid fa-heart-pulse text-gold me-1.5"></i> Medical & AYUSH
                            </div>
                            
                            <div class="mega-sub-header">Medical Sciences</div>
                            <a href="https://rnkmamc.in/" target="_blank" class="mega-item-link">
                                <i class="fa-solid fa-arrow-up-right-from-square text-muted me-1" style="font-size: 0.65rem;"></i> School of Ayurveda & Panchkarma
                            </a>
                            <a href="https://rnkmhmc.in/" target="_blank" class="mega-item-link">
                                <i class="fa-solid fa-arrow-up-right-from-square text-muted me-1" style="font-size: 0.65rem;"></i> School of Homeopathy
                            </a>

                            <div class="mega-column-title mt-4">
                                <i class="fa-solid fa-calendar-days text-gold me-1.5"></i> Academic Schedule
                            </div>
                            <a href="academic-calendar.php" class="mega-item-link fw-semibold text-primary">
                                <i class="fa-solid fa-calendar-check text-gold me-1"></i> Academic Calendar 2026
                            </a>
                            <a href="student-holiday-calender.php" class="mega-item-link">
                                <i class="fa-solid fa-umbrella-beach text-muted me-1"></i> Student Holiday Calendar
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- 3. Admissions Dropdown -->
            <div class="dropdown">
                <a href="admission-procedure.php" class="nav-link-item" data-bs-toggle="dropdown" aria-expanded="false">
                    Admissions
                </a>
                <ul class="dropdown-menu shadow border-custom rounded-3 py-2 mt-2" style="min-width: 240px;">
                    <li><a class="dropdown-item py-1.5 small fw-medium text-primary" href="admission-procedure.php"><i class="fa-solid fa-circle-check text-gold me-2"></i> Admission Procedure</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="ph-d-selection-process.php">Ph.D Selection Process</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="fee-structure.php">Fee Structure</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="admission-assistance.php">Admission Assistance</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="admission-committee.php">Admission Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="scholarships.php">Scholarships</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="general-rules-and-regulations.php">General Rules & Regulations</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="hostel-rules-regulations.php">Hostel Rules & Regulations</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="faqs.php">Admission FAQs</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="download-form.php">Download Application Form</a></li>
                </ul>
            </div>

            <!-- 4. Examination Dropdown -->
            <div class="dropdown">
                <a href="about-the-section.php" class="nav-link-item" data-bs-toggle="dropdown" aria-expanded="false">
                    Examinations
                </a>
                <ul class="dropdown-menu shadow border-custom rounded-3 py-2 mt-2" style="min-width: 240px;">
                    <li><a class="dropdown-item py-1.5 small" href="about-the-section.php">Section Overview</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="examination-committee.php">Examination Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="examination-calendar.php">Examination Schedule</a></li>
                    <li><a class="dropdown-item py-1.5 small fw-medium text-primary" href="results.php"><i class="fa-solid fa-award text-gold me-2"></i> Results Portal</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="exam-notice.php">Exam Notices</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="exam-policy.php">Exam Policies & Rules</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="exam-code.php">Exam Code of Conduct</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="old-question-papers.php">Old Question Papers</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="convocation.php">Convocation</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="digi-locker-nad-gov-in.php">DigiLocker (NAD)</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="admit-card-download.php">Admit Card Download</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="forms.php">Examination Forms</a></li>
                </ul>
            </div>

            <!-- 5. Committees Dropdown -->
            <div class="dropdown">
                <a href="anti-reggiging-committee.php" class="nav-link-item" data-bs-toggle="dropdown" aria-expanded="false">
                    Committees
                </a>
                <ul class="dropdown-menu shadow border-custom rounded-3 py-2 mt-2" style="min-width: 280px; max-height: 80vh; overflow-y: auto;">
                    <li><a class="dropdown-item py-1.5 small" href="anti-reggiging-committee.php"><i class="fa-solid fa-shield-halved text-primary me-2"></i> Anti Ragging Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="academic-committee.php">Academic Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="staff-selection-screening-committee.php">Cultural Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="employee-grievance-wellfare-cell.php">Employee Grievance & Welfare</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="equalization-committee.php">Equalization Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="infrastructure-campus-beautification-committee.php">Campus Beautification Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="regulatory-committee.php">Regulatory Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="management-information-system-erp-committee.php">MIS / ERP Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="library-committee.php">Library Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="womens-grievance-redressal-and-welfare-cell.php">Women’s Grievance Cell</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="jan-aushadhi-committee.php">Jan Aushadhi Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="fdp-committee.php">FDP Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="purchase-committee.php">Purchase Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="intellectual-property-rights-cell-ipr-cell.php">IPR Cell</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="icc.php">Internal Complaint (ICC)</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="sprots-committee.php">Sports Committee</a></li>
                </ul>
            </div>

            <!-- 6. Placements Dropdown -->
            <div class="dropdown">
                <a href="placement-cell.php" class="nav-link-item" data-bs-toggle="dropdown" aria-expanded="false">
                    Placements
                </a>
                <ul class="dropdown-menu shadow border-custom rounded-3 py-2 mt-2" style="min-width: 240px;">
                    <li><a class="dropdown-item py-1.5 small fw-medium text-primary" href="our-recruiters.php"><i class="fa-solid fa-handshake text-gold me-2"></i> Our 500+ Recruiters</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="placement-cell.php">Training & Placement Cell</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="corporate-interaction.php">Corporate Interactions</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="visits-events.php">Visits & Events</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="tp-industry.php">Industry Linkage Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="placement-chart.php">Placement Statistics</a></li>
                </ul>
            </div>

            <!-- 7. Research Dropdown -->
            <div class="dropdown">
                <a href="#research" class="nav-link-item" data-bs-toggle="dropdown" aria-expanded="false">
                    Research
                </a>
                <ul class="dropdown-menu shadow border-custom rounded-3 py-2 mt-2" style="min-width: 250px;">
                    <li><a class="dropdown-item py-1.5 small fw-medium text-primary" href="incubation-center.php"><i class="fa-solid fa-lightbulb text-gold me-2"></i> Kalam Incubation Center</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="research-committee.php">R&D Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="ugc-recognition.php">UGC Recognition</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="fees-details.php">Ph.D Fee Details</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="ph-d-selection-process.php">Ph.D Selection Process</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="faculty-publications.php">Faculty Publications</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="https://jiips.in/">JIIPS Research Journal</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="https://jier.co.in/">JIER Research Journal</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="iqac.php">IQAC</a></li>
                </ul>
            </div>

            <!-- 8. Student Zone Dropdown -->
            <div class="dropdown">
                <a href="notice-board.php" class="nav-link-item" data-bs-toggle="dropdown" aria-expanded="false">
                    Student Zone
                </a>
                <ul class="dropdown-menu shadow border-custom rounded-3 py-2 mt-2" style="min-width: 240px;">
                    <li><a class="dropdown-item py-1.5 small fw-medium text-primary" href="notice-board.php"><i class="fa-solid fa-bell text-gold me-2"></i> Notice Board</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="student-grievance-cell.php">Student Grievance Cell</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="sc-st-committee.php">SC/ST Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="scholarship-committee.php">Scholarship Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="transport-committee.php">Hostel & Transport Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="download-form-student.php">Download Forms</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="sgrc.php">SGRC</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="ncc-nss-cell.php">NCC / NSS Cell</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="alumini-committee.php">Alumni Committee</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="student-holiday-calender.php">Student Holiday Calendar</a></li>
                </ul>
            </div>

            <!-- 9. Campus Life / Events Dropdown -->
            <div class="dropdown">
                <a href="gallery.php" class="nav-link-item" data-bs-toggle="dropdown" aria-expanded="false">
                    Campus Life
                </a>
                <ul class="dropdown-menu shadow border-custom rounded-3 py-2 mt-2" style="min-width: 220px;">
                    <li><a class="dropdown-item py-1.5 small fw-medium" href="gallery.php"><i class="fa-solid fa-images text-gold me-2"></i> Photo Gallery</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="world-class-infrastructure.php">Life @ AKU Campus</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="students-testomonials.php">Student Testimonials</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="visiters-testomonials.php">Visitor Testimonials</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="university-events.php">University Events &amp; Fests</a></li>
                </ul>
            </div>

        </nav>

        <!-- Right Quick Action Buttons (Exact Lovable Parity) -->
        <div class="d-none d-sm-flex align-items-center gap-2 flex-shrink-0">
            
            <!-- Search Button (Exact Circle Icon) -->
            <button class="btn btn-search-circle" aria-label="Search" title="Search" onclick="let q = prompt('Search AKU website:'); if(q) window.location.href='notice-board.php?search='+encodeURIComponent(q);">
                <i class="fa-solid fa-magnifying-glass" style="font-size: 13px;"></i>
            </button>

            <!-- Portals Dropdown Button (Includes All Student/Gov/IQAC Portals) -->
            <div class="dropdown">
                <button class="btn btn-portals-pill d-inline-flex align-items-center gap-1.5" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Portals">
                    <i class="fa-solid fa-user-gear" style="font-size: 12px; color: var(--gold-color);"></i>
                    <span>Portals</span>
                    <i class="fa-solid fa-chevron-down ms-0.5" style="font-size: 9px; color: #706361;"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border-custom rounded-3 py-2 mt-2" style="min-width: 230px;">
                    <li><a class="dropdown-item py-1.5 small" href="https://www.universitymanagementsystem.in/aku/Home/Dashboard" target="_blank"><i class="fa-solid fa-file-circle-check text-gold me-2"></i> Document Verify (UMS)</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="https://login.rssrcampusconnect.com/" target="_blank"><i class="fa-solid fa-right-to-bracket text-gold me-2"></i> Student ERP Login</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="results.php"><i class="fa-solid fa-award text-gold me-2"></i> Results Portal</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="academic-calendar.php"><i class="fa-solid fa-calendar me-2"></i> Academic Calendar</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="notice-board.php"><i class="fa-solid fa-bell me-2"></i> Notice Board</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="iqac.php"><i class="fa-solid fa-certificate text-primary me-2"></i> IQAC (NAAC / NIRF)</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="career.php"><i class="fa-solid fa-briefcase text-gold me-2"></i> Careers @ AKU</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="https://samadhaan.ugc.ac.in/" target="_blank"><i class="fa-solid fa-building-columns me-2"></i> UGC e-Samadhan</a></li>
                    <li><a class="dropdown-item py-1.5 small" href="rti-act.php"><i class="fa-solid fa-scale-balanced me-2"></i> RTI Act</a></li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li><a class="dropdown-item py-1.5 small" href="admin/login.php"><i class="fa-solid fa-lock text-primary me-2"></i> CMS Admin Login</a></li>
                </ul>
            </div>

            <!-- Apply Now Pill Button -->
            <a href="apply-now.php" class="btn btn-apply-pill d-inline-flex align-items-center gap-1.5">
                <i class="fa-solid fa-graduation-cap" style="font-size: 13px; color: var(--gold-color);"></i>
                <span>Apply Now</span>
            </a>
            
        </div>

        <!-- Mobile Offcanvas Trigger Button -->
        <button class="btn btn-outline-dark border-custom d-xl-none rounded-3 px-2 py-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileNavOffcanvas" aria-controls="mobileNavOffcanvas" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars fs-5"></i>
        </button>

    </div>
</header>

<!-- Bootstrap 5 Offcanvas Drawer for Mobile -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileNavOffcanvas" aria-labelledby="mobileNavOffcanvasLabel" style="width: 320px;">
    <div class="offcanvas-header border-bottom border-custom">
        <div class="d-flex align-items-center gap-2">
            <img src="assets/lovable/aku-logo.jpeg" alt="Logo" style="height: 32px; width: auto;" class="rounded"/>
            <span class="font-serif fw-bold text-primary fs-5" id="mobileNavOffcanvasLabel">AKU INDORE</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3">
        <nav class="nav flex-column gap-1 fw-medium">
            <a href="index.php" class="nav-link py-2 px-3 rounded-2 text-primary fw-bold bg-secondary-tint">Home</a>
            <a href="why-aku.php" class="nav-link py-2 px-3 rounded-2 text-dark">About the University</a>
            <a href="department-of-computer-science-engineering.php" class="nav-link py-2 px-3 rounded-2 text-dark">Faculty & Departments</a>
            <a href="academic-calendar.php" class="nav-link py-2 px-3 rounded-2 text-dark">Academic Calendar</a>
            <a href="admission-procedure.php" class="nav-link py-2 px-3 rounded-2 text-dark">Admissions 2026</a>
            <a href="about-the-section.php" class="nav-link py-2 px-3 rounded-2 text-dark">Examinations</a>
            <a href="anti-reggiging-committee.php" class="nav-link py-2 px-3 rounded-2 text-dark">Committees</a>
            <a href="placement-cell.php" class="nav-link py-2 px-3 rounded-2 text-dark">Placements</a>
            <a href="incubation-center.php" class="nav-link py-2 px-3 rounded-2 text-dark">Research & Innovation</a>
            <a href="gallery.php" class="nav-link py-2 px-3 rounded-2 text-dark">Campus Gallery</a>
            <a href="notice-board.php" class="nav-link py-2 px-3 rounded-2 text-dark">Notice Board</a>
            <a href="results.php" class="nav-link py-2 px-3 rounded-2 text-dark">Results Portal</a>
        </nav>
        
        <div class="mt-4 pt-3 border-top border-custom">
            <a href="apply-now.php" class="btn btn-primary w-100 rounded-pill py-2 fw-semibold" style="background-color: var(--primary-color); border-color: var(--primary-color);">
                Begin Application 2026
            </a>
            <a href="admin/login.php" class="btn btn-outline-dark w-100 rounded-pill py-2 mt-2 fw-medium small">
                <i class="fa-solid fa-lock me-1"></i> Admin Panel
            </a>
        </div>
    </div>
</div>

<!-- Header Scroll Glassmorphic Script -->
<script>
    (function() {
        const header = document.getElementById('mainHeader');
        if (header) {
            const handleScroll = function() {
                if (window.scrollY > 20) {
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
