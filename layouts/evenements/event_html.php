<?php
session_start();
require_once 'database/database.php';

// Fonction pour vérifier l'inscription
function isUserRegistered($db, $userId, $eventId) {
    $stmt = $db->prepare("SELECT COUNT(*) FROM inscriptions WHERE id_utilisateur = ? AND id_evenement = ?");
    $stmt->execute([$userId, $eventId]);
    return $stmt->fetchColumn() > 0;
}

$userId = $_SESSION['users']['id'];

foreach ($events as $event): 
    $eventId = $event['id_evenement'];
    $registered = isUserRegistered($db, $userId, $eventId);
?>
    <div class="bg-white shadow-md rounded-xl p-6 hover:shadow-lg transition duration-300 mb-6">
        <h2 class="text-xl font-semibold text-gray-900 mb-2">
            <?= htmlspecialchars($event['titre']) ?>
        </h2>
        <p class="text-gray-700 mb-4">
            Capacité : <span class="font-medium"><?= $event['capacity'] ?></span>
        </p>
        <div class="flex flex-wrap items-center gap-3">
            <!-- Voir plus… -->
            <a href="evenement.php?id=<?= urlencode($eventId) ?>"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
               Voir plus…
            </a>

            <?php if ($registered): ?>
                <!-- Se désabonner -->
                <form method="POST" action="desinscription_event.php" class="inline-block">
                    <input type="hidden" name="user_id"  value="<?= $userId ?>">
                    <input type="hidden" name="event_id" value="<?= $eventId ?>">
                    <input type="submit" name="desinscription_event" value="Se désabonner"
                           class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition" />
                </form>
            <?php else: ?>
                <!-- S’inscrire -->
                <form method="POST" action="inscription_event.php" class="inline-block">
                    <input type="hidden" name="user_id"  value="<?= $userId ?>">
                    <input type="hidden" name="event_id" value="<?= $eventId ?>">
                    <input type="submit" name="inscription_event" value="S'inscrire"
                           class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition" />
                </form>
            <?php endif; ?>

            <!-- Voir les participants -->
            <a href="participants.php?event_id=<?= urlencode($eventId) ?>"
               class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
               Voir les participants
            </a>
        </div>
    </div>
<?php endforeach; ?>
