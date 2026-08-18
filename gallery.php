<?php
$activeSectionPage = "gallery";
require_once "db.php";
require_once "header.php";

$stmt = $pdo->query("SELECT * FROM photo_gallery ORDER BY category, created_at ASC");
$all = $stmt->fetchAll(PDO::FETCH_ASSOC);

$grouped = [];
foreach ($all as $row) {
    $grouped[$row["category"]][] = $row;
}

$tabOrder = ["dikshant-samaroh","annual-function","agriculture-lab","sports","campus","extra","general"];
$tabLabels = [
    "dikshant-samaroh" => "Dikshant Samaroh",
    "annual-function"  => "Annual Function",
    "agriculture-lab"  => "Agriculture Lab",
    "sports"           => "Sports",
    "campus"           => "Campus",
    "extra"            => "Extra",
    "general"          => "General",
];

foreach (array_keys($grouped) as $cat) {
    if (!in_array($cat, $tabOrder)) $tabOrder[] = $cat;
}
$tabOrder = array_values(array_filter($tabOrder, fn($c) => isset($grouped[$c])));
?>

<link rel="stylesheet" href="assets/css/js_composer_tta.min.css">

<style>
.gallery-banner { position:relative;background:#0a1628;padding:55px 0;overflow:hidden;text-align:center; }
.gallery-banner::before { content:"";position:absolute;inset:0;background:url("assets/images/gallery.jpg") center/cover no-repeat;opacity:0.18; }
.gallery-banner .banner-inner { position:relative;z-index:2; }
.gallery-banner h1 { color:#fff;font-size:2.6rem;font-weight:700;margin:0 0 10px; }
.gallery-banner .breadcrumb { list-style:none;display:flex;justify-content:center;gap:8px;padding:0;margin:0;color:#ccc;font-size:0.95rem; }
.gallery-banner .breadcrumb a { color:#e8c97a;text-decoration:none; }

.gallery-page-wrap { padding:50px 0 70px;background:#f5f6f8; }
.gallery-page-wrap .inner { max-width:1200px;margin:0 auto;padding:0 20px; }

.vc_tta-container { background:#fff;border-radius:6px;box-shadow:0 2px 16px rgba(0,0,0,.08);overflow:hidden; }
.vc_tta-tabs-list { display:flex;flex-wrap:wrap;list-style:none;margin:0;padding:0 16px;border-bottom:2px solid #e5e5e5;background:#fff; }
.vc_tta-tab { margin:0; }
.vc_tta-tab a { display:block;padding:15px 20px;font-size:.88rem;font-weight:600;color:#555;text-decoration:none;border-bottom:3px solid transparent;margin-bottom:-2px;transition:color .2s,border-color .2s;cursor:pointer; }
.vc_tta-tab a:hover { color:#8b1a1a; }
.vc_tta-tab.vc_active a { color:#8b1a1a;border-bottom-color:#8b1a1a; }
.vc_tta-panels-container { padding:28px 24px 32px; }
.vc_tta-panel { display:none; }
.vc_tta-panel.vc_active { display:block; }
.vc_tta-panel-heading { display:none; }

.gallery-masonry { columns:4;column-gap:10px; }
.gallery-item { break-inside:avoid;margin-bottom:10px;border-radius:6px;overflow:hidden;cursor:pointer;position:relative;background:#eee; }
.gallery-item img { width:100%;height:auto;display:block;transition:transform .35s,filter .3s; }
.gallery-item:hover img { transform:scale(1.04);filter:brightness(.8); }
.gallery-item .g-overlay { position:absolute;inset:0;background:rgba(139,26,26,.5);display:flex;align-items:center;justify-content:center;opacity:0;transition:opacity .3s; }
.gallery-item:hover .g-overlay { opacity:1; }
.gallery-item .g-overlay i { color:#fff;font-size:1.6rem; }
.gallery-item .g-caption { position:absolute;bottom:0;left:0;right:0;background:linear-gradient(transparent,rgba(0,0,0,.65));color:#fff;font-size:.78rem;padding:12px 10px 8px;transform:translateY(100%);transition:transform .3s; }
.gallery-item:hover .g-caption { transform:translateY(0); }
.gallery-empty { text-align:center;padding:50px;color:#aaa; }
.gallery-empty i { font-size:3rem;display:block;margin-bottom:10px;color:#ddd; }

.g-lightbox { display:none;position:fixed;inset:0;z-index:99999;background:rgba(0,0,0,.92);align-items:center;justify-content:center; }
.g-lightbox.open { display:flex; }
.g-lb-close { position:fixed;top:18px;right:24px;color:#fff;font-size:2.2rem;cursor:pointer;background:none;border:none;z-index:100000; }
.g-lb-inner { position:relative;max-width:92vw;text-align:center; }
.g-lb-inner img { max-width:88vw;max-height:80vh;border-radius:6px;box-shadow:0 8px 50px rgba(0,0,0,.7);display:block;margin:0 auto; }
.g-lb-caption { color:#ddd;font-size:.9rem;margin-top:12px; }
.g-lb-counter { color:#999;font-size:.8rem;margin-top:4px; }
.g-lb-nav { position:fixed;top:50%;transform:translateY(-50%);background:rgba(255,255,255,.14);border:none;color:#fff;font-size:1.8rem;padding:12px 16px;cursor:pointer;border-radius:5px;transition:background .2s;z-index:100000; }
.g-lb-nav:hover { background:rgba(255,255,255,.28); }
.g-lb-prev { left:16px; }
.g-lb-next { right:16px; }

@media(max-width:1024px){ .gallery-masonry{columns:3;} }
@media(max-width:700px){ .gallery-masonry{columns:2;} .vc_tta-tab a{padding:10px 12px;font-size:.8rem;} }
@media(max-width:420px){ .gallery-masonry{columns:1;} }
</style>

<div class="gallery-banner">
    <div class="banner-inner">
        <h1>Gallery</h1>
        <ul class="breadcrumb"><li><a href="index.php">Home</a></li><li>»</li><li>Gallery</li></ul>
    </div>
</div>

<div class="gallery-page-wrap">
    <div class="inner">
        <div class="vc_tta-container">
            <div class="vc_general vc_tta vc_tta-tabs">
                <div class="vc_tta-tabs-container">
                    <ul class="vc_tta-tabs-list" role="tablist">
                        <?php foreach ($tabOrder as $i => $cat):
                            $label = $tabLabels[$cat] ?? ucwords(str_replace("-"," ",$cat)); ?>
                        <li class="vc_tta-tab <?= $i===0?"vc_active":"" ?>" data-target="gp-<?= $cat ?>">
                            <a href="javascript:void(0)"><?= htmlspecialchars($label) ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="vc_tta-panels-container"><div class="vc_tta-panels">
                    <?php foreach ($tabOrder as $i => $cat):
                        $items = $grouped[$cat] ?? [];
                        $label = $tabLabels[$cat] ?? ucwords(str_replace("-"," ",$cat)); ?>
                    <div class="vc_tta-panel <?= $i===0?"vc_active":"" ?>" id="gp-<?= $cat ?>">
                        <div class="vc_tta-panel-body">
                            <?php if (empty($items)): ?>
                            <div class="gallery-empty"><i class="fa-regular fa-image"></i><p>Koi image nahi hai.</p></div>
                            <?php else: ?>
                            <div class="gallery-masonry">
                                <?php foreach ($items as $item):
                                    $src = "uploads/".ltrim($item["image_path"],"/"); ?>
                                <div class="gallery-item"
                                     data-lb-src="<?= htmlspecialchars($src) ?>"
                                     data-lb-title="<?= htmlspecialchars($item["title"]) ?>"
                                     data-lb-cat="<?= htmlspecialchars($cat) ?>">
                                    <img src="<?= htmlspecialchars($src) ?>" alt="<?= htmlspecialchars($item["title"]) ?>" loading="lazy"
                                         onerror="this.closest('.gallery-item').style.display='none'">
                                    <div class="g-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
                                    <div class="g-caption"><?= htmlspecialchars($item["title"]) ?></div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div></div>
            </div>
        </div>
    </div>
</div>

<div class="g-lightbox" id="gLb">
    <button class="g-lb-close" id="lbClose">&#x2715;</button>
    <button class="g-lb-nav g-lb-prev" id="lbPrev"><i class="fa-solid fa-chevron-left"></i></button>
    <div class="g-lb-inner">
        <img src="" alt="" id="lbImg">
        <div class="g-lb-caption" id="lbCap"></div>
        <div class="g-lb-counter" id="lbCnt"></div>
    </div>
    <button class="g-lb-nav g-lb-next" id="lbNext"><i class="fa-solid fa-chevron-right"></i></button>
</div>

<script>
(function(){
    // Tab switching
    document.querySelectorAll(".vc_tta-tab").forEach(function(tab){
        tab.querySelector("a").addEventListener("click", function(e){
            e.preventDefault();
            document.querySelectorAll(".vc_tta-tab").forEach(function(t){t.classList.remove("vc_active");});
            document.querySelectorAll(".vc_tta-panel").forEach(function(p){p.classList.remove("vc_active");});
            tab.classList.add("vc_active");
            var target = document.getElementById(tab.dataset.target);
            if(target) target.classList.add("vc_active");
        });
    });

    // Lightbox
    var lb=document.getElementById("gLb"),lbImg=document.getElementById("lbImg"),
        lbCap=document.getElementById("lbCap"),lbCnt=document.getElementById("lbCnt");
    var items=[],cur=0;

    function buildGroup(cat){
        items=Array.from(document.querySelectorAll('.gallery-item[data-lb-cat="'+cat+'"]'))
              .map(function(el){return{src:el.dataset.lbSrc,title:el.dataset.lbTitle};});
    }
    function show(i){
        cur=(i+items.length)%items.length;
        lbImg.src=items[cur].src; lbImg.alt=items[cur].title;
        lbCap.textContent=items[cur].title;
        lbCnt.textContent=(cur+1)+" / "+items.length;
    }
    function close(){lb.classList.remove("open");lbImg.src="";document.body.style.overflow="";}

    document.querySelectorAll(".gallery-item").forEach(function(el){
        el.addEventListener("click",function(){
            buildGroup(el.dataset.lbCat);
            var idx=items.findIndex(function(a){return a.src===el.dataset.lbSrc;});
            show(idx<0?0:idx);
            lb.classList.add("open");
            document.body.style.overflow="hidden";
        });
    });
    document.getElementById("lbClose").addEventListener("click",close);
    lb.addEventListener("click",function(e){if(e.target===lb)close();});
    document.getElementById("lbPrev").addEventListener("click",function(e){e.stopPropagation();show(cur-1);});
    document.getElementById("lbNext").addEventListener("click",function(e){e.stopPropagation();show(cur+1);});
    document.addEventListener("keydown",function(e){
        if(!lb.classList.contains("open"))return;
        if(e.key==="Escape")close();
        if(e.key==="ArrowLeft")show(cur-1);
        if(e.key==="ArrowRight")show(cur+1);
    });
})();
</script>

<?php include "footer.php"; ?>
