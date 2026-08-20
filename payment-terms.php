<?php 
$pageTitle = "Online Fee Payment Terms & Guidelines - Dr. APJ Abdul Kalam University";
require_once 'db.php';
include 'header.php'; 
?>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="fee-structure.php">Admissions</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Payment Terms</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> DIGITAL FEE TRANSACTION GUIDELINES
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Online Payment Terms &amp; Conditions
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Secure Payment Gateways, ERP Fees &amp; E-Receipts
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
                                <i class="fa-solid fa-credit-card"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Safe, Secure &amp; Seamless Online Fee Payment</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Dr. A.P.J. Abdul Kalam University provides 24x7 online payment facilities for tuition fees, examination registration, hostel fees, bus transport, and document verification via RBI-authorized secure payment gateways.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Terms Cards -->
                    <div class="d-flex flex-column gap-4 mb-5">
                        <div class="feature-info-card p-4">
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-2">1. Accepted Online Payment Channels</h4>
                            <p class="small text-muted-custom mb-0" style="line-height: 1.7; font-size: 0.9rem;">
                                Students and parents can pay fees using <strong>UPI (Google Pay, PhonePe, Paytm), Net Banking (All Major Indian Banks), Visa / Mastercard / RuPay Debit &amp; Credit Cards</strong>, and NEFT/RTGS direct virtual account transfers.
                            </p>
                        </div>

                        <div class="feature-info-card p-4">
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-2">2. Electronic Fee Receipts &amp; Ledger Updates</h4>
                            <p class="small text-muted-custom mb-0" style="line-height: 1.7; font-size: 0.9rem;">
                                Upon successful gateway authorization, a digitally signed E-Receipt with unique Transaction ID &amp; Bank Ref No. is generated immediately. The student's ERP financial ledger is updated in real-time. Please print/save this receipt for academic clearances.
                            </p>
                        </div>

                        <div class="feature-info-card p-4">
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-2">3. Failed &amp; Debited Transactions</h4>
                            <p class="small text-muted-custom mb-0" style="line-height: 1.7; font-size: 0.9rem;">
                                In the rare event of amount deduction without fee receipt generation (network drops/bank timeouts), the deducted sum is automatically reconciled and refunded to the payer's source bank account within 3 to 7 working days as per RBI settlement protocols.
                            </p>
                        </div>

                        <div class="feature-info-card p-4">
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-2">4. Convenience Charges &amp; Surcharges</h4>
                            <p class="small text-muted-custom mb-0" style="line-height: 1.7; font-size: 0.9rem;">
                                UPI and RuPay debit card payments carry zero transaction surcharge. For commercial international credit cards or specialized banking services, standard nominal gateway charges may apply as indicated at checkout.
                            </p>
                        </div>
                    </div>

                    <!-- Accounts Helpdesk -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Finance &amp; Accounts Helpdesk</h5>
                            <p class="small text-muted-custom mb-0">For transaction disputes or NEFT/RTGS challan approvals, contact Finance Section.</p>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <a href="tel:+917312530500" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-2 fw-bold">
                                <i class="fa-solid fa-phone me-1"></i> +91 731 2530 500
                            </a>
                            <a href="mailto:accounts@aku.ac.in" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold">
                                <i class="fa-solid fa-envelope me-1"></i> accounts@aku.ac.in
                            </a>
                        </div>
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
