<?php
include_once('../include/defines.inc.php');
if(isset($_POST["create"])){
    $sql = $conn->prepare("SELECT id_pension FROM pension WHERE lib_pension = :lib_pension");
    $sql->bindValue(':lib_pension', $_POST["lib_pension"],PDO::PARAM_STR);
    $sql->execute();
    $req = $oPension->db_create($_POST["lib_pension"], $_POST["date_deb_pension"], $_POST["date_fin_pension"], $_POST["tarif_pension"], $_POST["ref_cheval"], $_POST["ref_type_p"], $_POST["ref_per"] );
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
    $req = $oPension->db_update_one($_POST["lib_pension"], $_POST["date_deb_pension"], $_POST["date_fin_pension"], $_POST["tarif_pension"], $_POST["ref_cheval"], $_POST["ref_type_p"], $_POST["ref_per"]);
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