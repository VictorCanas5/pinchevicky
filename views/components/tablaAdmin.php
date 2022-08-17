<?php
    namespace MyApp\Query;
    use PDO;
    use PDOException;
    use MyApp\Data\database;
    class Tabla
    {
      public function GetTipoTabla($tipoTabla){
                try {
                   if(isset($_GET['perfil'])){

                   }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
        }
    }
?>