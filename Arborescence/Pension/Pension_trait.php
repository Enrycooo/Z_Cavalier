<?php
include_once('../include/defines.inc.php');
if(isset($_POST["create"])){
    $sql = $conn->prepare("SELECT id_type_p FROM type_pension WHERE lib_type_p = :lib_type_p");
    $sql->bindValue(':lib_type_p', $_POST["lib_type_p"],PDO::PARAM_STR);
    $sql->execute();
    $req = $oCavalier->db_create($_POST["lib_type_p"]);
    if($req){
        ?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Pension/Pension_affiche.php");
            </script>
        <?php
    }else{
        ?>
            <script>
                alert("La création n'a pas fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Pension/Pension_affiche.php");
            </script>
        <?php
    }
}elseif(isset($_POST["update"])){
    $req = $oPension->db_update_one($_POST["lib_type_p"]);
    if($req){
        ?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Pension/Pension_affiche.php");
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
    $req = $oPension->db_soft_delete_one();
    if($req){
        ?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Pension/Pension_affiche.php");
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