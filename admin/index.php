<?php
require_once 'auth.php';
require_once 'header.php';

// Fetch quick counts
$schools_count = $pdo->query("SELECT COUNT(*) FROM homepage_schools")->fetchColumn();
$events_count = $pdo->query("SELECT COUNT(*) FROM events")->fetchColumn();
$notices_count = $pdo->query("SELECT COUNT(*) FROM notices")->fetchColumn();
$media_count = $pdo->query("SELECT COUNT(*) FROM media_coverage")->fetchColumn();
$blogs_count = $pdo->query("SELECT COUNT(*) FROM blogs")->fetchColumn();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="font-serif fw-bold text-primary mb-1">Executive CMS Dashboard</h2>
        <p class="text-muted small mb-0">Manage all dynamic content, video hero, academic schools, and news for Dr. APJ Abdul Kalam University.</p>
    </div>
    <a href="../index.php" target="_blank" class="btn btn-primary rounded-pill px-4 py-2 small fw-semibold">
        <i class="fa-solid fa-eye me-1"></i> Preview Homepage
    </a>
</div>

<!-- Stat Counters Row -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <h3><?php echo $schools_count; ?></h3>
            <p>Academic Schools</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: #d4af37;">
            <h3><?php echo $events_count; ?></h3>
            <p>Active Events</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: #198754;">
            <h3><?php echo $notices_count; ?></h3>
            <p>Official Notices</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: #0dcaf0;">
            <h3><?php echo $media_count + $blogs_count; ?></h3>
            <p>Media & Stories</p>
        </div>
    </div>
</div>

<!-- Homepage Management Quick Action Cards -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-white py-3">
        <h5 class="font-serif text-primary fw-bold mb-0"><i class="fa-solid fa-sliders text-gold me-2"></i>Homepage CMS Sections</h5>
    </div>
    <div class="card-body p-4">
        <div class="row g-3">
            
            <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="fa-solid fa-video text-primary fs-5"></i>
                            <strong class="font-serif fs-6">Hero Section & Video</strong>
                        </div>
                        <p class="text-muted small mb-3">Edit headline, video background, accreditation badges, and 4 glance counters.</p>
                    </div>
                    <a href="hero_manager.php" class="btn btn-sm btn-outline-primary rounded-pill w-100">Edit Hero Section</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="fa-solid fa-university text-primary fs-5"></i>
                            <strong class="font-serif fs-6">About & 3 Pillars</strong>
                        </div>
                        <p class="text-muted small mb-3">Update Kalam conviction intro text, establishment badge, and 3 feature pillars.</p>
                    </div>
                    <a href="about_manager.php" class="btn btn-sm btn-outline-primary rounded-pill w-100">Edit About Section</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="fa-solid fa-graduation-cap text-primary fs-5"></i>
                            <strong class="font-serif fs-6">12 Academic Schools</strong>
                        </div>
                        <p class="text-muted small mb-3">Manage schools, degree tabs (UG/PG/Diploma/Ph.D), icons, and program counts.</p>
                    </div>
                    <a href="schools_manager.php" class="btn btn-sm btn-outline-primary rounded-pill w-100">Manage Schools</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="fa-solid fa-star text-primary fs-5"></i>
                            <strong class="font-serif fs-6">Why AKU (6 Cards)</strong>
                        </div>
                        <p class="text-muted small mb-3">Update 6 reasons/feature cards, images, titles, and descriptions.</p>
                    </div>
                    <a href="why_aku_manager.php" class="btn btn-sm btn-outline-primary rounded-pill w-100">Manage Why AKU</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="fa-solid fa-flask text-primary fs-5"></i>
                            <strong class="font-serif fs-6">Research & Kalam Center</strong>
                        </div>
                        <p class="text-muted small mb-3">Edit Kalam Innovation Center info, patent stats, and 3 research papers.</p>
                    </div>
                    <a href="research_manager.php" class="btn btn-sm btn-outline-primary rounded-pill w-100">Manage Research</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="fa-solid fa-quote-left text-primary fs-5"></i>
                            <strong class="font-serif fs-6">Alumni Voices</strong>
                        </div>
                        <p class="text-muted small mb-3">Manage alumni quotes, student names, degree batches, and hiring companies.</p>
                    </div>
                    <a href="alumni_manager.php" class="btn btn-sm btn-outline-primary rounded-pill w-100">Manage Testimonials</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="fa-solid fa-th-large text-primary fs-5"></i>
                            <strong class="font-serif fs-6">Portals & Quick Services</strong>
                        </div>
                        <p class="text-muted small mb-3">Manage 8 interactive quick access shortcut cards on homepage.</p>
                    </div>
                    <a href="portals_manager.php" class="btn btn-sm btn-outline-primary rounded-pill w-100">Manage Portals</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="fa-solid fa-bullhorn text-primary fs-5"></i>
                            <strong class="font-serif fs-6">Admissions 2026 CTA</strong>
                        </div>
                        <p class="text-muted small mb-3">Edit CTA banner, button URLs, and 3 key application & exam dates.</p>
                    </div>
                    <a href="admissions_cta_manager.php" class="btn btn-sm btn-outline-primary rounded-pill w-100">Manage Admissions CTA</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="fa-solid fa-landmark text-primary fs-5"></i>
                            <strong class="font-serif fs-6">About Pages & Leadership</strong>
                        </div>
                        <p class="text-muted small mb-3">Manage Founder, Chancellor, VC, Registrar, Statutory Bodies & Disclosures.</p>
                    </div>
                    <a href="about_pages_manager.php" class="btn btn-sm btn-primary rounded-pill w-100" style="background-color: oklch(36% .13 25); border: none;">Manage About Pages</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="fa-solid fa-gear text-primary fs-5"></i>
                            <strong class="font-serif fs-6">Site Settings & Contacts</strong>
                        </div>
                        <p class="text-muted small mb-3">Update official address, phone numbers, emails, and social media handles.</p>
                    </div>
                    <a href="settings.php" class="btn btn-sm btn-outline-primary rounded-pill w-100">Site Settings</a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>
