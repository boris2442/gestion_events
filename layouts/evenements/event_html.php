<!-- <div class="max-w-4xl mx-auto p-6 mt-[10vh]">

  <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">Liste des evenements</h1>
  <hr class="mb-6 border-blue-300">

  <div class="space-y-6">
    <?php foreach ($events as $event): ?>
      <div class="bg-white shadow-md rounded-xl p-6 hover:shadow-lg transition duration-300">
        <h2 class="text-xl font-semibold text-gray-900 mb-2">
          <?= htmlspecialchars($event['titre']) ?>
        </h2>
        <p class="text-gray-700 mb-4">
          Capacité : <span class="font-medium"><?= $event['capacity'] ?></span>
        </p>
        <a href="evenement.php?id=<?= urlencode($event['id_evenement']) ?>" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
          Voir plus...
        </a>
        
      </div>
      <hr class="mb-6 border-blue-300">
    <?php endforeach; ?>
  </div>
</div> -->






<div class="max-w-4xl mx-auto p-6 mt-[10vh]">
  <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">Liste des événements</h1>

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
        <form  method="POST" class="inline-block">
          <input type="hidden" name="event_id" value="<?= htmlspecialchars($event['id_evenement']) ?>">
          <button type="submit"
                  class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
            S’inscrire
          </button>
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
