<?php
session_start();
require_once 'database/database.php';


// 3-Définit le titre de la page
$pageTitle = "supprimer un article";

//supprimer un article
if(isset($_GET)){
 
    $id=$_GET['id'];
    echo "<pre>";
    var_dump($id);
    echo "</pre>";
    $sql="DELETE FROM  `utilisateurs` WHERE id=:id";
    $query=$db->prepare($sql);
    $query->bindParam('id', $id);
    $query->execute();
    header('location:admin.php');
}