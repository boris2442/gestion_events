<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Plateforme Événementielle</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
  <!-- Navbar -->
  <nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex">
          <div class="flex-shrink-0 flex items-center">
            <a href="#" class="text-xl font-bold">EventPro</a>
          </div>
          <div class="hidden md:ml-6 md:flex md:space-x-8">
            <a href="#" class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-500 text-sm font-medium">Accueil</a>
            <a href="#" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium hover:border-gray-300">Événements</a>
            <a href="#" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium hover:border-gray-300">Créer</a>
            <a href="#" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium hover:border-gray-300">Mon Profil</a>
          </div>
        </div>
        <div class="flex items-center">
          <div class="hidden md:flex md:items-center md:space-x-4">
            <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200">Connexion</a>
            <a href="#" class="px-3 py-2 rounded-md text-sm font-medium bg-indigo-600 text-white hover:bg-indigo-700">Inscription</a>
          </div>
          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <button type="button" class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- Mobile menu -->
    <div class="md:hidden">
      <div class="pt-2 pb-3 space-y-1">
        <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-indigo-500 text-base font-medium text-indigo-700 bg-indigo-50">Accueil</a>
        <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300">Événements</a>
        <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300">Créer</a>
        <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300">Mon Profil</a>
        <a href="#" class="block pl-3 pr-4 py-2 mt-2 text-base font-medium bg-indigo-600 text-white rounded-md text-center">Inscription</a>
        <a href="#" class="block pl-3 pr-4 py-2 mt-1 text-base font-medium text-gray-700 rounded-md text-center hover:bg-gray-100">Connexion</a>
      </div>
    </div>
  </nav>

  <!-- Main Content Example: Event List -->
  <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-semibold mb-4">Événements à venir</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Card Example -->
      <div class="bg-white shadow rounded-lg p-6">
        <img src="https://via.placeholder.com/400x200" alt="Event" class="w-full h-32 object-cover rounded-md mb-4">
        <h2 class="text-xl font-bold">Conférence Dev2025</h2>
        <p class="text-gray-600 text-sm mb-2">12 mai 2025, Yaoundé</p>
        <p class="text-gray-700 mb-4">Une conférence sur les dernières tendances du développement logiciel.</p>
        <a href="#" class="inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Détails</a>
      </div>
      <!-- Répliquer les cards... -->
    </div>
  </main>

</body>
</html>
