<?php
include_once('../include/defines.inc.php');

$sql = "SELECT id_type_p, lib_type_p FROM type_pension
        WHERE lib_type_p = :lib_type_p";
$req = $conn->prepare($sql);
$req->bindValue(':lib_type_p',$_POST['lib_type_p'],PDO::PARAM_STR);
$res = $req->execute();
?>
<html>
    <head>
        <link rel="stylesheet" href="../static/css/bootstrap.min.css">
        <title>Pension</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class='table table-hover'>
                    <thead>
                        <tr>
                            <th style='text-align :center'>id_type_p</th>
                            <th style='text-align :center'>lib_type_p</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    foreach ($data=$req->fetchAll() as $value) {
                        ?>
                        <tr data-value="<?php echo $value["lib_type_p"] ?>">
                            <td><center><?php echo $value["id_type_p"] ?></center></td>
                            <td><center><?php echo $value["lib_type_p"] ?></center></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    </table>
                </div>
            </div>
            <center><a href='Pension_Affiche.php' class='btn btn-primary'>Retour</a></center>
        </div>