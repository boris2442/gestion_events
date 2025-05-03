<?php
session_start();
require_once 'database/database.php';

if (!isset($_GET['event_id'])) {
    echo "ID de l'événement manquant.";
    exit;
}

$eventId = $_GET['event_id'];

// Requête pour récupérer les participants inscrits à cet événement
$stmt = $db->prepare("
    SELECT u.nom, u.prenom, u.email
    FROM inscriptions i
    JOIN utilisateurs u ON i.id_utilisateur = u.id
    WHERE i.id_evenement = ?
");
$stmt->execute([$eventId]);
$participants = $stmt->fetchAll(PDO::FETCH_ASSOC);


// 1. Afficher le titre de la page
$pageTitle = "Mise à jour du profil";
// 2. Début du tampon de la page de sortie
ob_start();
// 3. Inclure le fichier de configuration ou le fichier de la page d'accueil
require_once 'layouts/evenements/participants_html.php';
// 4. Récupération du contenu du tampon dans la page de sortie
$pageContent = ob_get_clean();
// 5. Inclure le layout de la page de sortie
require_once 'layouts/layout_html.php';
