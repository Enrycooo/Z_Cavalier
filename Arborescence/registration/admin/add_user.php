<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css" />
</head>
<body>
<?php
require('../../include/defines.inc.php');

if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['type'], $_REQUEST['password'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$username = stripslashes($_REQUEST['username']);
        
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_REQUEST['email']);
        
	// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$password = stripslashes($_REQUEST['password']);
        
	// récupérer le type (user | admin)
	$type = stripslashes($_REQUEST['type']);
	
        // Permet de coder le password en SHA256
        $codage = hash('SHA256', $password);
        
        $request = "INSERT into `users` (username, email, type, password)
                    VALUES (:name, :mail, :type, :pwd)";
        $sql = $conn->prepare($request);
        $sql->bindValue(':name', $username, PDO::PARAM_STR);
        $sql->bindValue(':mail', $email, PDO::PARAM_STR);
        $sql->bindValue(':pwd', $codage, PDO::PARAM_STR);
        $sql->bindValue(':type', $type, PDO::PARAM_STR);
        $sql->execute();
        
    if($sql){
       echo "<div class='sucess'>
             <h3>L'utilisateur a été créée avec succés.</h3>
             <p>Cliquez <a href='home.php'>ici</a> pour retourner à la page d'accueil</p>
			 </div>";
    }
}else{
?>
<form class="box" action="" method="post">
	<h1 class="box-logo box-title"><a href="http://localhost/Z_Cavalier/dashboard/index.php">Dashboard</a></h1>
    <h1 class="box-title">Add user</h1>
	<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
	<div class="input-group">
			<select class="box-input" name="type" id="type" >
				<option value="" disabled selected>Type</option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
	</div>
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="+ Add" class="box-button" />
</form>
<?php } ?>
</body>
</html>