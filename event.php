<?php
require_once 'database/database.php';

//recuperation des articles dans la datyabase...
$sql="SELECT * FROM evenements ORDER BY date_debut DESC ";
$query = $db->prepare($sql);
$query->execute();
$events = $query->fetchAll(PDO::FETCH_ASSOC);




// 1--On affiche le titre autre

$pageTitle ='Accueil des events'; 

// 2-Debut du tampon de la page de sortie
 
ob_start();

// 3-inclure le layout de la page d' accueil
require_once 'layouts/evenements/event_html.php';

//4-recuperation du contenu du tampon de la page d'accueil
$pageContent = ob_get_clean();

//5-Inclure le layout de la page de sortie
require_once 'layouts/layout_html.php';