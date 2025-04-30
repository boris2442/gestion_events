<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>404 – Page non trouvée</title>
    <link href="src/output.css" rel="stylesheet" />

</head>
<body class="bg-gray-50 flex flex-col items-center justify-center min-h-screen">

  <div class="text-center p-8 bg-white rounded-2xl shadow-lg max-w-md mx-4">
    <h1 class="text-6xl font-extrabold text-indigo-600 mb-4">404</h1>
    <p class="text-xl text-gray-700 mb-6">Oups ! La page que vous cherchez n’existe pas.</p>
    <img 
      src="layouts/assets/page-not-found.jpg" 
      alt="Page non trouvée illustration" 
      class="mx-auto mb-6 w-full h-auto object-cover rounded-lg shadow-md"
    />
    <a 
      href="index" 
      class="inline-block px-6 py-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition"
    >
      Retour à l’accueil
    </a>
  </div>
<?php
require_once 'layouts/footer_html.php';
?>
</body>
</html>
