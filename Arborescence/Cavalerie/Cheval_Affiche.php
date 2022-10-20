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
            <<form action="Cheval_search.php" method='post'></form>
            <input placeholder="Nom" type="text" name="nom">
            <button name="search" type="submit id="submit">Rechercher</button>
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
                        <tr data-value="<?php echo $id_personne ?>">
                        <td><center><?php echo $id_personne ?></center></td>
                        <td><center><?php echo $key["nom"] ?></center></td>
                        <td><center><?php echo $key["dna"] ?></center></td>
                        <td><center><?php echo $key["race"] ?></center></td>
                        <td><center><?php echo $key["sexe"] ?></center></td>
                        <td><center><?php echo $key["taille"] ?></center></td>
                        <td><center><?php echo $key["sire"] ?></center></td>
                        <td><center><?php echo $key["robe"] ?></center></td>
                        <td style='display:flex; justify-content: space-evenly;'>
                            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modal<?php echo $id_cheval ?>'>
                                Modifier
                            </button>
                            <form action="Cheval_trait.php" method="post">
                                <input type="hidden" name="id_personne" value="<?php echo $id_cheval ?>">
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
        $id_personne = $key["id_personne"]; ?>

            <!-- Modal -->
            <div class="modal fade" id="modal<?php echo $id_personne ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modifier le cavalier</h5>
                        </div>
                        <form action="Cavalier_trait.php" method="post">
                            <div class="modal-body form-group">
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="nom" value="<?php echo $key["nom"]; ?>">
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="prenom" value="<?php echo $key["prenom"]; ?>">
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="dna" value="<?php echo $key["DNA"]; ?>">
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="rue" value="<?php echo $key["rue"]; ?>">
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="cp" value="<?php echo $key["code_postal"]; ?>">
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="ville" value="<?php echo $key["ville"]; ?>">
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="mail" value="<?php echo $key["mail"]; ?>">
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="telephone" value="<?php echo $key["telephone"]; ?>">
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="gal_cav" value="<?php echo $key["gal_cav"]; ?>">
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="num_lic" value="<?php echo $key["num_lic"]; ?>">
                                <input type="hidden" name="id_personne" value="<?php echo $id_personne ?>">
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
                            <h5 class="modal-title">Insertion de cavalier</h5>
                        </div>
                        <form action="Cavalier_trait.php" method="post">
                            <div class="modal-body form-group">
                                <label>Nom :</label>
                                <input placeholder="Nom" class="form-control" type="text" name="nom">
                                <label>Prenom :</label>
                                <input placeholder="Prenom" class="form-control" type="text" name="prenom">
                                <label>Date de naissance :</label>
                                <input placeholder="Date de naissance" class="form-control" type="text" name="DNA">
                                <label>Numéro de rue :</label>
                                <input placeholder="numero de rue" class="form-control" type="text" name="rue">
                                <label>Code postal :</label>
                                <input placeholder="code postal" class="form-control" type="text" name="cp">
                                <label>Ville :</label>
                                <input placeholder="ville" class="form-control" type="text" name="ville">
                                <label>Adresse mail :</label>
                                <input placeholder="e-mail" class="form-control" type="text" name="mail">
                                <label>Numéro de téléphone :</label>
                                <input placeholder="telephone" class="form-control" type="text" name="telephone">
                                <label>Galop :</label>
                                <input placeholder="galop" class="form-control" type="text" name="gal_cav">
                                <label>Numéro de licence :</label>
                                <input placeholder="numero de licence" class="form-control" type="text" name="num_lic">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" name="create" class="btn btn-primary">Créer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php