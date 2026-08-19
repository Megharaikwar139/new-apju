<?php
$pageTitle = 'Examination Schedule - Dr APJ University Indore';
$bodyClass = 'wp-singular page-template-default page page-id-391 wp-theme-aku wpb-js-composer js-comp-ver-8.7.2 vc_responsive';
include 'header.php';

function examinationPdfUrl($filename) {
    $localFilenames = [
        'POLY-II-SEM-REG-JUNE-2026-BATCH-2025' => 'POLY-II-SEM-REG-JUNE-BATCH-2025',
    ];

    $filename = $localFilenames[$filename] ?? $filename;
    return 'uploads/2026/08/' . rawurlencode($filename) . '.pdf';
}

$schedules = [
    'Diploma Course' => [
        'POLY PT EE II SEM REG AND EX JUNE 2026',
        'POLY PT EE I SEM EX JUNE 2026',
        'POLY PT AE II SEM REG AND EX JUNE 2026',
        'POLY PT AE I SEM EX JUNE 2026',
        'POLY II SEM REG JUNE 2026 BATCH 2025',
        'POLY II SEM REG AND EX JUNE 2026',
        'POLY I SEM EX JUNE 2026',
        'POLY I SEM EX JUNE 2026 BATCH 2025',
    ],
    'PG Course' => [
        'M TECH II SEM REG JUNE 2026 BATCH 2025',
        'M TECH II SEM REG AND EX JUNE 2026',
        'M TECH I SEM EX JUNE 2026 BATCH 2025',
        'M TECH I SEM EX JUNE 2026',
        'M PH II SEM REG AND EX JUNE 2026',
        'M PH I SEM EX JUNE 2026',
    ],
    'UG Course' => [
        'BE II SEM REG JUNE 2026 BATCH 2025',
        'BE II SEM REG AND EX JUNE 2026',
        'BE I SEM EX JUNE 2026',
        'BE I SEM EX JUNE 2026 BATCH 2025',
        'B SC AGRI II SEM REG AND EX JUNE 2026',
        'B PH II SEM REG AND EX JUNE 2026',
        'B PH I SEM EX JUNE 2026',
    ],
];
?>

<style>
    .examination-page-header {
        /* Use the local campus image explicitly: the shared stylesheet points to
           a legacy, non-existent assets/img path. */
        background: linear-gradient(rgba(20, 20, 20, .48), rgba(20, 20, 20, .48)), url('/new-apju/assets/images/bg-header.jpg') center center / cover no-repeat !important;
        min-height: 180px;
        display: flex;
        align-items: center;
    }
    .examination-page-header .uk-container { position: relative; }
    .examination-page-header h1 {
        margin: 0 0 14px;
        color: #fff;
        font-family: 'AKU Poppins', 'Poppins', sans-serif !important;
        font-size: 46px !important;
        font-weight: 800 !important;
        line-height: 1.2 !important;
        text-align: center;
    }
    .examination-page-header .breadcrumb {
        display: block !important;
        width: 100% !important;
        margin: 0;
        color: #fff;
        font-family: 'AKU Poppins', 'Poppins', sans-serif !important;
        font-size: 13px !important;
        line-height: 1.4;
        text-align: center !important;
    }
    .examination-page-header .breadcrumb a { color: #fff; }

    .examination-calendar { padding: 6px 0 42px; }
    .examination-calendar__title {
        margin: 0 0 38px;
        color: #232323;
        font-family: 'AKU Poppins', 'Poppins', sans-serif;
        font-size: 31px;
        font-weight: 700;
        line-height: 1.25;
        text-align: center;
    }
    .exam-schedule-group { margin: 0 0 34px; }
    .exam-schedule-group:last-child { margin-bottom: 0; }
    .exam-schedule-group__heading {
        position: relative;
        margin: 0 0 18px;
        padding-bottom: 10px;
        color: #252525;
        border-bottom: 1px solid #e5e5e5;
        font-family: 'AKU Poppins', 'Poppins', sans-serif;
        font-size: 22px;
        font-weight: 700;
        line-height: 1.35;
    }
    .exam-schedule-group__heading::after {
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 54px;
        height: 2px;
        background: #9f1724;
        content: '';
    }
    .exam-schedule-list {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px 22px;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .exam-schedule-list a {
        display: flex;
        align-items: center;
        min-height: 48px;
        padding: 11px 17px;
        color: #4b4b4b;
        background: #fff;
        border: 1px solid #e1e1e1;
        border-left: 3px solid #9f1724;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .035);
        font-family: 'AKU Poppins', 'Poppins', sans-serif;
        font-size: 13px;
        font-weight: 500;
        line-height: 1.45;
        text-decoration: none;
        transition: background .2s ease, border-color .2s ease, color .2s ease, transform .2s ease;
    }
    .exam-schedule-list a::before {
        flex: 0 0 auto;
        width: 14px;
        height: 16px;
        margin-right: 10px;
        color: #9f1724;
        content: '▣';
        font-size: 14px;
        line-height: 1;
    }
    .exam-schedule-list a:hover,
    .exam-schedule-list a:focus {
        color: #fff;
        background: #9f1724;
        border-color: #9f1724;
        transform: translateY(-1px);
    }
    .exam-schedule-list a:hover::before,
    .exam-schedule-list a:focus::before { color: #fff; }
    @media (max-width: 767px) {
        .examination-page-header h1 { font-size: 32px !important; }
        .examination-calendar { padding-bottom: 25px; }
        .examination-calendar__title { margin-bottom: 28px; font-size: 26px; }
        .exam-schedule-group { margin-bottom: 27px; }
        .exam-schedule-group__heading { font-size: 20px; }
        .exam-schedule-list { grid-template-columns: 1fr; gap: 10px; }
    }
</style>

<section class="page-header examination-page-header">
    <div class="uk-container">
        <h1>Examination Schedule</h1>
        <nav class="breadcrumb" aria-label="Breadcrumb"><a href="index.php">Home</a> &raquo; Examination Schedule</nav>
    </div>
</section>

<main id="primary" class="site-main">
    <article id="post-391" class="post-391 page type-page status-publish hentry">
        <div class="uk-container">
            <div class="entry-content">
                <div class="wpb-content-wrapper">
                    <div class="vc_row wpb_row vc_row-fluid">
                        <div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">
                            <div class="vc_empty_space" style="height: 36px"><span class="vc_empty_space_inner"></span></div>
                            <section class="examination-calendar" aria-labelledby="examination-calendar-title">
                                <h2 id="examination-calendar-title" class="examination-calendar__title">Examination Calendar</h2>
                                <?php foreach ($schedules as $course => $items): ?>
                                    <section class="exam-schedule-group">
                                        <h3 class="exam-schedule-group__heading"><?php echo htmlspecialchars($course, ENT_QUOTES, 'UTF-8'); ?></h3>
                                        <ul class="exam-schedule-list">
                                            <?php foreach ($items as $item): ?>
                                                <li><a href="<?php echo htmlspecialchars(examinationPdfUrl(str_replace(' ', '-', $item)), ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener"><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </section>
                                <?php endforeach; ?>
                            </section>
                        </div></div></div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</main>

<?php include 'footer.php'; ?>
