<?php 
require_once 'db.php';
include 'header.php'; 

// Fetch media coverage records from DB
$media_items = [];
try {
    $stmt = $pdo->query("SELECT * FROM media_coverage WHERE title NOT IN ('test', 'tes') ORDER BY id DESC");
    $media_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $media_items = [];
}
?>

<!-- Inner Page Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="why-aku.php">About</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">AKU in Media</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> PRESS & MEDIA COVERAGE
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 900px; line-height: 1.15;">
            AKU in the News
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Press Releases, Newspaper Clippings & National Media Coverage
        </p>
    </div>
</section>

<main class="py-5" style="background-color: var(--bg-ivory);">
    <div class="container-custom">
        <div class="row g-4 g-xl-5">
            
            <!-- Left Main Content Area -->
            <div class="col-lg-8 col-xl-9">
                <article class="inner-main-card">
                    
                    <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom border-custom">
                        <div>
                            <h2 class="font-serif text-primary fs-3 fw-bold mb-1">Recent Media & Press Highlights</h2>
                            <p class="text-muted-custom small mb-0">National newspapers and electronic media features of Dr. APJ Abdul Kalam University.</p>
                        </div>
                        <span class="badge rounded-pill bg-light text-primary border border-custom px-3 py-2 small fw-semibold">
                            <?php echo count($media_items); ?> Articles
                        </span>
                    </div>

                    <!-- Media Grid (Balanced 2-Column Layout) -->
                    <div class="row g-4">
                        <?php if (!empty($media_items)): ?>
                            <?php foreach ($media_items as $item): 
                                $img_src = '';
                                if (!empty($item['image_path'])) {
                                    $img_src = (strpos($item['image_path'], 'assets/') === 0) ? $item['image_path'] : 'uploads/' . $item['image_path'];
                                } else {
                                    $img_src = 'assets/images/placeholder.jpg';
                                }
                            ?>
                            <div class="col-md-6 d-flex">
                                <div class="media-grid-card w-100">
                                    <div class="media-img-wrapper position-relative">
                                        <img src="<?php echo htmlspecialchars($img_src); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" />
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="badge-pill-blur mb-2 d-inline-block px-2.5 py-0.5 text-primary fw-semibold" style="background: #f0eae1; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.08em;">
                                                <i class="fa-solid fa-newspaper text-gold me-1"></i> Press Coverage
                                            </div>
                                            <h4 class="font-serif text-primary fs-5 fw-bold mb-2 lh-sm">
                                                <?php echo htmlspecialchars($item['title']); ?>
                                            </h4>
                                            <?php if (!empty($item['content'])): ?>
                                            <p class="small text-muted mb-3 line-clamp-2">
                                                <?php echo strip_tags(mb_substr($item['content'], 0, 120)) . '...'; ?>
                                            </p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="pt-2.5 border-top border-custom d-flex align-items-center justify-content-between">
                                            <span class="text-muted small" style="font-size: 0.75rem;">
                                                <i class="fa-regular fa-calendar text-gold me-1"></i> <?php echo date('d M, Y', strtotime($item['created_at'] ?? 'now')); ?>
                                            </span>
                                            <a href="single.php?type=media&slug=<?php echo urlencode($item['slug'] ?? $item['id']); ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1 small fw-semibold" style="border-color: var(--primary-color); color: var(--primary-color); font-size: 0.78rem;">
                                                Read More <i class="fa-solid fa-arrow-right ms-1" style="font-size: 0.7rem;"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12 text-center py-5">
                                <p class="text-muted">No media coverage articles found.</p>
                            </div>
                        <?php endif; ?>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar Area -->
            <div class="col-lg-4 col-xl-3">
                <?php include 'about-sidebar.php'; ?>
            </div>

        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
