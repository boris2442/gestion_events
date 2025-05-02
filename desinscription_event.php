<?php
session_start();
require_once 'database/database.php';

if (isset($_POST["desinscription_event"])) {
    $user_id = $_POST["user_id"];
    $event_id = $_POST["event_id"];

    // Supprimer l'inscription de l'utilisateur à l'événement
    $delete_query = "DELETE FROM inscriptions WHERE id_utilisateur = ? AND id_evenement = ?";
    $stmt = $db->prepare($delete_query);
    
    if ($stmt->execute([$user_id, $event_id])) {
        ?>
        <script>
            alert('Vous avez été désinscrit avec succès.');
            window.location.href = 'event.php';
        </script>
        <?php
    } else {
        echo "Erreur lors de la désinscription.";
    }

} else {
    echo "Aucune donnée reçue.";
}
