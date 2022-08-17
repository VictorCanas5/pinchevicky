<!doctype html>
<html lang="en">
  <head>
    <title>BZshop</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="cards.css">
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
		background-image: url('../src/img/diagonal_striped_brick.png');
	}
    
	.cont-menu{
		width: 100%;
		max-width: 250px;
		background: #FFF383;
	}
    .clr-blanco
    {
        color:white;
    }
    .quitar-borde
    {
        border: none !important;
    }
    .borde 
    {
        border:solid;
        border-color: white;
    }
    .opciones
    {
        margin-top: 2px;

    }

    /*Cards*/
    
   
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">BZ shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="">Inicio</a>
       
        <!-- botones del user-->
        <?php
          session_start();
          $ROL = $_GET['rol'];
          if ($ROL == 1) 
          {
          ?>
        <?php
          }
        ?>
        <?php 
              use MyApp\Query\Select;
              require("../vendor/autoload.php");
              $queryS=new Select();
              $cadena="SELECT categoria_prenda.cve_pcat,categoria_prenda.prenda from categoria_prenda";
              $reg=$queryS->seleccionar($cadena);
              
              echo "<li class='nav-item dropdown clr-blanco'>"; 
              echo "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                      Categorias
                      </a> 
                      <ul class='dropdown-menu bg-dark ' aria-labelledby='navbarDropdown'>";
                      

              foreach($reg as $value)
              {
                
                echo "<li><a class='dropdown-item clr-blanco' href='verCategoria.php?categoria=$value->cve_pcat'>".$value->prenda."</a></li>
                <li><hr class='dropdown-divider'></li>";
              }
              echo "</ul>";
              echo "</li> ";
            ?>
            <?php
                if ($ROL == 0) 
                {
            
            echo "<li class='nav-item dropdown'>"; 
            echo "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                    Administrar
                    </a> 
                    <ul class='dropdown-menu bg-dark ' aria-labelledby='navbarDropdown'>
                    <li><a class='dropdown-item clr-blanco' href='AdminProd.php?rol=$ROL'>Administrar Productos</a></li>
                      <li><hr class='dropdown-divider'></li>
                      <li><a class='dropdown-item clr-blanco' href='AdminVenta.php?rol=$ROL'>Registros de Venta</a></li>
                      <li><hr class='dropdown-divider'></li>
                      <li><a class='dropdown-item clr-blanco' href='AdminClientes.php?rol=$ROL'>Clientes Registrados</a></li>
                    </ul>";
             echo "</li> ";
                }
            ?>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>

<?php
$query = new Select();

$cadena = "SELECT imagen,nombre,precio,exitencia,prenda FROM productos JOIN categoria_prenda on 
productos.categoria_prenda= categoria_prenda.cve_pcat where exitencia>0";

$card = $query->seleccionar($cadena);
?>

<div class="title-cards">
<h2 class="titulo">Algunos de Nuestros Productos</h2>
</div>

<div class="row">
<?php
foreach ($card as $registros){
?>
<div class="container-card col-lg-4">
<div class="card card_t">
<figure class='sizeimg'>
<?php echo "<img src='/scripts/$registros->imagen'>";?>
</figure>
<div class="contenido-card">
<h3><?php echo $registros->nombre?></h3>
<p><?php echo "$". $registros->precio?></p>
<p><?php echo "Existencia: " . $registros->exitencia?></p>
<p><?php echo "Categoria: " .  $registros->prenda?></p>
<a href="#">Ver Producto</a>
<a href="#">Agregar al carrito</a>
</div>
</div>
</div>
<?php
}
?>
<!-- inicio del usuario-->

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>