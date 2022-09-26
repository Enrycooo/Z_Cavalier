<?php

if ($_POST['delete'] != ""){
    $id = $_POST['id'];
    
    $requete = "DELETE FROM personne
                WHERE id = '$id'";
    $result = $conn->query($requete);
    if($result){
    ?>
        <script>
            alert("Cela a fonctionné")
            window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
        </script>
    <?php
    }
}