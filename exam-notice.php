<?php 
$pageTitle = "Examination Notices & Circulars - Dr. APJ Abdul Kalam University, Indore";
include 'header.php'; 

// Fetch notices from DB
$notices = [
    ['title' => 'End Term Examination Schedule & Form Submission Notice 2026', 'date' => '15 August 2026', 'ref' => 'AKU/EXAM/2026/108', 'type' => 'Datesheet / Exam Form'],
    ['title' => 'Important Notification: Submission of Transfer Certificate (TC) & Migration Certificate', 'date' => '02 August 2026', 'ref' => 'AKU/REG/2026/094', 'type' => 'Student Section'],
    ['title' => 'Practical Examination & Viva-Voce Schedule for Engineering & Pharmacy', 'date' => '28 July 2026', 'ref' => 'AKU/EXAM/2026/089', 'type' => 'Practical Exam'],
    ['title' => 'Commencement of Even Semester Revaluation & Retotalling Application Window', 'date' => '10 July 2026', 'ref' => 'AKU/EXAM/2026/081', 'type' => 'Revaluation'],
    ['title' => 'DigiLocker NAD National Academic Depository Certificate Synchronization', 'date' => '24 June 2026', 'ref' => 'AKU/NAD/2026/065', 'type' => 'Academic Depository'],
    ['title' => 'Notice regarding Admit Card Generation for Backlog / Ex-Students', 'date' => '12 June 2026', 'ref' => 'AKU/EXAM/2026/054', 'type' => 'Admit Card']
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
            <span class="text-gold fw-medium">Exam Notices</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> OFFICIAL CIRCULARS & NOTIFICATIONS
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 900px; line-height: 1.15;">
            Examination Notices
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Official Controller of Examination Bulletins
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
                                <i class="fa-solid fa-bullhorn"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Official Controller of Examinations Bulletins</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.7;">
                                    All official notifications regarding examination datesheets, hall ticket distributions, revaluation deadlines, practical examinations, and convocation schedules are published here.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Search Input Box -->
                    <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs mb-4">
                        <div class="row g-2 align-items-center">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-custom"><i class="fa-solid fa-search text-muted-custom"></i></span>
                                    <input type="text" class="form-control border-custom" id="noticeSearchInput" placeholder="Quick search notices (e.g. End Term, Revaluation, Admit Card)...">
                                </div>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <a href="examination-calendar.php" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold" style="font-size: 0.82rem;">
                                    <i class="fa-solid fa-calendar-days me-1"></i> View Datesheets
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Notices List Table -->
                    <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white mb-4">
                        <table class="luxury-table table table-hover mb-0" id="noticesTable">
                            <thead>
                                <tr>
                                    <th style="width: 140px;">Publish Date</th>
                                    <th>Subject / Notification Title</th>
                                    <th style="width: 150px;">Category</th>
                                    <th style="width: 110px;" class="text-end">Notice</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($notices as $n): ?>
                                <tr class="notice-row">
                                    <td>
                                        <div class="d-flex align-items-center gap-1.5 small text-primary fw-bold font-monospace">
                                            <i class="fa-regular fa-calendar-check text-gold"></i>
                                            <span><?php echo htmlspecialchars($n['date']); ?></span>
                                        </div>
                                        <span class="small text-muted-custom" style="font-size: 0.72rem;"><?php echo htmlspecialchars($n['ref']); ?></span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-primary d-block notice-title mb-0.5"><?php echo htmlspecialchars($n['title']); ?></span>
                                        <span class="small text-muted-custom">Office of the Controller of Examinations</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border" style="font-size: 0.75rem;"><?php echo htmlspecialchars($n['type']); ?></span>
                                    </td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" onclick="alert('Notification: <?php echo addslashes($n['title']); ?>');" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">
                                            <i class="fa-solid fa-eye me-1"></i> View
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Notice Help Strip -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs">
                        <div class="d-flex align-items-center gap-3.5">
                            <div class="intro-highlight-badge" style="width: 52px; height: 52px; font-size: 1.25rem;">
                                <i class="fa-solid fa-envelope-open-text"></i>
                            </div>
                            <div>
                                <h4 class="font-serif text-primary fs-6 fw-bold mb-0.5">Need Archived Academic Circulars?</h4>
                                <p class="text-muted-custom small mb-0">Visit the Central University Notice Board for campus administrative orders.</p>
                            </div>
                        </div>
                        <a href="notice-board.php" class="btn btn-sm btn-gold-pill px-4 py-2 fw-bold">
                            <i class="fa-solid fa-chalkboard-user me-1.5"></i> General Notice Board
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('noticeSearchInput');
    const noticeRows = document.querySelectorAll('.notice-row');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            noticeRows.forEach(row => {
                const title = row.querySelector('.notice-title').innerText.toLowerCase();
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
