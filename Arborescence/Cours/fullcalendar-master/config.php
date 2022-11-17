<?php
require('vendor/autoload.php');

use Dcblogdev\PdoWrapper\Database;

$options = [
    'host' => "localhost",
    'database' => "centre_equestre",
    'username' => "root",
    'password' => ""
];
$db = new Database($options);

$dir = "./";
