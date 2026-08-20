<?php
// Unified Campus Life Sidebar Component
$current_campus_page = basename($_SERVER['PHP_SELF']);

$campus_menu_items = [
    'gallery.php' => ['title' => 'Campus Photo Gallery', 'icon' => 'fa-solid fa-images'],
    'world-class-infrastructure.php' => ['title' => 'Life @ AKU & Infrastructure', 'icon' => 'fa-solid fa-building-columns'],
    'students-testomonials.php' => ['title' => 'Student Video Testimonials', 'icon' => 'fa-solid fa-video'],
    'visiters-testomonials.php' => ['title' => 'Dignitary & Visitor Reviews', 'icon' => 'fa-solid fa-comments']
];
?>

<div class="sidebar-sticky-wrapper d-flex flex-column gap-4">
    
    <!-- 1. Campus Life Navigation Menu Card -->
    <div class="about-sidebar-card">
        <div class="about-sidebar-heading d-flex align-items-center justify-content-between">
            <span class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-tree-city text-gold fs-6"></i>
                <span>CAMPUS LIFE</span>
            </span>
            <span class="badge bg-gold text-dark fw-bold rounded-pill" style="font-size: 0.65rem; padding: 0.2rem 0.55rem;">EXPERIENCE</span>
        </div>
        
        <nav class="d-flex flex-column">
            <?php foreach ($campus_menu_items as $url => $item): 
                $isActive = ($current_campus_page === $url);
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

    <!-- 2. Campus Highlights & Virtual Tour Card -->
    <div class="about-contact-widget">
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.25rem; height: 1.5px; display: inline-block;"></span> CAMPUS ECOSYSTEM
        </div>
        <h4 class="font-serif text-white fs-5 fw-bold mb-3">Vibrant 50-Acre Campus</h4>
        
        <div class="d-flex flex-column gap-2 mb-3">
            <div class="d-flex align-items-center justify-content-between p-2 rounded-3 bg-white bg-opacity-10">
                <span class="small text-white text-opacity-90">Wi-Fi &amp; Hi-Tech Labs</span>
                <span class="font-serif fw-bold text-gold fs-6">100+ Labs</span>
            </div>
            <div class="d-flex align-items-center justify-content-between p-2 rounded-3 bg-white bg-opacity-10">
                <span class="small text-white text-opacity-90">Hostels Capacity</span>
                <span class="font-serif fw-bold text-gold fs-6">1000+ Beds</span>
            </div>
            <div class="d-flex align-items-center justify-content-between p-2 rounded-3 bg-white bg-opacity-10">
                <span class="small text-white text-opacity-90">Sports &amp; Fitness Hub</span>
                <span class="font-serif fw-bold text-gold fs-6">Olympic Size</span>
            </div>
        </div>

        <a href="gallery.php" class="btn btn-sm btn-gold-pill w-100 py-2 fw-bold text-center text-decoration-none d-block mb-3" style="font-size: 0.85rem;">
            <i class="fa-solid fa-images me-1"></i> View Photo Gallery
        </a>

        <div class="pt-2.5 border-top border-white border-opacity-15 small text-white text-opacity-80">
            <div class="d-flex align-items-center gap-2 mb-1.5">
                <i class="fa-solid fa-location-dot text-gold" style="font-size: 0.75rem;"></i>
                <span class="text-white text-opacity-90">Bypass Road, Indore (M.P.)</span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-phone text-gold" style="font-size: 0.75rem;"></i>
                <a href="tel:+917312530500" class="text-white text-opacity-90 text-decoration-none">+91 731 2530 500</a>
            </div>
        </div>
    </div>

</div>
