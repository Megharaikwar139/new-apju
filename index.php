<?php include 'header.php'; ?>
<div id="content" class="site-content">
<main id="primary" class="site-main">
    
 
		 
<article id="post-7" class="post-7 page type-page status-publish has-post-thumbnail hentry">
	 
	<div class="uk-container">
		

	<div class="entry-content">
		<div class="wpb-content-wrapper"><div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper"><div class="n2_clear"><ss3-force-full-width data-overflow-x="body" data-horizontal-selector="body"><div class="n2-section-smartslider fitvidsignore  n2_clear" data-ssid="2"><div id="n2-ss-2-align" class="n2-ss-align"><div class="n2-padding"><div id="n2-ss-2" data-creator="Smart Slider 3" data-responsive="fullwidth" class="n2-ss-slider n2-ow n2-has-hover n2notransition  "><div class="n2-ss-slider-wrapper-inside">
        <div class="n2-ss-slider-1 n2_ss__touch_element n2-ow">
            <div class="n2-ss-slider-2 n2-ow">
                                                    <div class="n2-ss-background-animation n2-ow"></div>
                                <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
      <?php
      $banners_stmt = $pdo->query("SELECT * FROM banners ORDER BY sort_order ASC, id DESC");
      $banners = $banners_stmt->fetchAll();
      $isFirstBanner = true;
      foreach ($banners as $banner) {
          $b_img = (strpos($banner['image_path'], 'assets/') === 0) ? $banner['image_path'] : 'uploads/' . $banner['image_path'];
      ?>
    <div class="carousel-item <?php echo $isFirstBanner ? 'active' : ''; ?>">
      <img src="<?php echo htmlspecialchars($b_img); ?>" class="d-block w-100" alt="<?php echo htmlspecialchars($banner['title'] ?? 'Campus View'); ?>">
    </div>
      <?php $isFirstBanner = false; } ?>
  </div>
</div></div></div></div></div></div><div data-vc-full-width="true" data-vc-full-width-temp="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_row-no-padding"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div class="wpb_raw_code wpb_raw_html wpb_content_element" >
		<div class="wpb_wrapper">
			
    <div class="announcement-bar">
        <span class="announcement-label">ANNOUNCEMENTS</span>
        <div class="marquee-container">
            <div class="marquee-content">
            <?php
            $ann_stmt = $pdo->prepare("
                SELECT title AS post_title, slug AS post_name 
                FROM announcements 
                ORDER BY created_at DESC LIMIT 5
            ");
            $ann_stmt->execute();
            $announcements = $ann_stmt->fetchAll();
            foreach ($announcements as $announcement) {
            ?>
                <img decoding="async" src="assets/images/Layer-19.png" alt="Announcement Icon">
                <span class="announcement-item"><a href="announcements/<?php echo $announcement['post_name']; ?>/"><?php echo htmlspecialchars($announcement['post_title']); ?></a></span>
            <?php } ?>
            </div>
        </div>
    </div>


    

		</div>
	</div>
</div></div></div></div><div class="vc_row-full-width vc_clearfix"></div><div data-vc-full-width="true" data-vc-full-width-temp="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid section vc_row-o-content-middle vc_row-flex"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div class="wpb_raw_code wpb_raw_html wpb_content_element" >
		<div class="wpb_wrapper">
			<style>
/* ===== Force Remove Any Top Spacing ===== */
.kalam-hero,
.kalam-hero * {
    box-sizing: border-box;
}

/* Main wrapper */
.kalam-hero {
    margin: 0 !important;
    padding: 0 !important;
    border: 0 !important;
    font-family: "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
}

/* Grid */
.kalam-grid {
    margin: 0 !important;
    padding: 0 !important;
    display: grid;
    grid-template-columns: 1.1fr 1fr;
    gap: 50px;
    align-items: center;
}

/* Image fix */
.kalam-image {
    margin: 0 !important;
    padding: 0 !important;
}

.kalam-image img {
    display: block; /* VERY IMPORTANT */
    width: 100%;
    margin: 0 !important;
    padding: 0 !important;
    border-radius: 16px;
    box-shadow: 0 22px 45px rgba(0,0,0,0.18);
}

/* Content */
.kalam-content {
    margin: 0 !important;
    padding: 0 !important;
}

/* Remove heading default margins */
.kalam-content h1 {
    margin: 0 0 12px 0 !important;
    padding: 0 !important;
    line-height: 1.25;
    font-weight: 700;
    color: #0b2c4d;
}

.kalam-content h1 span {
    color: #c7912a;
}

/* Divider */
.kalam-divider {
    margin: 16px 0 24px !important;
    width: 90px;
    height: 4px;
    background: #c7912a;
    border-radius: 2px;
}

/* Paragraphs */
.kalam-content p {
    margin: 0 0 14px 0 !important;
    font-size: 16px;
    line-height: 1.85;
    color: #444;
    text-align: justify;
}

/* Responsive */
@media (max-width: 900px) {
    .kalam-grid {
        grid-template-columns: 1fr;
    }

    .kalam-content h1 {
        font-size: 30px;
    }
}
</style>


<?php
$welcome_title = $pdo->query("SELECT setting_value FROM settings WHERE setting_key = 'welcome_title'")->fetchColumn();
$welcome_content = $pdo->query("SELECT setting_value FROM settings WHERE setting_key = 'welcome_content'")->fetchColumn();
$welcome_image = $pdo->query("SELECT setting_value FROM settings WHERE setting_key = 'welcome_image'")->fetchColumn();
$w_img = ($welcome_image && strpos($welcome_image, 'assets/') === 0) ? $welcome_image : (($welcome_image) ? 'uploads/' . $welcome_image : 'assets/images/New-Dron-Campus-Pic01-1.jpg');
?>
<div class="kalam-hero">
    <div class="kalam-grid">

        <!-- Image Column -->
        <div class="kalam-image">
            <img decoding="async" src="<?php echo htmlspecialchars($w_img); ?>"
                 alt="Welcome to Dr. A. P. J. Abdul Kalam University">
        </div>

        <!-- Content Column -->
        <div class="kalam-content">
            <h1><?php echo $welcome_title ?: 'Welcome to <br><span>Dr. A. P. J. Abdul Kalam University</span>'; ?></h1>

            <div class="kalam-divider"></div>

            <?php echo $welcome_content; ?>
        </div>

    </div>
</div>

		</div>
	</div>

	<div class="wpb_raw_code wpb_raw_html wpb_content_element" >
		<div class="wpb_wrapper">
			<div class="stats-wrapper">
<?php
$stats_stmt = $pdo->query("SELECT * FROM stats_counter ORDER BY sort_order ASC, id ASC");
$stats = $stats_stmt->fetchAll();
foreach ($stats as $stat) {
?>
  <div class="stat-card">
    <h2 class="stat-value"><?php echo htmlspecialchars($stat['value']); ?></h2>
    <p class="stat-title"><?php echo htmlspecialchars($stat['title']); ?></p>
  </div>
<?php } ?>
</div>

		</div>
	</div>
<div class="vc_row wpb_row vc_inner vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-4"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element" >
		<div class="wpb_wrapper">
			
    <div class="event-widget">
        <div class="event-header">Upcoming Events</div>
        <ul>
            <?php
            $events_stmt = $pdo->prepare("
                SELECT title AS post_title, slug AS post_name, event_date 
                FROM events 
                ORDER BY event_date DESC LIMIT 5
            ");
            $events_stmt->execute();
            $events = $events_stmt->fetchAll();
            foreach ($events as $event) {
                $date_raw = $event['event_date'];
                if ($date_raw) {
                    $formatted_date = date('d/m/Y', strtotime($date_raw));
                } else {
                    $formatted_date = '';
                }
            ?>
            <li>
                <div class="event-content">
                    <span class="event-icon">
                        <img decoding="async" src="https://cdn-icons-png.flaticon.com/128/747/747310.png" alt="Calendar">
                        <span class="date"><?php echo htmlspecialchars($formatted_date); ?></span>
                    </span>
                    <span class="event-title"><a href="event/<?php echo $event['post_name']; ?>/"><?php echo htmlspecialchars($event['post_title']); ?></a></span>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>

    

		</div>
	</div>
</div></div></div><div class="wpb_column vc_column_container vc_col-sm-4"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div class="wpb_raw_code wpb_raw_html wpb_content_element youtube" >
		<div class="wpb_wrapper">
			<!--<div class="card-main">-->
<!--    <div class="card">-->
<!--        <div class="image-container">-->
<!--            <video autoplay muted loop playsinline>-->
<!--                <source src="assets/images/aku_reel.mp4" type="video/mp4">-->
<!--                Your browser does not support the video tag.-->
<!--            </video>-->
<!--            <div class="overlay-360">-->
<!--                <img decoding="async" src="assets/images/360-degrees.png" alt="360 Overlay Icon">-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="card-bottom">-->
<!--            360° Virtual Tour-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<style>
/* --- popup --- */
.video-popup{display:none;position:fixed;inset:0;background:rgba(0,0,0,.8);
  justify-content:center;align-items:center;z-index:9999}
.video-popup-content{position:relative;width:min(90vw,900px);background:#000;
  border-radius:12px;overflow:hidden}
.video-popup-close{position:absolute;top:10px;right:14px;color:#fff;font-size:26px;
  font-weight:700;cursor:pointer;z-index:10000}
.video-popup iframe{width:100%;height:56.25vw;max-height:62vh}
/* --- card fixes --- */
.image-container{position:relative;overflow:hidden;border-radius:16px}
.image-container video{display:block;width:100%;height:auto}
.overlay-360{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);
  z-index:3;pointer-events:auto;cursor:pointer}
.card-bottom{cursor:pointer;user-select:none}
</style>

<div class="card-main">
  <div class="card">
    <div class="image-container">
      <?php $video_src = "uploads/2025/07/aku_reel.mp4"; ?>
      <video autoplay muted loop playsinline>
        <source src="<?php echo htmlspecialchars($video_src); ?>" type="video/mp4">
        Your browser does not support the video tag.
      </video>
      <!-- make the 360 icon clickable too -->
      <div class="overlay-360" role="button" aria-label="Open 360° tour" tabindex="0">
        <img decoding="async" src="assets/images/360-degrees.png" alt="360 Overlay Icon">
      </div>
    </div>
    <div class="card-bottom" id="openTour">360° Virtual Tour</div>
  </div>
</div>

<!-- Popup -->
<div class="video-popup" id="videoPopup" aria-hidden="true">
  <div class="video-popup-content">
    <span class="video-popup-close" id="closePopup" aria-label="Close">&times;</span>
    <iframe id="youtubeVideo" src="" frameborder="0"
      allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const popup = document.getElementById('videoPopup');
  const iframe = document.getElementById('youtubeVideo');
  const openers = [document.getElementById('openTour'), ...document.querySelectorAll('.overlay-360')];
  const YT_ID = 's0s6ePt2K-U';

  function openVideo() {
    iframe.src = `https://www.youtube.com/embed/${YT_ID}?autoplay=1&rel=0&modestbranding=1`;
    popup.style.display = 'flex';
    popup.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
  }
  function closeVideo() {
    iframe.src = 'about:blank'; // stop playback reliably
    popup.style.display = 'none';
    popup.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  openers.forEach(el => {
    if (!el) return;
    el.style.cursor = 'pointer';
    el.addEventListener('click', openVideo);
    el.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openVideo(); }
    });
  });

  document.getElementById('closePopup').addEventListener('click', closeVideo);
  popup.addEventListener('click', (e) => { if (e.target === popup) closeVideo(); });
  document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeVideo(); });
});
</script>

		</div>
	</div>
</div></div></div><div class="wpb_column vc_column_container vc_col-sm-4"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element" >
		<div class="wpb_wrapper">
			
    <div class="notice-widget">
        <div class="notice-header">Notice Board</div>
        <ul>
            <?php
            $notices_stmt = $pdo->prepare("
                SELECT title AS post_title, slug AS post_name 
                FROM notices 
                ORDER BY notice_date DESC LIMIT 6
            ");
            $notices_stmt->execute();
            $notices = $notices_stmt->fetchAll();
            foreach ($notices as $notice) {
            ?>
            <li><a href="notice-board/<?php echo $notice['post_name']; ?>/"><?php echo htmlspecialchars($notice['post_title']); ?></a></li>
            <?php } ?>
        </ul>
    </div>

    

		</div>
	</div>
</div></div></div></div></div></div></div></div><div class="vc_row-full-width vc_clearfix"></div><div data-vc-full-width="true" data-vc-full-width-temp="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid section vc_row-o-content-middle vc_row-flex"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper"><h2 style="text-align: center" class="vc_custom_heading vc_do_custom_heading university-heading wpb_animate_when_almost_visible wpb_fadeIn fadeIn" >Voice of Experience</h2><div class="vc_row wpb_row vc_inner vc_row-fluid vc_row-o-content-middle vc_row-flex"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element" >
		<div class="wpb_wrapper">
			        <div class="owl-carousel author-list voi-carousel">
            <?php
            $voi_stmt = $pdo->prepare("SELECT title, slug, designation, image_path FROM voice_of_experience ORDER BY created_at DESC");
            $voi_stmt->execute();
            $vois = $voi_stmt->fetchAll();
            foreach ($vois as $voi) {
                $img_url = $voi['image_path'] ? 'uploads/' . $voi['image_path'] : 'assets/images/placeholder.jpg';
            ?>
                <div class="author-item voi-card">
                    <!-- Image -->
                    <a href="voi/<?php echo $voi['slug']; ?>/" class="author-item-inner">
                        <img loading="lazy" decoding="async" width="240" height="300" src="<?php echo htmlspecialchars($img_url); ?>" class="attachment-medium size-medium wp-post-image" alt="<?php echo htmlspecialchars($voi['title']); ?>" style="object-fit:cover;" />
                    </a>

                    <!-- Content BELOW image -->
                    <div class="voi-content">
                        <h4 class="voi-name">
                            <a href="voi/<?php echo $voi['slug']; ?>/"><?php echo htmlspecialchars($voi['title']); ?></a>
                        </h4>
                        <p class="voi-designation"><?php echo htmlspecialchars($voi['designation']); ?></p>
                        <a href="voi/<?php echo $voi['slug']; ?>/" class="voi-readmore">View Profile →</a>
                    </div>
                </div>
            <?php } ?>
        </div>

        <script>
        jQuery(document).ready(function($){
            $('.voi-carousel').owlCarousel({
                loop: true,
                margin: 30,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayHoverPause: true,
                navText: [
                    "<span class='material-symbols-rounded'>chevron_left</span>",
                    "<span class='material-symbols-rounded'>chevron_right</span>"
                ],
                responsive: {
                    0: { items: 1 },
                    560: { items: 2 },
                    768: { items: 3 },
                    1024: { items: 4 }
                }
            });
        });
        </script>
        

		</div>
	</div>
</div></div></div></div></div></div></div></div><div class="vc_row-full-width vc_clearfix"></div><div data-vc-full-width="true" data-vc-full-width-temp="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid page-slider-section section"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper"><div class="vc_row wpb_row vc_inner vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element" >
		<div class="wpb_wrapper">
                    <div class="owl-carousel page-slider page-carosel">
                <div class="page-slide">
                    <div class="slide-content">
                        <a href="why-aku/" class="slide-img-link">
                            <img decoding="async" src="assets/images/about.jpg" alt="Why AKU">
                        </a>
                        <div class="text-content">
                            <h3><a href="why-aku/" style="color: inherit; text-decoration: none;">Why AKU</a></h3>
                            <p>Our Faculty-to-Student Ratio allows faculties to focus on the individual learning styles and needs of each student in our University.</p>
                            <a href="why-aku/" class="read-more btn btn-white" style="text-decoration: none;">
                                <span class="btn-text">Read More</span> 
                                <span class="btn-arrow"><i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="page-slide">
                    <div class="slide-content">
                        <a href="faculty-welfare/" class="slide-img-link">
                            <img decoding="async" src="assets/images/facultywa.jpg" alt="Faculty Welfare">
                        </a>
                        <div class="text-content">
                            <h3><a href="faculty-welfare/" style="color: inherit; text-decoration: none;">Faculty Welfare</a></h3>
                            <p>We believe in providing the best environment and support for our faculties to help them excel in their academic endeavors.</p>
                            <a href="faculty-welfare/" class="read-more btn btn-white" style="text-decoration: none;">
                                <span class="btn-text">Read More</span> 
                                <span class="btn-arrow"><i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="page-slide">
                    <div class="slide-content">
                        <a href="awardsand-recognigation/" class="slide-img-link">
                            <img decoding="async" src="assets/images/award1.jpg" alt="Awards & Recognition">
                        </a>
                        <div class="text-content">
                            <h3><a href="awardsand-recognigation/" style="color: inherit; text-decoration: none;">Awards & Recognition</a></h3>
                            <p>Explore the various accolades and milestones achieved by our university, recognizing excellence across multiple disciplines.</p>
                            <a href="awardsand-recognigation/" class="read-more btn btn-white" style="text-decoration: none;">
                                <span class="btn-text">Read More</span> 
                                <span class="btn-arrow"><i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="page-slide">
                    <div class="slide-content">
                        <a href="our-recruiters/" class="slide-img-link">
                            <img decoding="async" src="assets/images/placement.jpg" alt="Our Recruiters">
                        </a>
                        <div class="text-content">
                            <h3><a href="our-recruiters/" style="color: inherit; text-decoration: none;">Our Recruiters</a></h3>
                            <p>Our strong industry ties ensure that top recruiters visit our campus, providing excellent career opportunities for our students.</p>
                            <a href="our-recruiters/" class="read-more btn btn-white" style="text-decoration: none;">
                                <span class="btn-text">Read More</span> 
                                <span class="btn-arrow"><i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="page-slide">
                    <div class="slide-content">
                        <a href="gallery/" class="slide-img-link">
                            <img decoding="async" src="assets/images/gallery.jpg" alt="Gallery">
                        </a>
                        <div class="text-content">
                            <h3><a href="gallery/" style="color: inherit; text-decoration: none;">Gallery</a></h3>
                            <p>Take a visual tour of our vibrant campus life, academic events, cultural fests, and state-of-the-art facilities.</p>
                            <a href="gallery/" class="read-more btn btn-white" style="text-decoration: none;">
                                <span class="btn-text">Read More</span> 
                                <span class="btn-arrow"><i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                    </div>
 

<script>
jQuery(document).ready(function($) {
    $(".page-slider").owlCarousel({
        loop: false,
        margin:30,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplaySpeed: 1000,
        autoplayHoverPause: true,
        responsive: {
            0: { items: 1 },
            768: { items: 3 },
            1024: { items: 4 }
        }
    });
});
</script>
    

		</div>
	</div>
</div></div></div></div></div></div></div></div><div class="vc_row-full-width vc_clearfix"></div><div data-vc-full-width="true" data-vc-full-width-temp="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_row-o-content-middle vc_row-flex"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper"><div class="vc_row wpb_row vc_inner vc_row-fluid vc_row-o-content-middle vc_row-flex"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper"><div class="vc_empty_space"   style="height: 32px"><span class="vc_empty_space_inner"></span></div><h2 style="text-align: center" class="vc_custom_heading vc_do_custom_heading" >Media Coverage</h2>
	<div class="wpb_text_column wpb_content_element media-img media-text" >
		<div class="wpb_wrapper">
			<div class="grid-media">
            <?php
            $media_stmt = $pdo->prepare("SELECT title, slug, image_path FROM media_coverage ORDER BY created_at DESC LIMIT 4");
            $media_stmt->execute();
            $medias = $media_stmt->fetchAll();
            foreach ($medias as $media) {
                $img_url = $media['image_path'] ? 'uploads/' . $media['image_path'] : 'assets/images/placeholder.jpg';
            ?>
                <div class="grid-item">
                    <a href="media-coverage-aku/<?php echo $media['slug']; ?>/">
                        <img decoding="async" src="<?php echo htmlspecialchars($img_url); ?>" alt="<?php echo htmlspecialchars($media['title']); ?>">
                        <p class="text-18"><?php echo htmlspecialchars($media['title']); ?></p>
                    </a>
                </div>
            <?php } ?>
            </div>

		</div>
	</div>
</div></div></div></div></div></div></div></div><div class="vc_row-full-width vc_clearfix"></div><div data-vc-full-width="true" data-vc-full-width-temp="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1743410564552 vc_row-has-fill"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element" >
		<div class="wpb_wrapper">
			         
        <div class="blog-section">
            <h2 class="blog-title">Latest Blogs</h2>
            <div class="blog-container">
            <?php
            $blog_stmt = $pdo->prepare("SELECT title, slug, image_path, content FROM blogs ORDER BY created_at DESC LIMIT 3");
            $blog_stmt->execute();
            $blogs = $blog_stmt->fetchAll();
            foreach($blogs as $blog) {
                $excerpt = strip_tags($blog['content']);
                if (strlen($excerpt) > 100) {
                    $excerpt = substr($excerpt, 0, 100) . '&hellip;';
                }
                
                if (strpos($blog['image_path'], 'assets/') === 0) {
                    $image_src = $blog['image_path'];
                } else {
                    $image_src = $blog['image_path'] ? 'uploads/' . $blog['image_path'] : 'assets/images/placeholder.jpg';
                }
            ?>
                <div class="blog-card">
                    <div class="blog-image">
                        <img loading="lazy" decoding="async" width="300" height="200" src="<?php echo htmlspecialchars($image_src); ?>" class="attachment-medium size-medium wp-post-image" alt="" style="object-fit:cover; aspect-ratio:3/2; width:100%; height:auto;" />
                    </div>
                    <div class="blog-content">
                        <h3><?php echo htmlspecialchars($blog['title']); ?></h3>
                        <p><?php echo $excerpt; ?></p>
                        <a href="blog/<?php echo $blog['slug']; ?>/" class="read-more btn btn-white">
                            <span class="btn-text">Read More</span> 
                            <span class="btn-arrow">
                                 <i class="fa-solid fa-arrow-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            <?php } ?>
            </div>
<!--             <div class="view-all">
                <a href="blogs" class="view-all-btn">View All Blogs</a>
                
            </div> -->
        </div>
         
    
    

		</div>
	</div>
</div></div></div></div><div class="vc_row-full-width vc_clearfix"></div><div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element" >
		<div class="wpb_wrapper">
			    <div class="owl-carousel logo-slider">
        <div><img decoding="async" src="assets/images/mp.png" alt="Logo 1"></div>
        <div><img decoding="async" src="assets/images/aicte.png" alt="Logo 2"></div>
        <!-- <div><img decoding="async" src="assets/images/28082019_035747_COA.png" alt="Logo 3"></div> -->
        <div><img decoding="async" src="assets/images/ugc.png" alt="Logo 4"></div>
        <div><img decoding="async" src="assets/images/pci.png" alt="Logo 5"></div>
        <div><img decoding="async" src="assets/images/ncte1.png" alt="Logo 6"></div>
        <div><img decoding="async" src="assets/images/28082019_035733_BOI.png" alt="Logo 7"></div>
    </div>
<script>
jQuery(document).ready(function($) {
    $(".logo-slider").owlCarousel({
        loop: true,
        margin: 20,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplaySpeed: 1000,
        autoplayHoverPause: false,
        dots: false,
        nav: false,
        responsive: {
            0: { items: 3 },
            600: { items: 5 },
            1000: { items: 7 }
        }
    });
});
</script>
    

		</div>
	</div>
</div></div></div></div>
</div>	</div><!-- .entry-content -->
	</div>
	</article><!-- #post-7 -->  
	</main><!-- #main -->
</div>
<?php include 'footer.php'; ?>
