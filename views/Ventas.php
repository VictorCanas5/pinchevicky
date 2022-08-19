<!doctype html>
<html lang="en">
  <head>
    <title>Ordenes</title>
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
        
		background-image: url('http://localhost/pinchevicky/src/img/diagonal_striped_brick.png');
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
    .fecha
    {
      width:50%;
      margin: auto;
    }
    .buscar
    {
      width:20%;
      margin: auto;
    }
    .contenedor
    {
      text-align: center;
    }
    .resaltar
    {
      text-decoration: strong;
    }

    </style>
  </head>
  <body>
  <?php
  use MyApp\Query\Select;
  require_once("../vendor/autoload.php");
  require ('components/navbar.php');
?>
            <!-- Tabla select -->
            <h1 align="center">Ordenes Activas</h1>
                <br>
            <div class="row">
            <div class="containermd-6 offset-lg-4">              
                
              </div>
              <form class="d-flex">
                <button class="btn btn-outline-success" name="refresh" type="submit">Refrescar</button>
                <input onkeyup="$enviar" class="form-control me-2" name="busqueda" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" name="enviar" type="submit">Buscar</button>
              </form>
            </div>
            <br><br>
            <div class="contenedor row">
              
              <label for="fecha_detalle" ><strong>Buscar por fecha/periodo</strong></label><br>
              <form  method="POST">
              <div class="">
                <small>Fecha 1</small>
                <input  required class="form-control fecha" name="fecha_detalle1"type="date" />
                </div>
                <div class="">
                <small>Fecha 2</small> <input required class="form-control fecha" name="fecha_detalle2"type="date" />
                </div>
                <br>
                <button class="btn btn-outline-success buscar" name="mandar" type="submit">Buscar</button>
                
            </div>
              </form>
               
              <br>
              <?php
                  
                if (isset($_GET['enviar'])) 
                {
                  $busqueda= $_GET['busqueda'];

                  require("../vendor/autoload.php");
                  
                  $query = new Select();

                  $cadena = "SELECT RV.PRODUCTO, 
                  RV.PRECIO, 
                  RV.FECHA_DE_VENTA AS 'FECHA_DE_VENTA',
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
                  JOIN productos ON detalle_orden.producto=productos.cve_prod where detalle_orden.estado='Activo')AS RV
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
                  <th> Precio estimado</th>
                  <th> Fecha de orden </th>
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
                    echo "<td><h3>$ $registros->PRECIO</h3></td>";
                    echo "<td> $registros->FECHA_DE_VENTA </td>";
                    echo "<td> <h4>$registros->No_ORDEN </h4></td>";
                    echo "<td> $registros->CLIENTE </td>";
                  echo "</td>
                        </tr>";
                  }
                  echo "</tbody>
                  </table>";
                  
                }
               
                  
                  
                  else if (isset($_POST['fecha_detalle1'])&&isset($_POST['fecha_detalle2'])) 
                  {
                    $fecha1= $_POST['fecha_detalle1'];
                    $fecha2= $_POST['fecha_detalle2'];
                    
                  require("../vendor/autoload.php");
                  
                  $query = new Select();
  
                    $cadena = "SELECT RV.PRODUCTO, 
                    RV.PRECIO, 
                    RV.FECHA_DE_VENTA AS 'FECHA_DE_VENTA',
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
                    JOIN productos ON detalle_orden.producto=productos.cve_prod where detalle_orden.estado='Activo')AS RV
                    WHERE RV.FECHA_DE_VENTA between'$fecha1' and '$fecha2'
                    ";
  
                    $tabla = $query->seleccionar($cadena);
  
                    /* tabla cabeceras */
                    echo "<table class='table table-hover align='left'>
                    <thead class='table-dark'>
                    <tr>
                    <th> Producto </th>
                    <th> Precio estimado</th>
                    <th> Fecha de orden </th>
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
                      echo "<td><h2 >$ $registros->PRECIO</h2></td>";
                      echo "<td> $registros->FECHA_DE_VENTA </td>";
                      echo "<td> <h4>$registros->No_ORDEN </h4></td>";
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
              <script src="..\js\datapicker.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>