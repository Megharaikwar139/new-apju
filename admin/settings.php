<?php
require_once 'auth.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $site_title = $_POST['site_title'] ?? 'Dr. A.P.J. Abdul Kalam University, Indore';
    $university_tagline = $_POST['university_tagline'] ?? '…Nurturing Talents to Success';
    $address = $_POST['address'] ?? '';
    $map_embed_code = $_POST['map_embed_code'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $admissions_email = $_POST['admissions_email'] ?? '';
    $facebook_url = $_POST['facebook_url'] ?? '';
    $instagram_url = $_POST['instagram_url'] ?? '';
    $twitter_url = $_POST['twitter_url'] ?? '';
    $linkedin_url = $_POST['linkedin_url'] ?? '';
    $youtube_url = $_POST['youtube_url'] ?? '';
    $copyright_text = $_POST['copyright_text'] ?? '';

    $stmt = $pdo->prepare("UPDATE site_settings_custom SET 
        site_title = ?, university_tagline = ?, address = ?, map_embed_code = ?, phone = ?,
        email = ?, admissions_email = ?,
        facebook_url = ?, instagram_url = ?, twitter_url = ?, linkedin_url = ?, youtube_url = ?,
        copyright_text = ?
        WHERE id = 1");
    $stmt->execute([
        $site_title, $university_tagline, $address, $map_embed_code, $phone,
        $email, $admissions_email,
        $facebook_url, $instagram_url, $twitter_url, $linkedin_url, $youtube_url,
        $copyright_text
    ]);
    $message = 'Site settings updated successfully!';
}

$settings = $pdo->query("SELECT * FROM site_settings_custom WHERE id = 1")->fetch() ?: [];
require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="font-serif fw-bold text-primary mb-1">Global Site Settings</h3>
        <p class="text-muted small mb-0">Manage global contact information, campus address, Google map embed, social media links, and footer configuration.</p>
    </div>
</div>

<?php if ($message): ?>
<div class="alert alert-success alert-dismissible fade show rounded-3 small fw-medium" role="alert">
    <i class="fa-solid fa-check-circle me-1"></i> <?php echo $message; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<form method="POST" class="card shadow-sm border-0">
    <div class="card-body p-4">
        
        <h5 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">1. University Identity</h5>
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Site Title</label>
                <input type="text" name="site_title" class="form-control" value="<?php echo htmlspecialchars($settings['site_title'] ?? ''); ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small">University Tagline</label>
                <input type="text" name="university_tagline" class="form-control" value="<?php echo htmlspecialchars($settings['university_tagline'] ?? ''); ?>">
            </div>
        </div>

        <h5 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">2. Contact Information &amp; Campus Map</h5>
        <div class="row g-3 mb-4">
            <div class="col-md-12">
                <label class="form-label fw-semibold small">Official Campus Address</label>
                <textarea name="address" class="form-control" rows="2"><?php echo htmlspecialchars($settings['address'] ?? ''); ?></textarea>
            </div>
            <div class="col-md-12">
                <label class="form-label fw-semibold small">Google Maps Embed Code (&lt;iframe ...&gt;&lt;/iframe&gt;)</label>
                <textarea name="map_embed_code" class="form-control font-monospace small" rows="3" placeholder='<iframe src="https://www.google.com/maps/embed?..." width="100%" height="450" ...></iframe>'><?php echo htmlspecialchars($settings['map_embed_code'] ?? ''); ?></textarea>
                <div class="form-text small">Paste the iframe embed code from Google Maps to update the interactive map on the Contact Us page.</div>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold small">Phone Helpline</label>
                <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($settings['phone'] ?? ''); ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold small">Primary Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($settings['email'] ?? ''); ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold small">Admissions Email</label>
                <input type="email" name="admissions_email" class="form-control" value="<?php echo htmlspecialchars($settings['admissions_email'] ?? ''); ?>">
            </div>
        </div>

        <h5 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">3. Social Media Links</h5>
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <label class="form-label fw-semibold small"><i class="fa-brands fa-facebook text-primary me-1"></i> Facebook URL</label>
                <input type="url" name="facebook_url" class="form-control" value="<?php echo htmlspecialchars($settings['facebook_url'] ?? ''); ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold small"><i class="fa-brands fa-instagram text-danger me-1"></i> Instagram URL</label>
                <input type="url" name="instagram_url" class="form-control" value="<?php echo htmlspecialchars($settings['instagram_url'] ?? ''); ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold small"><i class="fa-brands fa-x-twitter text-dark me-1"></i> X / Twitter URL</label>
                <input type="url" name="twitter_url" class="form-control" value="<?php echo htmlspecialchars($settings['twitter_url'] ?? ''); ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small"><i class="fa-brands fa-linkedin text-primary me-1"></i> LinkedIn URL</label>
                <input type="url" name="linkedin_url" class="form-control" value="<?php echo htmlspecialchars($settings['linkedin_url'] ?? ''); ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small"><i class="fa-brands fa-youtube text-danger me-1"></i> YouTube URL</label>
                <input type="url" name="youtube_url" class="form-control" value="<?php echo htmlspecialchars($settings['youtube_url'] ?? ''); ?>">
            </div>
        </div>

        <h5 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">4. Legal & Footer</h5>
        <div class="row g-3 mb-4">
            <div class="col-md-12">
                <label class="form-label fw-semibold small">Copyright Notice</label>
                <input type="text" name="copyright_text" class="form-control" value="<?php echo htmlspecialchars($settings['copyright_text'] ?? ''); ?>">
            </div>
        </div>

        <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 fw-semibold">
            <i class="fa-solid fa-save me-1"></i> Save Settings
        </button>

    </div>
</form>

<?php require_once 'footer.php'; ?>
