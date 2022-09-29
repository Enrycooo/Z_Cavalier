<?php
include_once('../include/defines.inc.php');
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];


$sql = "SELECT * FROM personne WHERE nom = ':nom' AND prenom = ':prenom'";
$req = $conn->prepare($sql);
$req->bindValue(':nom',$nom,PDO::PARAM_STR);
$req->bindValue(':prenom',$prenom,PDO::PARAM_STR);
var_dump($req);
$res = $req->execute();
foreach ($data=$res->fetchAll() as $value){
    echo $value['nom'];
    echo $value['prenom'];
}