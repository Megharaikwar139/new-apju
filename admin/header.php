<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APJU Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background-color: #0b2c4d; color: white; padding-top: 20px; }
        .sidebar a { color: #cfd8dc; text-decoration: none; display: block; padding: 12px 20px; border-radius: 4px; margin: 5px 10px; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background-color: #c7912a; color: white; }
        .sidebar .brand { font-size: 20px; font-weight: bold; padding: 0 20px 20px 20px; text-align: center; color: white; border-bottom: 1px solid rgba(255,255,255,0.1); margin-bottom: 20px;}
        .main-content { padding: 30px; }
        .top-navbar { background: white; padding: 15px 30px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); display: flex; justify-content: flex-end; align-items: center; }
        .card { border: none; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin-bottom: 24px; }
        .card-header { background: white; border-bottom: 1px solid #eee; padding: 15px 20px; font-weight: bold; }
        .stat-card { background: white; padding: 20px; border-radius: 10px; border-left: 5px solid #0b2c4d; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .stat-card h3 { margin: 0; font-size: 28px; color: #0b2c4d; }
        .stat-card p { margin: 0; color: #6c757d; font-size: 14px; text-transform: uppercase; letter-spacing: 1px; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="brand">APJU Admin Panel</div>
                <div class="list-group list-group-flush">
                <a href="dashboard.php" class=""><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                
                <a href="#homepageSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-home me-2"></i>Homepage Sections</a>
            <ul class="collapse list-unstyled" id="homepageSubmenu">
                <li class="ps-3">
                    <ul class="list-unstyled">
                        <li><a href="banners.php" class="ps-4">Main Hero Slider</a></li>
                        <li><a href="stats.php" class="ps-4">Statistics Counter</a></li>
                        <li><a href="quick_links.php" class="ps-4">Page Quick Links Cards</a></li>
                    </ul>
                </li>
            </ul>

            <a href="pages.php" class=""><i class="fas fa-file-alt me-2"></i>Static Pages (Quick Links)</a>
            <a href="blogs.php" class=""><i class="fas fa-blog me-2"></i>Blogs</a>
                <a href="voi.php" class=""><i class="fas fa-user-tie me-2"></i>Voice of Experience</a>
                <a href="media.php" class=""><i class="fas fa-newspaper me-2"></i>Media Coverage</a>
                <a href="events.php" class=""><i class="fas fa-calendar-alt me-2"></i>Events</a>
                <a href="notices.php" class=""><i class="fas fa-bullhorn me-2"></i>Notices</a>
                <a href="announcements.php" class=""><i class="fas fa-bell me-2"></i>Announcements</a>
                
                <a href="settings.php" class=""><i class="fas fa-cog me-2"></i>General Settings</a>
                <a href="logout.php" class="text-danger"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
            </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-10 p-0" style="background-color: #f4f6f9; min-height: 100vh;">
                <!-- Top Navbar -->
                <div class="top-navbar">
                    <span class="me-3 fw-bold">Welcome, <?php echo htmlspecialchars($_SESSION['admin_username']); ?></span>
                    <a href="logout.php" class="btn btn-sm btn-outline-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
                
                <div class="main-content">
