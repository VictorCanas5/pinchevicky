<!doctype html>
<html lang="en">
  <head>
    <title>BZshop</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="cards.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   
  </head> 
  <body>


<?php
require ('components/navbar.php');

use MyApp\Query\Select;
require("../vendor/autoload.php");
$query = new Select();

$cadena = "SELECT cve_prod,imagen,nombre,precio,exitencia,prenda FROM productos JOIN categoria_prenda on 
productos.categoria_prenda= categoria_prenda.cve_pcat where exitencia>0";

$card = $query->seleccionar($cadena);
?>

<div class="title-cards">
<h2 class="titulo">Algunos de Nuestros Productos</h2>
</div>

<div class="row">
<?php
/* FOREACH */
foreach ($card as $registros){
?>
<div class="container-card col-lg-4">
<div class="card card_t">
<figure class='sizeimg'>
<?php echo "<img src='scripts/$registros->imagen'>";?>
</figure>
<div class="contenido-card">
<h3><?php echo $registros->nombre?></h3>
<p><?php echo "$". $registros->precio?></p>
<p><?php echo "Existencia: " . $registros->exitencia?></p>
<p><?php echo "Categoria: " .  $registros->prenda?></p>
<a href="http://localhost/pinchevicky/views/products/verProducto.php?cve_prod=<?php echo $registros->cve_prod?>"><input type="submit" value="Ver Producto"></a>
<a href=""><input type="submit" value="Agregar al carrito"></a>
</div>
</div>
</div>
<?php
}
?>
<!-- inicio del usuario-->
<figure class="text-center">
  <blockquote class="blockquote">
    <p>FOOTER</p>
  </blockquote>
  <figcaption class="blockquote-footer">
    sexo <cite title="Source Title">anal</cite>
  </figcaption>
</figure>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>