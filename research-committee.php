<?php 
$pageTitle = "Research & Development (R&D) Committee - Dr. APJ Abdul Kalam University, Indore";
include 'header.php'; 

$committeeMembers = [
    ['name' => 'Dr. Revathi A Gupta', 'role' => 'Chairman', 'desig' => 'Professor & Principal', 'dept' => 'Institute of Pharmacy (IOP)', 'mobile' => '+91 96304 51561'],
    ['name' => 'Dr. Jagdish Chandra Sharma', 'role' => 'Member', 'desig' => 'Principal', 'dept' => 'Education (B.Ed), COPS', 'mobile' => '+91 94138 07703'],
    ['name' => 'Dr. Prashant Kumar Shrivastava', 'role' => 'Member', 'desig' => 'Professor & Principal', 'dept' => 'College of Pharmacy & Engg (COPE)', 'mobile' => '+91 94798 00100'],
    ['name' => 'Dr. Amit Modi', 'role' => 'Member', 'desig' => 'Principal', 'dept' => 'College of Pharmacy (COP)', 'mobile' => '+91 89895 48889'],
    ['name' => 'Dr. Sandeep Singh Senger', 'role' => 'Member', 'desig' => 'Principal', 'dept' => 'College of Engineering (COE)', 'mobile' => '+91 94128 77330'],
    ['name' => 'Dr. Aparna Tripathi', 'role' => 'Member', 'desig' => 'Assistant Professor', 'dept' => 'Geography, COPS', 'mobile' => '+91 98973 92802']
];
?>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="incubation-center.php">Research</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">R&amp;D Committee</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> RESEARCH GOVERNANCE & INNOVATION
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Research &amp; Development (R&amp;D) Committee
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Research Integrity, Seed Grants &amp; Academic Inventions
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
                                <i class="fa-solid fa-flask-vial"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Steering University Research &amp; Scholarly Pursuit</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    The Research &amp; Development (R&amp;D) Committee is the apex governing body responsible for setting research policies, awarding faculty seed research grants, ensuring ethical research standards, guiding doctoral scholars, and promoting high-impact scientific publications.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Committee Members Roster -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-users"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">R&amp;D Committee Members Roster</h3>
                            </div>
                            <span class="badge bg-gold text-dark fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.75rem;">Statutory Committee</span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Members Name</th>
                                        <th style="width: 140px;">Committee Role</th>
                                        <th>Designation</th>
                                        <th>Dept. / Institute</th>
                                        <th style="width: 160px;">Contact No.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($committeeMembers as $m): ?>
                                    <tr>
                                        <td><span class="fw-bold text-primary"><?php echo htmlspecialchars($m['name']); ?></span></td>
                                        <td>
                                            <span class="badge <?php echo ($m['role'] === 'Chairman') ? 'bg-primary text-white' : 'bg-light text-dark border'; ?>">
                                                <?php echo htmlspecialchars($m['role']); ?>
                                            </span>
                                        </td>
                                        <td><?php echo htmlspecialchars($m['desig']); ?></td>
                                        <td><?php echo htmlspecialchars($m['dept']); ?></td>
                                        <td><span class="font-monospace small text-muted-custom fw-semibold"><?php echo htmlspecialchars($m['mobile']); ?></span></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Mandates & Core Objectives -->
                    <div class="feature-info-card p-4 p-md-4.5 mb-4">
                        <div class="d-flex align-items-center gap-3 mb-3 pb-2.5 border-bottom border-custom">
                            <div class="feature-icon-badge">
                                <i class="fa-solid fa-list-check"></i>
                            </div>
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-0">Core Functions &amp; Research Promotion</h4>
                        </div>
                        <ul class="d-flex flex-column gap-2.5 mb-0 ps-0 list-unstyled" style="color: #3e3233; line-height: 1.7; font-size: 0.92rem;">
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>University Seed Grants:</strong> Disbursing internal seed grants to encourage early-career faculty to initiate innovative pilot research investigations.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Ethics &amp; Anti-Plagiarism Compliance:</strong> Mandatory Turnitin / Urkund plagiarism checks and Bioethics committee approvals for medical/pharma trials.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Facilitating Sponsored Extra-Mural Grants:</strong> Guiding researchers to secure project funding from DST, SERB, ICMR, AICTE, and CSIR.</span>
                            </li>
                        </ul>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <?php include "research-sidebar.php"; ?>
            </div>

        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
