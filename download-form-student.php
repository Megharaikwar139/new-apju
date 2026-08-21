<?php 
$pageTitle = "Download Student Forms - Dr. APJ Abdul Kalam University, Indore";
include "header.php"; 

$studentForms = [
    [
        'no' => 1,
        'title' => 'Application Form for Issue of Duplicate Degree Certificate',
        'category' => 'Degree Section',
        'file' => 'uploads/2026/03/01_Application-Form-for-Issue-of-Duplicate-Degree-Certificate.pdf',
        'desc' => 'Prescribed form for applying duplicate graduation / post-graduation degree diploma.'
    ],
    [
        'no' => 2,
        'title' => 'Application Form for Issue of Degree Certificate',
        'category' => 'Degree Section',
        'file' => 'uploads/2026/03/02_Application-Form-For-Issue-of-Degree-Certificate.pdf',
        'desc' => 'Official proforma for conferment and issue of original university degree certificate.'
    ],
    [
        'no' => 3,
        'title' => 'Application Form for Issue of Migration / Provisional / Transcript Certificate',
        'category' => 'Migration & Transcripts',
        'file' => 'uploads/2026/03/03_Application-Form-For-Issue-of-Migration_Provisional_Transcript-Certificate.pdf',
        'desc' => 'Standard application for migration certificate, provisional degree, and official transcripts.'
    ],
    [
        'no' => 4,
        'title' => 'Application Form For Issue of Duplicate Migration / Provisional Certificate',
        'category' => 'Duplicate Documents',
        'file' => 'uploads/2026/03/04_Application-Form-For-Issue-of-Duplicate-Migration_Provisional-Certificate.pdf',
        'desc' => 'Form for requesting duplicate migration or provisional certificate in case of loss or damage.'
    ],
    [
        'no' => 5,
        'title' => 'Official University Answer Book Sample',
        'category' => 'Examinations',
        'file' => 'uploads/2026/03/05_Answer-Book-Sample.pdf',
        'desc' => 'Official sample format and front cover instructions of university examination answer booklet.'
    ],
    [
        'no' => 6,
        'title' => 'Student Identity Card (I-Card) Application Form',
        'category' => 'Student Services',
        'file' => 'uploads/2026/03/06_Student-I-Card-Form.pdf',
        'desc' => 'Registration form for issuance of new or replacement student RFID Identity Smart Card.'
    ],
    [
        'no' => 7,
        'title' => 'Exam Help Desk Form / Student Information Form',
        'category' => 'Examinations',
        'file' => 'uploads/2026/03/07_Exam-Help-desk-form_Student-Information-Form.pdf',
        'desc' => 'Student grievance, information verification and examination helpdesk query submission form.'
    ],
    [
        'no' => 8,
        'title' => 'Application Form For Issue of Migration / Provisional / Transcript Certificate',
        'category' => 'Migration & Transcripts',
        'file' => 'uploads/2026/03/08_Application-Form-For-Issue-of-Migration_Provisional_Transcript-Certificate.pdf',
        'desc' => 'Prescribed multi-purpose certificate request form for academic records.'
    ],
    [
        'no' => 9,
        'title' => 'Application Form for Issue of Diploma / PG Diploma Certificate',
        'category' => 'Diploma Section',
        'file' => 'uploads/2026/03/09_Application-Form-for-Issue-of-Diploma_PG-Diploma-Certificate.pdf',
        'desc' => 'Application for polytechnic diploma and post-graduate diploma certificate issuance.'
    ],
    [
        'no' => 10,
        'title' => 'Admission Cancellation & Fee Refund Application Form',
        'category' => 'Admissions',
        'file' => 'uploads/2026/03/10_Admission-Cancelleation-Form.pdf',
        'desc' => 'Official statutory application for voluntary cancellation of admission and refund processing.'
    ],
    [
        'no' => 11,
        'title' => 'Application Form for Issue of Duplicate Diploma / PG Diploma Certificate',
        'category' => 'Duplicate Documents',
        'file' => 'uploads/2026/03/11_Application-Form-for-Issue-of-Duplicate-Diploma_PG-Diploma-Certificate.pdf',
        'desc' => 'Proforma for duplicate diploma certificate reissuance with statutory undertaking.'
    ],
    [
        'no' => 12,
        'title' => 'Application Form for Issue of Duplicate / Corrected Marksheet',
        'category' => 'Examinations',
        'file' => 'uploads/2026/03/12_Application-Form-for-Issue-of-Duplicate_Corrected-Marksheet.pdf',
        'desc' => 'Application for grade card / marksheet corrections, name modifications, or duplicate issue.'
    ],
    [
        'no' => 13,
        'title' => 'University Student No Dues Clearance Form',
        'category' => 'Graduation Clearance',
        'file' => 'uploads/2026/03/13_No-Dues-Form.pdf',
        'desc' => 'Comprehensive institutional clearance proforma for library, labs, hostel, bus & accounts.'
    ],
    [
        'no' => 14,
        'title' => 'Tuition Fee / Security Deposit Refund Application Form',
        'category' => 'Accounts & Finance',
        'file' => 'uploads/2026/03/14_Fee-Rrefund-Form.pdf',
        'desc' => 'Institutional refund application form for caution money, excess payment, or withdrawal.'
    ]
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
            Download Student Forms
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Official Printable PDFs for Degree, Migration, Marksheet &amp; Student Services
        </p>
    </div>
</section>

<!-- Main Body -->
<main class="py-5" style="background-color: var(--bg-ivory);">
    <div class="container-custom">
        <div class="row g-4 g-xl-5">
            
            <div class="col-lg-8 col-xl-9">
                <article class="inner-main-card">
                    
                    <!-- Search Input & Filter Bar -->
                    <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs mb-4">
                        <div class="row g-2 align-items-center">
                            <div class="col-md-7">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-custom"><i class="fa-solid fa-search text-muted-custom"></i></span>
                                    <input type="text" class="form-control border-custom" id="formSearchInput" placeholder="Search forms (e.g. Migration, Degree, Marksheet, No Dues)...">
                                </div>
                            </div>
                            <div class="col-md-5 text-md-end">
                                <span class="custom-badge-pill">
                                    <i class="fa-solid fa-file-pdf text-danger me-1.5"></i> <span id="formCount"><?php echo count($studentForms); ?></span> Official Forms Available
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Forms Table -->
                    <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white mb-5">
                        <table class="luxury-table table table-hover align-middle mb-0" id="formsTable">
                            <thead>
                                <tr style="background-color: var(--primary-color); color: #ffffff;">
                                    <th class="py-3 px-3 text-center" style="width: 55px;">#</th>
                                    <th class="py-3 px-4">Application Form Title &amp; Scope</th>
                                    <th class="py-3 px-3" style="width: 175px;">Section</th>
                                    <th class="py-3 px-4 text-end" style="width: 140px;">Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($studentForms as $f): ?>
                                <tr class="form-row">
                                    <td class="text-center">
                                        <strong class="text-primary font-monospace fw-bold"><?php echo sprintf('%02d', $f['no']); ?></strong>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="d-flex align-items-start gap-2.5">
                                            <i class="fa-solid fa-file-pdf text-danger fs-5 mt-1 flex-shrink-0"></i>
                                            <div>
                                                <a href="<?php echo htmlspecialchars($f['file']); ?>" target="_blank" class="fw-bold text-primary text-decoration-none d-block form-title" style="font-size: 0.95rem;">
                                                    <?php echo htmlspecialchars($f['title']); ?>
                                                </a>
                                                <span class="small text-muted-custom"><?php echo htmlspecialchars($f['desc']); ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-3">
                                        <span class="badge bg-light text-dark border px-2.5 py-1.5" style="font-size: 0.72rem;"><?php echo htmlspecialchars($f['category']); ?></span>
                                    </td>
                                    <td class="py-3 px-4 text-end">
                                        <a href="<?php echo htmlspecialchars($f['file']); ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1.5 small fw-semibold" download>
                                            <i class="fa-solid fa-download me-1 text-gold"></i> PDF
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Submission Guide Card -->
                    <div class="p-4 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle bg-light p-3 d-flex align-items-center justify-content-center text-primary" style="width: 48px; height: 48px;">
                                <i class="fa-solid fa-circle-info fs-5 text-gold"></i>
                            </div>
                            <div>
                                <h5 class="font-serif text-primary fs-6 fw-bold mb-0.5">Submission &amp; Verification Protocol</h5>
                                <p class="text-muted-custom small mb-0">Fill the downloaded proforma, attach required attested documents, and submit at Counter No. 04, Academic Block.</p>
                            </div>
                        </div>
                        <a href="contact-us.php" class="btn btn-sm btn-primary-pill">
                            <i class="fa-solid fa-headset me-1.5"></i> Student Helpdesk
                        </a>
                    </div>

                </article>
            </div>

            <div class="col-lg-4 col-xl-3">
                <?php include "student-sidebar.php"; ?>
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
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('formSearchInput');
    const tableRows = document.querySelectorAll('#formsTable .form-row');
    const countDisplay = document.getElementById('formCount');

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            const query = this.value.toLowerCase().trim();
            let visibleCount = 0;
            tableRows.forEach(row => {
                const title = row.querySelector('.form-title').innerText.toLowerCase();
                const cat = row.querySelector('.badge').innerText.toLowerCase();
                if (title.includes(query) || cat.includes(query)) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });
            if (countDisplay) {
                countDisplay.innerText = visibleCount;
            }
        });
    }
});
</script>

<?php include "footer.php"; ?>