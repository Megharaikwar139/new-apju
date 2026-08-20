<?php
// Unified Placements Sidebar Component
$current_placement_page = basename($_SERVER['PHP_SELF']);

$placement_menu_items = [
    'our-recruiters.php' => ['title' => 'Our 500+ Recruiters', 'icon' => 'fa-solid fa-handshake'],
    'placement-cell.php' => ['title' => 'Training & Placement Cell', 'icon' => 'fa-solid fa-briefcase'],
    'corporate-interaction.php' => ['title' => 'Corporate Interactions', 'icon' => 'fa-solid fa-handshake-angle'],
    'visits-events.php' => ['title' => 'Industrial Visits & Events', 'icon' => 'fa-solid fa-industry'],
    'tp-industry.php' => ['title' => 'Industry Linkage Committee', 'icon' => 'fa-solid fa-users-gear'],
    'placement-chart.php' => ['title' => 'Placement Statistics & Records', 'icon' => 'fa-solid fa-chart-line']
];
?>

<div class="sidebar-sticky-wrapper d-flex flex-column gap-4">
    
    <!-- 1. Placements Navigation Menu Card -->
    <div class="about-sidebar-card">
        <div class="about-sidebar-heading d-flex align-items-center justify-content-between">
            <span class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-briefcase text-gold fs-6"></i>
                <span>CAREER & PLACEMENTS</span>
            </span>
            <span class="badge bg-gold text-dark fw-bold rounded-pill" style="font-size: 0.65rem; padding: 0.2rem 0.55rem;">T&amp;P CELL</span>
        </div>
        
        <nav class="d-flex flex-column">
            <?php foreach ($placement_menu_items as $url => $item): 
                $isActive = ($current_placement_page === $url);
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

    <!-- 2. Placement Track Record Statistics Card -->
    <div class="about-contact-widget">
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.25rem; height: 1.5px; display: inline-block;"></span> 2025-26 MILESTONES
        </div>
        <h4 class="font-serif text-white fs-5 fw-bold mb-3">Stellar Career Outcomes</h4>
        
        <div class="d-flex flex-column gap-2 mb-3">
            <div class="d-flex align-items-center justify-content-between p-2 rounded-3 bg-white bg-opacity-10">
                <span class="small text-white text-opacity-90">Highest Package</span>
                <span class="font-serif fw-bold text-gold fs-6">₹24.0 LPA</span>
            </div>
            <div class="d-flex align-items-center justify-content-between p-2 rounded-3 bg-white bg-opacity-10">
                <span class="small text-white text-opacity-90">Corporate Recruiters</span>
                <span class="font-serif fw-bold text-gold fs-6">500+ MNCs</span>
            </div>
            <div class="d-flex align-items-center justify-content-between p-2 rounded-3 bg-white bg-opacity-10">
                <span class="small text-white text-opacity-90">Placement Success Rate</span>
                <span class="font-serif fw-bold text-gold fs-6">88.5%</span>
            </div>
        </div>

        <a href="our-recruiters.php" class="btn btn-sm btn-gold-pill w-100 py-2 fw-bold text-center text-decoration-none d-block mb-3" style="font-size: 0.85rem;">
            <i class="fa-solid fa-building me-1"></i> View 500+ Recruiters
        </a>

        <div class="pt-2.5 border-top border-white border-opacity-15 small text-white text-opacity-80">
            <div class="d-flex align-items-center gap-2 mb-1.5">
                <i class="fa-solid fa-envelope text-gold" style="font-size: 0.75rem;"></i>
                <a href="mailto:placements@aku.ac.in" class="text-white text-opacity-90 text-decoration-none">placements@aku.ac.in</a>
            </div>
            <div class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-phone text-gold" style="font-size: 0.75rem;"></i>
                <a href="tel:+917312530500" class="text-white text-opacity-90 text-decoration-none">+91 731 2530 500</a>
            </div>
        </div>
    </div>

</div>
