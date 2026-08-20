<?php
// Unified Research & R&D Sidebar Component
$current_research_page = basename($_SERVER['PHP_SELF']);

$research_menu_items = [
    'incubation-center.php' => ['title' => 'Kalam Incubation Center', 'icon' => 'fa-solid fa-lightbulb', 'is_external' => false],
    'research-committee.php' => ['title' => 'R&D Committee', 'icon' => 'fa-solid fa-flask-vial', 'is_external' => false],
    'ugc-recognition.php' => ['title' => 'UGC Recognition', 'icon' => 'fa-solid fa-certificate', 'is_external' => false],
    'ph-d-selection-process.php' => ['title' => 'Ph.D Selection Process', 'icon' => 'fa-solid fa-user-graduate', 'is_external' => false],
    'faculty-publications.php' => ['title' => 'Faculty Publications', 'icon' => 'fa-solid fa-newspaper', 'is_external' => false],
    'https://jiips.in/' => ['title' => 'JIIPS Research Journal', 'icon' => 'fa-solid fa-book-open', 'is_external' => true],
    'https://jier.co.in/' => ['title' => 'JIER Research Journal', 'icon' => 'fa-solid fa-bookmark', 'is_external' => true],
    'iqac.php' => ['title' => 'Internal Quality Assurance (IQAC)', 'icon' => 'fa-solid fa-chart-pie', 'is_external' => false]
];
?>

<div class="sidebar-sticky-wrapper d-flex flex-column gap-4">
    
    <!-- 1. Research Navigation Menu Card -->
    <div class="about-sidebar-card">
        <div class="about-sidebar-heading d-flex align-items-center justify-content-between">
            <span class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-flask text-gold fs-6"></i>
                <span>RESEARCH &amp; INNOVATION</span>
            </span>
            <span class="badge bg-gold text-dark fw-bold rounded-pill" style="font-size: 0.65rem; padding: 0.2rem 0.55rem;">R&amp;D WING</span>
        </div>
        
        <nav class="d-flex flex-column">
            <?php foreach ($research_menu_items as $url => $item): 
                $isActive = ($current_research_page === $url);
            ?>
            <a href="<?php echo $url; ?>" <?php echo $item['is_external'] ? 'target="_blank"' : ''; ?> class="about-nav-link <?php echo $isActive ? 'active' : ''; ?>">
                <span>
                    <i class="<?php echo $item['icon']; ?> me-2 <?php echo $isActive ? 'text-gold' : 'text-primary'; ?>" style="font-size: 0.84rem; width: 18px; text-align: center;"></i> 
                    <?php echo $item['title']; ?>
                </span>
                <?php if ($item['is_external']): ?>
                    <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.68rem; opacity: 0.55;"></i>
                <?php else: ?>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.68rem; opacity: 0.55;"></i>
                <?php endif; ?>
            </a>
            <?php endforeach; ?>
        </nav>
    </div>

    <!-- 2. Research & Innovation Metrics Card -->
    <div class="about-contact-widget">
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.25rem; height: 1.5px; display: inline-block;"></span> RESEARCH IMPACT
        </div>
        <h4 class="font-serif text-white fs-5 fw-bold mb-3">Academic Inventions &amp; R&amp;D</h4>
        
        <div class="d-flex flex-column gap-2 mb-3">
            <div class="d-flex align-items-center justify-content-between p-2 rounded-3 bg-white bg-opacity-10">
                <span class="small text-white text-opacity-90">Patents &amp; IPR</span>
                <span class="font-serif fw-bold text-gold fs-6">50+ Filed</span>
            </div>
            <div class="d-flex align-items-center justify-content-between p-2 rounded-3 bg-white bg-opacity-10">
                <span class="small text-white text-opacity-90">Scopus Publications</span>
                <span class="font-serif fw-bold text-gold fs-6">500+ Papers</span>
            </div>
            <div class="d-flex align-items-center justify-content-between p-2 rounded-3 bg-white bg-opacity-10">
                <span class="small text-white text-opacity-90">Incubated Startups</span>
                <span class="font-serif fw-bold text-gold fs-6">25+ Ventures</span>
            </div>
        </div>

        <a href="incubation-center.php" class="btn btn-sm btn-gold-pill w-100 py-2 fw-bold text-center text-decoration-none d-block mb-3" style="font-size: 0.85rem;">
            <i class="fa-solid fa-lightbulb me-1"></i> Kalam Incubation Center
        </a>

        <div class="pt-2.5 border-top border-white border-opacity-15 small text-white text-opacity-80">
            <div class="d-flex align-items-center gap-2 mb-1.5">
                <i class="fa-solid fa-envelope text-gold" style="font-size: 0.75rem;"></i>
                <a href="mailto:research@aku.ac.in" class="text-white text-opacity-90 text-decoration-none">research@aku.ac.in</a>
            </div>
            <div class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-phone text-gold" style="font-size: 0.75rem;"></i>
                <a href="tel:+917312530500" class="text-white text-opacity-90 text-decoration-none">+91 731 2530 500</a>
            </div>
        </div>
    </div>

</div>
