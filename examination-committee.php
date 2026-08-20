<?php 
$pageTitle = "Examination Committee - Dr. APJ Abdul Kalam University, Indore";
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
            <span class="text-gold fw-medium">Examination Committee</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> STATUTORY ACADEMIC GOVERNANCE
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 900px; line-height: 1.15;">
            University Examination Committee
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Evaluation Standards &amp; Assessment Oversight
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
                                <i class="fa-solid fa-users-gear"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Official Directive &amp; Purpose</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.7;">
                                    Constituted in accordance with the statutes and ordinances of Dr. A.P.J. Abdul Kalam University, the Examination Committee oversees the smooth administration, moderation of question papers, appointment of evaluators, and sanctity of all semester examinations.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Members Table -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-user-group"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Examination Committee Roster</h3>
                            </div>
                            <span class="badge bg-gold text-dark fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.75rem;">Statutory Cell</span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Members Name</th>
                                        <th>Committee Role</th>
                                        <th>Designation</th>
                                        <th>Department / Institute</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="fw-bold text-primary">Dr. Rahul Mishra</span></td>
                                        <td><span class="badge bg-primary text-white">Chairman</span></td>
                                        <td>Controller of Examinations</td>
                                        <td>University Administration</td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">Mr. Achal Sharma</span></td>
                                        <td><span class="badge bg-light text-dark border">Member</span></td>
                                        <td>Assistant Professor</td>
                                        <td>Electronics &amp; Comm. (ECE), COE</td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">Mr. Abinash Kumar</span></td>
                                        <td><span class="badge bg-light text-dark border">Member</span></td>
                                        <td>Assistant Professor</td>
                                        <td>Electronics &amp; Comm. (ECE), COE</td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">Mr. Bhagat Singh Yadav</span></td>
                                        <td><span class="badge bg-light text-dark border">Member</span></td>
                                        <td>Assistant Professor</td>
                                        <td>Mathematics, College of Engineering</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Operational Mandate & Key Functions -->
                    <div class="feature-info-card">
                        <div class="d-flex align-items-center gap-3 mb-2.5">
                            <div class="feature-icon-badge">
                                <i class="fa-solid fa-clipboard-check"></i>
                            </div>
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-0">Core Responsibilities &amp; Functions</h4>
                        </div>
                        <ul class="d-flex flex-column gap-2 mb-0 ps-3" style="color: #3e3233; line-height: 1.7; font-size: 0.92rem;">
                            <li>Formulating comprehensive guidelines and schedules for mid-semester and end-semester examinations.</li>
                            <li>Ensuring unbiased appointment of external examiners and moderation of question papers.</li>
                            <li>Investigating cases of unfair means (UFM) and recommending disciplinary measures as per university ordinances.</li>
                            <li>Supervising the centralized evaluation center, result compilation, and timely publication on the university portal.</li>
                        </ul>
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
