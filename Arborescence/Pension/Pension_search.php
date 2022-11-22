<?php
include_once('../include/defines.inc.php');

$sql = "SELECT * FROM pension
        WHERE ref_cheval = :ref_cheval
        OR lib_pension = :lib_pension";
$req = $conn->prepare($sql);
$req->bindValue(':ref_cheval',$_POST['ref_cheval'],PDO::PARAM_STR);
$req->bindValue(':lib_pension',$_POST['lib_pension'],PDO::PARAM_STR);
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
                            <th style='text-align :center'>id pension</th>
                            <th style='text-align :center'>ref cheval</th>
                            <th style='text-align :center'>type pension</th>
                            <th style='text-align :center'>date debut pension</th>
                            <th style='text-align :center'>duree pension</th>
                            <th style='text-align :center'>tarif pension</th>
                            <th style='text-align :center'>ref type pension</th>
                            <th style='text-align :center'>ref personne</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    foreach ($data=$req->fetchAll() as $value) {
                        ?>
                        <tr data-value="<?php echo $value["lib_pension"] ?>">
                            <td><center><?php echo $value["id_pension"] ?></center></td>
                            <td><center><?php echo $value["ref_cheval"] ?></center></td>
                            <td><center><?php echo $value["lib_pension"] ?></center></td>
                            <td><center><?php echo $value["date_deb_pension"] ?></center></td>
                            <td><center><?php echo $value["duree_pension"] ?></center></td>
                            <td><center><?php echo $value["tarif_pension"] ?></center></td>
                            <td><center><?php echo $value["ref_type_p"] ?></center></td>
                            <td><center><?php echo $value["ref_per"] ?></center></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    </table>
                </div>
            </div>
            <center><a href='Pension_affiche.php' class='btn btn-primary'>Retour</a></center>
        </div>