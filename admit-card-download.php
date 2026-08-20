<?php 
$pageTitle = "Download Examination Admit Card - Dr. APJ Abdul Kalam University, Indore";
include 'header.php'; 
?>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="about-the-section.php">Examinations</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Admit Card</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> HALL TICKET & EXAM SEATING PASS
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 900px; line-height: 1.15;">
            Download Examination Admit Card
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Official End-Semester &amp; Backlog Hall Tickets
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
                                <i class="fa-solid fa-id-card"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Official Semester Exam Hall Ticket Portal</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.7;">
                                    Students enrolled in Regular and Ex/Backlog examinations can generate and download their official digital admit card. Ensure all details including course name, subject codes, and examination center are accurate before printing.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Online Admit Card Lookup Form -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center gap-2.5">
                            <span class="section-icon-pill"><i class="fa-solid fa-download"></i></span>
                            <h3 class="font-serif text-primary fs-4 fw-bold m-0">Generate Your Hall Ticket</h3>
                        </div>

                        <div class="p-4 p-md-5 rounded-4 border border-custom bg-white shadow-xs">
                            <form action="https://login.rssrcampusconnect.com/" method="get" target="_blank" onsubmit="if(!document.getElementById('admitRoll').value.trim()){ alert('Please enter your University Enrollment / Roll Number'); return false; }">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label font-serif fw-bold text-primary small">University Enrollment / Roll No. *</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-custom"><i class="fa-solid fa-user-graduate text-gold"></i></span>
                                            <input type="text" id="admitRoll" class="form-control border-custom" placeholder="e.g. AKU23CS1002" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label font-serif fw-bold text-primary small">Date of Birth (DD/MM/YYYY) *</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-custom"><i class="fa-regular fa-calendar text-gold"></i></span>
                                            <input type="date" class="form-control border-custom" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label font-serif fw-bold text-primary small">Student Type</label>
                                        <select class="form-select border-custom">
                                            <option value="regular">Regular Student</option>
                                            <option value="ex">Ex / Backlog Student</option>
                                            <option value="atkt">ATKT Examination</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label font-serif fw-bold text-primary small">Examination Term</label>
                                        <select class="form-select border-custom">
                                            <option value="june2026">June – July 2026 Examination</option>
                                            <option value="dec2025">Dec – Jan 2025-26 Examination</option>
                                        </select>
                                    </div>

                                    <div class="col-12 text-end pt-2">
                                        <button type="submit" class="btn btn-gold-pill px-4 py-2.5 fw-bold">
                                            <i class="fa-solid fa-print me-1.5"></i> Download &amp; Print Admit Card
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Important Instructions for Hall Ticket -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center gap-2.5">
                            <span class="section-icon-pill"><i class="fa-solid fa-triangle-exclamation"></i></span>
                            <h3 class="font-serif text-primary fs-4 fw-bold m-0">Mandatory Instructions for Examinees</h3>
                        </div>

                        <div class="feature-info-card">
                            <ul class="d-flex flex-column gap-2 mb-0 ps-3" style="color: #3e3233; line-height: 1.7; font-size: 0.92rem;">
                                <li>Take a clear, colored printout of the admit card on A4 white paper.</li>
                                <li>Affix a recent passport-size photograph if the photo is missing or blurry on the printed slip and get it attested by your Department HOD.</li>
                                <li>Carry your original University Identity Card along with the Admit Card to the examination hall on all exam days.</li>
                                <li>Do not write anything on the front or reverse of the admit card. Any markings will be considered a breach of exam discipline.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Correction Helpdesk Strip -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs">
                        <div class="d-flex align-items-center gap-3.5">
                            <div class="intro-highlight-badge" style="width: 52px; height: 52px; font-size: 1.25rem;">
                                <i class="fa-solid fa-headset"></i>
                            </div>
                            <div>
                                <h4 class="font-serif text-primary fs-6 fw-bold mb-0.5">Discrepancy on your Admit Card?</h4>
                                <p class="text-muted-custom small mb-0">Contact the COE Control Room immediately with your Fee Receipt &amp; ID Proof.</p>
                            </div>
                        </div>
                        <a href="tel:+917312530500" class="btn btn-sm btn-outline-dark rounded-pill px-3.5 py-2 fw-bold">
                            <i class="fa-solid fa-phone me-1"></i> Helpline: 0731 2530 500
                        </a>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <?php include "exam-sidebar.php"; ?>
            </div>

        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
