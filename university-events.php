<?php 
require_once 'db.php';
$pageTitle = "University Events - Dr APJ Abdul Kalam University";
include 'header.php'; 
?>
<main id="primary" class="site-main">
    <!-- Page Header Banner -->
    <section class="page-header" style="background: linear-gradient(rgba(113,23,28,0.88), rgba(0,0,0,0.85)), url('assets/images/about.jpg') center/cover no-repeat; padding: 60px 0; color: #fff; text-align: center;">
        <div class="uk-container">
            <h1 style="color: #ffffff; font-size: 34px; font-weight: 700; margin-bottom: 10px; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">University Events</h1>
            <div class="breadcrumb" style="font-size: 14px; color: #e2e8f0;">
                <a href="index.php" style="color: #ffffff; text-decoration: none;">Home</a> &raquo; <span style="color: #ffd6d9;">Events</span>
            </div>
        </div>
    </section>

    <!-- Events Grid Container -->
    <div class="uk-container" style="max-width: 1300px; padding: 50px 20px 80px 20px; margin: 0 auto;">
        <style>
        .events-listing-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .event-grid-card {
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.07);
            border: 1px solid #eef0f4;
            display: flex;
            flex-direction: column;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .event-grid-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        .event-grid-thumb {
            position: relative;
            width: 100%;
            height: 195px;
            overflow: hidden;
            background: #2a3b8f;
        }

        .event-grid-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.35s ease;
        }

        .event-grid-card:hover .event-grid-thumb img {
            transform: scale(1.04);
        }

        .event-grid-body {
            padding: 24px 22px 22px 22px;
            display: flex;
            flex-direction: column;
            flex: 1 1 auto;
        }

        .event-grid-title {
            font-size: 18px;
            font-weight: 700;
            color: #1e293b;
            margin: 0 0 10px 0;
            line-height: 1.35;
        }

        .event-grid-title a {
            color: #1e293b;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .event-grid-title a:hover {
            color: #1e73be;
        }

        .event-grid-date {
            color: #888888;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 12px;
        }

        .event-grid-excerpt {
            color: #64748b;
            font-size: 13.5px;
            line-height: 1.6;
            margin-bottom: 22px;
            flex: 1 1 auto;
        }

        .btn-view-details {
            display: inline-block;
            background-color: #1e73be;
            color: #ffffff !important;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            padding: 9px 18px;
            border-radius: 4px;
            text-decoration: none !important;
            letter-spacing: 0.5px;
            align-self: flex-start;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }

        .btn-view-details:hover {
            background-color: #155b96;
            transform: translateY(-1px);
        }

        @media (max-width: 991px) {
            .events-listing-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
        }

        @media (max-width: 640px) {
            .events-listing-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }
            .event-grid-thumb {
                height: 180px;
            }
        }
        </style>

        <div class="events-listing-grid">
            <?php
            $events_stmt = $pdo->prepare("SELECT title AS post_title, slug AS post_name, event_date, content FROM events ORDER BY event_date DESC");
            $events_stmt->execute();
            $events = $events_stmt->fetchAll();

            $defaultEventImg = "uploads/2025/03/events.jpg";
            if (!file_exists($defaultEventImg)) {
                $defaultEventImg = "assets/images/about.jpg";
            }

            if ($events) {
                foreach ($events as $event) {
                    $date_raw = $event['event_date'];
                    $formatted_date = $date_raw ? date('m/d/Y', strtotime($date_raw)) : '';
                    
                    // Excerpt text cleanup
                    $plain_text = trim(strip_tags($event['content']));
                    if (empty($plain_text)) {
                        $excerpt = "Join us for this exciting university event. Click below to view complete details, schedule, and participation guidelines.";
                    } else {
                        $excerpt = mb_strimwidth($plain_text, 0, 115, "...");
                    }
            ?>
            <div class="event-grid-card">
                <div class="event-grid-thumb">
                    <a href="event/<?php echo $event['post_name']; ?>/">
                        <img src="<?php echo htmlspecialchars($defaultEventImg); ?>" alt="<?php echo htmlspecialchars($event['post_title']); ?>">
                    </a>
                </div>
                <div class="event-grid-body">
                    <h3 class="event-grid-title">
                        <a href="event/<?php echo $event['post_name']; ?>/">
                            <?php echo htmlspecialchars($event['post_title']); ?>
                        </a>
                    </h3>
                    <?php if ($formatted_date): ?>
                    <div class="event-grid-date"><?php echo htmlspecialchars($formatted_date); ?></div>
                    <?php endif; ?>
                    <div class="event-grid-excerpt">
                        <?php echo htmlspecialchars($excerpt); ?>
                    </div>
                    <a href="event/<?php echo $event['post_name']; ?>/" class="btn-view-details">
                        VIEW DETAILS
                    </a>
                </div>
            </div>
            <?php 
                }
            } else {
                echo "<p style='grid-column: 1/-1; text-align: center; color: #666; font-size: 16px; padding: 40px 0;'>No university events currently available.</p>";
            }
            ?>
        </div>
    </div>
</main>
<?php include 'footer.php'; ?>
