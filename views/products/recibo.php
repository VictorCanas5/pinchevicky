<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <style>
       
       table {
   width: 100%;
   border: 1px solid #000;
   border-collapse:collapse;
}
th, td {
   width: 25%;
   text-align: left;
   vertical-align: top;
   border: 1px solid #000;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;
}

th {
   background: #eee;
}
    </style>
</head>
<body>
<?php

session_start();
use MyApp\Query\Select;
use MyApp\Query\Ejecuta;
require("../../vendor/autoload.php");
$query = new Select();
$insert= new Ejecuta();
$producto=$_GET['cve_prod'];
/* get data product */
$cadena = "SELECT cve_prod,imagen,nombre,precio,exitencia,prenda, color
FROM productos JOIN categoria_prenda on 
productos.categoria_prenda= categoria_prenda.cve_pcat where cve_prod=$producto";
$id = $query->seleccionar($cadena);
$user=$_SESSION['id'];

date_default_timezone_set('America/Mexico_City');
$fecha_actual=date("Y-m-d H:i:s");
/* insert order */
$orden= "INSERT INTO orden (orden.fecha_orden, orden.usr) VALUES ('$fecha_actual','$user')";

$insert->ejecuta($orden);
foreach ($id as $dato) {
    $existencia= $dato->exitencia-1;
    $update= "UPDATE productos SET productos.exitencia='$existencia' WHERE productos.cve_prod='$dato->cve_prod'";
    $insert->ejecuta($update);
    $const = "SELECT * FROM orden where orden.usr= '$user' order by reg DESC;";
    $orden = $query->seleccionar($const);
?>

<div class="container"style="margin-top:10pt;">
  <div class="row">
      <div class="col-xl-8">
        <div class="alert alert-secondary perfil" style=' background-color: #F5F5F5;' role="alert">
            <h1>Compra Confirmada de: <small class="text-muted" style='color: #0079BF'><?php echo $dato->nombre ?></small></h1>
          
            <h2 class="display-6">Instrucciones</h2>
            <p class="h5" style='color: black'>Recoge tu producto en la siguiente dirección: <br>
          <b>  El bazar se encuentra ubicado en el Blvrd Diagonal de las Fuentes, Rincón de la Merced, 27294.</b>
        </p> 
        <h2 class="display-6"style='color: #0079BF'>Precio: $<?php echo $dato->precio ?></h2>
            <br>
         
   
</div>

<h1>Recoge tu compra con clave de orden: <?php echo $orden[0]->reg ?>  </h1> 
recibido:
<?php
  echo $fecha_actual;
}
?>
</body>
</html>
<?php
$html=ob_get_clean();
/* echo $html; */

require_once '../../libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

/* $dompdf->setPaper('letter'); */
$dompdf->setPaper('A4','landscape');

$dompdf->render();
$dompdf->stream("recibo.pdf", array("Attachment" => true));

?>
