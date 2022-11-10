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
    <title>Personne</title>
</head>
<body>
    <script> 
        const url = "Cavalier_trait.php";
    </script>
<?php
        //Nav = read c'est la "page principale" qui vas permettre de lire la BDD à travers le datatable
    $data = $oCavalier->db_get_all();
        if(!isset($_GET["nav"]) || $_GET["nav"] === "read"){
  ?>
    <div class="container">
        <div class="d-flex justify-content-center">
            <a class="btn btn-success mb-4" href="Cavalier_Affiche.php?nav=create">Créer une nouvelle personne</a>
            <form action="Cavalier_search.php" method='post'>
            <input placeholder="Nom" type="text" name="nom">
            <input placeholder="Prenom" type="text" name="prenom">
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
                        $id_personne = $key["id_personne"]; ?>
                        <tr data-value="<?php echo $id_personne ?>">
                        <td><center><?php echo $id_personne ?></center></td>
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
                            <a type='button' class='btn btn-primary' data-bs-target='#modif<?php echo $id_personne ?>' href="Cavalier_Affiche.php?nav=update">
                                Modifier
                            </a>
                            <form action="Cavalier_trait.php" method="post">
                                <input type="hidden" name="id_personne" value="<?php echo $id_personne ?>">
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

            elseif($_GET['nav'] === 'update'){
            ?>

        <?php
        
        foreach($data as $key){
        $id_personne = $key["id_personne"]; ?>

            <!-- Modal -->
            <div class="" id="modif<?php echo $id_personne ?>">
                        <form action="Cavalier_trait.php" method="post">
                            <div class="form-group" id="modif<?php echo $id_personne ?>">
                                <label>Nom :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="nom" value="<?php echo $key["nom"]; ?>">
                                <label>Prenom ;</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="prenom" value="<?php echo $key["prenom"]; ?>">
                                <label>Date de naissance :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="dna" value="<?php echo $key["DNA"]; ?>">
                                <label>Rue :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="rue" value="<?php echo $key["rue"]; ?>">
                                <label>Code postal :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="cp" value="<?php echo $key["code_postal"]; ?>">
                                <label>Ville :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="ville" value="<?php echo $key["ville"]; ?>">
                                <label>Adresse mail :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="mail" value="<?php echo $key["mail"]; ?>">
                                <label>Numéro de téléphone :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="telephone" value="<?php echo $key["telephone"]; ?>">
                                <label>Galop :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="gal_cav" value="<?php echo $key["gal_cav"]; ?>">
                                <label>Numéro de licence :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="num_lic" value="<?php echo $key["num_lic"]; ?>">
                                <input type="hidden" name="id_personne" value="<?php echo $id_personne ?>">
                            </div>
                        
                            <div class="">
                                <a type="button" class="btn btn-secondary" href="Cavalier_Affiche.php">Retour</a>
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
            <h1>Créer une personne</h1>

            <form action="Cavalier_trait.php" method="post">
                <div class="container">

        <?php
            }
        ?>
            </body>
            </html>