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
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "input" ).checkboxradio();
  } );
  </script>
    <title>Cours</title>
</head>
<body>
    <script> 
        const url = "Cours_trait.php";
    </script>
<?php
        //Nav = read c'est la "page principale" qui vas permettre de lire la BDD à travers le datatable
        if(!isset($_GET["nav"]) || $_GET["nav"] === "read"){
        $data = $oCours->db_get_all();
  ?>
    <div class="container">
        <div class="d-flex justify-content-center">
        <a href="/Z_Cavalier/dashboard/index.html"><img src ="/Z_Cavalier/dashboard/assets/img/home_icon.png"/></a> &nbsp;
            <a class="btn btn-primary" href="Cours_Affiche.php?nav=create">Créer un nouveau cours</a> &nbsp;
            <form action="Cours_search.php" method='post'>
                <input placeholder="Date" type="datetime-local" name="date_cours">
            <button name="search" type="submit id="submit" class="btn btn-primary">Rechercher</button>
            </form>
        </div>
    </div>
    
            <div class="row">
                <div class="col">
                    <table class='table table-hover'>
            <thead>
                <th style='text-align :center'>ID</th>
                <th style='text-align :center'>Libellé</th>
                <th style='text-align :center'>Date</th>
                <th style='text-align :center'>Duree</th>
                <th style='text-align :center'>Actions</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($data as $key) {
                        $id_cours = $key["id_cours"]; 
                        echo " <tr data-value=".$id_cours.">
                        <td><center>".$key["id_cours"]."</center></td>
                        <td><center>".$key["lib_cours"]."</center></td>
                        <td><center>".$key["date_cours"]."</center></td>
                        <td><center>".$key["duree_cours"]."</center></td>
                        <td style='display:flex; justify-content: space-evenly;'>
                            <a type='button' class='btn btn-primary' href='Cours_Affiche.php?nav=update&id_cours=".$id_cours."'>
                                Modifier
                            </a>
                            <form action='Cours_trait.php' method='post'>
                                <input type='hidden' name='id_cours' value=".$id_cours.">
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
        elseif($_GET["nav"] === "update"){
        $data = $oCours->db_get_by_id($_GET["id_cours"]);
        ?>
                    
            <div class="">
                        <form action="Cours_trait.php" method="post">
                            <div class="form-group">
                                <label>Libellé :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="lib_cours" value="<?php echo $data["lib_cours"]; ?>">
                                <label>Date :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="date_cours" value="<?php echo $data["date_cours"]; ?>">
                                <label>Durée :</label>
                                <input class="col-8 form-control" style="margin: 0 auto" type="text" name="duree_cours" value="<?php echo $data["duree_cours"]; ?>">
                                <input type="hidden" name="id_cours" value="<?php echo $_GET["id_cours"]; ?>">
                            </div>
                        
                            <div class="">
                                <a type="button" class="btn btn-secondary" href="Cours_Affiche.php">Retour</a>
                                <button type="submit" name="update" class="btn btn-primary">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            }
            //Tout ce qui se trouve en dessous de $_GET['nav'] === create est pour l'insertion de personne dans la BDD
            elseif($_GET['nav'] === 'create'){
        ?>
<center><h1>Créer un Cours</h1></center>
<form action="Cours_trait.php" method="post">
            <div class="container">
                <div class="col-9 float-end bg-warning center-align">
                    <div class="container">
                <div class="row">
                    <div class="col-5">
                    <label for="lib_cours" class="form-label">Libellé :</label>
                    <input placeholder="Libellé" class="form-control" id="lib_cours" type="text" name="lib_cours">
                    </div>
                    <div class="col-5">
                    <label for="date_cours" class="form-label">Date :</label>
                    <input placeholder="Date" class="form-control" id="date_cours" type="datetime-local" name="date_cours">
                    </div>
                </div>
                    <div class="form-group">
                        <div class="col-5">
                        <label for="duree_cours" class="form-label">Duree :</label>
                    <input type="text" id="duree_cours" class="form-control" placeholder="Duree" type="text" name="duree_cours">
                        </div>
                    </div>
                        <a type="button" class="btn btn-secondary" href="Cours_Affiche.php">Retour</a>
                    <button name="create" type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
                </div>
            </div>
        </form>
        <?php
            }
        ?>
</body>
</html>