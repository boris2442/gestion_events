<?php
session_start();
require_once 'database/database.php';


// 3-Définit le titre de la page
$pageTitle = "supprimer un evenement";

//supprimer un article
if(isset($_GET)){
 
    $id=$_GET['id'];
   
    $sql="DELETE FROM  `evenements` WHERE id_evenement=:id";
    $query=$db->prepare($sql);
    $query->bindParam('id', $id);
    $query->execute();
    header('location:admin.php');
}