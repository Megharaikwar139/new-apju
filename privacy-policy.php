<?php 
$pageTitle = "Privacy Policy - Dr. APJ Abdul Kalam University, Indore";
require_once 'db.php';
include 'header.php'; 
?>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Privacy Policy</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> DATA PROTECTION &amp; PRIVACY
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Privacy Policy &amp; Data Protection
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Information Security, Student Confidentiality &amp; Digital Governance
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
                                <i class="fa-solid fa-user-shield"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Our Commitment to Your Privacy</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Dr. A.P.J. Abdul Kalam University, Indore is dedicated to maintaining the highest standards of data security, privacy, and confidentiality for students, applicants, faculty, alumni, and website visitors in compliance with the Digital Personal Data Protection (DPDP) Act, 2023.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Policy Sections -->
                    <div class="d-flex flex-column gap-4 mb-5">
                        <div class="feature-info-card p-4">
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-2">1. Personal Information We Collect</h4>
                            <p class="small text-muted-custom mb-0" style="line-height: 1.7; font-size: 0.9rem;">
                                We collect information you provide directly during online admission registrations, inquiry forms, fee payments, ERP student portal onboarding, or job applications. This may include your full name, email address, mobile number, date of birth, postal address, educational qualifications, entrance exam scores, and photograph.
                            </p>
                        </div>

                        <div class="feature-info-card p-4">
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-2">2. Purpose &amp; Utilization of Collected Data</h4>
                            <p class="small text-muted-custom mb-0" style="line-height: 1.7; font-size: 0.9rem;">
                                Your personal data is used strictly for academic enrollment, identity verification, examination admit card generation, grade transcript dispatch, scholarship disbursement, training &amp; placement drives, and statutory regulatory compliance with UGC, AICTE, PCI, and MP Higher Education Department.
                            </p>
                        </div>

                        <div class="feature-info-card p-4">
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-2">3. Non-Disclosure &amp; Information Security</h4>
                            <p class="small text-muted-custom mb-0" style="line-height: 1.7; font-size: 0.9rem;">
                                We do not sell, rent, or lease your personal data to commercial third parties. All digital transactions, ERP logins, and student records are protected using 256-bit SSL encryption, modern firewalls, and multi-factor authentication protocols.
                            </p>
                        </div>

                        <div class="feature-info-card p-4">
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-2">4. Cookies &amp; Digital Analytics</h4>
                            <p class="small text-muted-custom mb-0" style="line-height: 1.7; font-size: 0.9rem;">
                                The University website uses necessary security cookies and aggregated anonymous analytics to optimize navigation performance and website responsiveness. You may adjust your browser settings to decline non-essential cookies.
                            </p>
                        </div>
                    </div>

                    <!-- Contact Inquiries -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Privacy Inquiries &amp; Data Grievance Officer</h5>
                            <p class="small text-muted-custom mb-0">For privacy concerns or data correction requests, contact the Registrar Office.</p>
                        </div>
                        <a href="mailto:office_university@aku.ac.in" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold">
                            <i class="fa-solid fa-envelope me-1"></i> office_university@aku.ac.in
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

<?php include 'footer.php'; ?>
