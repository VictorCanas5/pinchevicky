<?php
use MyApp\query\Ejecuta;
use MyApp\data\database;

        session_start();
        if (!isset($_SESSION["admin"])) 
        {
            header("refresh:2 ../alert.php");
        }    
        else
        {
?>
<?php

if (!empty($_POST["btnmodifcar"])) 
{
    if (!empty($_POST["nombre"]) and !empty($_POST["precio"]) and !empty($_POST["exitencia"]) and !empty($_POST["talla"]) and !empty($_POST["color"]))
    {

        $queryM = new Ejecuta();
        extract($_POST);

        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $precio=$_POST["precio"];
        $exitencia=$_POST["exitencia"];
        $talla=$_POST["talla"];
        $color=$_POST["color"];
        $categoria=$_POST["categoria"];
        $categoria_prenda=$_POST["categoria_prenda"];
        $genero=$_POST["genero"];

        $nombreIMG = $_REQUEST["nombre"];
        $imagen = $_FILES["imagen"]["name"];
        $rutaN = $_FILES["imagen"]["tmp_name"];
        $destinoN = "views/scripts/img/".$imagen;
        copy($rutaN,$destinoN);


        $update = "UPDATE productos SET nombre='$nombre', precio='$precio', exitencia='$exitencia', talla='$talla', color='$color', categoria=$categoria, categoria_prenda=$categoria_prenda, genero=$genero, imagen='$destinoN' WHERE cve_prod = $id";

        $consulta = $queryM->ejecuta($update);
        if ($consulta==1)
        {
            header("Location: ../Modificar.php");
        }
        else
        {
            echo "<div class='alert alert-danger'> Error al modificar producto </div>";   
        }
    
    }else
    {
        echo "<div class='alert alert-warning'> Campos vacios </div>";   
    }
}
?>
<?php 
}
?>