
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body>
  <?php
  use MyApp\Query\Ejecuta;
  session_start();
  
  ?>
  <?php 
    
    require("../../vendor/autoload.php");
    
    $nombre = $_REQUEST["nombre"];
    $imagen = $_FILES["imagen"]["name"];
    $ruta = $_FILES["imagen"]["tmp_name"];
    $destino = "img/".$imagen;
    copy($ruta,$destino);

    $insert=new Ejecuta();
    extract($_POST);
    $cadena="INSERT INTO productos(nombre,precio,exitencia,talla,color,categoria,categoria_prenda,genero,imagen) VALUES
    ('$nombre','$precio','$existencia','$talla','$color',$categoria,$categoria_prenda,$genero,'$destino')";
    $insert->ejecuta($cadena);



    echo "<div class='alert alert-success'>Producto Registrado</div>";
    header("refresh:3; ../AdminProd.php");
?>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>



  