<?php 
$pageTitle = "Official Notice Board - Dr. APJ Abdul Kalam University, Indore";
include "header.php"; 

$notices = [
    ["title" => "Centre for Sanskrit Learning – Now Open at Campus", "category" => "Academic Notice", "date" => "20 Aug 2026", "pdf" => "uploads/2025/08/Centre-for-Sanskrit-Learning.pdf"],
    ["title" => "Notice for Submission of Mandatory Eligibility Documents for Session 2026-27", "category" => "Admissions", "date" => "18 Aug 2026", "pdf" => "uploads/2025/08/Notice-for-Submission-Documents.pdf"],
    ["title" => "Registration for Inter-College Khel Mahotsav & Annual Sports Meet 2026", "category" => "Sports & Events", "date" => "15 Aug 2026", "pdf" => "uploads/2025/08/Sports-Meet-Notice.pdf"],
    ["title" => "National Scholarship Portal (NSP) & Post-Matric Application Deadline", "category" => "Scholarship", "date" => "10 Aug 2026", "pdf" => "uploads/2025/08/Scholarship-Deadline.pdf"],
    ["title" => "Semester Revaluation & Retotaling Application Windows Announced", "category" => "Examinations", "date" => "05 Aug 2026", "pdf" => "uploads/2025/08/Revaluation-Notice.pdf"],
    ["title" => "Bus Route Schedule & Transport Pass Renewal for Odd Semester 2026", "category" => "Transport", "date" => "01 Aug 2026", "pdf" => "uploads/2025/08/Transport-Schedule.pdf"]
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
            <span class="text-gold fw-medium">Notice Board</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> OFFICIAL ANNOUNCEMENTS
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Official Student Notice Board
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Real-Time Academic, Examination &amp; Campus Circulars
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
                                <i class="fa-solid fa-bell"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Central University Circulars &amp; Updates</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Stay updated with the latest institutional notices, examination schedules, fee deadlines, holiday declarations, scholarship alerts, and campus events.
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
                                    <input type="text" class="form-control border-custom" id="noticeSearchInput" placeholder="Quick search notices (e.g. Scholarship, Bus, Sanskrit, Exam)...">
                                </div>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <span class="badge bg-gold text-dark fw-bold px-3 py-2 rounded-pill w-100 w-md-auto">
                                    <i class="fa-solid fa-clock-rotate-left me-1"></i> Active Circulars 2026
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Notices Table -->
                    <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white mb-5">
                        <table class="luxury-table table table-hover mb-0" id="noticesTable">
                            <thead>
                                <tr>
                                    <th>Circular / Notification Subject</th>
                                    <th style="width: 160px;">Category</th>
                                    <th style="width: 130px;">Publish Date</th>
                                    <th style="width: 110px;" class="text-end">Document</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($notices as $n): ?>
                                <tr class="notice-row">
                                    <td>
                                        <div class="d-flex align-items-center gap-2.5">
                                            <i class="fa-solid fa-file-pdf text-danger fs-5 flex-shrink-0"></i>
                                            <div>
                                                <a href="<?php echo htmlspecialchars($n['pdf']); ?>" target="_blank" class="fw-bold text-primary text-decoration-none d-block notice-title">
                                                    <?php echo htmlspecialchars($n['title']); ?>
                                                </a>
                                                <span class="small text-muted-custom">Authorized by Registrar Office</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border" style="font-size: 0.75rem;"><?php echo htmlspecialchars($n['category']); ?></span>
                                    </td>
                                    <td>
                                        <span class="small text-primary font-monospace fw-semibold"><?php echo htmlspecialchars($n['date']); ?></span>
                                    </td>
                                    <td class="text-end">
                                        <a href="<?php echo htmlspecialchars($n['pdf']); ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">
                                            <i class="fa-solid fa-download me-1"></i> PDF
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="feature-info-card p-4 p-md-4.5 mb-4">
                        <div class="d-flex align-items-center gap-3 mb-3 pb-2.5 border-bottom border-custom">
                            <div class="feature-icon-badge">
                                <i class="fa-solid fa-circle-info"></i>
                            </div>
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-0">Important Guidelines for Students</h4>
                        </div>
                        <ul class="d-flex flex-column gap-2.5 mb-0 ps-0 list-unstyled" style="color: #3e3233; line-height: 1.7; font-size: 0.92rem;">
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span>Students are advised to check the official notice board and their registered ERP portal daily for urgent academic circulars.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2.5">
                                <i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i>
                                <span>All downloadable PDF circulars carry official reference numbers issued under the authority of the Registrar / COE.</span>
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

<script>
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("noticeSearchInput");
    const rows = document.querySelectorAll(".notice-row");
    if (searchInput) {
        searchInput.addEventListener("input", function() {
            const query = this.value.toLowerCase().trim();
            rows.forEach(row => {
                const title = row.querySelector(".notice-title").innerText.toLowerCase();
                const cat = row.querySelector(".badge").innerText.toLowerCase();
                if (title.includes(query) || cat.includes(query)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    }
});
</script>

<?php include "footer.php"; ?>