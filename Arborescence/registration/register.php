<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('../include/defines.inc.php');

if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
    
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$username = stripslashes($_REQUEST['username']);
        
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_REQUEST['email']);
        
	// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$password = stripslashes($_REQUEST['password']);
        
        $codage = hash('SHA512', $password);
        
        $request = "INSERT into `users` (username, email, type, password)
                    VALUES (:name, :mail, 'user', :pwd)";
        $sql = $conn->prepare($request);
        $sql->bindValue(':name', $username, PDO::PARAM_STR);
        $sql->bindValue(':mail', $email, PDO::PARAM_STR);
        $sql->bindValue(':pwd', $codage, PDO::PARAM_STR);
        $sql->execute();

    if($sql){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
			 </div>";
    }
}else{
?>
<form class="box" action="" method="post">
    <h1 class="box-logo box-title"><a href="http://localhost/Z_Cavalier/front/index.html">Centre REL</a></h1>
    <h1 class="box-title">S'inscrire</h1>
	<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>