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
    <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="../../dashboard/index.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Cavalier</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/Z_Cavalier/Arborescence/Cavalerie/Cheval_Affiche.php" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Cheval</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="/Z_Cavalier/Arborescence/Robe/Robe_affiche.php" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Robe</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="/Z_Cavalier/Arborescence/Pension/Pension_affiche.php" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Pension</span> </a>
                    </li>
                    <li class="nav-item">
                        <a href="/Z_Cavalier/Arborescence/Type_pension/Type_pension_affiche.php" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Type Pension</span> </a>
                    </li>
                    <li class="nav-item">
                        <a href="/Z_Cavalier/Arborescence/Cours/fullcalendar-master/index.php" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Cours</span> </a>
                    </li>
                    <li class="nav-item">
                        <a href="/Z_Cavalier/Arborescence/registration/admin/add_user.php" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Ajouter un utilisateur</span> </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../../Dashboard/assets/img/Admin.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Se déconnecter</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
    <div class="container">
    <div class="row justify-content-md-center">
            <div class="input-group">
            <a class="btn btn-primary" href="Robe_affiche.php?nav=create">Créer une nouvelle robe</a> &nbsp;
            <form action="Robe_search.php" method='post'> &nbsp;
            <input placeholder="nom de la robe" type="text" name="lib_robe" title="Veuillez renseigner le nom de la robe concernée par votre recherche">
            <button name="search" type="submit id="submit" class="btn btn-primary">Rechercher</button>
            </form>
        </div>
    </div>
 
    <div class="row mt-4">
        <div class="col">
            <div class="table-responsive">
            <table class='table table-hover'>
                <thead class="table-dark">
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
            </div>
        </div>
        </div>
        <?php
        }

            elseif($_GET["nav"] === "update"){
            $data = $oRobe->db_get_by_id($_GET["id_robe"]);
            ?>
        <?php
        
        //foreach($data as $key){
        //$id_pension = $key["id_pension"]; ?>         
            <h1>Modifier</h1>
            <div class="">
            <link href="../static/css/style.css" rel="stylesheet" />     
            <span class="imageDroite"><img class="img-fluid" src="../static/assets/img/logo_REL.png" alt="..." /></span>
            <form action="Robe_trait.php" method="post">
            <p>
                    <label>Nom de la robe :</label>
                    <input class="col-8 form-control" style="margin: 0 auto" type="text" name="lib_robe" value="<?php echo $data["lib_robe"]; ?>">
                    <input type="hidden" name="id_robe" value="<?php echo $_GET["id_robe"]; ?>">
            </p>
                        <a type="button" class="btn btn-secondary" href="Robe_affiche.php">Retour</a>
                    <button name="update" type="submit" class="btn btn-primary">Modifier</button>
            
            </form>
            <?php
            }
            elseif($_GET['nav'] === 'create'){
        ?>
<link href="../static/css/main.css" rel="stylesheet" media="all">
<div class="p-t-130 p-b-100">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <h2 class="title">Création d'une robe</h2>
                <form action="Robe_trait.php" method="post">
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Nom de la robe</label>
                                <input class="input--style-4" type="text" name="lib_robe">
                            </div>
                        </div>
                        <div class="p-t-15">
                                <a type="button" class="btn btn-secondary" href="Robe_affiche.php">Retour</a>
                                <button type="submit" name="create" class="btn btn--radius-2 btn--blue">Enregistrer</button>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

        <?php
            }
        ?>
    </div>
    </div>
    </div>
            </body>
            </html>