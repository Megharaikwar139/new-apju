<?php 
$pageTitle = "Examination Board - Dr. APJ Abdul Kalam University, Indore";
require_once "db.php";
include "header.php"; 

$boardMembers = [
    [
        'name' => 'Hon\'ble Vice Chancellor',
        'role' => 'Chairperson',
        'designation' => 'Vice Chancellor',
        'affiliation' => 'Executive Head, Dr. APJ Abdul Kalam University'
    ],
    [
        'name' => 'Dr. Rahul Mishra',
        'role' => 'Member Secretary',
        'designation' => 'Controller of Examinations (COE)',
        'affiliation' => 'Office of Controller of Examinations'
    ],
    [
        'name' => 'Dr. Sandeep Singh Senger',
        'role' => 'Member (Engineering)',
        'designation' => 'Dean & Principal',
        'affiliation' => 'College of Engineering (COE)'
    ],
    [
        'name' => 'Dr. Revathi A. Gupta',
        'role' => 'Member (Pharmacy)',
        'designation' => 'Dean & Principal',
        'affiliation' => 'Institute of Pharmacy (IOP)'
    ],
    [
        'name' => 'Dr. Rakesh Kumar Jatav',
        'role' => 'Member (Pharmacy)',
        'designation' => 'Principal',
        'affiliation' => 'School of Pharmacy (SOP)'
    ],
    [
        'name' => 'Dr. Jagdish Chandra Sharma',
        'role' => 'Member (Education)',
        'designation' => 'Principal',
        'affiliation' => 'Faculty of Education'
    ],
    [
        'name' => 'Dean, Faculty of Management',
        'role' => 'Member (Management)',
        'designation' => 'Professor & Dean',
        'affiliation' => 'School of Business Administration'
    ],
    [
        'name' => 'External Academic Expert 1',
        'role' => 'External Nominee',
        'designation' => 'Professor & Former COE',
        'affiliation' => 'State University Examination Expert'
    ],
    [
        'name' => 'External Academic Expert 2',
        'role' => 'External Nominee',
        'designation' => 'Senior Academician',
        'affiliation' => 'Technical Education Assessment Board'
    ]
];

$boardFunctions = [
    [
        'title' => 'Formulation of Examination Ordinances',
        'desc' => 'Approves and amends ordinances, examination codes, moderation rules, and grading policies governing all undergraduate, postgraduate, and doctoral degree examinations.'
    ],
    [
        'title' => 'Scrutiny and Approval of Examination Results',
        'desc' => 'Receives, reviews, and formally approves tabulated results, pass percentages, merit ranks, and award of university gold medals prior to official gazette publication.'
    ],
    [
        'title' => 'Appointment of Board of Examiners',
        'desc' => 'Finalizes panels of paper setters, chief examiners, external viva-voce evaluators, and thesis review committees maintaining strict confidentiality.'
    ],
    [
        'title' => 'Examination Malpractice & Discipline Oversight',
        'desc' => 'Serves as the apex appellate authority for cases investigated by the Unfair Means Committee (UFM), ensuring just and impartial disciplinary action.'
    ]
];
?>

<!-- Inner Page Luxury Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="about-the-section.php">Examinations</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Examination Board</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> STATUTORY ACADEMIC GOVERNANCE
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            University Board of Examinations
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Apex Statutory Authority for Examination Sanction &amp; Academic Integrity
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
                                <i class="fa-solid fa-sitemap"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Apex Examination Authority</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Constituted in accordance with the statutory provisions and university ordinances of Dr. A.P.J. Abdul Kalam University, the <strong>Board of Examinations</strong> is the apex governing body responsible for setting assessment standards, upholding evaluation sanctity, approving examination results, and guiding the Office of the Controller of Examinations.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Board of Examinations Roster Table -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-users"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Board of Examinations Composition</h3>
                            </div>
                            <span class="custom-badge-pill">
                                <i class="fa-solid fa-shield-check text-gold me-1.5"></i> Statutory Roster
                            </span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 55px;" class="text-center">#</th>
                                        <th>Name &amp; Designation</th>
                                        <th>Role in Board</th>
                                        <th style="width: 200px;">Affiliation / Department</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($boardMembers as $idx => $m): ?>
                                    <tr>
                                        <td class="text-center font-monospace fw-bold text-primary"><?php echo sprintf('%02d', $idx + 1); ?></td>
                                        <td>
                                            <div class="fw-bold text-primary" style="font-size: 0.93rem;">
                                                <?php echo htmlspecialchars($m['name']); ?>
                                            </div>
                                            <span class="small text-muted-custom"><?php echo htmlspecialchars($m['designation']); ?></span>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-primary border small px-2.5 py-1.5 fw-semibold">
                                                <?php echo htmlspecialchars($m['role']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="small text-dark fw-medium"><?php echo htmlspecialchars($m['affiliation']); ?></span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Statutory Functions & Powers -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-gavel"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Powers &amp; Statutory Responsibilities</h3>
                            </div>
                            <span class="custom-badge-pill">
                                <i class="fa-solid fa-book-bookmark text-primary me-1.5"></i> Ordinance Charter
                            </span>
                        </div>

                        <div class="row g-3.5">
                            <?php foreach ($boardFunctions as $fn): ?>
                            <div class="col-md-6">
                                <div class="p-4 rounded-4 border border-custom bg-white shadow-xs h-100 hover-shadow transition-all">
                                    <h4 class="font-serif text-primary fs-6 fw-bold mb-2 d-flex align-items-center gap-2">
                                        <i class="fa-solid fa-circle-check text-gold fs-6"></i>
                                        <?php echo htmlspecialchars($fn['title']); ?>
                                    </h4>
                                    <p class="text-muted-custom small mb-0" style="line-height: 1.6; font-size: 0.88rem;">
                                        <?php echo htmlspecialchars($fn['desc']); ?>
                                    </p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Quick Examination Help Box -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mt-5">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Need More Information?</h5>
                            <p class="small text-muted-custom mb-0">For statutory documentation or academic queries regarding Examination Board, reach out to the Controller Office.</p>
                        </div>
                        <a href="contact-us.php" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold">
                            <i class="fa-solid fa-headset me-1"></i> Contact Examination Cell
                        </a>
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

<?php include "footer.php"; ?>
