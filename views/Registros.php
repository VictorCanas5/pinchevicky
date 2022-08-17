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
     
     $cadena = "SELECT productos.nombre as 'PRODUCTO', productos.precio as 'PRECIO',
     detalle_orden.fecha_detalle AS 'FECHA DE VENTA', orden.reg as 'No. ORDEN',
     CONCAT(persona.nombre, ' ',persona.apellidos)as 'CLIENTE' FROM persona JOIN usuario ON persona.id_persona=usuario.persona JOIN orden on orden.usr=usuario.id_usr 
     join detalle_orden on orden.reg = detalle_orden.orden JOIN productos ON detalle_orden.producto=productos.cve_prod;
     
        ";
     
     $VG = $query->seleccionar($cadena); 
     ?><br><br>
     <ul class="list-group acomodo">
<li class="list-group-item"><strong><h2>Ventas General</h2></strong></li>
<?php   
foreach ($VG as $registros){
 ?>

 
            
         
  <li class="list-group-item"><?php echo "Cantidad de Ventas &nbsp &nbsp".($registros->PRODUCTO)?></li>
  <li class="list-group-item"><?php echo "<strong>Suma Total de Ventas</strong> &nbsp &nbsp".($registros->PRECIO)?></li>
 
  <?php
}
?>
</ul>

<!----------------------- Ventas del mes------------------------------------------------------------------------------------------->



<!----------------------- Ventas del dia------------------------------------------------------------------------------------------->





    <!----------------------- Productos vendidos por categoria------------------------------------------------------------------------------------------->

    <?php
     
     $query = new Select();
     
     $cadena = "SELECT categoria_prenda.prenda as 'CATEGORIA', COUNT(RV.PRODUCTO) AS 'VENTAS' FROM categoria_prenda 
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
     GROUP BY categoria_prenda,RV.PRODUCTO;";
     
     $PVC = $query->seleccionar($cadena); 
     ?>

     <br><br><ul class="list-group acomodo">
     <li class="list-group-item"><strong><h2>Productos vendidos por categoria</h2></strong></li>
     <?php
    foreach ($PVC as $registros){
 ?>
            
  <li class="list-group-item"><?php echo "Categoria: &nbsp &nbsp".($registros->CATEGORIA)?></li>
  <li class="list-group-item"><?php echo "Ventas &nbsp &nbsp".($registros->VENTAS)?></li>
  <?php
    }
    ?>
    <!----------------------- ------------------------------------------------------------------------------------------->









    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>