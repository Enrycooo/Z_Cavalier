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
    </head>
    <script>
        $('#trigger').click(function () {
	$('#modal').modal({show : true});
});
    </script>
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
            <a href="/Z_Cavalier/dashboard/index.html"><img src ="/Z_Cavalier/dashboard/assets/img/home_icon.png"/></a> &nbsp;
            <a class="btn btn-primary" href="Robe_affiche.php?nav=create">Créer une nouvelle robe</a> &nbsp;
            <form action="Robe_search.php" method='post'> &nbsp;
            <input placeholder="nom de la robe" type="text" name="lib_robe" title="Veuillez renseigner le nom de la robe concernée par votre recherche">
            <button name="search" type="submit id="submit" class="btn btn-primary">Rechercher</button>
            </form>
        </div>
    </div>
 
            <div class="row">
                <div class="col">
                    <table class='table table-hover'>
            <thead>
                <th style='text-align :center'>Id </th>
                <th style='text-align :center'>Nom de la robe</th>
                <th style='text-align :center'>Actions</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($data as $key) {
                        $id_robe = $key["id_robe"];
                        echo " <tr data-value=".$id_robe.">
                        <td><center>".$key["id_robe"]."</center></td>
                        <td><center>".$key["lib_robe"]."</center></td>
                        <td style='display:flex; justify-content: space-evenly;'>
                            <a type='button' class='btn btn-primary' href='Robe_affiche.php?nav=update&id_robe=".$id_robe."'>
                                Modifier
                            </a>
                            <form action='Robe_trait.php' method='post'>
                                <input type='hidden' name='id_robe' value=".$id_robe.">
                                <button type='submit' name='delete' class='delete-btn btn btn-danger'>Supprimer</button>
                            </form>
                        </td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
        <?php
        }

            elseif($_GET["nav"] === "update"){
            $data = $oRobe->db_get_by_id($_GET["id_robe"]);
            ?>
        <?php
        
        //foreach($data as $key){
        //$id_pension = $key["id_pension"]; ?>         
            <div class="">
                        <form action="Robe_trait.php" method="post">
                            <div class="form-group">
                                <label>Nom robe:</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="lib_robe" value="<?php echo $data["lib_robe"]; ?>">
                                <input type="hidden" name="id_robe" value="<?php echo $_GET["id_robe"]; ?>">
                            </div>
                        
                            <div class="">
                                <a type="button" class="btn btn-secondary" href="Robe_affiche.php">Retour</a>
                                <button type="submit" name="update" class="btn btn-primary">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            }
            elseif($_GET['nav'] === 'create'){
        ?>
            <h1>Créer une Robe</h1>

        <link href="css/styles.css" rel="stylesheet" />
        <form action="Robe_trait.php" method="post">
            <p>
                    <label for="lib_robe" class="form-label">Robe :</label>
                    <input placeholder="nom de la robe" class="form-control" id="nom" type="text" name="lib_robe">
            </p>
            <x>
                        <a type="button" class="btn btn-secondary" href="Robe_affiche.php">Retour</a>
                    <button name="create" type="submit" class="btn btn-primary">Enregistrer</button>
            </x>
        </form>
    </div>

        <?php
            }
        ?>
            </body>
            </html>