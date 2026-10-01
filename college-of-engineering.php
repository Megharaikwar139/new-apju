<?php 
$pageTitle = "College of Engineering - Dr. APJ Abdul Kalam University, Indore";
$metaDescription = "Explore undergraduate and postgraduate engineering programs at College of Engineering, Dr. A.P.J. Abdul Kalam University, Indore. Offering AICTE approved B.E. and M.Tech programs.";
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
            <span class="text-gold fw-medium">College of Engineering</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> CONSTITUENT INSTITUTE OF ENGINEERING &amp; TECHNOLOGY
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            College of Engineering
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Recognized by UGC | AICTE Approved
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
                    
                    <!-- Overview & Mission -->
                    <div class="inner-page-body-text" style="line-height: 1.8; font-size: 0.95rem; color: #3e3233;">
                        
                        <div class="mb-4 pb-3 border-bottom border-custom">
                            <span class="badge rounded-pill bg-gold text-dark fw-bold px-3 py-1.5 mb-2" style="font-size: 0.75rem;">
                                <i class="fa-solid fa-award me-1"></i> Constituent Institute
                            </span>
                            <h2 class="font-serif text-primary fs-3 fw-bold mb-3">About College of Engineering</h2>
                            <blockquote class="p-3.5 rounded-3 bg-secondary-tint border-start border-gold border-4 my-3 text-primary fst-italic">
                                "We value a commitment to excellence in all we do. This is the place where you can find the college of your dreams. The aim of education is to teach us how to think, then what to think, improve our mind, think for ourselves, and not just fill our brains. Education makes a man a right thinker and a correct decision maker."
                            </blockquote>
                            <p>
                                The <strong>College of Engineering</strong> at Dr. A.P.J. Abdul Kalam University is dedicated to delivering world-class technical education, fostering research-driven mindsets, and producing versatile engineers capable of excelling in cutting-edge industries across the globe.
                            </p>
                        </div>

                        <!-- Offered Academic Programs (Per Official Prospectus Page 7) -->
                        <div class="courses-section mt-5" id="offered-courses">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
                                <div>
                                    <div class="eyebrow-label gold-eyebrow mb-1" style="color: var(--gold-color) !important;">
                                        <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> PROSPECTUS VERIFIED CURRICULUM
                                    </div>
                                    <h3 class="font-serif text-primary fs-3 fw-bold m-0">Academic Programs Offered</h3>
                                </div>
                                <a href="admission-procedure.php" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold" style="font-size: 0.82rem;">
                                    <i class="fa-solid fa-paper-plane me-1"></i> Apply for Admission
                                </a>
                            </div>

                            <!-- 1. Bachelor of Engineering (B.E.) -->
                            <div class="course-category-group mb-4">
                                <div class="course-category-title mb-3 d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-graduation-cap text-gold fs-5"></i>
                                    <span class="fs-5 fw-bold text-primary">Bachelor of Engineering (B.E. — 4 Years)</span>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <a href="course/b-e-civil-engg.php" class="offered-course-card p-3 rounded-3 border border-custom bg-white d-flex align-items-center justify-content-between text-decoration-none shadow-xs">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="course-icon-badge text-gold fs-4"><i class="fa-solid fa-bridge"></i></div>
                                                <span class="fw-semibold text-primary">B.E. (Civil Engineering)</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right text-muted small"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="course/b-e-mechanical-engineering.php" class="offered-course-card p-3 rounded-3 border border-custom bg-white d-flex align-items-center justify-content-between text-decoration-none shadow-xs">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="course-icon-badge text-gold fs-4"><i class="fa-solid fa-gears"></i></div>
                                                <span class="fw-semibold text-primary">B.E. (Mechanical Engineering)</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right text-muted small"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="course/b-e-computer-science-engineering.php" class="offered-course-card p-3 rounded-3 border border-custom bg-white d-flex align-items-center justify-content-between text-decoration-none shadow-xs">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="course-icon-badge text-gold fs-4"><i class="fa-solid fa-laptop-code"></i></div>
                                                <span class="fw-semibold text-primary">B.E. (Computer Science &amp; Engineering)</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right text-muted small"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="course/b-e-ec.php" class="offered-course-card p-3 rounded-3 border border-custom bg-white d-flex align-items-center justify-content-between text-decoration-none shadow-xs">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="course-icon-badge text-gold fs-4"><i class="fa-solid fa-tower-broadcast"></i></div>
                                                <span class="fw-semibold text-primary">B.E. (Electronics &amp; Communication)</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right text-muted small"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="course/electrical-engineering-ex.php" class="offered-course-card p-3 rounded-3 border border-custom bg-white d-flex align-items-center justify-content-between text-decoration-none shadow-xs">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="course-icon-badge text-gold fs-4"><i class="fa-solid fa-bolt"></i></div>
                                                <span class="fw-semibold text-primary">B.E. (Electrical &amp; Electronics)</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right text-muted small"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="course/b-e-information-technology.php" class="offered-course-card p-3 rounded-3 border border-custom bg-white d-flex align-items-center justify-content-between text-decoration-none shadow-xs">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="course-icon-badge text-gold fs-4"><i class="fa-solid fa-network-wired"></i></div>
                                                <span class="fw-semibold text-primary">B.E. (Information Technology)</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right text-muted small"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- 2. Master of Technology (M.Tech) -->
                            <div class="course-category-group mb-4">
                                <div class="course-category-title mb-3 d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-microchip text-gold fs-5"></i>
                                    <span class="fs-5 fw-bold text-primary">Master of Technology (M.Tech — 2 Years)</span>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <a href="course/m-tech-computer-science-engineering.php" class="offered-course-card p-3 rounded-3 border border-custom bg-white d-flex align-items-center justify-content-between text-decoration-none shadow-xs">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="course-icon-badge text-gold fs-4"><i class="fa-solid fa-brain"></i></div>
                                                <span class="fw-semibold text-primary">M.Tech (Computer Science &amp; Engineering)</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right text-muted small"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="course/m-tech-digital-communication.php" class="offered-course-card p-3 rounded-3 border border-custom bg-white d-flex align-items-center justify-content-between text-decoration-none shadow-xs">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="course-icon-badge text-gold fs-4"><i class="fa-solid fa-satellite-dish"></i></div>
                                                <span class="fw-semibold text-primary">M.Tech (Digital Communication)</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right text-muted small"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="course/m-tech-power-system.php" class="offered-course-card p-3 rounded-3 border border-custom bg-white d-flex align-items-center justify-content-between text-decoration-none shadow-xs">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="course-icon-badge text-gold fs-4"><i class="fa-solid fa-solar-panel"></i></div>
                                                <span class="fw-semibold text-primary">M.Tech (Power System)</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right text-muted small"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="course/m-tech-thermal-engg.php" class="offered-course-card p-3 rounded-3 border border-custom bg-white d-flex align-items-center justify-content-between text-decoration-none shadow-xs">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="course-icon-badge text-gold fs-4"><i class="fa-solid fa-fire-burner"></i></div>
                                                <span class="fw-semibold text-primary">M.Tech (Thermal Engineering)</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right text-muted small"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- 3. Management & Computer Applications (COE) -->
                            <div class="course-category-group mb-4">
                                <div class="course-category-title mb-3 d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-briefcase text-gold fs-5"></i>
                                    <span class="fs-5 fw-bold text-primary">Postgraduate Programs</span>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <a href="course/mba.php" class="offered-course-card p-3 rounded-3 border border-custom bg-white d-flex align-items-center justify-content-between text-decoration-none shadow-xs">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="course-icon-badge text-gold fs-4"><i class="fa-solid fa-chart-line"></i></div>
                                                <span class="fw-semibold text-primary">MBA (Dual Specialization — 2 Years)</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right text-muted small"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="course/mca.php" class="offered-course-card p-3 rounded-3 border border-custom bg-white d-flex align-items-center justify-content-between text-decoration-none shadow-xs">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="course-icon-badge text-gold fs-4"><i class="fa-solid fa-code"></i></div>
                                                <span class="fw-semibold text-primary">MCA (Master of Computer Applications — 2 Years)</span>
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
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Need More Information?</h5>
                            <p class="small text-muted-custom mb-0">For statutory documentation or academic queries regarding College of Engineering, reach out to the Admissions Office.</p>
                        </div>
                        <a href="contact-us.php" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold">
                            <i class="fa-solid fa-headset me-1"></i> Contact Admissions
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
