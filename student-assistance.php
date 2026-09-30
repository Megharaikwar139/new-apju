<?php 
$pageTitle = "Student Assistance & Welfare - Dr. APJ Abdul Kalam University, Indore";
require_once "db.php";
include "header.php"; 

$assistanceServices = [
    [
        'title' => 'Financial Aid & Scholarship Helpdesk',
        'icon' => 'fa-hand-holding-dollar',
        'desc' => 'End-to-end guidance for state & central government scholarships (MP Post-Matric, National Scholarship Portal, Medhavi Chhatra Yojana) as well as university merit-cum-means tuition fee concessions.'
    ],
    [
        'title' => 'Academic Mentoring & Remedial Coaching',
        'icon' => 'fa-chalkboard-user',
        'desc' => 'Every student is assigned a dedicated faculty mentor (1:15 mentor-mentee ratio) for academic advising, course planning, and specialized remedial classes for challenging subjects.'
    ],
    [
        'title' => 'Student Grievance Redressal Cell (SGRC)',
        'icon' => 'fa-scale-balanced',
        'desc' => 'A transparent, statutory forum to report and resolve academic, administrative, or infrastructural grievances with strict time-bound escalation directly to the University Ombudsman.'
    ],
    [
        'title' => 'Anti-Ragging & Campus Safety Cell',
        'icon' => 'fa-shield-halved',
        'desc' => 'Strict zero-tolerance policy against ragging. 24/7 campus security, high-resolution CCTV coverage, dedicated women’s safety helpline, and proactive Proctorial Flying Squads across hostels.'
    ],
    [
        'title' => 'Career Guidance & Placement Support',
        'icon' => 'fa-briefcase',
        'desc' => 'Pre-placement soft skills development, mock interviews, aptitude training, industry internships, and campus recruitment drives conducted by the Training & Placement Cell.'
    ],
    [
        'title' => 'Equal Opportunity & Divyangjan Cell',
        'icon' => 'fa-wheelchair',
        'desc' => 'Barrier-free campus with ramps, accessible elevators, reserved hostel accommodations, assistive digital library resources, and dedicated welfare officers for differently-abled scholars.'
    ]
];

$helplineContacts = [
    ['cell' => 'Registrar Secretariat', 'person' => 'Mr. Sandeep Gupta', 'contact' => '+91 731 2530 500', 'email' => 'registrar@aku.ac.in', 'office' => 'Administrative Block, Ground Floor'],
    ['cell' => 'Chief Proctor Office', 'person' => 'Dr. Karunakar Shukla', 'contact' => '+91 731 2530 515', 'email' => 'proctor@aku.ac.in', 'office' => 'Proctorial Desk, Campus Gate 1'],
    ['cell' => 'Dean Student Welfare (DSW)', 'person' => 'Student Welfare Officer', 'contact' => '+91 731 2530 520', 'email' => 'dsw@aku.ac.in', 'office' => 'Student Amenities Centre, 1st Floor'],
    ['cell' => 'Scholarship & Financial Desk', 'person' => 'Accounts & Nodal Officer', 'contact' => '+91 731 2530 525', 'email' => 'scholarship@aku.ac.in', 'office' => 'Finance & Accounts Wing, Room 104'],
    ['cell' => 'Anti-Ragging 24x7 Helpline', 'person' => 'National Anti-Ragging Cell', 'contact' => '1800-180-5522', 'email' => 'helpline@antiragging.in', 'office' => 'Toll Free National Portal']
];
?>

<!-- Inner Page Luxury Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="notice-board.php">Student Zone</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Student Assistance</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> 360° STUDENT SUPPORT SERVICES
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Student Welfare &amp; Assistance Desk
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Holistic Mentorship, Welfare Facilities &amp; Campus Services
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
                                <i class="fa-solid fa-hand-holding-heart"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Caring for Every Student’s Journey</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    At Dr. A.P.J. Abdul Kalam University, student success and well-being are paramount. The <strong>Student Assistance Desk</strong> functions as a centralized gateway providing financial counseling, scholarship processing, personalized academic mentoring, psychological wellness support, and grievance redressal to guarantee a thriving campus experience.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Assistance Pillars Grid -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-cubes-stacked"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Student Support Ecosystem</h3>
                            </div>
                            <span class="custom-badge-pill">
                                <i class="fa-solid fa-heart-pulse text-gold me-1.5"></i> Comprehensive Care
                            </span>
                        </div>

                        <div class="row g-3.5">
                            <?php foreach ($assistanceServices as $service): ?>
                            <div class="col-md-6">
                                <div class="p-4 rounded-4 border border-custom bg-white shadow-xs h-100 hover-shadow transition-all">
                                    <div class="d-flex align-items-center gap-3 mb-2.5">
                                        <div class="rounded-circle p-2.5 text-primary" style="background: rgba(112,0,24,0.06); width: 44px; height: 44px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fa-solid <?php echo $service['icon']; ?> fs-5"></i>
                                        </div>
                                        <h4 class="font-serif text-primary fs-6 fw-bold mb-0" style="line-height: 1.35;"><?php echo htmlspecialchars($service['title']); ?></h4>
                                    </div>
                                    <p class="text-muted-custom small mb-0" style="line-height: 1.6; font-size: 0.88rem;">
                                        <?php echo htmlspecialchars($service['desc']); ?>
                                    </p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Contact & Helpline Directory Table -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-phone-volume"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Support Officers &amp; Emergency Helplines</h3>
                            </div>
                            <span class="custom-badge-pill">
                                <i class="fa-solid fa-headset text-primary me-1.5"></i> 24x7 Assistance
                            </span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Cell / Department</th>
                                        <th>Officer / Authority</th>
                                        <th>Contact Details</th>
                                        <th style="width: 200px;">Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($helplineContacts as $h): ?>
                                    <tr>
                                        <td>
                                            <span class="fw-bold text-primary d-block" style="font-size: 0.92rem;">
                                                <?php echo htmlspecialchars($h['cell']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="small text-dark fw-medium"><?php echo htmlspecialchars($h['person']); ?></span>
                                        </td>
                                        <td>
                                            <div class="small">
                                                <a href="tel:<?php echo htmlspecialchars($h['contact']); ?>" class="text-decoration-none fw-semibold text-primary">
                                                    <i class="fa-solid fa-phone me-1 text-gold"></i> <?php echo htmlspecialchars($h['contact']); ?>
                                                </a>
                                                <div class="text-muted" style="font-size: 0.8rem;">
                                                    <i class="fa-solid fa-envelope me-1"></i> <?php echo htmlspecialchars($h['email']); ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="small text-muted-custom"><?php echo htmlspecialchars($h['office']); ?></span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Online Help Request Banner -->
                    <div class="p-4 rounded-4 text-white mb-4 d-flex align-items-center justify-content-between flex-wrap gap-3" style="background: linear-gradient(135deg, #700018 0%, #4a0010 100%);">
                        <div>
                            <span class="badge bg-gold text-dark fw-bold mb-2">Student Care Portal</span>
                            <h4 class="font-serif fs-4 fw-bold text-white mb-1">Submit an Online Assistance Request</h4>
                            <p class="small text-white text-opacity-80 mb-0" style="max-width: 650px;">
                                Need help with fees, scholarship verification, hostel allotments, or exam doubts? Submit your query online and receive a tracking ticket.
                            </p>
                        </div>
                        <a href="contact-us.php" class="btn btn-gold-pill px-4 py-2.5 fw-bold text-decoration-none">
                            Submit Inquiry <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>

                    <!-- Contact Inquiries Footer Box -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mt-5">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Need More Information?</h5>
                            <p class="small text-muted-custom mb-0">For statutory documentation or academic queries regarding Student Assistance, reach out to the Registrar Office.</p>
                        </div>
                        <a href="contact-us.php" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold">
                            <i class="fa-solid fa-headset me-1"></i> Contact Registrar
                        </a>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <?php include "student-sidebar.php"; ?>
            </div>

        </div>
    </div>
</main>

<?php include "footer.php"; ?>
