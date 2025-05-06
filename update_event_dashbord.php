<?php
session_start();
require_once 'database/database.php';
$errors = [];
//verifier que l utilisateur est un administrateur
if ($_SESSION['users']['roles'] === 'admin') {
    if (isset($_GET['id'])) {
        $id_event = $_GET['id'];
        var_dump($id_event);
        $sql = "SELECT*FROM `evenements` WHERE id_evenement=:id_event";
        $requete = $db->prepare($sql);
        $requete->bindParam(':id_event', $id_event);
        $requete->execute();
        echo '<pre>';
        var_dump($id_event);
        echo '</pre>';
        $result = $requete->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            echo '<pre>';
            var_dump($result['titre']);
            echo '</pre>';
        } else {
            $errors['id'] = "Aucun événement trouvé avec cet ID.";
        }
        if($_POST['update_event_dashbord']){
          if(strlen($_POST['title'])<3 || empty($_POST['title'])|| strlen($_POST['title'])>50)  {
            $errors['title']='pseudo invalide';
          }
        }
        if($_POST['update_event_dashbord']){
          if(strlen($_POST['description'])<3 || empty($_POST['description'])|| strlen($_POST['description'])>450)  {
            $errors['description']='pseudo invalide';
          }
        }
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
