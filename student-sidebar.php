<?php
// Unified Student Zone Sidebar Component
$current_student_page = basename($_SERVER['PHP_SELF']);

$student_menu_items = [
    'notice-board.php' => ['title' => 'Official Notice Board', 'icon' => 'fa-solid fa-bell'],
    'student-grievance-cell.php' => ['title' => 'Student Grievance Cell', 'icon' => 'fa-solid fa-scale-balanced'],
    'sc-st-committee.php' => ['title' => 'SC / ST Welfare Cell', 'icon' => 'fa-solid fa-hands-holding-child'],
    'scholarship-committee.php' => ['title' => 'Scholarship Cell & Govt Schemes', 'icon' => 'fa-solid fa-award'],
    'transport-committee.php' => ['title' => 'Hostel & Transport Committee', 'icon' => 'fa-solid fa-bus'],
    'download-form-student.php' => ['title' => 'Download Student Forms', 'icon' => 'fa-solid fa-file-pdf'],
    'sgrc.php' => ['title' => 'Students Grievance (SGRC)', 'icon' => 'fa-solid fa-shield-halved'],
    'ncc-nss-cell.php' => ['title' => 'NCC & NSS Social Wing', 'icon' => 'fa-solid fa-flag'],
    'alumini-committee.php' => ['title' => 'Alumni Relations Cell', 'icon' => 'fa-solid fa-users-line'],
    'student-holiday-calender.php' => ['title' => 'Student Holiday Calendar', 'icon' => 'fa-solid fa-calendar-days']
];
?>

<div class="sidebar-sticky-wrapper d-flex flex-column gap-4">
    
    <!-- 1. Student Zone Navigation Menu Card -->
    <div class="about-sidebar-card">
        <div class="about-sidebar-heading d-flex align-items-center justify-content-between">
            <span class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-user-graduate text-gold fs-6"></i>
                <span>STUDENT ZONE</span>
            </span>
            <span class="badge bg-gold text-dark fw-bold rounded-pill" style="font-size: 0.65rem; padding: 0.2rem 0.55rem;">PORTAL</span>
        </div>
        
        <nav class="d-flex flex-column" style="max-height: 460px; overflow-y: auto;">
            <?php foreach ($student_menu_items as $url => $item): 
                $isActive = ($current_student_page === $url);
            ?>
            <a href="<?php echo $url; ?>" class="about-nav-link <?php echo $isActive ? 'active' : ''; ?>">
                <span>
                    <i class="<?php echo $item['icon']; ?> me-2 <?php echo $isActive ? 'text-gold' : 'text-primary'; ?>" style="font-size: 0.84rem; width: 18px; text-align: center;"></i> 
                    <?php echo $item['title']; ?>
                </span>
                <i class="fa-solid fa-chevron-right" style="font-size: 0.68rem; opacity: 0.55;"></i>
            </a>
            <?php endforeach; ?>
        </nav>
    </div>

    <!-- 2. Student Support & ERP Access Card -->
    <div class="about-contact-widget">
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.25rem; height: 1.5px; display: inline-block;"></span> STUDENT SERVICES
        </div>
        <h4 class="font-serif text-white fs-5 fw-bold mb-2">Campus Connect ERP</h4>
        <p class="small text-white text-opacity-80 mb-3" style="font-size: 0.85rem; line-height: 1.55;">
            Access online fee payment, attendance records, semester grade cards, and e-learning resources 24x7.
        </p>
        <a href="http://erp.aku.ac.in/" target="_blank" class="btn btn-sm btn-gold-pill w-100 py-2 fw-bold text-center text-decoration-none d-block mb-3" style="font-size: 0.85rem;">
            <i class="fa-solid fa-right-to-bracket me-1"></i> Student ERP Login
        </a>
        <div class="pt-2.5 border-top border-white border-opacity-15 small text-white text-opacity-80">
            <div class="d-flex align-items-center gap-2 mb-1.5">
                <i class="fa-solid fa-phone text-gold" style="font-size: 0.75rem;"></i>
                <a href="tel:+917312530500" class="text-white text-opacity-90 text-decoration-none">+91 731 2530 500</a>
            </div>
            <div class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-envelope text-gold" style="font-size: 0.75rem;"></i>
                <a href="mailto:studenthelp@aku.ac.in" class="text-white text-opacity-90 text-decoration-none">studenthelp@aku.ac.in</a>
            </div>
        </div>
    </div>

</div>
