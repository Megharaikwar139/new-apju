<?php 
$pageTitle = "College of Polytechnic Engineering - Dr. APJ Abdul Kalam University, Indore";
$metaDescription = "Explore diploma engineering programs at College of Polytechnic Engineering, Dr. A.P.J. Abdul Kalam University, Indore. Offering 3-year full time and part-time polytechnic engineering diplomas.";
require_once "db.php";
include "header.php"; 
?>

<!-- Inner Page Luxury Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <span class="text-white text-opacity-75">Constituent Institutes</span>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">College of Polytechnic Engineering</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> CONSTITUENT INSTITUTE OF TECHNICAL EDUCATION
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            College of Polytechnic Engineering
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Approved by AICTE, New Delhi &amp; Recognized by UGC
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
                    
                    <!-- Overview & Principal Message -->
                    <div class="inner-page-body-text" style="line-height: 1.8; font-size: 0.95rem; color: #3e3233;">
                        
                        <div class="mb-4 pb-3 border-bottom border-custom">
                            <span class="badge rounded-pill bg-gold text-dark fw-bold px-3 py-1.5 mb-2" style="font-size: 0.75rem;">
                                <i class="fa-solid fa-award me-1"></i> Constituent Institute
                            </span>
                            <h2 class="font-serif text-primary fs-3 fw-bold mb-3">About College of Polytechnic Engineering</h2>
                            
                            <blockquote class="p-3.5 rounded-3 bg-secondary-tint border-start border-gold border-4 my-3 text-primary fst-italic">
                                "Technical Education is the backbone of every nation and is the stepping stone for a country to move into the niche of a developed nation. College of Polytechnic Engineering has been contributing in the mission of transforming rural India into developed nation with innovation, creativity, human intelligence and patience. It gives me immense pleasure to welcome you to the creative world of COPE which has very eco-friendly campus and is equipped with state-of-art infrastructure."
                            </blockquote>

                            <p>
                                <strong>College of Polytechnic Engineering (COPE)</strong> provides hands-on practical technical education that equips students with essential skills for core engineering industries, government technical departments, manufacturing plants, and entrepreneurial ventures.
                            </p>
                        </div>

                        <!-- Offered Academic Programs (Per Official Prospectus Page 8) -->
                        <div class="courses-section mt-5" id="offered-courses">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
                                <div>
                                    <div class="eyebrow-label gold-eyebrow mb-1" style="color: var(--gold-color) !important;">
                                        <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> PROSPECTUS VERIFIED CURRICULUM
                                    </div>
                                    <h3 class="font-serif text-primary fs-3 fw-bold m-0">Polytechnic Diploma Programs</h3>
                                </div>
                                <a href="admission-procedure.php" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold" style="font-size: 0.82rem;">
                                    <i class="fa-solid fa-paper-plane me-1"></i> Apply for Admission
                                </a>
                            </div>

                            <!-- 1. Full-Time Diploma Programs (3 Years) -->
                            <div class="course-category-group mb-4">
                                <div class="course-category-title mb-3 d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-graduation-cap text-gold fs-5"></i>
                                    <span class="fs-5 fw-bold text-primary">Full-Time Diploma Engineering (3 Years / 6 Semesters)</span>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <a href="course/diploma-in-civil-engineering.php" class="offered-course-card p-3 rounded-3 border border-custom bg-white d-flex align-items-center justify-content-between text-decoration-none shadow-xs">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="course-icon-badge text-gold fs-4"><i class="fa-solid fa-trowel-bricks"></i></div>
                                                <span class="fw-semibold text-primary">Diploma in Civil Engineering</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right text-muted small"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="course/diploma-in-mechanical-engineering.php" class="offered-course-card p-3 rounded-3 border border-custom bg-white d-flex align-items-center justify-content-between text-decoration-none shadow-xs">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="course-icon-badge text-gold fs-4"><i class="fa-solid fa-gears"></i></div>
                                                <span class="fw-semibold text-primary">Diploma in Mechanical Engineering</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right text-muted small"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="course/diploma-in-electrical-engineering.php" class="offered-course-card p-3 rounded-3 border border-custom bg-white d-flex align-items-center justify-content-between text-decoration-none shadow-xs">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="course-icon-badge text-gold fs-4"><i class="fa-solid fa-bolt"></i></div>
                                                <span class="fw-semibold text-primary">Diploma in Electrical Engineering</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right text-muted small"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="course/diploma-in-electronics-telecommunication.php" class="offered-course-card p-3 rounded-3 border border-custom bg-white d-flex align-items-center justify-content-between text-decoration-none shadow-xs">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="course-icon-badge text-gold fs-4"><i class="fa-solid fa-tower-cell"></i></div>
                                                <span class="fw-semibold text-primary">Diploma in Electronics &amp; Telecommunication</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right text-muted small"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="course/diploma-in-cse-dc.php" class="offered-course-card p-3 rounded-3 border border-custom bg-white d-flex align-items-center justify-content-between text-decoration-none shadow-xs">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="course-icon-badge text-gold fs-4"><i class="fa-solid fa-laptop-code"></i></div>
                                                <span class="fw-semibold text-primary">Diploma in Computer Science &amp; Engineering</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right text-muted small"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="course/diploma-in-engineering-lateral-entry.php" class="offered-course-card p-3 rounded-3 border border-custom bg-white d-flex align-items-center justify-content-between text-decoration-none shadow-xs">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="course-icon-badge text-gold fs-4"><i class="fa-solid fa-forward-fast"></i></div>
                                                <span class="fw-semibold text-primary">Diploma Engineering (Lateral Entry — 2 Years)</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right text-muted small"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- 2. Part-Time Diploma Programs -->
                            <div class="course-category-group mb-4">
                                <div class="course-category-title mb-3 d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-business-time text-gold fs-5"></i>
                                    <span class="fs-5 fw-bold text-primary">Part-Time Diploma Programs</span>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <a href="course/diploma-in-automobile-engineering-part-time.php" class="offered-course-card p-3 rounded-3 border border-custom bg-white d-flex align-items-center justify-content-between text-decoration-none shadow-xs">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="course-icon-badge text-gold fs-4"><i class="fa-solid fa-car"></i></div>
                                                <span class="fw-semibold text-primary">Automobile Engineering (Part Time)</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right text-muted small"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="course/diploma-in-electrical-engineering-part-time.php" class="offered-course-card p-3 rounded-3 border border-custom bg-white d-flex align-items-center justify-content-between text-decoration-none shadow-xs">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="course-icon-badge text-gold fs-4"><i class="fa-solid fa-plug-circle-bolt"></i></div>
                                                <span class="fw-semibold text-primary">Electrical Engineering (Part Time)</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right text-muted small"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- Contact Inquiries Footer Box -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mt-5">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Need Admission Assistance?</h5>
                            <p class="small text-muted-custom mb-0">For polytechnic eligibility, lateral entry guidance, and counseling, contact the Polytechnic Admission Cell.</p>
                        </div>
                        <a href="contact-us.php" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold">
                            <i class="fa-solid fa-headset me-1"></i> Contact Admission Cell
                        </a>
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

<?php include "footer.php"; ?>
