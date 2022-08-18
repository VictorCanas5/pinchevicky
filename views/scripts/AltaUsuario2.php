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

      use MyApp\query\Select;
      use MyApp\data\database;
      use MyApp\query\Ejecuta;
      session_start();
      $ROL = $_POST['rol'];
      if ($ROL == NULL) 
      {
        header("refresh:2 ../../index.php");
        
      }   
      require('../../vendor/autoload.php');
     try
     {
       if (isset($_POST["correo"]) && $_POST["contra"])
       { 
         $correo = $_POST['correo'];
         $contra = $_POST['contra'];
           
        if (!empty($contra) && !empty($correo))
       {
           
        $query = new Select();
        $consulta1="SELECT correo FROM usuario WHERE correo='$correo'";
        $buscarcorr = $query->seleccionar($consulta1);
        $cantCorr= COUNT($buscarcorr);
       
        if($cantCorr > 0)
        {
          ?>
            <div class="alert alert-danger" role="alert">
              El Correo Electronico ya esta en uso intenta con otro
            </div>
          <?php
          
          header("refresh:3; ../FormRegistroP1.php");
        }
         else 
         {

          $insert = new Ejecuta();
          
          extract($_POST);
          $id = $_POST['id'];
          $rolayuda = 1;
          $hash=password_hash($contra, PASSWORD_DEFAULT);
     
          $insertuser = "INSERT INTO `usuario` (`correo`, `contrasena`, `persona`, `rol`) 
          VALUES ('$correo', '$hash', '$id', '$rolayuda')";
     
          $insert->ejecuta($insertuser);

          echo "<div class='alert alert-success' align='center' role='alert'>Usuario registrado correctamente!</div>";
          header("refresh:3; ../../index.php"); 
         }}
       }
      
     } 
     
     catch(PDOException $e)
     {
       echo "<div class='alert alert-danger' align='center' role='alert'>". $e->getMessage() . "</div>";
     }   
?>
    


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>