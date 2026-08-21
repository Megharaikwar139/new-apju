<?php 
require_once 'db.php';
include 'header.php'; 

$statutoryApprovals = [
    [
        'no' => 1,
        'body' => 'UGC (University Grants Commission)',
        'title' => 'UGC University Establishment & Statutory Recognition Letter',
        'ref' => 'F. No. 8-18/2016 (CPP-I/PU)',
        'file' => 'uploads/2026/03/UGC_University-Establishment-Letter_19.04.2016.pdf'
    ],
    [
        'no' => 2,
        'body' => 'UGC (Degrees Empowered)',
        'title' => 'UGC Specification of Degrees Empowered Notification',
        'ref' => 'Section 22 of the UGC Act, 1956',
        'file' => 'uploads/2026/03/UGC_Degrees-Empowered-letter_28.06.2019.pdf'
    ],
    [
        'no' => 3,
        'body' => 'UGC (2(f) Status)',
        'title' => 'Official UGC 2(f) Recognition & Inclusion Order',
        'ref' => 'Govt. Statutory Inclusion',
        'file' => 'uploads/2026/03/UGC_Approval-Letter_15.06.2020.pdf'
    ],
    [
        'no' => 4,
        'body' => 'UGC Expert Committee',
        'title' => 'UGC Expert Committee Visit & Compliance Report',
        'ref' => 'Inspection on 10-11 May 2019',
        'file' => 'uploads/2026/03/UGC-Expert-Committee-Visited_10-11-May-2019-Complaince.pdf'
    ],
    [
        'no' => 5,
        'body' => 'MPPURC (State Regulatory Commission)',
        'title' => 'M.P. Private University Regulatory Commission (Aayog) Approval',
        'ref' => 'Statutory State Enactment',
        'file' => 'uploads/2026/03/Aayog-Approval-MPPURC.pdf'
    ],
    [
        'no' => 6,
        'body' => 'AICTE (Engineering & Tech)',
        'title' => 'AICTE Extension of Approval (EOA) - School of Engineering',
        'ref' => 'Session 2025-26 Approved',
        'file' => 'uploads/2026/03/SOE-EOA-2025-26.pdf'
    ],
    [
        'no' => 7,
        'body' => 'AICTE (Technical Campus)',
        'title' => 'AICTE Extension of Approval (EOA) - College of Engineering',
        'ref' => 'Session 2025-26 Approved',
        'file' => 'uploads/2026/03/COE-EOA-2025-26.pdf'
    ],
    [
        'no' => 8,
        'body' => 'PCI (Pharmacy Council of India)',
        'title' => 'PCI Statutory Approval Letter - College of Pharmacy (COP)',
        'ref' => 'B.Pharm & D.Pharm Approved',
        'file' => 'uploads/2026/03/PCI-APPROVAL-2025-26-COP.pdf'
    ],
    [
        'no' => 9,
        'body' => 'PCI (Pharmacy Council of India)',
        'title' => 'PCI Statutory Approval Letter - School of Pharmacy (SOP)',
        'ref' => 'Pharmacy Degrees Approved',
        'file' => 'uploads/2026/03/PCI-APPROVAL-2025-26-SOP.pdf'
    ],
    [
        'no' => 10,
        'body' => 'BCI (Bar Council of India)',
        'title' => 'BCI Affiliation & Provisional Approval Letter (Faculty of Law)',
        'ref' => 'LL.B. & BA LL.B. Approved',
        'file' => 'uploads/2026/03/Extension-of-Provisional-approval-of-affiliation_BCI_2024-25.pdf'
    ],
    [
        'no' => 11,
        'body' => 'NCISM (Indian System of Medicine)',
        'title' => 'NCISM Approval Letter - School of Ayurveda & Panchkarma',
        'ref' => 'BAMS Medical Program',
        'file' => 'uploads/2026/03/NCISM-Approval-Letter_2025-26.pdf'
    ],
    [
        'no' => 12,
        'body' => 'NCH (National Commission for Homoeopathy)',
        'title' => 'NCH Approval Letter - School of Homeopathy',
        'ref' => 'BHMS Medical Program',
        'file' => 'uploads/2026/03/NCH-Approval-Letter_2023-24.pdf'
    ]
];
?>

<!-- Inner Page Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="why-aku.php">About</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Statutory Recognitions</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> STATUTORY ACCREDITATIONS & APPROVALS
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            UGC Recognition &amp; Statutory Approvals
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Recognized by UGC under Section 2(f) · Approved by AICTE, PCI, BCI, NCISM, NCH &amp; MPPURC
        </p>
    </div>
</section>

<main class="py-5" style="background-color: var(--bg-ivory);">
    <div class="container-custom">
        <div class="row g-4 g-xl-5">
            
            <!-- Left Main Content Area -->
            <div class="col-lg-8 col-xl-9">
                <article class="inner-main-card">
                    
                    <!-- Intro Highlight Card -->
                    <div class="intro-highlight-card mb-5">
                        <div class="d-flex align-items-center gap-3.5">
                            <div class="intro-highlight-badge">
                                <i class="fa-solid fa-building-columns"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">State Established &amp; Central Recognized</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Dr. A.P.J. Abdul Kalam University, Indore is duly established under the Madhya Pradesh Niji Vishwavidyalaya (Sthapana Avam Sanchalan) Adhiniyam and recognized by the <strong>University Grants Commission (UGC)</strong> under Section 2(f) of the UGC Act, 1956. All academic degrees awarded are fully empowered under Section 22 and valid nationwide for higher education and public/private employment.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Statutory Letters Table -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-file-shield"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Official Statutory Council Approvals Repository</h3>
                            </div>
                            <span class="custom-badge-pill">
                                <i class="fa-solid fa-file-pdf text-danger me-1.5"></i> <?php echo count($statutoryApprovals); ?> Official Approval Orders
                            </span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 55px;" class="text-center">#</th>
                                        <th>Statutory Regulatory Council &amp; Document</th>
                                        <th style="width: 170px;">Reference / Scope</th>
                                        <th style="width: 130px;" class="text-end">Document</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($statutoryApprovals as $a): ?>
                                    <tr>
                                        <td class="text-center font-monospace fw-bold text-primary"><?php echo sprintf('%02d', $a['no']); ?></td>
                                        <td>
                                            <div class="d-flex align-items-start gap-2.5">
                                                <i class="fa-solid fa-file-pdf text-danger fs-5 mt-1 flex-shrink-0"></i>
                                                <div>
                                                    <a href="<?php echo htmlspecialchars($a['file']); ?>" target="_blank" class="fw-bold text-primary text-decoration-none d-block" style="font-size: 0.93rem;">
                                                        <?php echo htmlspecialchars($a['title']); ?>
                                                    </a>
                                                    <span class="small text-gold fw-semibold"><?php echo htmlspecialchars($a['body']); ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark border small px-2.5 py-1.5"><?php echo htmlspecialchars($a['ref']); ?></span>
                                        </td>
                                        <td class="text-end">
                                            <a href="<?php echo htmlspecialchars($a['file']); ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1.5 small fw-semibold" download>
                                                <i class="fa-solid fa-download me-1 text-gold"></i> PDF
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Statutory Badges Grid -->
                    <div class="row g-3">
                        <div class="col-sm-6 col-md-4">
                            <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-center gap-3">
                                <i class="fa-solid fa-shield-halved text-gold fs-3"></i>
                                <div>
                                    <div class="font-serif text-primary fw-bold fs-6">AICTE Approved</div>
                                    <div class="small text-muted-custom" style="font-size: 0.8rem;">Engineering &amp; Technology</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-center gap-3">
                                <i class="fa-solid fa-prescription-bottle-medical text-gold fs-3"></i>
                                <div>
                                    <div class="font-serif text-primary fw-bold fs-6">PCI Approved</div>
                                    <div class="small text-muted-custom" style="font-size: 0.8rem;">Pharmacy Council of India</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-center gap-3">
                                <i class="fa-solid fa-scale-balanced text-gold fs-3"></i>
                                <div>
                                    <div class="font-serif text-primary fw-bold fs-6">BCI Approved</div>
                                    <div class="small text-muted-custom" style="font-size: 0.8rem;">Bar Council of India</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-center gap-3">
                                <i class="fa-solid fa-spa text-gold fs-3"></i>
                                <div>
                                    <div class="font-serif text-primary fw-bold fs-6">NCISM Approved</div>
                                    <div class="small text-muted-custom" style="font-size: 0.8rem;">Ayurveda &amp; Panchkarma</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-center gap-3">
                                <i class="fa-solid fa-mortar-pestle text-gold fs-3"></i>
                                <div>
                                    <div class="font-serif text-primary fw-bold fs-6">NCH Approved</div>
                                    <div class="small text-muted-custom" style="font-size: 0.8rem;">School of Homeopathy</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-center gap-3">
                                <i class="fa-solid fa-building-columns text-gold fs-3"></i>
                                <div>
                                    <div class="font-serif text-primary fw-bold fs-6">MPPURC Recognized</div>
                                    <div class="small text-muted-custom" style="font-size: 0.8rem;">M.P. Regulatory Commission</div>
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

<style>
.custom-badge-pill {
    display: inline-flex;
    align-items: center;
    background: #fbf3f5;
    color: #700015;
    border: 1px solid rgba(112, 0, 21, 0.2);
    padding: 0.4rem 1rem;
    border-radius: 50px;
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 0.04em;
}
</style>

<?php include 'footer.php'; ?>
