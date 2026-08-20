<?php 
$pageTitle = "Alumni Relations Committee - Dr. APJ Abdul Kalam University, Indore";
include "header.php"; 

$alumniMembers = [
    ["name" => "Mr. Anil Mishra", "role" => "Chairman", "desig" => "Head – Training & Placement", "dept" => "T&P Cell", "mobile" => "+91 93032 08503"],
    ["name" => "Mr. Satyaprakash Tiwari", "role" => "Member", "desig" => "Assistant Professor", "dept" => "College of Engineering", "mobile" => "+91 76102 63818"],
    ["name" => "Mr. Dilip Batham", "role" => "Member", "desig" => "Assistant Registrar", "dept" => "Central Administration", "mobile" => "+91 78692 92542"],
    ["name" => "Mr. Santosh Jadav", "role" => "Member", "desig" => "Scholarship Head", "dept" => "Administration", "mobile" => "+91 98264 96911"],
    ["name" => "Mr. Manohar Verma", "role" => "Member", "desig" => "IT Systems Manager", "dept" => "Central IT Cell", "mobile" => "+91 97542 21100"]
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
            <span class="text-gold fw-medium">Alumni Committee</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> LIFELONG ALUMNI NETWORK
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Alumni Relations Committee
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Fostering Global Alumni Connect, Mentorship &amp; Homecoming
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
                                <i class="fa-solid fa-users-line"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Connecting 20,000+ Proud Kalam University Alumni</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    The Alumni Relations Committee bridges university graduates thriving in leading MNCs, government civil services, research laboratories, and entrepreneurship globally with current students for mentorship, internships, and networking.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Members Table -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-users"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Alumni Committee Members Roster</h3>
                            </div>
                            <span class="badge bg-gold text-dark fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.75rem;">Official Committee</span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Members Name</th>
                                        <th style="width: 140px;">Role</th>
                                        <th>Designation</th>
                                        <th>Dept. / Representation</th>
                                        <th style="width: 160px;">Contact No.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($alumniMembers as $m): ?>
                                    <tr>
                                        <td><span class="fw-bold text-primary"><?php echo htmlspecialchars($m['name']); ?></span></td>
                                        <td><span class="badge <?php echo ($m['role'] === 'Chairman') ? 'bg-primary text-white' : 'bg-light text-dark border'; ?>"><?php echo htmlspecialchars($m['role']); ?></span></td>
                                        <td><?php echo htmlspecialchars($m['desig']); ?></td>
                                        <td><?php echo htmlspecialchars($m['dept']); ?></td>
                                        <td><span class="font-monospace small text-muted-custom fw-semibold"><?php echo htmlspecialchars($m['mobile']); ?></span></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Alumni Initiatives -->
                    <div class="feature-info-card p-4 p-md-4.5 mb-4">
                        <div class="d-flex align-items-center gap-3 mb-3 pb-2.5 border-bottom border-custom">
                            <div class="feature-icon-badge">
                                <i class="fa-solid fa-handshake"></i>
                            </div>
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-0">Alumni Association Key Programs</h4>
                        </div>
                        <ul class="d-flex flex-column gap-2.5 mb-0 ps-0 list-unstyled" style="color: #3e3233; line-height: 1.7; font-size: 0.92rem;">
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Annual Alumni Homecoming &amp; Sammelan:</strong> Grand annual alumni reunion bringing together graduates across all batches.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Alumni-to-Student Mentorship:</strong> Direct career guidance sessions and mock technical interviews with senior alumni in senior tech/pharma roles.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span><strong>Alumni Innovation Endowment Fund:</strong> Supporting student startup ideas and granting scholarships for needy deserving scholars.</span>
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