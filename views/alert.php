<!doctype html>
<html lang="en">
  <head>
    <title>BZshop</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="views\cards.css">
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
		background-image: url('src/img/diagonal_striped_brick.png');
	}
    </style>
</head>
<body>  
    <center>
    <div class='alert alert-warning'> 
    <p align='center'> No eres admin</p>
    <button class="btn btn-warning"><a href='scripts/cerrar.php' style='text-decoration:none'>Cerrar Sesion </button>
    <button  class="btn btn-warning"><a href='../index.php' style='text-decoration:none'>Inicio</button>
    </div>
    </center>
</body>
</html>