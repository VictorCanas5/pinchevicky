<!doctype html>
<html lang="en">
  <head>
    <title>BZshop</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   
    <style type="text/css">
      @import url('https://fonts.googleapis.com/css?family=Montserrat|Montserrat+Alternates|Poppins&display=swap');
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Montserrat Alternates', sans-serif;
	}
      .perfil{
        box-shadow: 5px 5px 20px rgba(0,0,0,0.4);

      }
      .usuario{
        font-size: calc(1.044375rem + 1.7325vw);;
      }
      .ref{
        text-decoration: none;
        left: 505px;
        color:  black;
      }
      .ref:hover{
        color: rgb(28, 142, 224);
        text-decoration: underline;
      }
     .ref1{
      text-decoration: none;
        left: 505px;
        color:  green;
     }
     .ref1:hover{
        color: rgb(28, 142, 224);
        text-decoration: underline;
      }
      body{
        background-color: #EEEEEE;
      }
      .imgC{
        max-width:100pt;
        border-radius: 40px;
      }
    </style>

  </head> 
  <body>


<?php


use MyApp\Query\Select;
require("../../vendor/autoload.php");
$query = new Select();
$cve=$_GET['cve_prod'];
$producto=$_GET['cve_prod'];

$cadena = "SELECT cve_prod,imagen,nombre,precio,exitencia,prenda, color
FROM productos JOIN categoria_prenda on 
productos.categoria_prenda= categoria_prenda.cve_pcat where cve_prod=$producto";
$id = $query->seleccionar($cadena);
foreach ($id as $dato) {



?>
 <nav class="nav justify-content-center navbar-dark bg-dark ">
              <a class="nav-link disabled" href="">Confirmar Compra</a>
              <?php
                echo "<a class='nav-link clr-blanco' href='../indice.php'>Inicio </a>";
                echo "<a class='nav-link clr-blanco' href='verProducto.php?cve_prod=".$producto."'>Atras </a>";
              ?>
            </nav>
<div class="container"style="margin-top:10pt;">
  <div class="row">
      <div class="col-xl-8">
        <div class="alert alert-secondary perfil" style=' background-color: #F5F5F5;' role="alert">
            <h1>Confirmar Compra: <small class="text-muted"><?php echo $dato->nombre ?></small></h1>
            <h1 class="display-6">Instrucciones</h1>
            <p class="h5" style='color: black'>Para comprar este producto debes imprimir el archivo pdf generado con los datos del producto y entregarlo en el puesto indica en la dirección:</p> 
            <br>
            
            <p><svg xmlns="http://www.w3.org/2000/svg" style='max-width: 20pt;' viewBox="0 0 384 512"><path d="M168.3 499.2C116.1 435 0 279.4 0 192C0 85.96 85.96 0 192 0C298 0 384 85.96 384 192C384 279.4 267 435 215.7 499.2C203.4 514.5 180.6 514.5 168.3 499.2H168.3zM192 256C227.3 256 256 227.3 256 192C256 156.7 227.3 128 192 128C156.7 128 128 156.7 128 192C128 227.3 156.7 256 192 256z"/></svg>
            &nbsp; El bazar se encuentra ubicado en el Blvrd Diagonal de las Fuentes, Rincón de la Merced, 27294.
          </p> <br>
          <div class='container'>
          <div class="alert alert-light row" role="alert">
         <img class='imgC col' src="../scripts/<?php echo $dato->imagen ?>" alt="">
         <h2 class='col'style='color: black; margin-top: 15px'><?php echo $dato->nombre ?></h2>  <br> &nbsp;&nbsp;&nbsp;&nbsp;
         <h3 style='color: black'>$ <?php echo $dato->precio ?></h3>&nbsp;&nbsp;&nbsp; Cantidad: 1
         
          </div><p class="h6" >
            <b>Nota:</b> Al realizar esta compra y generar tu recibo el producto quedará apartado para ti
          </p> 
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="alert alert-secondary perfil"style=' background-color: #FFF159;'role="alert">
          <h4>Resumen de compra</h4> <hr>
          <h5>Productos(1)</h5>
          <p class="h6" >
            Lleva tu recibo de compra a la dirección indicada y recoge tu producto al instante
          </p><br>
          <?php
          if ($dato->exitencia>0) {
            echo "<a class='' href='http://localhost/pinchevicky/views/products/recibo.php?cve_prod=$cve'>
              
            <input class='btn btn-dark' type='submit' value='Comprar (generar pdf)'>
                
            </a>";
          }
          else{
            echo "Producto Comprado, Vuelve al inicio <br>";
            echo "<a class='' href='http://localhost/pinchevicky/views/indice.php'>
              
            <input class='btn btn-dark' type='submit' value='Regresar'>
                
            </a>";
          }
          ?>  
          
        
        </div>
      </div>
  </div>
</div>
<?php
  
}
?>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script type="text/javascript">
        setTimeout("document.location=document.location", 5000);
    </script>
  </body>
</html>