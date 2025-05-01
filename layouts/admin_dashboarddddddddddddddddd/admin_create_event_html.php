<?php
session_start();
require_once 'database/database.php';

if (isset($_SESSION['users']['id'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        try {
            $date_start = new DateTime($_POST['date_start']);
            $date_end = new DateTime($_POST['date_end']);
            if ($date_end < $date_start) {
                $errors['date'] = "La date de fin doit être supérieure à la date de début.";
            }
        } catch (Exception $e) {
            $errors['date'] = "Les dates fournies ne sont pas valides.";
        }

        // Validation de la capacité
        if (!filter_var($_POST['capacity'], FILTER_VALIDATE_INT)) {
            $errors['capacity'] = 'La capacité doit être un entier.';
        }

        // Si aucune erreur, insertion dans la base de données
        if (empty($errors)) {
            $sql = "INSERT INTO `evenements`(`titre`, `description`, `date_debut`, `date_fin`, `capacity`, `id_utilisateur`) 
                    VALUES(:titre, :description, :date_debut, :date_fin, :capacity, :id_utilisateur)";
            $requete = $db->prepare($sql);
            $requete->bindValue(':titre', htmlspecialchars($_POST['title']));
            $requete->bindValue(':description', htmlspecialchars($_POST['description']));
            $requete->bindValue(':date_debut', $_POST['date_start']);
            $requete->bindValue(':date_fin', $_POST['date_end']);
            $requete->bindValue(':capacity', $_POST['capacity'], PDO::PARAM_INT);
            $requete->bindValue(':id_utilisateur', $_SESSION['users']['id'], PDO::PARAM_INT);

            if ($requete->execute()) {
                // Redirection en cas de succès
                header('location:admin.php');
                exit();
            } else {
                $errors['sql'] = "Une erreur est survenue lors de l'insertion dans la base de données.";
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
$pageTitle = "Gestion des événements";
// 2. Début du tampon de la page de sortie
ob_start();
// 3. Inclure le fichier de configuration ou le fichier de la page d'accueil
require_once 'layouts/evenements/create_html.php';
// 4. Récupération du contenu du tampon dans la page de sortie
$pageContent = ob_get_clean();
// 5. Inclure le layout de la page de sortie
require_once 'layouts/layout_html.php';
