<?php 
$pageTitle = "Students Grievance Redressal Committee (SGRC) - Dr. APJ Abdul Kalam University";
include "header.php"; 

$sgrcMembers = [
    ["name" => "Dr. Rajeev G. Vishwakarma", "role" => "Chairman", "desig" => "Pro Vice-Chancellor", "dept" => "University Leadership", "mobile" => "+91 87705 47193"],
    ["name" => "Dr. Sandeep Singh Senger", "role" => "Member (Senior Professor)", "desig" => "Principal", "dept" => "College of Engineering", "mobile" => "+91 94128 77330"],
    ["name" => "Dr. Revathi A Gupta", "role" => "Member (Senior Professor)", "desig" => "Principal", "dept" => "Institute of Pharmacy", "mobile" => "+91 96304 51561"],
    ["name" => "Dr. Rakesh Kumar Jatav", "role" => "Member (Senior Professor)", "desig" => "Principal", "dept" => "School of Pharmacy", "mobile" => "+91 98934 07818"],
    ["name" => "Special Invitee (Student Rep)", "role" => "Student Nominee", "desig" => "Merit Scholar Representative", "dept" => "Student Body", "mobile" => "Student Wing"]
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
            <span class="text-gold fw-medium">SGRC</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> UGC REDRESSAL OF GRIEVANCES REGULATIONS 2023
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Students Grievance Redressal Committee (SGRC)
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Apex Statutory Appellate Body &amp; University Ombudsperson
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
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Apex Grievance Redressal &amp; Ombudsperson Framework</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    In strict compliance with the <strong>University Grants Commission (Redressal of Grievances of Students) Regulations, 2023</strong>, Dr. A.P.J. Abdul Kalam University has constituted the apex Students Grievance Redressal Committee (SGRC) to provide impartial, high-level redressal of unresolved student grievances.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Members Table -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-gavel"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">SGRC Statutory Committee Roster</h3>
                            </div>
                            <span class="badge bg-gold text-dark fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.75rem;">UGC Gazetted Body</span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Members Name</th>
                                        <th style="width: 170px;">SGRC Role</th>
                                        <th>Designation</th>
                                        <th>Dept. / Representation</th>
                                        <th style="width: 160px;">Contact No.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($sgrcMembers as $m): ?>
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

                    <!-- Official Document Download -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mb-4">
                        <div class="d-flex align-items-center gap-3.5">
                            <div class="intro-highlight-badge" style="width: 52px; height: 52px; font-size: 1.25rem;">
                                <i class="fa-solid fa-file-contract"></i>
                            </div>
                            <div>
                                <h4 class="font-serif text-primary fs-6 fw-bold mb-0.5">Official SGRC Statutory Notification</h4>
                                <p class="text-muted-custom small mb-0">Official University Order on SGRC constitution and Ombudsperson appointment.</p>
                            </div>
                        </div>
                        <a href="uploads/2026/03/SGRC-Order.pdf" target="_blank" class="btn btn-sm btn-gold-pill px-4 py-2 fw-bold">
                            <i class="fa-solid fa-file-pdf me-1.5"></i> Download SGRC Order
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

<?php include "footer.php"; ?>