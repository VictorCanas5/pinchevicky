<!--TABLA DE USUARIOS, MOSTRAR PRODUCTOS, POR CADA CHECK METER UN ID A LA VARIABLE Y MANDARLAS PARA HACER UN TICKET-->

<!doctype html>
<html lang="en">
  <head>
    <title>Carrito</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="views/cards.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
  @import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}
/Cards/
.container-card{
	width: 100%;
	display: flex;
	max-width: 1100px;
	margin: auto;
}
.title-cards{
	width: 100%;
	max-width: 1080px;
	margin: auto;
	padding: 20px;
	margin-top: 20px;
	text-align: center;
	color: #7a7a7a;
}
.card{
	width: 100%;
	margin: 20px;
	border-radius: 6px;
	overflow: hidden;
	background:#fff;
	box-shadow: 0px 1px 10px rgba(0,0,0,0.2);
	transition: all 400ms ease-out;
	cursor: default;
}
.card:hover{
	box-shadow: 5px 5px 20px rgba(0,0,0,0.4);
	transform: translateY(-3%);
}
.card img{
	width: 100%;
	height: 210px;
}
.card .contenido-card{
	padding: 15px;
	text-align: center;
}
.card .contenido-card h3{
	margin-bottom: 15px;
	color: #7a7a7a;
}
.card .contenido-card p{
	line-height: 1.8;
	color: #6a6a6a;
	font-size: 14px;
	margin-bottom: 5px;
}
.card .contenido-card a{
	display: inline-block;
	padding: 10px;
	margin-top: 10px;
	text-decoration: none;
	color: #2fb4cc;
	border: 1px solid #2fb4cc;
	border-radius: 4px;
	transition: all 400ms ease;
	margin-bottom: 5px;
}
.card .contenido-card a:hover{
	background: #2fb4cc;
	color: #fff;
}
@media only screen and (min-width:320px) and (max-width:768px){
	.container-card
    {
		Width: 100%;
        Display: Flex;
        Max-width: 1100px;
        flex-wrap: wrap;
	}
	.card{
		margin: 15px;
	}
	.card_t
	{
		background: transparent;
	}
}
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
          <a class="nav-link active" aria-current="page" href="Prod_Carrito.php">Carrito</a>
        </li>
		<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../views/login.php">Login</a>
        </li>
      </ul>
      
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>
    <?php
	use MyApp\query\Select;
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
  foreach ($card as $registros){
  ?>
<div class="container-card col-lg-4">
<div class="card card_t">
	<figure class='sizeimg'>
		<?php echo "<img src='../views/scripts/$registros->imagen'>";?>
	</figure>
	<div class="contenido-card">
		<h3>Nombre: <?php echo $registros->nombre ?></h3>
		<p>Precio: <?php echo $registros->precio?></p>
    	<p>Existencias: <?php echo $registros->exitencia?></p>
    	<p>Tipo de Prenda: <?php echo $registros->prenda?></p>
		<a href="#">Ver Producto</a>
		<form action="agregar_al_carrito.php" method="post">
        	<input type="hidden" name="cve_prod" value="<?=$registros->cve_prod ?>">
                <button class="btn btn-primary">
                        <i"></i>&nbsp;Agregar al carrito
                </button>
        </form>
	</div>
  </div>
</div>
<?php } ?>
</div>
            


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>