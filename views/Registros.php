<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
		background-size: 10000vw 10000vh;
		background-repeat: no-repeat;
	}
    .fondo
    {
        background-color:white;
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
    .acomodo
    {
        width: 700px;
        padding-left: 70px;
        
    }
    .titulo
    {
        text-align: center;
        font
    }
    table
    {
      border-radius: 30px;
    }
    </style>
  </head>
  <body>
  

  <nav class="nav justify-content-center navbar-dark bg-dark ">
              <a class="nav-link disabled" href="#">Reporte de Ventas</a>
              <a class="nav-link clr-blanco" href="AdminProd.php">Regresar</a>
              <a class="nav-link clr-blanco" href="../index.php">Inicio</a>
            </nav>
<br><br>

<h1 class="titulo">Reporte de Ventas</h1>

<!----------------------- Venta General------------------------------------------------------------------------------------------->

    <?php
     use MyApp\Query\Select;
     require("../vendor/autoload.php");
     $query = new Select();
     
     $cadena = "SELECT productos.nombre , productos.precio,
     detalle_orden.fecha_detalle , orden.reg ,
     CONCAT(persona.nombre, ' ',persona.apellidos)as 'CLIENTE' FROM persona JOIN usuario ON persona.id_persona=usuario.persona JOIN orden on orden.usr=usuario.id_usr 
     join detalle_orden on orden.reg = detalle_orden.orden JOIN productos ON detalle_orden.producto=productos.cve_prod LIMIT 10";
     
     $VG = $query->seleccionar($cadena); 
     ?>
     <br><br>
     <div class="row">
      <div class="col">
      <h2>Ultimas 10 ventas</h2>
     <table class="table fondo">
  <thead>
    
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">Precio</th>
      <th scope="col">Fecha de venta</th>
      <th scope="col">No. Orden</th>
      <th scope="col">Cliente</th>
    
  </thead>
    
<?php   
$i=1;
foreach ($VG as $registros){
 
  echo "<tr>";
  echo "<td> $i</td>";
  echo "<td> $registros->nombre</td>";
  echo "<td><h4 >$ $registros->precio</h4></td>";
  echo "<td> $registros->fecha_detalle </td>";
  echo "<td> <h4>$registros->reg </h4></td>";
  echo "<td> $registros->CLIENTE </td>";
echo "</td>
      </tr>";
      $i++;
}
echo "</tbody>
</table>";
?>
      </div>
     <br><br>
      <div class="col">
      <h2>Cantidad de ventas de cada categoria</h2>
     <table class="table fondo">
  <thead>
    
      <th scope="col">#</th>
      <th scope="col">Categoria</th>
      <th scope="col">Ventas</th>
    
  </thead>
     <?php 
     $query = new Select();
     
     $cadena = "SELECT PVC.CATEGORIA, SUM(VENTAS) AS VENTAS FROM (
      SELECT categoria_prenda.prenda as 'CATEGORIA', COUNT(RV.PRODUCTO) AS 'VENTAS' FROM categoria_prenda 
         INNER JOIN 
         (SELECT productos.categoria_prenda AS CATEGORIA_PRENDA,productos.nombre as 'PRODUCTO', 
         productos.precio as 'PRECIO',
         detalle_orden.fecha_detalle AS 'FECHA_DE_VENTA', 
         orden.reg as 'No_ORDEN',
         CONCAT(persona.nombre, ' ',persona.apellidos)as 'CLIENTE' FROM persona 
         JOIN usuario ON persona.id_persona=usuario.persona 
         JOIN orden on orden.usr=usuario.id_usr 
         join detalle_orden on orden.reg = detalle_orden.orden 
         JOIN productos ON detalle_orden.producto=productos.cve_prod)AS RV ON categoria_prenda.cve_pcat = RV.CATEGORIA_PRENDA
         GROUP BY categoria_prenda,RV.PRODUCTO) AS PVC GROUP BY PVC.CATEGORIA";
     
     $PVC = $query->seleccionar($cadena);   
$f=1;
foreach ($PVC as $registros){
 
  echo "<tr>";
  echo "<td> $f</td>";
  echo "<td> $registros->CATEGORIA</td>";
  echo "<td><h4 >$registros->VENTAS</h4></td>";
echo "</td>
      </tr>";
      $f++;
}
echo "</tbody>
</table>";
?>
      </div>
  

<!----------------------- Ventas del mes------------------------------------------------------------------------------------------->



<!----------------------- Ventas del dia------------------------------------------------------------------------------------------->





    <!----------------------- Productos vendidos por categoria------------------------------------------------------------------------------------------->

    <!----------------------- ------------------------------------------------------------------------------------------->









    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>