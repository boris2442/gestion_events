<?php
session_start();
require_once 'database/database.php';

if (isset($_SESSION['users']['id'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_event_dashbord'])) {
        // Initialisation des erreurs
        $errors = [];

        // Validation du titre
  
        if (empty($_POST['title'])) {
            $errors['title'] = 'Le titre ne doit pas être vide.';
        } elseif (strlen($_POST['title']) > 75) {
            $errors['title'] = 'Le titre est trop long.';
        }

        // Validation de la description
        if (empty($_POST['description'])) {
            $errors['description'] = 'La description ne doit pas être vide.';
        } elseif (strlen($_POST['description']) > 500) {
            $errors['description'] = 'La description est trop longue.';
        }

        // Validation des dates
        if (empty($_POST['date_start']) || empty($_POST['date_end'])) {
            $errors['date'] = "Les dates de début et de fin sont obligatoires.";
        } else {
            try {
                $date_start = new DateTime($_POST['date_start']);
                $date_end = new DateTime($_POST['date_end']);
                if ($date_end < $date_start) {
                    $errors['date'] = "La date de fin doit être supérieure à la date de début.";
                }
            } catch (Exception $e) {
                $errors['date'] = "Les dates fournies ne sont pas valides.";
            }
        }

        // Validation de la capacité
        if (!filter_var($_POST['capacity'], FILTER_VALIDATE_INT) || $_POST['capacity'] <= 0) {
            $errors['capacity'] = 'La capacité doit être un entier positif.';
        }

        // Si aucune erreur, insertion dans la base de données
        if (empty($errors)) {
            $sql = "INSERT INTO `evenements`(`titre`, `description`, `date_debut`, `date_fin`, `capacity`, `id_utilisateur`) 
                    VALUES(:titre, :description, :date_debut, :date_fin, :capacity, :id_utilisateur)";
            $requete = $db->prepare($sql);
            $requete->bindValue(':titre', $_POST['title']);
            $requete->bindValue(':description', $_POST['description']);
            $requete->bindValue(':date_debut', $_POST['date_start']);
            $requete->bindValue(':date_fin', $_POST['date_end']);
            $requete->bindValue(':capacity', $_POST['capacity'], PDO::PARAM_INT);
            $requete->bindValue(':id_utilisateur', $_SESSION['users']['id'], PDO::PARAM_INT);

            try {
                if ($requete->execute()) {
                    header('location:admin.php');
                    exit();
                }
            } catch (PDOException $e) {
                $errors['sql'] = "Erreur SQL : " . $e->getMessage();
            }
        }
    }
} else {
    header('location:connexion.php');
    exit();
}

// Affichage des erreurs
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo '<div style="background:red; text-align:center; color:white; padding:2px 8px; font-size:14px;">'
            . htmlspecialchars($error) .
            '</div>';
    }
}

// 1. Afficher le titre de la page
$pageTitle = "Dashboard Admin - Créer un événement";
// 2. Début du tampon de la page de sortie
ob_start();
// 3. Inclure le fichier de configuration ou le fichier de la page d'accueil
require_once 'layouts/admin_dashboarddddddddddddddddd/admin_dashboarddddddddddddddddd_html.php';
// 4. Récupération du contenu du tampon dans la page de sortie
$pageContent = ob_get_clean();
// 5. Inclure le layout de la page de sortie
require_once 'layouts/layout_html.php';