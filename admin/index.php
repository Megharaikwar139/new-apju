<?php
require_once 'auth.php';
require_once 'header.php';

// Quick Counts
$leads_count = $pdo->query("SELECT COUNT(*) FROM admission_applications")->fetchColumn();
$new_leads_count = $pdo->query("SELECT COUNT(*) FROM admission_applications WHERE status = 'new'")->fetchColumn();
$inquiries_count = $pdo->query("SELECT COUNT(*) FROM contact_inquiries")->fetchColumn();
$unread_inquiries_count = $pdo->query("SELECT COUNT(*) FROM contact_inquiries WHERE status = 'unread'")->fetchColumn();
$schools_count = $pdo->query("SELECT COUNT(*) FROM homepage_schools")->fetchColumn();
$courses_count = $pdo->query("SELECT COUNT(*) FROM courses")->fetchColumn();
$events_count = $pdo->query("SELECT COUNT(*) FROM events")->fetchColumn();
$notices_count = $pdo->query("SELECT COUNT(*) FROM notices")->fetchColumn();
$recruiters_count = $pdo->query("SELECT COUNT(*) FROM recruiters")->fetchColumn();

// Recent 5 Admission Leads
$recent_leads = [];
try {
    $recent_leads = $pdo->query("SELECT * FROM admission_applications ORDER BY created_at DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {}

// Recent 5 Contact Inquiries
$recent_inquiries = [];
try {
    $recent_inquiries = $pdo->query("SELECT * FROM contact_inquiries ORDER BY created_at DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {}

// Recent 5 Notices
$recent_notices = [];
try {
    $recent_notices = $pdo->query("SELECT * FROM notices ORDER BY notice_date DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {}
?>

<!-- Dashboard Greeting & Actions -->
<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
    <div>
        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-gold text-dark fw-bold px-2.5 py-1 rounded-pill" style="font-size: 0.72rem;">EXECUTIVE DASHBOARD</span>
            <span class="text-muted small"><i class="fa-regular fa-calendar me-1"></i> <?php echo date('l, d F Y'); ?></span>
        </div>
        <h2 class="font-serif fw-bold text-primary display-6 mb-0" style="color: var(--admin-maroon-dark) !important;">
            Welcome back, <?php echo htmlspecialchars($_SESSION['admin_username'] ?? 'Administrator'); ?>
        </h2>
    </div>
    
    <div class="d-flex align-items-center gap-2">
        <a href="admissions_manager.php" class="btn btn-gold">
            <i class="fa-solid fa-user-graduate me-1.5"></i> View Admissions (<?php echo $new_leads_count; ?> New)
        </a>
        <a href="../index.php" target="_blank" class="btn btn-outline-primary">
            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Live Website
        </a>
    </div>
</div>

<!-- 4 Luxury Stat Metric Cards -->
<div class="row g-4 mb-4">
    
    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card gold-border">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <div class="stat-value text-primary"><?php echo $leads_count; ?></div>
                    <p class="stat-label">Admission Leads</p>
                </div>
                <div class="rounded-3 p-2 text-gold" style="background: rgba(212,175,55,0.15); font-size: 1.25rem;">
                    <i class="fa-solid fa-user-graduate"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between small pt-2 border-top">
                <span class="text-success fw-semibold"><i class="fa-solid fa-circle-dot me-1"></i> <?php echo $new_leads_count; ?> New Applications</span>
                <a href="admissions_manager.php" class="text-decoration-none text-muted fw-bold">Manage &rarr;</a>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <div class="stat-value"><?php echo $courses_count; ?></div>
                    <p class="stat-label">Academic Programs</p>
                </div>
                <div class="rounded-3 p-2 text-primary" style="background: rgba(88,8,19,0.08); font-size: 1.25rem;">
                    <i class="fa-solid fa-book-bookmark"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between small pt-2 border-top">
                <span class="text-muted"><?php echo $schools_count; ?> Academic Schools</span>
                <a href="courses_manager.php" class="text-decoration-none text-primary fw-bold">Courses &rarr;</a>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card gold-border">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <div class="stat-value text-primary"><?php echo $events_count; ?></div>
                    <p class="stat-label">Campus Events</p>
                </div>
                <div class="rounded-3 p-2 text-gold" style="background: rgba(212,175,55,0.15); font-size: 1.25rem;">
                    <i class="fa-solid fa-calendar-star"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between small pt-2 border-top">
                <span class="text-muted">Dynamic Calendar</span>
                <a href="events.php" class="text-decoration-none text-primary fw-bold">Events &rarr;</a>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card maroon-border">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <div class="stat-value text-primary"><?php echo $recruiters_count; ?></div>
                    <p class="stat-label">Partner Recruiters</p>
                </div>
                <div class="rounded-3 p-2 text-primary" style="background: rgba(88,8,19,0.08); font-size: 1.25rem;">
                    <i class="fa-solid fa-briefcase"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between small pt-2 border-top">
                <span class="text-muted">Fortune 500 Network</span>
                <a href="recruiters_manager.php" class="text-decoration-none text-primary fw-bold">Recruiters &rarr;</a>
            </div>
        </div>
    </div>

</div>

<!-- Recent Leads & Latest Circulars Split -->
<div class="row g-4 mb-4">
    
    <!-- Left: Recent Admission Leads Table -->
    <div class="col-lg-8">
        <div class="admin-card h-100">
            <div class="admin-card-header">
                <div class="d-flex align-items-center gap-2">
                    <i class="fa-solid fa-user-graduate text-gold fs-5"></i>
                    <h5 class="font-serif fw-bold mb-0" style="color: var(--admin-maroon-dark);">Recent Admission Inquiries</h5>
                </div>
                <a href="admissions_manager.php" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                    View All Leads (<?php echo $leads_count; ?>)
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Candidate</th>
                                <th>Contact Details</th>
                                <th>Course Applied</th>
                                <th>Date</th>
                                <th class="text-end">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($recent_leads)): ?>
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">No admission inquiries received yet.</td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($recent_leads as $lead): ?>
                            <tr>
                                <td>
                                    <strong class="text-dark d-block"><?php echo htmlspecialchars($lead['full_name'] ?? 'Candidate'); ?></strong>
                                    <span class="small text-muted"><?php echo htmlspecialchars($lead['city'] ?? 'Indore'); ?></span>
                                </td>
                                <td>
                                    <div class="small fw-semibold"><?php echo htmlspecialchars($lead['mobile'] ?? ''); ?></div>
                                    <div class="small text-muted"><?php echo htmlspecialchars($lead['email'] ?? ''); ?></div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border"><?php echo htmlspecialchars($lead['course'] ?? 'General Inquiry'); ?></span>
                                </td>
                                <td>
                                    <span class="small text-muted"><?php echo !empty($lead['created_at']) ? date('d M, Y', strtotime($lead['created_at'])) : 'Recent'; ?></span>
                                </td>
                                <td class="text-end">
                                    <span class="badge <?php echo (($lead['status'] ?? '') === 'new') ? 'bg-warning text-dark' : 'bg-success text-white'; ?> rounded-pill px-2.5 py-1">
                                        <?php echo ucfirst($lead['status'] ?? 'New'); ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Right: Latest Circulars Feed -->
    <div class="col-lg-4">
        <div class="admin-card h-100">
            <div class="admin-card-header">
                <div class="d-flex align-items-center gap-2">
                    <i class="fa-solid fa-bell text-gold fs-5"></i>
                    <h5 class="font-serif fw-bold mb-0" style="color: var(--admin-maroon-dark);">Recent Circulars</h5>
                </div>
                <a href="notices.php" class="btn btn-sm btn-outline-dark rounded-pill px-2.5 py-0.5 small">
                    Manage
                </a>
            </div>
            <div class="card-body p-3">
                <div class="d-flex flex-column gap-2.5">
                    <?php if (empty($recent_notices)): ?>
                        <p class="text-muted small text-center py-3">No active circulars.</p>
                    <?php else: ?>
                    <?php foreach ($recent_notices as $n): ?>
                        <div class="p-2.5 rounded-3 border bg-light d-flex align-items-start gap-2.5">
                            <span class="badge bg-primary text-white mt-1 flex-shrink-0" style="font-size: 0.65rem;">
                                <?php echo !empty($n['notice_date']) ? date('d M', strtotime($n['notice_date'])) : 'Notice'; ?>
                            </span>
                            <div class="lh-sm">
                                <strong class="small text-dark d-block"><?php echo htmlspecialchars(mb_strimwidth($n['title'], 0, 55, '...')); ?></strong>
                                <span class="text-muted" style="font-size: 0.72rem;">Published on Notice Board</span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Homepage Sections Quick Launcher Grid -->
<div class="admin-card">
    <div class="admin-card-header">
        <div class="d-flex align-items-center gap-2">
            <i class="fa-solid fa-sliders text-gold fs-5"></i>
            <h5 class="font-serif fw-bold mb-0" style="color: var(--admin-maroon-dark);">Homepage CMS Section Managers</h5>
        </div>
        <span class="badge bg-gold text-dark fw-bold px-3 py-1 rounded-pill">8 Dynamic Sections</span>
    </div>
    <div class="card-body p-4">
        <div class="row g-3">
            
            <div class="col-md-6 col-xl-3">
                <div class="p-3 border rounded-3 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1.5">
                            <i class="fa-solid fa-film text-primary fs-5"></i>
                            <strong class="font-serif fs-6">Hero &amp; Video</strong>
                        </div>
                        <p class="text-muted small mb-3">Background video, main heading &amp; 4 glance counters.</p>
                    </div>
                    <a href="hero_manager.php" class="btn btn-sm btn-outline-primary rounded-pill w-100">Edit Hero</a>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="p-3 border rounded-3 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1.5">
                            <i class="fa-solid fa-landmark text-primary fs-5"></i>
                            <strong class="font-serif fs-6">About &amp; 3 Pillars</strong>
                        </div>
                        <p class="text-muted small mb-3">Kalam vision text, foundation badge &amp; key pillars.</p>
                    </div>
                    <a href="about_manager.php" class="btn btn-sm btn-outline-primary rounded-pill w-100">Edit About</a>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="p-3 border rounded-3 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1.5">
                            <i class="fa-solid fa-graduation-cap text-primary fs-5"></i>
                            <strong class="font-serif fs-6">12 Academic Schools</strong>
                        </div>
                        <p class="text-muted small mb-3">Degree tabs (UG/PG/Ph.D), icons, and program counts.</p>
                    </div>
                    <a href="schools_manager.php" class="btn btn-sm btn-outline-primary rounded-pill w-100">Manage Schools</a>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="p-3 border rounded-3 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1.5">
                            <i class="fa-solid fa-star text-primary fs-5"></i>
                            <strong class="font-serif fs-6">Why AKU (6 Cards)</strong>
                        </div>
                        <p class="text-muted small mb-3">Rankings, 50-acre green campus, and global faculty.</p>
                    </div>
                    <a href="why_aku_manager.php" class="btn btn-sm btn-outline-primary rounded-pill w-100">Edit Why AKU</a>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="p-3 border rounded-3 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1.5">
                            <i class="fa-solid fa-flask-vial text-primary fs-5"></i>
                            <strong class="font-serif fs-6">Research &amp; Kalam</strong>
                        </div>
                        <p class="text-muted small mb-3">MSME incubation center &amp; Dr. Kalam memorial quotes.</p>
                    </div>
                    <a href="research_manager.php" class="btn btn-sm btn-outline-primary rounded-pill w-100">Edit Research</a>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="p-3 border rounded-3 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1.5">
                            <i class="fa-solid fa-quote-left text-primary fs-5"></i>
                            <strong class="font-serif fs-6">Alumni Voices</strong>
                        </div>
                        <p class="text-muted small mb-3">Distinguished alumni testimonials &amp; corporate placements.</p>
                    </div>
                    <a href="alumni_manager.php" class="btn btn-sm btn-outline-primary rounded-pill w-100">Edit Alumni</a>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="p-3 border rounded-3 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1.5">
                            <i class="fa-solid fa-table-cells text-primary fs-5"></i>
                            <strong class="font-serif fs-6">Portals &amp; ERP</strong>
                        </div>
                        <p class="text-muted small mb-3">Student ERP, Results, and Document Verification links.</p>
                    </div>
                    <a href="portals_manager.php" class="btn btn-sm btn-outline-primary rounded-pill w-100">Edit Portals</a>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="p-3 border rounded-3 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1.5">
                            <i class="fa-solid fa-bullhorn text-primary fs-5"></i>
                            <strong class="font-serif fs-6">Admissions CTA</strong>
                        </div>
                        <p class="text-muted small mb-3">Call-to-action banner, hotline numbers &amp; apply link.</p>
                    </div>
                    <a href="admissions_cta_manager.php" class="btn btn-sm btn-outline-primary rounded-pill w-100">Edit CTA</a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>
