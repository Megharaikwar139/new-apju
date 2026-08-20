<?php 
$pageTitle = "Examination Forms & Application Proformas - Dr. APJ Abdul Kalam University, Indore";
include 'header.php'; 

$examForms = [
    ['no' => '01', 'title' => 'Examination Enrollment / Registration Form', 'fee' => 'As per Schedule', 'pdf' => 'uploads/2026/08/17-Examination-Form.pdf', 'category' => 'Exam Registration'],
    ['no' => '02', 'title' => 'Application for Degree / Diploma Certificate In Absentia', 'fee' => '₹1,500', 'pdf' => 'uploads/2026/08/02-Degree-Certificate.pdf', 'category' => 'Degree & Awards'],
    ['no' => '03', 'title' => 'Application for Revaluation / Retotalling of Answer Books', 'fee' => '₹500 / Paper', 'pdf' => 'uploads/2026/08/12-Application-for-Revaluation.pdf', 'category' => 'Revaluation'],
    ['no' => '04', 'title' => 'Application for Issue of Duplicate Marksheet', 'fee' => '₹500', 'pdf' => 'uploads/2026/08/03-Duplicate-Mark-Sheet.pdf', 'category' => 'Duplicate Documents'],
    ['no' => '05', 'title' => 'Application for Migration Certificate', 'fee' => '₹500', 'pdf' => 'uploads/2026/08/01-Migration-Certificate.pdf', 'category' => 'Certificates'],
    ['no' => '06', 'title' => 'Application for Official Academic Transcript & Grade Conversion', 'fee' => '₹1,000', 'pdf' => 'uploads/2026/08/05-Transcript.pdf', 'category' => 'Transcripts'],
    ['no' => '07', 'title' => 'Application for Document / Marksheet Correction', 'fee' => '₹300', 'pdf' => 'uploads/2026/08/08-Correction-Form.pdf', 'category' => 'Corrections'],
    ['no' => '08', 'title' => 'Application for Provisional Degree Certificate', 'fee' => '₹500', 'pdf' => 'uploads/2026/08/04-Provisional-Degree.pdf', 'category' => 'Provisional'],
    ['no' => '09', 'title' => 'Application for Name / Surname Change in Academic Records', 'fee' => '₹500', 'pdf' => 'uploads/2026/08/09-Change-in-Name.pdf', 'category' => 'Corrections'],
    ['no' => '10', 'title' => 'Application for Third Party Marksheet Verification', 'fee' => '₹1,000', 'pdf' => 'uploads/2026/08/13-Verification.pdf', 'category' => 'Verification'],
    ['no' => '11', 'title' => 'Examination Centre Change Application Proforma', 'fee' => '₹1,000', 'pdf' => 'uploads/2026/08/14-Exam-Centre-Change.pdf', 'category' => 'Examination Center'],
    ['no' => '12', 'title' => 'Special Permission / Scribe Amanuensis Approval Proforma', 'fee' => 'Nil', 'pdf' => 'uploads/2026/08/16-Ph.D-Course-Work-Exam-Form.pdf', 'category' => 'PwD Accommodations']
];
?>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="about-the-section.php">Examinations</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Examination Forms</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> CONTROLLER OF EXAMINATIONS PROFORMAS
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 900px; line-height: 1.15;">
            Examination Forms &amp; Proformas
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Official Printable PDFs for Student Services
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
                                <i class="fa-solid fa-file-invoice"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Controller of Examination Forms Repository</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.7;">
                                    Download official printable application proformas for Revaluation, Degree In Absentia, Duplicate Marksheets, Official Transcripts, and Examination Registration. Submit completed forms at the University Student Section or submit online.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Search Input Box -->
                    <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs mb-4">
                        <div class="row g-2 align-items-center">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-custom"><i class="fa-solid fa-search text-muted-custom"></i></span>
                                    <input type="text" class="form-control border-custom" id="formSearchInput" placeholder="Quick search forms (e.g. Revaluation, Degree, Transcript, Duplicate)...">
                                </div>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <a href="download-form.php" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold" style="font-size: 0.82rem;">
                                    <i class="fa-solid fa-list-check me-1"></i> View All 18 Forms
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Forms Table -->
                    <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white mb-5">
                        <table class="luxury-table table table-hover mb-0" id="formsTable">
                            <thead>
                                <tr>
                                    <th style="width: 70px;">Form #</th>
                                    <th>Application Title &amp; Purpose</th>
                                    <th style="width: 140px;">Category</th>
                                    <th style="width: 120px;">Prescribed Fee</th>
                                    <th style="width: 110px;" class="text-end">Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($examForms as $f): ?>
                                <tr class="form-row">
                                    <td>
                                        <span class="badge bg-primary text-white font-monospace">#<?php echo htmlspecialchars($f['no']); ?></span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="fa-solid fa-file-pdf text-danger fs-5 flex-shrink-0"></i>
                                            <div>
                                                <a href="<?php echo htmlspecialchars($f['pdf']); ?>" target="_blank" class="fw-bold text-primary text-decoration-none d-block form-title">
                                                    <?php echo htmlspecialchars($f['title']); ?>
                                                </a>
                                                <span class="small text-muted-custom">Official Printable PDF Proforma</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border" style="font-size: 0.75rem;"><?php echo htmlspecialchars($f['category']); ?></span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-primary font-monospace small"><?php echo htmlspecialchars($f['fee']); ?></span>
                                    </td>
                                    <td class="text-end">
                                        <a href="<?php echo htmlspecialchars($f['pdf']); ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small" download>
                                            <i class="fa-solid fa-download me-1"></i> PDF
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Submission Guide Card -->
                    <div class="feature-info-card">
                        <div class="d-flex align-items-center gap-3 mb-2.5">
                            <div class="feature-icon-badge">
                                <i class="fa-solid fa-circle-info"></i>
                            </div>
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-0">Submission Guidelines &amp; Fee Remittance</h4>
                        </div>
                        <ul class="d-flex flex-column gap-2 mb-0 ps-3" style="color: #3e3233; line-height: 1.7; font-size: 0.92rem;">
                            <li>Filled forms along with self-attested copies of previous marksheets must be deposited at the University Accounts Window or uploaded on the Student ERP Portal.</li>
                            <li>Fees can be remitted online via Net Banking/UPI or paid by Bank Challan / Demand Draft in favor of <em>"Dr. A.P.J. Abdul Kalam University, Indore"</em>.</li>
                            <li>Postal applications must include a self-addressed registered envelope with appropriate postage stamps.</li>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('formSearchInput');
    const formRows = document.querySelectorAll('.form-row');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            formRows.forEach(row => {
                const title = row.querySelector('.form-title').innerText.toLowerCase();
                const cat = row.querySelector('.badge.bg-light').innerText.toLowerCase();
                if (title.includes(query) || cat.includes(query)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
});
</script>

<?php include 'footer.php'; ?>
