    <?php
    require('../Arborescence/Cours/fullcalendar-master/config.php');
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <link rel="icon" type="image/x-icon" href="assets/icon_calendar.png" />
        <title>Calendrier des cours</title>

        <link href='<?= $dir; ?>../Arborescence/Cours/fullcalendar-master/packages/core/main.css' rel='stylesheet' />
        <link href='<?= $dir; ?>../Arborescence/Cours/fullcalendar-master/packages/daygrid/main.css' rel='stylesheet' />
        <link href='<?= $dir; ?>../Arborescence/Cours/fullcalendar-master/packages/timegrid/main.css' rel='stylesheet' />
        <link href='<?= $dir; ?>../Arborescence/Cours/fullcalendar-master/packages/list/main.css' rel='stylesheet' />
        <link href='<?= $dir; ?>../Arborescence/Cours/fullcalendar-master/packages/bootstrap/css/bootstrap.css' rel='stylesheet' />
        <link href="<?= $dir; ?>../Arborescence/Cours/fullcalendar-master/packages/jqueryui/custom-theme/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
        <link href='<?= $dir; ?>../Arborescence/Cours/fullcalendar-master/packages/datepicker/datepicker.css' rel='stylesheet' />
        <link href='<?= $dir; ?>../Arborescence/Cours/fullcalendar-master/packages/colorpicker/bootstrap-colorpicker.min.css' rel='stylesheet' />
        <link href='<?= $dir; ?>style2.css' rel='stylesheet' />

        <script src='<?= $dir; ?>../Arborescence/Cours/fullcalendar-master/packages/core/main.js'></script>
        <script src='<?= $dir; ?>../Arborescence/Cours/fullcalendar-master/packages/daygrid/main.js'></script>
        <script src='<?= $dir; ?>../Arborescence/Cours/fullcalendar-master/packages/timegrid/main.js'></script>
        <script src='<?= $dir; ?>../Arborescence/Cours/fullcalendar-master/packages/list/main.js'></script>
        <script src='<?= $dir; ?>../Arborescence/Cours/fullcalendar-master/packages/interaction/main.js'></script>
        <script src='<?= $dir; ?>../Arborescence/Cours/fullcalendar-master/packages/jquery/jquery.js'></script>
        <script src='<?= $dir; ?>../Arborescence/Cours/fullcalendar-master/packages/jqueryui/jqueryui.min.js'></script>
        <script src='<?= $dir; ?>../Arborescence/Cours/fullcalendar-master/packages/bootstrap/js/bootstrap.js'></script>
        <script src='<?= $dir; ?>../Arborescence/Cours/fullcalendar-master/packages/datepicker/datepicker.js'></script>
        <script src='<?= $dir; ?>../Arborescence/Cours/fullcalendar-master/packages/colorpicker/bootstrap-colorpicker.min.js'></script>
        <script src='<?= $dir; ?>../Arborescence/Cours/fullcalendar-master/calendar.js'></script>
        <script src='<?= $dir; ?>../Arborescence/Cours/fullcalendar-master/packages/core/locales/fr.js'></script>
        <link href="/Arborescence/static/css/bootstrap.min.css" rel="stylesheet" media="all">
    </head>

    <body>
        <div class="modal fade" id="editeventmodal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
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
                                        <div id="edit-textcolor-group" class="form-group">
                                            <label class="control-label" for="editTextColor" disabled>Couleur de texte</label>
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