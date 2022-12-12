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
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <title>Cheval</title>
</head>
<body>
    <script> 
        const url = "Cheval_trait.php";
    </script>
<?php
        if(!isset($_GET["nav"]) || $_GET["nav"] === "read"){
        $data = $oCheval->db_get_all();
  ?>
    <div class="container">
        <div class="d-flex justify-content-center">
        <a href="/Z_Cavalier/dashboard/index.php"><img src ="/Z_Cavalier/dashboard/assets/img/home_icon.png"/></a> &nbsp;
        <a class="btn btn-primary" href="Cheval_Affiche.php?nav=create">Ajouter un Cheval </a> &nbsp; 
            <form action="Cheval_search.php" method='post'>
            <input placeholder="Nom" type="text" name="nom" title="Veuillez renseigner le nom du cheval concerné par votre recherche">
            <input placeholder="Race" type="text" name="race" title="Veuillez renseigner le prenom de la personne concernée par votre recherche">
            <button name="search" type="submit id="submit" class="btn btn-primary">Rechercher</button>
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
                        $id_cheval = $key["id_cheval"]; 
                        echo " <tr data-value=".$id_cheval.">
                        <td><center>".$key["id_cheval"]."</center></td>
                        <td><center>".$key["nom_cheval"]."</center></td>
                        <td><center>".$key["DNA_cheval"]."</center></td>
                        <td><center>".$key["race_cheval"]."</center></td>
                        <td><center>".$key["sexe_cheval"]."</center></td>
                        <td><center>".$key["taille_cheval"]."</center></td>
                        <td><center>".$key["SIRE_cheval"]."</center></td>
                        <td><center>".$key["ref_robe"]."</center></td>
                        <td style='display:flex; justify-content: space-evenly;'>
                            <a type='button' class='btn btn-primary' href='Cheval_Affiche.php?nav=update&id_cheval=".$id_cheval."'>
                                Modifier
                            </a>
                            <form action='Cheval_trait.php' method='post'>
                                <input type='hidden' name='id_cheval' value=".$id_cheval.">
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
        $data = $oCheval->db_get_by_id($_GET["id_cheval"]);
        ?>               
            <div class="">
                <form action="Cheval_trait.php" method="post">
                    <div class="modal-body form-group">
                        <label>Nom :</label>
                        <input class="col-8 form-control" style="margin: 0 auto" type="text" name="nom" value="<?php echo $data["nom_cheval"]; ?>">
                        <label>Date de naissance :</label>
                        <input type ="date" class="col-8 form-control" style="margin: 0 auto" type="text" name="dna" value="<?php echo $data["DNA_cheval"]; ?>">
                        <label>Race :</label>
                        <input class="col-8 form-control" style="margin: 0 auto" type="text" name="race" value="<?php echo $data["race_cheval"]; ?>">
                        <label>Sexe : (0 = mâle / 1 = femmelle)</label>
                        <input class="col-8 form-control" style="margin: 0 auto" type="text" name="sexe" value="<?php echo $data["sexe_cheval"]; ?>">
                        <label>Taille :</label>
                        <input type="number" class="col-8 form-control" style="margin: 0 auto" name="taille" value="<?php echo $data["taille_cheval"]; ?>">
                        <label>N°Sire du Cheval :</label>
                        <input class="col-8 form-control" style="margin: 0 auto" type="text" name="sire" value="<?php echo $data["SIRE_cheval"]; ?>">
                        <label>Référence de la robe :</label>
                        <input type="number" class="col-8 form-control" style="margin: 0 auto" type="text" name="robe" value="<?php echo $data["ref_robe"]; ?>">
                        <input type="hidden" name="id_cheval" value="<?php echo $_GET["id_cheval"]; ?>">
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" href="Cheval_Affiche.php">Retour</a>
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
<link href="../static/css/main.css" rel="stylesheet" media="all">
<div class="p-t-130 p-b-100">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <h2 class="title">Insertion d'un cheval</h2>
                <form action="Cheval_trait.php" method="post">
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Nom</label>
                                <input class="input--style-4" type="text" name="nom">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Race</label>
                                <input class="input--style-4" type="text" name="race">
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Date de naissance</label>
                                <div class="input-group-icon">
                                    <input class="input--style-4 js-datepicker" type="date" name="dna">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Sexe</label>
                                <div class="p-t-10">
                                    <input class="input--style-4" placeholder="(0 = mâle / 1 = femmelle)" class="form-control" type="text" name="sexe">
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Taille</label>
                                <div class="p-t-10">
                                    <input class="input--style-4" class="form-control" type="text" name="taille">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">N° Sire</label>
                                 <input class="input--style-4" type="text" name="sire">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Référence de la robe</label>
                                <input class="input--style-4" type="text" name="robe">
                            </div>
                        </div>
                    </div>
                    <div class="p-t-15">
                        <a type="button" class="btn btn-secondary" href="Cheval_Affiche.php">Retour</a>
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