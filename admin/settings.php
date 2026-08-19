<?php
require_once 'auth.php';

// Handle Setting Update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_settings'])) {
    
    // Check if new video is uploaded
    if (isset($_FILES['homepage_video']) && $_FILES['homepage_video']['error'] == 0) {
        $upload_dir = '../assets/videos/uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $file_name = time() . '_' . basename($_FILES['homepage_video']['name']);
        $target_file = $upload_dir . $file_name;
        
        if (move_uploaded_file($_FILES['homepage_video']['tmp_name'], $target_file)) {
            $video_url = 'assets/videos/uploads/' . $file_name;
            
            // Insert or Update settings
            $stmt = $pdo->prepare("INSERT INTO settings (setting_key, setting_value) VALUES ('homepage_video_url', ?) ON DUPLICATE KEY UPDATE setting_value = ?");
            $stmt->execute([$video_url, $video_url]);
        }
    } else if (!empty($_POST['homepage_video_url'])) {
        // Fallback to text input URL
        $video_url = $_POST['homepage_video_url'];
        $stmt = $pdo->prepare("INSERT INTO settings (setting_key, setting_value) VALUES ('homepage_video_url', ?) ON DUPLICATE KEY UPDATE setting_value = ?");
        $stmt->execute([$video_url, $video_url]);
    }

    // Save Welcome Text Settings
    if (isset($_POST['welcome_title'])) {
        $w_title = $_POST['welcome_title'];
        $w_content = $_POST['welcome_content'];
        $pdo->prepare("INSERT INTO settings (setting_key, setting_value) VALUES ('welcome_title', ?) ON DUPLICATE KEY UPDATE setting_value = ?")->execute([$w_title, $w_title]);
        $pdo->prepare("INSERT INTO settings (setting_key, setting_value) VALUES ('welcome_content', ?) ON DUPLICATE KEY UPDATE setting_value = ?")->execute([$w_content, $w_content]);
    }

    // Save Welcome Image
    if (isset($_FILES['welcome_image']) && $_FILES['welcome_image']['error'] == 0) {
        $upload_dir = '../assets/images/uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $file_name = time() . '_' . basename($_FILES['welcome_image']['name']);
        $target_file = $upload_dir . $file_name;
        
        if (move_uploaded_file($_FILES['welcome_image']['tmp_name'], $target_file)) {
            $w_image_url = 'assets/images/uploads/' . $file_name;
            $pdo->prepare("INSERT INTO settings (setting_key, setting_value) VALUES ('welcome_image', ?) ON DUPLICATE KEY UPDATE setting_value = ?")->execute([$w_image_url, $w_image_url]);
        }
    }
    
    $success_msg = "Settings updated successfully!";
}

// Fetch current settings
$video_setting = $pdo->query("SELECT setting_value FROM settings WHERE setting_key = 'homepage_video_url'")->fetchColumn();
$welcome_title = $pdo->query("SELECT setting_value FROM settings WHERE setting_key = 'welcome_title'")->fetchColumn();
$welcome_content = $pdo->query("SELECT setting_value FROM settings WHERE setting_key = 'welcome_content'")->fetchColumn();
$welcome_image = $pdo->query("SELECT setting_value FROM settings WHERE setting_key = 'welcome_image'")->fetchColumn();

require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>General Settings</h2>
</div>

<?php if(isset($success_msg)): ?>
<div class="alert alert-success"><?php echo $success_msg; ?></div>
<?php endif; ?>

<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Homepage Configuration</h5>
    </div>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
            
            <div class="mb-4">
                <label class="form-label fw-bold">360° Virtual Tour Video Source</label>
                <div class="card bg-light p-3 border-0">
                    <p class="text-muted small mb-2">Current Video URL: <br><code><?php echo htmlspecialchars($video_setting ?: 'Not Set'); ?></code></p>
                    
                    <div class="mb-3">
                        <label class="form-label">Upload New Video (MP4)</label>
                        <input type="file" name="homepage_video" class="form-control" accept="video/mp4">
                    </div>
                    
                    <div class="text-center my-2 text-muted">OR</div>
                    
                    <div class="mb-3">
                        <label class="form-label">Provide Relative or Absolute URL</label>
                        <input type="text" name="homepage_video_url" class="form-control" value="<?php echo htmlspecialchars($video_setting); ?>" placeholder="../uploads/2025/07/aku_reel.mp4">
                    </div>
                </div>
            </div>

            <hr>

            <div class="mb-4 mt-4">
                <label class="form-label fw-bold">Welcome Section (Homepage)</label>
                <div class="card bg-light p-3 border-0">
                    <div class="mb-3">
                        <label class="form-label">Welcome Title (Supports HTML like &lt;br&gt; and &lt;span&gt;)</label>
                        <input type="text" name="welcome_title" class="form-control" value="<?php echo htmlspecialchars((string)$welcome_title); ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Welcome Content (HTML Paragraphs allowed)</label>
                        <textarea name="welcome_content" class="form-control" rows="8"><?php echo htmlspecialchars((string)$welcome_content); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Current Welcome Image</label><br>
                        <?php 
                        if ($welcome_image) {
                            $img_src = (strpos($welcome_image, 'assets/') === 0) ? '../' . $welcome_image : '../uploads/' . $welcome_image;
                            echo '<img src="'.htmlspecialchars($img_src).'" style="max-height: 150px; border-radius: 8px;" alt="Welcome Image"><br><br>';
                        }
                        ?>
                        <label class="form-label">Upload New Welcome Image</label>
                        <input type="file" name="welcome_image" class="form-control" accept="image/*">
                    </div>
                </div>
            </div>

            <button type="submit" name="save_settings" class="btn btn-primary" style="background-color: #0b2c4d;">Save Settings</button>
        </form>
    </div>
</div>

<?php require_once 'footer.php'; ?>
