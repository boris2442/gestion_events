<section><br><br><br>
    <h1 class="text-2xl font-bold text-center text-blue-700 mb-6">
        Liste des participants à l'événement #<?= htmlspecialchars($eventId) ?>
    </h1>

    <?php if (count($participants) > 0): ?>
        <ul class="space-y-4">
            <?php foreach ($participants as $participant): ?>
                <li class="bg-white shadow-md rounded-xl p-4">
                    <strong><?= htmlspecialchars($participant['nom']) ?> <?= htmlspecialchars($participant['prenom']) ?></strong><br>
                    <span class="text-gray-600"><?= htmlspecialchars($participant['email']) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="text-center text-gray-600">Aucun participant inscrit pour cet événement.</p>
    <?php endif; ?>

    <div class="mt-6 text-center">
        <a href="javascript:history.back()" class="text-blue-600 hover:underline">← Retour</a>
    </div>
</section>