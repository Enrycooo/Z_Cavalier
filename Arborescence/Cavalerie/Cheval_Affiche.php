<?php
include_once('../include/defines.inc.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.2/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <title>Casiers</title>
</head>
<body>
    <script> 
        const url = "Cavalerie_trait.php";
    </script>
<?php

        $data = $oCavalerie->db_get_all();

  ?>
  <form action="Cavalerie_trait.php" method="post">
        <div class="form-group row col-4 p-4">
            <input class="form-control col-6 mr-3" type="text" name="nom_che" placeholder="Nom du cheval">
            <button class="btn btn-success col-5" name="create" type="submit">Créer un cheval</button>
        </div>
    </form>

    <div class="table-container p-3">
        <table id="table">
            <thead>
                <th>Selectionner</th>
                <th style='text-align :center'>ID</th>
                <th style='text-align :center'>Lib</th>
                <th style='text-align :center'>Actions</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($data as $key) {
                        $id = $key["id_cheval"]; ?>
                        <tr data-value="<?php echo $id ?>">
                        <td style='width: 5%'>
                        <input type='checkbox' class='checkbox' data-index="<?php echo $id ?>" checked='false'></td>
                        <td><center><?php echo $id ?></center></td>
                        <td><center><?php echo $key["nom_cheval"] ?></center></td>
                        <td style='display:flex; justify-content: space-evenly;'>
                            <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modal<?php echo $id ?>'>
                                Modifier
                            </button>
                            <form action="trait.php" method="post">
                                <input type="hidden" name="casier_id" value="<?php echo $id ?>">
                                <button type="submit" name="delete" class="delete-btn btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
        <input type="checkbox" class="select-all" id="select-all">
        <label for="select-all" class="form-check-label">Tout sélectionner</label>

    
    <div class="operations-div" style="display: flex; justify-content: space-evenly">
        <button class="btn btn-danger delete-all" style="display: none">
            Supprimer les éléments selectionnés.
        </button>
    </div>
  </div>
    

    <?php 
    
        foreach($data as $key){ ?>

            <!-- Modal -->
            <div class="modal fade" id="modal<?php echo $key["id_cheval"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modifier le casier</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="trait.php" method="post">
                            <div class="modal-body form-group">
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="casier_name" value="<?php echo $key["nom_cheval"]; ?>">
                                <input type="hidden" name="casier_id" value="<?php echo $key["id_cheval"]; ?>">
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="update" class="btn btn-primary">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
        <?php    
        }
