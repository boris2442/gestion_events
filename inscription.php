<?php
session_start();
require_once 'database/database.php';

if (isset($_POST['register'])) {

    $errors = [];

    // Prenom-------------------------------
    if (empty($_POST['prenom']) || strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 20 ) {

        $errors['prenom'] = "prenom non valide";
    }

    // Prenom-------------------------------
    if (empty($_POST['nom'])  || strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 20  ) {

        $errors['nom'] = "nom non valide";
    }

    // Email---------------------------------------
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email non valide";
    } else {

        $query = "SELECT * FROM utilisateurs WHERE email = ?";
        $req = $db->prepare($query);
        $req->execute([$_POST['email']]);
        if ($req->fetch()) {
            $errors['email'] = "Cet email est déjà pris";
        }
    }

    // Password-----------------------------------------
    if (empty($_POST['password'])) {
        $errors['password'] = "Vous devez entrer un mot de passe ";
    } else if ($_POST['password'] !== $_POST['confirm_password']) {
        $errors['password'] = "Votre mot de passe ne correspond pas !";
    }

    // INSERT INTO------------------------------------------
    if (empty($errors)) {
        $query = "INSERT INTO utilisateurs(prenom,nom,email,password) VALUES(?,?,?,?)";
        $req = $db->prepare($query);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $req->execute([$_POST['prenom'], $_POST['nom'], $_POST['email'], $password]);
        var_dump($req);
        // On redirige vers la page de login

        header("Location: connexion.php");
        exit();
    } 
} 







//1 afficher le titre de la page
$pageTitle = "Inscription – EventPro";
//2-debut du tampon de la page de sortie
ob_start();
//3-inclure le fichier de configuration ou le fichier de la page d'accueil
require_once 'layouts/login_logout/inscription_html.php';
//4 recuperation du contenu du tampon dans la page de sortie
$pageContent = ob_get_clean();
//5 
// inclure le layout de la page de sortie
require_once 'layouts/layout_html.php';
