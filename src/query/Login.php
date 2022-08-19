<?php

namespace MyApp\Query;
use PDO;
use PDOException;
use MyApp\Data\database;

class Login
{
    public function verificalogin($correo, $contrasena)
    {
        try
        {
            $pase = 0;
            $cc = new database("bzshop","root","");
            $objetoPDO = $cc->getPDO();

            $query = "SELECT * FROM usuario WHERE correo ='$correo'";
            $consulta = $objetoPDO->query($query);

            while($renglon = $consulta->fetch(PDO::FETCH_ASSOC))
            {
                if (password_verify($contrasena,$renglon['contrasena'])) 
                {
                    $pase =1;  
                }
                
            }
            if($pase > 0 )
            {
                session_start();
                $_SESSION["correo"] = $correo;
                $usuario="SELECT * FROM persona INNER JOIN usuario ON persona.id_persona=usuario.persona INNER JOIN rol ON usuario.rol=rol.cve_rol WHERE correo='$correo'";
                $rol_d = "SELECT rol FROM usuario WHERE correo = '$correo' ";
                $R = $objetoPDO->query($rol_d);
                $fila=$R->fetchAll(PDO::FETCH_OBJ);
                $R2 = $objetoPDO->query($usuario);
                $fila2=$R2->fetchAll(PDO::FETCH_OBJ);
                //get User data
                $_SESSION['id']=$fila2[0]->id_usr;
                $_SESSION['nombre']=$fila2[0]->nombre;
                $_SESSION['apellidos']=$fila2[0]->apellidos;
                $_SESSION["tel"]=$fila2[0]->tel_celular;
               
                $rol = $fila[0]->rol;
                $_SESSION['rol']=$rol;
                echo " <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css'  integrity='sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor' crossorigin='anonymous'>
                <div class='alert alert-success'>";
                echo"<h2 align='center'>Bienvenido/a ".$_SESSION['id']."</h2>";
                echo "</div>";
                header("refresh:1 ../indice.php");
            }
            else
            {
                echo "<div class='alert alert-danger'>";
                echo"<h2 align='center'> Usuario o password incorrecto</h2>";
                echo "</div>";
                header("refresh:1 ../../index.php");
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function cerrarsesion()
    {
        session_start();
        
        session_destroy();
       
        header("refresh:1 ../../views/indice.php");
    }

}