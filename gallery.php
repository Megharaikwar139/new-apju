<?php
$activeSectionPage = 'gallery';
require_once 'header.php';
require_once 'db.php';

// Fetch all gallery categories with their cover image
$categoriesQuery = $pdo->query("SELECT * FROM photo_gallery ORDER BY created_at ASC");
$categories = $categoriesQuery->fetchAll(PDO::FETCH_ASSOC);

// Define tab display names mapping
$categoryLabels = [
    'dikshant-samaroh'  => 'Dikshant Samaroh',
    'annual-function'   => 'Annual Function',
    'agriculture-lab'   => 'Agriculture Lab',
    'sports'            => 'Sports',
    'campus'            => 'Campus',
    'extra'             => 'Extra',
    'general'           => 'General',
];
?>

<!-- Page Banner -->
<div class="page-banner-wrap" style="background: linear-gradient(135deg, #0a1628 0%, #1a2a4a 50%, #0d1f3c 100%); padding: 60px 0; position:relative; overflow:hidden;">
    <div style="position:absolute;inset:0;background:url('assets/images/gallery.jpg') center/cover no-repeat;opacity:0.18;"></div>
    <div class="container" style="position:relative;z-index:2;text-align:center;">
        <h1 style="color:#fff;font-size:2.8rem;font-weight:700;margin:0 0 10px;">Gallery</h1>
        <nav aria-label="breadcrumb">
            <ol style="list-style:none;display:flex;justify-content:center;gap:8px;padding:0;margin:0;color:#ccc;font-size:0.95rem;">
                <li><a href="index.php" style="color:#e8c97a;text-decoration:none;">Home</a></li>
                <li style="color:#aaa;">»</li>
                <li style="color:#fff;">Gallery</li>
            </ol>
        </nav>
    </div>
</div>

<style>
/* ── Gallery Page Styles ── */
.gallery-section { padding: 50px 0 70px; background: #f8f9fb; }
.gallery-tabs-wrap { background: #fff; border-radius: 12px; box-shadow: 0 2px 20px rgba(0,0,0,0.08); overflow: hidden; }

/* Tab Nav */
.gallery-tab-nav { display: flex; flex-wrap: wrap; border-bottom: 2px solid #eee; padding: 0 20px; }
.gallery-tab-btn {
    padding: 16px 22px; border: none; background: none; cursor: pointer;
    font-size: 0.92rem; font-weight: 600; color: #666; border-bottom: 3px solid transparent;
    margin-bottom: -2px; transition: all 0.25s; white-space: nowrap;
}
.gallery-tab-btn:hover { color: #8b1a1a; }
.gallery-tab-btn.active { color: #8b1a1a; border-bottom-color: #8b1a1a; background: #fff8f8; }

/* Tab Panels */
.gallery-tab-panel { display: none; padding: 30px 24px; }
.gallery-tab-panel.active { display: block; }

/* Masonry Grid */
.gallery-grid {
    columns: 4;
    column-gap: 12px;
}
.gallery-grid-item {
    break-inside: avoid;
    margin-bottom: 12px;
    border-radius: 8px;
    overflow: hidden;
    cursor: pointer;
    position: relative;
}
.gallery-grid-item img {
    width: 100%; height: auto; display: block;
    transition: transform 0.35s ease, filter 0.35s ease;
}
.gallery-grid-item:hover img { transform: scale(1.04); filter: brightness(0.85); }
.gallery-grid-item .overlay {
    position: absolute; inset: 0;
    background: rgba(139,26,26,0.55);
    display: flex; align-items: center; justify-content: center;
    opacity: 0; transition: opacity 0.3s;
}
.gallery-grid-item:hover .overlay { opacity: 1; }
.gallery-grid-item .overlay i { color: #fff; font-size: 1.8rem; }

/* Empty state */
.gallery-empty {
    text-align: center; padding: 60px 20px; color: #999;
}
.gallery-empty i { font-size: 3rem; margin-bottom: 12px; display: block; color: #ddd; }

/* Lightbox */
.gallery-lightbox {
    display: none; position: fixed; inset: 0; z-index: 99999;
    background: rgba(0,0,0,0.92); align-items: center; justify-content: center;
    flex-direction: column;
}
.gallery-lightbox.open { display: flex; }
.gallery-lightbox img {
    max-width: 90vw; max-height: 80vh; border-radius: 8px;
    box-shadow: 0 10px 60px rgba(0,0,0,0.6);
}
.gallery-lightbox-close {
    position: absolute; top: 20px; right: 28px;
    color: #fff; font-size: 2rem; cursor: pointer; background: none; border: none;
    line-height: 1;
}
.gallery-lightbox-caption {
    color: #ddd; margin-top: 14px; font-size: 0.95rem;
}
.lightbox-nav {
    position: absolute; top: 50%; transform: translateY(-50%);
    background: rgba(255,255,255,0.12); border: none; color: #fff;
    font-size: 2rem; padding: 10px 18px; cursor: pointer; border-radius: 6px;
    transition: background 0.2s;
}
.lightbox-nav:hover { background: rgba(255,255,255,0.25); }
.lightbox-prev { left: 20px; }
.lightbox-next { right: 20px; }

@media (max-width: 900px) { .gallery-grid { columns: 3; } }
@media (max-width: 600px) {
    .gallery-grid { columns: 2; }
    .gallery-tab-btn { padding: 12px 14px; font-size: 0.82rem; }
}
@media (max-width: 400px) { .gallery-grid { columns: 1; } }
</style>

<section class="gallery-section">
    <div class="container">
        <div class="gallery-tabs-wrap">

            <!-- Tab Nav -->
            <div class="gallery-tab-nav" role="tablist">
                <?php
                // Get unique categories
                $seen = [];
                $tabIndex = 0;
                foreach ($categories as $cat):
                    $catKey = $cat['category'];
                    if (in_array($catKey, $seen)) continue;
                    $seen[] = $catKey;
                    $label = $categoryLabels[$catKey] ?? ucwords(str_replace('-', ' ', $catKey));
                    $isFirst = $tabIndex === 0;
                    $tabIndex++;
                ?>
                <button class="gallery-tab-btn <?= $isFirst ? 'active' : '' ?>"
                        data-tab="tab-<?= htmlspecialchars($catKey) ?>"
                        role="tab"
                        aria-selected="<?= $isFirst ? 'true' : 'false' ?>">
                    <?= htmlspecialchars($label) ?>
                </button>
                <?php endforeach; ?>
            </div>

            <!-- Tab Panels -->
            <?php
            $seenPanels = [];
            $panelIndex = 0;
            foreach ($categories as $cat):
                $catKey = $cat['category'];
                if (in_array($catKey, $seenPanels)) continue;
                $seenPanels[] = $catKey;
                $isFirstPanel = $panelIndex === 0;
                $panelIndex++;

                // Fetch all items in this category
                $stmt = $pdo->prepare("SELECT * FROM photo_gallery WHERE category = ? ORDER BY created_at ASC");
                $stmt->execute([$catKey]);
                $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="gallery-tab-panel <?= $isFirstPanel ? 'active' : '' ?>"
                 id="tab-<?= htmlspecialchars($catKey) ?>"
                 role="tabpanel">

                <?php if (empty($items)): ?>
                <div class="gallery-empty">
                    <i class="fa-regular fa-image"></i>
                    <p>Is category mein koi image nahi hai abhi.</p>
                </div>
                <?php else: ?>
                <div class="gallery-grid" data-category="<?= htmlspecialchars($catKey) ?>">
                    <?php foreach ($items as $item):
                        // Build all images list (cover + extras from `images` JSON)
                        $allImgs = [];
                        $coverPath = 'uploads/' . ltrim($item['image_path'], '/');
                        if (!empty($item['image_path'])) $allImgs[] = ['src' => $coverPath, 'title' => $item['title']];
                        if (!empty($item['images'])) {
                            $extras = json_decode($item['images'], true);
                            if (is_array($extras)) {
                                foreach ($extras as $ex) {
                                    $allImgs[] = ['src' => 'uploads/' . ltrim($ex, '/'), 'title' => $item['title']];
                                }
                            }
                        }
                        foreach ($allImgs as $img):
                    ?>
                    <div class="gallery-grid-item"
                         data-lightbox-src="<?= htmlspecialchars($img['src']) ?>"
                         data-lightbox-title="<?= htmlspecialchars($img['title']) ?>"
                         data-lightbox-group="<?= htmlspecialchars($catKey) ?>">
                        <img src="<?= htmlspecialchars($img['src']) ?>"
                             alt="<?= htmlspecialchars($img['title']) ?>"
                             loading="lazy"
                             onerror="this.closest('.gallery-grid-item').style.display='none'">
                        <div class="overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
                    </div>
                    <?php endforeach; endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>

        </div><!-- .gallery-tabs-wrap -->
    </div>
</section>

<!-- Lightbox -->
<div class="gallery-lightbox" id="galleryLightbox">
    <button class="gallery-lightbox-close" id="lightboxClose" title="Close">&#x2715;</button>
    <button class="lightbox-nav lightbox-prev" id="lightboxPrev"><i class="fa-solid fa-chevron-left"></i></button>
    <img src="" alt="" id="lightboxImg">
    <div class="gallery-lightbox-caption" id="lightboxCaption"></div>
    <button class="lightbox-nav lightbox-next" id="lightboxNext"><i class="fa-solid fa-chevron-right"></i></button>
</div>

<script>
(function () {
    // Tab switching
    document.querySelectorAll('.gallery-tab-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.gallery-tab-btn').forEach(b => { b.classList.remove('active'); b.setAttribute('aria-selected', 'false'); });
            document.querySelectorAll('.gallery-tab-panel').forEach(p => p.classList.remove('active'));
            this.classList.add('active');
            this.setAttribute('aria-selected', 'true');
            document.getElementById(this.dataset.tab).classList.add('active');
        });
    });

    // Lightbox
    var lightbox   = document.getElementById('galleryLightbox');
    var lbImg      = document.getElementById('lightboxImg');
    var lbCaption  = document.getElementById('lightboxCaption');
    var currentGroup = [];
    var currentIdx   = 0;

    function openLightbox(items, idx) {
        currentGroup = items;
        currentIdx   = idx;
        showLightboxItem();
        lightbox.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function showLightboxItem() {
        var item = currentGroup[currentIdx];
        lbImg.src = item.src;
        lbImg.alt = item.title;
        lbCaption.textContent = item.title;
    }

    function closeLightbox() {
        lightbox.classList.remove('open');
        lbImg.src = '';
        document.body.style.overflow = '';
    }

    document.querySelectorAll('.gallery-grid-item').forEach(function (el) {
        el.addEventListener('click', function () {
            var group = this.dataset.lightboxGroup;
            var groupItems = Array.from(document.querySelectorAll(
                '.gallery-grid-item[data-lightbox-group="' + group + '"]'
            )).map(function (g) {
                return { src: g.dataset.lightboxSrc, title: g.dataset.lightboxTitle };
            });
            var idx = groupItems.findIndex(function (g) { return g.src === this.dataset.lightboxSrc; }, this);
            openLightbox(groupItems, idx < 0 ? 0 : idx);
        });
    });

    document.getElementById('lightboxClose').addEventListener('click', closeLightbox);
    lightbox.addEventListener('click', function (e) { if (e.target === lightbox) closeLightbox(); });

    document.getElementById('lightboxPrev').addEventListener('click', function (e) {
        e.stopPropagation();
        currentIdx = (currentIdx - 1 + currentGroup.length) % currentGroup.length;
        showLightboxItem();
    });
    document.getElementById('lightboxNext').addEventListener('click', function (e) {
        e.stopPropagation();
        currentIdx = (currentIdx + 1) % currentGroup.length;
        showLightboxItem();
    });

    document.addEventListener('keydown', function (e) {
        if (!lightbox.classList.contains('open')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') { currentIdx = (currentIdx - 1 + currentGroup.length) % currentGroup.length; showLightboxItem(); }
        if (e.key === 'ArrowRight') { currentIdx = (currentIdx + 1) % currentGroup.length; showLightboxItem(); }
    });
})();
</script>

<?php include 'footer.php'; ?>