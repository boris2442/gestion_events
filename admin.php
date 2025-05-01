<?php
session_start();
require_once 'database/database.php';
ob_start();
$pageTitle = "Admin – EventPro";
require_once 'layouts/admin_dashboarddddddddddddddddd/admin_dashboarddddddddddddddddd_html.php';
$pageContent = ob_get_clean();
require_once 'layouts/layout_html.php';