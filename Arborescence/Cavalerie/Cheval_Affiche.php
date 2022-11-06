<?php
include('../include/defines.inc.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Cheval</title>
</head>
<body>
    <script> 
        const url = "Cheval_trait.php";
    </script>
<?php

        $data = $oCheval->db_get_all();
  ?>
    <div class="container">
        <div class="d-flex justify-content-center">
            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalCreate'>Insertion d'un cheval</button>  
            <form action="Cheval_search.php" method='post'>
                <input placeholder="Nom" type="text" name="nom">
                <button name="search" type="submit id="submit">Rechercher</button>
            </form>
        </div>
    </div>
 
            <div class="row">
                <div class="col">
                    <table class='table table-hover'>
            <thead>
                <th style='text-align :center'>ID</th>
                <th style='text-align :center'>Nom</th>
                <th style='text-align :center'>Date de naissance</th>
                <th style='text-align :center'>Race </th>
                <th style='text-align :center'>Sexe</th>
                <th style='text-align :center'>Taille</th>
                <th style='text-align :center'>N°Sire</th>
                <th style='text-align :center'>Robe</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($data as $key) {
                        $id_cheval = $key["id_cheval"]; ?>
                        <tr data-value="<?php echo $id_cheval ?>">
                        <td><center><?php echo $id_cheval ?></center></td>
                        <td><center><?php echo $key["nom_cheval"] ?></center></td>
                        <td><center><?php echo $key["DNA_cheval"] ?></center></td>
                        <td><center><?php echo $key["race_cheval"] ?></center></td>
                        <td><center><?php echo $key["sexe_cheval"] ?></center></td>
                        <td><center><?php echo $key["taille_cheval"] ?></center></td>
                        <td><center><?php echo $key["SIRE_cheval"] ?></center></td>
                        <td><center><?php echo $key["ref_robe"] ?></center></td>
                        <td style='display:flex; justify-content: space-evenly;'>
                            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modal<?php echo $id_cheval ?>'>
                                Modifier
                            </button>
                            <form action="Cheval_trait.php" method="post">
                                <input type="hidden" name="id_cheval" value="<?php echo $id_cheval ?>">
                                <button type="submit" name="delete" class="delete-btn btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>

    
    <div class="operations-div" style="display: flex; justify-content: space-evenly">
        <button class="btn btn-danger delete-all" style="display: none">
            Supprimer les éléments selectionnés.
        </button>
    </div>
  </div>
    </div>
    

    <?php 
    
        foreach($data as $key){
        $id_cheval = $key["id_cheval"]; ?>

            <!-- Modal -->
            <div class="modal fade" id="modal<?php echo $id_cheval ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modifier le Cheval</h5>
                        </div>
                        <form action="Cheval_trait.php" method="post">
                            <div class="modal-body form-group">
                                <h6 class="modal-title">Nom</h6>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="nom" value="<?php echo $key["nom_cheval"]; ?>">
                                <h6 class="modal-title">Date de naissance</h6>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="dna" value="<?php echo $key["DNA_cheval"]; ?>">
                                <h6 class="modal-title">Race</h6>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="race" value="<?php echo $key["race_cheval"]; ?>">
                                <h6 class="modal-title">Sexe (0 = femelle / 1 = mâle)</h6>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="sexe" value="<?php echo $key["sexe_cheval"]; ?>">
                                <h6 class="modal-title">Taille</h6>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="taille" value="<?php echo $key["taille_cheval"]; ?>">
                                <h6 class="modal-title">N°Sire</h6>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="sire" value="<?php echo $key["SIRE_cheval"]; ?>">
                                <h6 class="modal-title">Réference de la Robe</h6>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="robe" value="<?php echo $key["ref_robe"]; ?>">
                                <input type="hidden" name="id_cheval" value="<?php echo $id_cheval ?>">
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
            ?>
            <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Insertion d'un Cheval</h5>
                        </div>
                        <form action="Cheval_trait.php" method="post">
                            <div class="modal-body form-group">
                                <label>Nom :</label>
                                <input placeholder="Nom" class="form-control" type="text" name="nom">
                                <label>Date de naissance :</label>
                                <input placeholder="Date de naissance" class="form-control" type="text" name="dna">
                                <label>Race du cheval :</label>
                                <input placeholder="Race" class="form-control" type="text" name="race">
                                <label>Sexe du cheval :</label>
                                <input placeholder="Sexe" class="form-control" type="text" name="sexe">
                                <label>Taille du cheval :</label>
                                <input placeholder="Taille" class="form-control" type="text" name="taille">
                                <label>N°Sire du cheval :</label>
                                <input placeholder="N°Sire" class="form-control" type="text" name="sire">
                                <label>Référence de la robe du cheval :</label>
                                <input placeholder="Référence de la robe" class="form-control" type="text" name="robe">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" name="create" class="btn btn-primary">Créer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php