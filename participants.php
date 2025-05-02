<?php
session_start();
require_once 'database/database.php';
if(isset($_SESSION['users']['id']) && $_SESSION['users']['id'] > 0) {
   //recuperer le nom des participants par evenemenmts
   
} else {
    header('location:event.php');
    exit();
}   

// 1. Afficher le titre de la page
$pageTitle = "Mise à jour du profil";
// 2. Début du tampon de la page de sortie
ob_start();
// 3. Inclure le fichier de configuration ou le fichier de la page d'accueil
require_once 'layouts/layouts/participants_html.php';
// 4. Récupération du contenu du tampon dans la page de sortie
$pageContent = ob_get_clean();
// 5. Inclure le layout de la page de sortie
require_once 'layouts/layout_html.php';