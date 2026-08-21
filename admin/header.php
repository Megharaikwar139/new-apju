<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKU Executive Admin Panel - Dr. A.P.J. Abdul Kalam University, Indore</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;1,600&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        :root {
            --admin-maroon-dark: #3b050d;
            --admin-maroon: #580813;
            --admin-maroon-light: #721320;
            --admin-gold: #d4af37;
            --admin-gold-hover: #b89324;
            --admin-gold-light: #f7eed4;
            --admin-bg: #f8f6f3;
            --admin-card-bg: #ffffff;
            --admin-border: #ebdcd4;
            --admin-text-dark: #221417;
            --admin-text-muted: #736165;
            --admin-sidebar-w: 270px;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--admin-bg);
            color: var(--admin-text-dark);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .font-serif {
            font-family: 'Cormorant Garamond', Georgia, serif;
        }

        /* Global Link Overrides - Zero Blue */
        a {
            color: var(--admin-maroon);
            text-decoration: none;
            transition: color 0.2s ease;
        }
        a:hover, a:focus {
            color: var(--admin-gold);
            text-decoration: none;
        }
        a:visited {
            color: var(--admin-maroon);
        }
        .text-primary, a.text-primary {
            color: var(--admin-maroon) !important;
        }
        .text-primary:hover, a.text-primary:hover {
            color: var(--admin-gold) !important;
        }
        .bg-primary {
            background-color: var(--admin-maroon) !important;
            color: #ffffff !important;
        }
        .border-primary {
            border-color: var(--admin-maroon) !important;
        }

        /* Icon Badges - Light background with crisp Maroon/Red border */
        .icon-circle-badge,
        .admin-icon-box {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background-color: rgba(88, 8, 19, 0.05) !important;
            border: 1.5px solid var(--admin-maroon) !important;
            color: var(--admin-maroon) !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.2s ease;
        }
        .icon-circle-badge i,
        .admin-icon-box i {
            color: var(--admin-maroon) !important;
        }
        .icon-circle-badge:hover,
        .admin-icon-box:hover {
            background-color: var(--admin-maroon) !important;
            border-color: var(--admin-maroon) !important;
        }
        .icon-circle-badge:hover i,
        .admin-icon-box:hover i {
            color: #ffffff !important;
        }

        .icon-circle-gold {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background-color: rgba(212, 175, 55, 0.08) !important;
            border: 1.5px solid var(--admin-gold) !important;
            color: #8c6a0c !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .icon-circle-gold i {
            color: #8c6a0c !important;
        }

        /* CKEditor 5 Luxury Theme Customization */
        .ck-editor {
            width: 100% !important;
            margin-bottom: 12px;
        }

        .ck-editor__editable_inline {
            min-height: 220px;
            max-height: 520px;
            font-family: 'Inter', system-ui, sans-serif;
            font-size: 0.92rem;
            line-height: 1.7;
            color: #221417;
            background-color: #ffffff !important;
            border-radius: 0 0 10px 10px !important;
        }

        .ck-toolbar {
            background-color: #fbf9f6 !important;
            border-color: #ebdcd4 !important;
            border-radius: 10px 10px 0 0 !important;
        }

        .ck.ck-editor__editable.ck-focused:not(.ck-editor__nested-editable) {
            border-color: var(--admin-gold) !important;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2) !important;
        }

        .ck.ck-button.ck-on, 
        .ck.ck-button:hover {
            background: rgba(88, 8, 19, 0.08) !important;
            color: var(--admin-maroon) !important;
        }

        /* Universal Admin Modal Header Styling - Pure Crisp White */
        .modal-header {
            background: linear-gradient(135deg, var(--admin-maroon-dark) 0%, var(--admin-maroon) 100%) !important;
            border-bottom: 1px solid rgba(212, 175, 55, 0.25) !important;
            color: #ffffff !important;
            padding: 1rem 1.5rem !important;
        }

        .modal-header .modal-title,
        .modal-header h1,
        .modal-header h2,
        .modal-header h3,
        .modal-header h4,
        .modal-header h5,
        .modal-header h6,
        .modal-header span,
        .modal-header .text-primary,
        .modal-header * {
            color: #ffffff !important;
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-weight: 700;
        }

        .modal-header i {
            color: var(--admin-gold) !important;
        }

        .modal-header .btn-close {
            filter: invert(1) grayscale(100%) brightness(200%) !important;
            opacity: 0.85 !important;
        }
        .modal-header .btn-close:hover {
            opacity: 1 !important;
        }

        .page-link {
            color: var(--admin-maroon);
        }
        .page-link:hover {
            color: var(--admin-gold);
            background-color: var(--admin-gold-light);
            border-color: var(--admin-gold);
        }
        .page-item.active .page-link {
            background-color: var(--admin-maroon);
            border-color: var(--admin-maroon);
            color: #ffffff;
        }

        /* Sidebar Styling */
        .admin-sidebar {
            width: var(--admin-sidebar-w);
            min-height: 100vh;
            background: linear-gradient(180deg, var(--admin-maroon-dark) 0%, var(--admin-maroon) 100%);
            color: #ffffff;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 1040;
            overflow-y: auto;
            border-right: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .admin-sidebar::-webkit-scrollbar {
            width: 5px;
        }
        .admin-sidebar::-webkit-scrollbar-thumb {
            background: rgba(212, 175, 55, 0.25);
            border-radius: 4px;
        }

        .sidebar-brand-box {
            padding: 22px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(0, 0, 0, 0.15);
        }

        .sidebar-brand-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.35rem;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.2;
            letter-spacing: -0.01em;
        }

        .sidebar-brand-sub {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 0.18em;
            color: var(--admin-gold);
            font-weight: 600;
            margin-top: 4px;
        }

        .sidebar-nav-section {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 0.14em;
            color: rgba(212, 175, 55, 0.95) !important;
            font-weight: 700;
            padding: 18px 22px 6px 22px;
        }

        .admin-sidebar a,
        .admin-sidebar .sidebar-link {
            color: #ffffff !important;
            text-decoration: none !important;
            display: flex;
            align-items: center;
            padding: 9px 16px;
            margin: 2px 12px;
            border-radius: 8px;
            font-size: 0.86rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .admin-sidebar a span,
        .admin-sidebar .sidebar-link span {
            color: #ffffff !important;
        }

        .admin-sidebar .sidebar-link i {
            width: 22px;
            font-size: 0.95rem;
            color: var(--admin-gold) !important;
            transition: transform 0.2s;
        }

        .admin-sidebar a:hover,
        .admin-sidebar .sidebar-link:hover {
            background-color: rgba(212, 175, 55, 0.18) !important;
            color: #ffffff !important;
            transform: translateX(3px);
        }

        .admin-sidebar .sidebar-link:hover i {
            transform: scale(1.15);
            color: #ffffff !important;
        }

        .admin-sidebar a.active,
        .admin-sidebar .sidebar-link.active {
            background: linear-gradient(90deg, var(--admin-gold) 0%, #e6c555 100%) !important;
            color: var(--admin-maroon-dark) !important;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .admin-sidebar a.active span,
        .admin-sidebar .sidebar-link.active span {
            color: var(--admin-maroon-dark) !important;
        }

        .admin-sidebar a.active i,
        .admin-sidebar .sidebar-link.active i {
            color: var(--admin-maroon-dark) !important;
        }

        /* Main Content Wrapper */
        .admin-main-wrapper {
            margin-left: var(--admin-sidebar-w);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        /* Top Navbar */
        .admin-topbar {
            background: #ffffff;
            padding: 12px 32px;
            border-bottom: 1px solid var(--admin-border);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .admin-content-body {
            padding: 32px;
            flex: 1;
        }

        /* Cards & Metric Boxes */
        .admin-card {
            background: var(--admin-card-bg);
            border: 1px solid var(--admin-border);
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(34, 20, 23, 0.04);
            margin-bottom: 24px;
            overflow: hidden;
        }

        .admin-card-header {
            background: #ffffff;
            border-bottom: 1px solid var(--admin-border);
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .admin-stat-card {
            background: #ffffff;
            padding: 22px 24px;
            border-radius: 14px;
            border: 1px solid var(--admin-border);
            box-shadow: 0 4px 16px rgba(34, 20, 23, 0.04);
            transition: all 0.25s ease;
            position: relative;
            overflow: hidden;
        }

        .admin-stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 24px rgba(88, 8, 19, 0.08);
            border-color: rgba(212, 175, 55, 0.4);
        }

        .admin-stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--admin-maroon);
        }

        .admin-stat-card.gold-border::before { background: var(--admin-gold); }
        .admin-stat-card.maroon-border::before { background: var(--admin-maroon); }
        .admin-stat-card.dark-border::before { background: var(--admin-maroon-dark); }

        .stat-value {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.25rem;
            font-weight: 700;
            color: var(--admin-maroon-dark);
            line-height: 1;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--admin-text-muted);
            font-weight: 600;
            margin: 0;
        }

        /* Buttons - Perfect Contrast & Luxury Hover */
        .btn-primary, 
        a.btn-primary, 
        button.btn-primary {
            background: linear-gradient(135deg, var(--admin-maroon) 0%, var(--admin-maroon-dark) 100%) !important;
            border-color: var(--admin-maroon-dark) !important;
            color: #ffffff !important;
            font-weight: 600;
            padding: 8px 18px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(88, 8, 19, 0.2);
            transition: all 0.2s ease;
            text-decoration: none !important;
        }

        .btn-primary:hover, 
        a.btn-primary:hover, 
        button.btn-primary:hover,
        .btn-primary:focus, 
        a.btn-primary:focus, 
        button.btn-primary:focus,
        .btn-primary:active, 
        a.btn-primary:active, 
        button.btn-primary:active {
            background: linear-gradient(135deg, #700018 0%, #4a0010 100%) !important;
            border-color: #4a0010 !important;
            color: #ffffff !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(88, 8, 19, 0.35) !important;
            text-decoration: none !important;
        }

        .btn-primary i,
        a.btn-primary i,
        button.btn-primary i {
            color: var(--admin-gold) !important;
        }

        .btn-primary:hover i,
        a.btn-primary:hover i,
        button.btn-primary:hover i {
            color: #ffd700 !important;
        }

        .btn-gold {
            background: linear-gradient(135deg, var(--admin-gold) 0%, #c49f2e 100%) !important;
            border: none !important;
            color: var(--admin-maroon-dark) !important;
            font-weight: 700;
            padding: 8px 18px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(212, 175, 55, 0.25);
            transition: all 0.2s;
            text-decoration: none !important;
        }

        .btn-gold:hover {
            background: linear-gradient(135deg, #e0bc43 0%, var(--admin-gold) 100%) !important;
            color: var(--admin-maroon-dark) !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.35) !important;
            text-decoration: none !important;
        }

        .btn-outline-primary,
        a.btn-outline-primary,
        button.btn-outline-primary {
            border-color: var(--admin-maroon) !important;
            color: var(--admin-maroon) !important;
            background-color: transparent !important;
            font-weight: 600;
            transition: all 0.2s ease;
            text-decoration: none !important;
        }
        
        .btn-outline-primary:hover,
        a.btn-outline-primary:hover,
        button.btn-outline-primary:hover {
            background-color: var(--admin-maroon) !important;
            border-color: var(--admin-maroon) !important;
            color: #ffffff !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(88, 8, 19, 0.25) !important;
            text-decoration: none !important;
        }
        
        .btn-outline-primary:hover i,
        a.btn-outline-primary:hover i,
        button.btn-outline-primary:hover i {
            color: var(--admin-gold) !important;
        }

        /* Tables */
        .table thead th {
            background-color: #fbf9f6;
            color: var(--admin-maroon-dark);
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            border-bottom: 2px solid var(--admin-border);
            padding: 12px 16px;
        }

        .table tbody td {
            padding: 13px 16px;
            vertical-align: middle;
            border-bottom: 1px solid var(--admin-border);
            font-size: 0.88rem;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(212, 175, 55, 0.04);
        }

        /* Badges */
        .badge-gold {
            background-color: var(--admin-gold-light);
            color: #82600c;
            border: 1px solid rgba(212, 175, 55, 0.3);
            font-weight: 600;
        }

        .badge-maroon {
            background-color: rgba(88, 8, 19, 0.08);
            color: var(--admin-maroon);
            border: 1px solid rgba(88, 8, 19, 0.2);
            font-weight: 600;
        }

        /* Modals */
        .modal-content {
            border-radius: 16px;
            border: 1px solid var(--admin-border);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(135deg, var(--admin-maroon-dark) 0%, var(--admin-maroon) 100%);
            color: #ffffff;
            border-bottom: 1px solid rgba(212, 175, 55, 0.3);
            padding: 18px 24px;
        }

        .modal-header .modal-title {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 700;
            font-size: 1.35rem;
            color: #ffffff;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
        }

        /* Responsive */
        @media (max-width: 991px) {
            .admin-sidebar { transform: translateX(-100%); }
            .admin-sidebar.show { transform: translateX(0); }
            .admin-main-wrapper { margin-left: 0; }
        }
    </style>
</head>
<body>

    <!-- Sidebar Navigation -->
    <aside class="admin-sidebar" id="adminSidebar">
        
        <!-- Brand Box -->
        <div class="sidebar-brand-box">
            <div class="d-flex align-items-center justify-content-center gap-2 mb-1">
                <img src="../assets/lovable/aku-logo.jpeg" alt="Logo" class="rounded" style="height: 36px; width: auto; border: 1px solid rgba(212,175,55,0.4);" />
                <span class="sidebar-brand-title">AKU Indore</span>
            </div>
            <div class="sidebar-brand-sub">Executive CMS Portal</div>
        </div>

        <!-- Navigation Links -->
        <div class="py-2">
            
            <?php
            $currentPage = basename($_SERVER['PHP_SELF']);
            $newAppBadge = 0;
            $newInquiriesBadge = 0;
            if (isset($pdo)) {
                try {
                    $newAppBadge = $pdo->query("SELECT COUNT(*) FROM admission_applications WHERE status = 'new'")->fetchColumn();
                    $newInquiriesBadge = $pdo->query("SELECT COUNT(*) FROM contact_inquiries WHERE status = 'unread'")->fetchColumn();
                } catch (Exception $e) {}
            }
            ?>

            <a href="index.php" class="sidebar-link <?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-gauge-high"></i> Dashboard
            </a>

            <!-- 1. Student Admissions & Inquiries -->
            <div class="sidebar-nav-section">Admissions &amp; Helpdesk</div>
            <a href="admissions_manager.php" class="sidebar-link <?php echo ($currentPage == 'admissions_manager.php') ? 'active' : ''; ?> justify-content-between">
                <span><i class="fa-solid fa-user-graduate"></i> Admission Leads</span>
                <?php if ($newAppBadge > 0): ?>
                    <span class="badge bg-gold text-dark rounded-pill px-2" style="font-size: 0.7rem; font-weight: 700;"><?php echo $newAppBadge; ?> New</span>
                <?php endif; ?>
            </a>
            <a href="contact_manager.php" class="sidebar-link <?php echo ($currentPage == 'contact_manager.php') ? 'active' : ''; ?> justify-content-between">
                <span><i class="fa-solid fa-envelope-open-text"></i> Contact Inquiries</span>
                <?php if ($newInquiriesBadge > 0): ?>
                    <span class="badge bg-danger text-white rounded-pill px-2" style="font-size: 0.7rem; font-weight: 700;"><?php echo $newInquiriesBadge; ?> New</span>
                <?php endif; ?>
            </a>

            <!-- 2. Homepage CMS -->
            <div class="sidebar-nav-section">Homepage CMS</div>
            <a href="hero_manager.php" class="sidebar-link <?php echo ($currentPage == 'hero_manager.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-film"></i> Hero &amp; Video
            </a>
            <a href="about_manager.php" class="sidebar-link <?php echo ($currentPage == 'about_manager.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-landmark"></i> About &amp; 3 Pillars
            </a>
            <a href="schools_manager.php" class="sidebar-link <?php echo ($currentPage == 'schools_manager.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-graduation-cap"></i> 12 Academic Schools
            </a>
            <a href="why_aku_manager.php" class="sidebar-link <?php echo ($currentPage == 'why_aku_manager.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-star"></i> Why AKU (6 Cards)
            </a>
            <a href="research_manager.php" class="sidebar-link <?php echo ($currentPage == 'research_manager.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-flask-vial"></i> Research &amp; Kalam
            </a>
            <a href="alumni_manager.php" class="sidebar-link <?php echo ($currentPage == 'alumni_manager.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-quote-left"></i> Alumni Voices
            </a>
            <a href="portals_manager.php" class="sidebar-link <?php echo ($currentPage == 'portals_manager.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-table-cells"></i> Portals &amp; Services
            </a>
            <a href="admissions_cta_manager.php" class="sidebar-link <?php echo ($currentPage == 'admissions_cta_manager.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-bullhorn"></i> Admissions CTA
            </a>

            <!-- 3. Academics & Faculty -->
            <div class="sidebar-nav-section">Academics &amp; Departments</div>
            <a href="departments_manager.php" class="sidebar-link <?php echo ($currentPage == 'departments_manager.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-building-columns"></i> Departments &amp; Tabs
            </a>
            <a href="faculty_manager.php" class="sidebar-link <?php echo ($currentPage == 'faculty_manager.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-chalkboard-user"></i> Faculty &amp; Staff
            </a>
            <a href="courses_manager.php" class="sidebar-link <?php echo ($currentPage == 'courses_manager.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-book-bookmark"></i> Courses &amp; Syllabi
            </a>

            <!-- 4. Dynamic News & Events -->
            <div class="sidebar-nav-section">Dynamic Modules</div>
            <a href="events.php" class="sidebar-link <?php echo ($currentPage == 'events.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-calendar-days"></i> Events Calendar
            </a>
            <a href="notices.php" class="sidebar-link <?php echo ($currentPage == 'notices.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-bell"></i> Official Notices
            </a>
            <a href="blogs.php" class="sidebar-link <?php echo ($currentPage == 'blogs.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-newspaper"></i> Blogs &amp; Articles
            </a>
            <a href="media.php" class="sidebar-link <?php echo ($currentPage == 'media.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-photo-film"></i> Media Coverage
            </a>

            <!-- 5. Placement & Campus Life -->
            <div class="sidebar-nav-section">Placement &amp; Campus Life</div>
            <a href="recruiters_manager.php" class="sidebar-link <?php echo ($currentPage == 'recruiters_manager.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-briefcase"></i> 500+ Recruiters
            </a>
            <a href="gallery_manager.php" class="sidebar-link <?php echo ($currentPage == 'gallery_manager.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-images"></i> Photo Gallery
            </a>
            <a href="voi.php" class="sidebar-link <?php echo ($currentPage == 'voi.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-comments"></i> Visitor Testimonials
            </a>

            <!-- 6. About Pages & Configuration -->
            <div class="sidebar-nav-section">About Pages &amp; Config</div>
            <a href="about_pages_manager.php" class="sidebar-link <?php echo ($currentPage == 'about_pages_manager.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-users-gear"></i> Leadership Pages
            </a>
            <a href="pages.php" class="sidebar-link <?php echo ($currentPage == 'pages.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-file-lines"></i> Custom Pages
            </a>
            <a href="settings.php" class="sidebar-link <?php echo ($currentPage == 'settings.php') ? 'active' : ''; ?>">
                <i class="fa-solid fa-gear"></i> Site Settings
            </a>

            <hr style="border-color: rgba(255,255,255,0.1); margin: 16px 12px 8px 12px;">

            <a href="logout.php" class="sidebar-link text-danger" onclick="return confirm('Are you sure you want to sign out?');">
                <i class="fa-solid fa-arrow-right-from-bracket text-danger"></i> Logout
            </a>

        </div>
    </aside>

    <!-- Main Wrapper -->
    <div class="admin-main-wrapper">
        
        <!-- Top Sticky Header -->
        <header class="admin-topbar">
            
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-sm btn-outline-dark d-lg-none rounded-3" type="button" onclick="document.getElementById('adminSidebar').classList.toggle('show');">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="d-none d-sm-block">
                    <span class="small text-muted-custom fw-semibold">Administration &rsaquo;</span>
                    <strong class="text-dark small ms-1"><?php echo ucwords(str_replace(['_', '.php'], [' ', ''], $currentPage)); ?></strong>
                </div>
            </div>

            <!-- Top Right Profile & Actions -->
            <div class="d-flex align-items-center gap-2.5">
                <a href="../index.php" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1.5 small">
                    <i class="fa-solid fa-globe me-1"></i> Live Website
                </a>
                
                <div class="vr mx-1 my-1 opacity-25"></div>

                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center shadow-xs" style="width: 34px; height: 34px; font-size: 0.85rem; font-weight: 700; background: var(--admin-maroon) !important;">
                        <?php echo strtoupper(substr($_SESSION['admin_username'] ?? 'A', 0, 1)); ?>
                    </div>
                    <div class="d-none d-md-block lh-1 text-start">
                        <span class="d-block fw-bold small text-dark"><?php echo htmlspecialchars($_SESSION['admin_username'] ?? 'Administrator'); ?></span>
                        <span class="text-muted" style="font-size: 0.68rem;">Super Admin</span>
                    </div>
                </div>
            </div>

        </header>

        <!-- Main Body Container -->
        <main class="admin-content-body">
