<?php
session_start();
require_once 'database/database.php';
if (isset($_SESSION['users']['id'])) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //title
        $errors = [];
        if (empty($_POST['title'])) {
            $errors['title'] = 'title ne doit pas etre vide';
        } elseif (strlen($_POST['title']) > 75) {
            $errors['title'] = 'title trop long';
        }
        //description
        if (empty($_POST['description'])) {
            $errors['description'] = 'description ne doit pas etre vide';
        } elseif (strlen($_POST['description']) > 500) {
            $errors['description'] = 'description trop long';
        }
        //date start
        $date_start = $_POST['date_start'];
        $date_end = $_POST['date_end'];
        if ($date_end < $date_start) {
            $errors['date'] = "La date limite doit etre superieure a la date d'aujourd'hui";
        }
        if (!is_int($_POST['capacity'])) {
            $errors['capacity'] = 'La capacity doit etre un entier';
        }
        if (empty($errors)) {

            $sql = "INSERT INTO `evenements`(`titre`, `description`, `date_debut`, `date_fin`, `capacity`) VALUES(:titre, :description, :date_debut, :date_fin, :capacity)";
            $requete = $db->prepare($sql);
            $requete->bindValue(':titre', $_POST['title']);
            $requete->bindValue(':description', $_POST['description']);
            $requete->bindValue(':date_debut', $_POST['date_end']);
            $requete->bindValue(':date_fin', $_POST['date_end']);
            $requete->bindValue(':capacity', $_POST['capacity']);
            $requete->execute();
            header('location:index.php');
           
        }
    }
}

//1 afficher le titre de la page
$pageTitle = "Gestion des événements";
//2-debut du tampon de la page de sortie
ob_start();
//3-inclure le fichier de configuration ou le fichier de la page d'accueil
require_once 'layouts/evenements/create_html.php';
//4 recuperation du contenu du tampon dans la page de sortie
$pageContent = ob_get_clean();
//5. inclure le layout de la page de sortie
require_once 'layouts/layout_html.php';
