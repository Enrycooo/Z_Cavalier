<?php
include_once('../include/defines.inc.php');

$sql = "SELECT id_robe, lib_robe FROM robe
        WHERE lib_robe = :lib_robe";
$req = $conn->prepare($sql);
$req->bindValue(':lib_robe',$_POST['lib_robe'],PDO::PARAM_STR);
$res = $req->execute();
?>
<html>
    <head>
        <link rel="stylesheet" href="../static/css/bootstrap.min.css">
        <title>Robe</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class='table table-hover'>
                    <thead>
                        <tr>
                            <th style='text-align :center'>id_robe</th>
                            <th style='text-align :center'>lib_robe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    foreach ($data=$req->fetchAll() as $value) {
                        ?>
                        <tr data-value="<?php echo $value["lib_robe"] ?>">
                            <td><center><?php echo $value["id_robe"] ?></center></td>
                            <td><center><?php echo $value["lib_robe"] ?></center></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    </table>
                </div>
            </div>
            <center><a href='Robe_affiche.php' class='btn btn-primary'>Retour</a></center>
        </div>