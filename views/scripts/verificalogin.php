<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../boostrap/css/bootstrap.min.css" type="text/css">
    <script src="../../../boostrap/js/bootstrap.min.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="container">

        <?php
            use MyApp\query\login;
            use MyApp\data\database;

            require("../../vendor/autoload.php");

            $usuarios = new Login();
            extract($_POST);

            $usuarios->verificalogin("$correo","$contrasena");

        ?>
    </div>
</body>
</html>