<section class="bg-gray-100 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">

    <div class="bg-white shadow-lg rounded-lg w-full max-w-md mx-4 p-6 sm:p-8">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 text-center mb-6">Créer un compte</h1>
        <form action="#" method="POST" class="space-y-5">

            <!-- Nom / Prénom -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                    <input id="prenom" name="prenom" type="text" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                    <input id="nom" name="nom" type="text" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse e-mail</label>
                <input id="email" name="email" type="email" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>

            <!-- Mot de passe -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                <input id="password" name="password" type="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>

            <!-- Confirmation du mot de passe -->
            <div>
                <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Confirmez le mot de passe</label>
                <input id="confirm_password" name="confirm_password" type="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>

            <!-- Bouton -->
            <div>
                <button type="submit"
                    class="w-full py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition">
                    S’inscrire
                </button>
            </div>

            <!-- Lien vers connexion -->
            <p class="text-center text-sm text-gray-600">
                Vous avez déjà un compte ?
                <a href="#" class="text-indigo-600 hover:underline">Connectez-vous</a>
            </p>
        </form>
    </div>
</section>