<?php
include_once('../include/defines.inc.php');

$sql = "SELECT * FROM personne
        WHERE nom = :nom OR prenom = :prenom";
$req = $conn->prepare($sql);
$req->bindValue(':nom',$_POST['nom'],PDO::PARAM_STR);
$req->bindValue(':prenom',$_POST['prenom'],PDO::PARAM_STR);
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
                            <th style='text-align :center'>id</th>
                            <th style='text-align :center'>Nom</th>
                            <th style='text-align :center'>Prénom</th>
                            <th style='text-align :center'>Date de naissance</th>
                            <th style='text-align :center'>adresse mail</th>
                            <th style='text-align :center'>téléphone</th>
                            <th style='text-align :center'>galop</th>
                            <th style='text-align :center'>Numéro de licence</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    foreach ($data=$req->fetchAll() as $value) {
                        ?>
                        <tr data-value="<?php echo $value["nom"] ?>">
                            <td><center><?php echo $value["id_personne"] ?></center></td>
                            <td><center><?php echo $value["nom"] ?></center></td>
                            <td><center><?php echo $value["prenom"] ?></center></td>
                            <td><center><?php echo $value["DNA"] ?></center></td>
                            <td><center><?php echo $value["mail"] ?></center></td>
                            <td><center><?php echo $value["telephone"] ?></center></td>
                            <td><center><?php echo $value["galop"] ?></center></td>
                            <td><center><?php echo $value["numerolicence"] ?></center></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>