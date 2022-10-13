<?php 
/*

// define database tables names
define('DB_TABLE_PERSONNE', 'personne');
define('DB_TABLE_COURS', 'cours');
define('DB_TABLE_CHEVAL', 'cheval');
define('DB_TABLE_CAVALIER', 'cavalier');

//define paths
define('DB_CLASS_DIR', 'class/');


// get main classes
include_once DB_CLASS_DIR.'Cavalier.class.inc.php';
//include_once DB_CLASS_DIR.'Cheval.class.inc.php';
//include_once DB_CLASS_DIR.'Cours.class.inc.php';

// get main objects
$oCavalier = new Cavalier();
//$oCheval = new Cheval();
//$oCours = new Cours();
*/
try {
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "centre_equestre";

    // connect to DB
    $conn = new PDO("mysql:host=$server;dbname=$dbname","$username","$password");
}
catch (PDOException $e) {
    //throw $th;
}
?>