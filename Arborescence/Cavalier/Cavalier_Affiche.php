<?php
include_once('../include/defines.inc.php');
$sql = ("SELECT * FROM personne");
?>
<html>
    <head>
        <title>Back Office Cavalier</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    </head>
    <body>
        <form action="Cavalier_trait.php" method="post">
            <center>
                <input placeholder="Nom" type="text" name="nom">
                <input placeholder="Prenom" type="text" name="prenom">
                <input placeholder="Date de naissance" type="text" name="dna">
                <input placeholder="e-mail" type="text" name="mail">
                <input placeholder="telephone" type="text" name="telephone">
                <input placeholder="galop" type="text" name="galop">
                <input placeholder="numero de licence" type="text" name="numerolicence">
                <button name="create" type="submit id="submit">Enregistrer</button>
            </center>
        </form>
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
                    <tbody>
                        <?php 
                    foreach ($conn->query($sql) as $row) {
                        $id = $row["id"]; ?>
                        <tr data-value="<?php echo $id ?>">
                            <td><center><?php echo $id ?></center></td>
                            <td><center><?php echo $row["nom"] ?></center></td>
                            <td><center><?php echo $row["prenom"] ?></center></td>
                            <td><center><?php echo $row["DNA"] ?></center></td>
                            <td><center><?php echo $row["mail"] ?></center></td>
                            <td><center><?php echo $row["telephone"] ?></center></td>
                            <td><center><?php echo $row["galop"] ?></center></td>
                            <td><center><?php echo $row["numerolicence"] ?></center></td>
                            <td style='display:flex; justify-content: space-evenly;'>
                                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modal<?php echo $id ?>'> Modifier </button>
                            <form action="Cavalier_suppr.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <button type="submit" name="delete" class="delete-btn btn btn-danger">Supprimer</button>
                            </form>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>