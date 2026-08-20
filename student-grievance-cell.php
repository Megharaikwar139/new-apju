<?php 
$pageTitle = "Student Grievance Redressal Cell - Dr. APJ Abdul Kalam University, Indore";
include "header.php"; 

$grievanceMembers = [
    ["name" => "Dr. Govind Soni", "role" => "Chairman", "desig" => "Professor", "dept" => "College of Pharmacy (COP)", "mobile" => "+91 99269 30282"],
    ["name" => "Dr. Arvind Paikrao", "role" => "Member", "desig" => "Professor", "dept" => "RNKMAMC&H (Ayurveda)", "mobile" => "Campus Extn."],
    ["name" => "Ms. Shobhana Thakur", "role" => "Member", "desig" => "Assistant Professor", "dept" => "Chemistry, COE", "mobile" => "Campus Extn."],
    ["name" => "Mr. Yogesh K. Kelotra", "role" => "Member", "desig" => "Assistant Professor", "dept" => "Agriculture, COPS", "mobile" => "+91 83196 83023"],
    ["name" => "Ms. Lata Kanase", "role" => "Member", "desig" => "Lecturer", "dept" => "School of Pharmacy (SOP)", "mobile" => "Campus Extn."],
    ["name" => "Mr. Shubham Bairagi", "role" => "Student Nominee", "desig" => "Student Representative", "dept" => "Student Council", "mobile" => "Student Wing"],
    ["name" => "Mr. Lakhan Malviya", "role" => "Student Nominee", "desig" => "Student Representative", "dept" => "School of Pharmacy", "mobile" => "Student Wing"]
];
?>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="notice-board.php">Student Zone</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Student Grievance Cell</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> FAIR &amp; TRANSPARENT STUDENT SUPPORT
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Student Grievance Redressal Cell
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · UGC Mandated Speedy Grievance Redressal
        </p>
    </div>
</section>

<!-- Main Body -->
<main class="py-5" style="background-color: var(--bg-ivory);">
    <div class="container-custom">
        <div class="row g-4 g-xl-5">
            
            <div class="col-lg-8 col-xl-9">
                <article class="inner-main-card">
                    
                    <div class="intro-highlight-card mb-5">
                        <div class="d-flex align-items-center gap-3.5">
                            <div class="intro-highlight-badge">
                                <i class="fa-solid fa-scale-balanced"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Time-Bound Redressal of Student Grievances</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    The Student Grievance Redressal Cell provides a transparent, fair, and confidential platform for students to voice their concerns regarding academic delivery, examinations, fee structures, library facilities, hostels, and campus life.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Members Table -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-users"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Grievance Cell Committee Composition</h3>
                            </div>
                            <span class="badge bg-gold text-dark fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.75rem;">Statutory Roster</span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Members Name</th>
                                        <th style="width: 160px;">Committee Role</th>
                                        <th>Designation</th>
                                        <th>Dept. / Institute</th>
                                        <th style="width: 150px;">Contact No.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($grievanceMembers as $m): ?>
                                    <tr>
                                        <td><span class="fw-bold text-primary"><?php echo htmlspecialchars($m['name']); ?></span></td>
                                        <td>
                                            <span class="badge <?php echo ($m['role'] === 'Chairman') ? 'bg-primary text-white' : 'bg-light text-dark border'; ?>">
                                                <?php echo htmlspecialchars($m['role']); ?>
                                            </span>
                                        </td>
                                        <td><?php echo htmlspecialchars($m['desig']); ?></td>
                                        <td><?php echo htmlspecialchars($m['dept']); ?></td>
                                        <td><span class="font-monospace small text-muted-custom fw-semibold"><?php echo htmlspecialchars($m['mobile']); ?></span></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Grievance Redressal Process -->
                    <div class="feature-info-card p-4 p-md-4.5 mb-4">
                        <div class="d-flex align-items-center gap-3 mb-3 pb-2.5 border-bottom border-custom">
                            <div class="feature-icon-badge">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-0">How to Lodge a Grievance</h4>
                        </div>
                        <ul class="d-flex flex-column gap-2.5 mb-0 ps-0 list-unstyled" style="color: #3e3233; line-height: 1.7; font-size: 0.92rem;">
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Online Submission:</strong> Students can submit written representations via the ERP portal or email at <a href="mailto:grievance@aku.ac.in" class="text-primary fw-bold">grievance@aku.ac.in</a>.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Confidential Drop-Boxes:</strong> Grievance drop-boxes are installed across all academic blocks and hostels.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Guaranteed Resolution:</strong> The committee meets bi-weekly and dispatches formal resolution reports within 15 working days.</span>
                            </li>
                        </ul>
                    </div>

                </article>
            </div>

            <div class="col-lg-4 col-xl-3">
                <?php include "student-sidebar.php"; ?>
            </div>

        </div>
    </div>
</main>

<?php include "footer.php"; ?>