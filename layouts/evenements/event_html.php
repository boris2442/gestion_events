<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">Liste des articles</h1>
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
      <?php endforeach; ?>
    </div>
  </div>