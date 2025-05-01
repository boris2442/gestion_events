<?php
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['users'])) {
    header("Location: connexion.php");
    exit();
}
?>
<br><br><br><br>

<section class="max-w-xl mx-auto p-6 bg-white rounded-2xl shadow-md transform hover:scale-[1.02] transition-transform"> 
  <h2 class="text-2xl font-semibold text-gray-800 mb-4">Bienvenue sur votre profil</h2>
  <div class="space-y-3">
    <p class="text-gray-700"><span class="font-medium">Nom :</span> <?= htmlspecialchars($_SESSION['users']['nom']) ?></p>
    <p class="text-gray-700"><span class="font-medium">Prénom :</span> <?= htmlspecialchars($_SESSION['users']['prenom']) ?></p>
    <p class="text-gray-700"><span class="font-medium">Email :</span> <?= htmlspecialchars($_SESSION['users']['email']) ?></p>
  </div>
  <div class="mt-6 text-center">
    <a href="update_profil.php?id=<?= $_SESSION['users']['id'] ?>"
       class="inline-block px-5 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition">
      Modifier mon profil
    </a>
  </div>
</section>
