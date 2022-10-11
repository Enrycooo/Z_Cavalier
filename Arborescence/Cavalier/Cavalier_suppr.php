<?php
include_once('../include/defines.inc.php');

if ($_POST['id'] != ""){
    $id = $_POST['id'];
    
    $request = "UPDATE personne SET actif = 0 WHERE id_personne = :id;";
    $sql = $conn->prepare($request);
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    if($sql){
    ?>
        <script>
            alert("Cela a fonctionné")
            window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
        </script>
    <?php
    }else {
    ?>
        <script>
            alert("Un problème a été rencontré")
            window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
        </script>
    <?php
    }
}