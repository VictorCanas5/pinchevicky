<?php
include_once "funciones.php";

if (!isset($_POST["cve_prod"])) 
{
    exit("No hay id_producto");
}
agregarProductoAlCarrito($_POST["cve_prod"]);
header("Location: tienda.php");

