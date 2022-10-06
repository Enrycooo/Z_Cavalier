<?php
include('../include/defines.inc.php');

$sql = ("SELECT * FROM personne WHERE actif = 1");
/*
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <script>
        function autocomplet() {
        var min_length = 3; // nombre de caractère avant lancement recherche
        var keyword = $('#departement').val();  // departement fait référence au champ de recherche puis lancement de la recherche grace ajax_refres
        if (keyword.length >= min_length) {
            $.ajax({
                url: 'ajax_refresh.php',
                type: 'POST',
                data: {keyword:keyword},
                success:function(data){
                    $('#departement_list').show();
                    $('#departement_list').html(data);
                }
            });
        } else {
            $('#departement_list').hide();
        }
    }

    // Lors du choix dans la liste
    function set_item(item) {
        // change input value
        $('#departement').val(item);
        // hide proposition list
        $('#departement_list').hide();
    }
    </script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">

    
    <title>Cavalier</title>
</head>
<body>

<?php
    if(!isset($_GET["nav"]) || $_GET["nav"] === "read"){

  ?>
  <div class="container pt-5">
    <a class="btn btn-success mb-4" href="index.php?nav=create">Créer une nouvelle commune</a>

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
                    { data: 'id' },
                    { data: 'nom' },
                    { data: 'prenom' },
                    { data: 'DNA' },
                    { data: 'mail' },
                    { data: 'telephone' },
                    { data: 'galop' }
                    { data: 'numerolicence' }
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
                <input placeholder="Date de naissance" type="text" name="DNA">
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
*/

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
        <INPUT type="button" value="Click" onClick="window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Ajouter.php");">
        <form action="Cavalier_trait.php" method="post">
            
                <div class="form-group container">
                    <label>Nom :</label>
                <input placeholder="Nom" class="form-control" style="width: 25%;" type="text" name="nom">
                </div>
                <div class="form-group container">
                    <label>Prenom :</label>
                <input placeholder="Prenom" class="form-control" style="width: 25%;" type="text" name="prenom">
                </div>
                <div class="form-group container">
                    <label>Date de naissance :</label>
                <input placeholder="Date de naissance" class="form-control" style="width: 25%;" type="text" name="dna">
                </div>
                <div class="form-group container">
                    <label>Adresse mail :</label>
                <input placeholder="e-mail" class="form-control" style="width: 25%;" type="text" name="mail">
                </div>
                <div class="form-group container">
                    <label>Numéro de téléphone :</label>
                <input placeholder="telephone" class="form-control" style="width: 25%;" type="text" name="telephone">
                </div>
                <div class="form-group container">
                    <label>Galop :</label>
                <input placeholder="galop" class="form-control" style="width: 25%;" type="text" name="galop">
                </div>
                <div class="form-group container">
                    <label>Numéro de licence :</label>
                <input placeholder="numero de licence" class="form-control" style="width: 25%;" type="text" name="numerolicence">
                </div>
                <div class="form-group container">
                <button type='button' name="create" class='btn btn-primary form-control' style="width: 25%;" type="submit id="submit"> Enregistrer </button>
                </div>
        </form>
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
                    foreach ($conn->query($sql) as $row) {
                        $id = $row["id"]; ?>
                        <tr data-value="<?php echo $id ?>">
                            <td><center><?php echo $id ?></center></td>
                            <td><center><?php echo $row["nom"] ?></center></td>
                            <td><center><?php echo $row["prenom"] ?></center></td>
                            <td><center><?php echo $row["DNA"] ?></center></td>
                            <td><center><?php echo $row["mail"] ?></center></td>
                            <td><center><?php echo $row["telephone"] ?></center></td>
                            <td><center><?php echo $row["galop"] ?></center></td>
                            <td><center><?php echo $row["numerolicence"] ?></center></td>
                            <td style='display:flex; justify-content: space-evenly;'>
                                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modal<?php echo $id ?>'> Modifier </button>
                            <form action="Cavalier_suppr.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
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
        <form action="Cavalier_search.php" method="post">
            <center>
                <input placeholder="Nom" type="text" name="nom">
                <input placeholder="Prenom" type="text" name="prenom">
                <button name="create" type="submit" class='btn btn-primary' id="submit">Chercher</button>
            </center>
        </form>
    </body>
</html>