<!doctype html>
<html lang="en">
  <head>
    <title>BZshop</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="cards.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style type="text/css">
      .perfil{
        background-color: white;
        border: solid;
        border-width: 1px;
        border-color: gray;

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
    </style>
  </head> 
  
  <body>

  <?php
    require('../components/navbar.php');
      require('../scripts/validarUser.php');
   
    $correo=$_SESSION["correo"];
    $nombre=$_SESSION["nombre"];
    $apellido=$_SESSION["apellidos"];
    $tel=$_SESSION["tel"];
    
   
  ?> 
 <div class="container">
       <div class="row">
         <div class=" col-md-12 perfil">
          <div class="row"> 
          <div class="col-2"><br><img src="http://assets.stickpng.com/images/585e4beacb11b227491c3399.png" style="width: 70%;">
          </div>
          <div class="col-10 usuario">
            <br><?php echo "$nombre $apellido"; ?> 
        </div>
        </div><br>
        <div class="row">
          <div class="col-2">
            <strong>Usuario</strong>: <?php echo "$nombre"; ?>
          </div>
        </div>
         </div>
         </div> <br> <br>
         <div class="row">
            <div class="col-6 perfil">
              <div class="row">
                 <div class="col-12">
                   <h3>Detalles de usuario</h3> <br>
                   <div class="row">
                     <div class="col-12 usuario1" style="font-size:20px;">
                       <strong>Nombre completo: </strong><?php  echo "$nombre $apellido"; ?>
                     </div>
                   </div>
                 </div> 
                 
                 </div> <br><div class="row" style="font-size:20px;">
                   <div class="col-9">
                     <strong>Correo electronico: </strong><?php 
                       echo "$correo";
                      ?>
                   </div>
                  
              </div> <br>
            </div>
       </div>
    </div> <br><br>
     <br> <br>
      <div  class="row"><div class="col-12 text-center"><a href="http://localhost/pinchevicky/views/indice.php?rol=" class="ref btn" style="text-decoration:none">Volver a inicio</a></div></div>
     <br> <br>
    </div>
        
     </div>
   </div>

        </div>
    
<!-- inicio del usuario-->

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>