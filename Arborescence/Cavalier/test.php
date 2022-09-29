<?php
include_once('../include/defines.inc.php');


/*
$sql = "SELECT * FROM personne";
$req = $conn->prepare($sql);
var_dump($req);
$res = $req->execute();
var_dump($res);
$data = $req->fetchAll();
var_dump($data);
foreach ($data as $value){
    echo $value['nom'];
}
 *
 */

$sql = "SELECT * FROM personne WHERE nom = :nom AND prenom = :prenom";
$req = $conn->prepare($sql);
$req->bindValue(':nom',$_POST['nom'],PDO::PARAM_STR);
$req->bindValue(':prenom',$_POST['prenom'],PDO::PARAM_STR);
var_dump($req);
$res = $req->execute();
var_dump($res);
foreach ($data=$req->fetchAll() as $value){
    echo $value['nom'];
    echo $value['prenom'];
    echo $value['DNA'];
}