<?php 
$pageTitle = "Industrial Visits & Recruitment Events - Dr. APJ Abdul Kalam University, Indore";
include 'header.php'; 

$visitsData = [
    ['title' => 'Cadila Pharmaceuticals Limited Job Openings for B.Sc, M.Sc, B.Pharm & M.Pharm', 'category' => 'Campus Recruitment Drive', 'date' => 'August 2025', 'pdf' => 'uploads/2025/08/Cadila-Pharmaceuticals-Limited-Job-openings-for-B-Sc-M-Sc-B-Pharm-and-M-Pharm-students.pdf'],
    ['title' => 'Granules India Limited Job Openings for B.Sc Chemistry Graduates', 'category' => 'Hiring Drive', 'date' => 'August 2025', 'pdf' => 'uploads/2025/08/Granules-India-Limited-Job-openings-for-B-Sc-Chemistry-students.pdf'],
    ['title' => 'USV Limited Openings for All Science UG & PG Students', 'category' => 'Campus Drive', 'date' => 'August 2025', 'pdf' => 'uploads/2025/08/USV-Job-Openingfor-all-science-UG-and-PG-students-1.pdf'],
    ['title' => 'Vimta Labs Limited Job Openings for M.Sc Chemistry Passed Out Batches', 'category' => 'Research Hiring', 'date' => 'August 2025', 'pdf' => 'uploads/2025/08/Vimta-Limited-Job-openings-for-M-Sc-Chemistry-2023-2024-2025-passout-students.pdf'],
    ['title' => 'Biophore Limited Job Openings for M.Pharm & MBA Students', 'category' => 'Pharma Management', 'date' => 'August 2025', 'pdf' => 'uploads/2025/08/Biophore-Limited-Job-openings-for-M-Pharm-and-MBA-students.pdf'],
    ['title' => 'Cipla Limited Quality Control & Formulation Hiring for Chemistry Students', 'category' => 'Pharma Campus Drive', 'date' => 'August 2025', 'pdf' => 'uploads/2025/08/Cipla-Limited-Job-openings-for-B-Sc-Chemistry-students.pdf'],
    ['title' => 'Sun Pharma Dewas Plant Hiring Drive for B.Sc Chemistry Students', 'category' => 'Plant Recruitment', 'date' => 'August 2025', 'pdf' => 'uploads/2025/08/Sun-Pharma-Dewas-Job-Openings-for-B-Sc-Chemistry-students.pdf'],
    ['title' => 'Paid Corporate Internship Opportunities for BBA, B.Com & MBA Students', 'category' => 'Summer Internship', 'date' => 'August 2025', 'pdf' => 'uploads/2025/08/Internship-opportunity-for-BBA-B-Com-MBA-students.pdf'],
    ['title' => 'Emcure Pharmaceuticals Limited Openings for D.Pharm, B.Sc, B.E., B.A. & B.Com', 'category' => 'Mega Job Drive', 'date' => 'June 2025', 'pdf' => 'uploads/2025/06/29052025_044300_Emcure-Pharma-Limited-Job-openings-for-D-Pharma-BSc-BE-BA-and-BCom-students.pdf'],
    ['title' => 'Micro Labs Limited Job Openings for Diploma Pharmacy & Diploma Engineering', 'category' => 'Diploma Hiring', 'date' => 'June 2025', 'pdf' => 'uploads/2025/06/29052025_044310_Micro-Labs-Limited-Job-openings-for-Diploma-Phamacy-and-Diploma-Engg-students.pdf'],
    ['title' => 'Industrial Plant Visit & Practical Tour for Final Year Engineering Students', 'category' => 'Industrial Plant Tour', 'date' => 'August 2025', 'pdf' => 'uploads/2025/08/Industrial-visit-of-students-2025.pdf']
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
            <span class="text-gold fw-medium">Visits &amp; Events</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> EXPERIENTIAL INDUSTRY LEARNING
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Industrial Visits &amp; Placement Events
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Practical Plant Tours, On-Campus Job Fairs &amp; Internship Drives
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
                                <i class="fa-solid fa-industry"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Bridging Classrooms with Industrial Plants</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Industrial visits and recruitment events form an integral part of the university curriculum. Students gain direct firsthand exposure to real-world manufacturing plants, pharmaceutical formulation lines, automated assembly lines, and corporate IT operations.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Search Box -->
                    <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs mb-4">
                        <div class="row g-2 align-items-center">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-custom"><i class="fa-solid fa-search text-muted-custom"></i></span>
                                    <input type="text" class="form-control border-custom" id="visitSearchInput" placeholder="Search visits, job drives (e.g. Cipla, Cadila, Emcure, Internship)...">
                                </div>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <span class="badge bg-gold text-dark fw-bold px-3 py-2 rounded-pill w-100 w-md-auto">
                                    <i class="fa-solid fa-bullhorn me-1"></i> Active Drives
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Table of Visits & Drives -->
                    <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white mb-5">
                        <table class="luxury-table table table-hover mb-0" id="visitsTable">
                            <thead>
                                <tr>
                                    <th>Event / Company Hiring Drive</th>
                                    <th style="width: 170px;">Category</th>
                                    <th style="width: 130px;">Session Date</th>
                                    <th style="width: 110px;" class="text-end">Circular</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($visitsData as $v): ?>
                                <tr class="visit-row">
                                    <td>
                                        <div class="d-flex align-items-center gap-2.5">
                                            <i class="fa-solid fa-file-pdf text-danger fs-5 flex-shrink-0"></i>
                                            <div>
                                                <a href="<?php echo htmlspecialchars($v['pdf']); ?>" target="_blank" class="fw-bold text-primary text-decoration-none d-block visit-title">
                                                    <?php echo htmlspecialchars($v['title']); ?>
                                                </a>
                                                <span class="small text-muted-custom">Official Placement Notice</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border" style="font-size: 0.75rem;"><?php echo htmlspecialchars($v['category']); ?></span>
                                    </td>
                                    <td>
                                        <span class="small text-primary font-monospace fw-semibold"><?php echo htmlspecialchars($v['date']); ?></span>
                                    </td>
                                    <td class="text-end">
                                        <a href="<?php echo htmlspecialchars($v['pdf']); ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">
                                            <i class="fa-solid fa-download me-1"></i> PDF
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Value of Industrial Visits -->
                    <div class="feature-info-card p-4 p-md-4.5 mb-4">
                        <div class="d-flex align-items-center gap-3 mb-3 pb-2.5 border-bottom border-custom">
                            <div class="feature-icon-badge">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-0">Core Benefits of Industrial Plant Visits</h4>
                        </div>
                        <ul class="d-flex flex-column gap-2.5 mb-0 ps-0 list-unstyled" style="color: #3e3233; line-height: 1.7; font-size: 0.92rem;">
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Hands-on Industrial Exposure:</strong> Understanding high-speed manufacturing, robotic assembly, chemical synthesis reactors, and GMP cleanroom environments.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Direct Dialogue with Plant Managers:</strong> Interactive Q&amp;A sessions with Chief Engineers, Quality Assurance Officers, and R&amp;D Directors.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Paving Paths for Final Year Internships:</strong> Several plant tours translate into mandatory 6-month industrial internships and pre-placement offers (PPOs).</span>
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
    const searchInput = document.getElementById('visitSearchInput');
    const rows = document.querySelectorAll('.visit-row');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            rows.forEach(row => {
                const title = row.querySelector('.visit-title').innerText.toLowerCase();
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
