<?php include('../include/defines.inc.php'); ?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
</head>
    <body>
    <form action="Cavalier_trait.php" method="post">
            
            <div class="form-group container">
                <label>Nom :</label>
            <input placeholder="Nom" class="form-control" style="width: 25%;" type="text" name="nom">
            </div>
            <div class="form-group container">
                <label>Prenom :</label>
            <input placeholder="Prenom" class="form-control" style="width: 25%;" type="text" name="prenom">
            </div>
            <div class="form-group container">
                <label>Date de naissance :</label>
            <input placeholder="Date de naissance" class="form-control" style="width: 25%;" type="text" name="DNA">
            </div>
            <div class="form-group container">
                <label>Adresse mail :</label>
            <input placeholder="e-mail" class="form-control" style="width: 25%;" type="text" name="mail">
            </div>
            <div class="form-group container">
                <label>Numéro de téléphone :</label>
            <input placeholder="telephone" class="form-control" style="width: 25%;" type="text" name="telephone">
            </div>
            <div class="form-group container">
                <label>Galop :</label>
            <input placeholder="galop" class="form-control" style="width: 25%;" type="text" name="galop">
            </div>
            <div class="form-group container">
                <label>Numéro de licence :</label>
            <input placeholder="numero de licence" class="form-control" style="width: 25%;" type="text" name="numerolicence">
            </div>
            <div class="form-group container">
            <button name="create" class=" btn btn-primary" type="submit id="submit">Créer</button>
            </div>
    </form>
    </body>
</html>