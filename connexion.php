<?php

// Connexion à la base de données
session_start();
require_once 'database/database.php';

// Traitement du formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    // Vérification des champs du formulaire
    if (empty($_POST['email']) || !isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email non valide";
    }

    if (empty($_POST['password']) || !isset($_POST['password'])) {
        $errors['password'] = "Mot de passe requis";
    }

    // Si pas d'erreurs, on vérifie les identifiants
    if (empty($errors)) {
        $query = "SELECT * FROM utilisateurs WHERE email = ?";
        $req = $db->prepare($query);
        $req->execute([$_POST['email']]);
        $user = $req->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['users'] = [
                'id' => $user['id'],
                'prenom' => $user['prenom'],
                'nom' => $user['nom'],
                'email' => $user['email'],
                'roles' => $user['roles']
            ];
            //rediriger a la page anmin si l utilisateur a pour role admin
            if ($_SESSION['users']['roles']==='admin') {
                header('location:admin.php');
                exit();
            } else {

                header("Location: index.php");
                exit();
            }
        } else {
            $errors['login'] = "Identifiants incorrects";
        }
    }
}

// Affichage des erreurs
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo '<div style="background:red; text-align:center; color:white; padding:2px 8px; font-size:25px;">'
            . htmlspecialchars($error) .
            '</div>';
    }
}

$pageTitle = "Connexion";
// Début du tampon de la page de sortie
ob_start();
require_once 'layouts/login_logout/connexion_html.php';
// Récupération du contenu du tampon dans la page de sortie
$pageContent = ob_get_clean();
// Inclusion du layout de la page de sortie
require_once 'layouts/layout_html.php';
