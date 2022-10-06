<?php
include_once('../include/defines.inc.php');
//Cette page est dédiée aux traitements
/*
if(isset($_POST["create"])){
    $sql = $conn->prepare("SELECT id FROM personne WHERE nom = :nom");
    $sql->bindValue(':nom', $_POST["departement"]);
    $sql->execute();
    $departement_id = $sql->fetch(PDO::FETCH_ASSOC);
    $departement_id = $departement_id["d_id"];
    $req = $oCommunes->db_create($_POST["insee_code"], $_POST["zip_code"], $_POST["city_name"], $departement_id, $_POST["lat"], $_POST["lng"]);
    if($req){
        ?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/uvlight/atelier1/commune/index.php?nav=read");
            </script>
        <?php
    }
}elseif(isset($_POST["update"])){
    $req = $oCommunes->db_update_one($_POST["city_id"], $_POST["city_name"], $_POST["insee_code"], $_POST["zip_code"], $_POST["lat"], $_POST["lng"]);
    if($req){
        ?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/uvlight/atelier1/commune/index.php?nav=read");
            </script>
        <?php
    }
}elseif(isset($_POST["delete"])){
    $req = $oCommunes->db_soft_delete_one();
    if($req){
        ?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/uvlight/atelier1/commune/index.php?nav=read");
            </script>
        <?php
    }
}
*/
if($_POST['nom'] != "" && $_POST['prenom'] != "" && $_POST['dna'] != "" && $_POST['mail'] != "" && $_POST['telephone'] != "" && $_POST['galop'] != "" && $_POST['numerolicence'] != ""){
    
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $dna=$_POST['dna'];
    $mail=$_POST['mail'];
    $tel=$_POST['telephone'];
    $galop=$_POST['galop'];
    $nl=$_POST['numerolicence'];

    //Insertion des données dans la table utilisateur
    $requete = "INSERT INTO personne 
                VALUES ('Null', '$nom', '$prenom', '$dna', '$mail',1, '$tel',1, '$galop', '$nl')";
    $result=$conn->query($requete);
    $result -> execute();
    if($result){
    ?>
        <script>
            alert("Cela a fonctionné")
            window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
        </script>
    <?php
    }else {
    ?>
        <script>
            alert("Veuillez remplir tout les champs ")
            window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Ajouter.php");
        </script>
    <?php
    }
}

?>