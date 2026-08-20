<?php 
$pageTitle = "Download Student Forms & Proformas - Dr. APJ Abdul Kalam University, Indore";
include "header.php"; 

$forms = [
    ["title" => "Application for Transfer Certificate (TC) & Migration", "category" => "Academic Record", "fee" => "₹250", "pdf" => "uploads/forms/TC-Migration-Form.pdf"],
    ["title" => "Application for Bonafide / Character Certificate", "category" => "Student Section", "fee" => "₹100", "pdf" => "uploads/forms/Bonafide-Certificate-Form.pdf"],
    ["title" => "University Transport (Bus Pass) Registration Form", "category" => "Transport Fleet", "fee" => "As per Route", "pdf" => "uploads/forms/Bus-Pass-Registration.pdf"],
    ["title" => "Hostel Admission & Residential Accommodation Form", "category" => "Hostel Living", "fee" => "Free", "pdf" => "uploads/forms/Hostel-Admission-Form.pdf"],
    ["title" => "Railway Concession Application Form (Holidays/Tour)", "category" => "Travel Concession", "fee" => "Free", "pdf" => "uploads/forms/Railway-Concession-Form.pdf"],
    ["title" => "Duplicate Student Identity Card Application Form", "category" => "Student ID", "fee" => "₹150", "pdf" => "uploads/forms/Duplicate-ID-Card-Form.pdf"],
    ["title" => "Scholarship No Objection Certificate (NOC) Proforma", "category" => "Scholarship Cell", "fee" => "Free", "pdf" => "uploads/forms/Scholarship-NOC-Form.pdf"],
    ["title" => "No Dues Clearance Proforma (Final Year Outgoing Students)", "category" => "Graduation Clearance", "fee" => "Free", "pdf" => "uploads/forms/No-Dues-Proforma.pdf"]
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
            <span class="text-gold fw-medium">Download Forms</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> OFFICIAL STUDENT PROFORMAS
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Download Student Forms &amp; Proformas
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Official Printable PDFs for Student Services &amp; Certifications
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
                                <i class="fa-solid fa-file-pdf"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Student Services Forms Repository</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Download official application forms for Migration Certificates, Character Certificates, Bus Passes, Hostel Admissions, Railway Concessions, and No-Dues clearances. Submit duly filled forms at the Student Section window.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Forms Table -->
                    <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white mb-5">
                        <table class="luxury-table table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Form / Proforma Name</th>
                                    <th style="width: 170px;">Category</th>
                                    <th style="width: 110px;">Prescribed Fee</th>
                                    <th style="width: 110px;" class="text-end">Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($forms as $f): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2.5">
                                            <i class="fa-solid fa-file-pdf text-danger fs-5 flex-shrink-0"></i>
                                            <div>
                                                <span class="fw-bold text-primary d-block"><?php echo htmlspecialchars($f['title']); ?></span>
                                                <span class="small text-muted-custom">Official Printable Format</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border" style="font-size: 0.75rem;"><?php echo htmlspecialchars($f['category']); ?></span>
                                    </td>
                                    <td>
                                        <span class="small text-primary font-monospace fw-semibold"><?php echo htmlspecialchars($f['fee']); ?></span>
                                    </td>
                                    <td class="text-end">
                                        <a href="<?php echo htmlspecialchars($f['pdf']); ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">
                                            <i class="fa-solid fa-download me-1"></i> PDF
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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