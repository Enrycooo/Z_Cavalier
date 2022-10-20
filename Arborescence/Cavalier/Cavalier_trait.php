<?php
include_once('../include/defines.inc.php');
if(isset($_POST["create"])){
    $sql = $conn->prepare("SELECT id_personne FROM personne WHERE nom = :nom");
    $sql->bindValue(':nom', $_POST["nom"],PDO::PARAM_STR);
    $sql->execute();
    $req = $oCavalier->db_create($_POST["nom"], $_POST["prenom"], $_POST["DNA"],$_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST["mail"], $_POST["telephone"], $_POST['gal_cav'], $_POST['num_lic']);
    if($req){
        ?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
            </script>
        <?php
    }else{
        ?>
            <script>
                alert("La création n'a pas fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
            </script>
        <?php
    }
}elseif(isset($_POST["update"])){
    $req = $oCavalier->db_update_one($_POST["nom"], $_POST["prenom"], $_POST["dna"],$_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST["mail"], $_POST["telephone"], $_POST['gal_cav'], $_POST['num_lic']);
    if($req){
        ?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
            </script>
        <?php
    }else{
    ?>
        <script>
                alert("La modification n'a pas fonctionné")
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
    }else{
    ?>
        <script>
                alert("La suppression n'a pas fonctionné")
        </script>
        <?php
    }
}
/*
if($_POST['nom'] != "" && $_POST['prenom'] != "" && $_POST['DNA'] != "" && $_POST['mail'] != "" && $_POST['telephone'] != "" && $_POST['gal_cav'] != "" && $_POST['num_lic'] != "" && $_POST['rue'] != ""
         && $_POST['ville'] != "" && $_POST['cp'] != ""){
    
    $nom = $_POST["nom"];
    $pre = $_POST["prenom"];
    $dna = $_POST["DNA"];
    $mail = $_POST["mail"];
    $tel = $_POST["telephone"]; 
    $gal_cav = $_POST["gal_cav"];
    $num_lic = $_POST["num_lic"];
    $rue = $_POST['rue'];
    $ville = $_POST['ville'];
    $cp = $_POST['cp'];
    

    //Insertion des données dans la table utilisateur
    $sql = "INSERT INTO personne(nom, prenom, DNA, rue, code_postal, ville, mail, actif, telephone, photo, gal_cav, num_lic)
                VALUES ('$nom', '$pre', '$dna', '$rue', $cp, '$ville' '$mail', 1, $tel, 1, $gal_cav, $num_lic)";
    $req = $conn->prepare($sql);
    $res = $req->execute();
    if($res){
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
 */
?>