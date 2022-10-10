<?php
include_once('../include/defines.inc.php');

$sql = ("SELECT * FROM personne WHERE id = 3");
/*if ($_POST['id'] != ""){
    $id = $_POST['id'];
    }
*/?>
<!DOCTYPE html>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <table class='table table-hover'>
                <thead>
                    <tr>
                        <th style='text-align :center'>id</th>
                        <th style='text-align :center'>Nom</th>
                        <th style='text-align :center'>Prénom</th>
                        <th style='text-align :center'>Date de naissance</th>
                        <th style='text-align :center'>adresse mail</th>
                        <th style='text-align :center'>téléphone</th>
                        <th style='text-align :center'>galop</th>
                        <th style='text-align :center'>Numéro de licence</th>
                    </tr>
                </thead>
                </table>
                </br>
                <tbody>
                    <form action="Cavalier_trait.php" method="post">
                    <input type="hidden" name="id_personne" value="<?php echo $data["id_personne"] ?>">
                    <input placeholder="Nom de la personne" type="text" name="nom" value="<?php echo $data["nom"] ?>">
                    <input placeholder="Prénom de la personne" type="text" name="prenom" value="<?php echo $data["prenom"] ?>">
                    <input placeholder="Date de naissance" type="text" name="DNA" value="<?php echo $data["DNA"] ?>">
                    <input placeholder="Mail de la personne" type="text" name="mail" value="<?php echo $data["mail"] ?>">
                    <input placeholder="Téléphone de la personne" type="text" name="telephone" value="<?php echo $data["telephone"] ?>">
                    <input placeholder="Galop de la personne" type="text" name="galop" value="<?php echo $data["galop"] ?>">
                    <input placeholder="Num licence de la personne" type="text" name="numerolicence" value="<?php echo $data["numerolicence"] ?>">
                    <button name="update" type="submit">Enregistrer</button>
                </form>
                </tbody>  
            </div>
        </div>
    </div>
</body>
</html>