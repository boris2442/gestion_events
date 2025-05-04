<?php
session_start();
require_once 'database/database.php';

if (isset($_POST['create'])) {

    $errors = [];

    // Prenom-------------------------------
    if (empty($_POST['prenom']) || strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 20 ) {

        $errors['prenom'] = "prenom non valide";
    }

    // nom-------------------------------
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
    }

    // INSERT INTO------------------------------------------
    if (empty($errors)) {
        $query = "INSERT INTO utilisateurs(prenom,nom,email,password) VALUES(?,?,?,?)";
        $req = $db->prepare($query);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $req->execute([$_POST['prenom'], $_POST['nom'], $_POST['email'], $password]);
        var_dump($req);
        //creer une session pour enregistrer les donnees de  l'utilisateur
        $_SESSION['user_register'] = [
            'id' => $db->lastInsertId(),
            'prenom' => $_POST['prenom'],
            'nom' => $_POST['nom'],
            'email' => $_POST['email']
        ];
        // On redirige vers la page de login

        header("Location: admin.php");
        exit();
    } 
} 







