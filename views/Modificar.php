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
    .contenedores
    {
      background-color: #212529;
      color:white;
      border-radius:5px;
      width:6%;
      margin:auto;
      margin-top:15px;
      padding: 6px;
    }
    .contenedores1
    {
      background-color: #212529;
      color:white;
      border-radius:5px;
      width:8%;
      margin:auto;
      margin-left:15px;
      margin-right:15px;      
      margin-top:15px;
      padding: 6px;
    }
    .imagensita
    {
      width:60px;
    }

    </style>
  </head>
  <body>
  <?php
    use MyApp\Query\Select;
    require("../vendor/autoload.php");
?>
            <nav class="nav justify-content-center navbar-dark bg-dark ">
              <a class="nav-link disabled" href="">Modificar Producto</a>
              <?php
                echo "<a class='nav-link clr-blanco' href='AdminProd.php'>Regresar</a>";
                
                echo "<a class='nav-link clr-blanco' href='indice.php'>Inicio</a>";
              ?>
              
            </nav>

            <!-- Tabla select -->


              <div class="md-6">              <br>
                <h1 align="center">Buscar productos</h1>

                <br>
              </div>
              <form class="d-flex">
                <button class="btn btn-success" name="refresh" type="submit"><strong>Refrescar</strong></button>
                <input onkeyup="$enviar" class="form-control me-2" name="busqueda" type="search" placeholder="Escribe algo relacionado con el producto (nombre, categoria, talla, etc)" aria-label="Search">
                <button class="btn btn-success" name="enviar" type="submit"><strong>Buscar</strong></button>
              </form>
              <br>
              <div style="text-align: center" class="row">
               <h4>Tambien puedes buscar productos por:</h4>
              <div class="contenedores col">
              <?php 
             
             $queryS=new Select();
             $cadena="SELECT categoria_prenda.cve_pcat,categoria_prenda.prenda from categoria_prenda";
             $reg=$queryS->seleccionar($cadena);

             echo "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                     Categorias
                     </a> 
                     <ul class='dropdown-menu bg-dark ' aria-labelledby='navbarDropdown'>
                     ";
                     

             foreach($reg as $value)
             {
               
               echo "<li><a class='dropdown-item clr-blanco' href='Modificar.php?categoria=$value->cve_pcat'>".$value->prenda."</a></li>
               <li><hr class='dropdown-divider'></li>";
             }
             echo "</ul>";
             echo "</li> ";
           ?>
              </div>
              <div class="contenedores1 col">
              <?php 
              require("../vendor/autoload.php");
              $queryS=new Select();
              $cadena="SELECT categoria.cve_cat,categoria.nom_cat from categoria";
              $reg=$queryS->seleccionar($cadena);
              
              echo " <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
              Tipo de prenda</a> 
              <ul class='dropdown-menu bg-dark ' aria-labelledby='navbarDropdown'>";

              foreach($reg as $value)
              {
                echo "<li><a class='dropdown-item clr-blanco' href='Modificar.php?tipo=$value->cve_cat'>".$value->nom_cat."</a></li>
                <li><hr class='dropdown-divider'></li> ";
              }
              echo "</ul>";
              echo "</li> ";
            ?>
              </div>
              <div class="contenedores1 col">
              <?php 
              require("../vendor/autoload.php");
              $queryS=new Select();
              $cadena="SELECT genero.cve_gen, genero.genero FROM genero";
              $reg=$queryS->seleccionar($cadena);
              
              echo "  
              <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
              Genero</a> 
              <ul class='dropdown-menu bg-dark' aria-labelledby='navbarDropdown'>";

              foreach($reg as $value)
              {
                echo "<li><a class='dropdown-item clr-blanco' href='Modificar.php?genero=$value->cve_gen'>".$value->genero."</a></li>
                <li><hr class='dropdown-divider'></li>";
              }
              echo "</ul>";
              echo "</li> ";
            ?>
              </div>
              <br><br><br>
              <?php
              if(isset($_GET['categoria']))
              {
                $cat = $_GET['categoria'];
                $query = new Select();
  
                $cadena = "SELECT
                productos.imagen,
                productos.cve_prod,
                productos.nombre,
                productos.precio,
                productos.exitencia,
                productos.talla,
                productos.color,
                categoria.nom_cat,
                categoria_prenda.prenda,
                genero.genero
                FROM productos
                INNER JOIN categoria ON productos.categoria = categoria.cve_cat
                INNER JOIN categoria_prenda ON productos.categoria_prenda = categoria_prenda.cve_pcat
                INNER JOIN genero ON productos.genero = genero.cve_gen WHERE exitencia>0 and categoria_prenda.cve_pcat=$cat";
                
                $tabla = $query->seleccionar($cadena);

                echo 
                  "<table class='table table-hover align='left'>
                  <thead class='table-dark'>
                  <tr>
                  <th> ID_Producto</th>
                  <th> Imagen</th>
                  <th> Producto</th>
                  <th> Precio</th>
                  <th> Existencias</th>
                  <th> Talla</th>
                  <th> Color</th>
                  <th> Categoria</th>
                  <th> Tipo_Prenda</th>
                  <th> Genero</th>
                  <th> Modificar</th>
                  </tr>
                  </thead>
                  <tbody>";
                  foreach($tabla as $registros)
                  {
                    
                    echo "<tr class='fondo'>";
                    echo "<td> $registros->cve_prod</td>";
                    echo "<td><img class='imagensita' src='scripts/$registros->imagen?>'></td>";
                    echo "<td> $registros->nombre </td>";
                    echo "<td> $registros->precio </td>";
                    echo "<td> $registros->exitencia </td>";
                    echo "<td> $registros->talla </td>";
                    echo "<td> $registros->color </td>";
                    echo "<td> $registros->nom_cat </td>";
                    echo "<td> $registros->prenda</td>";
                    echo "<td> $registros->genero </td>";
                    echo " <td><a href='EstasModificando.php?id=$registros->cve_prod' class='list-group-item list-group-item-action flex-column align-items-start'>
                          <small><img src='../src/img/editar.png' alt='' width='20px'></small>
                          </a>";
                  echo "</td>
                        </tr>";
                  }
                  echo "</tbody>
                  </table>";
              }
              
              ?>
                
              </div>
              <br><br><br>
              <?php
              if(isset($_GET['tipo']))
              {
                $cat = $_GET['tipo'];
                $query = new Select();
  
                $cadena = "SELECT
                productos.imagen,
                productos.cve_prod,
                productos.nombre,
                productos.precio,
                productos.exitencia,
                productos.talla,
                productos.color,
                categoria.nom_cat,
                categoria_prenda.prenda,
                genero.genero
                FROM productos
                INNER JOIN categoria ON productos.categoria = categoria.cve_cat
                INNER JOIN categoria_prenda ON productos.categoria_prenda = categoria_prenda.cve_pcat
                INNER JOIN genero ON productos.genero = genero.cve_gen WHERE exitencia>0 and productos.categoria=$cat";
                
                $tabla = $query->seleccionar($cadena);

                echo 
                  "<table class='table table-hover align='left'>
                  <thead class='table-dark'>
                  <tr>
                  <th> ID_Producto</th>
                  <th> Imagen</th>
                  <th> Producto</th>
                  <th> Precio</th>
                  <th> Existencias</th>
                  <th> Talla</th>
                  <th> Color</th>
                  <th> Categoria</th>
                  <th> Tipo_Prenda</th>
                  <th> Genero</th>
                  <th> Modificar</th>
                  </tr>
                  </thead>
                  <tbody>";
                  foreach($tabla as $registros)
                  {
                    
                    echo "<tr class='fondo'>";
                    echo "<td> $registros->cve_prod</td>";
                    echo "<td><img class='imagensita' src='scripts/$registros->imagen?>'></td>";
                    echo "<td> $registros->nombre </td>";
                    echo "<td> $registros->precio </td>";
                    echo "<td> $registros->exitencia </td>";
                    echo "<td> $registros->talla </td>";
                    echo "<td> $registros->color </td>";
                    echo "<td> $registros->nom_cat </td>";
                    echo "<td> $registros->prenda</td>";
                    echo "<td> $registros->genero </td>";
                    echo " <td><a href='EstasModificando.php?id=$registros->cve_prod' class='list-group-item list-group-item-action flex-column align-items-start'>
                          <small><img src='../src/img/editar.png' alt='' width='20px'></small>
                          </a>";
                  echo "</td>
                        </tr>";
                  }
                  echo "</tbody>
                  </table>";
              }
              
              ?>
               <?php
              if(isset($_GET['genero']))
              {
                $cat = $_GET['genero'];
                $query = new Select();
  
                $cadena = "SELECT
                productos.imagen,
                productos.cve_prod,
                productos.nombre,
                productos.precio,
                productos.exitencia,
                productos.talla,
                productos.color,
                categoria.nom_cat,
                categoria_prenda.prenda,
                genero.genero
                FROM productos
                INNER JOIN categoria ON productos.categoria = categoria.cve_cat
                INNER JOIN categoria_prenda ON productos.categoria_prenda = categoria_prenda.cve_pcat
                INNER JOIN genero ON productos.genero = genero.cve_gen WHERE exitencia>0 and productos.genero=$cat";
                
                $tabla = $query->seleccionar($cadena);

                echo 
                  "<table class='table table-hover align='left'>
                  <thead class='table-dark'>
                  <tr>
                  <th> ID_Producto</th>
                  <th> Imagen</th>
                  <th> Producto</th>
                  <th> Precio</th>
                  <th> Existencias</th>
                  <th> Talla</th>
                  <th> Color</th>
                  <th> Categoria</th>
                  <th> Tipo_Prenda</th>
                  <th> Genero</th>
                  <th> Modificar</th>
                  </tr>
                  </thead>
                  <tbody>";
                  foreach($tabla as $registros)
                  {
                    
                    echo "<tr class='fondo'>";
                    echo "<td> $registros->cve_prod</td>";
                    echo "<td><img class='imagensita' src='scripts/$registros->imagen?>'></td>";
                    echo "<td> $registros->nombre </td>";
                    echo "<td> $registros->precio </td>";
                    echo "<td> $registros->exitencia </td>";
                    echo "<td> $registros->talla </td>";
                    echo "<td> $registros->color </td>";
                    echo "<td> $registros->nom_cat </td>";
                    echo "<td> $registros->prenda</td>";
                    echo "<td> $registros->genero </td>";
                    echo " <td><a href='EstasModificando.php?id=$registros->cve_prod' class='list-group-item list-group-item-action flex-column align-items-start'>
                          <small><img src='../src/img/editar.png' alt='' width='20px'></small>
                          </a>";
                  echo "</td>
                        </tr>";
                  }
                  echo "</tbody>
                  </table>";
              }
              
              ?>
              <?php

                  
                if (isset($_GET['enviar'])) 
                {
                  $busqueda= $_GET['busqueda'];

                  require("../vendor/autoload.php");
                  
                  $query = new Select();

                  $cadena = "SELECT
                    productos.imagen,
                    productos.cve_prod,
                    productos.nombre,
                    productos.precio,
                    productos.exitencia,
                    productos.talla,
                    productos.color,
                    categoria.nom_cat,
                    categoria_prenda.prenda,
                    genero.genero
                    FROM productos
                    INNER JOIN categoria ON productos.categoria = categoria.cve_cat
                    INNER JOIN categoria_prenda ON productos.categoria_prenda = categoria_prenda.cve_pcat
                    INNER JOIN genero ON productos.genero = genero.cve_gen WHERE exitencia>0 and(productos.cve_prod LIKE '%$busqueda%'
                    OR productos.nombre LIKE '%$busqueda%'
                    OR productos.precio LIKE '%$busqueda'
                    OR productos.exitencia LIKE '%$busqueda%'
                    OR productos.talla LIKE '%$busqueda%'
                    OR productos.color LIKE '%$busqueda%'
                    OR productos.nombre LIKE '%$busqueda%'
                    OR categoria.nom_cat LIKE '%$busqueda%'
                    OR categoria_prenda.prenda LIKE '%$busqueda%'
                    OR genero.genero LIKE '%$busqueda%')";

                  $tabla = $query->seleccionar($cadena);

                  
                  echo 
                  "<table class='table-primary table-hover align='left'>
                  <thead class='table-dark'>
                  <tr>
                  <th> ID_Producto</th>
                  <th> Imagen</th>
                  <th> Producto</th>
                  <th> Precio</th>
                  <th> Existencias</th>
                  <th> Talla</th>
                  <th> Color</th>
                  <th> Categoria</th>
                  <th> Tipo_Prenda</th>
                  <th> Genero</th>
                  <th> Modificar</th>
                  </tr>
                  </thead>
                  <tbody>";

                  foreach($tabla as $registros)
                  {
                    
                    echo "<tr class='fondo'>";
                    echo "<td> $registros->cve_prod</td>";
                    echo "<td><img class='imagensita' src='scripts/$registros->imagen?>'></td>";
                    echo "<td> $registros->nombre </td>";
                    echo "<td> $registros->precio </td>";
                    echo "<td> $registros->exitencia </td>";
                    echo "<td> $registros->talla </td>";
                    echo "<td> $registros->color </td>";
                    echo "<td> $registros->nom_cat </td>";
                    echo "<td> $registros->prenda</td>";
                    echo "<td> $registros->genero </td>";
                    echo " <td><a href='EstasModificando.php?id=$registros->cve_prod' class='list-group-item list-group-item-action flex-column align-items-start'>
                          <small><img src='../src/img/editar.png' alt='' width='20px'></small>
                          </a>";
                  echo "</td>
                        </tr>";
                  }
                  echo "</tbody>
                  </table>";
                  
                }
                

                  
                ?>              
                </div>
            </div>
          </div>
              <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>