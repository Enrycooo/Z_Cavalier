<?php
include_once('../include/defines.inc.php');

$sql = "SELECT * FROM Cours
        WHERE date_cours = :date_cours";
$req = $conn->prepare($sql);
$req->bindValue(':date_cours',$_POST['date_cours'],PDO::PARAM_STR);
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
                        <th style='text-align :center'>Libellé</th>
                        <th style='text-align :center'>Date</th>
                        <th style='text-align :center'>Duree </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    foreach ($data=$req->fetchAll() as $value) {
                        ?>
                        <tr data-value="<?php echo $value["lib_cours"] ?>">
                            <td><center><?php echo $value['id_cours'] ?></center></td>
                            <td><center><?php echo $value["lib_cours"] ?></center></td>
                            <td><center><?php echo $value["date_cours"] ?></center></td>
                            <td><center><?php echo $value["duree_cours"] ?></center></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    </table>
                </div>
            </div>
            <center><a href='Cours_Affiche.php' class='btn btn-primary'>Retour</a></center>
        </div>