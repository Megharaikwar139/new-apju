<?php
// Unified Committees Sidebar Component
$current_committee_page = basename($_SERVER['PHP_SELF']);

$committee_menu_items = [
    'anti-reggiging-committee.php' => ['title' => 'Anti Ragging Committee', 'icon' => 'fa-solid fa-shield-halved'],
    'anti-ragging-squad.php' => ['title' => 'Anti Ragging Squad', 'icon' => 'fa-solid fa-shield-cat'],
    'academic-committee.php' => ['title' => 'Academic Committee', 'icon' => 'fa-solid fa-graduation-cap'],
    'cultruaral-committee.php' => ['title' => 'Cultural Committee', 'icon' => 'fa-solid fa-masks-theater'],
    'employee-grievance-wellfare-cell.php' => ['title' => 'Employee Grievance / Welfare Cell', 'icon' => 'fa-solid fa-hands-holding-child'],
    'equalization-committee.php' => ['title' => 'Equalization Committee', 'icon' => 'fa-solid fa-scale-balanced'],
    'infrastructure-campus-beautification-committee.php' => ['title' => 'Infrastructure / Beautification', 'icon' => 'fa-solid fa-tree-city'],
    'regulatory-committee.php' => ['title' => 'Regulatory Committee', 'icon' => 'fa-solid fa-gavel'],
    'management-information-system-erp-committee.php' => ['title' => 'MIS / ERP Committee', 'icon' => 'fa-solid fa-server'],
    'library-committee.php' => ['title' => 'Library Committee', 'icon' => 'fa-solid fa-book-bookmark'],
    'womens-grievance-redressal-and-welfare-cell.php' => ['title' => 'Women’s Grievance Redressal Cell', 'icon' => 'fa-solid fa-person-dress'],
    'jan-aushadhi-committee.php' => ['title' => 'Jan Aushadhi Committee', 'icon' => 'fa-solid fa-pills'],
    'fdp-committee.php' => ['title' => 'FDP Committee', 'icon' => 'fa-solid fa-chalkboard-user'],
    'purchase-committee.php' => ['title' => 'Purchase Committee', 'icon' => 'fa-solid fa-cart-flatbed'],
    'intellectual-property-rights-cell-ipr-cell.php' => ['title' => 'IPR & Patent Cell', 'icon' => 'fa-solid fa-lightbulb'],
    'icc.php' => ['title' => 'Internal Complaint Committee (ICC)', 'icon' => 'fa-solid fa-shield'],
    'sprots-committee.php' => ['title' => 'Sports Committee', 'icon' => 'fa-solid fa-volleyball'],
    'hostel-disciplinary-committee.php' => ['title' => 'Hostel Disciplinary Committee', 'icon' => 'fa-solid fa-hotel'],
    'i-block-seminar-hall-committee.php' => ['title' => 'I-Block Seminar Hall Committee', 'icon' => 'fa-solid fa-chalkboard']
];
?>

<div class="sidebar-sticky-wrapper d-flex flex-column gap-4">
    
    <!-- 1. Committee Navigation Menu Card -->
    <div class="about-sidebar-card">
        <div class="about-sidebar-heading d-flex align-items-center justify-content-between">
            <span class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-sitemap text-gold fs-6"></i>
                <span>STATUTORY COMMITTEES</span>
            </span>
            <span class="badge bg-gold text-dark fw-bold rounded-pill" style="font-size: 0.65rem; padding: 0.2rem 0.55rem;">BODIES</span>
        </div>
        
        <nav class="d-flex flex-column">
            <?php foreach ($committee_menu_items as $url => $item): 
                $isActive = ($current_committee_page === $url);
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

    <!-- 2. Grievance & Student Support Widget -->
    <div class="about-contact-widget">
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.25rem; height: 1.5px; display: inline-block;"></span> STATUTORY SUPPORT
        </div>
        <h4 class="font-serif text-white fs-5 fw-bold mb-2">University Grievance Redressal</h4>
        <p class="small text-white text-opacity-80 mb-3" style="font-size: 0.85rem; line-height: 1.55;">
            Dedicated committees ensure a safe, inclusive, ragging-free campus environment and speedy redressal of grievances.
        </p>
        <a href="anti-reggiging-committee.php" class="btn btn-sm btn-gold-pill w-100 py-2 fw-bold text-center text-decoration-none d-block mb-3" style="font-size: 0.85rem;">
            <i class="fa-solid fa-shield-halved me-1"></i> Anti-Ragging Policy
        </a>
        <div class="pt-2.5 border-top border-white border-opacity-15 small text-white text-opacity-80">
            <div class="d-flex align-items-center gap-2 mb-1.5">
                <i class="fa-solid fa-phone-volume text-gold" style="font-size: 0.75rem;"></i>
                <span>Helpline: <a href="tel:180030026072" class="text-white text-opacity-90 text-decoration-none fw-semibold">180030026072</a></span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-envelope text-gold" style="font-size: 0.75rem;"></i>
                <a href="mailto:grievance@aku.ac.in" class="text-white text-opacity-90 text-decoration-none">grievance@aku.ac.in</a>
            </div>
        </div>
    </div>

</div>
