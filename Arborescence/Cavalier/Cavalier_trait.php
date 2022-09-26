<?php
include_once('../include/defines.inc.php');
//Cette page est dédiée aux traitements

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
            window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
        </script>
    <?php
    }
}
?>