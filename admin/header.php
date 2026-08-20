<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKU Indore - Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Inter', system-ui, sans-serif; background-color: #f6f7f9; }
        .sidebar { min-height: 100vh; background-color: oklch(36% .13 25); color: white; padding-top: 15px; }
        .sidebar a { color: #f0dfe2; text-decoration: none; display: flex; align-items: center; padding: 10px 18px; border-radius: 8px; margin: 3px 12px; font-size: 0.88rem; font-weight: 500; transition: all 0.2s; }
        .sidebar a:hover, .sidebar a.active { background-color: #d4af37; color: oklch(36% .13 25); font-weight: 600; }
        .sidebar .brand { font-family: 'Cormorant Garamond', serif; font-size: 22px; font-weight: bold; padding: 10px 20px 20px 20px; text-align: center; color: white; border-bottom: 1px solid rgba(255,255,255,0.15); margin-bottom: 15px;}
        .sidebar-section-title { font-size: 0.68rem; text-transform: uppercase; letter-spacing: 0.12em; color: rgba(212, 175, 55, 0.85); font-weight: 700; padding: 12px 20px 4px 20px; }
        .main-content { padding: 30px; }
        .top-navbar { background: white; padding: 14px 30px; box-shadow: 0 2px 4px rgba(0,0,0,0.04); display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e9ecef; }
        .card { border: 1px solid #e9ecef; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.03); margin-bottom: 24px; }
        .card-header { background: white; border-bottom: 1px solid #eee; padding: 16px 22px; font-weight: 600; font-size: 1.05rem; }
        .stat-card { background: white; padding: 22px; border-radius: 12px; border-left: 5px solid oklch(36% .13 25); box-shadow: 0 4px 12px rgba(0,0,0,0.04); transition: transform 0.2s; }
        .stat-card:hover { transform: translateY(-3px); }
        .stat-card h3 { margin: 0; font-size: 32px; color: oklch(36% .13 25); font-family: 'Cormorant Garamond', serif; font-weight: bold; }
        .stat-card p { margin: 0; color: #6c757d; font-size: 13px; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 600; }
        .btn-primary { background-color: oklch(36% .13 25); border-color: oklch(36% .13 25); }
        .btn-primary:hover { background-color: oklch(30% .12 25); border-color: oklch(30% .12 25); }
        .btn-gold { background-color: #d4af37; color: oklch(36% .13 25); font-weight: 600; border: none; }
        .btn-gold:hover { background-color: #c49f2e; color: oklch(36% .13 25); }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="brand">
                    <i class="fa-solid fa-graduation-cap text-gold me-2"></i>AKU Admin CMS
                </div>
                
                <div class="list-group list-group-flush">
                    <a href="index.php"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                    
                    <?php
                    $newAppBadge = 0;
                    if (isset($pdo)) {
                        try {
                            $newAppBadge = $pdo->query("SELECT COUNT(*) FROM admission_applications WHERE status = 'new'")->fetchColumn();
                        } catch (Exception $e) {}
                    }
                    ?>
                    <div class="sidebar-section-title">Student Admissions</div>
                    <a href="admissions_manager.php" class="d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-user-graduate me-2"></i>Applications &amp; Leads</span>
                        <?php if ($newAppBadge > 0): ?>
                            <span class="badge bg-warning text-dark rounded-pill px-2" style="font-size: 0.72rem;"><?php echo $newAppBadge; ?></span>
                        <?php endif; ?>
                    </a>
                    
                    <div class="sidebar-section-title">Homepage Sections</div>
                    <a href="hero_manager.php"><i class="fas fa-video me-2"></i>Hero & Video</a>
                    <a href="about_manager.php"><i class="fas fa-university me-2"></i>About & Pillars</a>
                    <a href="schools_manager.php"><i class="fas fa-graduation-cap me-2"></i>Academic Schools</a>
                    <a href="why_aku_manager.php"><i class="fas fa-star me-2"></i>Why AKU (6 Cards)</a>
                    <a href="research_manager.php"><i class="fas fa-flask me-2"></i>Research & Kalam</a>
                    <a href="alumni_manager.php"><i class="fas fa-quote-left me-2"></i>Alumni Voices</a>
                    <a href="portals_manager.php"><i class="fas fa-th-large me-2"></i>Portals & Services</a>
                    <a href="admissions_cta_manager.php"><i class="fas fa-bullhorn me-2"></i>Admissions CTA</a>
                    
                    <div class="sidebar-section-title">About Section & Pages</div>
                    <a href="about_pages_manager.php"><i class="fas fa-landmark me-2"></i>About Pages & Leadership</a>
                    <a href="pages.php"><i class="fas fa-file-alt me-2"></i>Why AKU / Static Pages</a>
                    <a href="media.php"><i class="fas fa-newspaper me-2"></i>AKU in Media</a>

                    <div class="sidebar-section-title">Academic &amp; Departments</div>
                    <a href="departments_manager.php"><i class="fas fa-building-columns me-2"></i>Departments &amp; Tabs</a>
                    <a href="faculty_manager.php"><i class="fas fa-user-graduate me-2"></i>Faculty &amp; Staff</a>
                    <a href="courses_manager.php"><i class="fas fa-book-bookmark me-2"></i>Courses &amp; Programs</a>

                    <div class="sidebar-section-title">Dynamic Modules</div>
                    <a href="events.php"><i class="fas fa-calendar-alt me-2"></i>Events Calendar</a>
                    <a href="notices.php"><i class="fas fa-bell me-2"></i>Notice Board</a>
                    <a href="blogs.php"><i class="fas fa-blog me-2"></i>Blogs & Stories</a>
                    
                    <div class="sidebar-section-title">Configuration</div>
                    <a href="settings.php"><i class="fas fa-cog me-2"></i>Site Settings</a>
                    <a href="logout.php" class="text-danger mt-2"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-10 p-0" style="background-color: #f4f6f9; min-height: 100vh;">
                <!-- Top Navbar -->
                <div class="top-navbar">
                    <div class="d-flex align-items-center gap-2">
                        <a href="../index.php" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3">
                            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> View Live Site
                        </a>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span class="fw-medium small"><i class="fa-regular fa-circle-user me-1 text-primary"></i> <strong><?php echo htmlspecialchars($_SESSION['admin_username'] ?? 'Admin'); ?></strong></span>
                        <a href="logout.php" class="btn btn-sm btn-outline-danger rounded-pill px-3"><i class="fas fa-sign-out-alt me-1"></i> Logout</a>
                    </div>
                </div>
                
                <div class="main-content">
