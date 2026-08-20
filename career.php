<?php 
$pageTitle = "Careers & Faculty Recruitment - Dr. APJ Abdul Kalam University, Indore";
require_once 'db.php';
include 'header.php'; 

$teachingOpenings = [
    ['role' => 'Professor / Associate Professor', 'dept' => 'Computer Science & Engineering', 'exp' => '8-10+ Yrs (Ph.D Mandatory)', 'type' => 'Full Time', 'deadline' => 'Open Hiring'],
    ['role' => 'Assistant Professor', 'dept' => 'Pharmaceutical Chemistry & Pharmaceutics', 'exp' => '2-5 Yrs (M.Pharm / Ph.D)', 'type' => 'Full Time', 'deadline' => 'Open Hiring'],
    ['role' => 'Professor / Associate Professor', 'dept' => 'School of Management Studies (MBA)', 'exp' => '5-8+ Yrs (Ph.D / UGC-NET)', 'type' => 'Full Time', 'deadline' => 'Open Hiring'],
    ['role' => 'Assistant Professor', 'dept' => 'Agronomy, Horticulture & Soil Science', 'exp' => '2-4 Yrs (M.Sc Agri / Ph.D)', 'type' => 'Full Time', 'deadline' => 'Open Hiring'],
    ['role' => 'Assistant Professor', 'dept' => 'Civil & Mechanical Engineering', 'exp' => '2-5 Yrs (M.Tech / Ph.D)', 'type' => 'Full Time', 'deadline' => 'Open Hiring']
];

$nonTeachingOpenings = [
    ['role' => 'Senior ERP & Database Administrator', 'dept' => 'Central IT Cell', 'exp' => '3-5 Yrs (SQL / PHP / Linux)', 'type' => 'Full Time', 'deadline' => 'Immediate'],
    ['role' => 'Admission Outreach Counsellor', 'dept' => 'Admissions & Marketing', 'exp' => '2-4 Yrs in Higher Ed Sales', 'type' => 'Full Time', 'deadline' => 'Immediate'],
    ['role' => 'Pharmacy Lab Technician', 'dept' => 'Institute of Pharmacy (IOP)', 'exp' => '1-3 Yrs (D.Pharm / B.Sc)', 'type' => 'Full Time', 'deadline' => 'Immediate'],
    ['role' => 'Academic Coordinator & Exam Officer', 'dept' => 'Office of Controller of Exams', 'exp' => '3-5 Yrs Admin Experience', 'type' => 'Full Time', 'deadline' => 'Immediate']
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
            <span class="text-gold fw-medium">Careers @ AKU</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> JOIN OUR SCHOLARLY COMMUNITY
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Work With Us: Careers at AKU
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Faculty Recruitment &amp; Professional Leadership Opportunities
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
                                <i class="fa-solid fa-briefcase"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Nurturing Academic &amp; Institutional Excellence</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Dr. A.P.J. Abdul Kalam University invites applications from visionary educators, researchers, and professional administrators passionate about transforming young minds and advancing scientific innovations on our 50-acre green campus.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Perks & Benefits -->
                    <div class="row g-3.5 mb-5">
                        <div class="col-md-4">
                            <div class="feature-info-card p-3.5 h-100 text-center">
                                <div class="feature-icon-badge mx-auto mb-2.5">
                                    <i class="fa-solid fa-money-bill-trend-up"></i>
                                </div>
                                <h5 class="font-serif text-primary fw-bold fs-6 mb-1">UGC 7th Pay Scales</h5>
                                <p class="small text-muted-custom mb-0" style="font-size: 0.82rem;">Competitive compensation, annual increments, and performance bonuses.</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="feature-info-card p-3.5 h-100 text-center">
                                <div class="feature-icon-badge mx-auto mb-2.5">
                                    <i class="fa-solid fa-flask-vial"></i>
                                </div>
                                <h5 class="font-serif text-primary fw-bold fs-6 mb-1">Seed Research Grants</h5>
                                <p class="small text-muted-custom mb-0" style="font-size: 0.82rem;">Internal R&amp;D seed grants up to ₹2 Lakhs for publishing and patenting.</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="feature-info-card p-3.5 h-100 text-center">
                                <div class="feature-icon-badge mx-auto mb-2.5">
                                    <i class="fa-solid fa-house-medical"></i>
                                </div>
                                <h5 class="font-serif text-primary fw-bold fs-6 mb-1">Campus Perks &amp; Quarters</h5>
                                <p class="small text-muted-custom mb-0" style="font-size: 0.82rem;">Residential quarters, free bus transit, medical coverage &amp; daycare.</p>
                            </div>
                        </div>
                    </div>

                    <!-- 1. Teaching Openings -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-chalkboard-user"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Faculty &amp; Teaching Openings</h3>
                            </div>
                            <span class="badge bg-gold text-dark fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.75rem;">Academic Session 2026-27</span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Position / Role</th>
                                        <th>Department / Faculty</th>
                                        <th>Eligibility Criteria</th>
                                        <th>Type</th>
                                        <th class="text-end">Apply</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($teachingOpenings as $job): ?>
                                    <tr>
                                        <td><span class="fw-bold text-primary"><?php echo htmlspecialchars($job['role']); ?></span></td>
                                        <td><?php echo htmlspecialchars($job['dept']); ?></td>
                                        <td><span class="small text-muted-custom"><?php echo htmlspecialchars($job['exp']); ?></span></td>
                                        <td><span class="badge bg-light text-dark border"><?php echo htmlspecialchars($job['type']); ?></span></td>
                                        <td class="text-end">
                                            <a href="#applyFormSection" class="btn btn-sm btn-gold-pill px-3 py-1 fw-bold" style="font-size: 0.78rem;">
                                                Apply <i class="fa-solid fa-arrow-right ms-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- 2. Non-Teaching Openings -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-user-gear"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Administrative &amp; Technical Staff Openings</h3>
                            </div>
                            <span class="badge bg-gold text-dark fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.75rem;">Support Staff</span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Position / Role</th>
                                        <th>Department / Unit</th>
                                        <th>Experience Required</th>
                                        <th>Status</th>
                                        <th class="text-end">Apply</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($nonTeachingOpenings as $job): ?>
                                    <tr>
                                        <td><span class="fw-bold text-primary"><?php echo htmlspecialchars($job['role']); ?></span></td>
                                        <td><?php echo htmlspecialchars($job['dept']); ?></td>
                                        <td><span class="small text-muted-custom"><?php echo htmlspecialchars($job['exp']); ?></span></td>
                                        <td><span class="badge bg-light text-dark border"><?php echo htmlspecialchars($job['deadline']); ?></span></td>
                                        <td class="text-end">
                                            <a href="#applyFormSection" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 fw-bold" style="font-size: 0.78rem;">
                                                Apply <i class="fa-solid fa-arrow-right ms-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Application Form Box -->
                    <div class="feature-info-card p-4 p-md-4.5 mb-4" id="applyFormSection">
                        <div class="d-flex align-items-center gap-3 mb-3 pb-2.5 border-bottom border-custom">
                            <div class="feature-icon-badge">
                                <i class="fa-solid fa-file-arrow-up"></i>
                            </div>
                            <div>
                                <h4 class="font-serif text-primary fw-bold fs-5 mb-0">Quick Job Application / CV Submission</h4>
                                <p class="small text-muted-custom mb-0">Submit your profile directly to the University HR Recruitment Cell.</p>
                            </div>
                        </div>

                        <form action="javascript:void(0);" onsubmit="alert('Thank you! Your job application has been submitted successfully to the HR Cell.'); this.reset();" class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-primary">Full Name *</label>
                                <input type="text" required class="form-control border-custom" placeholder="e.g. Dr. Rajesh Sharma">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-primary">Email Address *</label>
                                <input type="email" required class="form-control border-custom" placeholder="e.g. rajesh@gmail.com">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-primary">Phone Number *</label>
                                <input type="tel" required class="form-control border-custom" placeholder="e.g. +91 98765 43210">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-primary">Position &amp; Department Applied For *</label>
                                <input type="text" required class="form-control border-custom" placeholder="e.g. Assistant Professor (CSE)">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-primary">Highest Qualification *</label>
                                <input type="text" required class="form-control border-custom" placeholder="e.g. Ph.D / M.Tech / M.Pharm / MBA">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-primary">Total Experience (Years) *</label>
                                <input type="text" required class="form-control border-custom" placeholder="e.g. 5 Years (Teaching + Research)">
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold text-primary">Upload Updated Resume / CV (PDF / Word) *</label>
                                <input type="file" required class="form-control border-custom" accept=".pdf,.doc,.docx">
                                <div class="form-text small">Maximum file size: 5MB. Must include list of publications and credentials.</div>
                            </div>
                            <div class="col-12 text-end mt-4">
                                <button type="submit" class="btn btn-gold-pill px-4 py-2.5 fw-bold">
                                    <i class="fa-solid fa-paper-plane me-1.5"></i> Submit Application to HR
                                </button>
                            </div>
                        </form>

                        <div class="mt-4 pt-3 border-top border-custom small text-muted-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <span><i class="fa-solid fa-envelope text-gold me-1"></i> Direct HR Email: <a href="mailto:office_university@aku.ac.in" class="text-primary fw-bold">office_university@aku.ac.in</a></span>
                            <span><i class="fa-solid fa-phone text-gold me-1"></i> Toll-Free: <strong>1800 300 26072</strong></span>
                        </div>
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
