<?php
include_once('../include/defines.inc.php');
if(isset($_POST["create"])){
    $sql = $conn->prepare("SELECT id_cours FROM cours WHERE lib_cours = :lib_cours");
    $sql->bindValue(':lib_cours', $_POST["lib_cours"],PDO::PARAM_STR);
    $sql->execute();
    $req = $oCours->db_create($_POST["lib_cours"], $_POST["date_cours"], $_POST["duree_cours"]);
    if($req){
        ?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cours/Cours_Affiche.php");
            </script>
        <?php
    }else{
        ?>
            <script>
                alert("La création n'a pas fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cours/Cours_Affiche.php?nav=create");
            </script>
        <?php
    }
}elseif(isset($_POST["update"])){
    $req = $oCours->db_update_one($_POST["lib_cours"], $_POST["date_cours"], $_POST["duree_cours"]);
    if($req){
        ?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cours/Cours_Affiche.php");
            </script>
        <?php
    }else{
    ?>
        <script>
                alert("La modification n'a pas fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cours/Cours_Affiche.php");
        </script>
        <?php
    }
}elseif(isset($_POST["delete"])){
    $req = $oCours->db_soft_delete_one();
    if($req){
        ?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cours/Cours_Affiche.php");
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