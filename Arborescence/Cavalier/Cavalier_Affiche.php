<?php
include('../include/defines.inc.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rek="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Personne</title>
</head>

<body>

    <?php
    //Nav = read c'est la "page principale" qui vas permettre de lire la BDD à travers le datatable
    if (!isset($_GET["nav"]) || $_GET["nav"] === "read") {
        $data = $oCavalier->db_get_all();
    ?>
        <div class="container">
            <div class="d-flex justify-content-center">
                <a href="/Z_Cavalier/dashboard/index.php"><img src="/Z_Cavalier/dashboard/assets/img/home_icon.png" /></a> &nbsp;
                <a class="btn btn-primary" href="Cavalier_Affiche.php?nav=create">Créer une nouvelle personne</a> &nbsp;
                <form action="Cavalier_search.php" method='post'> &nbsp;
                    <input placeholder="Nom" type="text" name="nom" title="Veuillez renseigner le nom de la personne concernée par votre recherche"> &nbsp;
                    <input placeholder="Prenom" type="text" name="prenom" title="Veuillez renseigner le prenom de la personne concernée par votre recherche">
                    <input placeholder="Galop" type="text" name="galop" title="Veuillez renseigner le galop des personnes concernées par votre recherche">
                    <button name="search" type="submit id=" submit" class="btn btn-primary">Rechercher</button>
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
                        <th style='text-align :center'>Actions</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $key) {
                            $id_personne = $key["id_personne"];
                            echo " <tr data-value=" . $id_personne . ">
                            <td><center>" . $key["id_personne"] . "</center></td>
                            <td><center>" . $key["nom"] . "</center></td>
                            <td><center>" . $key["prenom"] . "</center></td>
                            <td><center>" . $key["DNA"] . "</center></td>
                            <td><center>" . $key["rue"] . "</center></td>
                            <td><center>" . $key["code_postal"] . "</center></td>
                            <td><center>" . $key["ville"] . "</center></td>
                            <td><center>" . $key["mail"] . "</center></td>
                            <td><center>" . $key["telephone"] . "</center></td>
                            <td><center>" . $key["gal_cav"] . "</center></td>
                            <td><center>" . $key["num_lic"] . "</center></td>
                            <td style='display:flex; justify-content: space-evenly;'>
                                <a type='button' class='btn btn-primary' href='Cavalier_Affiche.php?nav=update&id_personne=" . $id_personne . "'>
                                    Modifier
                                </a>
                                <form action='Cavalier_trait.php' method='post'>
                                    <input type='hidden' name='id_personne' value=" . $id_personne . ">
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
        //Tout ce qui se trouve en dessous de $_GET["nav"] === update est pour la modification
        elseif ($_GET["nav"] === "update") {
            $data = $oCavalier->db_get_by_id($_GET["id_personne"]);
            ?>

                <div class="">
                    <form action="Cavalier_trait.php" method="post">
                        <div class="form-group">
                            <label>Nom :</label>
                            <input class="col-8 form-control" style="margin: 0 auto" type="text" name="nom" value="<?php echo $data["nom"]; ?>">
                            <label>Prenom :</label>
                            <input class="col-8 form-control" style="margin: 0 auto" type="text" name="prenom" value="<?php echo $data["prenom"]; ?>">
                            <label>Date de naissance :</label>
                            <input class="col-8 form-control" style="margin: 0 auto" type="text" name="dna" value="<?php echo $data["DNA"]; ?>">
                            <label>Rue :</label>
                            <input class="col-8 form-control" style="margin: 0 auto" type="text" name="rue" value="<?php echo $data["rue"]; ?>">
                            <label>Code postal :</label>
                            <input class="col-8 form-control" style="margin: 0 auto" type="text" name="cp" value="<?php echo $data["code_postal"]; ?>">
                            <label>Ville :</label>
                            <input class="col-8 form-control" style="margin: 0 auto" type="text" name="ville" value="<?php echo $data["ville"]; ?>">
                            <label>Adresse mail :</label>
                            <input class="col-8 form-control" style="margin: 0 auto" type="text" name="mail" value="<?php echo $data["mail"]; ?>">
                            <label>Numéro de téléphone :</label>
                            <input class="col-8 form-control" style="margin: 0 auto" type="text" name="telephone" value="<?php echo $data["telephone"]; ?>">
                            <label>Galop :</label>
                            <input class="col-8 form-control" style="margin: 0 auto" type="text" name="gal_cav" value="<?php echo $data["gal_cav"]; ?>">
                            <label>Numéro de licence :</label>
                            <input class="col-8 form-control" style="margin: 0 auto" type="text" name="num_lic" value="<?php echo $data["num_lic"]; ?>">
                            <input type="hidden" name="id_personne" value="<?php echo $_GET["id_personne"]; ?>">
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
        //Tout ce qui se trouve en dessous de $_GET['nav'] === create est pour l'insertion de personne dans la BDD
        elseif ($_GET['nav'] === 'create') {
    ?>
        <center>
            <h1>Créer une personne</h1>
        </center>

        <div class="widget">
            <!-- Class Cavalier -->
            <div id="cav">
                <form action="Cavalier_trait.php" method="post">
                    <div class="container">
                        <div class="col-9 float-end bg-warning center-align">
                            <div class="container">
                                <h1>
                                    <center>
                                        <u>
                                            <font color="#0d6efd" face="Georgia">Cavalier</font>
                                        </u>
                                    </center></br>
                                </h1>
                                <div class="row">
                                    <div class="col-5">
                                        <label for="nom" class="form-label">Nom :</label>
                                        <input placeholder="Nom" class="form-control" id="nom" type="text" name="nom">
                                    </div>
                                    <div class="col-5">
                                        <label for="prenom" class="form-label">Prenom :</label>
                                        <input placeholder="Prenom" class="form-control" id="prenom" type="text" name="prenom">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-5">
                                        <label for="dna" class="form-label">Date de naissance :</label>
                                        <input type="date" placeholder="Date de naissance" class="form-control" type="text" name="DNA">
                                    </div>
                                </div>

                                <!-- Ajout Rue, Ville et Code Postale si la personn est son propre responsable -->
                                <div id="resp2">
                                    <form action="Cavalier_trait.php" method="post">
                                        <div class="row">
                                            <div class="col-5">
                                                <label for="rue" class="form-label">Rue :</label>
                                                <input id="rue" class="form-control" placeholder="Rue" type="text" name="rue">
                                            </div>
                                            <div class="col-5">
                                                <label for="ville" class="form-label">Ville :</label>
                                                <input type="email" id="ville" class="form-control" placeholder="Ville" type="text" name="ville">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-5">
                                                <label for="cp" class="form-label"> Code Postal</label>
                                                <input type="number" placeholder="Code Postal" class="form-control" id="cp" type="text" name="cp">
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Retour aux infos de base du cavalier -->
                                <div class="row">
                                    <div class="col-5">
                                        <label for="galop" class="form-label">Galop :</label>
                                        <input type="number" id="galop" class="form-control" placeholder="Galop" type="text" name="gal_cav">
                                    </div>
                                    <div class="col-5">
                                        <label for="lic" class="form-label">Numéro licence :</label>
                                        <input placeholder="Numero licence" class="form-control" id="lic" type="text" name="num_lic">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <label for="mail" class="form-label">Mail :</label>
                                        <input type="email" id="mail" class="form-control" placeholder="Mail" type="text" name="mail">
                                    </div>
                                    <div class="col-5">
                                        <label for="tel" class="form-label">Numéro de téléphone :</label>
                                        <input type="number" id="tel" class="form-control" placeholder="Telephone" type="text" name="telephone"> <br>
                                    </div>
                                    </br></br></br></br></br>
                                    <div id="affiche" class="form-check form-switch ms-4 mb-4">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label">Responsable</label>
                                    </div>
                                    <a type="button" class="btn btn-secondary" href="Cavalier_Affiche.php" id="back">Retour</a>
                                    <button name="create" type="submit" class="btn btn-primary" id="save">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Class Responsable -->
            <div id="resp">
                <form action="Cavalier_trait.php" method="post">
                    <div class="container">
                        <div class="col-9 float-end bg-warning center-align">
                            <div class="container">
                                <div class="row">
                                    <h1>
                                        <center>
                                            <u>
                                                <font color="#0d6efd" face="Georgia">Responsable</font>
                                            </u>
                                        </center></br>
                                    </h1>
                                    <div class="col-5">
                                        <label for="nom" class="form-label">Nom :</label>
                                        <input placeholder="Nom" class="form-control" id="nom" type="text" name="nom">
                                    </div>
                                    <div class="col-5">
                                        <label for="prenom" class="form-label">Prenom :</label>
                                        <input placeholder="Prenom" class="form-control" id="prenom" type="text" name="prenom">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-5">
                                        <label for="dna" class="form-label">Date de naissance :</label>
                                        <input type="date" id="dna" class="form-control" placeholder="Date de naissance" type="text" name="DNA">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <label for="rue" class="form-label">Rue :</label>
                                        <input id="rue" class="form-control" placeholder="Rue" type="text" name="rue">
                                    </div>
                                    <div class="col-5">
                                        <label for="ville" class="form-label">Ville :</label>
                                        <input type="email" id="ville" class="form-control" placeholder="Ville" type="text" name="ville">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-5">
                                        <label for="cp" class="form-label"> Code Postal</label>
                                        <input type="number" placeholder="Code Postal" class="form-control" id="cp" type="text" name="cp">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <label for="mail" class="form-label">Mail :</label>
                                        <input type="email" id="mail" class="form-control" placeholder="Mail" type="text" name="mail">
                                    </div>
                                    <div class="col-5">
                                        <label for="tel" class="form-label">Numéro de téléphone :</label>
                                        <input type="number" id="tel" class="form-control" placeholder="Telephone" type="text" name="telephone"><br>
                                    </div>
                                    <button type="button" class="btn btn-secondary" id="back2">Retour</button>
                                    <button name="create" type="submit" class="btn btn-primary" id="save2">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
        }
    ?>
    <script>
        let r_affiche = document.getElementById("affiche");
        let resp = document.getElementById("resp");
        let resp2 = document.getElementById("resp2");

        let save2 = document.getElementById("save2");
        let save = document.getElementById("save");
        let back = document.getElementById("back");
        let back2 = document.getElementById("back2");

        resp.style.display = "none";
        resp2.style.display = "none";
        save2.style.display = "none";
        back2.style.display = "none";

        r_affiche.addEventListener("click", () => {
            if (getComputedStyle(resp).display != "none") {
                resp.style.display = "none";
                resp2.style.display = "none";
                save2.style.display = "none";
                back2.style.display = "none";
                save.style.display = "flex";
                back.style.display = "flex";

            } else {
                resp.style.display = "block";
                resp2.style.display = "flex";
                save2.style.display = "flex";
                back2.style.display = "flex";
                save.style.display = "none";
                back.style.display = "none";

            }
        })
    </script>
</body>

</html>