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
    <title>Pension</title>
</head>
<body>
    <script> 
        const url = "Pension_trait.php";
    </script>
<?php
        //Nav = read c'est la "page principale" qui vas permettre de lire la BDD à travers le datatable
        if(!isset($_GET["nav"]) || $_GET["nav"] === "read"){
        $data = $oPension->db_get_all();
  ?>
    <div class="container">
        <div class="d-flex justify-content-center">
            <a href="/Z_Cavalier/dashboard/index.html"><img src ="/Z_Cavalier/dashboard/assets/img/home_icon.png"/></a> &nbsp;
            <a class="btn btn-primary" href="Pension_affiche.php?nav=create">Créer une nouvelle pension</a> &nbsp;
            <form action="Pension_search.php" method='post'> &nbsp;
            <input placeholder="ref_cheval" type="text" name="ref_cheval" title="Veuillez renseigner l'identifiant du cheval concerné par votre recherche"> &nbsp;
            <input placeholder="lib_pension" type="text" name="lib_pension"> &nbsp;
            <button name="search" type="submit id="submit" class="btn btn-primary">Rechercher</button>
            </form>
        </div>
    </div>
 
            <div class="row">
                <div class="col">
                    <table class='table table-hover'>
            <thead>
                <th style='text-align :center'>id_pension</th>
                <th style='text-align :center'>ref_cheval</th>
                <th style='text-align :center'>lib_pension</th>
                <th style='text-align :center'>date_deb_pension</th>
                <th style='text-align :center'>duree_pension</th>
                <th style='text-align :center'>tarif_pension</th>
                <th style='text-align :center'>ref_type_p</th>
                <th style='text-align :center'>ref_per</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($data as $key) {
                        $id_pension = $key["id_pension"]; 
                        echo " <tr data-value=".$id_pension.">
                        <td><center>".$key["id_pension"]."</center></td>
                        <td><center>".$key["ref_cheval"]."</center></td>
                        <td><center>".$key["lib_pension"]."</center></td>
                        <td><center>".$key["date_deb_pension"]."</center></td>
                        <td><center>".$key["duree_pension"]."</center></td>
                        <td><center>".$key["tarif_pension"]."</center></td>
                        <td><center>".$key["ref_type_p"]."</center></td>
                        <td><center>".$key["ref_per"]."</center></td>
                        <td style='display:flex; justify-content: space-evenly;'>
                            <a type='button' class='btn btn-primary' href='Pension_affiche.php?nav=update&id_pension=".$id_pension."'>
                                Modifier
                            </a>
                            <form action='Pension_trait.php' method='post'>
                                <input type='hidden' name='id_pension' value=".$id_pension.">
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
            $data = $oPension->db_get_by_id($_GET["id_pension"]);
            ?>

        <?php
        
        //foreach($data as $key){
        //$id_pension = $key["id_pension"]; ?>         
            <div class="">
                        <form action="Pension_trait.php" method="post">
                            <div class="form-group">
                                <label>ID cheval :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="ref_cheval" value="<?php echo $data["ref_cheval"]; ?>">
                                <label>Libellé :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="lib_pension" value="<?php echo $data["lib_pension"]; ?>">
                                <label>Date début :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="date_deb_pension" value="<?php echo $data["date_deb_pension"]; ?>">
                                <label>Durée :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="duree_pension" value="<?php echo $data["duree_pension"]; ?>">
                                <label>Tarif :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="tarif_pension" value="<?php echo $data["tarif_pension"]; ?>">
                                <label>ID type pension :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="ref_type_p" value="<?php echo $data["ref_type_p"]; ?>">
                                <label>ID personne :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="ref_per" value="<?php echo $data["ref_per"]; ?>">
                                <input type="hidden" name="id_pension" value="<?php echo $_GET["id_pension"]; ?>">
                            </div>
                        
                            <div class="">
                                <a type="button" class="btn btn-secondary" href="Pension_affiche.php">Retour</a>
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
            <h1>Créer une pension</h1>
            
            <form action="Pension_trait.php" method="post">
                <div class="container">
                    <div class="form-group">
                <input placeholder="ref_cheval" type="text" name="ref_cheval">
                <input placeholder="lib_pension" type="text" name="lib_pension">
                <input type="date" placeholder="date_deb_pension" type="text" name="date_deb_pension">
                <input placeholder="duree_pension" type="text" name="duree_pension">
                <input placeholder="tarif_pension" type="text" name="tarif_pension">
                <input placeholder="ref_type_p" type="text" name="ref_type_p">
                <input placeholder="ref_per" type="text" name="ref_per">
                <button name="create" type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </form>

        <?php
            }
        ?>
            </body>
            </html>