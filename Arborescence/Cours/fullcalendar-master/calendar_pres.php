<?php
require('config.php');
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/x-icon" href="../../../front/assets/icon_calendar.png" />
    <title>Cours Disponible</title>

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
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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
                    <h5 class="modal-title">Informations sur le cours</h5>
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
                                        <label class="control-label" for="editEventTitle" disabled>Titre</label>
                                        <input type="text" class="form-control" id="editEventTitle" name="editEventTitle">
                                        <!-- errors will go here -->
                                    </div>
                                    <div id="edit-startdate-group" class="form-group">
                                        <label class="control-label" for="editStartDate" disabled>Date de début</label>
                                        <input type="text" class="form-control datetimepicker" id="editStartDate" name="editStartDate">
                                        <!-- errors will go here -->
                                    </div>
                                    <div id="edit-enddate-group" class="form-group">
                                        <label class="control-label" for="editEndDate" disabled>Date de fin</label>
                                        <input type="text" class="form-control datetimepicker" id="editEndDate" name="editEndDate">
                                        <!-- errors will go here -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="edit-color-group" class="form-group">
                                        <label class="control-label" for="editColor" disabled>Couleur</label>
                                        <input type="text" class="form-control colorpicker" id="editColor" name="editColor" value="#6453e9">
                                        <!-- errors will go here -->
                                    </div>
                                    <div id="edit-textcolor-group" class="form-group" disabled>
                                        <label class="control-label" for="editTextColor">Couleur de texte</label>
                                        <input type="text" class="form-control colorpicker" id="editTextColor" name="editTextColor" value="#ffffff">
                                        <!-- errors will go here -->
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div>
        <div class="row flex-nowrap">

            <div class="col">
                <div class="container">
                    <p><br><a></a></p>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>