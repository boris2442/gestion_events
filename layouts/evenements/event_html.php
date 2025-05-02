 <?php 
session_start();
?>

<div class="max-w-4xl mx-auto p-6 mt-[10vh]">
  <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">Liste des événements</h1>
 <!-- <form action="inscription_event.php" method="post">
  <input type="submit" value="ok" name="ok2">
 </form> -->
  <?php foreach ($events as $event): ?>
    <div class="bg-white shadow-md rounded-xl p-6 hover:shadow-lg transition duration-300 mb-6">
      <h2 class="text-xl font-semibold text-gray-900 mb-2">
        <?= htmlspecialchars($event['titre']) ?>
      </h2>
      <p class="text-gray-700 mb-4">Capacité : <span class="font-medium"><?= $event['capacity'] ?></span></p>

      <div class="flex flex-wrap items-center gap-3">
        <!-- Voir plus… -->
        <a href="evenement.php?id=<?= urlencode($event['id_evenement']) ?>"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
          Voir plus…
        </a>

        <!-- S’inscrire -->
        <form method="POST" class="inline-block" action="inscription_event.php">
          <input type="" name="user_id" value="<?= $_SESSION['users']['id'] ?>">
          <input type="" name="event_id" value="<?= $event['id_evenement'] ?>">
          <input type="text" name="capacity">
          <input type="submit" name="ok" value="S'inscrire" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition"/>
 

        </form>

        <!-- Voir les participants -->
        <a href="participants.php?event_id=<?= urlencode($event['id_evenement']) ?>"
          class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
          Voir les participants
        </a>

      </div>
    </div>
  <?php endforeach; ?>
</div>