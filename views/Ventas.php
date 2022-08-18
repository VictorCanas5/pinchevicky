<!doctype html>
<html lang="en">
  <head>
    <title>Modificar Producto</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        
        @import url('https://fonts.googleapis.com/css?family=Montserrat|Montserrat+Alternates|Poppins&display=swap');
    *{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Montserrat Alternates', sans-serif;
	}
    
	body
    {
		background-color:background: #808080;
        background: -moz-linear-gradient(top, #808080 0%, #B3B3B3 50%, #C5C5C5 100%);
        background: -webkit-linear-gradient(top, #808080 0%, #B3B3B3 50%, #C5C5C5 100%);
        background: linear-gradient(to bottom, #808080 0%, #B3B3B3 50%, #C5C5C5 100%);;
		background-size: 100vw 100vh;
		background-repeat: no-repeat;
	}
    .fondo
    {
        background-color:background: #808080;
        background: -moz-linear-gradient(top, #808080 0%, #B3B3B3 50%, #C5C5C5 100%);
        background: -webkit-linear-gradient(top, #808080 0%, #B3B3B3 50%, #C5C5C5 100%);
        background: linear-gradient(to bottom, #808080 0%, #B3B3B3 50%, #C5C5C5 100%);;
		background-size: 100vw 100vh;
		background-repeat: no-repeat;
    }
    .clr-blanco
    {
        color:white;
    }
    .borde
    {
        border: border-solid;
        border-color:black;
        border-radius:5px;
    }

    </style>
  </head>
  <body>
  <?php

use MyApp\Query\Select;



?>
            <nav class="nav justify-content-center navbar-dark bg-dark ">
              <a class="nav-link disabled" href="#">Agregar Productos</a>
            </nav>

            <!-- Tabla select -->

              <div class="md-6">              
                <h1 align="center">Productos actuales</h1>
                <br>
              </div>
              <form class="d-flex">
                <button class="btn btn-outline-success" name="refresh" type="submit">Refrescar</button>
                <input onkeyup="$enviar" class="form-control me-2" name="busqueda" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" name="enviar" type="submit">Buscar</button>
              </form>
              <?php
                  
                if (isset($_GET['enviar'])) 
                {
                  $busqueda= $_GET['busqueda'];

                  require("../vendor/autoload.php");
                  
                  $query = new Select();

                  $cadena = "SELECT RV.PRODUCTO, 
                  RV.PRECIO, 
                  RV.FECHA_DE_VENTA AS 'FECHA DE VENTA',
                  RV.No_ORDEN,
                  RV.CLIENTE 
                  FROM (SELECT productos.nombre as 'PRODUCTO', 
                  productos.precio as 'PRECIO', 
                  detalle_orden.fecha_detalle AS 'FECHA_DE_VENTA', 
                  orden.reg as 'No_ORDEN', 
                  CONCAT(persona.nombre, ' ',persona.apellidos)as 'CLIENTE' 
                  FROM persona JOIN usuario ON persona.id_persona=usuario.persona 
                  JOIN orden on orden.usr=usuario.id_usr 
                  JOIN detalle_orden on orden.reg = detalle_orden.orden 
                  JOIN productos ON detalle_orden.producto=productos.cve_prod)AS RV
                  WHERE RV.PRODUCTO LIKE '%$busqueda%'
                  OR RV.PRECIO LIKE '%$busqueda%'
                  OR RV.FECHA_DE_VENTA LIKE '%$busqueda%'
                  OR RV.No_ORDEN LIKE '%$busqueda%'
                  OR RV.CLIENTE LIKE '%$busqueda%'
                  ";

                  $tabla = $query->seleccionar($cadena);

                  /* tabla cabeceras */
                  echo "<table class='table table-hover align='left'>
                  <thead class='table-dark'>
                  <tr>
                  <th> Producto </th>
                  <th> Precio </th>
                  <th> Fecha de venta </th>
                  <th> No_Orden </th>
                  <th> Cliente </th>
                  </tr>
                  </thead>
                  <tbody>";
                  /* foreach donde manda a traer los datos*/
                  foreach($tabla as $registros)
                  {
                    
                    echo "<tr>";
                    echo "<td> $registros->PRODUCTO</td>";
                    echo "<td><img src='<?=views/scripts/$registros->PRECIO?>'></td>";
                    echo "<td> $registros->FECHA_DE_VENTA </td>";
                    echo "<td> $registros->No_ORDEN </td>";
                    echo "<td> $registros->CLIENTE </td>";
                  echo "</td>
                        </tr>";
                  }
                  echo "</tbody>
                  </table>";
                  
                }
                else if ($refresh=true) 
                {
                require("../vendor/autoload.php");
                
                $query = new Select();

                $cadena = "SELECT RV.PRODUCTO, 
                  RV.PRECIO, 
                  RV.FECHA_DE_VENTA AS 'FECHA DE VENTA',
                  RV.No_ORDEN,
                  RV.CLIENTE 
                  FROM (SELECT productos.nombre as 'PRODUCTO', 
                  productos.precio as 'PRECIO', 
                  detalle_orden.fecha_detalle AS 'FECHA_DE_VENTA', 
                  orden.reg as 'No_ORDEN', 
                  CONCAT(persona.nombre, ' ',persona.apellidos)as 'CLIENTE' 
                  FROM persona JOIN usuario ON persona.id_persona=usuario.persona 
                  JOIN orden on orden.usr=usuario.id_usr 
                  JOIN detalle_orden on orden.reg = detalle_orden.orden 
                  JOIN productos ON detalle_orden.producto=productos.cve_prod)AS RV";
                  $tabla = $query->seleccionar($cadena);

                  /* tabla cabeceras */
                  echo "<table class='table table-hover align='left'>
                  <thead class='table-dark'>
                  <tr>
                  <th> Producto </th>
                  <th> Precio </th>
                  <th> Fecha de venta </th>
                  <th> No_Orden </th>
                  <th> Cliente </th>
                  </tr>
                  </thead>
                  <tbody>";
                  /* foreach donde manda a traer los datos*/
                  foreach($tabla as $registros)
                  {
                    echo "<tr>";
                    echo "<td> $registros->PRODUCTO</td>";
                    echo "<td><img src='<?=views/scripts/$registros->PRECIO?>'></td>";
                    echo "<td> $registros->FECHA_DE_VENTA </td>";
                    echo "<td> $registros->No_ORDEN </td>";
                    echo "<td> $registros->CLIENTE </td>";
                  echo "</td>
                        </tr>";
                  }
                  echo "</tbody>
                  </table>";
              }

                  
                ?>              
                </div>
            </div>

<?php
/* } */
?>
                
              <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>