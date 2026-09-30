<?php
require_once "db.php";

// If a specific department is passed, forward to department-view.php
if (!empty($_GET['dept'])) {
    require_once __DIR__ . '/department-view.php';
    exit;
}

// Otherwise render the full Eminent Faculty directory
require_once __DIR__ . '/eminent-faculty.php';
