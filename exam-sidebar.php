<?php
// Unified Examination Sidebar Component
$current_exam_page = basename($_SERVER['PHP_SELF']);

$exam_menu_items = [
    'about-the-section.php' => ['title' => 'Section Overview', 'icon' => 'fa-solid fa-building-columns'],
    'examination-committee.php' => ['title' => 'Exam Committee', 'icon' => 'fa-solid fa-users'],
    'examination-calendar.php' => ['title' => 'Exam Schedule / Datesheet', 'icon' => 'fa-solid fa-calendar-days'],
    'results.php' => ['title' => 'Results Portal', 'icon' => 'fa-solid fa-award'],
    'exam-notice.php' => ['title' => 'Examination Notices', 'icon' => 'fa-solid fa-bullhorn'],
    'exam-policy.php' => ['title' => 'Exam Policies & Rules', 'icon' => 'fa-solid fa-scale-balanced'],
    'exam-code.php' => ['title' => 'Code of Conduct', 'icon' => 'fa-solid fa-gavel'],
    'old-question-papers.php' => ['title' => 'Old Question Papers', 'icon' => 'fa-solid fa-file-lines'],
    'convocation.php' => ['title' => 'Convocation Ceremony', 'icon' => 'fa-solid fa-user-graduate'],
    'digi-locker-nad-gov-in.php' => ['title' => 'DigiLocker (NAD Portal)', 'icon' => 'fa-solid fa-shield-halved'],
    'admit-card-download.php' => ['title' => 'Admit Card Portal', 'icon' => 'fa-solid fa-id-card'],
    'forms.php' => ['title' => 'Examination Forms', 'icon' => 'fa-solid fa-file-invoice']
];
?>

<div class="sidebar-sticky-wrapper d-flex flex-column gap-4">
    
    <!-- 1. Examination Navigation Menu Card -->
    <div class="about-sidebar-card">
        <div class="about-sidebar-heading d-flex align-items-center justify-content-between">
            <span class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-graduation-cap text-gold fs-6"></i>
                <span>EXAMINATIONS</span>
            </span>
            <span class="badge bg-gold text-dark fw-bold rounded-pill" style="font-size: 0.65rem; padding: 0.2rem 0.55rem;">COE</span>
        </div>
        
        <nav class="d-flex flex-column">
            <?php foreach ($exam_menu_items as $url => $item): 
                $isActive = ($current_exam_page === $url);
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

    <!-- 2. Live ERP Results Widget -->
    <div class="about-contact-widget">
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.25rem; height: 1.5px; display: inline-block;"></span> LIVE ERP RESULTS
        </div>
        <h4 class="font-serif text-white fs-5 fw-bold mb-2">Check Exam Results</h4>
        <p class="small text-white text-opacity-80 mb-3" style="font-size: 0.85rem; line-height: 1.55;">
            Access official end-semester grade cards, scorecards, and marksheet verification.
        </p>
        <a href="results.php" class="btn btn-sm btn-gold-pill w-100 py-2 fw-bold text-center text-decoration-none d-block mb-3" style="font-size: 0.85rem;">
            <i class="fa-solid fa-award me-1"></i> Open Results Portal
        </a>
        <div class="pt-2.5 border-top border-white border-opacity-15 small text-white text-opacity-80">
            <div class="d-flex align-items-center gap-2 mb-1.5">
                <i class="fa-solid fa-phone text-gold" style="font-size: 0.75rem;"></i>
                <a href="tel:+917312530500" class="text-white text-opacity-90 text-decoration-none">+91 731 2530 500</a>
            </div>
            <div class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-envelope text-gold" style="font-size: 0.75rem;"></i>
                <a href="mailto:exam@aku.ac.in" class="text-white text-opacity-90 text-decoration-none">exam@aku.ac.in</a>
            </div>
        </div>
    </div>

</div>
