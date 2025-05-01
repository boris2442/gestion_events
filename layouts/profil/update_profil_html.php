<br><br><br>
<main class="w-full max-w-md bg-white rounded-2xl shadow-lg p-6 mx-auto ">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Modifier mon profil</h1>
    <form  method="POST" class="space-y-5">
        <!-- Nom -->
        <div>
            <label for="nom" class="block text-gray-700 font-medium mb-1">Nom</label>
            <input
                type="text"
                id="nom"
                name="nom"
                value="<?= htmlspecialchars($_SESSION['users']['nom'] ?? '') ?>"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>
        <!-- Prénom -->
        <div>
            <label for="prenom" class="block text-gray-700 font-medium mb-1">Prénom</label>
            <input
                type="text"
                id="prenom"
                name="prenom"
                value="<?= htmlspecialchars($_SESSION['users']['prenom'] ?? '') ?>"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>
        <!-- Email -->
        <div>
            <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="<?= htmlspecialchars($_SESSION['users']['email'] ?? '') ?>"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>

        <!-- Mot de passe -->
        <div>
            <label for="password" class="block text-gray-700 font-medium mb-1">Nouveau mot de passe</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="••••••••"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
            <p class="text-sm text-gray-500 mt-1">Laissez vide pour conserver le mot de passe actuel.</p>
        </div>
        <!-- Bouton -->
        <div class="pt-4">
            <button
                type="submit"
                class="w-full py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition">
                Enregistrer les modifications
            </button>
        </div>
    </form>
</main>