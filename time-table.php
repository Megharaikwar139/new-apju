<?php 
$pageTitle = "University Academic & Examination Time Table - Dr. APJ Abdul Kalam University, Indore";
require_once "db.php";
include "header.php"; 

$timetables = [
    [
        'school' => 'Faculty of Engineering & Technology',
        'program' => 'B.E. / B.Tech (Mechanical, Civil, CSE, IT, Electrical)',
        'semester' => 'VIII Semester Regular & Ex',
        'shift' => 'Shift I (09:30 AM - 12:30 PM)',
        'file' => 'uploads/2025/05/18062021_013853_BE-ME-VIII-SEM-JUNE20.pdf'
    ],
    [
        'school' => 'Faculty of Science & Information Technology',
        'program' => 'Master of Computer Applications (MCA)',
        'semester' => 'III Semester Examination',
        'shift' => 'Shift II (01:30 PM - 04:30 PM)',
        'file' => 'uploads/2025/06/14052025_042039_MCA-III-SEM-EX-JUNE-2025.pdf'
    ],
    [
        'school' => 'Faculty of Science & Information Technology',
        'program' => 'Master of Computer Applications (MCA)',
        'semester' => 'IV Semester Regular & Ex',
        'shift' => 'Shift I (09:30 AM - 12:30 PM)',
        'file' => 'uploads/2025/06/14052025_042042_MCA-IV-SEM-REG-AND-EX-JUNE-2025.pdf'
    ],
    [
        'school' => 'Faculty of Science & Information Technology',
        'program' => 'Bachelor of Computer Applications (BCA)',
        'semester' => 'III Semester Examination (Batch 2022/2023)',
        'shift' => 'Shift I (09:30 AM - 12:30 PM)',
        'file' => 'uploads/2025/06/03052025_124831_BCA-III-SEM-EX-APR-2025-FOR-2022-BATCH.pdf'
    ],
    [
        'school' => 'Faculty of Science & Information Technology',
        'program' => 'Bachelor of Computer Applications (BCA)',
        'semester' => 'V Semester Regular & Ex',
        'shift' => 'Shift II (01:30 PM - 04:30 PM)',
        'file' => 'uploads/2025/06/03052025_124840_BCA-V-SEM-EX-APR-2025.pdf'
    ],
    [
        'school' => 'College & School of Pharmacy',
        'program' => 'Diploma in Pharmacy (D.Pharm)',
        'semester' => '1st Year Regular & Ex Examination',
        'shift' => 'Shift I (09:30 AM - 12:30 PM)',
        'file' => 'uploads/2025/06/03052025_124227_D-PH-I-YR-REG-AND-EX-APR-2025.pdf'
    ],
    [
        'school' => 'College of Polytechnic Engineering',
        'program' => 'Polytechnic Diploma in Automobile & Electrical Engg',
        'semester' => 'VIII Semester Regular & Ex',
        'shift' => 'Shift I (09:30 AM - 12:30 PM)',
        'file' => 'uploads/2025/06/14052025_035539_POLY-PT-AE-VIII-SEM-REG-AND-EX-JUNE-2025.pdf'
    ],
    [
        'school' => 'College of Polytechnic Engineering',
        'program' => 'Polytechnic Diploma in Electrical Engineering (EE)',
        'semester' => 'VII Semester Regular & Ex',
        'shift' => 'Shift II (01:30 PM - 04:30 PM)',
        'file' => 'uploads/2025/06/14052025_035542_POLY-PT-EE-VII-SEM-EX-JUNE-2025.pdf'
    ],
    [
        'school' => 'College of Polytechnic Engineering',
        'program' => 'Polytechnic Diploma in Mechanical / Civil Engineering',
        'semester' => 'V & VI Semester Regular & Ex',
        'shift' => 'Shift I (09:30 AM - 12:30 PM)',
        'file' => 'uploads/2025/06/14052025_035550_POLY-V-SEM-EX-JUNE-2025.pdf'
    ],
    [
        'school' => 'Faculty of Education (COPS)',
        'program' => 'Bachelor of Education (B.Ed)',
        'semester' => 'II Semester Regular & Ex Examination',
        'shift' => 'Shift I (09:30 AM - 12:30 PM)',
        'file' => 'uploads/2025/06/06022024_044902_Academic-Calendar.pdf'
    ]
];
?>

<!-- Inner Page Luxury Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="programs.php">Academics</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Time Table</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> ACADEMIC &amp; EXAMINATION SCHEDULES
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Official Academic &amp; Examination Time Tables
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · End-Semester Schedules, Shift Timings &amp; Hall Directives
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
                    
                    <!-- Shift Timings Highlight Card -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-center gap-3">
                                <div class="rounded-circle p-2.5 text-primary" style="background: rgba(112,0,24,0.06); width: 48px; height: 48px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa-regular fa-sun text-gold fs-4"></i>
                                </div>
                                <div>
                                    <div class="badge bg-gold text-dark fw-bold mb-1" style="font-size: 0.7rem;">MORNING SHIFT (I)</div>
                                    <h5 class="font-serif text-primary fw-bold fs-6 mb-0">09:30 AM to 12:30 PM</h5>
                                    <p class="small text-muted-custom mb-0" style="font-size: 0.78rem;">Reporting time: 09:00 AM</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-center gap-3">
                                <div class="rounded-circle p-2.5 text-primary" style="background: rgba(112,0,24,0.06); width: 48px; height: 48px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa-regular fa-clock text-primary fs-4"></i>
                                </div>
                                <div>
                                    <div class="badge bg-light text-primary border fw-bold mb-1" style="font-size: 0.7rem;">AFTERNOON SHIFT (II)</div>
                                    <h5 class="font-serif text-primary fw-bold fs-6 mb-0">01:30 PM to 04:30 PM</h5>
                                    <p class="small text-muted-custom mb-0" style="font-size: 0.78rem;">Reporting time: 01:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Timetables Repository Table -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-calendar-check"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">End-Semester Examination Schedules</h3>
                            </div>
                            <span class="custom-badge-pill">
                                <i class="fa-solid fa-file-pdf text-danger me-1.5"></i> <?php echo count($timetables); ?> Active Timetables
                            </span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;" class="text-center">#</th>
                                        <th>Program / Course &amp; Semester</th>
                                        <th style="width: 170px;">Faculty / School</th>
                                        <th style="width: 140px;">Exam Shift</th>
                                        <th style="width: 120px;" class="text-end">Schedule</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($timetables as $idx => $t): ?>
                                    <tr>
                                        <td class="text-center font-monospace fw-bold text-primary"><?php echo sprintf('%02d', $idx + 1); ?></td>
                                        <td>
                                            <div class="d-flex align-items-start gap-2.5">
                                                <i class="fa-solid fa-file-pdf text-danger fs-5 mt-1 flex-shrink-0"></i>
                                                <div>
                                                    <span class="fw-bold text-primary d-block" style="font-size: 0.92rem;">
                                                        <?php echo htmlspecialchars($t['program']); ?>
                                                    </span>
                                                    <span class="small text-gold fw-semibold"><?php echo htmlspecialchars($t['semester']); ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="small text-muted-custom fw-medium" style="font-size: 0.8rem;"><?php echo htmlspecialchars($t['school']); ?></span>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark border small px-2 py-1" style="font-size: 0.75rem;"><?php echo htmlspecialchars($t['shift']); ?></span>
                                        </td>
                                        <td class="text-end">
                                            <a href="<?php echo htmlspecialchars($t['file']); ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1.5 small fw-semibold" download>
                                                <i class="fa-solid fa-download me-1 text-gold"></i> PDF
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Examination Hall Guidelines Callout -->
                    <div class="p-4 rounded-4 border border-custom bg-white shadow-xs mb-4">
                        <h4 class="font-serif text-primary fs-5 fw-bold mb-2.5 d-flex align-items-center gap-2">
                            <i class="fa-solid fa-triangle-exclamation text-gold"></i>
                            Important Directives for Examinees
                        </h4>
                        <ul class="list-unstyled mb-0 d-flex flex-column gap-2 small text-muted-custom" style="font-size: 0.88rem; line-height: 1.6;">
                            <li class="d-flex align-items-start gap-2">
                                <i class="fa-solid fa-check text-gold mt-1 flex-shrink-0"></i>
                                <span>Candidate must carry the printed <strong>Admit Card</strong> along with their official University Student ID card to gain entry into the examination hall.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2">
                                <i class="fa-solid fa-check text-gold mt-1 flex-shrink-0"></i>
                                <span>No candidate will be allowed entry into the examination hall after 30 minutes of the commencement of examination.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2">
                                <i class="fa-solid fa-check text-gold mt-1 flex-shrink-0"></i>
                                <span>Electronic gadgets, smartwatches, programmable calculators, and mobile phones are strictly prohibited inside the hall.</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Contact Inquiries Footer Box -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mt-5">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Need More Information?</h5>
                            <p class="small text-muted-custom mb-0">For statutory documentation or academic queries regarding Time Table, reach out to the Registrar Office.</p>
                        </div>
                        <a href="contact-us.php" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold">
                            <i class="fa-solid fa-headset me-1"></i> Contact Examination Cell
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
