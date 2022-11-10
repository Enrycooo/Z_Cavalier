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
    <title>Personne</title>
</head>
<body>
    <script> 
        const url = "Cavalier_trait.php";
    </script>
<?php
        //Nav = read c'est la "page principale" qui vas permettre de lire la BDD à travers le datatable
        if(!isset($_GET["nav"]) || $_GET["nav"] === "read"){
        $data = $oCavalier->db_get_all();
  ?>
    <div class="container">
        <div class="d-flex justify-content-center">
            <a class="btn btn-success mb-4" href="Cavalier_Affiche.php?nav=create">Créer une nouvelle personne</a>
            <form action="Cavalier_search.php" method='post'>
            <input placeholder="Nom" type="text" name="nom">
            <input placeholder="Prenom" type="text" name="prenom">
            <button name="search" type="submit id="submit">Rechercher</button>
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
                        echo " <tr data-value=".$id_personne.">
                        <td><center>".$key["id_personne"]."</center></td>
                        <td><center>".$key["nom"]."</center></td>
                        <td><center>".$key["prenom"]."</center></td>
                        <td><center>".$key["DNA"]."</center></td>
                        <td><center>".$key["rue"]."</center></td>
                        <td><center>".$key["code_postal"]."</center></td>
                        <td><center>".$key["ville"]."</center></td>
                        <td><center>".$key["mail"]."</center></td>
                        <td><center>".$key["telephone"]."</center></td>
                        <td><center>".$key["gal_cav"]."</center></td>
                        <td><center>".$key["num_lic"]."</center></td>
                        <td style='display:flex; justify-content: space-evenly;'>
                            <a type='button' class='btn btn-primary' href='Cavalier_Affiche.php?nav=update&id_personne=".$id_personne."'>
                                Modifier
                            </a>
                            <form action='Cavalier_trait.php' method='post'>
                                <input type='hidden' name='id_personne' value=".$id_personne.">
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
            elseif($_GET['nav'] === 'create'){
        ?>
            <h1>Créer une personne</h1>
                <script type="text/javascript">
        function verif ()
        {
            var etat = document.getElementById('check').checked;
             
            if(etat)
            {
                document.getElementById('1').className = 'off';
                 
                document.getElementById('2').className = 'on';
            }
            else
            {
                document.getElementById('1').className = 'on';
                 
                document.getElementById('2').className = 'off';
            }
        }
</script>
<style type="text/css">
.on {
    display: block;
}
 
.off {
    display: none;
}
</style>
<div class="container">
<div class="m-auto">
    <input id="check" name="responsable" type="checkbox" onChange="verif();" /><label> Responsable</label>
    <div id="1" class="on">
        <form action="Cavalier_trait.php" method="post">
            <div class="container">
                <div class="form-group">
                    <input placeholder="Nom" type="text" name="nom">
                    <input placeholder="Prenom" type="text" name="prenom">
                    <input placeholder="Date de naissance" type="text" name="DNA">
                    <input placeholder="Galop" type="text" name="gal_cav">
                    <input placeholder="Numero licence" type="text" name="num_lic">
                    <input placeholder="Mail" type="text" name="mail">
                    <input placeholder="Telephone" type="text" name="telephone">
                    <button name="create" type="submit">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
    <div id="2" class="off">
    <form action="Cavalier_trait.php" method="post">
        <div class="container">
            <div class="form-group">
                <input placeholder="Nom" type="text" name="nom">
                <input placeholder="Prenom" type="text" name="prenom">
                <input placeholder="Date de naissance" type="text" name="DNA">
                <input placeholder="Rue" type="text" name="rue">
                <input placeholder="Code postal" type="text" name="cp">
                <input placeholder="Ville" type="text" name="ville">
                <input placeholder="Mail" type="text" name="mail">
                <input placeholder="Telephone" type="text" name="telephone">
                <button name="create" type="submit">Enregistrer</button>
            </div>
        </div>
    </form>
    </div>
</div>
</div>
        <?php
            }
        ?>
</body>
</html>