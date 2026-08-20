<?php
$pageTitle = "Campus Photo Gallery - Dr. APJ Abdul Kalam University, Indore";
require_once "db.php";
require_once "header.php";

$stmt = $pdo->query("SELECT * FROM photo_gallery ORDER BY category, created_at ASC");
$all = $stmt->fetchAll(PDO::FETCH_ASSOC);

$grouped = [];
foreach ($all as $row) {
    $grouped[$row["category"]][] = $row;
}

$tabOrder = ["dikshant-samaroh", "annual-function", "agriculture-lab", "sports", "campus", "extra"];
$tabLabels = [
    "dikshant-samaroh" => "Dikshant Samaroh",
    "annual-function"  => "Annual Function",
    "agriculture-lab"  => "Agriculture Lab",
    "sports"           => "Sports",
    "campus"           => "Campus Life",
    "extra"            => "Celebrations & Extra",
];

$activeTabs = array_values(array_filter($tabOrder, fn($c) => isset($grouped[$c])));
?>

<style>
.gallery-tab-btn {
    border: 1px solid transparent;
    background: transparent;
    color: #4a3b3c;
    font-weight: 600;
    font-size: 0.84rem;
    padding: 0.45rem 1rem;
    border-radius: 50px;
    white-space: nowrap;
    transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    display: inline-flex;
    align-items: center;
    cursor: pointer;
    flex-shrink: 0;
}
.gallery-tab-btn:hover {
    background: rgba(112, 0, 24, 0.05);
    color: var(--primary-color);
}
.gallery-tab-btn.active {
    background: var(--primary-color) !important;
    color: #ffffff !important;
    border-color: var(--primary-color) !important;
    box-shadow: 0 4px 14px rgba(112, 0, 24, 0.28);
}
.gallery-tab-btn.active i {
    color: var(--gold-color) !important;
}

.gallery-tab-container {
    background: #ffffff;
    border: 1px solid var(--border-color);
    padding: 0.35rem 0.5rem;
    border-radius: 60px;
    display: flex;
    align-items: center;
    gap: 0.35rem;
    overflow-x: auto;
    scrollbar-width: none;
    box-shadow: 0 2px 8px rgba(0,0,0,0.03);
}
.gallery-tab-container::-webkit-scrollbar {
    display: none;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 1.25rem;
}
.gallery-card {
    background: #ffffff;
    border: 1px solid var(--border-color);
    border-radius: 1rem;
    overflow: hidden;
    cursor: pointer;
    position: relative;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.gallery-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 24px rgba(0,0,0,0.1);
}
.gallery-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
}
.gallery-card:hover img {
    transform: scale(1.05);
}
.gallery-card .g-overlay {
    position: absolute;
    inset: 0;
    background: rgba(112, 0, 24, 0.55);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}
.gallery-card:hover .g-overlay {
    opacity: 1;
}
.gallery-card .g-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0,0,0,0.75));
    color: #ffffff;
    padding: 1rem 0.85rem 0.65rem;
    font-size: 0.85rem;
    font-weight: 500;
}

/* Lightbox Modal */
.g-lightbox {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 99999;
    background: rgba(0,0,0,0.92);
    align-items: center;
    justify-content: center;
}
.g-lightbox.open { display: flex; }
.g-lb-close {
    position: fixed;
    top: 20px;
    right: 24px;
    color: #ffffff;
    font-size: 2rem;
    cursor: pointer;
    background: none;
    border: none;
    z-index: 100000;
}
.g-lb-inner {
    position: relative;
    max-width: 90vw;
    text-align: center;
}
.g-lb-inner img {
    max-width: 85vw;
    max-height: 80vh;
    border-radius: 8px;
    box-shadow: 0 8px 40px rgba(0,0,0,0.8);
    display: block;
    margin: 0 auto;
}
.g-lb-caption { color: #f0f0f0; font-size: 1rem; margin-top: 12px; }
.g-lb-nav {
    position: fixed;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255,255,255,0.15);
    border: none;
    color: #ffffff;
    font-size: 1.8rem;
    padding: 12px 18px;
    cursor: pointer;
    border-radius: 50px;
    transition: background 0.2s;
    z-index: 100000;
}
.g-lb-nav:hover { background: rgba(255,255,255,0.3); }
.g-lb-prev { left: 20px; }
.g-lb-next { right: 20px; }
</style>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="gallery.php">Campus Life</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Photo Gallery</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> CAMPUS MOMENTS &amp; CELEBRATIONS
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            University Photo Gallery
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Convocations, Annual Youth Fests, Labs &amp; Sports
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
                                <i class="fa-solid fa-camera-retro"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Visual Chronicle of Campus Life</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Explore high-resolution glimpses of academic convocations, technical hackathons, cultural fests, sports tournaments, high-tech engineering laboratories, and dynamic student celebrations across our 50-acre green campus.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Category Tabs (Segmented Luxury Pill Bar) -->
                    <div class="mb-4">
                        <div class="gallery-tab-container" id="galleryTabNav">
                            <button type="button" class="gallery-tab-btn active" data-tab="all">
                                <i class="fa-solid fa-images me-1.5"></i> All Photos
                            </button>
                            <?php foreach ($activeTabs as $cat): ?>
                            <button type="button" class="gallery-tab-btn" data-tab="<?php echo htmlspecialchars($cat); ?>">
                                <?php echo htmlspecialchars($tabLabels[$cat] ?? ucfirst($cat)); ?>
                            </button>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Gallery Grid -->
                    <div class="gallery-grid mb-5" id="galleryGrid">
                        <?php foreach ($all as $item): 
                            $imgSrc = "uploads/" . $item['image_path'];
                            $title = $item['title'] ?? 'Campus Life';
                            $cat = $item['category'];
                        ?>
                        <div class="gallery-card gallery-item" data-category="<?php echo htmlspecialchars($cat); ?>" data-src="<?php echo htmlspecialchars($imgSrc); ?>" data-caption="<?php echo htmlspecialchars($title); ?>">
                            <img src="<?php echo htmlspecialchars($imgSrc); ?>" alt="<?php echo htmlspecialchars($title); ?>" loading="lazy">
                            <div class="g-overlay">
                                <i class="fa-solid fa-magnifying-glass-plus text-white fs-3"></i>
                            </div>
                            <div class="g-caption">
                                <span class="d-block text-truncate"><?php echo htmlspecialchars($title); ?></span>
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

<!-- Lightbox Modal Component -->
<div class="g-lightbox" id="gLightbox" role="dialog" aria-modal="true">
    <button class="g-lb-close" id="gLbClose" aria-label="Close Lightbox">&times;</button>
    <button class="g-lb-nav g-lb-prev" id="gLbPrev" aria-label="Previous image"><i class="fa-solid fa-chevron-left"></i></button>
    <div class="g-lb-inner">
        <img id="gLbImg" src="" alt="">
        <div class="g-lb-caption" id="gLbCaption"></div>
    </div>
    <button class="g-lb-nav g-lb-next" id="gLbNext" aria-label="Next image"><i class="fa-solid fa-chevron-right"></i></button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabBtns = document.querySelectorAll('.gallery-tab-btn');
    const items = document.querySelectorAll('.gallery-item');
    const lightbox = document.getElementById('gLightbox');
    const lbImg = document.getElementById('gLbImg');
    const lbCaption = document.getElementById('gLbCaption');
    const lbClose = document.getElementById('gLbClose');
    const lbPrev = document.getElementById('gLbPrev');
    const lbNext = document.getElementById('gLbNext');

    let visibleItems = Array.from(items);
    let currentIndex = 0;

    // Filter Tabs
    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            tabBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const tab = this.getAttribute('data-tab');
            visibleItems = [];

            items.forEach(item => {
                const itemCat = item.getAttribute('data-category');
                if (tab === 'all' || itemCat === tab) {
                    item.style.display = 'block';
                    visibleItems.push(item);
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    // Lightbox open
    items.forEach(item => {
        item.addEventListener('click', function() {
            const src = this.getAttribute('data-src');
            const caption = this.getAttribute('data-caption');
            currentIndex = visibleItems.indexOf(this);
            if (currentIndex === -1) currentIndex = 0;
            openLightbox(src, caption);
        });
    });

    function openLightbox(src, caption) {
        lbImg.src = src;
        lbCaption.innerText = caption;
        lightbox.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.remove('open');
        document.body.style.overflow = '';
    }

    if (lbClose) lbClose.addEventListener('click', closeLightbox);
    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox) closeLightbox();
    });

    if (lbPrev) {
        lbPrev.addEventListener('click', function(e) {
            e.stopPropagation();
            if (visibleItems.length === 0) return;
            currentIndex = (currentIndex - 1 + visibleItems.length) % visibleItems.length;
            const target = visibleItems[currentIndex];
            openLightbox(target.getAttribute('data-src'), target.getAttribute('data-caption'));
        });
    }

    if (lbNext) {
        lbNext.addEventListener('click', function(e) {
            e.stopPropagation();
            if (visibleItems.length === 0) return;
            currentIndex = (currentIndex + 1) % visibleItems.length;
            const target = visibleItems[currentIndex];
            openLightbox(target.getAttribute('data-src'), target.getAttribute('data-caption'));
        });
    }

    document.addEventListener('keydown', function(e) {
        if (!lightbox.classList.contains('open')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') lbPrev.click();
        if (e.key === 'ArrowRight') lbNext.click();
    });
});
</script>

<?php include "footer.php"; ?>
