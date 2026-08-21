<?php 
$pageTitle = "Right to Information (RTI Act 2005) - Dr. APJ Abdul Kalam University";
require_once 'db.php';
include 'header.php'; 

$rtiOfficers = [
    [
        'role' => 'First Appellate Authority (FAA)',
        'name' => 'Dr. Rajeev G. Vishwakarma',
        'desig' => 'Pro Vice-Chancellor',
        'address' => 'Dr. A.P.J. Abdul Kalam University, Bypass Road, Indore (M.P.) - 452016',
        'contact' => '+91 87705 47193',
        'email' => 'registrar@aku.ac.in'
    ],
    [
        'role' => 'Public Information Officer (PIO)',
        'name' => 'Mr. Pradeep Singh Chouhan',
        'desig' => 'Chief Administrative Officer',
        'address' => 'Administrative Block, Dr. A.P.J. Abdul Kalam University, Indore',
        'contact' => '+91 98260 54004',
        'email' => 'admin@aku.ac.in'
    ],
    [
        'role' => 'Assistant Public Information Officer (APIO)',
        'name' => 'Mr. Dilip Batham',
        'desig' => 'Assistant Registrar',
        'address' => 'Academic Section, Dr. A.P.J. Abdul Kalam University, Indore',
        'contact' => '+91 78692 92542',
        'email' => 'apio@aku.ac.in'
    ]
];
?>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="about-university.php">About</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">RTI Act</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> STATUTORY TRANSPARENCY &amp; ACCOUNTABILITY
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Right to Information (RTI Act, 2005)
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Public Information Officers &amp; Statutory Compliance
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
                                <i class="fa-solid fa-scale-balanced"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Commitment to Institutional Transparency</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    In accordance with the provisions of the <strong>Right to Information Act, 2005</strong>, Dr. A.P.J. Abdul Kalam University provides transparent access to statutory information and public disclosures to citizens of India.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- RTI Officers Table -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-users-gear"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Public Information Officers Roster</h3>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <a href="uploads/filr/694/rti-gazette_RTI ACT.pdf" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small fw-semibold" download>
                                    <i class="fa-solid fa-file-pdf text-danger me-1"></i> RTI Act Gazette
                                </a>
                                <a href="uploads/filr/692/cpio-list_Revise circular RTI.pdf" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small fw-semibold" download>
                                    <i class="fa-solid fa-file-pdf text-danger me-1"></i> CPIO Circular
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 220px;">RTI Statutory Role</th>
                                        <th>Officer Name &amp; Designation</th>
                                        <th>Official Address</th>
                                        <th style="width: 170px;">Contact &amp; Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rtiOfficers as $o): ?>
                                    <tr>
                                        <td>
                                            <span class="badge <?php echo ($o['role'] === 'First Appellate Authority (FAA)') ? 'bg-primary text-white' : 'bg-light text-dark border'; ?>">
                                                <?php echo htmlspecialchars($o['role']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <strong class="text-primary d-block"><?php echo htmlspecialchars($o['name']); ?></strong>
                                            <span class="small text-muted-custom"><?php echo htmlspecialchars($o['desig']); ?></span>
                                        </td>
                                        <td><span class="small text-muted-custom"><?php echo htmlspecialchars($o['address']); ?></span></td>
                                        <td>
                                            <span class="font-monospace small text-dark d-block fw-semibold"><?php echo htmlspecialchars($o['contact']); ?></span>
                                            <a href="mailto:<?php echo htmlspecialchars($o['email']); ?>" class="small text-primary text-decoration-none"><?php echo htmlspecialchars($o['email']); ?></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Application Procedure & Guidelines -->
                    <div class="feature-info-card p-4 p-md-4.5 mb-4">
                        <div class="d-flex align-items-center gap-3 mb-3 pb-2.5 border-bottom border-custom">
                            <div class="feature-icon-badge">
                                <i class="fa-solid fa-file-invoice"></i>
                            </div>
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-0">Procedure for Filing RTI Application</h4>
                        </div>
                        <ul class="d-flex flex-column gap-2.5 mb-0 ps-0 list-unstyled" style="color: #3e3233; line-height: 1.7; font-size: 0.92rem;">
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Application Mode:</strong> A citizen can submit an application in writing or electronically in English or Hindi specifying the particulars of the information sought.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Prescribed Fee:</strong> Application fee of ₹10 (Rupees Ten only) payable via Demand Draft, Banker's Cheque, or Indian Postal Order (IPO) in favour of <em>"Dr. A.P.J. Abdul Kalam University, Indore"</em>.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Appeals Timeline:</strong> If not satisfied with the reply of PIO within 30 days, an appeal can be preferred to the First Appellate Authority (FAA) within 30 days.</span>
                            </li>
                        </ul>
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

<?php include 'footer.php'; ?>
