<?php
session_start();
require_once 'database/database.php';
if (isset($_POST["inscription_event"])) {
    $user_id = $_POST["user_id"];
    $event_id = $_POST["event_id"];
    
    // Vérifier si l'utilisateur est déjà inscrit à l'événement
    $check_query = "SELECT * FROM inscriptions WHERE id_utilisateur = ? AND id_evenement = ?";
    $stmt = $db->prepare($check_query);
    $stmt->execute([$user_id, $event_id]);
    if ($stmt->rowCount() > 0) {
        ?>
        <script>
            alert('vous etes deja inscrit a cet evenement');
            window.location.href = 'event.php'; // Rediriger vers la page des événements
        </script>
    
        <?php
    } else {
        // Insérer l'inscription dans la base de données
        $insert_query = "INSERT INTO inscriptions (id_utilisateur, id_evenement) VALUES (?, ?)";
        $stmt = $db->prepare($insert_query);
        if ($stmt->execute([$user_id, $event_id])) {
            echo "Inscription réussie !";
            ?>
            <script>
                alert('vous avez ete inscrire avec sucess');
            </script>
            <?php
            // header("Location: event.php");
             // Rediriger vers la page des événements après l'inscription
        } else {
            echo "Erreur lors de l'inscription.";
        }
    }
 
    


  
}else {
    echo "Aucune donnée reçue.";
}

