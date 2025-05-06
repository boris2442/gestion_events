<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png"   href="layouts/assets/logo_event.png" />
    <meta name="description" content="Créez et animez votre communauté d’événements : billetterie, chat en direct, notifications personnalisées et retours participants." />

    <title>Plateforme Événementielle <?= htmlspecialchars($pageTitle) ?></title>
    <link href="./src/output.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow-lg fixed top-0 w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo + liens -->
                <div class="flex items-center space-x-8">
                    <img src="layouts/assets/logo_event.png" alt="logo" height="40px" width="40px" class="rounded-full">
                    <a href="index.php" class="text-xl font-bold">EventPro</a>
                    <div class="hidden md:flex space-x-6">
                        <?php if (isset($_SESSION['users']['id'])) { ?>
                            <a href="index" class="text-sm font-medium hover:text-indigo-600">Accueil</a>
                            <a href="event" class="text-sm font-medium hover:text-indigo-600">Événements</a>
                            <a href="create" class="text-sm font-medium hover:text-indigo-600">Créer</a>
                            <a href="profil" class="text-sm font-medium hover:text-indigo-600">Mon Profil</a>
                            <a href="contact" class="text-sm font-medium hover:text-indigo-600">Contact</a>
                        <?php } ?>
                    </div>
                </div>
                <!-- Connexion + Inscription -->
                <div class="hidden md:flex items-center space-x-4">
                    <?php if (isset($_SESSION['users']['id'])) { ?>
                        <a href="deconnexion" class="px-4 py-2 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700">Déconnexion</a>
                    <?php } else { ?>
                        <a href="connexion" class="text-sm text-gray-700 hover:underline">Connexion</a>
                        <a href="inscription" class="px-4 py-2 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700">Inscription</a>
                    <?php } ?>
                </div>
                <!-- Burger button -->
                <div class="md:hidden flex items-center">
                    <button id="burger-btn" class="relative w-8 h-8 flex flex-col justify-between items-center p-1 focus:outline-none">
                        <span id="bar1" class="w-6 h-0.5 bg-gray-800 transition transform origin-center"></span>
                        <span id="bar2" class="w-6 h-0.5 bg-gray-800 transition transform origin-center"></span>
                        <span id="bar3" class="w-6 h-0.5 bg-gray-800 transition transform origin-center"></span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Menu Mobile (slide + blur effect) -->
    <div id="mobile-menu" class="fixed inset-0 bg-white bg-opacity-90 backdrop-blur-md z-40 transform transition-transform duration-300 translate-x-full md:hidden">
        <div class="pt-24 px-6 space-y-4 text-center">
            <a href="index" class="block text-lg font-medium text-indigo-700 hover:underline">Accueil</a>
            <a href="event.php" class="block text-lg font-medium text-gray-700 hover:underline">Événements</a>
            <a href="create" class="block text-lg font-medium text-gray-700 hover:underline">Créer</a>
            <a href="profil" class="block text-lg font-medium text-gray-700 hover:underline">Mon Profil</a>
            <a href="contact" class="block text-lg font-medium text-gray-700 hover:underline">Contact</a>
            <a href="inscription" class="block text-white bg-indigo-600 py-2 rounded hover:bg-indigo-700">Inscription</a>
            <a href="connexion.php" class="block text-gray-700 hover:bg-gray-100 rounded py-2">Connexion</a>
        </div>
    </div>

    <?=
    $pageContent
    ?>

    <?php require_once 'footer_html.php'; ?>

    <script>
        const burgerBtn = document.getElementById('burger-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const bar1 = document.getElementById('bar1');
        const bar2 = document.getElementById('bar2');
        const bar3 = document.getElementById('bar3');

        let menuOpen = false;

        burgerBtn.addEventListener('click', () => {
            menuOpen = !menuOpen;

            bar1.classList.toggle('rotate-45');
            bar1.classList.toggle('translate-y-1.5');

            bar2.classList.toggle('opacity-0');

            bar3.classList.toggle('-rotate-45');
            bar3.classList.toggle('-translate-y-1.5');

            if (menuOpen) {
                mobileMenu.classList.remove('translate-x-full');
                mobileMenu.classList.add('translate-x-0');
            } else {
                mobileMenu.classList.remove('translate-x-0');
                mobileMenu.classList.add('translate-x-full');
            }
        });
    </script>

</body>

</html>