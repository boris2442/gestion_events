<?php
session_start();
require_once 'database/database.php';
var_dump($_SERVER['REQUEST_METHOD']);
var_dump($_POST);
 
if (isset($_POST["ok2"])) {
   
    // Récupérer les données du formulaire
   $var = 'bonjour';
   echo $var; // Récupérer les données du formulaire
   die;
    echo 'hjhjhj';
  
}else {
    echo "Aucune donnée reçue.";
}

