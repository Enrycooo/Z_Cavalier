<?php
include_once('../include/defines.inc.php');

$sql = "SELECT * FROM cheval
        WHERE nom = :nom ";
$req = $conn->prepare($sql);
$req->bindValue(':nom',$_POST['nom'],PDO::PARAM_STR);
$res = $req->execute();
?>
<html>
    <head>
        <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class='table table-hover'>
                    <thead>
                        <tr>
                        <th style='text-align :center'>ID</th>
                        <th style='text-align :center'>Nom</th>
                        <th style='text-align :center'>Date de naissance</th>
                        <th style='text-align :center'>Race </th>
                        <th style='text-align :center'>Sexe</th>
                        <th style='text-align :center'>Taille</th>
                        <th style='text-align :center'>N°Sire</th>
                        <th style='text-align :center'>Robe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    foreach ($data=$req->fetchAll() as $value) {
                        ?>
                        <tr data-value="<?php echo $value["nom"] ?>">
                        <td><center><?php echo $id_cheval ?></center></td>
                        <td><center><?php echo $key["nom"] ?></center></td>
                        <td><center><?php echo $key["dna"] ?></center></td>
                        <td><center><?php echo $key["race"] ?></center></td>
                        <td><center><?php echo $key["sexe"] ?></center></td>
                        <td><center><?php echo $key["taille"] ?></center></td>
                        <td><center><?php echo $key["sire"] ?></center></td>
                        <td><center><?php echo $key["robe"] ?></center></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>