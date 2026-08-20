<?php 
$pageTitle = "SC / ST Welfare Committee - Dr. APJ Abdul Kalam University, Indore";
include "header.php"; 

$scstMembers = [
    ["name" => "Dr. Anil Malviya", "role" => "Chairman", "desig" => "Associate Professor", "dept" => "COPS", "mobile" => "+91 96910 92741"],
    ["name" => "Ms. Kratika Koul", "role" => "Member", "desig" => "Assistant Professor", "dept" => "College of Engineering", "mobile" => "+91 75808 05881"],
    ["name" => "Dr. Sugan Alawa", "role" => "Member", "desig" => "Assistant Professor", "dept" => "RNKMAMC&H (Ayurveda)", "mobile" => "+91 98930 07876"],
    ["name" => "Ms. Chetna Malviya", "role" => "Member", "desig" => "Assistant Professor", "dept" => "School of Pharmacy (SOP)", "mobile" => "+91 78792 87465"],
    ["name" => "Mr. Salim Shaikh", "role" => "Member", "desig" => "Assistant Professor", "dept" => "Civil Engineering, SOE", "mobile" => "+91 90988 64887"],
    ["name" => "Dr. Swati Rai", "role" => "Member", "desig" => "Assistant Professor", "dept" => "RNKMHH&MC (Homeopathy)", "mobile" => "+91 79995 51305"]
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
            <span class="text-gold fw-medium">SC/ST Committee</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> EQUAL OPPORTUNITY &amp; SOCIAL JUSTICE
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            SC / ST Welfare Committee
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Prevention of Atrocities &amp; Scholarship Facilitation
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
                                <i class="fa-solid fa-hands-holding-child"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Promoting Inclusivity &amp; Safeguarding SC/ST Rights</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Constituted pursuant to the Scheduled Castes and the Scheduled Tribes (Prevention of Atrocities) Act, 1989 and UGC guidelines, this cell ensures an inclusive, discrimination-free environment and seamless distribution of government welfare scholarships.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Members Table -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-users"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">SC / ST Committee Members Roster</h3>
                            </div>
                            <span class="badge bg-gold text-dark fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.75rem;">Official Committee</span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Members Name</th>
                                        <th style="width: 150px;">Committee Role</th>
                                        <th>Designation</th>
                                        <th>Dept. / Institute</th>
                                        <th style="width: 160px;">Contact No.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($scstMembers as $m): ?>
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

                    <!-- Mandates -->
                    <div class="feature-info-card p-4 p-md-4.5 mb-4">
                        <div class="d-flex align-items-center gap-3 mb-3 pb-2.5 border-bottom border-custom">
                            <div class="feature-icon-badge">
                                <i class="fa-solid fa-list-check"></i>
                            </div>
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-0">Cell Mandates &amp; Welfare Initiatives</h4>
                        </div>
                        <ul class="d-flex flex-column gap-2.5 mb-0 ps-0 list-unstyled" style="color: #3e3233; line-height: 1.7; font-size: 0.92rem;">
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Scholarship Facilitation:</strong> Assisting students with online applications for State Post-Matric and Central Tribal Affairs scholarships.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Remedial Coaching:</strong> Conducting free extra classes and communication coaching for students from underprivileged backgrounds.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Zero Discrimination Policy:</strong> Strict grievance investigation against any form of caste-based bias or harassment.</span>
                            </li>
                        </ul>
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