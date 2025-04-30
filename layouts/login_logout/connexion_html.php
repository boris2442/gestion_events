<div class="bg-white shadow-lg rounded-lg w-full max-w-md mx-4 p-6 sm:p-8">
    <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 text-center mb-6">Se connecter</h1>
    <form action="#" method="POST" class="space-y-5">
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

      <!-- Forgotten password link -->
      <div class="flex justify-end">
        <a href="#" class="text-sm text-indigo-600 hover:underline">Mot de passe oublié ?</a>
      </div>

      <!-- Bouton -->
      <div>
        <button type="submit"
                class="w-full py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition">
          Connexion
        </button>
      </div>

      <!-- Lien vers inscription -->
      <p class="text-center text-sm text-gray-600">
        Pas encore de compte ?
        <a href="#" class="text-indigo-600 hover:underline">Inscrivez-vous</a>
      </p>
    </form>
  </div>