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
    <title>Type_pension</title>
    <script>
        $('#trigger').click(function () {
	$('#modal').modal({show : true});
});
    </script>
</head>
<body>
    <script> 
        const url = "Type_pension_trait.php";
    </script>
<?php
        //Nav = read c'est la "page principale" qui vas permettre de lire la BDD à travers le datatable
        if(!isset($_GET["nav"]) || $_GET["nav"] === "read"){
        $data = $oType_pension->db_get_all();
  ?>
    <div class="container">
        <div class="d-flex justify-content-center">
            <a class="btn btn-success mb-4" href="Type_pension_affiche.php?nav=create">Créer un nouveau type de pension</a>
            <form action="Type_pension_search.php" method='post'>
            <input placeholder="lib_type_p" type="text" name="lib_type_p">Rechercher</button>
            </form>
        </div>
    </div>
 
            <div class="row">
                <div class="col">
                    <table class='table table-hover'>
            <thead>
                <th style='text-align :center'>id_type_p</th>
                <th style='text-align :center'>lib_type_p</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($data as $key) {
                        $id_type_p = $key["id_type_p"]; ?>
                        <tr data-value="<?php echo $id_type_p ?>">
                        <td><center><?php echo $id_type_p ?></center></td>
                        <td><center><?php echo $key["lib_type_p"] ?></center></td>
                        <td style='display:flex; justify-content: space-evenly;'>
                            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modal<?php echo $id_type_p ?>'>
                                Modifier
                            </button>
                            <form action="Type_pension_trait.php" method="post">
                                <input type="hidden" name="id_type_p" value="<?php echo $id_type_p ?>">
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
        $id_type_p = $key["id_type_p"]; ?>

            <!-- Modal -->
            <div class="modal fade" id="modal<?php echo $id_type_p ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modifier le type de pension</h5>
                        </div>
                        <form action="Type_pension_trait.php" method="post">
                            <div class="modal-body form-group">
                                <label>lib_type_p :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="lib_type_p" value="<?php echo $key["lib_type_p"]; ?>">
                                <label>lib_type_p ;</label>
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
            <h1>Créer un type de pension</h1>

            <form action="Type_pension_trait.php" method="post">
                <div class="container">
                    <div class="form-group">
                <input placeholder="lib_type_p" type="text" name="lib_type_p">
                <button name="create" type="submit">Type_pension</button>
                    </div>
                </div>
            </form>

        <?php
            }
        ?>
            </body>
            </html>