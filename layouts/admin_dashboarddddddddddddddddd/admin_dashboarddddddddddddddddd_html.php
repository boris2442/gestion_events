<div class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Navigation -->
    <aside class="bg-white shadow">
        <div class="w-full max-w-screen-xl mx-auto flex flex-col md:flex-row">
            <a href="#users"
                class="w-full md:flex-1 text-center py-4 text-lg font-medium text-gray-700 hover:text-blue-600 transition border-b md:border-b-0 md:border-r border-gray-200">
                Utilisateurs
            </a>
            <a href="#events"
                class="w-full md:flex-1 text-center py-4 text-lg font-medium text-gray-700 hover:text-blue-600 transition">
                Événements
            </a>
        </div>
    </aside>

    <!-- Contenu principal -->
    <main class="flex-1 w-full max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-16">
        <!-- Section Utilisateurs -->
        <section id="users">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Gestion des utilisateurs</h2>

            <!-- Formulaire de création -->
            <div class="bg-white rounded-lg shadow p-4 md:p-6 mb-8">
                <h3 class="text-xl font-medium mb-4">Créer un nouvel utilisateur</h3>
                <form method="POST" action="create_users_dashbord.php" class="space-y-5">
                    <!-- title -->
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">nom</label>
                        <input id="nom" name="nom" type="text" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    </div>
                    <!-- prenom -->
                    <div>
                        <label for="prenom" class="block text-sm font-medium text-gray-700 mb-2">prenom</label>
                        <input id="prenom" name="prenom" type="text" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    </div>
                    <!-- email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">email</label>
                        <input id="email" name="email" type="email" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    </div>
                    <!-- date_start -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">password</label>
                        <input id="password" name="password" type="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    </div>

                    <!-- Bouton -->
                    <div>
                        <button type="submit" name="create"
                            class="w-full py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition">
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>

            <!-- Liste des utilisateurs -->
            <!-- Conteneur en largeur 100% -->
            <div class="bg-white shadow p-4 md:p-6 w-full overflow-x-auto">
                <h3 class="text-xl font-medium mb-4">Liste des utilisateurs</h3>
                <table class="w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-3 py-2 text-center font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-3 py-2 text-center font-medium text-gray-500 uppercase">Nom</th>
                            <th class="px-3 py-2 text-center font-medium text-gray-500 uppercase">Prénom</th>
                            <th class="px-3 py-2 text-center font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-3 py-2 text-center font-medium text-gray-500 uppercase">Modifier</th>
                            <th class="px-3 py-2 text-center font-medium text-gray-500 uppercase">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Exemple de ligne -->
                        <?php
                        foreach ($users as $user):
                        ?>
                            <tr class="odd:bg-red-100 even:bg-blue-100 hover:bg-gray-100 transition duration-200 cursor-pointer">
                                <td class="px-3 py-2 text-center"><?= $user['id'] ?></td>
                                <td class="px-3 py-2 text-center"><?= htmlspecialchars($user['nom']) ?></td>
                                <td class="px-3 py-2 text-center"><?= htmlspecialchars($user['prenom']) ?></td>
                                <td class="px-3 py-2 text-center"><?= htmlspecialchars($user['email']) ?></td>
                                <td class="px-3 py-2 text-center">
                                    <a href="update_dashbord_users?id=<?= $user['id'] ?>" class="px-2 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition text-xs">
                                        Modifier
                                    </a>
                                </td>
                                <td class="px-3 py-2 text-center">
                                    <a href="delete_dashbord?id=<?= $user['id'] ?>" class="px-2 py-1 bg-red-600
hover:bg-red-700 text-white rounded  transition text-xs" onClick="return confirm('Voulez-vous vraiment supprimer cet article ?')" ;>
                                        Supprimer
                                    </a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>

        </section>

        <!-- Section Événements -->
        <section id="events">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Gestion des événements</h2>

            <!-- Formulaire de création -->
            <div class="bg-white rounded-lg shadow p-4 md:p-6 mb-8">
                <h3 class="text-xl font-medium mb-4">Créer un nouvel événement</h3>


                <form method="POST" action="create_event_dashbord.php" class="space-y-5">
                    <!-- title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
                        <input id="title" name="title" type="text" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    </div>
                    <!-- description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea id="description" name="description" rows="5" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-none"></textarea>
                    </div>
                    <!-- date_start -->
                    <div>
                        <label for="date_start" class="block text-sm font-medium text-gray-700 mb-1">Date de début</label>
                        <input id="date_start" name="date_start" type="date" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    </div>
                    <!-- date_end -->
                    <div>
                        <label for="date_end" class="block text-sm font-medium text-gray-700 mb-1">Date de fin</label>
                        <input id="date_end" name="date_end" type="date" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    </div>
                    <!-- capacity -->
                    <div>
                        <label for="capacity" class="block text-sm font-medium text-gray-700 mb-1">Capacité</label>
                        <input id="capacity" name="capacity" min="0" value="100" type="number" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    </div>
                    <!-- Bouton -->
                    <div>
                        <input type="submit" name="create_event_dashbord"
                            class="w-full py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition" value="Ajouter" />


                    </div>
                </form>
            </div>

            <!-- Liste des événements -->
            <div class="bg-white rounded-lg shadow p-4 md:p-6 overflow-x-auto">
                <h3 class="text-xl font-medium mb-4">Liste des événements</h3>
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr class="odd:bg-white even:bg-gray-50">
                            <th class="px-3 py-2 text-left font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-3 py-2 text-left font-medium text-gray-500 uppercase">Titre</th>
                            <th class="px-3 py-2 text-left font-medium text-gray-500 uppercase hidden sm:table-cell">Date</th>
                            <th class="px-3 py-2 text-left font-medium text-gray-500 uppercase hidden md:table-cell">Capacité</th>
                            <th class="px-3 py-2 text-center font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class=" divide-y divide-gray-200">
                        <?php foreach ($events as $event): ?>
                            <tr class="odd:bg-red-100 even:bg-blue-100 hover:bg-gray-100 transition duration-200 cursor-pointer">
                                <td class="px-3 py-2"><?= $event['id_evenement'] ?></td>
                                <td class="px-3 py-2"><?= $event['titre'] ?></td>
                                <td class="px-3 py-2 hidden sm:table-cell"><?= $event['created_at'] ?></td>
                                <td class="px-3 py-2 hidden md:table-cell"><?= $event['capacity'] ?></td>
                                <td class="px-3 py-2 text-center space-x-1">
                                    <a href="" class="px-2 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition text-xs">Modifier</a>
                                    <a href="delete_event_dashbord.php?id=<?= $event['id_evenement'] ?>" class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition text-xs" onClick="return confirm('Voulez-vous vraiment supprimer cet article ?')">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
            </div>
        </section>
    </main>
</div>