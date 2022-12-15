<?php
include('../include/defines.inc.php');
// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
                echo "<script>alert(\"Veuillez vous connecter en tant qu'admin pour accéder à cette page\")
                      window.location.replace('http://localhost/Z_Cavalier/Arborescence/registration/login.php')</script>";
		exit(); 
	}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
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
            <a href="/Z_Cavalier/dashboard/index.php"><img src ="/Z_Cavalier/dashboard/assets/img/home_icon.png"/></a> &nbsp;
            <a class="btn btn-primary" href="Pension_affiche.php?nav=create">Créer une nouvelle pension</a> &nbsp;
            <form action="Pension_search.php" method='post'> &nbsp;
            <input placeholder="ref cheval" type="text" name="ref_cheval" title="Veuillez renseigner l'identifiant du cheval concerné par votre recherche"> &nbsp;
            <input placeholder="nom du type de pension" type="text" name="lib_pension" title="Veuillez renseigner le nom de la pension concerné par votre recherche"> &nbsp;
            <button name="search" type="submit id="submit" class="btn btn-primary">Rechercher</button>
            </form>
        </div>
    </div>
 
            <div class="row">
                <div class="col">
                    <table class='table table-hover'>
            <thead>
                            <th style='text-align :center'>Id pension</th>
                            <th style='text-align :center'>Reference cheval</th>
                            <th style='text-align :center'>Type </th>
                            <th style='text-align :center'>Date de debut </th>
                            <th style='text-align :center'>Date de fin </th>
                            <th style='text-align :center'>Tarif </th>
                            <th style='text-align :center'>Reference type pension</th>
                            <th style='text-align :center'>Reference personne</th>
                            <th style='text-align :center'>Actions</th>
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
                        <td><center>".$key["date_fin_pension"]."</center></td>
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
            <h1>Modifier</h1>
            <div class="">
            <link href="../static/css/style.css" rel="stylesheet" />     
            <span class="imageDroite"><img class="img-fluid" src="../static/assets/img/logo_REL.png" alt="..." /></span>
            <form action="Pension_trait.php" method="post">
            <p>
                                <label>ID du cheval :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="ref_cheval" value="<?php echo $data["ref_cheval"]; ?>">
                                <label>Libellé :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="lib_pension" value="<?php echo $data["lib_pension"]; ?>">
                                <label>Date de début :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="date" name="date_deb_pension" value="<?php echo $data["date_deb_pension"]; ?>">
                                <label>Date de fin :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="date" name="date_fin_pension" value="<?php echo $data["date_fin_pension"]; ?>">
                                <label>Tarif:</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="tarif_pension" value="<?php echo $data["tarif_pension"]; ?>">
                                <label>ID type pension :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="ref_type_p" value="<?php echo $data["ref_type_p"]; ?>">
                                <label>ID personne :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="ref_per" value="<?php echo $data["ref_per"]; ?>">
                                <input type="hidden" name="id_pension" value="<?php echo $_GET["id_pension"]; ?>">
            </p>
                        <a type="button" class="btn btn-secondary" href="Pension_affiche.php">Retour</a>
                    <button name="update" type="submit" class="btn btn-primary">Modifier</button>
            
            </form>
            <?php
            }
            elseif($_GET['nav'] === 'create'){
        ?> 
<link href="../static/css/main.css" rel="stylesheet" media="all">
<body>
        <style>
      #grad {
        height: 500px;
        background-color: blue; /* Pour les navigateurs qui ne supportent pas de gradient */
        background-image: linear-gradient(to right, #1c87c9, #8ebf42);
      }
    </style>
</body>
<div class="p-t-130 p-b-100">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <h2 class="title">Insertion d'une pension</h2>
                <form action="Pension_trait.php" method="post">
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Nom</label>
                                <input class="input--style-4" type="text" name="lib_pension">
                            </div>
                        </div>
                        <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Date de début</label>
                                <input class="input--style-4 js-datepicker" type="date" name="date_deb_pension">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Date de fin</label>
                                <div class="input-group-icon">
                                    <input class="input--style-4 js-datepicker" type="date" name="date_fin_pension">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Tarif</label>
                                <input class="input--style-4" type="text" name="tarif_pension">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Ref cheval</label>
                                    <input class="input--style-4" class="form-control" type="text" name="ref_cheval">
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Reférence du type de pension</label>
                                 <input class="input--style-4" type="text" name="ref_type_p">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Référence de la personne</label>
                                <input class="input--style-4" type="text" name="ref_per">
                            </div>
                        </div>
                    </div>
                    <div class="p-t-15">
                        <a type="button" class="btn btn-secondary" href="Pension_affiche.php">Retour</a>
                        <button type="submit" name="create" class="btn btn--radius-2 btn--blue">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        <?php
            }
        ?>
</body>
            </html>