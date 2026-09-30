<?php 
require_once "db.php";

// If a specific department is passed, forward to department-view.php
if (!empty($_GET['dept'])) {
    require_once __DIR__ . '/department-view.php';
    exit;
}

$pageTitle = "University Activities & Academic Events - Dr. APJ Abdul Kalam University, Indore";
include "header.php"; 

// Fetch dynamic events from DB
$events = [];
try {
    $stmt = $pdo->query("SELECT * FROM events ORDER BY event_date DESC, id DESC");
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {}
?>

<!-- Inner Page Luxury Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="programs.php">Academics</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Activities &amp; Events</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> CAMPUS ENGAGEMENT &amp; SEMINARS
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            University Academic Activities &amp; Events
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · National Symposia, Technical Hackathons &amp; Academic Conclaves
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
                                <i class="fa-solid fa-calendar-star"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Vibrant Campus Co-Curriculars</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Beyond classroom instruction, Dr. A.P.J. Abdul Kalam University buzzes with academic conclaves, technical hackathons, legal seminars, pharmacy workshops, and national symposia that build leadership, creativity, and interdisciplinary problem-solving skills.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Events Directory -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-bullhorn"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Recent Academic Symposia &amp; Activities</h3>
                            </div>
                            <span class="custom-badge-pill">
                                <i class="fa-solid fa-calendar-days text-gold me-1.5"></i> <?php echo count($events); ?> Recorded Events
                            </span>
                        </div>

                        <div class="d-flex flex-column gap-4">
                            <?php if (!empty($events)): ?>
                                <?php foreach ($events as $ev): 
                                    $formattedDate = !empty($ev['event_date']) ? date('F d, Y', strtotime($ev['event_date'])) : 'Academic Session';
                                ?>
                                <div class="p-4 rounded-4 border border-custom bg-white shadow-xs hover-shadow transition-all">
                                    <div class="d-flex align-items-start justify-content-between flex-wrap gap-2 mb-2 pb-2 border-bottom border-custom">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge bg-gold text-dark fw-bold px-2.5 py-1" style="font-size: 0.72rem;">
                                                <i class="fa-regular fa-calendar me-1"></i> <?php echo htmlspecialchars($formattedDate); ?>
                                            </span>
                                            <?php if (!empty($ev['venue'])): ?>
                                            <span class="badge bg-light text-primary border small px-2.5 py-1" style="font-size: 0.72rem;">
                                                <i class="fa-solid fa-location-dot me-1 text-gold"></i> <?php echo htmlspecialchars($ev['venue']); ?>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <span class="small text-muted font-monospace" style="font-size: 0.75rem;">University Activity</span>
                                    </div>

                                    <h3 class="font-serif text-primary fs-5 fw-bold mb-2.5" style="line-height: 1.35;">
                                        <?php echo htmlspecialchars($ev['title']); ?>
                                    </h3>

                                    <div class="inner-page-body-text small text-muted-custom" style="line-height: 1.7; font-size: 0.88rem;">
                                        <?php echo $ev['content']; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="p-4 rounded-4 bg-white border border-custom text-center text-muted">
                                    <p class="mb-0">Activities are updated regularly by departmental coordinators.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Contact Inquiries Footer Box -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mt-5">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Need More Information?</h5>
                            <p class="small text-muted-custom mb-0">For statutory documentation or academic queries regarding Activities, reach out to the Registrar Office.</p>
                        </div>
                        <a href="contact-us.php" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold">
                            <i class="fa-solid fa-headset me-1"></i> Contact Registrar
                        </a>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <?php include "faculty-sidebar.php"; ?>
            </div>

        </div>
    </div>
</main>

<?php include "footer.php"; ?>
