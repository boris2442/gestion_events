<?php
//demarrage de la session
session_start();
//inclusion de la base de données
require_once 'database/database.php';
$pageTitle="Contact";
ob_start();
//inclusion de la page de contact
require_once 'layouts/contact/contact_html.php';
//recuperation du contenu du tampon dans la page de sortie
$pageContent=ob_get_clean();
//inclusion du layout de la page de sortie
require_once 'layouts/layout_html.php';
?>
