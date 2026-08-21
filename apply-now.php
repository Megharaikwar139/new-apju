<?php 
require_once 'db.php';

$successMessage = '';
$errorMessage = '';
$generatedAppNo = '';

// Fetch all active courses from database for the dropdown
$allCourses = [];
try {
    $stmt = $pdo->query("SELECT id, slug, title, degree_type, duration FROM courses WHERE status = 1 ORDER BY title ASC");
    $allCourses = $stmt->fetchAll();
} catch (Exception $e) {
    $allCourses = [];
}

// Pre-selected course from GET query parameter if any
$preselectedCourse = trim($_GET['course'] ?? '');

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_application'])) {
    $fullName = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $mobileNo = trim($_POST['mobile_no'] ?? '');
    $gender = trim($_POST['gender'] ?? '');
    $dob = !empty($_POST['dob']) ? $_POST['dob'] : null;
    $state = trim($_POST['state'] ?? '');
    $city = trim($_POST['city'] ?? '');
    $courseName = trim($_POST['course_name'] ?? '');
    $programType = trim($_POST['program_type'] ?? '');
    $qualification = trim($_POST['highest_qualification'] ?? '');
    $instituteName = trim($_POST['institute_name'] ?? '');
    $boardUniversity = trim($_POST['board_university'] ?? '');
    $passingYear = trim($_POST['passing_year'] ?? '');
    $percentage = trim($_POST['percentage'] ?? '');
    $streamSubject = trim($_POST['stream_subject'] ?? '');
    $entranceExam = trim($_POST['entrance_exam'] ?? '');
    $entranceScore = trim($_POST['entrance_score'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($fullName) || empty($email) || empty($mobileNo) || empty($courseName)) {
        $errorMessage = "Please fill in all mandatory fields (Full Name, Email, Mobile Number, and Course).";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Please enter a valid email address.";
    } elseif (!preg_match('/^[0-9]{10}$/', preg_replace('/[^0-9]/', '', $mobileNo))) {
        $errorMessage = "Please enter a valid 10-digit mobile number.";
    } else {
        try {
            $generatedAppNo = 'AKU-' . date('Y') . '-' . mt_rand(10000, 99999);
            
            $ins = $pdo->prepare("INSERT INTO admission_applications 
                (application_no, full_name, email, mobile_no, gender, dob, state, city, program_type, course_name, highest_qualification, percentage, institute_name, board_university, passing_year, stream_subject, entrance_exam, entrance_score, message, status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'new')");
            
            $ins->execute([
                $generatedAppNo, $fullName, $email, $mobileNo, $gender, $dob, 
                $state, $city, $programType, $courseName, $qualification, $percentage,
                $instituteName, $boardUniversity, $passingYear, $streamSubject,
                $entranceExam, $entranceScore, $message
            ]);

            $successMessage = "Congratulations! Your admission application has been registered successfully with Reference ID <strong>{$generatedAppNo}</strong>. Our Admissions Counseling Cell will contact you shortly.";
        } catch (Exception $e) {
            $errorMessage = "An error occurred while submitting your application. Please try again or call our admission helpline.";
        }
    }
}

$pageTitle = "Apply Online for Admission 2026-27 - Dr. APJ Abdul Kalam University, Indore";
include 'header.php'; 
?>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="admission-procedure.php">Admissions</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Apply Online</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> ADMISSIONS REGISTRATION SESSION 2026-27
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 900px; line-height: 1.15;">
            Online Admission Application Form
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · UGC, AICTE, PCI &amp; Govt. Recognized Programs
        </p>
    </div>
</section>

<!-- Main Body -->
<main class="py-5" style="background-color: var(--bg-ivory);">
    <div class="container-custom">
        <div class="row g-4 g-xl-5">
            
            <!-- Left Main Content: Application Form -->
            <div class="col-lg-8 col-xl-9">
                <article class="inner-main-card">
                    
                    <?php if (!empty($successMessage)): ?>
                        <!-- Success Message Box -->
                        <div class="p-4 p-md-5 rounded-4 border border-success bg-white text-center shadow-sm mb-4">
                            <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" style="width: 72px; height: 72px; background: linear-gradient(135deg, #198754 0%, #146c43 100%);">
                                <i class="fa-solid fa-check text-white fs-2"></i>
                            </div>
                            <h3 class="font-serif text-success fs-3 fw-bold mb-2">Application Submitted Successfully!</h3>
                            <p class="text-muted-custom fs-6 mb-4" style="line-height: 1.7;">
                                <?php echo $successMessage; ?>
                            </p>

                            <div class="p-3 bg-light rounded-4 border border-custom d-inline-flex align-items-center gap-3 mb-4 text-start">
                                <div>
                                    <div class="text-muted-custom small text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.1em;">Application Reference No.</div>
                                    <div class="font-serif text-primary fs-5 fw-bold"><?php echo htmlspecialchars($generatedAppNo); ?></div>
                                </div>
                                <span class="badge bg-gold text-dark fw-bold px-3 py-2 rounded-pill">Status: Received</span>
                            </div>

                            <div class="d-flex justify-content-center flex-wrap gap-3">
                                <a href="admission-procedure.php" class="btn btn-sm btn-outline-dark rounded-pill px-4 py-2">
                                    <i class="fa-solid fa-file-lines me-1.5"></i> View Admission Guidelines
                                </a>
                                <a href="apply-now.php" class="btn btn-sm btn-gold-pill px-4 py-2 fw-bold">
                                    <i class="fa-solid fa-plus me-1.5"></i> Submit Another Application
                                </a>
                            </div>
                        </div>
                    <?php else: ?>

                        <!-- Form Header Intro -->
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4 pb-3 border-bottom border-custom">
                            <div>
                                <h2 class="font-serif text-primary fs-3 fw-bold mb-1">Begin Your Academic Journey</h2>
                                <p class="text-muted-custom small mb-0">Fill in your details below. Our admission team will review your application within 24 hours.</p>
                            </div>
                            <span class="badge bg-primary text-gold px-3 py-1.5 rounded-pill font-serif fw-bold" style="font-size: 0.8rem;">
                                <i class="fa-solid fa-bolt me-1"></i> Quick 2-Minute Application
                            </span>
                        </div>

                        <?php if (!empty($errorMessage)): ?>
                            <div class="alert alert-danger rounded-4 border-danger d-flex align-items-center gap-2 mb-4">
                                <i class="fa-solid fa-circle-exclamation fs-5"></i>
                                <div><?php echo htmlspecialchars($errorMessage); ?></div>
                            </div>
                        <?php endif; ?>

                        <!-- Interactive Application Form -->
                        <form action="apply-now.php" method="POST" class="needs-validation" novalidate id="admissionApplicationForm">
                            
                            <!-- 1. Personal Information Section -->
                            <div class="mb-4">
                                <div class="d-flex align-items-center gap-2 mb-3 text-primary font-serif fw-bold fs-5">
                                    <span class="rounded-circle bg-primary text-gold d-inline-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 0.8rem;">1</span>
                                    <span>Personal &amp; Contact Details</span>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="full_name" class="form-label small fw-semibold text-dark">Full Name <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-custom"><i class="fa-solid fa-user text-muted-custom"></i></span>
                                            <input type="text" class="form-control border-custom" id="full_name" name="full_name" placeholder="Enter student full name" required value="<?php echo htmlspecialchars($_POST['full_name'] ?? ''); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email" class="form-label small fw-semibold text-dark">Email Address <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-custom"><i class="fa-solid fa-envelope text-muted-custom"></i></span>
                                            <input type="email" class="form-control border-custom" id="email" name="email" placeholder="example@email.com" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="mobile_no" class="form-label small fw-semibold text-dark">10-Digit Mobile Number <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-custom fw-semibold text-muted-custom">+91</span>
                                            <input type="tel" class="form-control border-custom" id="mobile_no" name="mobile_no" placeholder="9876543210" pattern="[0-9]{10}" maxlength="10" required value="<?php echo htmlspecialchars($_POST['mobile_no'] ?? ''); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="gender" class="form-label small fw-semibold text-dark">Gender</label>
                                        <select class="form-select border-custom" id="gender" name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="Male" <?php echo (($_POST['gender'] ?? '') === 'Male') ? 'selected' : ''; ?>>Male</option>
                                            <option value="Female" <?php echo (($_POST['gender'] ?? '') === 'Female') ? 'selected' : ''; ?>>Female</option>
                                            <option value="Other" <?php echo (($_POST['gender'] ?? '') === 'Other') ? 'selected' : ''; ?>>Other</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="dob" class="form-label small fw-semibold text-dark">Date of Birth</label>
                                        <input type="date" class="form-control border-custom" id="dob" name="dob" value="<?php echo htmlspecialchars($_POST['dob'] ?? ''); ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="state" class="form-label small fw-semibold text-dark">State</label>
                                        <input type="text" class="form-control border-custom" id="state" name="state" placeholder="e.g. Madhya Pradesh" value="<?php echo htmlspecialchars($_POST['state'] ?? ''); ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="city" class="form-label small fw-semibold text-dark">City / Town</label>
                                        <input type="text" class="form-control border-custom" id="city" name="city" placeholder="e.g. Indore" value="<?php echo htmlspecialchars($_POST['city'] ?? ''); ?>">
                                    </div>
                                </div>
                            </div>

                            <!-- 2. Academic Program Choice -->
                            <div class="mb-4 pt-3 border-top border-custom">
                                <div class="d-flex align-items-center gap-2 mb-3 text-primary font-serif fw-bold fs-5">
                                    <span class="rounded-circle bg-primary text-gold d-inline-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 0.8rem;">2</span>
                                    <span>Program &amp; Academic Choice</span>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-7">
                                        <label for="course_name" class="form-label small fw-semibold text-dark">Select Course / Program <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-custom"><i class="fa-solid fa-graduation-cap text-muted-custom"></i></span>
                                            <select class="form-select border-custom" id="course_name" name="course_name" required>
                                                <option value="">-- Choose Desired Course --</option>
                                                <?php foreach ($allCourses as $c): ?>
                                                    <?php 
                                                     $optVal = $c['title'];
                                                     $isSelected = ($preselectedCourse === $c['slug'] || $preselectedCourse === $c['title'] || ($_POST['course_name'] ?? '') === $c['title']);
                                                    ?>
                                                    <option value="<?php echo htmlspecialchars($optVal); ?>" <?php echo $isSelected ? 'selected' : ''; ?>>
                                                        <?php echo htmlspecialchars($c['title']); ?> (<?php echo htmlspecialchars($c['degree_type'] ?? 'Degree'); ?> - <?php echo htmlspecialchars($c['duration'] ?? ''); ?>)
                                                    </option>
                                                <?php endforeach; ?>
                                                <option value="Other / General Inquiry" <?php echo (($_POST['course_name'] ?? '') === 'Other / General Inquiry') ? 'selected' : ''; ?>>Other Degree / Not Listed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <label for="program_type" class="form-label small fw-semibold text-dark">Level of Study</label>
                                        <select class="form-select border-custom" id="program_type" name="program_type">
                                            <option value="">Select Level</option>
                                            <option value="Undergraduate (UG)" <?php echo (($_POST['program_type'] ?? '') === 'Undergraduate (UG)') ? 'selected' : ''; ?>>Undergraduate (UG)</option>
                                            <option value="Postgraduate (PG)" <?php echo (($_POST['program_type'] ?? '') === 'Postgraduate (PG)') ? 'selected' : ''; ?>>Postgraduate (PG)</option>
                                            <option value="Diploma / Polytechnic" <?php echo (($_POST['program_type'] ?? '') === 'Diploma / Polytechnic') ? 'selected' : ''; ?>>Diploma / Polytechnic</option>
                                            <option value="Doctorate (Ph.D.)" <?php echo (($_POST['program_type'] ?? '') === 'Doctorate (Ph.D.)') ? 'selected' : ''; ?>>Doctorate (Ph.D.)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- 3. Academic Background & Qualification Details (Comprehensive) -->
                            <div class="mb-4 pt-3 border-top border-custom">
                                <div class="d-flex align-items-center gap-2 mb-3 text-primary font-serif fw-bold fs-5">
                                    <span class="rounded-circle bg-primary text-gold d-inline-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 0.8rem;">3</span>
                                    <span>Academic Background &amp; Prior Qualifications</span>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="highest_qualification" class="form-label small fw-semibold text-dark">Qualifying / Highest Examination Passed</label>
                                        <select class="form-select border-custom" id="highest_qualification" name="highest_qualification">
                                            <option value="">Select Qualifying Exam</option>
                                            <option value="12th Standard / Intermediate" <?php echo (($_POST['highest_qualification'] ?? '') === '12th Standard / Intermediate') ? 'selected' : ''; ?>>12th Standard / Intermediate (10+2)</option>
                                            <option value="10th Standard / Matriculation" <?php echo (($_POST['highest_qualification'] ?? '') === '10th Standard / Matriculation') ? 'selected' : ''; ?>>10th Standard / Matriculation</option>
                                            <option value="Polytechnic Diploma (Engineering / Pharmacy)" <?php echo (($_POST['highest_qualification'] ?? '') === 'Polytechnic Diploma (Engineering / Pharmacy)') ? 'selected' : ''; ?>>Polytechnic Diploma</option>
                                            <option value="Graduation (B.E. / B.Tech / B.Sc / B.Com / BCA / BBA / BA)" <?php echo (($_POST['highest_qualification'] ?? '') === 'Graduation (B.E. / B.Tech / B.Sc / B.Com / BCA / BBA / BA)') ? 'selected' : ''; ?>>Graduation Degree (UG)</option>
                                            <option value="Post Graduation (M.Tech / MBA / MCA / M.Sc / M.Pharm)" <?php echo (($_POST['highest_qualification'] ?? '') === 'Post Graduation (M.Tech / MBA / MCA / M.Sc / M.Pharm)') ? 'selected' : ''; ?>>Post Graduation Degree (PG)</option>
                                            <option value="Other Recognized Qualification" <?php echo (($_POST['highest_qualification'] ?? '') === 'Other Recognized Qualification') ? 'selected' : ''; ?>>Other Recognized Qualification</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="institute_name" class="form-label small fw-semibold text-dark">Last School / College / Institute Name</label>
                                        <input type="text" class="form-control border-custom" id="institute_name" name="institute_name" placeholder="e.g. St. Paul School / Govt Polytechnic" value="<?php echo htmlspecialchars($_POST['institute_name'] ?? ''); ?>">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="board_university" class="form-label small fw-semibold text-dark">Board / University</label>
                                        <input type="text" class="form-control border-custom" id="board_university" name="board_university" placeholder="e.g. CBSE / MP Board / RGPV / DAVV" value="<?php echo htmlspecialchars($_POST['board_university'] ?? ''); ?>">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="passing_year" class="form-label small fw-semibold text-dark">Passing / Result Year</label>
                                        <select class="form-select border-custom" id="passing_year" name="passing_year">
                                            <option value="2026 (Appearing / Awaited)" <?php echo (($_POST['passing_year'] ?? '') === '2026 (Appearing / Awaited)') ? 'selected' : ''; ?>>2026 (Appearing / Awaited)</option>
                                            <option value="2025" <?php echo (($_POST['passing_year'] ?? '') === '2025') ? 'selected' : ''; ?>>2025</option>
                                            <option value="2024" <?php echo (($_POST['passing_year'] ?? '') === '2024') ? 'selected' : ''; ?>>2024</option>
                                            <option value="2023" <?php echo (($_POST['passing_year'] ?? '') === '2023') ? 'selected' : ''; ?>>2023</option>
                                            <option value="2022" <?php echo (($_POST['passing_year'] ?? '') === '2022') ? 'selected' : ''; ?>>2022</option>
                                            <option value="2021 or Earlier" <?php echo (($_POST['passing_year'] ?? '') === '2021 or Earlier') ? 'selected' : ''; ?>>2021 or Earlier</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="percentage" class="form-label small fw-semibold text-dark">Percentage (%) / CGPA Obtained</label>
                                        <input type="text" class="form-control border-custom" id="percentage" name="percentage" placeholder="e.g. 78.5% or 8.2 CGPA" value="<?php echo htmlspecialchars($_POST['percentage'] ?? ''); ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="stream_subject" class="form-label small fw-semibold text-dark">Stream / Major Subjects</label>
                                        <input type="text" class="form-control border-custom" id="stream_subject" name="stream_subject" placeholder="e.g. PCM / PCB / Commerce with Maths / CS" value="<?php echo htmlspecialchars($_POST['stream_subject'] ?? ''); ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="entrance_exam" class="form-label small fw-semibold text-dark">Competitive Entrance Exam (If Appeared)</label>
                                        <div class="row g-2">
                                            <div class="col-7">
                                                <select class="form-select border-custom" id="entrance_exam" name="entrance_exam">
                                                    <option value="None / Direct Admission" <?php echo (($_POST['entrance_exam'] ?? '') === 'None / Direct Admission') ? 'selected' : ''; ?>>None (Direct Merit)</option>
                                                    <option value="JEE Main" <?php echo (($_POST['entrance_exam'] ?? '') === 'JEE Main') ? 'selected' : ''; ?>>JEE Main</option>
                                                    <option value="NEET" <?php echo (($_POST['entrance_exam'] ?? '') === 'NEET') ? 'selected' : ''; ?>>NEET</option>
                                                    <option value="CUET" <?php echo (($_POST['entrance_exam'] ?? '') === 'CUET') ? 'selected' : ''; ?>>CUET</option>
                                                    <option value="GATE" <?php echo (($_POST['entrance_exam'] ?? '') === 'GATE') ? 'selected' : ''; ?>>GATE</option>
                                                    <option value="GPAT" <?php echo (($_POST['entrance_exam'] ?? '') === 'GPAT') ? 'selected' : ''; ?>>GPAT</option>
                                                    <option value="CAT / CMAT / MAT" <?php echo (($_POST['entrance_exam'] ?? '') === 'CAT / CMAT / MAT') ? 'selected' : ''; ?>>CAT / CMAT / MAT</option>
                                                    <option value="Other Entrance Exam" <?php echo (($_POST['entrance_exam'] ?? '') === 'Other Entrance Exam') ? 'selected' : ''; ?>>Other Entrance</option>
                                                </select>
                                            </div>
                                            <div class="col-5">
                                                <input type="text" class="form-control border-custom" id="entrance_score" name="entrance_score" placeholder="Score / Rank" value="<?php echo htmlspecialchars($_POST['entrance_score'] ?? ''); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 4. Additional Queries & Facilities -->
                            <div class="mb-4 pt-3 border-top border-custom">
                                <div class="d-flex align-items-center gap-2 mb-3 text-primary font-serif fw-bold fs-5">
                                    <span class="rounded-circle bg-primary text-gold d-inline-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 0.8rem;">4</span>
                                    <span>Queries &amp; Special Requirements (Optional)</span>
                                </div>

                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="message" class="form-label small fw-semibold text-dark">Tell us if you need hostel accommodation, bus transport, or scholarship assistance:</label>
                                        <textarea class="form-control border-custom" id="message" name="message" rows="2" placeholder="e.g. Interested in campus AC hostel, bus route from Vijay Nagar, and merit scholarship details..."><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button Section -->
                            <div class="pt-3 border-top border-custom d-flex align-items-center justify-content-between flex-wrap gap-3">
                                <div class="text-muted-custom small">
                                    <i class="fa-solid fa-lock text-gold me-1"></i> Your personal &amp; academic information is secure.
                                </div>
                                <button type="submit" name="submit_application" class="btn btn-gold-pill px-5 py-2.5 font-weight-bold fs-6 shadow-sm">
                                    <i class="fa-solid fa-paper-plane me-2"></i> Submit Application Now
                                </button>
                            </div>

                        </form>

                    <?php endif; ?>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <div class="sidebar-sticky-wrapper">
                    
                    <!-- Helpline Widget Card -->
                    <div class="about-sidebar-card p-4 text-center mb-4">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" style="width: 65px; height: 65px; background: linear-gradient(135deg, #700018 0%, #4a0010 100%); border: 2px solid var(--gold-color);">
                            <i class="fa-solid fa-headset text-gold fs-3"></i>
                        </div>
                        <h4 class="font-serif text-primary fs-5 fw-bold mb-1">Direct Admission Helpline</h4>
                        <p class="text-muted-custom small mb-3">Speak with our official admission counselors for immediate guidance.</p>
                        <a href="tel:180030026072" class="d-block font-serif text-primary fw-bold fs-5 text-decoration-none mb-1">
                            <i class="fa-solid fa-phone-volume text-gold me-1"></i> 1800 3002 6072
                        </a>
                        <a href="tel:+917312530500" class="d-block text-muted-custom small text-decoration-none mb-3">
                            +91 731 2530 500
                        </a>
                        <a href="mailto:admission@aku.ac.in" class="btn btn-sm btn-outline-dark rounded-pill w-100 py-1.5 small">
                            <i class="fa-solid fa-envelope me-1"></i> admission@aku.ac.in
                        </a>
                    </div>

                    <!-- Department Sidebar Navigation -->
                    <?php include "faculty-sidebar.php"; ?>

                </div>
            </div>

        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
