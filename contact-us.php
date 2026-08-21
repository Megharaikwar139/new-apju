<?php
require_once "db.php";

$successMessage = '';
$errorMessage = '';
$refNumber = '';

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_contact'])) {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $department = trim($_POST['department'] ?? 'General Inquiry');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $ip = $_SERVER['REMOTE_ADDR'] ?? '';

    // Honeypot spam check
    $honeypot = trim($_POST['website_hp'] ?? '');

    if (!empty($honeypot)) {
        // Silent bot discard
        $successMessage = "Your inquiry has been submitted successfully!";
    } elseif (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $errorMessage = "Please fill in all required fields (Name, Email, Subject, and Message).";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Please enter a valid email address.";
    } else {
        try {
            $stmt = $pdo->prepare("
                INSERT INTO contact_inquiries (name, email, phone, department, subject, message, status, ip_address) 
                VALUES (?, ?, ?, ?, ?, ?, 'unread', ?)
            ");
            $stmt->execute([$name, $email, $phone, $department, $subject, $message, $ip]);
            $inquiryId = $pdo->lastInsertId();
            $refNumber = "AKU-INQ-" . str_pad($inquiryId, 5, "0", STR_PAD_LEFT);
            $successMessage = "Thank you, <strong>" . htmlspecialchars($name) . "</strong>! Your message has been received (Ref: <strong>{$refNumber}</strong>). Our administrative cell will contact you shortly.";
        } catch (Exception $e) {
            $errorMessage = "Unable to process your request right now. Please call our helpline directly.";
        }
    }
}

// Fetch global site settings
$settings = $pdo->query("SELECT * FROM site_settings_custom LIMIT 1")->fetch() ?: [];

$pageTitle = "Contact Us & Campus Location - Dr. APJ Abdul Kalam University, Indore";
include "header.php";
?>

<!-- Inner Page Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Contact Us</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> 
            GET IN TOUCH &amp; VISIT US
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Contact &amp; Campus Directory
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Indore-Dewas Bypass Road, Indore (M.P.)
        </p>
    </div>
</section>

<!-- Top Contact Quick Info Cards -->
<section class="py-4" style="background: #ffffff; border-bottom: 1px solid var(--border-color);">
    <div class="container-custom">
        <div class="row g-3 g-md-4">
            
            <!-- 1. Campus Address -->
            <div class="col-sm-6 col-lg-3">
                <div class="p-3.5 p-md-4 rounded-4 border border-custom bg-white h-100 d-flex flex-column justify-content-between shadow-xs hover-shadow transition-all" style="transition: all 0.25s ease;">
                    <div class="d-flex align-items-start gap-3">
                        <div class="icon-circle-badge flex-shrink-0" style="width: 48px; height: 48px; min-width: 48px; border-radius: 50% !important; display: inline-flex !important; align-items: center !important; justify-content: center !important; background: rgba(112, 0, 24, 0.08); border: 1.5px solid rgba(112, 0, 24, 0.15); color: var(--primary-color);">
                            <i class="fa-solid fa-location-dot" style="font-size: 1.25rem; line-height: 1;"></i>
                        </div>
                        <div>
                            <div class="font-serif text-primary fw-bold fs-6 mb-1">Campus Location</div>
                            <p class="text-muted-custom small mb-0" style="font-size: 0.8rem; line-height: 1.45;">
                                <?php echo htmlspecialchars($settings['address'] ?? 'Indore-Dewas Bypass Road, Indore – 452016 (M.P.)'); ?>
                            </p>
                        </div>
                    </div>
                    <div class="pt-2 mt-2 border-top border-custom">
                        <a href="#campus-map" class="text-gold small fw-bold text-decoration-none">
                            View on Map &raquo;
                        </a>
                    </div>
                </div>
            </div>

            <!-- 2. Phone Helpline -->
            <div class="col-sm-6 col-lg-3">
                <div class="p-3.5 p-md-4 rounded-4 border border-custom bg-white h-100 d-flex flex-column justify-content-between shadow-xs hover-shadow transition-all" style="transition: all 0.25s ease;">
                    <div class="d-flex align-items-start gap-3">
                        <div class="icon-circle-badge flex-shrink-0" style="width: 48px; height: 48px; min-width: 48px; border-radius: 50% !important; display: inline-flex !important; align-items: center !important; justify-content: center !important; background: rgba(212, 175, 55, 0.15); border: 1.5px solid rgba(212, 175, 55, 0.35); color: #8a6d00;">
                            <i class="fa-solid fa-phone-volume" style="font-size: 1.25rem; line-height: 1;"></i>
                        </div>
                        <div>
                            <div class="font-serif text-primary fw-bold fs-6 mb-1">Call / Helpline</div>
                            <div class="fw-semibold text-dark small" style="font-size: 0.85rem;">
                                <?php echo htmlspecialchars($settings['phone'] ?? '+91 731 2530 500'); ?>
                            </div>
                            <div class="text-muted small" style="font-size: 0.75rem;">Admissions: +91 91111 09999</div>
                        </div>
                    </div>
                    <div class="pt-2 mt-2 border-top border-custom">
                        <a href="tel:<?php echo htmlspecialchars(explode('/', $settings['phone'] ?? '')[0]); ?>" class="text-primary small fw-bold text-decoration-none">
                            <i class="fa-solid fa-phone me-1"></i> Call Toll-Free
                        </a>
                    </div>
                </div>
            </div>

            <!-- 3. Official Email -->
            <div class="col-sm-6 col-lg-3">
                <div class="p-3.5 p-md-4 rounded-4 border border-custom bg-white h-100 d-flex flex-column justify-content-between shadow-xs hover-shadow transition-all" style="transition: all 0.25s ease;">
                    <div class="d-flex align-items-start gap-3">
                        <div class="icon-circle-badge flex-shrink-0" style="width: 48px; height: 48px; min-width: 48px; border-radius: 50% !important; display: inline-flex !important; align-items: center !important; justify-content: center !important; background: rgba(112, 0, 24, 0.08); border: 1.5px solid rgba(112, 0, 24, 0.15); color: var(--primary-color);">
                            <i class="fa-solid fa-envelope-open-text" style="font-size: 1.25rem; line-height: 1;"></i>
                        </div>
                        <div>
                            <div class="font-serif text-primary fw-bold fs-6 mb-1">Email Inquiries</div>
                            <div class="small fw-semibold text-truncate" style="font-size: 0.82rem;">
                                <a href="mailto:<?php echo htmlspecialchars($settings['email'] ?? 'info@aku.ac.in'); ?>" class="text-dark text-decoration-none">
                                    <?php echo htmlspecialchars($settings['email'] ?? 'info@aku.ac.in'); ?>
                                </a>
                            </div>
                            <div class="small text-muted text-truncate" style="font-size: 0.75rem;">
                                <?php echo htmlspecialchars($settings['admissions_email'] ?? 'admissions@aku.ac.in'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="pt-2 mt-2 border-top border-custom">
                        <a href="mailto:<?php echo htmlspecialchars($settings['admissions_email'] ?? 'admissions@aku.ac.in'); ?>" class="text-gold small fw-bold text-decoration-none">
                            <i class="fa-solid fa-paper-plane me-1"></i> Send Email
                        </a>
                    </div>
                </div>
            </div>

            <!-- 4. Office Working Hours -->
            <div class="col-sm-6 col-lg-3">
                <div class="p-3.5 p-md-4 rounded-4 border border-custom bg-white h-100 d-flex flex-column justify-content-between shadow-xs hover-shadow transition-all" style="transition: all 0.25s ease;">
                    <div class="d-flex align-items-start gap-3">
                        <div class="icon-circle-badge flex-shrink-0" style="width: 48px; height: 48px; min-width: 48px; border-radius: 50% !important; display: inline-flex !important; align-items: center !important; justify-content: center !important; background: rgba(30, 30, 30, 0.06); border: 1.5px solid rgba(30, 30, 30, 0.15); color: #333333;">
                            <i class="fa-regular fa-clock" style="font-size: 1.25rem; line-height: 1;"></i>
                        </div>
                        <div>
                            <div class="font-serif text-primary fw-bold fs-6 mb-1">Office Timings</div>
                            <div class="small text-dark fw-medium" style="font-size: 0.82rem;">Mon – Sat: 9:00 AM – 5:30 PM</div>
                            <div class="small text-muted" style="font-size: 0.75rem;">Sunday / Public Holidays: Closed</div>
                        </div>
                    </div>
                    <div class="pt-2 mt-2 border-top border-custom">
                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2.5 py-1 small fw-semibold" style="font-size: 0.72rem;">
                            <i class="fa-solid fa-circle-dot me-1"></i> Open Today
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Main Interactive Content Section -->
<main class="py-5" style="background-color: var(--bg-ivory);">
    <div class="container-custom">
        <div class="row g-4 g-xl-5">
            
            <!-- Left Column: Inquiry Form & Campus Map -->
            <div class="col-lg-8 col-xl-8">
                
                <!-- Online Inquiry Form Card -->
                <div class="p-4 p-md-5 rounded-4 border border-custom bg-white shadow-sm mb-5">
                    
                    <div class="d-flex align-items-center gap-2 mb-2 pb-2 border-bottom border-custom">
                        <i class="fa-solid fa-envelope-circle-check text-gold fs-3"></i>
                        <div>
                            <h2 class="font-serif text-primary fs-4 fw-bold m-0">Send Us an Inquiry</h2>
                            <p class="text-muted-custom small mb-0">Fill in the form below and our university administrative team will respond to you.</p>
                        </div>
                    </div>

                    <?php if ($successMessage): ?>
                        <div class="alert alert-success alert-dismissible fade show rounded-4 p-4 mt-4 shadow-sm border-0" role="alert" style="background: #e8f5e9; color: #1b5e20;">
                            <div class="d-flex align-items-center gap-3">
                                <i class="fa-solid fa-circle-check fs-2 text-success"></i>
                                <div>
                                    <h5 class="fw-bold mb-1">Message Dispatched Successfully!</h5>
                                    <div><?php echo $successMessage; ?></div>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if ($errorMessage): ?>
                        <div class="alert alert-danger alert-dismissible fade show rounded-4 p-3 mt-4" role="alert">
                            <i class="fa-solid fa-triangle-exclamation me-2"></i> <?php echo htmlspecialchars($errorMessage); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="contact-us.php" class="mt-4">
                        <!-- Anti-spam honeypot -->
                        <div style="display:none !important;">
                            <input type="text" name="website_hp" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.08em;">
                                    Full Name <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-custom"><i class="fa-solid fa-user text-muted"></i></span>
                                    <input type="text" name="name" class="form-control" placeholder="e.g. Rahul Sharma" required value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.08em;">
                                    Email Address <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-custom"><i class="fa-solid fa-envelope text-muted"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="e.g. rahul@example.com" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.08em;">
                                    Mobile Phone Number
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-custom"><i class="fa-solid fa-phone text-muted"></i></span>
                                    <input type="tel" name="phone" class="form-control" placeholder="e.g. +91 98765 43210" value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.08em;">
                                    Inquiring Department / Purpose
                                </label>
                                <select name="department" class="form-select">
                                    <option value="Admissions 2026-27">Admissions &amp; Entrance 2026-27</option>
                                    <option value="Academic Programs">Academic Programs &amp; Syllabi</option>
                                    <option value="Examination & Results">Examinations, Degrees &amp; Results</option>
                                    <option value="Training & Placements">Training &amp; Corporate Placements</option>
                                    <option value="Registrar Office">Registrar Office &amp; Administration</option>
                                    <option value="Student Grievance">Student Welfare &amp; Grievance</option>
                                    <option value="General Inquiry" selected>General Campus Inquiry</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-bold text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.08em;">
                                    Subject / Topic <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="subject" class="form-control" placeholder="Brief subject of your query" required value="<?php echo htmlspecialchars($_POST['subject'] ?? ''); ?>">
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-bold text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.08em;">
                                    Detailed Message / Question <span class="text-danger">*</span>
                                </label>
                                <textarea name="message" rows="5" class="form-control" placeholder="Please write your detailed query or message here..." required><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                            </div>

                            <div class="col-12 pt-2">
                                <button type="submit" name="submit_contact" class="btn btn-gold-pill px-5 py-2.5 fw-bold shadow-sm">
                                    <i class="fa-solid fa-paper-plane me-2"></i> Submit Inquiry Message
                                </button>
                                <span class="text-muted small ms-3" style="font-size: 0.78rem;">
                                    <i class="fa-solid fa-shield-halved text-success me-1"></i> Your details are encrypted &amp; private.
                                </span>
                            </div>
                        </div>
                    </form>

                </div>

                <!-- Interactive Campus Google Map Card -->
                <div id="campus-map" class="p-4 p-md-5 rounded-4 border border-custom bg-white shadow-sm">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3 pb-2 border-bottom border-custom">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fa-solid fa-map-location-dot text-gold fs-3"></i>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">50-Acre Lush Green Campus Map</h3>
                                <p class="text-muted-custom small mb-0">Indore-Dewas Bypass Road, Indore, Madhya Pradesh</p>
                            </div>
                        </div>
                        <a href="https://maps.google.com/?q=Dr.+A.P.J.+Abdul+Kalam+University+Indore" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1.5 fw-semibold small">
                            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Open Google Maps
                        </a>
                    </div>

                    <div class="rounded-4 overflow-hidden border border-custom shadow-xs" style="min-height: 420px;">
                        <?php 
                        if (!empty($settings['map_embed_code'])) {
                            echo $settings['map_embed_code'];
                        } else {
                            echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3678.966373801831!2d75.92881267591077!3d22.766624825828453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39631d8e12ecbe61%3A0xad02c1f7b7cb3b17!2sDr.%20A.P.J.%20Abdul%20Kalam%20University!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                        }
                        ?>
                    </div>

                    <div class="row g-3 mt-3 pt-2">
                        <div class="col-md-4">
                            <div class="p-3 rounded-3 bg-light border border-custom text-center">
                                <i class="fa-solid fa-plane-departure text-gold fs-5 mb-1 d-block"></i>
                                <strong class="small d-block text-dark">Nearest Airport</strong>
                                <span class="small text-muted" style="font-size: 0.78rem;">Indore Airport (IDR) – 24 km</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 rounded-3 bg-light border border-custom text-center">
                                <i class="fa-solid fa-train text-gold fs-5 mb-1 d-block"></i>
                                <strong class="small d-block text-dark">Nearest Railway Station</strong>
                                <span class="small text-muted" style="font-size: 0.78rem;">Indore Junction (INDB) – 14 km</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 rounded-3 bg-light border border-custom text-center">
                                <i class="fa-solid fa-bus text-gold fs-5 mb-1 d-block"></i>
                                <strong class="small d-block text-dark">Bus Connectivity</strong>
                                <span class="small text-muted" style="font-size: 0.78rem;">Frequent buses via Dewas Naka</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Right Sidebar: Department Contacts & Quick Assistance -->
            <div class="col-lg-4 col-xl-4">
                <div class="sidebar-sticky-wrapper">
                    
                    <!-- Quick Admissions Action Card -->
                    <div class="about-sidebar-card text-center p-4 mb-4">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" style="width: 72px; height: 72px; background: linear-gradient(135deg, #700018 0%, #4a0010 100%); border: 2px solid var(--gold-color);">
                            <i class="fa-solid fa-headset text-gold fs-3"></i>
                        </div>
                        <h4 class="font-serif text-primary fs-5 fw-bold mb-2">Admission Helpdesk 2026-27</h4>
                        <p class="text-muted-custom small mb-3">Looking for immediate course guidance or fee breakdown? Talk to our counselors.</p>
                        <a href="apply-now.php" class="btn-gold-pill w-100 text-center py-2 text-decoration-none d-block mb-2 font-weight-bold" style="font-size: 0.85rem;">
                            <i class="fa-solid fa-graduation-cap me-1"></i> Apply Online Now
                        </a>
                        <a href="https://wa.me/919111109999?text=Hello%20AKU%20Indore,%20I%20want%20information%20regarding%20admissions." target="_blank" class="btn btn-sm btn-outline-success rounded-pill w-100 py-1.5 small fw-semibold">
                            <i class="fa-brands fa-whatsapp me-1"></i> Chat on WhatsApp
                        </a>
                    </div>

                    <!-- Key Administrative Directory Card -->
                    <div class="p-4 rounded-4 border border-custom bg-white shadow-sm mb-4">
                        <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom border-custom">
                            <i class="fa-solid fa-address-book text-gold fs-5"></i>
                            <h4 class="font-serif text-primary fs-6 fw-bold m-0">Department Directory</h4>
                        </div>
                        
                        <div class="d-flex flex-column gap-3">
                            <div class="pb-2 border-bottom border-custom">
                                <div class="fw-bold small text-dark">Admissions Directorate</div>
                                <div class="text-muted small" style="font-size: 0.78rem;">For admissions, eligibility &amp; scholarships</div>
                                <div class="text-primary small fw-semibold mt-0.5">
                                    <i class="fa-solid fa-phone text-gold me-1"></i> +91 91111 09999 / 731 2530 500
                                </div>
                            </div>

                            <div class="pb-2 border-bottom border-custom">
                                <div class="fw-bold small text-dark">Registrar Office</div>
                                <div class="text-muted small" style="font-size: 0.78rem;">For statutory verifications &amp; governance</div>
                                <div class="text-primary small fw-semibold mt-0.5">
                                    <i class="fa-solid fa-envelope text-gold me-1"></i> registrar@aku.ac.in
                                </div>
                            </div>

                            <div class="pb-2 border-bottom border-custom">
                                <div class="fw-bold small text-dark">Examination &amp; Results Cell</div>
                                <div class="text-muted small" style="font-size: 0.78rem;">For marksheets, degrees &amp; revaluation</div>
                                <div class="text-primary small fw-semibold mt-0.5">
                                    <i class="fa-solid fa-envelope text-gold me-1"></i> exam@aku.ac.in
                                </div>
                            </div>

                            <div class="pb-2 border-bottom border-custom">
                                <div class="fw-bold small text-dark">Corporate Training &amp; Placement</div>
                                <div class="text-muted small" style="font-size: 0.78rem;">For recruiter drives &amp; internship tie-ups</div>
                                <div class="text-primary small fw-semibold mt-0.5">
                                    <i class="fa-solid fa-phone text-gold me-1"></i> +91 731 2530 500 (Extn: 204)
                                </div>
                            </div>

                            <div>
                                <div class="fw-bold small text-dark">Student Welfare &amp; Hostels</div>
                                <div class="text-muted small" style="font-size: 0.78rem;">For hostel allotment &amp; grievance cell</div>
                                <div class="text-primary small fw-semibold mt-0.5">
                                    <i class="fa-solid fa-envelope text-gold me-1"></i> studentwelfare@aku.ac.in
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Social Connectivity Strip -->
                    <div class="p-4 rounded-4 border border-custom bg-white shadow-sm text-center">
                        <div class="font-serif text-primary fw-bold fs-6 mb-2">Connect on Official Social Handles</div>
                        <p class="text-muted-custom small mb-3" style="font-size: 0.8rem;">Follow our verified channels for real-time university notifications and campus life.</p>
                        <div class="d-flex align-items-center justify-content-center gap-2">
                            <a href="<?php echo htmlspecialchars($settings['facebook_url'] ?? 'https://www.facebook.com/DR.APJAK.University'); ?>" target="_blank" class="footer-social-btn" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="<?php echo htmlspecialchars($settings['instagram_url'] ?? 'https://www.instagram.com/drapjaku_universityindore/'); ?>" target="_blank" class="footer-social-btn" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                            <a href="<?php echo htmlspecialchars($settings['twitter_url'] ?? 'https://x.com/APJ_University'); ?>" target="_blank" class="footer-social-btn" title="X (Twitter)"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="<?php echo htmlspecialchars($settings['linkedin_url'] ?? 'https://www.linkedin.com/in/akuniversityindore/'); ?>" target="_blank" class="footer-social-btn" title="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="<?php echo htmlspecialchars($settings['youtube_url'] ?? 'https://www.youtube.com/channel/UCHuwjAPSYLsThbZldaC75_A'); ?>" target="_blank" class="footer-social-btn" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</main>

<?php include "footer.php"; ?>
