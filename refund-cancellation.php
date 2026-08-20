<?php 
$pageTitle = "Fee Refund & Admission Cancellation Policy - Dr. APJ Abdul Kalam University";
require_once 'db.php';
include 'header.php'; 

$ugcTiers = [
    ['percentage' => '100%', 'timeline' => '15 days or more before the formally-notified last date of admission', 'deduction' => '₹1,000 max as processing charge', 'badge' => 'bg-success text-white'],
    ['percentage' => '90%', 'timeline' => 'Less than 15 days before the formally-notified last date of admission', 'deduction' => '10% of aggregate tuition fee', 'badge' => 'bg-primary text-white'],
    ['percentage' => '80%', 'timeline' => '15 days or less after the formally-notified last date of admission', 'deduction' => '20% of aggregate tuition fee', 'badge' => 'bg-warning text-dark'],
    ['percentage' => '50%', 'timeline' => 'Between 16 to 30 days after the formally-notified last date of admission', 'deduction' => '50% of aggregate tuition fee', 'badge' => 'bg-secondary text-white'],
    ['percentage' => '0% (Nil)', 'timeline' => 'More than 30 days after formally-notified last date of admission', 'deduction' => '100% non-refundable', 'badge' => 'bg-danger text-white']
];
?>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="fee-structure.php">Admissions</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Refund Policy</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> UGC &amp; AICTE COMPLIANT STATUTORY POLICY
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Fee Refund &amp; Admission Cancellation Policy
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Transparent, Fair &amp; Time-Bound Refund Framework
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
                                <i class="fa-solid fa-hand-holding-dollar"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">UGC Mandated Fee Refund Guidelines</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    In strict accordance with the <strong>University Grants Commission (UGC) and AICTE Fee Refund Notifications</strong>, Dr. A.P.J. Abdul Kalam University adheres to a standardized, transparent 5-tier fee refund structure for all undergraduate, postgraduate, and diploma admissions.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- 5-Tier Table -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-table-list"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Statutory 5-Tier Refund Schedule</h3>
                            </div>
                            <span class="badge bg-gold text-dark fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.75rem;">Official Norms</span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 140px;">Refund %</th>
                                        <th>Point of Notice of Withdrawal / Cancellation</th>
                                        <th style="width: 220px;">Deduction Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ugcTiers as $tier): ?>
                                    <tr>
                                        <td>
                                            <span class="badge <?php echo $tier['badge']; ?> px-2.5 py-1.5 fs-6 fw-bold">
                                                <?php echo $tier['percentage']; ?>
                                            </span>
                                        </td>
                                        <td><span class="fw-semibold text-dark"><?php echo htmlspecialchars($tier['timeline']); ?></span></td>
                                        <td><span class="small text-muted-custom font-monospace fw-semibold"><?php echo htmlspecialchars($tier['deduction']); ?></span></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Cancellation Process -->
                    <div class="feature-info-card p-4 p-md-4.5 mb-4">
                        <div class="d-flex align-items-center gap-3 mb-3 pb-2.5 border-bottom border-custom">
                            <div class="feature-icon-badge">
                                <i class="fa-solid fa-file-signature"></i>
                            </div>
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-0">Step-by-Step Admission Withdrawal Process</h4>
                        </div>
                        <ol class="d-flex flex-column gap-2.5 mb-0 ps-3" style="color: #3e3233; line-height: 1.7; font-size: 0.92rem;">
                            <li>
                                <strong>Submit Cancellation Application:</strong> Submit a formal written application signed by student &amp; parent along with original fee receipt and bank account details (cancelled cheque / passbook copy) to the Registrar Office.
                            </li>
                            <li>
                                <strong>No-Dues Clearance:</strong> Obtain departmental clearance from Central Library, Computer Labs, Hostel Warden, and Accounts Counter.
                            </li>
                            <li>
                                <strong>Direct Bank NEFT/RTGS Transfer:</strong> Verified refund amount is directly credited to the candidate's/parent's bank account within 15 to 20 working days.
                            </li>
                        </ol>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <?php include "faculty-sidebar.php"; ?>
            </div>

        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
