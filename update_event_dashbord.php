<?php
session_start();
require_once 'database/database.php';
$errors=[];
//verifier que l utilisateur est un administrateur
if($_SESSION['users']['roles']==='admin'){
    if(isset($_GET['id'])){
      $id_event=$_GET['id'];
      var_dump($id_event);
      $sql="SELECT*FROM `evenements` WHERE id_evenement=:id_event";
      $requete=$db->prepare($sql);
      $requete->bindParam(':id_event', $id_event);
      $requete->execute();
      echo '<pre>';
      var_dump($id_event);
      echo '</pre>';
      $result=$requete->fetchAll(PDO::FETCH_ASSOC);
      
    }
}





// 1. Afficher le titre de la page
$pageTitle = "update_event_dashbord";
// 2. Début du tampon de la page de sortie
ob_start();
// 3. Inclure le fichier de configuration ou le fichier de la page d'accueil
require_once 'layouts/admin_dashboarddddddddddddddddd/admin_update_event_html.php';
// 4. Récupération du contenu du tampon dans la page de sortie
$pageContent = ob_get_clean();
// 5. Inclure le layout de la page de sortie
require_once 'layouts/layout_html.php';