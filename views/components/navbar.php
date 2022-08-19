<style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat|Montserrat+Alternates|Poppins&display=swap');
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Montserrat Alternates', sans-serif;
	}
    html{
        overflow-x:hidden;
    }
	body
    {
        
		background-image: url('http://localhost/pinchevicky/src/img/diagonal_striped_brick.png');
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
    body::-webkit-scrollbar{
       
       width: 7px;
   }
   body::-webkit-scrollbar-thumb{
       background: rgb(180, 174, 174);border-radius: 20px;
   }
    /*Cards*/
    
   
    </style>

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost/pinchevicky/views/indice.php">BZ shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active"  aria-current="page" href="http://localhost/pinchevicky/views/indice.php">Inicio</a>
       
        <!-- botones del user-->
        <?php
         use MyApp\Query\Select;

         
         define('__ROOT__', dirname(dirname(__FILE__))); 
        require_once(__ROOT__.'../../vendor/autoload.php');

     
          session_start();
          
          
        ?>
        <?php 
             
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
                if (isset($_SESSION['rol']) && $_SESSION['rol']== 0) 
                {
            
            echo "<li class='nav-item dropdown'>"; 
            echo "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                    Administrar
                    </a> 
                    <ul class='dropdown-menu bg-dark ' aria-labelledby='navbarDropdown'>
                    <li><a class='dropdown-item clr-blanco' href='AdminProd.php'>Administrar Productos</a></li>
                      <li><hr class='dropdown-divider'></li>
                      <li><a class='dropdown-item clr-blanco' href='AdminCategorias.php'>Administrar Categorias</a></li>
                      <li><hr class='dropdown-divider'></li>
                      <li><a class='dropdown-item clr-blanco' href='AdminVenta.php'>Administrar Ventas</a></li>
                      <li><hr class='dropdown-divider'></li>
                      <li><a class='dropdown-item clr-blanco' href='AdminClientes.php'>Clientes Registrados</a></li>
                    </ul>";
             echo "</li> ";
                }
            ?>
      </ul>
      <form class="d-flex" method="GET" action="">
        <input class="form-control me-2" type="search" placeholder="Buscar Producto" aria-label="Search">
        <button class="btn btn-outline-success btn-sm" type="submit">Buscar</button>
      </form>
      
      <ul class="mb-2 mb-lg-0 " style="list-style: none;">  
      <a class="nav-link active" aria-current="page" href="#">
    <!-- Username  <a>--> 
            <?php 
                if (isset($_SESSION["correo"])) {
                    $nombre=$_SESSION['nombre'];
                   
                    echo "<li class='nav-item dropdown clr-blanco'>
                   <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown2' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                          Bienvenido:  &nbsp;&nbsp; $nombre
                            </a> 
                            <ul class='dropdown-menu bg-dark ' aria-labelledby='navbarDropdown2'>
                            <li>  
                            <form class='d-flex' method='GET' action='http://localhost/pinchevicky/views/cliente/verperfil.php?'>
                                
                            <a class='dropdown-item clr-blanco' 
                            href='http://localhost/pinchevicky/views/cliente/verperfil.php?rol='
                            
                            >
                            Ver Perfil
                            </a></li>
                            <li><a class='dropdown-item clr-blanco' 
                            href=''>
                            Historial de compras</a></li>
                            <li><a class='dropdown-item clr-blanco' 
                            href='http://localhost/pinchevicky/views/scripts/cerrar.php'>
                            Cerrar Sesión</a></li>
                            <li><hr class='dropdown-divider'></li>";
                          
                          echo "</ul>";
                          echo "</li>
                          </form> ";
                        }
                 else {
                    echo"<a class='btn btn-outline-primary' href='http://localhost/pinchevicky/index.php?rol='>Ingresar</a>";
                }
                
            ?>
    </a></ul>   
    </div>
   
  </div>
</nav>

