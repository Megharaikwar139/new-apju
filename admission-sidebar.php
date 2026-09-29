<?php
// Unified Admissions Sidebar Component
$current_admission_page = basename($_SERVER['PHP_SELF']);

$admission_menu_items = [
    'programs.php' => ['title' => 'All Academic Programs', 'icon' => 'fa-solid fa-graduation-cap'],
    'apply-now.php' => ['title' => 'Apply Online 2026', 'icon' => 'fa-solid fa-bolt'],
    'admission-assistance.php' => ['title' => 'Admission Assistance', 'icon' => 'fa-solid fa-headset'],
    'admission-procedure.php' => ['title' => 'Admission Procedure', 'icon' => 'fa-solid fa-file-circle-check'],
    'admission-committee.php' => ['title' => 'Admission Committee', 'icon' => 'fa-solid fa-users-gear'],
    'department-intake.php' => ['title' => 'Department Intake Capacity', 'icon' => 'fa-solid fa-chart-pie'],
    'faqs.php' => ['title' => 'FAQs', 'icon' => 'fa-solid fa-circle-question'],
    'fee-structure.php' => ['title' => 'Fee Structure', 'icon' => 'fa-solid fa-receipt', 'aliases' => ['fees-details.php']],
    'general-rules-and-regulations.php' => ['title' => 'General Rules & Regulations', 'icon' => 'fa-solid fa-scale-balanced'],
    'hostel-rules-regulations.php' => ['title' => 'Hostel Rules & Regulations', 'icon' => 'fa-solid fa-hotel'],
    'scholarships.php' => ['title' => 'Scholarships', 'icon' => 'fa-solid fa-award'],
    'download-form.php' => ['title' => 'Admission Application Form', 'icon' => 'fa-solid fa-file-arrow-down']
];
?>

<div class="sidebar-sticky-wrapper d-flex flex-column gap-4">
    
    <!-- 1. Admissions Navigation Menu Card -->
    <div class="about-sidebar-card">
        <div class="about-sidebar-heading d-flex align-items-center justify-content-between">
            <span class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-door-open text-gold fs-6"></i>
                <span>ADMISSIONS</span>
            </span>
            <span class="badge bg-gold text-dark fw-bold rounded-pill" style="font-size: 0.65rem; padding: 0.2rem 0.55rem;">2026-27</span>
        </div>
        
        <nav class="d-flex flex-column">
            <?php foreach ($admission_menu_items as $url => $item): 
                $isActive = ($current_admission_page === $url || (isset($item['aliases']) && in_array($current_admission_page, $item['aliases'])));
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

    <!-- 2. Admissions Helpline & Quick Apply Widget -->
    <div class="about-contact-widget">
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.25rem; height: 1.5px; display: inline-block;"></span> ADMISSIONS DESK
        </div>
        <h4 class="font-serif text-white fs-5 fw-bold mb-2">Apply for Session 2026-27</h4>
        <p class="small text-white text-opacity-80 mb-3" style="font-size: 0.85rem; line-height: 1.55;">
            Applications are invited for UG, PG, Diploma & Ph.D programs. Get counseling and merit scholarships.
        </p>
        <a href="apply-now.php" class="btn btn-sm btn-gold-pill w-100 py-2 fw-bold text-center text-decoration-none d-block mb-3" style="font-size: 0.85rem;">
            <i class="fa-solid fa-bolt me-1"></i> Apply Online Now
        </a>
        <div class="pt-2.5 border-top border-white border-opacity-15 small text-white text-opacity-80">
            <div class="d-flex align-items-center gap-2 mb-1.5">
                <i class="fa-solid fa-phone-volume text-gold" style="font-size: 0.75rem;"></i>
                <span>Toll Free: <a href="tel:180030026072" class="text-white text-opacity-90 text-decoration-none fw-semibold">180030026072</a></span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-envelope text-gold" style="font-size: 0.75rem;"></i>
                <a href="mailto:admissions@aku.ac.in" class="text-white text-opacity-90 text-decoration-none">admissions@aku.ac.in</a>
            </div>
        </div>
    </div>

</div>
