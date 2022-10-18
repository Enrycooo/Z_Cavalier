<?php
include_once('../include/defines.inc.php');
//Cette page est dédiée aux traitements
/*
if(isset($_POST["create"])){
    $sql = $conn->prepare("SELECT id_personne FROM personne WHERE nom = :nom");
    $sql->bindValue(':nom', $_POST["nom"],PDO::PARAM_STR);
    $sql->execute();
    $req = $oCavalier->db_create($_POST["nom"], $_POST["prenom"], $_POST["dna"], $_POST["mail"], $_POST["telephone"], $_POST['galop'], $_POST['numerolicence']);
    if($req){
        ?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
            </script>
        <?php
    }
}elseif(isset($_POST["update"])){
    $req = $oCavalier->db_update_one($_POST["nom"], $_POST["prenom"], $_POST["dna"], $_POST["mail"], $_POST["telephone"], $_POST['galop'], $_POST['numerolicence']);
    if($req){
        ?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
            </script>
        <?php
    }
}elseif(isset($_POST["delete"])){
    $req = $oCavalier->db_soft_delete_one();
    if($req){
        ?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
            </script>
        <?php
    }
}
*/
if($_POST['nom'] != "" && $_POST['prenom'] != "" && $_POST['dna'] != "" && $_POST['mail'] != "" && $_POST['telephone'] != "" && $_POST['galop'] != "" && $_POST['numerolicence'] != ""){
    
    $nom = $_POST["nom"];
    $pre = $_POST["prenom"];
    $dna = $_POST["dna"];
    $mail = $_POST["mail"];
    $tel = $_POST["telephone"]; 
    $galop = $_POST["galop"];
    $nl = $_POST["numerolicence"];

    //Insertion des données dans la table utilisateur
    $sql = "INSERT INTO personne(nom, prenom, DNA, mail, actif, telephone, photo, galop, numerolicence)
                VALUES ('$nom', '$pre', '$dna', '$mail', 1, $tel, 1, $galop, $nl)";
    $req = $conn->prepare($sql);
    $res = $req->execute();
    if($res){
    ?>
        <script>
            alert("Cela a fonctionné")
            window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche_Test.php");
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
elseif(isset($_POST["update"])){
    $req = $conn->prepare($_POST["nom"], $_POST["prenom"], $_POST["DNA"], $_POST["mail"], $_POST["telehone"], $_POST["galop"], $_POST["numerolicence"]);
    if($req){
        ?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Ajouter.php");
            </script>
        <?php
    }
}
?>