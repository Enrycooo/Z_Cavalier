<?php
include_once('../include/defines.inc.php');

$sql = ("SELECT * FROM personne P
        INNER JOIN cavalier C ON P.id_personne = C.ref_pers
        WHERE id_personne = :id");
$req = $conn->prepare($sql);
$req->bindValue(':id',$_POST['id_personne'],PDO::PARAM_INT);
$res = $req->execute();
foreach($conn->query($sql) as $data){
?>


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
            <input placeholder="Nom" class="form-control" style="width: 25%;" type="text" name="nom" value="<?php echo $data["nom"] ?>">
            </div>
            <div class="form-group container">
                <label>Prenom :</label>
            <input placeholder="Prenom" class="form-control" style="width: 25%;" type="text" name="prenom" value="<?php echo $data["prenom"] ?>">
            </div>
            <div class="form-group container">
                <label>Date de naissance :</label>
            <input placeholder="Date de naissance" class="form-control" style="width: 25%;" type="text" name="dna" value="<?php echo $data["dna"] ?>">
            </div>
            <div class="form-group container">
                <label>Adresse mail :</label>
            <input placeholder="e-mail" class="form-control" style="width: 25%;" type="text" name="mail" value="<?php echo $data["mail"] ?>">
            </div>
            <div class="form-group container">
                <label>Numéro de téléphone :</label>
            <input placeholder="telephone" class="form-control" style="width: 25%;" type="text" name="telephone" value="<?php echo $data["telephone"] ?>">
            </div>
            <div class="form-group container">
                <label>Galop :</label>
            <input placeholder="galop" class="form-control" style="width: 25%;" type="text" name="galop" value="<?php echo $data["gal_cav"] ?>">
            </div>
            <div class="form-group container">
                <label>Numéro de licence :</label>
            <input placeholder="numero de licence" class="form-control" style="width: 25%;" type="text" name="numerolicence" value="<?php echo $data["num_lic"] ?>">
            </div>
            <div class="form-group container">
            <button name="create" class=" btn btn-primary" type="submit id="submit>Mettre à jour</button>
            </div>
    </form>
    </body>
</html>

<?php
}