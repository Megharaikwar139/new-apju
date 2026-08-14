<?php
require_once 'auth.php';

// Get counts
$events_count = $pdo->query("SELECT COUNT(*) FROM events")->fetchColumn();
$notices_count = $pdo->query("SELECT COUNT(*) FROM notices")->fetchColumn();
$announcements_count = $pdo->query("SELECT COUNT(*) FROM announcements")->fetchColumn();
$blogs_count = $pdo->query("SELECT COUNT(*) FROM blogs")->fetchColumn();

require_once 'header.php';
?>

<h2 class="mb-4">Dashboard Overview</h2>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="stat-card" style="border-left-color: #0d6efd;">
            <p>Total Events</p>
            <h3><?php echo $events_count; ?></h3>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="stat-card" style="border-left-color: #198754;">
            <p>Notice Board</p>
            <h3><?php echo $notices_count; ?></h3>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="stat-card" style="border-left-color: #ffc107;">
            <p>Announcements</p>
            <h3><?php echo $announcements_count; ?></h3>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="stat-card" style="border-left-color: #dc3545;">
            <p>Latest Blogs</p>
            <h3><?php echo $blogs_count; ?></h3>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        System Information
    </div>
    <div class="card-body">
        <p><strong>Database Status:</strong> Connected Successfully to Custom PHP Schema.</p>
        <p><strong>Live Data Migration:</strong> Completed. All live data is now safely stored in local database.</p>
        <p>Use the sidebar navigation to manage the website content easily. Changes made here will instantly reflect on the main website.</p>
    </div>
</div>

<?php require_once 'footer.php'; ?>
