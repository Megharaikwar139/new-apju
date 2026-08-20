<?php 
$pageTitle = "Faculty Publications & Research Output - Dr. APJ Abdul Kalam University, Indore";
include 'header.php'; 

$publicationMetrics = [
    ['label' => 'Scopus & Indexed Papers', 'value' => '486+', 'desc' => 'High-impact journal articles published in Scopus, Web of Science & UGC CARE', 'icon' => 'fa-newspaper'],
    ['label' => 'Patents Filed & Published', 'value' => '53', 'desc' => 'National and international patents granted and published across tech & pharma', 'icon' => 'fa-lightbulb'],
    ['label' => 'Authored Books', 'value' => '29', 'desc' => 'Scholarly academic books and textbooks authored by university professors', 'icon' => 'fa-book'],
    ['label' => 'Book Chapters Published', 'value' => '06', 'desc' => 'Peer-reviewed chapters in international volumes (Springer, Elsevier, CRC)', 'icon' => 'fa-book-open-reader']
];
?>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="incubation-center.php">Research</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Faculty Publications</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> SCHOLARLY RESEARCH OUTPUT
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Faculty Publications &amp; Research Output
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Scopus &amp; Web of Science Publications, Patents &amp; Books
        </p>
    </div>
</section>

<!-- Main Body -->
<main class="py-5" style="background-color: var(--bg-ivory);">
    <div class="container-custom">
        <div class="row g-4 g-xl-5">
            
            <!-- Left Main Content -->
            <div class="col-lg-8 col-xl-9">
                <article class="inner-main-card">
                    
                    <!-- Intro Highlight Card -->
                    <div class="intro-highlight-card mb-5">
                        <div class="d-flex align-items-center gap-3.5">
                            <div class="intro-highlight-badge">
                                <i class="fa-solid fa-award"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Impactful Academic Inventions &amp; Publications</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Faculty members and research scholars at Dr. A.P.J. Abdul Kalam University actively contribute to global scientific literature across engineering, pharmaceutical sciences, computing, biotechnology, business analytics, and social sciences.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- 4 Metric Cards -->
                    <div class="row g-3.5 mb-5">
                        <?php foreach ($publicationMetrics as $metric): ?>
                        <div class="col-md-6">
                            <div class="feature-info-card p-4 h-100 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="d-flex align-items-center justify-content-between mb-2.5">
                                        <span class="font-serif display-6 fw-bold text-primary"><?php echo $metric['value']; ?></span>
                                        <div class="feature-icon-badge" style="width: 44px; height: 44px; font-size: 1.15rem;">
                                            <i class="fa-solid <?php echo $metric['icon']; ?>"></i>
                                        </div>
                                    </div>
                                    <h4 class="font-serif text-primary fs-6 fw-bold mb-1.5"><?php echo $metric['label']; ?></h4>
                                    <p class="small text-muted-custom mb-0" style="font-size: 0.88rem; line-height: 1.6;">
                                        <?php echo $metric['desc']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- University Research Journals -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-book-bookmark"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Official University Research Journals</h3>
                            </div>
                            <span class="badge bg-gold text-dark fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.75rem;">Peer-Reviewed Open Access</span>
                        </div>

                        <div class="row g-3.5">
                            <!-- Journal 1 -->
                            <div class="col-md-6">
                                <div class="feature-info-card p-4 h-100 d-flex flex-column justify-content-between">
                                    <div>
                                        <div class="d-flex align-items-center gap-3 mb-3">
                                            <div class="feature-icon-badge" style="width: 50px; height: 50px; font-size: 1.25rem;">
                                                <i class="fa-solid fa-capsules"></i>
                                            </div>
                                            <div>
                                                <h4 class="font-serif text-primary fs-6 fw-bold mb-0.5">JIIPS Research Journal</h4>
                                                <span class="small text-gold fw-bold text-uppercase" style="font-size: 0.72rem;">Journal of Innovations in Pharmaceutical Sciences</span>
                                            </div>
                                        </div>
                                        <p class="small text-muted-custom mb-3" style="line-height: 1.65; font-size: 0.88rem;">
                                            An international double-blind peer-reviewed journal publishing cutting-edge advancements in novel drug delivery, pharmacology, phytochemistry, and pharmaceutical biotechnology.
                                        </p>
                                    </div>
                                    <a href="https://jiips.in/" target="_blank" class="btn btn-sm btn-gold-pill w-100 py-2 fw-bold text-center">
                                        Visit JIIPS Journal Portal <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Journal 2 -->
                            <div class="col-md-6">
                                <div class="feature-info-card p-4 h-100 d-flex flex-column justify-content-between">
                                    <div>
                                        <div class="d-flex align-items-center gap-3 mb-3">
                                            <div class="feature-icon-badge" style="width: 50px; height: 50px; font-size: 1.25rem;">
                                                <i class="fa-solid fa-microchip"></i>
                                            </div>
                                            <div>
                                                <h4 class="font-serif text-primary fs-6 fw-bold mb-0.5">JIER Research Journal</h4>
                                                <span class="small text-gold fw-bold text-uppercase" style="font-size: 0.72rem;">Journal of Innovative Engineering Research</span>
                                            </div>
                                        </div>
                                        <p class="small text-muted-custom mb-3" style="line-height: 1.65; font-size: 0.88rem;">
                                            A multidisciplinary journal dedicated to high-quality theoretical and applied research papers in AI, Robotics, Renewable Energy, Structural Engineering, and Smart Materials.
                                        </p>
                                    </div>
                                    <a href="https://jier.co.in/" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill w-100 py-2 fw-bold text-center">
                                        Visit JIER Journal Portal <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Research Ethics & Incentive Policy -->
                    <div class="feature-info-card p-4 p-md-4.5 mb-4">
                        <div class="d-flex align-items-center gap-3 mb-3 pb-2.5 border-bottom border-custom">
                            <div class="feature-icon-badge">
                                <i class="fa-solid fa-award"></i>
                            </div>
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-0">Faculty Research Incentive Policy</h4>
                        </div>
                        <ul class="d-flex flex-column gap-2.5 mb-0 ps-0 list-unstyled" style="color: #3e3233; line-height: 1.7; font-size: 0.92rem;">
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Financial Cash Rewards for Scopus/WoS Papers:</strong> Substantial financial bonuses for primary authors publishing in Q1/Q2 indexed journals.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>100% Patent Filing &amp; Attorney Cost Reimbursed:</strong> University sponsors all patent search, attorney drafting, and Indian Patent Office filing fees.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Conference Travel &amp; Registration Grants:</strong> Full financial sponsorship for presenting original research papers at national and IEEE/ACM international conferences.</span>
                            </li>
                        </ul>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <?php include "research-sidebar.php"; ?>
            </div>

        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
