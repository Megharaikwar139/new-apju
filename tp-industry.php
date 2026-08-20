<?php 
$pageTitle = "Industry Linkage & Placement Committee - Dr. APJ Abdul Kalam University, Indore";
include 'header.php'; 

$committeeMembers = [
    ['name' => 'Dr. Rajeev G. Vishwakarma', 'role' => 'Chairman', 'desig' => 'Pro Vice-Chancellor', 'dept' => 'University Leadership', 'mobile' => '+91 87705 47193'],
    ['name' => 'Dr. Sandeep Singh Senger', 'role' => 'Member', 'desig' => 'Principal', 'dept' => 'College of Engineering (COE)', 'mobile' => '+91 94128 77330'],
    ['name' => 'Mr. Anil Mishra', 'role' => 'Member Secretary', 'desig' => 'Head – Training & Placement', 'dept' => 'T&P Central Cell', 'mobile' => '+91 93032 08503'],
    ['name' => 'Ms. Sneha Singh', 'role' => 'Member', 'desig' => 'Assistant Professor', 'dept' => 'College of Pharmacy (COP)', 'mobile' => '+91 76969 60386']
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
            <span class="text-gold fw-medium">Industry Linkage Committee</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> INDUSTRY-ACADEMIA ALLIANCE
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Industry Linkage &amp; Advisory Committee
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Strategic Corporate Partnerships, MoUs &amp; Placements
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
                                <i class="fa-solid fa-users-gear"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Bridging Academia with Corporate Sectors</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    The Industry Linkage Committee is the apex strategic body that steers corporate tie-ups, signs bilateral MoUs, invites visiting corporate faculty, organizes industry roundtables, and aligns university syllabi with dynamic industrial workforce requirements.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Members Roster Table -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-users"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Industry Linkage Committee Roster</h3>
                            </div>
                            <span class="badge bg-gold text-dark fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.75rem;">Official Committee</span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Members Name</th>
                                        <th style="width: 160px;">Committee Role</th>
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

                    <!-- Core Functions -->
                    <div class="feature-info-card p-4 p-md-4.5 mb-4">
                        <div class="d-flex align-items-center gap-3 mb-3 pb-2.5 border-bottom border-custom">
                            <div class="feature-icon-badge">
                                <i class="fa-solid fa-handshake-angle"></i>
                            </div>
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-0">Strategic Goals &amp; Functions</h4>
                        </div>
                        <ul class="d-flex flex-column gap-2.5 mb-0 ps-0 list-unstyled" style="color: #3e3233; line-height: 1.7; font-size: 0.92rem;">
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Fostering Bilateral Corporate MoUs:</strong> Establishing formal partnerships with industrial leaders in IT, pharma, automotive, and power sectors.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Curriculum Alignment with Emerging Tech:</strong> Integrating industry-certified modules (AI, EV Technology, Clinical Data Management) into semester courses.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Coordinating Joint R&amp;D &amp; Consultancy:</strong> Facilitating sponsored industrial research projects and faculty-led technical consultancy.</span>
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

<?php include 'footer.php'; ?>
