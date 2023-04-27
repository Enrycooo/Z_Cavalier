<?php
// Connexion à votre base de données
$conn = new PDO('mysql:host=localhost; dbname=centre_equestre', 'root');

// Récupération du terme de recherche envoyé par l'auto-complétion
$ville = $_GET['ville'];

// Requête pour obtenir les villes correspondant à la recherche
$stmt = $conn->prepare('SELECT ville_nom_simple, ville_code_postal FROM villes_france WHERE ville_nom_simple LIKE :ville');
$stmt->bindValue(':ville', '%' . $ville . '%');
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Formatage des données en JSON
$data = array();
foreach ($results as $result) {
    $data[] = array(
        "nom" => $result['ville_nom_simple'],
        "code_postal" => $result['ville_code_postal']
    );
}
echo json_encode($data);
