<?php
$current_page = basename($_SERVER['PHP_SELF']);
$about_menu_links = [
    'why-aku.php' => ['title' => 'Why AKU', 'icon' => 'fa-solid fa-star'],
    'the-founder-2.php' => ['title' => 'The Founder', 'icon' => 'fa-solid fa-monument'],
    'the-chancellor.php' => ['title' => 'The Chancellor', 'icon' => 'fa-solid fa-user-tie'],
    'pro-chancellor.php' => ['title' => 'The Pro Chancellor', 'icon' => 'fa-solid fa-user-tie'],
    'the-vice-chancellor.php' => ['title' => 'The Vice Chancellor', 'icon' => 'fa-solid fa-graduation-cap'],
    'registrar.php' => ['title' => 'The Registrar', 'icon' => 'fa-solid fa-signature'],
    'governing-body.php' => ['title' => 'Governing Body', 'icon' => 'fa-solid fa-users-gear'],
    'board-of-management.php' => ['title' => 'Board of Management', 'icon' => 'fa-solid fa-sitemap'],
    'finance-committee.php' => ['title' => 'Finance Committee', 'icon' => 'fa-solid fa-coins'],
    'mandatory-disclosers.php' => ['title' => 'Mandatory Disclosures', 'icon' => 'fa-solid fa-file-shield'],
    'awardsand-recognigation.php' => ['title' => 'Awards & Recognition', 'icon' => 'fa-solid fa-award'],
    'ugc-recognition.php' => ['title' => 'UGC Recognition', 'icon' => 'fa-solid fa-certificate'],
    'aku-in-media.php' => ['title' => 'AKU in Media', 'icon' => 'fa-solid fa-newspaper'],
    'world-class-infrastructure.php' => ['title' => 'Campus Infrastructure', 'icon' => 'fa-solid fa-building-columns']
];
?>

<div class="sidebar-sticky-wrapper">
    <!-- About Navigation Menu Card -->
    <div class="about-sidebar-card">
        <div class="about-sidebar-heading d-flex align-items-center justify-content-between">
            <span>About the University</span>
            <i class="fa-solid fa-landmark text-gold"></i>
        </div>
        
        <nav class="d-flex flex-column">
            <?php foreach ($about_menu_links as $url => $item): 
                $isActive = ($current_page === $url || (isset($_GET['slug']) && $_GET['slug'] === str_replace('.php', '', $url)));
            ?>
            <a href="<?php echo $url; ?>" class="about-nav-link <?php echo $isActive ? 'active' : ''; ?>">
                <span><i class="<?php echo $item['icon']; ?> me-2 <?php echo $isActive ? 'text-gold' : 'text-primary'; ?>" style="font-size: 0.82rem; width: 18px;"></i> <?php echo $item['title']; ?></span>
                <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem; opacity: 0.6;"></i>
            </a>
            <?php endforeach; ?>
        </nav>
    </div>

    <!-- Quick Admissions Help Card -->
    <div class="about-contact-widget">
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.25rem; height: 1px; display: inline-block;"></span> ADMISSIONS 2026
        </div>
        <h4 class="font-serif text-white fs-4 fw-medium mb-2">Begin Your Journey at AKU</h4>
        <p class="small text-white text-opacity-80 mb-3" style="font-size: 0.85rem; line-height: 1.5;">
            Admissions are open for Engineering, Pharmacy, Law, Management & Doctoral programs.
        </p>
        <a href="apply-now.php" class="btn-gold-pill w-100 text-center py-2 text-decoration-none d-block mb-3" style="font-size: 0.85rem;">
            Apply Now <i class="fa-solid fa-arrow-right fs-6 ms-1"></i>
        </a>
        <div class="pt-2 border-top border-white border-opacity-15 small text-white text-opacity-80">
            <div class="d-flex align-items-center gap-2 mb-1">
                <i class="fa-solid fa-phone text-gold" style="font-size: 0.75rem;"></i>
                <a href="tel:+917312530500" class="text-white text-opacity-90 text-decoration-none">+91 731 2530 500</a>
            </div>
            <div class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-envelope text-gold" style="font-size: 0.75rem;"></i>
                <a href="mailto:info@aku.ac.in" class="text-white text-opacity-90 text-decoration-none">info@aku.ac.in</a>
            </div>
        </div>
    </div>
</div>
