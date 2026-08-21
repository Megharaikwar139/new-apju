<?php 
$pageTitle = "Examination Forms & Application Proformas - Dr. APJ Abdul Kalam University, Indore";
include 'header.php'; 

$examForms = [
    ['no' => '01', 'title' => 'Application Form for Issue of Duplicate Degree Certificate', 'fee' => '₹1,500', 'pdf' => 'uploads/2026/03/01_Application-Form-for-Issue-of-Duplicate-Degree-Certificate.pdf', 'category' => 'Degree Section'],
    ['no' => '02', 'title' => 'Application Form for Issue of Original Degree Certificate', 'fee' => '₹1,000', 'pdf' => 'uploads/2026/03/02_Application-Form-For-Issue-of-Degree-Certificate.pdf', 'category' => 'Degree Section'],
    ['no' => '03', 'title' => 'Application Form for Issue of Migration / Provisional / Transcript Certificate', 'fee' => '₹500', 'pdf' => 'uploads/2026/03/03_Application-Form-For-Issue-of-Migration_Provisional_Transcript-Certificate.pdf', 'category' => 'Certificates'],
    ['no' => '04', 'title' => 'Application Form For Issue of Duplicate Migration / Provisional Certificate', 'fee' => '₹500', 'pdf' => 'uploads/2026/03/04_Application-Form-For-Issue-of-Duplicate-Migration_Provisional-Certificate.pdf', 'category' => 'Duplicate Documents'],
    ['no' => '05', 'title' => 'Official University Examination Answer Book Sample', 'fee' => 'Reference', 'pdf' => 'uploads/2026/03/05_Answer-Book-Sample.pdf', 'category' => 'Examination Sample'],
    ['no' => '06', 'title' => 'Student RFID Smart Identity Card (I-Card) Application Form', 'fee' => '₹150', 'pdf' => 'uploads/2026/03/06_Student-I-Card-Form.pdf', 'category' => 'Student ID'],
    ['no' => '07', 'title' => 'Exam Help Desk Form / Student Information Form', 'fee' => 'Free', 'pdf' => 'uploads/2026/03/07_Exam-Help-desk-form_Student-Information-Form.pdf', 'category' => 'Student Helpdesk'],
    ['no' => '08', 'title' => 'Application Form for Issue of Diploma / PG Diploma Certificate', 'fee' => '₹1,000', 'pdf' => 'uploads/2026/03/09_Application-Form-for-Issue-of-Diploma_PG-Diploma-Certificate.pdf', 'category' => 'Diploma Section'],
    ['no' => '09', 'title' => 'Admission Cancellation & Fee Refund Application Form', 'fee' => 'Statutory', 'pdf' => 'uploads/2026/03/10_Admission-Cancelleation-Form.pdf', 'category' => 'Admissions'],
    ['no' => '10', 'title' => 'Application Form for Issue of Duplicate Diploma / PG Diploma Certificate', 'fee' => '₹1,000', 'pdf' => 'uploads/2026/03/11_Application-Form-for-Issue-of-Duplicate-Diploma_PG-Diploma-Certificate.pdf', 'category' => 'Duplicate Documents'],
    ['no' => '11', 'title' => 'Application Form for Issue of Duplicate / Corrected Marksheet', 'fee' => '₹500', 'pdf' => 'uploads/2026/03/12_Application-Form-for-Issue-of-Duplicate_Corrected-Marksheet.pdf', 'category' => 'Marksheet Corrections'],
    ['no' => '12', 'title' => 'University Student Final No Dues Clearance Form', 'fee' => 'Free', 'pdf' => 'uploads/2026/03/13_No-Dues-Form.pdf', 'category' => 'Clearance'],
    ['no' => '13', 'title' => 'Tuition Fee / Security Deposit Refund Application Form', 'fee' => 'Refund Cell', 'pdf' => 'uploads/2026/03/14_Fee-Rrefund-Form.pdf', 'category' => 'Finance & Accounts']
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
                                    Download official printable application proformas for Degree Certificates, Migration, Duplicate Marksheets, Official Transcripts, and No-Dues Clearance. Submit completed forms at the University Student Section or submit online.
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
                                    <input type="text" class="form-control border-custom" id="formSearchInput" placeholder="Quick search forms (e.g. Migration, Degree, Marksheet, Duplicate)...">
                                </div>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <span class="custom-badge-pill">
                                    <i class="fa-solid fa-file-pdf text-danger me-1.5"></i> <?php echo count($examForms); ?> Verified Forms
                                </span>
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
                                    <th style="width: 150px;">Category</th>
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

<style>
.custom-badge-pill {
    display: inline-flex;
    align-items: center;
    background: #fbf3f5;
    color: #700015;
    border: 1px solid rgba(112, 0, 21, 0.2);
    padding: 0.4rem 1rem;
    border-radius: 50px;
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 0.04em;
}
</style>

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
