<?php
include('../include/defines.inc.php');
// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION["username"])) {
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
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <link rel="stylesheet" href="/code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rek="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <title>Personne</title>
    <style>
        .image-tableau {
            width: 25px;
            height: 25px;
        }
    </style>
</head>

<body>

    <?php
    //Nav = read c'est la "page principale" qui vas permettre de lire la BDD à travers le datatable
    if (!isset($_GET["nav"]) || $_GET["nav"] === "read") {
        $data = $oCavalier->db_get_all();
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
                                <li><a class="dropdown-item" href="/Z_Cavalier/Arborescence/registration/logout.php">Se déconnecter</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col py-3">
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <div class="input-group">
                                <a href="/Z_Cavalier/dashboard/index.php"><img src="/Z_Cavalier/dashboard/assets/img/home_icon.png" /></a> &nbsp;
                                <a class="btn btn-primary" href="Cavalier_Affiche.php?nav=create">Créer une nouvelle personne</a> &nbsp;
                                <form action="Cavalier_search.php" method='post'> &nbsp;
                                    <input placeholder="Nom" type="text" name="nom" title="Veuillez renseigner le nom de la personne concernée par votre recherche"> &nbsp;
                                    <input placeholder="Prenom" type="text" name="prenom" title="Veuillez renseigner le prenom de la personne concernée par votre recherche">
                                    <button name="search" type="submit id=" submit" class="btn btn-primary">Rechercher</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <label>Rechercher : <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="myTable"></label>
                            <table class='table table-hover dataTable' id="myTable" style="font-size: 12px;">
                                <thead class="table-dark">
                                    <th style='text-align :center'>ID</th>
                                    <th style='text-align :center'>img</th>
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
                                    <th style='text-align :center'>Actions</th>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data as $key) {
                                        $id_personne = $key["id_personne"];
                                    ?>
                                        <tr>
                                            <td>
                                                <center><?= $key["id_personne"] ?></center>
                                            </td>
                                            <td>
                                                <center><img class="image-tableau" src='../static/img/<?= $key["photo"] ?>'></center>
                                            </td>
                                            <td>
                                                <center><?= $key["nom"] ?></center>
                                            </td>
                                            <td>
                                                <center><?= $key["prenom"] ?></center>
                                            </td>
                                            <td>
                                                <center><?= $key["DNA"] ?></center>
                                            </td>
                                            <td>
                                                <center><?= $key["rue"] ?></center>
                                            </td>
                                            <td>
                                                <center><?= $key["code_postal"] ?></center>
                                            </td>
                                            <td>
                                                <center><?= $key["ville"] ?></center>
                                            </td>
                                            <td>
                                                <center><?= $key["mail"] ?></center>
                                            </td>
                                            <td>
                                                <center><?= $key["telephone"] ?></center>
                                            </td>
                                            <td>
                                                <center><?= $key["gal_cav"] ?></center>
                                            </td>
                                            <td>
                                                <center><?= $key["num_lic"] ?></center>
                                            </td>
                                            <td style='display:flex; justify-content: space-evenly;'>
                                                <a type='button' class='btn btn-primary' href='Cavalier_Affiche.php?nav=update&id_personne=<?= $id_personne ?>'>
                                                    Modifier
                                                </a>
                                                <form action='Cavalier_trait.php' method='post'>
                                                    <input type='hidden' name='id_personne' value=" <?= $id_personne ?>">
                                                    <button type='submit' name='delete' class='delete-btn btn btn-danger'>Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php
                }
                //Tout ce qui se trouve en dessous de $_GET["nav"] === update est pour la modification
                elseif ($_GET["nav"] === "update") {
                    $data = $oCavalier->db_get_by_id($_GET["id_personne"]);
                    ?>

                        <link href="../static/css/main.css" rel="stylesheet" media="all">
                        <div class="widget">
                            <div class="p-t-130 p-b-100">
                                <div class="wrapper wrapper--w680">
                                    <div class="card card-4">
                                        <div class="card-body">
                                            <form action="Cavalier_trait.php" method="post">
                                                <h2 class="title">Modification</h2>
                                                <div class="row row-space">
                                                    <div class="col-2">
                                                        <div class="input-group">
                                                            <label class="label">Nom</label>
                                                            <input class="input--style-4" style="margin: 0 auto" type="text" name="nom" value="<?php echo $data["nom"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="input-group">
                                                            <label class="label">Prenom</label>
                                                            <input class="input--style-4" style="margin: 0 auto" type="text" name="prenom" value="<?php echo $data["prenom"]; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row row-space">
                                                    <div class="col-2">
                                                        <div class="input-group">
                                                            <label class="label">Date de naissance</label>
                                                            <input class="input--style-4" style="margin: 0 auto" type="text" name="dna" value="<?php echo $data["DNA"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="input-group">
                                                            <label class="label">N° Tel</label>
                                                            <input class="input--style-4" style="margin: 0 auto" type="text" name="telephone" value="<?php echo $data["telephone"]; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row row-space">
                                                    <div class="col-2">
                                                        <div class="input-group">
                                                            <label class="label">Rue :</label>
                                                            <input class="input--style-4" style="margin: 0 auto" type="text" name="rue" value="<?php echo $data["rue"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="input-group">
                                                            <label class="label">Code Postal :</label>
                                                            <input class="input--style-4" style="margin: 0 auto" type="text" name="cp" value="<?php echo $data["code_postal"]; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row row-space">
                                                    <div class="col-2">
                                                        <div class="input-group">
                                                            <label class="label">Ville</label>
                                                            <input class="input--style-4" style="margin: 0 auto" type="text" name="ville" value="<?php echo $data["ville"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="input-group">
                                                            <label class="label">Adresse Mail</label>
                                                            <input class="input--style-4" style="margin: 0 auto" type="text" name="mail" value="<?php echo $data["mail"]; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row row-space">
                                                    <div class="col-2">
                                                        <div class="input-group">
                                                            <label class="label">Numéro de licence</label>
                                                            <input class="input--style-4" style="margin: 0 auto" type="text" name="num_lic" value="<?php echo $data["num_lic"]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="input-group">
                                                            <label class="label">Galop</label>
                                                            <input class="input--style-4" style="margin: 0 auto" type="text" name="gal_cav" value="<?php echo $data["gal_cav"]; ?>">
                                                            <input type="hidden" name="id_personne" value="<?php echo $_GET["id_personne"]; ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="">
                                                    <a type="button" class="btn btn-secondary" href="Cavalier_Affiche.php">Retour</a>
                                                    <button type="submit" name="update" class="btn btn-primary">Modifier</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                //Tout ce qui se trouve en dessous de $_GET['nav'] === create est pour l'insertion de personne dans la BDD
                elseif ($_GET['nav'] === 'create') {
                    ?>
                        <link href="../static/css/main.css" rel="stylesheet" media="all">
                        <div class="widget">
                            <div class="p-t-130 p-b-100">
                                <div class="wrapper wrapper--w680">
                                    <div class="card card-4">
                                        <div class="card-body">
                                            <!-- Class Cavalier -->
                                            <div id="cav">
                                                <form action="Cavalier_trait.php" method="post" enctype="multipart/form-data">
                                                    <h2 class="title">Insertion d'une Personne</h2>
                                                    <h2 class="title" id="txt_resp">Et/Ou Responsable</h2>
                                                    <div class="row row-space">
                                                        <div class="col-2">
                                                            <div class="input-group">
                                                                <label for="nom" class="label">Nom</label>
                                                                <input placeholder="Nom" class="input--style-4" id="nom" type="text" name="nom_cav">
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="input-group">
                                                                <label for="prenom" class="label">Prenom</label>
                                                                <input placeholder="Prenom" class="input--style-4" id="prenom" type="text" name="prenom_cav">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="input-group">
                                                            <label for="dna" class="label">Date de naissance</label>
                                                            <input type="date" placeholder="Date de naissance" class="input--style-4" type="text" name="DNA_cav">
                                                        </div>
                                                    </div>

                                                    <!-- Ajout Rue, Ville et Code Postale si la personne est son propre responsable -->
                                                    <div id="resp2">
                                                        <div class="row row-space">
                                                            <div class="col-2">
                                                                <div class="input-group">
                                                                    <label for="rue" class="label">Rue</label>
                                                                    <input id="rue" class="input--style-4" placeholder="Rue" type="text" name="rue_cav">
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="input-group">
                                                                    <label for="ville" class="label">Ville</label>
                                                                    <input id="ville" class="input--style-4" placeholder="Ville" type="text" name="ville_cav">
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="input-group">
                                                                    <label for="cp" class="label"> Code Postal</label>
                                                                    <input type="number" placeholder="Code Postal" class="input--style-4" id="cp" type="text" name="cp_cav">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Retour aux infos de base du cavalier -->
                                                    <div class="row row-space">
                                                        <div class="col-2">
                                                            <div class="input-group">
                                                                <label for="galop" class="label">Galop</label>
                                                                <input type="number" id="galop" class="input--style-4" placeholder="Galop" type="text" name="gal_cav">
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="input-group">
                                                                <label for="lic" class="label">Numéro licence</label>
                                                                <input placeholder="Numero licence" class="input--style-4" id="lic" type="text" name="num_lic">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row row-space">
                                                        <div class="col-2">
                                                            <div class="input-group">
                                                                <label for="mail" class="label">Mail</label>
                                                                <input type="email" id="mail" class="input--style-4" placeholder="Mail" type="text" name="mail_cav">
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="input-group">
                                                                <label for="tel" class="label">Numéro de téléphone</label>
                                                                <input type="number" id="tel" class="input--style-4" placeholder="Telephone" type="text" name="telephone_cav">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row row-space">
                                                        <div class="col-8">
                                                            <label class="form-label" for="customFile">Image</label>
                                                            <input type="file" class="form-control" name="image" />
                                                        </div>
                                                    </div>
                                                    <div id="affiche" class="col-2">
                                                        <div class="input-group">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                                <label class="form-check-label">Responsable</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <center>
                                                        <hr><button class="btn btn-secondary" id="back"><a class="text-light text-decoration-none" href="Cavalier_Affiche.php">Retour</a></button></hr>
                                                        <button name="create" type="submit" name="submit" class="btn btn-primary" id="save">Enregistrer</button>
                                                    </center>

                                            </div>

                                            <!-- Class Responsable -->
                                            <div id="resp">
                                                <form action="Cavalier_trait.php" method="post">
                                                    <h2 class="title">Insertion d'un Responsable</h2>
                                                    <div class="row row-space">
                                                        <div class="col-2">
                                                            <div class="input-group">
                                                                <label for="nom" class="label">Nom :</label>
                                                                <input placeholder="Nom" class="input--style-4" id="nom" type="text" name="nom_resp">
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="input-group">
                                                                <label for="prenom" class="label">Prenom :</label>
                                                                <input placeholder="Prenom" class="input--style-4" id="prenom" type="text" name="prenom_resp">
                                                            </div>
                                                        </div>
                                                        <div class="row row-space">
                                                            <div class="col-2">
                                                                <div class="input-group">
                                                                    <label for="dna" class="label">Date de naissance :</label>
                                                                    <input type="date" id="dna" class="input--style-4" placeholder="Date de naissance" type="text" name="DNA_resp">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row row-space">
                                                            <div class="col-2">
                                                                <div class="input-group">
                                                                    <label for="rue" class="label">Rue :</label>
                                                                    <input id="rue" class="input--style-4" placeholder="Rue" type="text" name="rue_resp">
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="input-group">
                                                                    <label for="ville" class="label">Ville :</label>
                                                                    <input type="text" id="ville" class="input--style-4" placeholder="Ville" name="ville_resp">
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="input-group">
                                                                    <label for="cp" class="label"> Code Postal</label>
                                                                    <input type="number" placeholder="Code Postal" class="input--style-4" id="cp" type="text" name="cp_resp">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row row-space">
                                                        <div class="col-2">
                                                            <div class="input-group">
                                                                <label for="mail" class="label">Mail :</label>
                                                                <input type="email" id="mail" class="input--style-4" placeholder="Mail" type="text" name="mail_resp">
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="input-group">
                                                                <label for="tel" class="label">Numéro de téléphone :</label>
                                                                <input type="number" id="tel" class="input--style-4" placeholder="Telephone" type="text" name="telephone_resp"><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <center>
                                                        <hr><button class="btn btn-secondary" id="back2"><a class="text-light text-decoration-none" href="Cavalier_Affiche.php">Retour</a></button></hr>
                                                        <button name="create" type="submit" class="btn btn-primary" id="save2">Enregistrer</button>
                                                    </center>
                                            </div>
                                            </form>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                    ?>
                    <script>
                        $(document).ready(function() {
                            $('#myTable').DataTable({
                                searching: true,
                                searchDelay: 500,
                                paging: true,
                                pageLength: 10,
                                dom: 'p',
                                language: {
                                    paginate: {
                                        first: 'Première',
                                        last: 'Dernière',
                                        next: 'Suivant',
                                        previous: 'Précédent'
                                    }
                                },
                                search: {
                                    "smart": true
                                },
                                initComplete: function() {
                                    this.api().columns().every(function() {
                                        var that = this;
                                        $('input', this.footer()).on('keyup change clear', function() {
                                            if (that.search() !== this.value) {
                                                that
                                                    .search(this.value)
                                                    .draw();
                                            }
                                        });
                                    });
                                }
                            });
                        });

                        let r_affiche = document.getElementById("affiche");
                        let resp = document.getElementById("resp");
                        let resp2 = document.getElementById("resp2");
                        let txt_resp = document.getElementById("txt_resp");

                        let save2 = document.getElementById("save2");
                        let save = document.getElementById("save");
                        let back = document.getElementById("back");
                        let back2 = document.getElementById("back2");

                        resp.style.display = "none";
                        resp2.style.display = "none";
                        save2.style.display = "none";
                        back2.style.display = "none";
                        txt_resp.style.display = "none";

                        r_affiche.addEventListener("click", () => {
                            if (getComputedStyle(resp).display !== "none") {
                                resp.style.display = "none";
                                resp2.style.display = "none";
                                save2.style.display = "none";
                                back2.style.display = "none";
                                save.style.display = "flex";
                                back.style.display = "flex";
                                txt_resp.style.display = "none";

                            } else {
                                resp.style.display = "block";
                                resp2.style.display = "flex";
                                save2.style.display = "flex";
                                back2.style.display = "flex";
                                save.style.display = "none";
                                back.style.display = "none";
                                txt_resp.style.display = "flex";
                            }
                        })
                    </script>
</body>

</html>