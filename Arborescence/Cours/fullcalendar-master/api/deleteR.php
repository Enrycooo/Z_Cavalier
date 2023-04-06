<?php
include("../config.php");

if (isset($_POST["parent"])) {
    $db->deleteRById('cours',$_POST['parent']);
}
