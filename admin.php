<?php
session_start();
require_once 'database/database.php';

// Vérification des droits d'accès
if (
    isset(
        $_SESSION['users']['id']

    ) && $_SESSION['users']['id'] > 0 &&  $_SESSION['users']['roles'] === 'admin'

) {

    $sql = $db->prepare("SELECT id, prenom, nom, email, roles FROM `utilisateurs`");
    $sql->execute();
    $users = $sql->fetchAll(PDO::FETCH_ASSOC);
} else {
    header('location:index.php');
    exit();
}
//recuperation de tous les evenements pour afficher

//recuperation des articles dans la datyabase...
$sql = "SELECT * FROM evenements ORDER BY created_at DESC ";
$query = $db->prepare($sql);
$query->execute();
$events = $query->fetchAll(PDO::FETCH_ASSOC);




// Chargement de la vue
ob_start();
$pageTitle = "Admin – EventPro";
require_once 'layouts/admin_dashboarddddddddddddddddd/admin_dashboarddddddddddddddddd_html.php';
$pageContent = ob_get_clean();
require_once 'layouts/layout_html.php';
