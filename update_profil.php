<?php
session_start();
require_once 'database/database.php';
if(
    isset($_GET['id']) || is_numeric($_GET['id'])){
    var_dump($_GET['id']);
    $id=$_GET['id'];
    //recuperer les donnees de l url
    $sql="SELECT * FROM utilisateurs WHERE id=:id";
    $requete=$db->prepare($sql);
  $requete->bindValue(':id',$id,PDO::PARAM_INT);
    $requete->execute();
    $profil=$requete->fetch(PDO::FETCH_ASSOC);
    var_dump($profil);

}



// 1. Afficher le titre de la page
$pageTitle = "update_profil";
// 2. Début du tampon de la page de sortie
ob_start();
// 3. Inclure le fichier de configuration ou le fichier de la page d'accueil
require_once 'layouts/profil/update_profil_html.php';
// 4. Récupération du contenu du tampon dans la page de sortie
$pageContent = ob_get_clean();
// 5. Inclure le layout de la page de sortie
require_once 'layouts/layout_html.php';
