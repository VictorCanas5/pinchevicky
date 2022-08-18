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
   
    <?php
use MyApp\query\Login;
require("../../vendor/autoload.php");

$sesion = new Login();
echo " <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css'  integrity='sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor' crossorigin='anonymous'>
<div class='alert alert-success'>";
echo"<h2 align='center'>VUELTE PRONTO</h2>";
echo "</div>";
$sesion->cerrarsesion();
?>
    </div>
</body>
</html>