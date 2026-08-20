<?php 
$pageTitle = "University Events & Campus Fests - Dr. APJ Abdul Kalam University, Indore";
require_once 'db.php';
include 'header.php'; 

try {
    $events_stmt = $pdo->prepare("SELECT title AS post_title, slug AS post_name, event_date, venue, content, image_path FROM events ORDER BY event_date DESC");
    $events_stmt->execute();
    $events = $events_stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $events = [];
}
?>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="gallery.php">Campus Life</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">University Events</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> CELEBRATING ACADEMIC &amp; CULTURAL EXCELLENCE
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            University Events &amp; Celebrations
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · National Conferences, Hackathons, Fests &amp; Sports Meets
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
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Dynamic Happenings Across the Campus</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Life at Dr. A.P.J. Abdul Kalam University is bustling with round-the-year academic symposiums, robotics hackathons, pharmaceutical summits, sporting extravaganzas, and celebrity youth fests. Click on any event to view full circular details.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Events Grid -->
                    <div class="row g-4 mb-5">
                        <?php foreach ($events as $event): 
                            $date_raw = $event['event_date'] ?? '';
                            $month = $date_raw ? date('M', strtotime($date_raw)) : 'AUG';
                            $day = $date_raw ? date('d', strtotime($date_raw)) : '20';
                            $year = $date_raw ? date('Y', strtotime($date_raw)) : '2026';
                            $venue = !empty($event['venue']) ? $event['venue'] : 'Indore Campus';
                            $slug = $event['post_name'];
                            $eventUrl = "single.php?type=event&slug=" . urlencode($slug);
                            
                            $plain_text = trim(strip_tags($event['content'] ?? ''));
                            if (empty($plain_text)) {
                                $excerpt = "Click view details to explore complete schedule, speaker sessions, participation eligibility, and event circulars.";
                            } else {
                                $excerpt = mb_strimwidth($plain_text, 0, 130, "...");
                            }
                        ?>
                        <div class="col-md-6">
                            <div class="feature-info-card p-4 h-100 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="d-flex align-items-start gap-3 mb-3">
                                        <!-- Date Badge -->
                                        <div class="text-center rounded-3 p-2 bg-primary text-white flex-shrink-0" style="min-width: 60px;">
                                            <span class="font-serif fw-bold fs-4 d-block lh-1 text-gold"><?php echo $day; ?></span>
                                            <span class="small fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.08em;"><?php echo $month . ' ' . $year; ?></span>
                                        </div>
                                        <div>
                                            <span class="badge bg-light text-primary border mb-1" style="font-size: 0.7rem;">
                                                <i class="fa-solid fa-location-dot text-gold me-1"></i> <?php echo htmlspecialchars($venue); ?>
                                            </span>
                                            <h4 class="font-serif text-primary fs-6 fw-bold mb-0" style="line-height: 1.35;">
                                                <a href="<?php echo htmlspecialchars($eventUrl); ?>" class="text-primary text-decoration-none hover-gold">
                                                    <?php echo htmlspecialchars($event['post_title']); ?>
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                    <p class="small text-muted-custom mb-3" style="line-height: 1.6; font-size: 0.88rem;">
                                        <?php echo htmlspecialchars($excerpt); ?>
                                    </p>
                                </div>
                                <div class="pt-2.5 border-top border-custom d-flex align-items-center justify-content-between">
                                    <span class="badge bg-gold text-dark fw-bold px-2.5 py-1 rounded-pill" style="font-size: 0.7rem;">Event Circular</span>
                                    <a href="<?php echo htmlspecialchars($eventUrl); ?>" class="btn btn-sm btn-gold-pill px-3 py-1 fw-bold" style="font-size: 0.78rem;">
                                        View Details <i class="fa-solid fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <?php include "campus-sidebar.php"; ?>
            </div>

        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
