<?php 
require_once 'db.php';
include 'header.php'; 

// Fetch dynamic content from about_pages_config
$page_data = [];
try {
    $stmt = $pdo->prepare("SELECT * FROM about_pages_config WHERE page_slug = 'finance-committee'");
    $stmt->execute();
    $page_data = $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
} catch (Exception $e) {}

$hero_eyebrow = !empty($page_data['hero_eyebrow']) ? $page_data['hero_eyebrow'] : 'STATUTORY COMMITTEES';
$page_title = !empty($page_data['page_title']) ? $page_data['page_title'] : 'Finance Committee';
$hero_subtitle = !empty($page_data['hero_subtitle']) ? $page_data['hero_subtitle'] : 'Financial Governance & Budgetary Affairs · Dr. A.P.J. Abdul Kalam University';
$doc_title_1 = !empty($page_data['doc_title_1']) ? $page_data['doc_title_1'] : 'Finance Committee Official Document';
$doc_file_1 = !empty($page_data['doc_file_1']) ? $page_data['doc_file_1'] : 'uploads/2026/03/finance-committee.jpg';
$main_content = !empty($page_data['main_content']) ? $page_data['main_content'] : '<p class="text-muted-custom small lh-base mb-4">The Finance Committee advises the Governing Body and Board of Management on all matters relating to the administration of funds, annual budgets, accounts, investments, and financial regulations of the University.</p>';
?>

<!-- Inner Page Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="why-aku.php">About</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium"><?php echo htmlspecialchars($page_title); ?></span>
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
                                    <th>Official Document / Committee Title</th>
                                    <th style="width: 25%; text-align: center;">Document</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-bold text-center">1</td>
                                    <td>
                                        <div class="fw-bold text-primary"><?php echo htmlspecialchars($doc_title_1); ?></div>
                                        <div class="small text-muted">Statutory financial committee constitution and notifications</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo htmlspecialchars($doc_file_1); ?>" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1.5 small fw-semibold" style="border-color: var(--primary-color); color: var(--primary-color);">
                                            <i class="fa-solid fa-file-pdf text-danger me-1"></i> View Document
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="p-4 rounded-4 mt-4 border border-custom" style="background: #fcfbf9;">
                        <h4 class="font-serif text-primary fs-5 fw-bold mb-2"><i class="fa-solid fa-vault text-gold me-2"></i> Functions of the Committee</h4>
                        <ul class="small text-muted-custom lh-base mb-0 ps-3">
                            <li class="mb-1.5">Scrutinizing annual budget estimates and advising the Governing Body on financial allocations.</li>
                            <li class="mb-1.5">Conducting periodic reviews of the financial position of the University and managing audit reports.</li>
                            <li class="mb-1.5">Ensuring transparency, efficiency, and compliance with statutory financial norms.</li>
                        </ul>
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
