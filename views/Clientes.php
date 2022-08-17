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

    </style>
  </head>
  <body>
            <nav class="nav justify-content-center navbar-dark bg-dark ">
              <a class="nav-link clr-blanco" href="">Regresar</a>
              
            </nav>

            <!-- Tabla select -->

              <div class="md-6">              
                <h1 align="center">Clientes actuales</h1>
                <br>
              </div>
              <form class="d-flex">
                <button class="btn btn-outline-success" name="refresh" type="submit">Refrescar</button>
                <input onkeyup="$enviar" class="form-control me-2" name="busqueda" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" name="enviar" type="submit">Buscar</button>
              </form>
              <?php
                use MyApp\Query\Select;
                use MyApp\data\database;

                if (isset($_GET['enviar'])) 
                {
                  $busqueda= $_GET['busqueda'];

                  require("../vendor/autoload.php");
                  
                  $query = new Select();

                  $cadenaB = "SELECT usuario.id_usr,
                  usuario.correo,
                  usuario.contrasena,
                  persona.nombre,
                  persona.apellidos,
                  persona.tel_celular,
                  rol.rol
                  FROM usuario INNER JOIN persona ON usuario.persona = persona.id_persona
                  INNER JOIN rol ON usuario.rol = rol.cve_rol WHERE usuario.id_usr LIKE '%$busqueda%'
                  OR usuario.correo LIKE '%$busqueda%'
                  OR usuario.contrasena LIKE '%$busqueda%'
                  OR persona.nombre LIKE '%$busqueda%'
                  OR persona.apellidos LIKE '%$busqueda%'
                  OR persona.tel_celular LIKE '%$busqueda%'
                  OR rol.rol LIKE '%$busqueda%'
                  ";

                  $tabla = $query->seleccionar($cadenaB);

                  /* foreach */
                  echo "<table class='table table-hover align='left'>
                  <thead class='table-dark'>
                  <tr>
                  <th> ID_user </th>
                  <th> Correo </th>
                  <th> Contrasena </th>
                  <th> Nombre </th>
                  <th> Apellido </th>
                  <th> Tel_Celular </th>
                  <th> Rol </th>
                  </tr>
                  </thead>
                  <tbody>";

                  foreach($tabla as $registros)
                  {
                    
                    echo "<tr>";
                    echo "<td> $registros->id_usr</td>";
                    echo "<td> $registros->correo </td>";
                    echo "<td> $registros->contrasena </td>";
                    echo "<td> $registros->nombre </td>";
                    echo "<td> $registros->apellidos </td>";
                    echo "<td> $registros->tel_celular </td>";
                    echo "<td> $registros->rol </td>";
                  echo "</td>
                        </tr>";
                  }
                  echo "</tbody>
                  </table>";
                  
                }
                else if ($refresh=true) 
                {
                require("../vendor/autoload.php");
                
                $query = new Select();

                $cadena = "SELECT * FROM usuario
                  INNER JOIN rol ON usuario.rol = rol.cve_rol
                  INNER JOIN persona ON persona.id_persona = usuario.persona
                  ";

                  $tabla = $query->seleccionar($cadena);

                  /* foreach */
                  echo "<table class='table table-hover align='left'>
                  <thead class='table-dark'>
                  <tr>
                  <th> ID_user </th>
                  <th> Correo </th>
                  <th> Contrasena </th>
                  <th> Nombre </th>
                  <th> Apellido </th>
                  <th> Tel_Celular </th>
                  <th> Rol </th>
                  </tr>
                  </thead>
                  <tbody>";

                  foreach($tabla as $registros)
                  {
                    
                    echo "<tr>";
                    echo "<td> $registros->id_usr</td>";
                    echo "<td> $registros->correo </td>";
                    echo "<td> $registros->contrasena </td>";
                    echo "<td> $registros->nombre </td>";
                    echo "<td> $registros->apellidos </td>";
                    echo "<td> $registros->tel_celular </td>";
                    echo "<td> $registros->rol </td>";
                  echo "</td>
                        </tr>";
                  }
                  echo "</tbody>
                  </table>";
                }

                  
                ?>              
                </div>
            </div>
                
              <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>