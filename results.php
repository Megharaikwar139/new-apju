<?php 
$pageTitle = "Online Results Portal - Dr. APJ Abdul Kalam University, Indore";
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
            <span class="text-gold fw-medium">Results Portal</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> SEMESTER SCORECARDS & GRADE SHEETS
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 900px; line-height: 1.15;">
            University Results Portal
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Live Grade Cards &amp; Performance Records
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
                                <i class="fa-solid fa-award"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Official Semester Results Portal</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.7;">
                                    Students can access and verify their semester marksheet, SGPA / CGPA scorecards, and backlog examination outcomes directly through the central University Management ERP Portal.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Online Result Lookup Box -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center gap-2.5">
                            <span class="section-icon-pill"><i class="fa-solid fa-magnifying-glass-chart"></i></span>
                            <h3 class="font-serif text-primary fs-4 fw-bold m-0">Quick Result Search</h3>
                        </div>

                        <div class="p-4 p-md-5 rounded-4 border border-custom bg-white shadow-xs">
                            <form action="https://login.rssrcampusconnect.com/" method="get" target="_blank" onsubmit="if(!document.getElementById('rollInput').value.trim()){ alert('Please enter your University Enrollment / Roll Number'); return false; }">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label font-serif fw-bold text-primary small">University Enrollment / Roll No. *</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-custom"><i class="fa-solid fa-id-card text-gold"></i></span>
                                            <input type="text" id="rollInput" class="form-control border-custom" placeholder="e.g. AKU22BE0145" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label font-serif fw-bold text-primary small">Semester / Year</label>
                                        <select class="form-select border-custom">
                                            <option value="1">Semester 1 (1st Year)</option>
                                            <option value="2">Semester 2 (1st Year)</option>
                                            <option value="3">Semester 3 (2nd Year)</option>
                                            <option value="4">Semester 4 (2nd Year)</option>
                                            <option value="5">Semester 5 (3rd Year)</option>
                                            <option value="6">Semester 6 (3rd Year)</option>
                                            <option value="7">Semester 7 (4th Year)</option>
                                            <option value="8">Semester 8 (4th Year)</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label font-serif fw-bold text-primary small">Examination Session</label>
                                        <select class="form-select border-custom">
                                            <option value="june2026">June – July 2026 (Even Semester)</option>
                                            <option value="dec2025">Dec – Jan 2025-26 (Odd Semester)</option>
                                            <option value="june2025">June – July 2025 (Even Semester)</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label font-serif fw-bold text-primary small">Course Faculty</label>
                                        <select class="form-select border-custom">
                                            <option value="engg">Faculty of Engineering &amp; Technology</option>
                                            <option value="pharmacy">Faculty of Pharmacy</option>
                                            <option value="management">Faculty of Management &amp; Commerce</option>
                                            <option value="science">Faculty of Science &amp; IT</option>
                                            <option value="ayush">Faculty of Ayurveda &amp; Homeopathy</option>
                                            <option value="law">Faculty of Law</option>
                                        </select>
                                    </div>

                                    <div class="col-12 text-end pt-2">
                                        <button type="submit" class="btn btn-gold-pill px-4 py-2.5 fw-bold">
                                            <i class="fa-solid fa-arrow-up-right-from-square me-1.5"></i> Search on Student ERP Portal
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Direct Official Gateways Grid -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center gap-2.5">
                            <span class="section-icon-pill"><i class="fa-solid fa-server"></i></span>
                            <h3 class="font-serif text-primary fs-4 fw-bold m-0">Direct Official Examination Gateways</h3>
                        </div>

                        <div class="row g-3.5">
                            <div class="col-md-6">
                                <div class="feature-info-card d-flex flex-column justify-content-between">
                                    <div>
                                        <div class="d-flex align-items-center gap-3 mb-2.5">
                                            <div class="feature-icon-badge">
                                                <i class="fa-solid fa-right-to-bracket"></i>
                                            </div>
                                            <h4 class="font-serif text-primary fw-bold fs-6 mb-0">Student ERP Campus Connect</h4>
                                        </div>
                                        <p class="small text-muted-custom mb-3" style="line-height: 1.65; font-size: 0.9rem;">
                                            Official portal for individual student login, admit cards, fee receipts, internal marks, and provisional grade transcripts.
                                        </p>
                                    </div>
                                    <a href="https://login.rssrcampusconnect.com/" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3.5 py-1.5 small align-self-start">
                                        Open Campus Connect <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="feature-info-card d-flex flex-column justify-content-between">
                                    <div>
                                        <div class="d-flex align-items-center gap-3 mb-2.5">
                                            <div class="feature-icon-badge">
                                                <i class="fa-solid fa-file-circle-check"></i>
                                            </div>
                                            <h4 class="font-serif text-primary fw-bold fs-6 mb-0">UMS Central Verification</h4>
                                        </div>
                                        <p class="small text-muted-custom mb-3" style="line-height: 1.65; font-size: 0.9rem;">
                                            University Management System for authentic degree verification, e-transcripts, and employer credential screening.
                                        </p>
                                    </div>
                                    <a href="https://www.universitymanagementsystem.in/aku/Home/Dashboard" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3.5 py-1.5 small align-self-start">
                                        Open UMS Portal <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Revaluation & Redressal Help Strip -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs">
                        <div class="d-flex align-items-center gap-3.5">
                            <div class="intro-highlight-badge" style="width: 52px; height: 52px; font-size: 1.25rem;">
                                <i class="fa-solid fa-pen-ruler"></i>
                            </div>
                            <div>
                                <h4 class="font-serif text-primary fs-6 fw-bold mb-0.5">Need Revaluation or Retotalling of Answer Books?</h4>
                                <p class="text-muted-custom small mb-0">Download official Form #12 for Revaluation &amp; Copy Inspection within 15 days of result declaration.</p>
                            </div>
                        </div>
                        <a href="download-form.php" class="btn btn-sm btn-gold-pill px-4 py-2 fw-bold">
                            <i class="fa-solid fa-download me-1.5"></i> Download Revaluation Form
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
