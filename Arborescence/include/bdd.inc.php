<?php
//Mettre les include des classe içi

//Mettre la connexion PDO
$user="root";
    $mdp="";
    $serveur="localhost"; // Ou information fournie par l'hébergeur
    $bd="centre_equestre";
    $dns="mysql:host=$serveur;dbname=$bd";
    try{
       $idcon=new PDO($dns, $user, $mdp);
       $idcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
       // autres commandes (voir plus loin)
    }
    catch (PDOException $e){
      echo"Erreur de connexion à la base de donnée : " .$e->getMessage();
    }
?>