<?php
require_once 'db.php';

$type = $_GET['type'] ?? '';
$slug = $_GET['slug'] ?? '';

if (!$type || !$slug) {
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    exit;
}

$data = null;
$page_title = '';

// Route configuration
switch ($type) {
    case 'blog':
        $stmt = $pdo->prepare("SELECT * FROM blogs WHERE slug = ? OR slug = ?");
        $stmt->execute([$slug, urlencode($slug)]);
        $data = $stmt->fetch();
        $page_title = $data['title'] ?? 'Blog';
        break;
    case 'voi':
        $stmt = $pdo->prepare("SELECT * FROM voice_of_experience WHERE slug = ? OR slug = ?");
        $stmt->execute([$slug, urlencode($slug)]);
        $data = $stmt->fetch();
        $page_title = $data['title'] ?? 'Voice of Experience';
        break;
    case 'event':
        $stmt = $pdo->prepare("SELECT * FROM events WHERE slug = ? OR slug = ?");
        $stmt->execute([$slug, urlencode($slug)]);
        $data = $stmt->fetch();
        $page_title = $data['title'] ?? 'Event';
        break;
    case 'notice':
        $stmt = $pdo->prepare("SELECT * FROM notices WHERE slug = ? OR slug = ?");
        $stmt->execute([$slug, urlencode($slug)]);
        $data = $stmt->fetch();
        $page_title = $data['title'] ?? 'Notice';
        break;
    case 'announcement':
        $stmt = $pdo->prepare("SELECT * FROM announcements WHERE slug = ? OR slug = ?");
        $stmt->execute([$slug, urlencode($slug)]);
        $data = $stmt->fetch();
        $page_title = $data['title'] ?? 'Announcement';
        break;
    case 'media':
        $stmt = $pdo->prepare("SELECT * FROM media_coverage WHERE slug = ? OR slug = ? OR slug = ?");
        // Also check rawurlencode just in case
        $stmt->execute([$slug, urlencode($slug), rawurlencode($slug)]);
        $data = $stmt->fetch();
        $page_title = $data['title'] ?? 'Media Coverage';
        break;
    case 'page':
        $stmt = $pdo->prepare("SELECT * FROM pages WHERE slug = ? OR slug = ?");
        $stmt->execute([$slug, urlencode($slug)]);
        $data = $stmt->fetch();
        $page_title = $data['title'] ?? 'Page';
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo "<h1>404 Not Found</h1>";
        exit;
}

if (!$data) {
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1><p>The content you are looking for does not exist.</p>";
    exit;
}

// Ensure proper base path for assets if included
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/APJ-WEB/new-apju/';
?>
<?php require_once 'header.php'; ?>
<style>
        .page-header-blog {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('assets/images/bg-header.jpg') center/cover no-repeat;
            padding: 100px 0;
            text-align: center;
            color: #fff;
            margin-bottom: 50px;
        }
        .page-header-blog h1 {
            color: #fff;
            font-size: 40px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .page-header-blog .breadcrumbs {
            font-size: 14px;
            color: #ddd;
        }
        .blog-content-container {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
            margin-bottom: 50px;
            border: 1px solid #eee;
        }
        .blog-content-title {
            color: #0b2c4d;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 25px;
            border-bottom: 2px solid #0b2c4d;
            display: inline-block;
            padding-bottom: 5px;
        }
        .blog-text p {
            line-height: 1.8;
            color: #444;
            font-size: 15px;
            text-align: justify;
            margin-bottom: 15px;
        }
        .blog-featured-img {
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>

<?php if ($type == 'blog'): ?>
    <div class="page-header-blog">
        <div class="container">
            <h1><?php echo htmlspecialchars($data['title']); ?></h1>
            <div class="breadcrumbs">
                Home &raquo; Blog &raquo; <?php echo htmlspecialchars($data['title']); ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <?php 
                    $img_src = '';
                    if (!empty($data['image_path'])) {
                        if (strpos($data['image_path'], 'assets/') === 0) {
                            $img_src = $data['image_path'];
                        } else {
                            $img_src = '../APJ-WEB/wp-content/uploads/' . $data['image_path'];
                        }
                        echo '<img src="'.htmlspecialchars($img_src).'" class="blog-featured-img" alt="'.htmlspecialchars($data['title']).'">';
                    } else {
                        echo '<img src="assets/images/placeholder.jpg" class="blog-featured-img" alt="Placeholder">';
                    }
                ?>
            </div>
            <div class="col-md-8">
                <div class="blog-content-container">
                    <h2 class="blog-content-title"><?php echo htmlspecialchars($data['title']); ?></h2>
                    <div class="blog-text">
                        <?php echo $data['content'] ? $data['content'] : '<p>No content available.</p>'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else: ?>

    <?php if ($type == 'page'): ?>
    
    <div class="page-header-blog" style="padding: 60px 0; background: linear-gradient(rgba(11, 44, 77, 0.8), rgba(11, 44, 77, 0.9)), url('assets/images/bg-header.jpg') center/cover no-repeat;">
        <div class="container">
            <h1 style="font-size: 32px; color: #fff; text-align: center; margin-bottom: 10px;"><?php echo htmlspecialchars($data['title']); ?></h1>
            <div class="breadcrumbs" style="color: #ddd; text-align: center; font-size: 15px;">
                <a href="index.php" style="color: #ddd;">Home</a> &raquo; <?php echo htmlspecialchars($data['title']); ?>
            </div>
        </div>
    </div>

    <!-- For dynamic pages from WPBakery, output directly without blog container but with a standard container -->
    <div class="container dynamic-page-content" style="padding: 40px 0; min-height: 40vh;">
        <?php echo $data['content']; ?>
    </div>

    <?php else: ?>

    <div class="page-header-blog" style="padding: 60px 0; background: linear-gradient(rgba(11, 44, 77, 0.8), rgba(11, 44, 77, 0.9)), url('assets/images/bg-header.jpg') center/cover no-repeat;">
        <div class="container">
            <h1 style="font-size: 32px;"><?php echo htmlspecialchars($data['title']); ?></h1>
            <div class="breadcrumbs">
                Home &raquo; <?php echo ucfirst(str_replace('_', ' ', $type)) . ' &raquo; ' . htmlspecialchars($data['title']); ?>
            </div>
        </div>
    </div>

    <div class="container" style="margin-bottom: 60px; min-height: 40vh;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="blog-content-container" style="padding: 40px; margin-top: -40px; position: relative; z-index: 10;">
                    
                    <div class="d-flex justify-content-between align-items-center mb-4 pb-3" style="border-bottom: 1px solid #eee;">
                        <h2 class="m-0" style="color:#0b2c4d; font-size: 24px; font-weight: 600;"><?php echo htmlspecialchars($data['title']); ?></h2>
                        <?php if (isset($data['created_at']) || isset($data['event_date']) || isset($data['notice_date'])): ?>
                        <span class="badge" style="background-color: #f8f9fa; color: #6c757d; font-size: 14px; padding: 8px 12px; font-weight: normal; border: 1px solid #ddd;">
                            <i class="fas fa-calendar-alt mr-1"></i> 
                            <?php 
                            if (isset($data['event_date'])) echo date('d M, Y', strtotime($data['event_date']));
                            elseif (isset($data['notice_date'])) echo date('d M, Y', strtotime($data['notice_date']));
                            else echo date('d M, Y', strtotime($data['created_at']));
                            ?>
                        </span>
                        <?php endif; ?>
                    </div>

                    <div class="row">
                        <?php if (isset($data['image_path']) && $data['image_path']): ?>
                            <div class="col-md-12 text-center mb-4">
                                <?php 
                                    $img_src = '';
                                    if (strpos($data['image_path'], 'assets/') === 0) {
                                        $img_src = $data['image_path'];
                                    } else {
                                        $img_src = '../APJ-WEB/wp-content/uploads/' . $data['image_path'];
                                    }
                                ?>
                                <img src="<?php echo htmlspecialchars($img_src); ?>" style="max-width: 100%; max-height: 500px; object-fit: contain; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);" alt="<?php echo htmlspecialchars($data['title']); ?>">
                            </div>
                        <?php endif; ?>
                        
                        <div class="col-md-12">
                            <div class="blog-text" style="font-size: 16px;">
                                <?php 
                                if (isset($data['content']) && trim($data['content']) !== '') {
                                    echo $data['content'];
                                } else if ($type != 'media') {
                                    echo "<p class='text-muted'><em>No detailed content available for this item.</em></p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
<?php endif; ?>

<?php require_once 'footer.php'; ?>
