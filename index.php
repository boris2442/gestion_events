<?php 
//1 afficher le titre de la page
$pageTitle = "Gestion des événements";
//2-debut du tampon de la page de sortie
ob_start();
//3-inclure le fichier de configuration ou le fichier de la page d'accueil
require_once 'layouts/evenements/index_html.php';
//4 recuperation du contenu du tampon dans la page de sortie
$pageContent = ob_get_clean();
//5. inclure le layout de la page de sortie
require_once 'layouts/layout_html.php';