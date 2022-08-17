<!doctype html>
<html lang="en">
  <head>
    <title>Paso 1</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body>
<!-- Section: Design Block -->
<section class=" text-center text-lg-start">
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
  </style>
  <div class="card mb-3">
    <div class="row g-0 d-flex align-items-center">
      <div class="col-lg-4 d-none d-lg-flex">
        <img src="https://media.glamour.mx/photos/6230a86bbfba044201dab866/master/w_1600%2Cc_limit/ropa-segunda-mano-2.jpg" alt="Trendy Pants and Shoes"
          class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" width="550px"/>
      </div>
      <div class="col-lg-8" >
        <div class="card-body py-5 px-md-5">

          <form method="post" action="scripts\AltaUsuario.php">
            <h1 align="center">Registro</h1>
            <br>
          <h3 align="center">Paso 1</h3>
            <!-- Correo -->
            <div class="form-outline mb-4">
                
              <label class="form-label" for="form2Example1">Nombre</label>
              <input type="text" name="nombre" placeholderid="form2Example1" class="form-control" placeholder="Escribe tu nombre"/>
            </div>

            <!-- Contraseña -->
            <div class="form-outline mb-4">
                
              <label class="form-label" for="form2Example2">Apellidos</label>
              <input type="text" name="apellidos" id="form2Example2" class="form-control" placeholder="Escribe tus apellidos"/>
            </div>
             <!-- Numero de telefono -->
             <div class="form-outline mb-4">
                
                <label class="form-label" for="form2Example2">Numero de telefono</label>
                <input type="text" name="numero" id="form2Example2" class="form-control" placeholder="Escribe numero de telefono" />
              </div>

            <div class="row mb-4">
              <div class="col d-flex justify-content-center">
                
                <div class="form-check">
                </div>
              </div>
              <hr>
              <br>

              <div class="">
                <!-- Redireccion a login -->
                <a href="FormLogin.php">Ya tienes cuenta?</a>
              </div>
            </div>
            <!-- Ir al paso 2 -->
            <a href="FormRegistroP2.php">
            <button type="Submit" class="btn btn-primary btn-block mb-4">Siguiente paso</button>
            </a>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
<!-- Section: Design Block -->
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>