<?php
$current_page = basename($_SERVER['PHP_SELF']);

$about_menu_groups = [
    'Leadership' => [
        'why-aku.php' => ['title' => 'Why AKU', 'icon' => 'fa-solid fa-star'],
        'the-founder-2.php' => ['title' => 'The Founder', 'icon' => 'fa-solid fa-monument'],
        'the-chairman.php' => ['title' => 'The Chairman', 'icon' => 'fa-solid fa-award'],
        'the-chancellor.php' => ['title' => 'The Chancellor', 'icon' => 'fa-solid fa-user-tie'],
        'pro-chancellor.php' => ['title' => 'The Pro Chancellor', 'icon' => 'fa-solid fa-user-tie'],
        'the-vice-chancellor.php' => ['title' => 'The Vice Chancellor', 'icon' => 'fa-solid fa-graduation-cap'],
        'the-pro-vice-chancellor.php' => ['title' => 'The Pro Vice Chancellor', 'icon' => 'fa-solid fa-user-graduate'],
        'registrar.php' => ['title' => 'The Registrar', 'icon' => 'fa-solid fa-signature'],
        'chief-proctor.php' => ['title' => 'The Chief Proctor', 'icon' => 'fa-solid fa-shield-halved']
    ],
    'Governance' => [
        'governing-body.php' => ['title' => 'Governing Body', 'icon' => 'fa-solid fa-users-gear'],
        'board-of-management.php' => ['title' => 'Board of Management', 'icon' => 'fa-solid fa-sitemap'],
        'academic-council.php' => ['title' => 'Academic Council', 'icon' => 'fa-solid fa-landmark'],
        'sponsoring-body.php' => ['title' => 'Sponsoring Body', 'icon' => 'fa-solid fa-hand-holding-heart'],
        'finance-committee.php' => ['title' => 'Finance Committee', 'icon' => 'fa-solid fa-coins'],
        'mandatory-disclosers.php' => ['title' => 'Mandatory Disclosures', 'icon' => 'fa-solid fa-file-shield'],
        'awardsand-recognigation.php' => ['title' => 'Awards & Recognition', 'icon' => 'fa-solid fa-trophy'],
        'aku-in-media.php' => ['title' => 'AKU in Media', 'icon' => 'fa-solid fa-newspaper']
    ],
    'Accreditations & Infrastructure' => [
        'ugc-recognition.php' => ['title' => 'UGC Recognition', 'icon' => 'fa-solid fa-certificate'],
        'naac.php' => ['title' => 'NAAC Accreditation', 'icon' => 'fa-solid fa-stamp'],
        'nirf.php' => ['title' => 'NIRF Ranking', 'icon' => 'fa-solid fa-chart-line'],
        'ariia.php' => ['title' => 'ARIIA Ranking', 'icon' => 'fa-solid fa-ranking-star'],
        'aicte-approvals.php' => ['title' => 'AICTE Approvals', 'icon' => 'fa-solid fa-file-circle-check'],
        'approvals.php' => ['title' => 'Statutory Approvals', 'icon' => 'fa-solid fa-building-shield'],
        'mous.php' => ['title' => 'Institutional MOUs', 'icon' => 'fa-solid fa-handshake'],
        'world-class-infrastructure.php' => ['title' => 'Campus Infrastructure', 'icon' => 'fa-solid fa-building-columns']
    ]
];
?>

<div class="sidebar-sticky-wrapper d-flex flex-column gap-4">
    <!-- About Navigation Menu Card -->
    <div class="about-sidebar-card">
        <div class="about-sidebar-heading d-flex align-items-center justify-content-between">
            <span class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-landmark text-gold fs-6"></i>
                <span>ABOUT US</span>
            </span>
            <span class="badge bg-gold text-dark fw-bold rounded-pill" style="font-size: 0.65rem; padding: 0.2rem 0.55rem;">OVERVIEW</span>
        </div>
        
        <nav class="d-flex flex-column">
            <?php foreach ($about_menu_groups as $groupTitle => $groupItems): ?>
                <div class="sidebar-group-header px-3 pt-2.5 pb-1 text-uppercase fw-bold text-muted-custom" style="font-size: 0.68rem; letter-spacing: 0.08em; background: rgba(0,0,0,0.02); border-bottom: 1px solid rgba(0,0,0,0.04);">
                    <?php echo $groupTitle; ?>
                </div>
                <?php foreach ($groupItems as $url => $item): 
                    $isActive = ($current_page === $url || (isset($_GET['slug']) && $_GET['slug'] === str_replace('.php', '', $url)));
                ?>
                <a href="<?php echo $url; ?>" class="about-nav-link <?php echo $isActive ? 'active' : ''; ?>">
                    <span>
                        <i class="<?php echo $item['icon']; ?> me-2 <?php echo $isActive ? 'text-gold' : 'text-primary'; ?>" style="font-size: 0.82rem; width: 18px; text-align: center;"></i> 
                        <?php echo $item['title']; ?>
                    </span>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.68rem; opacity: 0.55;"></i>
                </a>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </nav>
    </div>

    <!-- Quick Admissions Help Card -->
    <div class="about-contact-widget">
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.25rem; height: 1.5px; display: inline-block;"></span> ADMISSIONS 2026
        </div>
        <h4 class="font-serif text-white fs-5 fw-bold mb-2">Begin Your Journey at AKU</h4>
        <p class="small text-white text-opacity-80 mb-3" style="font-size: 0.85rem; line-height: 1.55;">
            Admissions are open for Engineering, Pharmacy, Law, Management &amp; Doctoral programs.
        </p>
        <a href="apply-now.php" class="btn btn-sm btn-gold-pill w-100 py-2 fw-bold text-center text-decoration-none d-block mb-3" style="font-size: 0.85rem;">
            Apply Now <i class="fa-solid fa-arrow-right fs-6 ms-1"></i>
        </a>
        <div class="pt-2.5 border-top border-white border-opacity-15 small text-white text-opacity-80">
            <div class="d-flex align-items-center gap-2 mb-1.5">
                <i class="fa-solid fa-phone-volume text-gold" style="font-size: 0.75rem;"></i>
                <span>Toll Free: <a href="tel:180030026072" class="text-white text-opacity-90 text-decoration-none fw-semibold">180030026072</a></span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-envelope text-gold" style="font-size: 0.75rem;"></i>
                <a href="mailto:info@aku.ac.in" class="text-white text-opacity-90 text-decoration-none">info@aku.ac.in</a>
            </div>
        </div>
    </div>
</div>
