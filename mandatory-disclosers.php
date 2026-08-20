<?php 
require_once 'db.php';
include 'header.php'; 

// Fetch dynamic content from about_pages_config
$page_data = [];
try {
    $stmt = $pdo->prepare("SELECT * FROM about_pages_config WHERE page_slug = 'mandatory-disclosers'");
    $stmt->execute();
    $page_data = $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
} catch (Exception $e) {}

$hero_eyebrow = !empty($page_data['hero_eyebrow']) ? $page_data['hero_eyebrow'] : 'STATUTORY COMPLIANCE & TRANSPARENCY';
$page_title = !empty($page_data['page_title']) ? $page_data['page_title'] : 'Mandatory Disclosures & Approvals';
$hero_subtitle = !empty($page_data['hero_subtitle']) ? $page_data['hero_subtitle'] : 'Statutory Notifications, UGC Approvals, Statutes, and Ordinances';
$doc_file_1 = !empty($page_data['doc_file_1']) ? $page_data['doc_file_1'] : 'uploads/2025/04/Gazetted_Notification.pdf';
$doc_file_2 = !empty($page_data['doc_file_2']) ? $page_data['doc_file_2'] : 'uploads/2026/03/UGC-Expert-Committee-Visited_10-11-May-2019-Complaince-1.pdf';
$main_content = !empty($page_data['main_content']) ? $page_data['main_content'] : '<p class="text-muted-custom small lh-base mb-4">In accordance with the regulatory norms of the University Grants Commission (UGC) and statutory bodies, Dr. A.P.J. Abdul Kalam University publishes all official government gazettes, statutes, ordinances, and regulatory compliance documents.</p>';
?>

<!-- Inner Page Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="why-aku.php">About</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Mandatory Disclosures</span>
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

                    <!-- Section 1: Gazetted Notification -->
                    <div class="mb-5 pb-4 border-bottom border-custom">
                        <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                            <h3 class="font-serif text-primary fs-4 fw-bold m-0"><i class="fa-solid fa-stamp text-gold me-2"></i> 1. Gazetted Notification</h3>
                            <a href="<?php echo htmlspecialchars($doc_file_1); ?>" target="_blank" class="btn btn-sm btn-gold-pill py-1.5 px-3 small">
                                <i class="fa-solid fa-file-pdf me-1"></i> Open Full PDF
                            </a>
                        </div>
                        <div class="rounded-4 overflow-hidden border border-custom" style="height: 380px;">
                            <iframe src="<?php echo htmlspecialchars($doc_file_1); ?>" width="100%" height="100%" frameborder="0" style="border: none;"></iframe>
                        </div>
                    </div>

                    <!-- Section 2: UGC Approvals -->
                    <div class="mb-5 pb-4 border-bottom border-custom">
                        <h3 class="font-serif text-primary fs-4 fw-bold mb-3"><i class="fa-solid fa-certificate text-gold me-2"></i> 2. UGC Approvals & Inspection Compliance</h3>
                        <div class="table-responsive">
                            <table class="luxury-table mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 15%;">S.No</th>
                                        <th>Statutory Document</th>
                                        <th style="width: 25%; text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-center">1</td>
                                        <td>
                                            <div class="fw-bold text-primary">UGC Expert Committee Visit & Compliance Report</div>
                                            <div class="small text-muted">UGC Expert Committee compliance documentation</div>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo htmlspecialchars($doc_file_2); ?>" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1 small fw-semibold" style="border-color: var(--primary-color); color: var(--primary-color);">
                                                <i class="fa-solid fa-download me-1"></i> Download
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-center">2</td>
                                        <td>
                                            <div class="fw-bold text-primary">Official UGC Approval Letters</div>
                                            <div class="small text-muted">Statutory recognition orders under Section 2(f)</div>
                                        </td>
                                        <td class="text-center">
                                            <a href="uploads/2025/06/05102020_043755_UGC_APPROVALS.pdf" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1 small fw-semibold" style="border-color: var(--primary-color); color: var(--primary-color);">
                                                <i class="fa-solid fa-download me-1"></i> Download
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Section 3: Statutes & Ordinances -->
                    <div class="mb-4">
                        <h3 class="font-serif text-primary fs-4 fw-bold mb-3"><i class="fa-solid fa-book-bookmark text-gold me-2"></i> 3. University Statutes & Ordinances</h3>
                        <div class="table-responsive">
                            <table class="luxury-table mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 15%;">S.No</th>
                                        <th>Official Statute / Ordinance Document</th>
                                        <th style="width: 25%; text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-center">1</td>
                                        <td>
                                            <div class="fw-bold text-primary">Dr. APJ Abdul Kalam University Statutes</div>
                                            <div class="small text-muted">Official academic and administrative statute compendium</div>
                                        </td>
                                        <td class="text-center">
                                            <a href="uploads/2025/04/aku_statutes.pdf" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1 small fw-semibold" style="border-color: var(--primary-color); color: var(--primary-color);">
                                                <i class="fa-solid fa-file-pdf me-1"></i> View PDF
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-center">2</td>
                                        <td>
                                            <div class="fw-bold text-primary">Published Subsequent Ordinances (79 to 85)</div>
                                            <div class="small text-muted">Academic rules and degree regulations</div>
                                        </td>
                                        <td class="text-center">
                                            <a href="uploads/2026/04/Published-Subsequent-Ordinanace-79-to-85.pdf" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1 small fw-semibold" style="border-color: var(--primary-color); color: var(--primary-color);">
                                                <i class="fa-solid fa-file-pdf me-1"></i> View PDF
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-center">3</td>
                                        <td>
                                            <div class="fw-bold text-primary">Subsequent Ordinance 78-A</div>
                                            <div class="small text-muted">Curriculum and examination framework</div>
                                        </td>
                                        <td class="text-center">
                                            <a href="uploads/2026/04/Subsequent-Ordinance-78-A-Publish.pdf" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1 small fw-semibold" style="border-color: var(--primary-color); color: var(--primary-color);">
                                                <i class="fa-solid fa-file-pdf me-1"></i> View PDF
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-center">4</td>
                                        <td>
                                            <div class="fw-bold text-primary">AKU Main Ordinance Compendium</div>
                                            <div class="small text-muted">General university regulations and student charter</div>
                                        </td>
                                        <td class="text-center">
                                            <a href="uploads/2026/04/AKU-Ordinance.pdf" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1 small fw-semibold" style="border-color: var(--primary-color); color: var(--primary-color);">
                                                <i class="fa-solid fa-file-pdf me-1"></i> View PDF
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar Area -->
            <div class="col-lg-4 col-xl-3">
                <?php include 'about-sidebar.php'; ?>
            </div>

        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
