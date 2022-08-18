<?php

class Validar{

public function Auth(){
    
    if($_SESSION['nombre']=="")
    {

      header("refresh: ../../index.php?rol=");
      
    }
    else{
        
    }
 
}

}

?>