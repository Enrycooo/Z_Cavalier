<?php
include('../include/defines.inc.php');
/*
$sql = ("SELECT * FROM personne P
        INNER JOIN cavalier C ON P.id_personne = C.ref_pers
        WHERE actif = 1");
 */
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.2/datatables.min.css"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    
    <title>Cavalier</title>
</head>
<body>

<?php
    if(!isset($_GET["nav"]) || $_GET["nav"] === "read"){

  ?>
  <div class="container pt-5">
    <a class="btn btn-success mb-4" href="Cavalier_Affiche.php?nav=create">Créer une nouvelle commune</a>

    <table id="table">
        <thead>
            <th>Id Cavalier</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date de naissance</th>
            <th>E-mail</th>
            <th>Telephone</th>
            <th>Galop</th>
            <th>Numéro licence</th>
        </thead>
    </table>
  </div>
    
    <script> //initialisation datatable
        $(document).ready(function(){
            $('#table').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url':'ajaxfile.php'
                },
                'columns': [
                    { data: 'id_personne' },
                    { data: 'nom' },
                    { data: 'prenom' },
                    { data: 'dna' },
                    { data: 'mail' },
                    { data: 'telephone' },
                    { data: 'galop' },
                    { data: 'numerolicence' },
                    { data: 'actions' }
                ],
                deferRender:    true,
                scrollCollapse: true,
                scroller:       true
            });
        });
    </script>
    <?php
    }
    elseif($_GET['nav'] === "create"){
        $cavalier = $oCavalier->db_get_all();
        ?>
            <h1>Créer une ville</h1>

            <form action="Cavalier_trait.php" method="post">
                <input placeholder="Nom" type="text" name="nom">
                <input placeholder="Prenom" type="text" name="prenom">
                <input placeholder="Date de naissance" type="text" name="dna">
                <input placeholder="Adresse mail" type="text" name="mail">
                <input placeholder="Numéro de téléphone" type="text" name="telephone">
                <input placeholder="Galop" type="text" name="galop">
                <input placeholder="Numéro de licence" type="text" name="numerolicence">
                <label for="">Cavalier</label>
                <button name="create" type="submit">Enregistrer</button>
            </form>

        <?php
    }
    elseif($_GET["nav"] === "update"){
        $data = $oCavalier->db_get_by_id($_GET["id"]);
        ?>
            <form action="Cavalier_trait.php" method="post">
                <input type="hidden" name="id" value="<?php echo $data["id"] ?>">
                <input placeholder="Nom" type="text" name="nom" value="<?php echo $data["nom"] ?>">
                <input placeholder="Prenom" type="text" name="prenom" value="<?php echo $data["prenom"] ?>">
                <input placeholder="Date de naissance" type="text" name="DNA" value="<?php echo $data["DNA"] ?>">
                <input placeholder="Adresse mail" type="text" name="mail" value="<?php echo $data["mail"] ?>">
                <input placeholder="Numéro de téléphone" type="text" name="telephone" value="<?php echo $data["telephone"] ?>">
                <input placeholder="galop" type="text" name="galop" value="<?php echo $data["galop"] ?>">
                <input placeholder="Numéro de licence" type="text" name="numerolicence" value="<?php echo $data["numerolicence"] ?>">
                <button name="update" type="submit">Enregistrer</button>
            </form>
        <?php

    }
    elseif($_GET["nav"] === "delete"){
        $data = $oCavalier->db_get_by_id($_GET["id"]);
        ?>
            <form action="Cavalier_trait.php" method="post">
                <input disabled type="text" name="nom" value="<?php echo $data["nom"]; ?>">
                <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                <button name="delete" type="submit">Supprimer</button>
            </form>
        <?php

    }
    
    
    ?>
</body>
</html>

<?php

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
                            <td><center><?php echo $row["gal_cav"] ?></center></td>
                            <td><center><?php echo $row["num_lic"] ?></center></td>
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
