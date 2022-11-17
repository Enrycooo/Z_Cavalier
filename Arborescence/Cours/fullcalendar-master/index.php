<?php require('config.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>Calandar</title>
    
    <link href='<?=$dir;?>packages/core/main.css' rel='stylesheet' />
    <link href='<?=$dir;?>packages/daygrid/main.css' rel='stylesheet' />
    <link href='<?=$dir;?>packages/timegrid/main.css' rel='stylesheet' />
    <link href='<?=$dir;?>packages/list/main.css' rel='stylesheet' />
    <link href='<?=$dir;?>packages/bootstrap/css/bootstrap.css' rel='stylesheet' />
    <link href="<?=$dir;?>packages/jqueryui/custom-theme/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
    <link href='<?=$dir;?>packages/datepicker/datepicker.css' rel='stylesheet' />
    <link href='<?=$dir;?>packages/colorpicker/bootstrap-colorpicker.min.css' rel='stylesheet' />
    <link href='<?=$dir;?>style.css' rel='stylesheet' />

    <script src='<?=$dir;?>packages/core/main.js'></script>
    <script src='<?=$dir;?>packages/daygrid/main.js'></script>
    <script src='<?=$dir;?>packages/timegrid/main.js'></script>
    <script src='<?=$dir;?>packages/list/main.js'></script>
    <script src='<?=$dir;?>packages/interaction/main.js'></script>
    <script src='<?=$dir;?>packages/jquery/jquery.js'></script>
    <script src='<?=$dir;?>packages/jqueryui/jqueryui.min.js'></script>
    <script src='<?=$dir;?>packages/bootstrap/js/bootstrap.js'></script>
    <script src='<?=$dir;?>packages/datepicker/datepicker.js'></script>
    <script src='<?=$dir;?>packages/colorpicker/bootstrap-colorpicker.min.js'></script>
    <script src='<?=$dir;?>calendar.js'></script>
</head>
<body>

<div class="modal fade" id="addeventmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Ajouter un cours</h5>
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

                        </div>

                    </div>

                    

                </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>

            </form>

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

                </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
              <button type="button" class="btn btn-danger" id="deleteEvent" data-id>Supprimer</button>
            </div>

            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="container">

    <p><br><a></a></p>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addeventmodal">
      Ajouter un cours
    </button>

    <div id="calendar"></div>
</div>

</body>
</html>
