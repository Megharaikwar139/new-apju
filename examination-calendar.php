<?php 
$pageTitle = "Examination Schedule & Datesheets - Dr. APJ Abdul Kalam University, Indore";
include 'header.php'; 

$schedules = [
    'Diploma Engineering & Pharmacy' => [
        ['title' => 'POLY PT EE II SEM REG AND EX JUNE 2026', 'file' => 'uploads/2026/08/POLY-PT-EE-II-SEM-REG-AND-EX-JUNE-2026.pdf', 'level' => 'Diploma'],
        ['title' => 'POLY PT EE I SEM EX JUNE 2026', 'file' => 'uploads/2026/08/POLY-PT-EE-I-SEM-EX-JUNE-2026.pdf', 'level' => 'Diploma'],
        ['title' => 'POLY PT AE II SEM REG AND EX JUNE 2026', 'file' => 'uploads/2026/08/POLY-PT-AE-II-SEM-REG-AND-EX-JUNE-2026.pdf', 'level' => 'Diploma'],
        ['title' => 'POLY PT AE I SEM EX JUNE 2026', 'file' => 'uploads/2026/08/POLY-PT-AE-I-SEM-EX-JUNE-2026.pdf', 'level' => 'Diploma'],
        ['title' => 'POLY II SEM REG JUNE 2026 BATCH 2025', 'file' => 'uploads/2026/08/POLY-II-SEM-REG-JUNE-BATCH-2025.pdf', 'level' => 'Diploma'],
        ['title' => 'POLY II SEM REG AND EX JUNE 2026', 'file' => 'uploads/2026/08/POLY-II-SEM-REG-AND-EX-JUNE-2026.pdf', 'level' => 'Diploma'],
        ['title' => 'POLY I SEM EX JUNE 2026', 'file' => 'uploads/2026/08/POLY-I-SEM-EX-JUNE-2026.pdf', 'level' => 'Diploma'],
        ['title' => 'POLY I SEM EX JUNE 2026 BATCH 2025', 'file' => 'uploads/2026/08/POLY-I-SEM-EX-JUNE-2026-BATCH-2025.pdf', 'level' => 'Diploma'],
    ],
    'Undergraduate (UG) Programs' => [
        ['title' => 'BE II SEM REG JUNE 2026 BATCH 2025', 'file' => 'uploads/2026/08/BE-II-SEM-REG-JUNE-2026-BATCH-2025.pdf', 'level' => 'UG'],
        ['title' => 'BE II SEM REG AND EX JUNE 2026', 'file' => 'uploads/2026/08/BE-II-SEM-REG-AND-EX-JUNE-2026.pdf', 'level' => 'UG'],
        ['title' => 'BE I SEM EX JUNE 2026', 'file' => 'uploads/2026/08/BE-I-SEM-EX-JUNE-2026.pdf', 'level' => 'UG'],
        ['title' => 'BE I SEM EX JUNE 2026 BATCH 2025', 'file' => 'uploads/2026/08/BE-I-SEM-EX-JUNE-2026-BATCH-2025.pdf', 'level' => 'UG'],
        ['title' => 'B SC AGRI II SEM REG AND EX JUNE 2026', 'file' => 'uploads/2026/08/B-SC-AGRI-II-SEM-REG-AND-EX-JUNE-2026.pdf', 'level' => 'UG'],
        ['title' => 'B PH II SEM REG AND EX JUNE 2026', 'file' => 'uploads/2026/08/B-PH-II-SEM-REG-AND-EX-JUNE-2026.pdf', 'level' => 'UG'],
        ['title' => 'B PH I SEM EX JUNE 2026', 'file' => 'uploads/2026/08/B-PH-I-SEM-EX-JUNE-2026.pdf', 'level' => 'UG'],
    ],
    'Postgraduate (PG) Programs' => [
        ['title' => 'M TECH II SEM REG JUNE 2026 BATCH 2025', 'file' => 'uploads/2026/08/M-TECH-II-SEM-REG-JUNE-2026-BATCH-2025.pdf', 'level' => 'PG'],
        ['title' => 'M TECH II SEM REG AND EX JUNE 2026', 'file' => 'uploads/2026/08/M-TECH-II-SEM-REG-AND-EX-JUNE-2026.pdf', 'level' => 'PG'],
        ['title' => 'M TECH I SEM EX JUNE 2026 BATCH 2025', 'file' => 'uploads/2026/08/M-TECH-I-SEM-EX-JUNE-2026-BATCH-2025.pdf', 'level' => 'PG'],
        ['title' => 'M TECH I SEM EX JUNE 2026', 'file' => 'uploads/2026/08/M-TECH-I-SEM-EX-JUNE-2026.pdf', 'level' => 'PG'],
        ['title' => 'M PH II SEM REG AND EX JUNE 2026', 'file' => 'uploads/2026/08/M-PH-II-SEM-REG-AND-EX-JUNE-2026.pdf', 'level' => 'PG'],
        ['title' => 'M PH I SEM EX JUNE 2026', 'file' => 'uploads/2026/08/M-PH-I-SEM-EX-JUNE-2026.pdf', 'level' => 'PG'],
    ],
];
?>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="about-the-section.php">Examinations</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Examination Schedule</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> DATESHEETS & TIMETABLES
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 900px; line-height: 1.15;">
            Examination Schedule &amp; Timetables
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Official End-Semester &amp; Backlog Time Tables
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
                                <i class="fa-solid fa-calendar-check"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Official Semester Exam Time Tables</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.7;">
                                    Download official semester examination schedules and datesheets for Diploma, Under Graduate (UG), and Post Graduate (PG) programs. Students are advised to verify their subject codes and session timings.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Filter / Search Box -->
                    <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs mb-4">
                        <div class="row g-2 align-items-center">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-custom"><i class="fa-solid fa-search text-muted-custom"></i></span>
                                    <input type="text" class="form-control border-custom" id="scheduleSearchInput" placeholder="Search by course (e.g., B.E., M.Tech, Pharmacy, Polytechnic)...">
                                </div>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <span class="badge bg-gold text-dark fw-bold px-3 py-2 rounded-pill w-100 w-md-auto">
                                    <i class="fa-regular fa-clock me-1"></i> June 2026 Session
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Schedules Groups -->
                    <?php foreach ($schedules as $groupName => $items): ?>
                    <div class="schedule-group mb-5">
                        <div class="tab-section-header mb-3 pb-2 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-file-pdf"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0"><?php echo htmlspecialchars($groupName); ?></h3>
                            </div>
                            <span class="badge bg-light text-dark border px-2.5 py-1 small"><?php echo count($items); ?> Timetables</span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white mb-3">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Examination Scheme / Branch Details</th>
                                        <th style="width: 130px;">Category</th>
                                        <th style="width: 140px;" class="text-end">Datesheet</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($items as $item): ?>
                                    <tr class="schedule-row">
                                        <td>
                                            <div class="d-flex align-items-center gap-2.5">
                                                <i class="fa-solid fa-file-pdf text-danger fs-5 flex-shrink-0"></i>
                                                <div>
                                                    <a href="<?php echo htmlspecialchars($item['file']); ?>" target="_blank" class="fw-bold text-primary text-decoration-none d-block schedule-title">
                                                        <?php echo htmlspecialchars($item['title']); ?>
                                                    </a>
                                                    <span class="small text-muted-custom">Official Signed Timetable</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark border" style="font-size: 0.75rem;"><?php echo htmlspecialchars($item['level']); ?> Program</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="<?php echo htmlspecialchars($item['file']); ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">
                                                <i class="fa-solid fa-download me-1"></i> PDF
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <?php include "exam-sidebar.php"; ?>
            </div>

        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('scheduleSearchInput');
    const scheduleRows = document.querySelectorAll('.schedule-row');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            scheduleRows.forEach(row => {
                const title = row.querySelector('.schedule-title').innerText.toLowerCase();
                if (title.includes(query)) {
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
