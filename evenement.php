<?php
session_start();
require_once 'database/database.php';
$errors = [];
$event_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$event_id || $event_id === NULL) {
    $errors['event_id'] = 'Parametre id non valide';
}
$sql = "SELECT*FROM evenements WHERE id_evenement=:event_id";
$query = $db->prepare($sql);
$query->execute(compact('event_id'));
$event = $query->fetch();

//recuperation des articles dans la datyabase...
$sql="SELECT * FROM evenements ORDER BY created_at DESC ";
$query = $db->prepare($sql);
$query->execute();
$events = $query->fetchAll(PDO::FETCH_ASSOC);



// 1--On affiche le titre autre

$pageTitle = 'Articles du Blog';

// 2-Debut du tampon de la page de sortie

ob_start();

// 3-inclure le layout de la page d' show article
require_once 'layouts/evenements/show_html.php';

//4-recuperation du contenu du tampon de la page d'accueil
$pageContent = ob_get_clean();

//5-Inclure le layout de la page de sortie
require_once 'layouts/layout_html.php';
