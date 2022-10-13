<?php
include('../include/defines.inc.php');

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

$searchArray = array();

## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " AND (nom LIKE :nom or prenom LIKE :prenom OR DNA LIKE :dna OR mail LIKE :mail OR telephone LIKE :telephone OR galop LIKE :galop OR numerolicence LIKE :numerolicence ) ";
   $searchArray = array( 
        'nom'=>"%$searchValue%", 
        'prenom'=>"%$searchValue%",
        'DNA'=>"%$searchValue%",
        'mail'=>"%$searchValue%",
        'telephone'=>"%$searchValue%",
        'galop'=>"%$searchValue%",
        'numerolicence'=>"%$searchValue%"
   );
}

## Total number of records without filtering
$stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM ".DB_TABLE_PERSONNE);
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

## Total number of records with filtering
$stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM ".DB_TABLE_PERSONNE." WHERE 1 ".$searchQuery);
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$stmt = $conn->prepare("SELECT * FROM ".DB_TABLE_PERSONNE." P
        INNER JOIN ".DB_TABLE_CAVALIER." C ON P.id_personne = C.ref_pers
        WHERE actif = 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");

// Bind values
foreach($searchArray as $key=>$search){
   $stmt->bindValue(':'.$key, $search,PDO::PARAM_STR);
}

$stmt->bindValue(':limit', (int)$row, PDO::PARAM_INT);
$stmt->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
$stmt->execute();
$empRecords = $stmt->fetchAll();

$data = array();

foreach($empRecords as $row){
    $id = $row["id_personne"];
    $actionrow = "<div style='display: flex; justify-content: space-evenly'><a href='Cavalier_Affiche.php?nav=update&id=$id'><i class='fas fa-edit'></i></a><a href='Cavalier_Affiche.php?nav=delete&id=$id'><i class='fas fa-trash-alt'></i></a></div>";
    $data[] = array(
      "id_personne"=>$row['id_personne'],
      "nom"=>$row['nom'],
      "prenom"=>$row['prenom'],
      "dna"=>$row['dna'],
      "mail"=>$row['mail'],
      "telephone"=>$row['telephone'],
      "galop"=>$row['gal_cav'], 
      "numerolicence"=>$row['num_lic'],
      "actions"=>$actionrow
   );
}

## Response
$response = array(
   "draw" => intval($draw),
   "iTotalRecords" => $totalRecords,
   "iTotalDisplayRecords" => $totalRecordwithFilter,
   "aaData" => $data
);

echo json_encode($response);