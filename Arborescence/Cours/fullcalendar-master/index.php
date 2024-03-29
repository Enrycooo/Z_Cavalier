<?php
require('config.php');
// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION["username"])) {
    echo "<script>alert(\"Veuillez vous connecter en tant qu'admin pour accéder à cette page\")
                      window.location.replace('http://localhost/Z_Cavalier/Arborescence/registration/login.php')</script>";
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Calendrier</title>

    <link href='<?= $dir; ?>packages/core/main.css' rel='stylesheet' />
    <link href='<?= $dir; ?>packages/daygrid/main.css' rel='stylesheet' />
    <link href='<?= $dir; ?>packages/timegrid/main.css' rel='stylesheet' />
    <link href='<?= $dir; ?>packages/list/main.css' rel='stylesheet' />
    <link href='<?= $dir; ?>packages/bootstrap/css/bootstrap.css' rel='stylesheet' />
    <link href="<?= $dir; ?>packages/jqueryui/custom-theme/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
    <link href='<?= $dir; ?>packages/datepicker/datepicker.css' rel='stylesheet' />
    <link href='<?= $dir; ?>packages/colorpicker/bootstrap-colorpicker.min.css' rel='stylesheet' />
    <link href='<?= $dir; ?>style.css' rel='stylesheet' />

    <script src='<?= $dir; ?>packages/core/main.js'></script>
    <script src='<?= $dir; ?>packages/daygrid/main.js'></script>
    <script src='<?= $dir; ?>packages/timegrid/main.js'></script>
    <script src='<?= $dir; ?>packages/list/main.js'></script>
    <script src='<?= $dir; ?>packages/interaction/main.js'></script>
    <script src='<?= $dir; ?>packages/jquery/jquery.js'></script>
    <script src='<?= $dir; ?>packages/jqueryui/jqueryui.min.js'></script>
    <script src='<?= $dir; ?>packages/bootstrap/js/bootstrap.js'></script>
    <script src='<?= $dir; ?>packages/datepicker/datepicker.js'></script>
    <script src='<?= $dir; ?>packages/colorpicker/bootstrap-colorpicker.min.js'></script>
    <script src='<?= $dir; ?>calendar.js'></script>
    <script src='<?= $dir; ?>packages/core/locales/fr.js'></script>
    <link href="../../static/css/bootstrap.min.css" rel="stylesheet" media="all">
</head>

<body>

    <div class="modal fade" id="addeventmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un cours </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="container-fluid">

                        <form id="createEvent" class="form-horizontal">

                            <div class="row">

                                <div class="col-md-6">

                                    <div id="title-group" class="form-group">
                                        <label class="control-label" for="title">Titre</label>
                                        <input type="text" class="form-control" name="title">
                                        <!-- errors will go here -->
                                    </div>

                                    <div id="startdate-group" class="form-group">
                                        <label class="control-label" for="startDate">Date de début</label>
                                        <input type="text" class="form-control datetimepicker" id="startDate" name="startDate">
                                        <!-- errors will go here -->
                                    </div>

                                    <div id="enddate-group" class="form-group">
                                        <label class="control-label" for="endDate">Date de fin</label>
                                        <input type="text" class="form-control datetimepicker" id="endDate" name="endDate">
                                        <!-- errors will go here -->
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div id="color-group" class="form-group">
                                        <label class="control-label" for="color">Couleur</label>
                                        <input type="text" class="form-control colorpicker" name="color" value="#6453e9">
                                        <!-- errors will go here -->
                                    </div>

                                    <div id="textcolor-group" class="form-group">
                                        <label class="control-label" for="textcolor">Couleur de texte</label>
                                        <input type="text" class="form-control colorpicker" name="text_color" value="#ffffff">
                                        <!-- errors will go here -->
                                    </div>

                                    <div id="textcolor-group" class="form-group">
                                        <label class="control-label" for="textcolor">Récurrence :</label>
                                        <select name="recurrence" id="recurrence">
                                            <option>--Choisissez une option--</option>
                                            <option value='0'>Pas de récurrence</option>
                                            <option value="1">Journalier</option>
                                            <option value="2">Hebdomadaire</option>
                                            <option value="3">Mensuel</option>
                                        </select>

                                        <!-- errors will go here -->
                                    </div>

                                </div>

                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>

                        </form>

                    </div>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="editeventmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Mettre à jour un cours</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="container-fluid">

                        <form id="editEvent" class="form-horizontal">
                            <input type="hidden" id="editEventId" name="editEventId" value="">

                            <div class="row">

                                <div class="col-md-6">

                                    <div id="edit-title-group" class="form-group">
                                        <label class="control-label" for="editEventTitle">Titre</label>
                                        <input type="text" class="form-control" id="editEventTitle" name="editEventTitle">
                                        <!-- errors will go here -->
                                    </div>

                                    <div id="edit-startdate-group" class="form-group">
                                        <label class="control-label" for="editStartDate">Date de début</label>
                                        <input type="text" class="form-control datetimepicker" id="editStartDate" name="editStartDate">
                                        <!-- errors will go here -->
                                    </div>

                                    <div id="edit-enddate-group" class="form-group">
                                        <label class="control-label" for="editEndDate">Date de fin</label>
                                        <input type="text" class="form-control datetimepicker" id="editEndDate" name="editEndDate">
                                        <!-- errors will go here -->
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div id="edit-color-group" class="form-group">
                                        <label class="control-label" for="editColor">Couleur</label>
                                        <input type="text" class="form-control colorpicker" id="editColor" name="editColor" value="#6453e9">
                                        <!-- errors will go here -->
                                    </div>

                                    <div id="edit-textcolor-group" class="form-group">
                                        <label class="control-label" for="editTextColor">Couleur de texte</label>
                                        <input type="text" class="form-control colorpicker" id="editTextColor" name="editTextColor" value="#ffffff">
                                        <!-- errors will go here -->
                                    </div>

                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                <button type="button" class="btn btn-danger" id="deleteEvent" data-id>Supprimer</button>
                                <button type="button" class="btn btn-danger" id="deleteREvent" data-parent>Supprimer tout les cours récurent</button>
                            </div>

                        </form>

                    </div>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div>
        <div class="row flex-nowrap">
            <div class="col-auto col-md-2 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="../../../dashboard/index.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Cavalier</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Z_Cavalier/Arborescence/Cavalerie/Cheval_Affiche.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Cheval</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="/Z_Cavalier/Arborescence/Robe/Robe_affiche.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Robe</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="/Z_Cavalier/Arborescence/Pension/Pension_affiche.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Pension</span> </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Z_Cavalier/Arborescence/Type_pension/Type_pension_affiche.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Type Pension</span> </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Z_Cavalier/Arborescence/Cours/fullcalendar-master/index.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Cours</span> </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Z_Cavalier/Arborescence/registration/admin/add_user.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Ajouter un utilisateur</span> </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/Z_Cavalier/Dashboard/assets/img/Admin.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="/Z_Cavalier/Arborescence/registration/logout.php">Se déconnecter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container">
                    <p><br><a></a></p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addeventmodal">
                        Ajouter un cours
                    </button>

                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>