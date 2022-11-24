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
    <title>Type pension</title>
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
            <a href="/Z_Cavalier/dashboard/index.html"><img src ="/Z_Cavalier/dashboard/assets/img/home_icon.png"/></a> &nbsp;
            <a class="btn btn-primary" href="Type_pension_affiche.php?nav=create">Créer un nouveau type de pension</a> &nbsp;
            <form action="Type_pension_search.php" method='post' title="Veuillez renseigner le type de pension concerné par votre recherche"> &nbsp;
            <input placeholder="nom du type de pension" type="text" name="lib_type_p">
            <button name="search" type="submit id="submit" class="btn btn-primary">Rechercher</button>
            </form>
        </div>
    </div>
 
            <div class="row">
                <div class="col">
                    <table class='table table-hover'>
            <thead>
                <th style='text-align :center'>Id </th>
                <th style='text-align :center'>Nom du type de pension</th>
                <th style='text-align :center'>Actions</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($data as $key) {
                        $id_type_p= $key["id_type_p"]; 
                        echo " <tr data-value=".$id_type_p.">
                        <td><center>".$key["id_type_p"]."</center></td>
                        <td><center>".$key["lib_type_p"]."</center></td>
                        <td style='display:flex; justify-content: space-evenly;'>
                            <a type='button' class='btn btn-primary' href='Type_pension_affiche.php?nav=update&id_type_p=".$id_type_p."'>
                                Modifier
                            </a>
                            <form action='Type_pension_trait.php' method='post'>
                                <input type='hidden' name='id_type_p' value=".$id_type_p.">
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
            $data = $oType_pension->db_get_by_id($_GET["id_type_p"]);
            ?>

        <?php
        
        //foreach($data as $key){
        //$id_pension = $key["id_pension"]; ?>         
            <div class="">
                        <form action="Type_pension_trait.php" method="post">
                            <div class="form-group">
                                <label>Type pension :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="lib_type_p" value="<?php echo $data["lib_type_p"]; ?>">
                                <input type="hidden" name="id_type_p" value="<?php echo $_GET["id_type_p"]; ?>">
                            </div>
                        
                            <div class="">
                                <a type="button" class="btn btn-secondary" href="Type_pension_affiche.php">Retour</a>
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
           <h1>Créer un type de pension</h1>

        <form action="Type_pension_trait.php" method="post">
            <div class="container">
                <div class="col-9 float-end bg-warning center-align">
                    <div class="container">
                <div class="row">
                    <div class="col-5">
                    <label for="lib_type_p" class="form-label">Nom Type pension :</label>
                    <input placeholder="nom du type de pension" class="form-control" id="nom" type="text" name="lib_type_p">
                    </div>
                    </div>
                        <a type="button" class="btn btn-secondary" href="Type_pension_affiche.php">Retour</a>
                    <button name="create" type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
                </div>
            </div>
        </form>
    </div>
        <?php
            }
        ?>
            </body>
            </html>