<?php
include_once('../include/defines.inc.php');
if(isset($_POST["create"])){
    if(isset($_POST["gal_cav"])){
        $sql = $conn->prepare("SELECT id_personne FROM personne WHERE nom = :nom");
        $sql->bindValue(':nom', $_POST["nom"],PDO::PARAM_STR);
        $sql->execute();
        $req = $oCavalier->db_create($_POST["nom"], $_POST["prenom"], $_POST["DNA"],'', '', '', $_POST["mail"], $_POST["telephone"], $_POST['gal_cav'], $_POST['num_lic']);
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
    }else{
    $sql = $conn->prepare("SELECT id_personne FROM personne WHERE nom = :nom");
    $sql->bindValue(':nom', $_POST["nom"],PDO::PARAM_STR);
    $sql->execute();
    $req = $oCavalier->db_create($_POST["nom"], $_POST["prenom"], $_POST["DNA"],$_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST["mail"], $_POST["telephone"], '', '');
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