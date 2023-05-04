<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="../style.css" />
	<script>
		// Récupérer les éléments HTML nécessaires
		const selectPersonne = document.getElementById("id_personne");
		const selectType = document.getElementById("type");
		const form = document.querySelector("form");

		// Ajouter un écouteur d'événement "submit" sur le formulaire
		form.addEventListener("submit", (event) => {
			// Empêcher le formulaire d'être envoyé normalement
			event.preventDefault();

			// Vérifier si une personne et un type ont été sélectionnés
			if (!selectPersonne.value || !selectType.value) {
				alert("Veuillez sélectionner une personne et un type.");
				return;
			}

			// Envoyer le formulaire
			form.submit();
		});
	</script>

</head>

<body>
	<?php
	require('../../include/defines.inc.php');
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if (!isset($_SESSION["username"])) {
		echo "<script>alert(\"Veuillez vous connecter en tant qu'admin pour accéder à cette page\")
                      window.location.replace('http://localhost/Z_Cavalier/Arborescence/registration/login.php')</script>";
		exit();
	}

	// Récupérer la liste des personnes pour la sélection
	$request = "SELECT id_personne, nom, prenom FROM personne";
	$sql = $conn->prepare($request);
	$sql->execute();
	$personnes = $sql->fetchAll(PDO::FETCH_ASSOC);

	if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['personne'], $_REQUEST['type'], $_REQUEST['password'])) {
		// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
		$username = stripslashes($_REQUEST['username']);

		// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
		$email = stripslashes($_REQUEST['email']);

		// récupérer la personne liée et supprimer les antislashes ajoutés par le formulaire
		$personne = stripslashes($_REQUEST['personne']);

		// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
		$password = stripslashes($_REQUEST['password']);

		// récupérer le type (user | admin)
		$type = stripslashes($_REQUEST['type']);

		// Permet de coder le password en SHA256
		$codage = hash('SHA256', $password);

		$request = "INSERT into `users` (username, email,  type, password, ref_pers)
                    VALUES (:name, :mail, :type, :pwd, :id_pers)";
		$sql = $conn->prepare($request);
		$sql->bindValue(':name', $username, PDO::PARAM_STR);
		$sql->bindValue(':mail', $email, PDO::PARAM_STR);
		$sql->bindValue(':id_pers', $personne, PDO::PARAM_INT);
		$sql->bindValue(':pwd', $codage, PDO::PARAM_STR);
		$sql->bindValue(':type', $type, PDO::PARAM_STR);
		$sql->execute();

		if ($sql) {
			echo "<div class='sucess'>
             <h3>L'utilisateur a été créé avec succès.</h3>
             <p>Cliquez <a href='home.php'>ici</a> pour retourner à la page d'accueil</p>
			 </div>";
		}
	} else {
	?>
		<form class="box" action="" method="post">
			<h1 class="box-logo box-title"><a href="http://localhost/Z_Cavalier/dashboard/index.php">Dashboard</a></h1>
			<h1 class="box-title">Ajouter un utilisateur</h1>
			<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
			<input type="email" class="box-input" name="email" placeholder="Email" required />
			<div class="input-group">
				<select class="box-input" name="id_pers" id="id_pers" onchange="setIdPers()">
					<option value="" disabled selected>Choisissez la personne</option>
					<?php
					$request = "SELECT id_personne, nom, prenom FROM personne ORDER BY nom ASC";
					$sql = $conn->prepare($request);
					$sql->execute();

					$result = $sql->fetchAll(PDO::FETCH_ASSOC);

					foreach ($result as $row) {
						$id_pers = $row['id_personne'];
						$nom = $row['nom'];
						$prenom = $row['prenom'];
						echo "<option value='$id_pers'>$nom $prenom</option>";
					}
					?>
				</select>
			</div>
			<div class="input-group">
				<select class="box-input" name="type" id="type">
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