<?php
use MyApp\query\Login;
require("../../vendor/autoload.php");

$sesion = new Login();
$sesion->cerrarsesion();
?>