<!-- Barre de navigation -->
 <br><br><br>
<aside class="bg-white shadow">
    <div class="max-w-6xl mx-auto flex">
      <a href="#users" class="flex-1 text-center py-4 text-lg font-medium text-gray-700 hover:text-blue-600 transition">Utilisateurs</a>
      <a href="#events" class="flex-1 text-center py-4 text-lg font-medium text-gray-700 hover:text-blue-600 transition">Événements</a>
    </div>
  </aside>

  <main class="max-w-6xl mx-auto p-6 space-y-16">
    <!-- Section Utilisateurs -->
    <section id="users">
      <h2 class="text-2xl font-semibold text-gray-800 mb-6">Gestion des utilisateurs</h2>
      
      <!-- Formulaire de création -->
      <div class="bg-white rounded-lg shadow p-6 mb-8">
        <h3 class="text-xl font-medium mb-4">Créer un nouvel utilisateur</h3>
        <form action="admin_create_user.php" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="nom" class="block text-gray-700 mb-1">Nom</label>
            <input id="nom" name="nom" required
                   class="w-full border-gray-300 rounded-lg focus:ring-blue-400 focus:border-blue-400" />
          </div>
          <div>
            <label for="prenom" class="block text-gray-700 mb-1">Prénom</label>
            <input id="prenom" name="prenom" required
                   class="w-full border-gray-300 rounded-lg focus:ring-blue-400 focus:border-blue-400" />
          </div>
          <div>
            <label for="email" class="block text-gray-700 mb-1">Email</label>
            <input id="email" name="email" type="email" required
                   class="w-full border-gray-300 rounded-lg focus:ring-blue-400 focus:border-blue-400" />
          </div>
          <div>
            <label for="password" class="block text-gray-700 mb-1">Mot de passe</label>
            <input id="password" name="password" type="password" required
                   class="w-full border-gray-300 rounded-lg focus:ring-blue-400 focus:border-blue-400" />
          </div>
          <div class="md:col-span-2 text-right">
            <button type="submit"
                    class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
              Créer l’utilisateur
            </button>
          </div>
        </form>
      </div>

      <!-- Liste des utilisateurs -->
      <div class="bg-white rounded-lg shadow p-6 overflow-x-auto">
        <h3 class="text-xl font-medium mb-4">Liste des utilisateurs</h3>
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
              <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <!-- Exemple de ligne : à générer dynamiquement -->
            <tr>
              <td class="px-4 py-2 text-sm text-gray-700">1</td>
              <td class="px-4 py-2 text-sm text-gray-700">Dupont Alice</td>
              <td class="px-4 py-2 text-sm text-gray-700">alice@mail.com</td>
              <td class="px-4 py-2 text-sm text-center space-x-2">
                <button class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Modifier</button>
                <button class="px-3 py-1 bg-blue-600  text-white rounded hover:bg-blue-700 transition">Supprimer</button>
              </td>
            </tr>
            <!-- ... -->
          </tbody>
        </table>
      </div>
    </section>

    <!-- Section Événements -->
    <section id="events">
      <h2 class="text-2xl font-semibold text-gray-800 mb-6">Gestion des événements</h2>

      <!-- Formulaire de création -->
      <div class="bg-white rounded-lg shadow p-6 mb-8">
        <h3 class="text-xl font-medium mb-4">Créer un nouvel événement</h3>
        <form action="admin_create_event.php" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="titre" class="block text-gray-700 mb-1">Titre</label>
            <input id="titre" name="titre" required
                   class="w-full border-gray-300 rounded-lg focus:ring-blue-400 focus:border-blue-400" />
          </div>
          <div>
            <label for="date" class="block text-gray-700 mb-1">Date</label>
            <input id="date" name="date" type="date" required
                   class="w-full border-gray-300 rounded-lg focus:ring-blue-400 focus:border-blue-400" />
          </div>
          <div>
            <label for="capacity" class="block text-gray-700 mb-1">Capacité</label>
            <input id="capacity" name="capacity" type="number" required
                   class="w-full border-gray-300 rounded-lg focus:ring-blue-400 focus:border-blue-400" />
          </div>
          <div>
            <label for="lieu" class="block text-gray-700 mb-1">Lieu</label>
            <input id="lieu" name="lieu" required
                   class="w-full border-gray-300 rounded-lg focus:ring-blue-400 focus:border-blue-400" />
          </div>
          <div class="md:col-span-2 text-right">
            <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-green-700 transition">
              Créer l’événement
            </button>
          </div>
        </form>
      </div>

      <!-- Liste des événements -->
      <div class="bg-white rounded-lg shadow p-6 overflow-x-auto">
        <h3 class="text-xl font-medium mb-4">Liste des événements</h3>
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Titre</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Capacité</th>
              <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <!-- Exemple de ligne : à générer dynamiquement -->
            <tr>
              <td class="px-4 py-2 text-sm text-gray-700">101</td>
              <td class="px-4 py-2 text-sm text-gray-700">Atelier JS</td>
              <td class="px-4 py-2 text-sm text-gray-700">2025-05-15</td>
              <td class="px-4 py-2 text-sm text-gray-700">30</td>
              <td class="px-4 py-2 text-sm text-center space-x-2">
              <button  class="px-3 py-1 bg-blue-600  text-white rounded hover:bg-blue-700 transition">Supprimer</button>
                <button class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Modifier</button>
               
              </td>
            </tr>
            <!-- ... -->
          </tbody>
        </table>
      </div>
    </section>
  </main>