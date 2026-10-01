<?php 
require_once __DIR__ . '/db.php';

$successMessage = '';
$errorMessage = '';
$refNumber = '';

// Handle Fee Enquiry Form Submission (Standard POST & AJAX)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_fee_enquiry'])) {
    $name = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $course = trim($_POST['course_name'] ?? 'General Fee Structure');
    $city = trim($_POST['city_state'] ?? '');
    $message = trim($_POST['enquiry_message'] ?? '');
    $honeypot = trim($_POST['fee_hp'] ?? '');
    $ip = $_SERVER['REMOTE_ADDR'] ?? '';

    $isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') || (isset($_POST['is_ajax']) && $_POST['is_ajax'] === '1');

    if (!empty($honeypot)) {
        if ($isAjax) {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'success', 'message' => 'Your enquiry has been received successfully!']);
            exit;
        }
        $successMessage = "Your enquiry has been received successfully!";
    } elseif (empty($name) || empty($phone) || empty($email)) {
        $msg = "Please provide your Name, Mobile Number, and Email Address.";
        if ($isAjax) {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => $msg]);
            exit;
        }
        $errorMessage = $msg;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Please enter a valid email address.";
        if ($isAjax) {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => $msg]);
            exit;
        }
        $errorMessage = $msg;
    } else {
        try {
            $department = 'Fee & Admission Enquiry';
            $subject = 'Fee Enquiry: ' . $course;
            $fullMessage = "Program: " . $course . ($city ? (" | City: " . $city) : "") . "\n" . ($message ?: "Prospective student requested official fee structure, seat availability, installment facilities, and scholarship details for " . $course . ".");

            $stmt = $pdo->prepare("
                INSERT INTO contact_inquiries (name, email, phone, department, subject, message, status, ip_address) 
                VALUES (?, ?, ?, ?, ?, ?, 'unread', ?)
            ");
            $stmt->execute([$name, $email, $phone, $department, $subject, $fullMessage, $ip]);
            $inquiryId = $pdo->lastInsertId();
            $refNumber = "AKU-FEE-" . str_pad($inquiryId, 5, "0", STR_PAD_LEFT);
            $successMsg = "Thank you, <strong>" . htmlspecialchars($name) . "</strong>! Your fee enquiry for <strong>" . htmlspecialchars($course) . "</strong> has been submitted (Ref No: <strong>{$refNumber}</strong>). Our admissions cell will contact you shortly.";
            
            if ($isAjax) {
                header('Content-Type: application/json');
                echo json_encode([
                    'status' => 'success',
                    'message' => $successMsg,
                    'ref_number' => $refNumber,
                    'name' => htmlspecialchars($name),
                    'course' => htmlspecialchars($course)
                ]);
                exit;
            }
            $successMessage = $successMsg;
        } catch (Exception $e) {
            $msg = "Unable to process enquiry right now. Please call our admission helpdesk directly.";
            if ($isAjax) {
                header('Content-Type: application/json');
                echo json_encode(['status' => 'error', 'message' => $msg]);
                exit;
            }
            $errorMessage = $msg;
        }
    }
}

$pageTitle = "University Fee Structure & Admission Enquiry 2026-27 - Dr. APJ Abdul Kalam University, Indore";
include 'header.php'; 
?>

<!-- Custom In-Page Styling for Contact Us Buttons & Enquiry Modal -->
<style>
.fee-contact-btn {
    background: #1a2b49;
    color: #ffffff !important;
    border: 1px solid #1a2b49;
    padding: 0.38rem 0.95rem;
    font-size: 0.82rem;
    font-weight: 600;
    letter-spacing: 0.02em;
    border-radius: 50rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.4rem;
    transition: all 0.25s cubic-bezier(0.165, 0.84, 0.44, 1);
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(26, 43, 73, 0.15);
    text-decoration: none !important;
    white-space: nowrap;
}
.fee-contact-btn i {
    color: #c5a059;
    font-size: 0.82rem;
    transition: transform 0.25s ease;
}
.fee-contact-btn:hover {
    background: #c5a059;
    border-color: #c5a059;
    color: #1a2b49 !important;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(197, 160, 89, 0.35);
}
.fee-contact-btn:hover i {
    color: #1a2b49 !important;
    transform: scale(1.15);
}
.fee-contact-btn:active {
    transform: translateY(0);
}
.luxury-table td {
    vertical-align: middle;
}
</style>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="admission-procedure.php">Admissions</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Fee Structure</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> TUITION &amp; ACADEMIC EXPENSES
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 900px; line-height: 1.15;">
            Official Fee Structure (2026-27)
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Transparent, Affordable &amp; Government-Approved Academic Fees Schedule
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
                    
                    <?php if ($successMessage): ?>
                        <div class="alert alert-success border-0 shadow-sm rounded-4 p-3 mb-4 d-flex align-items-center gap-3">
                            <i class="fa-solid fa-circle-check text-success fs-4"></i>
                            <div><?php echo $successMessage; ?></div>
                        </div>
                    <?php elseif ($errorMessage): ?>
                        <div class="alert alert-danger border-0 shadow-sm rounded-4 p-3 mb-4 d-flex align-items-center gap-3">
                            <i class="fa-solid fa-circle-exclamation text-danger fs-4"></i>
                            <div><?php echo htmlspecialchars($errorMessage); ?></div>
                        </div>
                    <?php endif; ?>

                    <!-- Fee Policy Header -->
                    <div class="intro-highlight-card mb-5">
                        <div class="d-flex align-items-center gap-3.5">
                            <div class="intro-highlight-badge">
                                <i class="fa-solid fa-receipt"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Approved Academic Fee Structure &amp; Counselling</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.7;">
                                    Tuition fees at Dr. A.P.J. Abdul Kalam University are structured in strict compliance with statutory regulatory bodies (AICTE, PCI, BCI, NCTE &amp; MP Higher Education Regulatory Commission). For detailed schedule, scholarship benefits, installment plans and hostel details, click <strong>Contact Us</strong> for any program.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Comprehensive Fee Table -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-graduation-cap"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Program-wise Courses &amp; Fee Details</h3>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-gold text-dark fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.75rem;">Session 2026-27</span>
                                <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1.5 small fw-semibold fee-enquire-btn shadow-xs" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="All Academic Programs (Fee Structure)">
                                    <i class="fa-solid fa-headset me-1 text-gold"></i> Request Fee Details
                                </button>
                            </div>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0 align-middle">
                                <thead>
                                    <tr>
                                        <th>Name of the Course</th>
                                        <th style="width: 120px;">Duration</th>
                                        <th>Eligibility Criteria</th>
                                        <th style="width: 160px;" class="text-center">Fee Enquiry</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="fw-bold text-primary">Diploma Engineering</span></td>
                                        <td>3 Years</td>
                                        <td>10th (Science &amp; Maths) with 35% for all categories</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="Diploma Engineering">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">Diploma Engineering (Lateral Entry)</span></td>
                                        <td>2 Years</td>
                                        <td>12th PCM / 2-Yr ITI for all categories</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="Diploma Engineering (Lateral Entry)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">B.E. (Bachelor of Engineering)</span></td>
                                        <td>4 Years</td>
                                        <td>10+2 with Physics, Maths &amp; Chemistry/Bio (45% Gen, 40% Res)</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="B.E. (Bachelor of Engineering)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">B.E. (Lateral Entry)</span></td>
                                        <td>3 Years</td>
                                        <td>Diploma in Engg. / B.Sc. with Maths (45% Gen, 40% Res)</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="B.E. (Lateral Entry)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">M.Tech (Regular Branches)</span></td>
                                        <td>2 Years</td>
                                        <td>B.E. / B.Tech in relevant branch (50% Gen, 45% Res)</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="M.Tech (Regular Branches)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">M.Tech (Structural Engineering)</span></td>
                                        <td>2 Years</td>
                                        <td>B.E. / B.Tech in Civil Engineering (50% Gen, 45% Res)</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="M.Tech (Structural Engineering)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">D.Pharm (Diploma in Pharmacy)</span></td>
                                        <td>2 Years</td>
                                        <td>10+2 with Physics &amp; Chemistry along with Maths/Bio</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="D.Pharm (Diploma in Pharmacy)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">B.Pharm (Bachelor of Pharmacy)</span></td>
                                        <td>4 Years</td>
                                        <td>10+2 with Physics &amp; Chemistry along with Maths/Bio</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="B.Pharm (Bachelor of Pharmacy)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">B.Pharm (Lateral Entry)</span></td>
                                        <td>3 Years</td>
                                        <td>D.Pharm with at least 45% marks (40% for SC/ST/OBC)</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="B.Pharm (Lateral Entry)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">M.Pharm (All Specializations)</span></td>
                                        <td>2 Years</td>
                                        <td>B.Pharm with at least 55% marks (50% for reserved)</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="M.Pharm (All Specializations)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">MBA (Master of Business Admin)</span></td>
                                        <td>2 Years</td>
                                        <td>Graduation in any discipline (50% Gen, 45% Res)</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="MBA (Master of Business Admin)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">MCA (Master of Computer Applications)</span></td>
                                        <td>2 Years</td>
                                        <td>BCA / B.Sc. Comp. Science with 50% marks &amp; Maths</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="MCA (Master of Computer Applications)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">BBA (Bachelor of Business Admin)</span></td>
                                        <td>3 Years</td>
                                        <td>10+2 in any discipline (45% Gen, 40% Res)</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="BBA (Bachelor of Business Admin)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">BCA (Bachelor of Computer Applications)</span></td>
                                        <td>3 Years</td>
                                        <td>10+2 with Mathematics / Computer Science (45% Gen, 40% Res)</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="BCA (Bachelor of Computer Applications)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">B.Sc. (Hons.) Agriculture</span></td>
                                        <td>4 Years</td>
                                        <td>10+2 with Agriculture / PCB / PCM (45% Gen, 40% Res)</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="B.Sc. (Hons.) Agriculture">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">M.Sc. (Agriculture)</span></td>
                                        <td>2 Years</td>
                                        <td>B.Sc. (Hons.) Agriculture / Horticulture (50% Gen, 45% Res)</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="M.Sc. (Agriculture)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">BALL.B. (Integrated)</span></td>
                                        <td>5 Years</td>
                                        <td>10+2 in any stream (45% Gen, 42% OBC, 40% SC/ST)</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="BALL.B. (Integrated 5 Years)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">LL.B. (Bachelor of Laws)</span></td>
                                        <td>3 Years</td>
                                        <td>Graduation in any discipline (45% Gen, 42% OBC, 40% SC/ST)</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="LL.B. (3 Years)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">B.Ed. (Bachelor of Education)</span></td>
                                        <td>2 Years</td>
                                        <td>Graduation / Post Graduation with minimum 50% marks</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="B.Ed. (Bachelor of Education)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">D.El.Ed.</span></td>
                                        <td>2 Years</td>
                                        <td>10+2 with minimum 50% marks (45% for SC/ST/OBC)</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="D.El.Ed. (Diploma in Elementary Education)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">BAMS (Ayurvedacharya)</span></td>
                                        <td>5.5 Years</td>
                                        <td>10+2 with PCB (50% Gen) + NEET Qualified</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="BAMS (Ayurvedacharya)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">BHMS (Homoeopathy)</span></td>
                                        <td>5.5 Years</td>
                                        <td>10+2 with PCB (50% Gen) + NEET Qualified</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="BHMS (Homoeopathy)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold text-primary">Ph.D. (Doctor of Philosophy)</span></td>
                                        <td>3-5 Years</td>
                                        <td>Master's Degree with minimum 55% marks (50% for SC/ST/OBC) + Entrance / NET</td>
                                        <td class="text-center">
                                            <button type="button" class="fee-contact-btn fee-enquire-btn" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="Ph.D. (Doctor of Philosophy)">
                                                <i class="fa-solid fa-headset"></i>
                                                <span>Contact Us</span>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Direct Fee Inquiry & Helpline Desk Banner -->
                    <div class="p-4 rounded-4 border border-custom mb-5 shadow-xs" style="background: linear-gradient(135deg, #ffffff 0%, #fdfbf7 100%);">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div style="width: 44px; height: 44px; border-radius: 12px; background: rgba(197, 160, 89, 0.15); display: flex; align-items: center; justify-content: center; border: 1px solid rgba(197, 160, 89, 0.35); flex-shrink: 0;">
                                <i class="fa-solid fa-headset text-gold fs-5"></i>
                            </div>
                            <div>
                                <h4 class="font-serif text-primary fw-bold fs-5 mb-0">Have Questions Regarding Fees, Scholarships or Instalments?</h4>
                                <p class="text-muted-custom small mb-0">Connect directly with our central admissions helpdesk for official guidance.</p>
                            </div>
                        </div>
                        
                        <div class="d-flex flex-wrap align-items-center gap-2.5 pt-2 border-top border-custom">
                            <button type="button" class="btn btn-primary rounded-pill px-3.5 py-2 small fw-semibold d-inline-flex align-items-center gap-2 fee-enquire-btn shadow-xs" data-bs-toggle="modal" data-bs-target="#feeEnquiryModal" data-course="General University Admission &amp; Fee Structure">
                                <i class="fa-solid fa-envelope-open-text text-gold"></i>
                                <span>Open Enquiry Form</span>
                            </button>
                            <a href="tel:180030026072" class="btn btn-outline-primary rounded-pill px-3 py-2 small fw-semibold d-inline-flex align-items-center gap-2">
                                <i class="fa-solid fa-phone-volume text-gold"></i>
                                <span>Toll-Free Helpline: 1800 3002 6072</span>
                            </a>
                            <a href="https://api.whatsapp.com/send?phone=919111109999&text=Hello%20AKU,%20I%20want%20to%20inquire%20about%20fees%20and%20admission" target="_blank" class="btn btn-outline-success rounded-pill px-3 py-2 small fw-semibold d-inline-flex align-items-center gap-2">
                                <i class="fa-brands fa-whatsapp text-success"></i>
                                <span>WhatsApp Admission Desk</span>
                            </a>
                        </div>
                    </div>

                    <!-- Payment Mode & Bank Details -->
                    <div class="mb-4">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center gap-2.5">
                            <span class="section-icon-pill"><i class="fa-solid fa-credit-card"></i></span>
                            <h3 class="font-serif text-primary fs-4 fw-bold m-0">Authorized Fee Payment Channels</h3>
                        </div>

                        <div class="row g-3.5">
                            <div class="col-md-6">
                                <div class="feature-info-card">
                                    <div class="d-flex align-items-center gap-3 mb-2.5">
                                        <div class="feature-icon-badge">
                                            <i class="fa-solid fa-building-columns"></i>
                                        </div>
                                        <h4 class="font-serif text-primary fw-bold fs-6 mb-0">University Accounts Department</h4>
                                    </div>
                                    <p class="small text-muted-custom mb-0" style="line-height: 1.65; font-size: 0.9rem;">
                                        Demand Draft (DD) in favor of <strong>"Dr. A.P.J. Abdul Kalam University"</strong> payable at Indore, or online via University ERP student payment portal.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="feature-info-card">
                                    <div class="d-flex align-items-center gap-3 mb-2.5">
                                        <div class="feature-icon-badge">
                                            <i class="fa-solid fa-hand-holding-dollar"></i>
                                        </div>
                                        <h4 class="font-serif text-primary fw-bold fs-6 mb-0">Scholarship &amp; Education Loan Support</h4>
                                    </div>
                                    <p class="small text-muted-custom mb-0" style="line-height: 1.65; font-size: 0.9rem;">
                                        Full tuition fee reimbursement for eligible candidates under MPTAAS (SC/ST/OBC), MMVY, and assistance for Nationalized Bank education loans.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <?php include "admission-sidebar.php"; ?>
            </div>

        </div>
    </div>
</main>

<!-- Bootstrap 5 Fee Enquiry Modal -->
<div class="modal fade" id="feeEnquiryModal" tabindex="-1" aria-labelledby="feeEnquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow-lg overflow-hidden">
            <!-- Modal Header -->
            <div class="modal-header text-white px-4 py-3" style="background: linear-gradient(135deg, #1a2b49 0%, #0d172a 100%); border-bottom: 2px solid #c5a059;">
                <div class="d-flex align-items-center gap-2.5">
                    <div style="width: 38px; height: 38px; border-radius: 50%; background: rgba(197, 160, 89, 0.2); display: flex; align-items: center; justify-content: center; border: 1px solid rgba(197, 160, 89, 0.4);">
                        <i class="fa-solid fa-headset text-gold fs-6"></i>
                    </div>
                    <div>
                        <h5 class="modal-title font-serif fw-bold text-white mb-0" id="feeEnquiryModalLabel">Course &amp; Fee Structure Enquiry</h5>
                        <p class="small text-white text-opacity-75 mb-0" style="font-size: 0.78rem;">Session 2026-27 · Admission Guidance &amp; Official Fee Schedule</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body p-4 bg-light-subtle">
                <!-- Response Alert Container -->
                <div id="modalAlertBox" class="d-none mb-3"></div>

                <form id="feeEnquiryModalForm" method="POST" action="fees-details.php">
                    <input type="hidden" name="submit_fee_enquiry" value="1">
                    <input type="hidden" name="is_ajax" value="1">
                    <input type="text" name="fee_hp" style="display:none;" tabindex="-1" autocomplete="off">

                    <div class="row g-3">
                        <!-- Course Name (Preselected / Editable) -->
                        <div class="col-12">
                            <label class="form-label small fw-semibold text-secondary mb-1">
                                <i class="fa-solid fa-graduation-cap text-gold me-1"></i> Program / Course Interested In <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="course_name" 
                                   id="modalCourseNameInput" 
                                   class="form-control rounded-3 py-2 fw-semibold text-primary" 
                                   placeholder="Select or enter program" 
                                   required 
                                   style="border-color: #cbd5e1; background-color: #ffffff;">
                        </div>

                        <!-- Full Name -->
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-secondary mb-1">
                                <i class="fa-solid fa-user text-gold me-1"></i> Full Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="full_name" 
                                   id="modalFullName" 
                                   class="form-control rounded-3 py-2" 
                                   placeholder="e.g. Rahul Sharma" 
                                   required 
                                   style="border-color: #cbd5e1;">
                        </div>

                        <!-- Mobile Number -->
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-secondary mb-1">
                                <i class="fa-solid fa-phone text-gold me-1"></i> Mobile / WhatsApp No. <span class="text-danger">*</span>
                            </label>
                            <input type="tel" 
                                   name="phone" 
                                   id="modalPhone" 
                                   class="form-control rounded-3 py-2" 
                                   placeholder="10-digit mobile number" 
                                   pattern="[0-9]{10}" 
                                   maxlength="10"
                                   required 
                                   style="border-color: #cbd5e1;">
                        </div>

                        <!-- Email Address -->
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-secondary mb-1">
                                <i class="fa-solid fa-envelope text-gold me-1"></i> Email Address <span class="text-danger">*</span>
                            </label>
                            <input type="email" 
                                   name="email" 
                                   id="modalEmail" 
                                   class="form-control rounded-3 py-2" 
                                   placeholder="e.g. name@example.com" 
                                   required 
                                   style="border-color: #cbd5e1;">
                        </div>

                        <!-- City / State -->
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-secondary mb-1">
                                <i class="fa-solid fa-location-dot text-gold me-1"></i> City / State
                            </label>
                            <input type="text" 
                                   name="city_state" 
                                   id="modalCityState" 
                                   class="form-control rounded-3 py-2" 
                                   placeholder="e.g. Indore, MP" 
                                   style="border-color: #cbd5e1;">
                        </div>

                        <!-- Message / Enquiry Details -->
                        <div class="col-12">
                            <label class="form-label small fw-semibold text-secondary mb-1">
                                <i class="fa-solid fa-comment-dots text-gold me-1"></i> Your Specific Enquiry / Query
                            </label>
                            <textarea name="enquiry_message" 
                                      id="modalMessage" 
                                      rows="3" 
                                      class="form-control rounded-3 py-2" 
                                      placeholder="Please provide details about annual fee, instalment options, hostel accommodation, or scholarships..." 
                                      style="border-color: #cbd5e1;"></textarea>
                        </div>
                    </div>

                    <!-- Direct Helpdesk Note -->
                    <div class="alert alert-light border border-custom rounded-3 py-2.5 px-3 mt-3 mb-3 d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-shield-halved text-gold fs-5"></i>
                        <span class="small text-muted mb-0" style="font-size: 0.82rem; line-height: 1.5;">
                            Our Admission &amp; Counseling Cell responds within <strong>2 working hours</strong>. Your contact details remain strictly confidential.
                        </span>
                    </div>

                    <!-- Submit & Helpline Buttons -->
                    <div class="d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center justify-content-between gap-2.5 pt-2">
                        <a href="tel:180030026072" class="btn btn-outline-secondary rounded-pill px-3 py-2 small fw-semibold d-inline-flex align-items-center justify-content-center gap-1.5">
                            <i class="fa-solid fa-phone-volume text-gold"></i>
                            <span>Helpline: 1800 3002 6072</span>
                        </a>
                        <button type="submit" id="modalSubmitBtn" class="btn btn-primary rounded-pill px-4 py-2 fw-bold d-inline-flex align-items-center justify-content-center gap-2 shadow-sm" style="background: linear-gradient(135deg, #1a2b49 0%, #243b66 100%); border-color: #1a2b49;">
                            <i class="fa-solid fa-paper-plane text-gold"></i>
                            <span id="modalSubmitBtnText">Submit Fee Enquiry</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const courseInput = document.getElementById('modalCourseNameInput');
    const form = document.getElementById('feeEnquiryModalForm');
    const alertBox = document.getElementById('modalAlertBox');
    const submitBtn = document.getElementById('modalSubmitBtn');
    const submitBtnText = document.getElementById('modalSubmitBtnText');

    // Attach click listeners to all "fee-enquire-btn" buttons
    document.querySelectorAll('.fee-enquire-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const course = this.getAttribute('data-course') || 'General Academic Fee';
            if (courseInput) {
                courseInput.value = course;
            }
            if (alertBox) {
                alertBox.className = 'd-none mb-3';
                alertBox.innerHTML = '';
            }
        });
    });

    // Handle AJAX Form Submission
    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            
            if (submitBtn) {
                submitBtn.disabled = true;
                if (submitBtnText) submitBtnText.textContent = 'Submitting Enquiry...';
            }
            if (alertBox) {
                alertBox.className = 'd-none mb-3';
                alertBox.innerHTML = '';
            }

            const formData = new FormData(form);

            fetch('fees-details.php', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    if (submitBtnText) submitBtnText.textContent = 'Submit Fee Enquiry';
                }

                if (data.status === 'success') {
                    if (alertBox) {
                        alertBox.className = 'alert alert-success border-0 shadow-xs rounded-3 p-3 mb-3';
                        alertBox.innerHTML = '<div class="d-flex align-items-start gap-2.5"><i class="fa-solid fa-circle-check text-success fs-5 mt-0.5"></i><div>' + data.message + '</div></div>';
                    }
                    form.reset();
                    if (data.course && courseInput) {
                        courseInput.value = data.course;
                    }
                } else {
                    if (alertBox) {
                        alertBox.className = 'alert alert-danger border-0 shadow-xs rounded-3 p-3 mb-3';
                        alertBox.innerHTML = '<div class="d-flex align-items-start gap-2.5"><i class="fa-solid fa-circle-exclamation text-danger fs-5 mt-0.5"></i><div>' + (data.message || 'Error submitting enquiry. Please try again.') + '</div></div>';
                    }
                }
            })
            .catch(function (error) {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    if (submitBtnText) submitBtnText.textContent = 'Submit Fee Enquiry';
                }
                if (alertBox) {
                    alertBox.className = 'alert alert-danger border-0 shadow-xs rounded-3 p-3 mb-3';
                    alertBox.innerHTML = '<div class="d-flex align-items-start gap-2.5"><i class="fa-solid fa-circle-exclamation text-danger fs-5 mt-0.5"></i><div>Unable to reach the admission server. Please call Toll-Free Helpline: 1800 3002 6072.</div></div>';
                }
            });
        });
    }
});
</script>

<?php include 'footer.php'; ?>
