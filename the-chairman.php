<?php 
require_once 'db.php';
include 'header.php'; 

// Fetch dynamic content from about_pages_config
$page_data = [];
try {
    $stmt = $pdo->prepare("SELECT * FROM about_pages_config WHERE page_slug = 'the-chairman'");
    $stmt->execute();
    $page_data = $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
} catch (Exception $e) {}

$hero_eyebrow = !empty($page_data['hero_eyebrow']) ? $page_data['hero_eyebrow'] : 'UNIVERSITY LEADERSHIP';
$page_title = !empty($page_data['page_title']) ? $page_data['page_title'] : 'Message from the Chairman';
$hero_subtitle = !empty($page_data['hero_subtitle']) ? $page_data['hero_subtitle'] : 'Dr. Sunil Kapoor · Chairman, Dr. A.P.J. Abdul Kalam University';
$leader_name = !empty($page_data['leader_name']) ? $page_data['leader_name'] : 'Dr. Sunil Kapoor';
$leader_designation = !empty($page_data['leader_designation']) ? $page_data['leader_designation'] : 'Chairman';
$badge_text = !empty($page_data['badge_text']) ? $page_data['badge_text'] : 'University Leadership';
$quote = !empty($page_data['quote']) ? $page_data['quote'] : 'Dr. Kapoor’s journey is a testament to his belief in the harmonious coexistence of humanity and advancement — a principle he lives by and promotes wholeheartedly.';
$image_path = !empty($page_data['image_path']) ? $page_data['image_path'] : 'uploads/2025/06/sunilkapoor.jpeg';
$main_content = !empty($page_data['main_content']) ? $page_data['main_content'] : '<p>The esteemed Chairman of Dr. A. P. J. Abdul Kalam University, Indore, is a visionary leader driven by dreams, dedication, and a deep sense of purpose. Known for his dynamic personality and unwavering sincerity, Dr. Kapoor upholds the nobility and responsibility that comes with his position in the field of education. His life’s work reflects a profound commitment to nurturing the aspirations of the youth and empowering them through quality education.</p><p>Having embarked on his professional journey in the medical field, Dr. Kapoor has consistently advocated for enhanced educational infrastructure and an improved curriculum that meets the evolving needs of young minds. His steadfast belief in the transformative power of education has shaped his contributions over the years, both as a professional and as a mentor.</p><p>Dr. Kapoor also recognizes the moral responsibility that accompanies positions of influence. With a heart rooted in service and a mind focused on development, he seamlessly balances societal welfare with personal and institutional progress. Whether in healthcare, education, or leadership, he has always strived to integrate compassion with innovation.</p><p>He is widely respected for his empathetic approach, exceptional communication skills, patience, and his ability to identify and address key issues. His constant enthusiasm for learning and adapting to the latest developments in his field underscores his commitment to lifelong growth.</p>';
?>

<!-- Inner Page Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="why-aku.php">About</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">The Chairman</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> <?php echo htmlspecialchars($hero_eyebrow); ?>
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 900px; line-height: 1.15;">
            <?php echo htmlspecialchars($page_title); ?>
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            <?php echo htmlspecialchars($hero_subtitle); ?>
        </p>
    </div>
</section>

<main class="py-5" style="background-color: var(--bg-ivory);">
    <div class="container-custom">
        <div class="row g-4 g-xl-5">
            
            <!-- Left Main Content Area -->
            <div class="col-lg-8 col-xl-9">
                <article class="inner-main-card">
                    
                    <!-- Chairman Profile Card -->
                    <div class="row g-4 align-items-center mb-4 pb-4 border-bottom border-custom">
                        <div class="col-md-5">
                            <div class="leader-portrait-frame text-center p-2">
                                <img src="<?php echo htmlspecialchars($image_path); ?>" alt="<?php echo htmlspecialchars($leader_name); ?>" class="rounded-3 shadow-sm w-100" style="max-height: 380px; object-fit: cover;" />
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="badge-pill-blur mb-2 d-inline-block px-3 py-1 text-primary fw-bold" style="background: #f0eae1; font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase;">
                                <?php echo htmlspecialchars($badge_text); ?>
                            </div>
                            <h2 class="font-serif text-primary display-6 fw-bold mb-1"><?php echo htmlspecialchars($leader_name); ?></h2>
                            <div class="text-gold fw-semibold fs-6 mb-3"><?php echo htmlspecialchars($leader_designation); ?></div>
                            <p class="text-muted-custom small lh-base mb-0">
                                Dr. A.P.J. Abdul Kalam University, Indore (M.P.)
                            </p>
                        </div>
                    </div>

                    <!-- Leadership Quote Banner -->
                    <?php if (!empty($quote)): ?>
                    <div class="p-4 rounded-3 mb-4 position-relative overflow-hidden" style="background: linear-gradient(135deg, rgba(112,0,24,0.06) 0%, rgba(212,175,55,0.08) 100%); border-left: 4px solid var(--gold-color);">
                        <i class="fa-solid fa-quote-left text-gold opacity-25 position-absolute" style="font-size: 3.5rem; top: 10px; right: 15px;"></i>
                        <p class="font-serif fs-5 fst-italic text-dark mb-0 position-relative" style="line-height: 1.6; z-index: 1;">
                            "<?php echo htmlspecialchars($quote); ?>"
                        </p>
                    </div>
                    <?php endif; ?>

                    <!-- Message Body -->
                    <div class="inner-page-body-text" style="line-height: 1.85; font-size: 0.98rem; color: #3e3233;">
                        <?php echo $main_content; ?>
                    </div>

                    <!-- Contact / Statutory Help Footer -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mt-5">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Need More Information?</h5>
                            <p class="small text-muted-custom mb-0">For statutory documentation or institutional inquiries, reach out to the Registrar Office.</p>
                        </div>
                        <a href="contact-us.php" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold">
                            <i class="fa-solid fa-headset me-1"></i> Contact Registrar
                        </a>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <?php include 'about-sidebar.php'; ?>
            </div>

        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
