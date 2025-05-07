<?php
session_start();
require_once 'database/database.php';
$errors = [];
//verifier que l utilisateur est un administrateur
if ($_SESSION['users']['roles'] === 'admin') {
  if (isset($_GET['id']) && $_GET['id']>0) {
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

    if (isset($_POST['update_event_dashbord'])) {
      if (strlen($_POST['title']) < 3 || empty($_POST['title']) || strlen($_POST['title']) > 50) {
        $errors['title'] = 'pseudo invalide';
      }

      if (strlen($_POST['description']) < 3 || empty($_POST['description']) || strlen($_POST['description']) > 450) {
        $errors['description'] = 'pseudo invalide';
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
      if (empty($errors)) {
        $sql = "UPDATE evenements SET titre=:title, description=:description, date_debut=:date_debut, date_fin=:date_fin, capacity=:capacity WHERE id_evenement=:id ";
        $requete = $db->prepare($sql);
        $requete->bindValue(':title', htmlspecialchars($_POST['title']));
        $requete->bindValue(':description', htmlspecialchars($_POST['description']));
        $requete->bindValue(':date_debut', $_POST['date_start']);
        $requete->bindValue(':date_fin', $_POST['date_end']);
        $requete->bindValue(':capacity', $_POST['capacity']);
        $requete->bindValue(':id',  $id_event);
        if ($requete->execute()) {
          header('location:admin.php');
          exit();
        }
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
