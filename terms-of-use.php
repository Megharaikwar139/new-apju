<?php 
$pageTitle = "Terms of Use - Dr. APJ Abdul Kalam University, Indore";
require_once 'db.php';
include 'header.php'; 
?>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Terms of Use</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> DIGITAL GOVERNANCE &amp; POLICIES
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Terms &amp; Conditions of Use
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Official Website &amp; Student Portal User Agreement
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
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Terms of Service Overview</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Welcome to the official web portal of Dr. A.P.J. Abdul Kalam University, Indore. By accessing or using our website, ERP portals, admission forms, or online fee payment gateways, you agree to comply with and be bound by the following terms and statutory regulations.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Terms Sections -->
                    <div class="d-flex flex-column gap-4 mb-5">
                        <div class="feature-info-card p-4">
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-2">1. Use of Website and Digital Portals</h4>
                            <p class="small text-muted-custom mb-0" style="line-height: 1.7; font-size: 0.9rem;">
                                The contents of this website, including academic syllabi, notifications, circulars, fee schedules, and faculty profiles, are provided for general educational information and official university communication. Unauthorized access, automated scraping, or tampering with university servers and databases is strictly prohibited.
                            </p>
                        </div>

                        <div class="feature-info-card p-4">
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-2">2. Online Admissions &amp; Verification</h4>
                            <p class="small text-muted-custom mb-0" style="line-height: 1.7; font-size: 0.9rem;">
                                Applicants must provide truthful, complete, and accurate information during the admission process. Submission of forged credentials or misrepresentation will result in immediate disqualification and appropriate legal action under statutory university bylaws.
                            </p>
                        </div>

                        <div class="feature-info-card p-4">
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-2">3. Intellectual Property Rights</h4>
                            <p class="small text-muted-custom mb-0" style="line-height: 1.7; font-size: 0.9rem;">
                                All logos, trademarks, text, research publications, campus photography, and multimedia assets published on this website are the intellectual property of Dr. A.P.J. Abdul Kalam University, Indore, protected by national copyright and trademark legislation.
                            </p>
                        </div>

                        <div class="feature-info-card p-4">
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-2">4. Digital Fee Payments &amp; Transactions</h4>
                            <p class="small text-muted-custom mb-0" style="line-height: 1.7; font-size: 0.9rem;">
                                All online transactions executed via our official payment gateways (for examination fees, admission deposits, hostel charges) are encrypted. For policy details regarding transaction reversals and fee adjustments, refer to our <a href="payment-terms.php" class="text-primary fw-semibold">Payment Terms</a> and <a href="refund-cancellation.php" class="text-primary fw-semibold">Refund Policy</a>.
                            </p>
                        </div>
                    </div>

                </article>
            </div>

            <!-- Right Sticky Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <aside class="sidebar-wrapper sticky-top" style="top: 100px; z-index: 10;">
                    
                    <!-- Quick Links Box -->
                    <div class="sidebar-card mb-4">
                        <div class="sidebar-title">Legal &amp; Policy Hub</div>
                        <ul class="sidebar-links-list">
                            <li><a href="privacy-policy.php"><i class="fa-solid fa-chevron-right"></i> Privacy Policy</a></li>
                            <li class="active"><a href="terms-of-use.php"><i class="fa-solid fa-chevron-right"></i> Terms of Use</a></li>
                            <li><a href="payment-terms.php"><i class="fa-solid fa-chevron-right"></i> Payment Terms</a></li>
                            <li><a href="refund-cancellation.php"><i class="fa-solid fa-chevron-right"></i> Refund Policy</a></li>
                            <li><a href="anti-reggiging-committee.php"><i class="fa-solid fa-chevron-right"></i> Anti-Ragging Policy</a></li>
                            <li><a href="rti-act.php"><i class="fa-solid fa-chevron-right"></i> RTI Act Guidelines</a></li>
                        </ul>
                    </div>

                    <!-- Contact Card -->
                    <div class="sidebar-card bg-primary text-white" style="background-color: var(--primary-color) !important;">
                        <div class="sidebar-title text-white border-white border-opacity-15">University Registrar</div>
                        <p class="small text-white text-opacity-80 mb-3">For legal, statutory, or policy inquiries:</p>
                        <div class="d-flex align-items-center gap-2 small mb-2">
                            <i class="fa-solid fa-envelope text-gold"></i>
                            <a href="mailto:registrar@aku.ac.in" class="text-white text-decoration-none">registrar@aku.ac.in</a>
                        </div>
                        <div class="d-flex align-items-center gap-2 small">
                            <i class="fa-solid fa-phone text-gold"></i>
                            <a href="tel:+917312530500" class="text-white text-decoration-none">+91 731 2530 500</a>
                        </div>
                    </div>

                </aside>
            </div>

        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
