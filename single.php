<?php
require_once 'db.php';

$type = $_GET['type'] ?? '';
$slug = $_GET['slug'] ?? '';

if (!$type || !$slug) {
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    exit;
}

$data = null;
$page_title = '';

// Route configuration
switch ($type) {
    case 'blog':
        $stmt = $pdo->prepare("SELECT * FROM blogs WHERE slug = ? OR slug = ?");
        $stmt->execute([$slug, urlencode($slug)]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $page_title = $data['title'] ?? 'Blog';
        break;
    case 'voi':
        $stmt = $pdo->prepare("SELECT * FROM voice_of_experience WHERE slug = ? OR slug = ?");
        $stmt->execute([$slug, urlencode($slug)]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $page_title = $data['title'] ?? 'Voice of Experience';
        break;
    case 'event':
        $stmt = $pdo->prepare("SELECT * FROM events WHERE slug = ? OR slug = ?");
        $stmt->execute([$slug, urlencode($slug)]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $page_title = $data['title'] ?? 'Event';
        break;
    case 'notice':
        $stmt = $pdo->prepare("SELECT * FROM notices WHERE slug = ? OR slug = ?");
        $stmt->execute([$slug, urlencode($slug)]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $page_title = $data['title'] ?? 'Notice';
        break;
    case 'announcement':
        $stmt = $pdo->prepare("SELECT * FROM announcements WHERE slug = ? OR slug = ?");
        $stmt->execute([$slug, urlencode($slug)]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $page_title = $data['title'] ?? 'Announcement';
        break;
    case 'media':
        $stmt = $pdo->prepare("SELECT * FROM media_coverage WHERE slug = ? OR slug = ? OR slug = ?");
        $stmt->execute([$slug, urlencode($slug), rawurlencode($slug)]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $page_title = $data['title'] ?? 'Media Coverage';
        break;
    case 'page':
        $stmt = $pdo->prepare("SELECT * FROM pages WHERE slug = ? OR slug = ?");
        $stmt->execute([$slug, urlencode($slug)]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $page_title = $data['title'] ?? 'Page';
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo "<h1>404 Not Found</h1>";
        exit;
}

if (!$data) {
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1><p>The content you are looking for does not exist.</p>";
    exit;
}

$pageTitle = $data['title'] . " - Dr. APJ Abdul Kalam University, Indore";
require_once 'header.php';
?>

<!-- Inner Page Luxury Hero Banner (Lovable Theme) -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <?php if ($type === 'event'): ?>
                <a href="university-events.php">Campus Life</a>
                <span>&raquo;</span>
                <a href="university-events.php">Events</a>
            <?php else: ?>
                <span class="text-white text-opacity-75"><?php echo ucfirst(str_replace(['-', '_'], ' ', $type)); ?></span>
            <?php endif; ?>
            <span>&raquo;</span>
            <span class="text-gold fw-medium"><?php echo htmlspecialchars($data['title'] ?? ''); ?></span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> <?php echo ($type === 'event') ? 'OFFICIAL UNIVERSITY EVENT' : strtoupper($type); ?>
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            <?php echo htmlspecialchars($data['title'] ?? ''); ?>
        </h1>
        
        <div class="d-flex flex-wrap align-items-center gap-3 pt-2 text-white text-opacity-80 small">
            <span><i class="fa-solid fa-graduation-cap text-gold me-1.5"></i> Dr. A.P.J. Abdul Kalam University, Indore</span>
            <?php if (!empty($data['event_date']) || !empty($data['created_at'])): ?>
            <span>•</span>
            <span><i class="fa-regular fa-calendar text-gold me-1.5"></i> <?php echo date('d F, Y', strtotime($data['event_date'] ?? $data['created_at'])); ?></span>
            <?php endif; ?>
            <?php if (!empty($data['venue'])): ?>
            <span>•</span>
            <span><i class="fa-solid fa-location-dot text-gold me-1.5"></i> <?php echo htmlspecialchars($data['venue']); ?></span>
            <?php endif; ?>
        </div>
    </div>
</section>

<main class="py-5" style="background-color: var(--bg-ivory);">
    <div class="container-custom">
        <div class="row g-4 g-xl-5">
            
            <!-- Left Main Content Area -->
            <div class="col-lg-8 col-xl-9">
                <article class="inner-main-card">
                    
                    <?php 
                    $eventImg = !empty($data['image_path']) ? $data['image_path'] : (($type === 'event') ? '2025/03/events.jpg' : '');
                    if (!empty($eventImg)) {
                        $img_src = (strpos($eventImg, 'assets/') === 0) ? $eventImg : 'uploads/' . $eventImg;
                        if (file_exists($img_src)) {
                    ?>
                    <div class="mb-4 rounded-4 overflow-hidden border border-custom shadow-sm" style="max-height: 440px;">
                        <img src="<?php echo htmlspecialchars($img_src); ?>" alt="<?php echo htmlspecialchars($data['title']); ?>" class="w-100 h-100" style="object-fit: cover;" />
                    </div>
                    <?php 
                        }
                    }
                    ?>

                    <?php if ($type === 'event' && !empty($data['event_date'])): ?>
                    <div class="p-3.5 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="intro-highlight-badge" style="width: 48px; height: 48px; font-size: 1.15rem;">
                                <i class="fa-solid fa-calendar-day"></i>
                            </div>
                            <div>
                                <span class="small text-muted-custom d-block">Scheduled Event Date</span>
                                <strong class="font-serif text-primary fs-6"><?php echo date('l, d F Y', strtotime($data['event_date'])); ?></strong>
                            </div>
                        </div>
                        <?php if (!empty($data['venue'])): ?>
                        <div class="d-flex align-items-center gap-3">
                            <div class="intro-highlight-badge" style="width: 48px; height: 48px; font-size: 1.15rem;">
                                <i class="fa-solid fa-map-location-dot"></i>
                            </div>
                            <div>
                                <span class="small text-muted-custom d-block">Campus Venue</span>
                                <strong class="font-serif text-primary fs-6"><?php echo htmlspecialchars($data['venue']); ?></strong>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>

                    <!-- Content Output -->
                    <div class="inner-page-body-text" style="line-height: 1.8; font-size: 0.95rem; color: #3e3233;">
                        <?php 
                        if (!empty($data['content'])) {
                            $clean_html = preg_replace('/<\/(article|main|section)>\s*<!--.*?-->/is', '', $data['content']);
                            $clean_html = str_replace('<table', '<div class="table-responsive my-4"><table class="table table-hover table-striped border rounded-3"', $clean_html);
                            $clean_html = str_replace('</table>', '</table></div>', $clean_html);
                            echo $clean_html;
                        } else {
                            echo "<p class='text-muted-custom'><em>For further details regarding this notice circular, please contact the University Registrar Office.</em></p>";
                        }
                        ?>
                    </div>
                    
                    <!-- Back & Social Share Bar -->
                    <div class="pt-4 mt-5 border-top border-custom d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <a href="<?php echo ($type === 'event') ? 'university-events.php' : 'javascript:history.back();'; ?>" class="btn btn-outline-dark rounded-pill px-4 py-2 small fw-semibold">
                            <i class="fa-solid fa-arrow-left me-1.5"></i> Back to <?php echo ($type === 'event') ? 'Events' : 'Overview'; ?>
                        </a>
                        <div class="d-flex align-items-center gap-2">
                            <span class="small text-muted-custom fw-semibold me-1">Share:</span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('http://' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . ($_SERVER['REQUEST_URI'] ?? '')); ?>" target="_blank" class="share-social-btn facebook" title="Share on Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode('http://' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . ($_SERVER['REQUEST_URI'] ?? '')); ?>" target="_blank" class="share-social-btn twitter" title="Share on X (Twitter)"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode('http://' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . ($_SERVER['REQUEST_URI'] ?? '')); ?>" target="_blank" class="share-social-btn linkedin" title="Share on LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </div>

                    <style>
                    .share-social-btn {
                        width: 36px;
                        height: 36px;
                        border-radius: 50%;
                        display: inline-flex;
                        align-items: center;
                        justify-content: center;
                        background: #f5edf0;
                        color: #700015 !important;
                        border: 1px solid rgba(112, 0, 21, 0.15);
                        font-size: 0.92rem;
                        transition: all 0.25s ease;
                        text-decoration: none !important;
                    }
                    .share-social-btn i {
                        color: #700015;
                        transition: color 0.25s ease;
                    }
                    .share-social-btn:hover {
                        background: #700015;
                        color: #ffd700 !important;
                        transform: translateY(-2px);
                        box-shadow: 0 4px 10px rgba(112, 0, 21, 0.25);
                    }
                    .share-social-btn:hover i {
                        color: #ffd700;
                    }
                    </style>

                </article>
            </div>

            <!-- Right Sidebar Area -->
            <div class="col-lg-4 col-xl-3">
                <?php 
                if ($type === 'event') {
                    include 'campus-sidebar.php';
                } else {
                    include 'about-sidebar.php';
                }
                ?>
            </div>

        </div>
    </div>
</main>

<?php require_once 'footer.php'; ?>
