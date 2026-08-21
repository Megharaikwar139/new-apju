<?php 
$pageTitle = "Download Application & Student Forms - Dr. APJ Abdul Kalam University, Indore";
include 'header.php'; 

$formsList = [
    ['num' => '01', 'title' => 'Application Form for Issue of Duplicate Degree Certificate', 'file' => 'uploads/2026/03/01_Application-Form-for-Issue-of-Duplicate-Degree-Certificate.pdf', 'cat' => 'Degree & Certificates'],
    ['num' => '02', 'title' => 'Application Form for Issue of Degree Certificate', 'file' => 'uploads/2026/03/02_Application-Form-For-Issue-of-Degree-Certificate.pdf', 'cat' => 'Degree & Certificates'],
    ['num' => '03', 'title' => 'Application Form for Issue of Migration / Provisional / Transcript Certificate', 'file' => 'uploads/2026/03/03_Application-Form-For-Issue-of-Migration_Provisional_Transcript-Certificate.pdf', 'cat' => 'Transcripts & Migration'],
    ['num' => '04', 'title' => 'Application Form for Issue of Duplicate Migration / Provisional Certificate', 'file' => 'uploads/2026/03/04_Application-Form-For-Issue-of-Duplicate-Migration_Provisional-Certificate.pdf', 'cat' => 'Transcripts & Migration'],
    ['num' => '05', 'title' => 'University Official Answer Book Sample Format', 'file' => 'uploads/2026/03/05_Answer-Book-Sample.pdf', 'cat' => 'Examination'],
    ['num' => '06', 'title' => 'Student Identity Card (I-Card) Application Form', 'file' => 'uploads/2026/03/06_Student-I-Card-Form.pdf', 'cat' => 'Student Services'],
    ['num' => '07', 'title' => 'Exam Help Desk Form / Student Information Verification Form', 'file' => 'uploads/2026/03/07_Exam-Help-desk-form_Student-Information-Form.pdf', 'cat' => 'Examination'],
    ['num' => '08', 'title' => 'Application Form for Issue of Migration / Provisional / Transcript Certificate (Proforma)', 'file' => 'uploads/2026/03/08_Application-Form-For-Issue-of-Migration_Provisional_Transcript-Certificate.pdf', 'cat' => 'Transcripts & Migration'],
    ['num' => '09', 'title' => 'Application Form for Issue of Diploma / PG Diploma Certificate', 'file' => 'uploads/2026/03/09_Application-Form-for-Issue-of-Diploma_PG-Diploma-Certificate.pdf', 'cat' => 'Degree & Certificates'],
    ['num' => '10', 'title' => 'Admission Cancellation & Fee Refund Application Form', 'file' => 'uploads/2026/03/10_Admission-Cancelleation-Form.pdf', 'cat' => 'Admissions'],
    ['num' => '11', 'title' => 'Application Form for Issue of Duplicate Diploma / PG Diploma Certificate', 'file' => 'uploads/2026/03/11_Application-Form-for-Issue-of-Duplicate-Diploma_PG-Diploma-Certificate.pdf', 'cat' => 'Degree & Certificates'],
    ['num' => '12', 'title' => 'Application Form for Issue of Duplicate / Corrected Marksheet', 'file' => 'uploads/2026/03/12_Application-Form-for-Issue-of-Duplicate_Corrected-Marksheet.pdf', 'cat' => 'Examination'],
    ['num' => '13', 'title' => 'Student University No-Dues Clearance Form', 'file' => 'uploads/2026/03/13_No-Dues-Form.pdf', 'cat' => 'Student Services'],
    ['num' => '14', 'title' => 'Tuition Fee / Caution Money Refund Application Form', 'file' => 'uploads/2026/03/14_Fee-Rrefund-Form.pdf', 'cat' => 'Accounts & Finance']
];
?>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="admission-procedure.php">Admissions</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Download Forms</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> OFFICIAL STUDENT FORMS & PROFORMAS
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 900px; line-height: 1.15;">
            Download Application Forms
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Official Printable PDF Forms for Degree, Migration, Transcripts, Enrolment &amp; Examinations
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
                    
                    <!-- Search Input & Filter Bar -->
                    <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs mb-4">
                        <div class="row g-2 align-items-center">
                            <div class="col-md-7">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-custom"><i class="fa-solid fa-search text-muted-custom"></i></span>
                                    <input type="text" class="form-control border-custom" id="formSearchInput" placeholder="Quick search form title (e.g. Migration, Degree, Marksheet)...">
                                </div>
                            </div>
                            <div class="col-md-5 text-md-end">
                                <a href="apply-now.php" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold" style="font-size: 0.82rem;">
                                    <i class="fa-solid fa-bolt me-1"></i> Apply Online for Admission
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Forms List Table -->
                    <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white mb-4">
                        <table class="luxury-table table table-hover mb-0" id="formsTable">
                            <thead>
                                <tr>
                                    <th style="width: 60px;">#</th>
                                    <th>Application Form Name / Description</th>
                                    <th style="width: 170px;">Category</th>
                                    <th style="width: 130px;" class="text-end">Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($formsList as $f): ?>
                                <tr class="form-row">
                                    <td><strong class="text-primary font-monospace"><?php echo $f['num']; ?></strong></td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2.5">
                                            <i class="fa-solid fa-file-pdf text-danger fs-5 flex-shrink-0"></i>
                                            <div>
                                                <a href="<?php echo htmlspecialchars($f['file']); ?>" target="_blank" class="fw-bold text-primary text-decoration-none d-block form-title">
                                                    <?php echo htmlspecialchars($f['title']); ?>
                                                </a>
                                                <span class="small text-muted-custom">Official Printable PDF Proforma</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border" style="font-size: 0.72rem;"><?php echo htmlspecialchars($f['cat']); ?></span>
                                    </td>
                                    <td class="text-end">
                                        <a href="<?php echo htmlspecialchars($f['file']); ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small" download>
                                            <i class="fa-solid fa-download me-1"></i> PDF
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Student Support Helpdesk -->
                    <div class="p-4 rounded-4 border border-custom bg-light d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle bg-white shadow-xs p-3 d-flex align-items-center justify-content-center text-primary" style="width: 50px; height: 50px;">
                                <i class="fa-solid fa-headset fs-4 text-gold"></i>
                            </div>
                            <div>
                                <h4 class="font-serif text-primary fs-6 fw-bold mb-0.5">Need Submission Assistance?</h4>
                                <p class="text-muted-custom small mb-0">Submit completed forms at the University Student Section, Ground Floor, Admin Block.</p>
                            </div>
                        </div>
                        <a href="admission-assistance.php" class="btn btn-sm btn-primary-pill">
                            <i class="fa-solid fa-phone me-1.5"></i> Contact Student Cell
                        </a>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <div class="sidebar-sticky-wrapper">
                    <?php include "faculty-sidebar.php"; ?>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('formSearchInput');
    const tableRows = document.querySelectorAll('#formsTable .form-row');

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            const query = this.value.toLowerCase().trim();
            tableRows.forEach(row => {
                const title = row.querySelector('.form-title').innerText.toLowerCase();
                const cat = row.querySelector('.badge').innerText.toLowerCase();
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
