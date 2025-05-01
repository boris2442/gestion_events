<section class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4"><?= $event['titre'] ?></h1>

        <p class="text-gray-700 leading-relaxed mb-4"><?= $event['description'] ?></p>

        <p class="text-sm text-gray-500 italic mb-2">Publié le : <?= $event['created_at'] ?></p>
        <!-- <p class="text-sm text-gray-500 italic mb-2">Publié le : <?= $event['id_utilisateur'] ?></p> -->

        <p class="text-sm text-gray-500 mb-6">Mis à jour le : <?= $event['updated_at'] ?></p>

        <a href="event" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Retour
        </a>
        
        
    </div>
</section>