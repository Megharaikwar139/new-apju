<?php 
$pageTitle = "Corporate Interactions & Campus Selections - Dr. APJ Abdul Kalam University, Indore";
include 'header.php'; 

$selections = [
    ['student' => 'Mr. Pallav Saxena', 'course' => 'Master of Computer Applications (MCA)', 'company' => 'Amazon Development Center Pvt. Ltd.', 'pdf' => 'uploads/2025/07/Selection-of-our-Master-of-Computer-Applications-student-Mr-Pallav-Saxena-at-Amazon-Development-Center-Pvt-Limited.pdf', 'city' => 'Bangalore'],
    ['student' => 'Mr. Atharv N. Yeole', 'course' => 'Master of Computer Applications (MCA)', 'company' => 'Infosys Technologies Limited', 'pdf' => 'uploads/2025/08/Selection-of-our-MCA-student-Mr-Atharv-N-Yeole-at-Infosys-Pune.pdf', 'city' => 'Pune'],
    ['student' => 'Mr. Rohit Yogi', 'course' => 'M.Sc. Chemistry', 'company' => 'Macleods Pharmaceuticals Ltd.', 'pdf' => 'uploads/2025/08/Selection-of-our-M-Sc-Chemistry-student-Mr-Rohit-Yogi-at-Macleods-Pharma-Ltd-Pithampur.pdf', 'city' => 'Pithampur'],
    ['student' => 'Mr. Jayesh Patil', 'course' => 'M.Sc. Chemistry', 'company' => 'Glenmark Life Sciences Limited', 'pdf' => 'uploads/2025/08/Selection-of-our-M-Sc-Chemistry-student-Mr-Jayesh-Patil-at-Glenmark-Life-Science-Dahej.pdf', 'city' => 'Dahej'],
    ['student' => 'Mr. Mayur K. Patil', 'course' => 'M.Sc. Chemistry', 'company' => 'Zydus Lifesciences Limited', 'pdf' => 'uploads/2025/07/Selection-of-our-Master-of-Science-in-Chemistry-student-Mr-Mayur-K-Patil-at-Zydas-Lifescience-Limited.pdf', 'city' => 'Ahmedabad'],
    ['student' => 'Mr. Vinod Pawar', 'course' => 'B.E. Electrical & Electronics (EEE)', 'company' => 'Godrej Consumer Products Limited', 'pdf' => 'uploads/2025/08/Selection-of-our-B-E-EEE-student-Mr-Vinod-Pawar-at-Godrej-Consumer-Supplies-Limited.pdf', 'city' => 'Mumbai'],
    ['student' => 'Mr. Manoj S. Rajput', 'course' => 'B.E. Mechanical Engineering', 'company' => 'JSW Steel & JAP Electrical Engg', 'pdf' => 'uploads/2025/08/Selection-of-our-B-E-Mechanical-student-Mr-Manoj-S-Rajput-at-JSW-and-JAP-Electrical-Engg-Nasik.pdf', 'city' => 'Nasik'],
    ['student' => 'Mr. Shivam Chaturvedi', 'course' => 'Bachelor of Business Admin (BBA)', 'company' => 'Teleperformance India', 'pdf' => 'uploads/2025/08/Selection-of-our-BBA-student-Mr-Shivam-Chaturvedi-at-Teleperformance-Indore.pdf', 'city' => 'Indore'],
    ['student' => 'Mr. Lokesh Patil', 'course' => 'M.Sc. Chemistry', 'company' => 'Bharat Rasayan Limited', 'pdf' => 'uploads/2025/08/Selection-of-our-M-Sc-Chemistry-student-Mr-Lokesh-Patil-at-Bharat-Rasayan-Limited-Dahej.pdf', 'city' => 'Dahej'],
    ['student' => 'Mr. Mukund S. Patil', 'course' => 'Management / Commerce', 'company' => 'SMFG India Credit Co. Limited', 'pdf' => 'uploads/2025/08/Selection-of-our-student-Mr-Mukund-S-Patil-at-SMFG-India-Credit-Co-Limited.pdf', 'city' => 'Indore'],
    ['student' => 'Ms. Mahima Jain', 'course' => 'Bachelor of Commerce (B.Com)', 'company' => 'Inet Technologies Pvt. Ltd.', 'pdf' => 'uploads/2025/08/Selection-of-our-B-Com-student-Ms-Mahima-Jain-at-Inet-Technologies-Indore.pdf', 'city' => 'Indore'],
    ['student' => 'Mr. Mohit Gurjar', 'course' => 'B.Sc. Computer Science', 'company' => 'Housofai Technologies Pvt. Ltd.', 'pdf' => 'uploads/2025/08/Selection-of-our-B-Sc-student-Mr-Mohit-Gurjar-at-Housofai-Technologies-Pvt-Ltd-Indore.pdf', 'city' => 'Indore'],
    ['student' => 'Mr. Darshan Patil', 'course' => 'M.Sc. Chemistry', 'company' => 'Alivus Life Sciences Ltd.', 'pdf' => 'uploads/2025/08/Selection-of-our-M-Sc-Chemistry-student-Mr-Darshan-Patil-at-Alivus-Life-Sciences-Ankleshwar.pdf', 'city' => 'Ankleshwar'],
    ['student' => 'Mr. Sagar K. Patil', 'course' => 'M.Sc. Chemistry', 'company' => 'CTX Life Sciences Limited', 'pdf' => 'uploads/2025/08/Selection-of-our-M-Sc-Chemistry-student-Mr-Sagar-K-Patil-at-CTX-Life-Sciences-Surat.pdf', 'city' => 'Surat'],
    ['student' => 'Mr. Wadile Sushil', 'course' => 'M.Sc. Chemistry', 'company' => 'Sumitomo Chemical India Pvt. Ltd.', 'pdf' => 'uploads/2025/08/Selection-of-our-M-Sc-Chemistry-student-Mr-Wadile-Sushil-at-Sumotomo-Chemical-India-P-Ltd-Vapi.pdf', 'city' => 'Vapi'],
    ['student' => 'Mr. Raj Kumar Marathe', 'course' => 'Master of Computer Applications (MCA)', 'company' => 'Choice Technologies Lab', 'pdf' => 'uploads/2025/08/Selection-of-our-MCA-student-Mr-Raj-Kumar-Marathe-at-Choice-Technologies-Lab-Pune.pdf', 'city' => 'Pune']
];
?>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="placement-cell.php">Placements</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Corporate Interactions</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> CAMPUS RECRUITMENT SELECTIONS
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Corporate Interactions &amp; Selections
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Celebrating Campus Placement Selections in Top MNCs
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
                                <i class="fa-solid fa-handshake-angle"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Corporate Placement Selections</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Our proactive corporate connect and industry-aligned pedagogy enable students to clear rigorous recruitment drives by marquee employers including Amazon, Infosys, Macleods, Glenmark, Zydus, and Godrej.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Search / Filter Box -->
                    <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs mb-4">
                        <div class="row g-2 align-items-center">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-custom"><i class="fa-solid fa-search text-muted-custom"></i></span>
                                    <input type="text" class="form-control border-custom" id="selectionSearchInput" placeholder="Quick search candidate, recruiter (e.g. Amazon, Infosys, Glenmark, MCA)...">
                                </div>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <span class="badge bg-gold text-dark fw-bold px-3 py-2 rounded-pill w-100 w-md-auto">
                                    <i class="fa-solid fa-award me-1"></i> Verified Placement Offers
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Selections Table -->
                    <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white mb-5">
                        <table class="luxury-table table table-hover mb-0" id="selectionsTable">
                            <thead>
                                <tr>
                                    <th>Candidate Name &amp; Program</th>
                                    <th>Recruiter Company</th>
                                    <th style="width: 140px;">Location</th>
                                    <th style="width: 120px;" class="text-end">Offer Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($selections as $s): ?>
                                <tr class="selection-row">
                                    <td>
                                        <div class="d-flex align-items-center gap-2.5">
                                            <div class="feature-icon-badge flex-shrink-0" style="width: 36px; height: 36px; font-size: 0.9rem;">
                                                <i class="fa-solid fa-user-graduate"></i>
                                            </div>
                                            <div>
                                                <span class="fw-bold text-primary d-block candidate-name"><?php echo htmlspecialchars($s['student']); ?></span>
                                                <span class="small text-muted-custom candidate-course"><?php echo htmlspecialchars($s['course']); ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark d-block recruiter-company"><?php echo htmlspecialchars($s['company']); ?></span>
                                        <span class="badge bg-light text-dark border" style="font-size: 0.72rem;">On-Campus Select</span>
                                    </td>
                                    <td>
                                        <span class="small text-muted-custom"><i class="fa-solid fa-location-dot text-gold me-1"></i> <?php echo htmlspecialchars($s['city']); ?></span>
                                    </td>
                                    <td class="text-end">
                                        <a href="<?php echo htmlspecialchars($s['pdf']); ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">
                                            <i class="fa-solid fa-file-pdf me-1 text-danger"></i> PDF
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Corporate Engagement Pillars -->
                    <div class="feature-info-card p-4 p-md-4.5 mb-4">
                        <div class="d-flex align-items-center gap-3 mb-3 pb-2.5 border-bottom border-custom">
                            <div class="feature-icon-badge">
                                <i class="fa-solid fa-handshake"></i>
                            </div>
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-0">Corporate Engagement &amp; Industry Alignment</h4>
                        </div>
                        <ul class="d-flex flex-column gap-2.5 mb-0 ps-0 list-unstyled" style="color: #3e3233; line-height: 1.7; font-size: 0.92rem;">
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>CXO &amp; Industry Leader Guest Lectures:</strong> Regular interaction with corporate Vice Presidents, Technical Directors, and HR Leaders.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Industry MoUs &amp; Live Co-Op Projects:</strong> Collaborative skill development partnerships with technology MNCs and industrial research labs.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Pre-Placement Talk (PPT) &amp; Hackathons:</strong> Direct company presentations and real-world industrial problem solving challenges.</span>
                            </li>
                        </ul>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <?php include "placement-sidebar.php"; ?>
            </div>

        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('selectionSearchInput');
    const rows = document.querySelectorAll('.selection-row');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            rows.forEach(row => {
                const name = row.querySelector('.candidate-name').innerText.toLowerCase();
                const course = row.querySelector('.candidate-course').innerText.toLowerCase();
                const comp = row.querySelector('.recruiter-company').innerText.toLowerCase();
                if (name.includes(query) || course.includes(query) || comp.includes(query)) {
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
