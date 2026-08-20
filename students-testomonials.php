<?php 
$pageTitle = "Student Testimonials & Video Stories - Dr. APJ Abdul Kalam University, Indore";
include 'header.php'; 

$studentReels = [
    ['name' => 'Virendra Chouhan', 'course' => 'Computer Science & Engineering', 'video' => 'uploads/2026/01/1.mp4', 'rating' => 5, 'quote' => 'The hands-on lab practicals and dedicated faculty guidance prepared me thoroughly for corporate coding interviews.'],
    ['name' => 'Dilshad Mansoori', 'course' => 'Business Administration (MBA)', 'video' => 'uploads/2026/01/2.mp4', 'rating' => 5, 'quote' => 'AKU gave me the confidence, leadership exposure, and industry linkage that kickstarted my management career.'],
    ['name' => 'Priyal Jaiswal', 'course' => 'Pharmaceutical Sciences (B.Pharm)', 'video' => 'uploads/2026/01/4.mp4', 'rating' => 5, 'quote' => 'The advanced formulation labs, machine room, and plant visits gave me practical industrial competency.'],
    ['name' => 'Sanjay Verma', 'course' => 'Mechanical Engineering (B.E.)', 'video' => 'uploads/2026/01/5.mp4', 'rating' => 5, 'quote' => 'Campus placement support and industrial internships helped me bag an enviable core engineering role.'],
    ['name' => 'Pratik Sharma', 'course' => 'Information Technology (B.Tech)', 'video' => 'uploads/2026/01/3.mp4', 'rating' => 5, 'quote' => 'High-speed campus network, modern smart classrooms, and supportive professors made learning enjoyable.'],
    ['name' => 'Bharti Namdev', 'course' => 'Commerce & Banking (B.Com)', 'video' => 'uploads/2026/01/8.mp4', 'rating' => 5, 'quote' => 'The environment at Kalam University is vibrant, secure, and full of co-curricular opportunities.'],
    ['name' => 'Yash Rathore', 'course' => 'Computer Applications (MCA)', 'video' => 'uploads/2026/01/7.mp4', 'rating' => 5, 'quote' => 'Direct campus recruitment drives by top IT giants gave me a seamless transition from campus to corporate.']
];
?>

<style>
.reel-video-card {
    background: #ffffff;
    border: 1px solid var(--border-color);
    border-radius: 1.25rem;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.reel-video-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 24px rgba(0,0,0,0.09);
    border-color: rgba(212, 175, 55, 0.4);
}
.reel-video-wrapper {
    position: relative;
    width: 100%;
    height: 380px;
    background: #0f172a;
    display: flex;
    align-items: center;
    justify-content: center;
}
.reel-video-wrapper video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.reel-body {
    padding: 1.25rem;
}
</style>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="gallery.php">Campus Life</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Student Testimonials</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> VOICES OF SUCCESS &amp; TRANSFORMATION
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Student Testimonials &amp; Stories
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Hear Directly from our Students &amp; Proud Graduates
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
                                <i class="fa-solid fa-video"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Authentic Student Experiences</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Hear directly from students across Engineering, Pharmacy, Management, Computer Science, and Agriculture sharing their academic journey, placement success stories, and life on campus.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Video Reels Grid -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-play"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Student Video Stories</h3>
                            </div>
                            <span class="badge bg-gold text-dark fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.75rem;">Verified Student Reviews</span>
                        </div>

                        <div class="row g-4">
                            <?php foreach ($studentReels as $reel): ?>
                            <div class="col-md-6 col-xl-4">
                                <div class="reel-video-card h-100 d-flex flex-column justify-content-between">
                                    <div class="reel-video-wrapper">
                                        <video controls preload="metadata">
                                            <source src="<?php echo htmlspecialchars($reel['video']); ?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                    <div class="reel-body flex-grow-1 d-flex flex-column justify-content-between">
                                        <div>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <h5 class="font-serif text-primary fw-bold fs-6 mb-0"><?php echo htmlspecialchars($reel['name']); ?></h5>
                                                <div class="text-gold" style="font-size: 0.75rem;">
                                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>
                                            <span class="badge bg-light text-dark border mb-2" style="font-size: 0.72rem;"><?php echo htmlspecialchars($reel['course']); ?></span>
                                            <p class="small text-muted-custom mb-0 font-serif fst-italic" style="font-size: 0.84rem; line-height: 1.55;">
                                                "<?php echo htmlspecialchars($reel['quote']); ?>"
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Admission Assistance CTA Strip -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mb-4">
                        <div class="d-flex align-items-center gap-3.5">
                            <div class="intro-highlight-badge" style="width: 52px; height: 52px; font-size: 1.25rem;">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>
                            <div>
                                <h4 class="font-serif text-primary fs-6 fw-bold mb-0.5">Start Your Journey at Dr. APJ Abdul Kalam University</h4>
                                <p class="text-muted-custom small mb-0">Admissions open for Session 2026-27 across UG, PG and Diploma programs.</p>
                            </div>
                        </div>
                        <a href="admission-procedure.php" class="btn btn-sm btn-gold-pill px-4 py-2 fw-bold">
                            <i class="fa-solid fa-paper-plane me-1.5"></i> Apply for Admission
                        </a>
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
