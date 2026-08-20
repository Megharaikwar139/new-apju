<?php 
require_once 'db.php';
include 'header.php'; 

// Fetch dynamic content from about_pages_config
$page_data = [];
try {
    $stmt = $pdo->prepare("SELECT * FROM about_pages_config WHERE page_slug = 'ugc-recognition'");
    $stmt->execute();
    $page_data = $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
} catch (Exception $e) {}

$hero_eyebrow = !empty($page_data['hero_eyebrow']) ? $page_data['hero_eyebrow'] : 'STATUTORY APPROVALS';
$page_title = !empty($page_data['page_title']) ? $page_data['page_title'] : 'UGC Recognition & Approvals';
$hero_subtitle = !empty($page_data['hero_subtitle']) ? $page_data['hero_subtitle'] : 'Recognized by University Grants Commission under Section 2(f)';
$doc_file_1 = !empty($page_data['doc_file_1']) ? $page_data['doc_file_1'] : 'uploads/2026/03/UGC-Expert-Committee-Visited_10-11-May-2019-Complaince-1.pdf';
$doc_title_1 = !empty($page_data['doc_title_1']) ? $page_data['doc_title_1'] : 'UGC Expert Committee Visit & Compliance Report';
$doc_file_2 = !empty($page_data['doc_file_2']) ? $page_data['doc_file_2'] : 'uploads/2025/06/05102020_043755_UGC_APPROVALS.pdf';
$doc_title_2 = !empty($page_data['doc_title_2']) ? $page_data['doc_title_2'] : 'Official UGC Approval Orders';
$main_content = !empty($page_data['main_content']) ? $page_data['main_content'] : '<p class="text-muted-custom small lh-base mb-4">Dr. A.P.J. Abdul Kalam University, Indore is duly established under the Madhya Pradesh Niji Vishwavidyalaya (Sthapana Avam Sanchalan) Adhiniyam and recognized by the <strong>University Grants Commission (UGC)</strong> under Section 2(f) of the UGC Act, 1956. The degrees awarded by the University are valid for government employment and higher education in India and abroad.</p>';
?>

<!-- Inner Page Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="why-aku.php">About</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">UGC Recognition</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> <?php echo htmlspecialchars($hero_eyebrow); ?>
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 900px; line-height: 1.15;">
            <?php echo htmlspecialchars($page_title); ?>
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            <?php echo htmlspecialchars($hero_subtitle); ?>
        </p>
    </div>
</section>

<main class="py-5" style="background-color: var(--bg-ivory);">
    <div class="container-custom">
        <div class="row g-4 g-xl-5">
            
            <!-- Left Main Content Area -->
            <div class="col-lg-8 col-xl-9">
                <article class="inner-main-card">
                    
                    <h2 class="font-serif text-primary fs-3 fw-bold mb-3"><?php echo htmlspecialchars($page_title); ?></h2>
                    <div class="inner-page-body-text mb-4">
                        <?php echo $main_content; ?>
                    </div>

                    <div class="table-responsive">
                        <table class="luxury-table">
                            <thead>
                                <tr>
                                    <th style="width: 15%;">S.No</th>
                                    <th>UGC Recognition Document Title</th>
                                    <th style="width: 25%; text-align: center;">Document</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-bold text-center">1</td>
                                    <td>
                                        <div class="fw-bold text-primary"><?php echo htmlspecialchars($doc_title_1); ?></div>
                                        <div class="small text-muted">Inspection compliance documentation dated 10-11 May 2019</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo htmlspecialchars($doc_file_1); ?>" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1.5 small fw-semibold" style="border-color: var(--primary-color); color: var(--primary-color);">
                                            <i class="fa-solid fa-file-pdf text-danger me-1"></i> View PDF
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-center">2</td>
                                    <td>
                                        <div class="fw-bold text-primary"><?php echo htmlspecialchars($doc_title_2); ?></div>
                                        <div class="small text-muted">Statutory UGC 2(f) inclusion orders</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo htmlspecialchars($doc_file_2); ?>" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1.5 small fw-semibold" style="border-color: var(--primary-color); color: var(--primary-color);">
                                            <i class="fa-solid fa-file-pdf text-danger me-1"></i> View PDF
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row g-3 mt-4">
                        <div class="col-sm-6">
                            <div class="p-3 rounded-4 border border-custom d-flex align-items-center gap-3" style="background: #fcfbf9;">
                                <i class="fa-solid fa-shield-halved text-gold fs-3"></i>
                                <div>
                                    <div class="font-serif text-primary fw-bold fs-6">AICTE Approved</div>
                                    <div class="small text-muted" style="font-size: 0.78rem;">Engineering & Technical courses</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 rounded-4 border border-custom d-flex align-items-center gap-3" style="background: #fcfbf9;">
                                <i class="fa-solid fa-prescription-bottle-medical text-gold fs-3"></i>
                                <div>
                                    <div class="font-serif text-primary fw-bold fs-6">PCI Approved</div>
                                    <div class="small text-muted" style="font-size: 0.78rem;">Pharmacy Council of India</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar Area -->
            <div class="col-lg-4 col-xl-3">
                <?php include 'research-sidebar.php'; ?>
            </div>

        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
