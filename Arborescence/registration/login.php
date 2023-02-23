<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="style.css" />
</head>

<body>
	<?php
	require('../include/defines.inc.php');
	session_start();

	if (isset($_POST['username'])) {
		$username = stripslashes($_REQUEST['username']);
		$_SESSION['username'] = $username;
		$password = stripslashes($_REQUEST['password']);
		$codage = hash('SHA256', $password);

		$request = "SELECT * FROM `users` WHERE username='$username' 
                    and password='$codage'";
		$sql = $conn->prepare($request);
		$sql->bindValue(':name', $username, PDO::PARAM_STR);
		$sql->bindValue(':pwd', $codage, PDO::PARAM_STR);
		$res = $conn->query($request);

		if ($res->rowCount() == 1) {
			$user = $res->fetch(PDO::FETCH_ASSOC);
			// vérifier si l'utilisateur est un administrateur ou un utilisateur
			if ($user['type'] == 'admin') {
				header('location: http://localhost/Z_Cavalier/dashboard/index.php');
			} else {
				header('location: http://localhost/Z_Cavalier/front/index.html');
			}
		} else {
			$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
		}
	}
	?>
	<form class="box" action="" method="post" name="login">
		<h1 class="box-logo box-title"><a href="http://localhost/Z_Cavalier/front/index.html">Centre REL</a></h1>
		<h1 class="box-title">Connexion</h1>
		<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
		<input type="password" class="box-input" name="password" placeholder="Mot de passe">
		<input type="submit" value="Connexion " name="submit" class="box-button">
		<p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
		<?php if (!empty($message)) { ?>
			<p class="errorMessage"><?php echo $message; ?></p>
		<?php } ?>
	</form>
</body>

</html>