<?php
session_start();
require_once 'database/database.php';

if (isset($_SESSION['users']['id']) && $_SESSION['users']['id'] > 0) {
    // Récupérer les informations de l'utilisateur depuis la base de données
    $sql = $db->prepare("SELECT * FROM `utilisateurs` WHERE id=?");
    $sql->execute([$_SESSION['users']['id']]);
    $user = $sql->fetch();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $errors = [];

        // Validation du prénom
        if (empty($_POST['prenom']) || strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 50) {
            $errors['prenom'] = "Le prénom est non valide.";
        }

        // Validation du nom
        if (empty($_POST['nom']) || strlen($_POST['nom']) < 3 || strlen($_POST['nom']) > 50) {
            $errors['nom'] = "Le nom est non valide.";
        }

        // Validation de l'email
        if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email non valide.";
        } else {
            $query = "SELECT * FROM utilisateurs WHERE email = ? AND id != ?";
            $req = $db->prepare($query);
            $req->execute([$_POST['email'], $_SESSION['users']['id']]);
            if ($req->fetch()) {
                $errors['email'] = "Cet email est déjà pris.";
            }
        }

        // Validation du mot de passe
        if (!empty($_POST['password'])) {
            if (strlen($_POST['password']) > 20) {
                $errors['password'] = 'Le mot de passe est trop long.';
            } else {
                $password = password_hash($_POST['password'], PASSWORD_ARGON2ID);
            }
        } else {
            // Si aucun mot de passe n'est fourni, conserver l'ancien mot de passe
            $password = $user['password'];
        }

        // Si aucune erreur, mise à jour dans la base de données
        if (empty($errors)) {
            $sql = "UPDATE `utilisateurs` SET nom=:nom, prenom=:prenom, email=:email, password=:password WHERE id=:id";
            $requete = $db->prepare($sql);
            $requete->bindValue(':nom', htmlspecialchars($_POST['nom']));
            $requete->bindValue(':prenom', htmlspecialchars($_POST['prenom']));
            $requete->bindValue(':email', htmlspecialchars($_POST['email']));
            $requete->bindValue(':password', $password);
            $requete->bindParam(':id', $_SESSION['users']['id'], PDO::PARAM_INT);

            if ($requete->execute()) {
                header('location:event.php');
                exit();
            } else {
                $errors['sql'] = "Une erreur est survenue lors de la mise à jour.";
            }
        }
    }
}

// 1. Afficher le titre de la page
$pageTitle = "Mise à jour du profil";
// 2. Début du tampon de la page de sortie
ob_start();
// 3. Inclure le fichier de configuration ou le fichier de la page d'accueil
require_once 'layouts/profil/update_profil_html.php';
// 4. Récupération du contenu du tampon dans la page de sortie
$pageContent = ob_get_clean();
// 5. Inclure le layout de la page de sortie
require_once 'layouts/layout_html.php';