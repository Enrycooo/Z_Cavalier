    <!DOCTYPE html>
    <html lang="en">
    <?php
    include('../Arborescence/include/defines.inc.php');
    ?>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Centre Equestre REL</title>
        <link rel="icon" type="image/x-icon" href="assets/icon_horse.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>

    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Centre Equestre</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">A propos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#domaine">Domaine</a></li>
                        <li class="nav-item"><a class="nav-link" href="#cours">Cours</a></li>
                        <li class="nav-item"><a class="nav-link" href="#chevaux">Nos Chevaux</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="../Arborescence/Registration/register.php">S'inscrire</a></li>
                        <li class="nav-item"><a class="nav-link" href="../Arborescence/Registration/login.php">Se connecter</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase">Ecurie <i>REL</i></h1>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="text-white mb-4">Ecurie <i>REL</i></h2>
                        <p class="text-white-50">
                            Bienvenue au Centre Équestre REL ! Nous proposons des cours d'équitation pour tous les niveaux, des installations modernes,
                            des chevaux bien dressés et soignés, ainsi que des activités spéciales telles que des promenades en calèche et des stages de voltige.
                            </br>Rejoignez notre communauté équestre et vivez une expérience inoubliable !
                        </p>
                    </div>
                </div>
                <img class="img-fluid" src="assets/img/logo_cheval.png" alt="..." />
            </div>
        </section>
        <!-- Domaine-->
        <section class="projects-section bg-light" id="domaine">
            <div class="container px-4 px-lg-5">
                <!-- Featured Project Row-->
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="assets/img/domaine_equestre.jpg" alt="..." /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Domain de REL</h4>
                            <p class="text-black-50 mb-0">Nos locaux spacieux comprennent un grand manège couvert, des carrières extérieures,
                                des paddocks bien entretenus et des sentiers de randonnée, offrant ainsi un cadre idéal pour pratiquer l'équitation dans les meilleures conditions.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Domaine One Row-->
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="assets/img/ecurie.jpg" alt="..." /></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Nos écuries </h4>
                                    <p class="mb-0 text-white-50">Nos écuries offrent un environnement confortable et sécurisé pour nos chevaux, avec des boxes spacieux et des installations de gestion des déchets modernes.</p>
                                    <hr class="d-none d-lg-block mb-0 ms-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Domaine Two Row-->
                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="assets/img/parc_cheval.jpg" alt="..." /></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h4 class="text-white">Personnels qualifiés</h4>
                                    <p class="mb-0 text-white-50">Notre équipe de professionnels passionnés de l'équitation est là pour vous accueillir chaleureusement,
                                        vous guider dans votre pratique équestre et assurer la sécurité et le bien-être de nos cavaliers et de nos chevaux.
                                    </p>
                                    <hr class="d-none d-lg-block mb-0 me-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Cours-->
        <section class="projects-section bg-light" id="cours">
            <div class="container px-4 px-lg-5">
                <!-- Featured Cours Row-->
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="assets/img/chevaux.jpg" alt="..." /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Cours</h4>
                            <p class="text-black-50 mb-0"> Réserver des cours en passant par un professionel de votre centre equestre</p></br>
                            <a class="btn btn-primary" href="calendar_pres.php" target="_blank">Voir le calendrier</a>
                        </div>
                    </div>
                </div>
                <!-- Nos chevaux-->
                <section class="projects-section bg-light" id="chevaux">
                    <div class="container px-4 px-lg-5">
                        <!-- Nos Chevaux Project Row-->
                        <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                            <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="assets/img/nos_chevaux.jpg" alt="..." /></div>
                            <div class="col-xl-4 col-lg-5">
                                <div class="featured-text text-center text-lg-left">
                                    <h4>Nos Chevaux</h4>
                                    <p class="text-black-50 mb-0">Nos chevaux, élevés avec soin et bénéficiant d'une formation attentive,
                                        sont des partenaires de confiance pour nos cavaliers de tous niveaux. Que vous soyez débutant ou cavalier confirmé,
                                        nos chevaux bien dressés vous offriront une expérience équestre exceptionnelle,.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <?php
                        // Connexion à la base de données
                        $conn = new PDO('mysql:host=localhost; dbname=centre_equestre', 'root');

                        // Requête SQL pour sélectionner les informations nécessaires depuis la base de données
                        $query = "SELECT nom_cheval, race_cheval, SIRE_cheval, photo_cheval FROM cheval";
                        $stmt = $conn->query($query);

                        // Récupération des résultats de la requête sous forme de tableau associatif
                        $chevaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>

                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <!-- Liste des indicateurs du carrousel -->
                            <ol class="carousel-indicators">
                                <!-- Boucle foreach pour générer les indicateurs du carrousel -->
                                <?php foreach ($chevaux as $key => $cheval) : ?>
                                    <!-- Indicateur du carrousel sous forme d'élément de liste -->
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $key ?>" <?= $key == 0 ? 'class="active"' : '' ?>></li>
                                <?php endforeach; ?>
                            </ol>

                            <!-- Contenu des diapositives du carrousel -->
                            <div class="carousel-inner">
                                <?php foreach ($chevaux as $key => $cheval) : ?>
                                    <!-- Diapositive du carrousel avec une condition pour définir la première diapositive comme active -->
                                    <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                                        <img class="image-tableau" src='/Z_Cavalier/Arborescence/static/img_front/<?= $cheval["photo_cheval"] ?>' style="max-width: 100%; max-height: 3500px;">
                                        <div class="carousel-caption d-none d-md-block" style="background: rgba(0, 0, 0, 0.3); padding: 10px; border-radius: 5px;">
                                            <h5 style="color: white;"><?php echo $cheval['nom_cheval'] ?></h5>
                                            <p style="color: white;"> Race : <?php echo $cheval['race_cheval'] ?>
                                                </br>N°Sire : <?= $cheval['SIRE_cheval'] ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Contrôles du carrousel pour passer à la diapositive précédente ou suivante -->
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Précédent</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Suivant</span>
                            </a>
                        </div>

                    </div>
                </section>
                <!-- Signup-->
                <section class="signup-section" id="contact">
                    <div class="container px-4 px-lg-5">
                        <div class="row gx-4 gx-lg-5">
                            <div class="col-md-10 col-lg-8 mx-auto text-center">
                                <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                                <h2 class="text-white mb-5">Abonnez-vous pour recevoir des notifications</h2>
                                <form class="form-signup" id="contactForm" data-sb-form-api-token="API_TOKEN">
                                    <!-- Email address input-->
                                    <div class="row input-group-newsletter">
                                        <div class="col"><input class="form-control" id="emailAddress" type="email" placeholder="Entrer une adresse email..." aria-label="Entrer une adresse email..." data-sb-validations="required,email" /></div>
                                        <div class="col-auto"><button class="btn btn-primary disabled" id="submitButton" type="submit">Prevenez moi !</button></div>
                                    </div>
                                    <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:required">An email is
                                        required.</div>
                                    <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:email">Email is not
                                        valid.</div>
                                    <!-- Submit success message-->
                                    <!---->
                                    <!-- This is what your users will see when the form-->
                                    <!-- has successfully submitted-->
                                    <div class="d-none" id="submitSuccessMessage">
                                        <div class="text-center mb-3 mt-2 text-white">
                                            <div class="fw-bolder">Form submission successful!</div>
                                            To activate this form, sign up at
                                            <br />
                                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                        </div>
                                    </div>
                                    <!-- Submit error message-->
                                    <!---->
                                    <!-- This is what your users will see when there is-->
                                    <!-- an error submitting the form-->
                                    <div class="d-none" id="submitErrorMessage">
                                        <div class="text-center text-danger mb-3 mt-2">Error sending message!</div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Contact-->
                <section class="contact-section bg-black">
                    <div class="container px-4 px-lg-5">
                        <div class="row gx-4 gx-lg-5">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="card py-4 h-100">
                                    <div class="card-body text-center">
                                        <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                        <h4 class="text-uppercase m-0">Addresse</h4>
                                        <hr class="my-4 mx-auto" />
                                        <div class="small text-black-50">12 rue du cheval, 19100 Brive-la-Gaillarde</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="card py-4 h-100">
                                    <div class="card-body text-center">
                                        <i class="fas fa-envelope text-primary mb-2"></i>
                                        <h4 class="text-uppercase m-0">Email</h4>
                                        <hr class="my-4 mx-auto" />
                                        <div class="small text-black-50"><a href="#!">contactREL@gmail.com</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="card py-4 h-100">
                                    <div class="card-body text-center">
                                        <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                        <h4 class="text-uppercase m-0">Tel</h4>
                                        <hr class="my-4 mx-auto" />
                                        <div class="small text-black-50">118 218</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="social d-flex justify-content-center">
                            <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </section>
                <!-- Footer-->
                <footer class="footer bg-black small text-center text-white-50">
                    <div class="container px-4 px-lg-5">Copyright &copy; REL 2022</div>
                </footer>
                <!-- Bootstrap core JS-->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
                <!-- Core theme JS-->
                <script src="js/scripts.js"></script>
                <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>

    </html>