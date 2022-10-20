<?php
include('../include/defines.inc.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <title>Casiers</title>
</head>
<body>
    <script> 
        const url = "Cavalier_trait.php";
    </script>
<?php

        $data = $oCavalier->db_get_all();

  ?>
  <form action="Cavalier_trait.php" method="post">
        <div class="form-group row col-4 p-4">
            <input class="form-control col-6 mr-3" type="text" name="nom" placeholder="Nom du cavalier">
            <button class="btn btn-success col-5" name="create" type="submit">Créer un cavalier</button>
        </div>
    </form>
 
            <div class="row">
                <div class="col">
                    <table class='table table-hover'>
            <thead>
                <th style='text-align :center'>ID</th>
                <th style='text-align :center'>Nom</th>
                <th style='text-align :center'>Prenom</th>
                <th style='text-align :center'>Date de naissance </th>
                <th style='text-align :center'>rue</th>
                <th style='text-align :center'>code postal</th>
                <th style='text-align :center'>ville</th>
                <th style='text-align :center'>mail</th>
                <th style='text-align :center'>telephone</th>
                <th style='text-align :center'>galop</th>
                <th style='text-align :center'>numero licence</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($data as $key) {
                        ?>
                        <tr data-value="<?php echo $key["id_personne"] ?>">
                        <td><center><?php echo $key["id_personne"] ?></center></td>
                        <td><center><?php echo $key["nom"] ?></center></td>
                        <td><center><?php echo $key["prenom"] ?></center></td>
                        <td><center><?php echo $key["DNA"] ?></center></td>
                        <td><center><?php echo $key["rue"] ?></center></td>
                        <td><center><?php echo $key["code_postal"] ?></center></td>
                        <td><center><?php echo $key["ville"] ?></center></td>
                        <td><center><?php echo $key["mail"] ?></center></td>
                        <td><center><?php echo $key["telephone"] ?></center></td>
                        <td><center><?php echo $key["gal_cav"] ?></center></td>
                        <td><center><?php echo $key["num_lic"] ?></center></td>
                        <td style='display:flex; justify-content: space-evenly;'>
                            <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modal<?php echo $key["id_personne"] ?>'>
                                Modifier
                            </button>
                            <form action="Cavalier_trait.php" method="post">
                                <input type="hidden" name="id_personne" value="<?php echo $id ?>">
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
    </div>
    

    <?php 
    
        foreach($data as $key){ ?>

            <!-- Modal -->
            <div class="modal fade" id="modal<?php echo $key["id_personne"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modifier le cavalier</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
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
                                <input type="hidden" name="id_personne" value="<?php echo $key["id_personne"]; ?>">
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" name="update" class="btn btn-primary">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
        <?php    
        }

    ?>

/*
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
</head>
    <body>
        <div class="container" style="padding:25px">
        <input type="submit" class="btn btn-primary" value="Créer un nouveau cavalier"
        onclick="window.location='Cavalier_Ajouter.php';" />    
        <form action="Cavalier_search.php" method="post" style='position: absolute;top: 25px; left: 1005px;'>
                <input placeholder="Nom" type="text" name="nom">
                <input placeholder="Prenom" type="text" name="prenom">
                <button name="create" type="submit" class='btn btn-primary' id="submit">Chercher</button>
        </form>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <table class='table table-hover'>
                    <thead>
                        <tr>
                            <th style='text-align :center'>id</th>
                            <th style='text-align :center'>Nom</th>
                            <th style='text-align :center'>Prénom</th>
                            <th style='text-align :center'>Date de naissance</th>
                            <th style='text-align :center'>adresse mail</th>
                            <th style='text-align :center'>téléphone</th>
                            <th style='text-align :center'>galop</th>
                            <th style='text-align :center'>Numéro de licence</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    foreach ($conn->query($sql) as $row) { ?>
                        <tr data-value="<?php echo $row["id_personne"] ?>">
                            <td><center><?php echo $row["id_personne"] ?></center></td>
                            <td><center><?php echo $row["nom"] ?></center></td>
                            <td><center><?php echo $row["prenom"] ?></center></td>
                            <td><center><?php echo $row["DNA"] ?></center></td>
                            <td><center><?php echo $row["mail"] ?></center></td>
                            <td><center><?php echo $row["telephone"] ?></center></td>
                            <td><center><?php echo $row["galop"] ?></center></td>
                            <td><center><?php echo $row["numerolicence"] ?></center></td>
                            <td style='display:flex; justify-content: space-evenly;'>
                            <form action="Cavalier_modification.php" method="post">
                                <input type="hidden" name="id_personne" value="<?php echo $row["id_personne"] ?>">
                                <input type="button" name="id_personne" class='btn btn-primary' value="Modifier" value2="<?php echo $row["id_personne"] ?>" onclick="window.location='Cavalier_modification.php';">
                            </form>
                            <form action="Cavalier_suppr.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row["id_personne"] ?>">
                                <button type="submit" name="delete" class="delete-btn btn btn-danger" onclick="return confirm('Etes vous sûre ?');">Supprimer</button>
                            </form>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
*/