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
    <title>Robe</title>
    <script>
        $('#trigger').click(function () {
	$('#modal').modal({show : true});
});
    </script>
</head>
<body>
    <script> 
        const url = "Robe_trait.php";
    </script>
<?php
        //Nav = read c'est la "page principale" qui vas permettre de lire la BDD à travers le datatable
        if(!isset($_GET["nav"]) || $_GET["nav"] === "read"){
        $data = $oRobe->db_get_all();
  ?>
    <div class="container">
        <div class="d-flex justify-content-center">
            <a class="btn btn-success mb-4" href="Cavalier_Affiche.php?nav=create">Créer une nouvelle robe</a>
            <form action="Robe_search.php" method='post'>
            <input placeholder="Nom" type="text" name="nom">Rechercher</button>
            </form>
        </div>
    </div>
 
            <div class="row">
                <div class="col">
                    <table class='table table-hover'>
            <thead>
                <th style='text-align :center'>id_robe</th>
                <th style='text-align :center'>lib_robe</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($data as $key) {
                        $id_robe = $key["id_robe"]; ?>
                        <tr data-value="<?php echo $id_robe ?>">
                        <td><center><?php echo $id_robe ?></center></td>
                        <td><center><?php echo $key["nom robe"] ?></center></td>
                        <td style='display:flex; justify-content: space-evenly;'>
                            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modal<?php echo $id_robe ?>'>
                                Modifier
                            </button>
                            <form action="Robe_trait.php" method="post">
                                <input type="hidden" name="id_robe" value="<?php echo $id_robe ?>">
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
        $id_robe = $key["id_robe"]; ?>

            <!-- Modal -->
            <div class="modal fade" id="modal<?php echo $id_robe ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modifier la Robe</h5>
                        </div>
                        <form action="Robe_trait.php" method="post">
                            <div class="modal-body form-group">
                                <label>Nom :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="nom" value="<?php echo $key["nom"]; ?>">
                                <label>Nom ;</label>
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
            <h1>Créer une Robe</h1>

            <form action="Cavalier_trait.php" method="post">
                <div class="container">
                    <div class="form-group">
                <input placeholder="nom de la robe" type="text" name="robe">
                <button name="create" type="submit">Robe</button>
                    </div>
                </div>
            </form>

        <?php
            }
        ?>
            </body>
            </html>