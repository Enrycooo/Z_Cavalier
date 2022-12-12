﻿<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
                echo "<script>alert(\"Veuillez vous connecter en tant qu'admin pour accéder à cette page\")
                      window.location.replace('http://localhost/Z_Cavalier/Arborescence/registration/login.php')</script>";
		exit(); 
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - REL</title>
    <link rel="icon" type="image/x-icon" href="assets/img/icon_horse.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger"
            href="http://localhost/Z_Cavalier/front/index.html">
            <span class="d-block d-lg-none">Centre Equestre REL</span>
            <span class="d-none d-lg-block"><img class="img-fluid" src="assets/img/logo_REL.png" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link"
                        href="/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php">CAVALIER</a></li>
                <li class="nav-item"><a class="nav-link"
                        href="/Z_Cavalier/Arborescence/Cavalerie/Cheval_Affiche.php">CHEVAL</a></li>
                <li class="nav-item"><a class="nav-link" href="/Z_Cavalier/Arborescence/Robe/Robe_affiche.php">ROBE</a>
                </li>
                <li class="nav-item"><a class="nav-link"
                        href="/Z_Cavalier/Arborescence/Pension/Pension_affiche.php">PENSION</a></li>
                <li class="nav-item"><a class="nav-link"
                        href="/Z_Cavalier/Arborescence/Cours/fullcalendar-master/index.php">COURS</a></li>
                <li class="nav-item"><a class="nav-link"
                        href="/Z_Cavalier/Arborescence/registration/admin/add_user.php">Ajouter un utilisateur</a></li>
            </ul>
        </div>
    </nav>


    <!-- Page Content-->
    <div class="container-fluid p-0">
        <section class="resume-section" id="about">
            <div class="resume-section-content">
                <h1 class="mb-0">
                    Centre equestre
                    <span class="text-primary">REL</span>
                </h1>
                <div class="subheading mb-5">
                    12 rue du cheval, 19100 Brive-la-Gaillarde
                </div>
            </div>
        </section>
    </div>
</body>

</html>