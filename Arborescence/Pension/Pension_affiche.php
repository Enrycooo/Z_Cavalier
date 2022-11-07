<?php
include('../include/defines.inc.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <title>Pension</title>
    <script>
        $('#trigger').click(function () {
	$('#modal').modal({show : true});
});
    </script>
</head>
<body>
    <script> 
        const url = "Pension_trait.php";
    </script>
<?php
        //Nav = read c'est la "page principale" qui vas permettre de lire la BDD à travers le datatable
        if(!isset($_GET["nav"]) || $_GET["nav"] === "read"){
        $data = $oPension->db_get_all();
  ?>
    <div class="container">
        <div class="d-flex justify-content-center">
            <a class="btn btn-success mb-4" href="Pension_affiche.php?nav=create">Créer une nouvelle pension</a>
            <form action="Pension_search.php" method='post'>
            <input placeholder="ref_cheval" type="text" name="ref_cheval">Rechercher</button>
            </form>
        </div>
    </div>
 
            <div class="row">
                <div class="col">
                    <table class='table table-hover'>
            <thead>
                <th style='text-align :center'>id_pension</th>
                <th style='text-align :center'>lib_pension</th>
                <th style='text-align :center'>date_deb_pension</th>
                <th style='text-align :center'>duree_pension</th>
                <th style='text-align :center'>tarif_pension</th>
                <th style='text-align :center'>ref_cheval</th>
                <th style='text-align :center'>ref_type_p</th>
                <th style='text-align :center'>ref_per</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($data as $key) {
                        $id_pension = $key["id_pension"]; ?>
                        <tr data-value="<?php echo $id_pension ?>">
                        <td><center><?php echo $id_pension ?></center></td>
                        <td><center><?php echo $key["lib_pension"] ?></center></td>
                        <td><center><?php echo $key["date_deb_pension"] ?></center></td>
                        <td><center><?php echo $key["duree_pension"] ?></center></td>
                        <td><center><?php echo $key["tarif_pension"] ?></center></td>
                        <td><center><?php echo $key["ref_cheval"] ?></center></td>
                        <td><center><?php echo $key["ref_type_p"] ?></center></td>
                        <td><center><?php echo $key["ref_per"] ?></center></td>
                        <td style='display:flex; justify-content: space-evenly;'>
                            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modal<?php echo $id_pension ?>'>
                                Modifier
                            </button>
                            <form action="Pension_trait.php" method="post">
                                <input type="hidden" name="id_pension" value="<?php echo $id_pension ?>">
                                <button type="submit" name="delete" class="delete-btn btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
        <?php
        }

            elseif($_GET['nav'] === 'read'){
            ?>

        <?php
        
        foreach($data as $key){
        $id_pension = $key["id_pension"]; ?>

            <!-- Modal -->
            <div class="modal fade" id="modal<?php echo $id_pension ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modifier la pension</h5>
                        </div>
                        <form action="Pension_trait.php" method="post">
                            <div class="modal-body form-group">
                                <label>lib_pension :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="lib_pension" value="<?php echo $key["lib_pension"]; ?>">
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="lib_pension" value="<?php echo $key["date_deb_pension"]; ?>">
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="lib_pension" value="<?php echo $key["duree_pension"]; ?>">
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="lib_pension" value="<?php echo $key["tarif_pension"]; ?>">
                                <label>lib_pension ;</label>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" name="update" class="btn btn-primary">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            }
            }
            elseif($_GET['nav'] === 'create'){
        ?>
            <h1>Créer une pension</h1>

            <form action="Pension_trait.php" method="post">
                <div class="container">
                    <div class="form-group">
                <input placeholder="lib_pension" type="text" name="lib_pension">
                <input placeholder="date_deb_pension" type="text" name="date_deb_pension">
                <input placeholder="duree_pension" type="text" name="duree_pension">
                <input placeholder="tarif_pension" type="text" name="tarif_pension">
                <input placeholder="ref_cheval" type="text" name="ref_cheval">
                <input placeholder="ref_type_p" type="text" name="ref_type_p">
                <input placeholder="ref_per" type="text" name="ref_per">
                <button name="create" type="submit">Pension</button>
                    </div>
                </div>
            </form>

        <?php
            }
        ?>
            </body>
            </html>