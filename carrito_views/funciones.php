<?php
use MyApp\query\Ejecuta;
use MyApp\query\Select;


function agregarProductoAlCarrito($idProducto)
{
    // Ligar el id del producto con el usuario a través de la sesión
    $idSesion = session_id();
    require("../vendor/autoload.php");
    $insert=new Ejecuta();
    
    $cadena="INSERT INTO carrito_usuarios(id_per, id_pro) VALUES (?, ?)";
    return $cadena->ejecuta([$idSesion, $idProducto]);
    extract($_POST);

}


function obtenerIdsDeProductosEnCarrito()
{
    $idSesion = session_id();
    require("../vendor/autoload.php");
      $query = new Select();

      $cadena = "SELECT id_pro FROM carrito_usuarios WHERE id_per = ?";

      $sentencia->seleccionar($idSesion);
      return $sentencia->fetchAll(PDO::FETCH_COLUMN);
}

function quitarProductoDelCarrito($idProducto)
{
    $idSesion = session_id();
    $sentencia = "DELETE FROM carrito_usuarios WHERE id_sesion = ? AND id_producto = ?";
    return $sentencia->ejecuta([$idSesion, $idProducto]);
}