<?php
if (empty($courseTitle) || empty($courseLevel)) {
    http_response_code(404);
    exit('Course not found.');
}
$pageTitle = $courseTitle . ' - Dr APJ University Indore';
include dirname(__DIR__) . '/header.php';
?>
<style>
    .course-page-header { background: linear-gradient(rgba(20,20,20,.48), rgba(20,20,20,.48)), url('/new-apju/assets/images/bg-header.jpg') center / cover no-repeat !important; }
    .course-page-header h1 { margin:0 0 14px; color:#fff; font-family:'AKU Poppins','Poppins',sans-serif!important; font-size:42px!important; font-weight:800!important; line-height:1.2!important; text-align:center; }
    .course-page-header .breadcrumb { display:block!important; width:100%!important; margin:0; color:#fff; font-family:'AKU Poppins','Poppins',sans-serif!important; font-size:13px!important; text-align:center!important; }
    .course-page-header .breadcrumb a { color:#fff; }
    .course-detail { max-width:980px; margin:0 auto; padding:48px 0 56px; }
    .course-detail__intro { padding:34px 38px; background:#fff; border-left:4px solid #a61928; box-shadow:0 4px 20px rgba(0,0,0,.08); }
    .course-detail__label { margin:0 0 10px; color:#a61928; font-family:'AKU Poppins','Poppins',sans-serif; font-size:13px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; }
    .course-detail h2 { margin:0 0 16px; color:#202020; font-family:'AKU Poppins','Poppins',sans-serif; font-size:29px; font-weight:700; line-height:1.3; }
    .course-detail p { margin:0; color:#555; font-size:15px; line-height:1.8; }
    .course-detail__facts { display:grid; grid-template-columns:repeat(3,1fr); margin:28px 0 0; border:1px solid #e5e5e5; background:#fafafa; }
    .course-detail__fact { padding:19px 22px; border-right:1px solid #e5e5e5; }
    .course-detail__fact:last-child { border-right:0; }
    .course-detail__fact dt { margin:0 0 4px; color:#a61928; font-size:12px; font-weight:700; letter-spacing:.05em; text-transform:uppercase; }
    .course-detail__fact dd { margin:0; color:#333; font-size:15px; font-weight:600; }
    @media (max-width:767px) { .course-page-header h1{font-size:30px!important}.course-detail{padding:30px 0}.course-detail__intro{padding:25px 20px}.course-detail h2{font-size:24px}.course-detail__facts{grid-template-columns:1fr}.course-detail__fact{border-right:0;border-bottom:1px solid #e5e5e5}.course-detail__fact:last-child{border-bottom:0} }
</style>
<section class="page-header course-page-header">
    <div class="uk-container"><h1><?php echo htmlspecialchars($courseTitle, ENT_QUOTES, 'UTF-8'); ?></h1><nav class="breadcrumb" aria-label="Breadcrumb"><a href="index.php">Home</a> &raquo; <a href="department-of-computer-science-engineering.php">Computer Science &amp; Engineering</a> &raquo; <?php echo htmlspecialchars($courseTitle, ENT_QUOTES, 'UTF-8'); ?></nav></div>
</section>
<main id="primary" class="site-main"><article class="page type-page status-publish hentry"><div class="uk-container"><section class="course-detail"><div class="course-detail__intro"><div class="course-detail__label"><?php echo htmlspecialchars($courseLevel, ENT_QUOTES, 'UTF-8'); ?> Program</div><h2><?php echo htmlspecialchars($courseTitle, ENT_QUOTES, 'UTF-8'); ?></h2><p><?php echo htmlspecialchars($courseDescription, ENT_QUOTES, 'UTF-8'); ?></p></div><dl class="course-detail__facts"><div class="course-detail__fact"><dt>Program Level</dt><dd><?php echo htmlspecialchars($courseLevel, ENT_QUOTES, 'UTF-8'); ?></dd></div><div class="course-detail__fact"><dt>Department</dt><dd>Computer Science &amp; Engineering</dd></div><div class="course-detail__fact"><dt>Campus</dt><dd>Dr. A.P.J. Abdul Kalam University, Indore</dd></div></dl></section></div></article></main>
<?php include dirname(__DIR__) . '/footer.php'; ?>
