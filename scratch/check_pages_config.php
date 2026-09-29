<?php
require 'db.php';
$rows = $pdo->query('SELECT id, page_slug, page_title FROM about_pages_config ORDER BY id ASC')->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $r) {
    echo $r['id'] . ' | ' . $r['page_slug'] . ' | ' . $r['page_title'] . "\n";
}
