<?php 
require_once 'db.php';

// Fetch dynamic content from about_pages_config
$page_data = [];
try {
    $stmt = $pdo->prepare("SELECT * FROM about_pages_config WHERE page_slug = 'sponsoring-body'");
    $stmt->execute();
    $page_data = $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
} catch (Exception $e) {}

$pageTitle = !empty($page_data['page_title']) ? $page_data['page_title'] . " - Dr. APJ Abdul Kalam University, Indore" : "Sponsoring Body - Ayushmati Education and Social Society | Dr. APJ Abdul Kalam University, Indore";
$hero_eyebrow = !empty($page_data['hero_eyebrow']) ? $page_data['hero_eyebrow'] : 'FOUNDING SOCIETY & GOVERNANCE';
$page_heading = !empty($page_data['page_title']) ? $page_data['page_title'] : 'Sponsoring Body';
$hero_subtitle = !empty($page_data['hero_subtitle']) ? $page_data['hero_subtitle'] : 'Ayushmati Education and Social Society · Established under M.P. Society Registrikaran Adhiniyam';
$doc_title_1 = !empty($page_data['doc_title_1']) ? $page_data['doc_title_1'] : 'Official M.P. Government Gazette Notification (Establishment by Sponsoring Body)';
$doc_file_1 = !empty($page_data['doc_file_1']) ? $page_data['doc_file_1'] : 'uploads/2025/04/Gazetted_Notification.pdf';
$main_content = !empty($page_data['main_content']) ? $page_data['main_content'] : 'The Ayushmati Education and Social Society is the statutory Sponsoring Body of Dr. A.P.J. Abdul Kalam University, Indore. Registered in 1999 under the Madhya Pradesh Society Registrikaran Adhiniyam, the society holds a pioneering track record in creating benchmark technical, medical, and higher education institutions in Central India.';

include 'header.php'; 
?>

<!-- Inner Page Luxury Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="why-aku.php">About Us</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium"><?php echo htmlspecialchars($page_heading); ?></span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> <?php echo htmlspecialchars($hero_eyebrow); ?>
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            <?php echo htmlspecialchars($page_heading); ?>
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            <?php echo htmlspecialchars($hero_subtitle); ?>
        </p>
    </div>
</section>

<!-- Main Body -->
<main class="py-5" style="background-color: var(--bg-ivory);">
    <div class="container-custom">
        <div class="row g-4 g-xl-5">
            
            <!-- Left Main Content Area -->
            <div class="col-lg-8 col-xl-9">
                <article class="inner-main-card">
                    
                    <!-- Intro Highlight Banner -->
                    <div class="intro-highlight-card mb-4 p-4 rounded-4 border border-custom bg-white shadow-xs">
                        <div class="d-flex align-items-start gap-3.5">
                            <div class="intro-highlight-badge flex-shrink-0" style="width: 54px; height: 54px; border-radius: 14px; background: rgba(112,0,21,0.08); display: flex; align-items: center; justify-content: center; color: var(--primary-color); font-size: 1.5rem;">
                                <i class="fa-solid fa-hand-holding-heart"></i>
                            </div>
                            <div>
                                <div class="badge bg-gold text-dark fw-bold rounded-pill px-3 py-1 small mb-2">SPONSORING TRUST &amp; PROMOTER</div>
                                <h2 class="font-serif text-primary fs-3 fw-bold mb-2">Ayushmati Education and Social Society</h2>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.8;">
                                    <?php echo nl2br(htmlspecialchars($main_content)); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Society Key Facts Grid -->
                    <div class="mb-5">
                        <h4 class="font-serif text-primary fs-5 fw-bold mb-3 d-flex align-items-center gap-2">
                            <i class="fa-solid fa-circle-info text-gold fs-6"></i> Statutory Profile &amp; Registration Details
                        </h4>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="p-3.5 rounded-3 border border-custom bg-white h-100 shadow-xs">
                                    <div class="text-muted-custom text-uppercase fw-semibold mb-1" style="font-size: 0.7rem; letter-spacing: 0.08em;">
                                        <i class="fa-solid fa-id-card text-gold me-1"></i> Registered Society Name
                                    </div>
                                    <div class="fw-bold text-primary fs-6">Ayushmati Education and Social Society</div>
                                    <div class="small text-muted mt-1">Non-profit Educational &amp; Philanthropic Society</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3.5 rounded-3 border border-custom bg-white h-100 shadow-xs">
                                    <div class="text-muted-custom text-uppercase fw-semibold mb-1" style="font-size: 0.7rem; letter-spacing: 0.08em;">
                                        <i class="fa-solid fa-stamp text-gold me-1"></i> Registration &amp; Legal Framework
                                    </div>
                                    <div class="fw-bold text-primary fs-6">M.P. Society Registrikaran Adhiniyam, 1973</div>
                                    <div class="small text-muted mt-1">Registered in 1999 · Section 12AA Tax Compliant</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3.5 rounded-3 border border-custom bg-white h-100 shadow-xs">
                                    <div class="text-muted-custom text-uppercase fw-semibold mb-1" style="font-size: 0.7rem; letter-spacing: 0.08em;">
                                        <i class="fa-solid fa-building text-gold me-1"></i> Registered Society Office
                                    </div>
                                    <div class="fw-bold text-primary fs-6">202, Ganga Jamuna Complex</div>
                                    <div class="small text-muted mt-1">Zone-I, M.P. Nagar, Bhopal – 462011, Madhya Pradesh</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3.5 rounded-3 border border-custom bg-white h-100 shadow-xs">
                                    <div class="text-muted-custom text-uppercase fw-semibold mb-1" style="font-size: 0.7rem; letter-spacing: 0.08em;">
                                        <i class="fa-solid fa-graduation-cap text-gold me-1"></i> Sponsored University
                                    </div>
                                    <div class="fw-bold text-primary fs-6">Dr. A.P.J. Abdul Kalam University</div>
                                    <div class="small text-muted mt-1">Indore-Dewas Bypass Road, Village Arandia, Indore – 452016</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Statutory Mandate & Responsibilities -->
                    <div class="mb-5">
                        <h4 class="font-serif text-primary fs-5 fw-bold mb-3 d-flex align-items-center gap-2">
                            <i class="fa-solid fa-scale-balanced text-gold fs-6"></i> Statutory Mandate &amp; Governance Role
                        </h4>
                        <p class="text-muted-custom small mb-3" style="line-height: 1.7;">
                            Under the provisions of the <em>Madhya Pradesh Niji Vishwavidyalaya (Sthapana Avam Sanchalan) Adhiniyam, 2007</em>, the Sponsoring Body performs paramount statutory functions to uphold academic eminence, state-of-the-art infrastructure, and sound fiscal governance:
                        </p>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="p-3 rounded-3 border border-custom bg-white h-100">
                                    <div class="d-flex align-items-center gap-2 mb-1.5">
                                        <i class="fa-solid fa-coins text-gold fs-5"></i>
                                        <span class="fw-bold text-primary small">Permanent Endowment Fund</span>
                                    </div>
                                    <p class="small text-muted-custom mb-0">
                                        Establishes and secures the University Endowment Fund deposited with the Department of Higher Education, Govt. of M.P., guaranteeing fiscal stability.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 rounded-3 border border-custom bg-white h-100">
                                    <div class="d-flex align-items-center gap-2 mb-1.5">
                                        <i class="fa-solid fa-landmark-dome text-gold fs-5"></i>
                                        <span class="fw-bold text-primary small">Infrastructure &amp; Land Grant</span>
                                    </div>
                                    <p class="small text-muted-custom mb-0">
                                        Dedicated a sprawling 50-acre self-contained academic enclave, advanced R&amp;D laboratories, sports complexes, and university hostels.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 rounded-3 border border-custom bg-white h-100">
                                    <div class="d-flex align-items-center gap-2 mb-1.5">
                                        <i class="fa-solid fa-users-gear text-gold fs-5"></i>
                                        <span class="fw-bold text-primary small">Apex Governance Representation</span>
                                    </div>
                                    <p class="small text-muted-custom mb-0">
                                        Nominates seasoned educationists, industrialists, and social leaders to the university's supreme statutory bodies—the Governing Body and Board of Management.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 rounded-3 border border-custom bg-white h-100">
                                    <div class="d-flex align-items-center gap-2 mb-1.5">
                                        <i class="fa-solid fa-shield-check text-gold fs-5"></i>
                                        <span class="fw-bold text-primary small">Regulatory Adherence &amp; Ethics</span>
                                    </div>
                                    <p class="small text-muted-custom mb-0">
                                        Ensures strict compliance with guidelines issued by UGC, AICTE, PCI, BCI, NCTE, and the MP Private University Regulatory Commission (MPPURC).
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Vision & Pillars -->
                    <div class="mb-5">
                        <h4 class="font-serif text-primary fs-5 fw-bold mb-3 d-flex align-items-center gap-2">
                            <i class="fa-solid fa-compass text-gold fs-6"></i> Society Vision &amp; Core Pillars
                        </h4>
                        <div class="row g-3">
                            <div class="col-sm-6 col-xl-3">
                                <div class="p-3 rounded-3 border border-custom text-center bg-white h-100 shadow-xs">
                                    <div class="mb-2 text-primary fs-4"><i class="fa-solid fa-graduation-cap text-gold"></i></div>
                                    <div class="fw-bold text-primary small mb-1">Quality Higher Education</div>
                                    <div class="text-muted" style="font-size: 0.78rem;">Affordable, global-standard technical and professional curricula.</div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="p-3 rounded-3 border border-custom text-center bg-white h-100 shadow-xs">
                                    <div class="mb-2 text-primary fs-4"><i class="fa-solid fa-flask text-gold"></i></div>
                                    <div class="fw-bold text-primary small mb-1">Research &amp; Patents</div>
                                    <div class="text-muted" style="font-size: 0.78rem;">Promotion of faculty inventions, funded projects, and doctoral studies.</div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="p-3 rounded-3 border border-custom text-center bg-white h-100 shadow-xs">
                                    <div class="mb-2 text-primary fs-4"><i class="fa-solid fa-hands-holding-child text-gold"></i></div>
                                    <div class="fw-bold text-primary small mb-1">Social Empowerment</div>
                                    <div class="text-muted" style="font-size: 0.78rem;">Merit scholarships and rural outreach across Central India.</div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="p-3 rounded-3 border border-custom text-center bg-white h-100 shadow-xs">
                                    <div class="mb-2 text-primary fs-4"><i class="fa-solid fa-lightbulb text-gold"></i></div>
                                    <div class="fw-bold text-primary small mb-1">Incubation &amp; Startups</div>
                                    <div class="text-muted" style="font-size: 0.78rem;">Supporting student innovators through the Kalam Incubation Center.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Official Document & Gazette Repository Table -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-3 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill" style="width: 32px; height: 32px; border-radius: 8px; background: rgba(112,0,21,0.08); display: inline-flex; align-items: center; justify-content: center; color: var(--primary-color);"><i class="fa-solid fa-file-shield"></i></span>
                                <h4 class="font-serif text-primary fs-5 fw-bold m-0">Statutory Establishment Gazette &amp; Documents</h4>
                            </div>
                            <span class="badge bg-light text-primary border border-custom rounded-pill px-3 py-1.5 small fw-semibold">
                                <i class="fa-solid fa-file-pdf text-danger me-1"></i> Official Government Record
                            </span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 55px;" class="text-center">#</th>
                                        <th>Statutory Document Title</th>
                                        <th style="width: 200px;">Authority / Reference</th>
                                        <th style="width: 1%; min-width: 175px; white-space: nowrap;" class="text-end text-nowrap">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center fw-bold text-primary">1</td>
                                        <td>
                                            <a href="javascript:void(0);" class="fw-bold text-primary text-decoration-none switch-doc-title d-block" title="Click to view in previewer below">
                                                <?php echo htmlspecialchars($doc_title_1); ?>
                                            </a>
                                            <div class="text-muted small mt-0.5">Government of Madhya Pradesh Extraordinary Gazette establishing Dr. A.P.J. Abdul Kalam University, Indore under Ayushmati Education and Social Society</div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark border border-custom rounded-pill px-2.5 py-1 small text-nowrap">
                                                <i class="fa-solid fa-landmark text-gold me-1"></i> Govt. of M.P. Gazette
                                            </span>
                                        </td>
                                        <td class="text-end text-nowrap" style="white-space: nowrap; width: 1%; min-width: 175px;">
                                            <div class="d-inline-flex align-items-center justify-content-end gap-2 flex-nowrap" style="white-space: nowrap;">
                                                <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-2.5 py-1 small fw-semibold switch-pdf-btn text-nowrap flex-shrink-0" data-pdf-url="<?php echo htmlspecialchars($doc_file_1); ?>" data-pdf-title="<?php echo htmlspecialchars($doc_title_1); ?>" title="View document in player below" style="white-space: nowrap;">
                                                    <i class="fa-solid fa-eye text-primary me-1"></i> <span class="btn-text">Preview</span>
                                                </button>
                                                <a href="<?php echo htmlspecialchars($doc_file_1); ?>" download class="btn btn-sm btn-gold-pill px-2.5 py-1 small fw-bold text-nowrap flex-shrink-0 d-inline-flex align-items-center justify-content-center" title="Download official PDF" style="white-space: nowrap; min-width: 34px;">
                                                    <i class="fa-solid fa-download"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Direct In-Page PDF Viewer Frame -->
                    <?php if (!empty($doc_file_1) && stripos($doc_file_1, '.pdf') !== false): ?>
                    <div id="inPageDocViewer" class="mb-5 rounded-4 overflow-hidden border border-custom shadow-xs bg-white">
                        <div class="p-3 bg-light border-bottom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fa-solid fa-file-pdf text-danger fs-5"></i>
                                <span id="inPageDocTitle" class="fw-bold text-primary small"><?php echo htmlspecialchars($doc_title_1); ?></span>
                                <span id="inPageActiveBadge" class="badge bg-gold text-dark fw-bold rounded-pill ms-1" style="font-size: 0.65rem; padding: 0.22rem 0.55rem;">ACTIVE VIEW</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <button type="button" id="inPageModalBtn" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1 small preview-pdf-btn" data-pdf-url="<?php echo htmlspecialchars($doc_file_1); ?>" data-pdf-title="<?php echo htmlspecialchars($doc_title_1); ?>" title="Open in fullscreen preview modal">
                                    <i class="fa-solid fa-expand me-1"></i> Fullscreen Modal
                                </button>
                                <a id="inPageDocFullBtn" href="<?php echo htmlspecialchars($doc_file_1); ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">
                                    <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Full Page View
                                </a>
                                <a id="inPageDocDownloadBtn" href="<?php echo htmlspecialchars($doc_file_1); ?>" download class="btn btn-sm btn-gold-pill px-3 py-1 small fw-bold">
                                    <i class="fa-solid fa-download me-1"></i> Download PDF
                                </a>
                            </div>
                        </div>
                        <div style="height: 650px; background: #525659; position: relative;">
                            <div id="inPageDocLoader" class="d-none position-absolute top-0 start-0 w-100 h-100 d-flex flex-column align-items-center justify-content-center text-white" style="background: rgba(30, 20, 25, 0.85); z-index: 10;">
                                <div class="spinner-border text-gold mb-2" role="status" style="width: 2.2rem; height: 2.2rem; color: #C5A059 !important;"></div>
                                <span class="small fw-semibold">Loading document preview...</span>
                            </div>
                            <iframe id="inPageDocIframe" src="<?php echo htmlspecialchars($doc_file_1); ?>#toolbar=1&navpanes=0&view=FitH" width="100%" height="100%" style="border: none;" title="<?php echo htmlspecialchars($doc_title_1); ?>"></iframe>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Contact Inquiries Footer Box -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-1">Statutory Documentation &amp; Secretariat Queries</h5>
                            <p class="small text-muted-custom mb-0">For official society correspondence, charter documentation, or university statutory orders, please contact the Registrar Office.</p>
                        </div>
                        <a href="contact-us.php" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold">
                            <i class="fa-solid fa-headset me-1"></i> Contact Registrar
                        </a>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <?php include "about-sidebar.php"; ?>
            </div>

        </div>
    </div>
</main>

<!-- In-Page PDF Dynamic Switcher Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const viewer = document.getElementById('inPageDocViewer');
    const iframe = document.getElementById('inPageDocIframe');
    const titleEl = document.getElementById('inPageDocTitle');
    const fullBtn = document.getElementById('inPageDocFullBtn');
    const downloadBtn = document.getElementById('inPageDocDownloadBtn');
    const modalBtn = document.getElementById('inPageModalBtn');
    const loader = document.getElementById('inPageDocLoader');
    const switchBtns = document.querySelectorAll('.switch-pdf-btn');
    const titleLinks = document.querySelectorAll('.switch-doc-title');

    if (!iframe) return;

    function switchDocument(pdfUrl, docTitle, activeBtn) {
        if (!pdfUrl) return;

        if (loader) {
            loader.classList.remove('d-none');
            setTimeout(function() {
                loader.classList.add('d-none');
            }, 450);
        }

        iframe.src = pdfUrl + '#toolbar=1&navpanes=0&view=FitH';

        if (titleEl) titleEl.textContent = docTitle;
        if (fullBtn) fullBtn.href = pdfUrl;
        if (downloadBtn) {
            downloadBtn.href = pdfUrl;
            downloadBtn.setAttribute('download', pdfUrl.split('/').pop());
        }
        if (modalBtn) {
            modalBtn.setAttribute('data-pdf-url', pdfUrl);
            modalBtn.setAttribute('data-pdf-title', docTitle);
        }

        switchBtns.forEach(function(btn) {
            btn.classList.remove('btn-primary', 'text-white');
            btn.classList.add('btn-outline-primary');
            const icon = btn.querySelector('i');
            if (icon) icon.className = 'fa-solid fa-eye text-primary me-1';
            const txt = btn.querySelector('.btn-text');
            if (txt) txt.textContent = 'Preview';
        });

        if (activeBtn) {
            activeBtn.classList.remove('btn-outline-primary');
            activeBtn.classList.add('btn-primary', 'text-white');
            const icon = activeBtn.querySelector('i');
            if (icon) icon.className = 'fa-solid fa-circle-check text-white me-1';
            const txt = activeBtn.querySelector('.btn-text');
            if (txt) txt.textContent = 'Viewing';
        }

        if (viewer) {
            viewer.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    if (switchBtns.length > 0) {
        const firstBtn = switchBtns[0];
        firstBtn.classList.remove('btn-outline-primary');
        firstBtn.classList.add('btn-primary', 'text-white');
        const icon = firstBtn.querySelector('i');
        if (icon) icon.className = 'fa-solid fa-circle-check text-white me-1';
        const txt = firstBtn.querySelector('.btn-text');
        if (txt) txt.textContent = 'Viewing';
    }

    switchBtns.forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const pdfUrl = this.getAttribute('data-pdf-url');
            const docTitle = this.getAttribute('data-pdf-title');
            switchDocument(pdfUrl, docTitle, this);
        });
    });

    titleLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const parentRow = this.closest('tr');
            if (parentRow) {
                const btn = parentRow.querySelector('.switch-pdf-btn');
                const pdfUrl = btn ? btn.getAttribute('data-pdf-url') : '';
                const docTitle = btn ? btn.getAttribute('data-pdf-title') : '';
                switchDocument(pdfUrl, docTitle, btn);
            }
        });
    });
});
</script>

<?php include "footer.php"; ?>
