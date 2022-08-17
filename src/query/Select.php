<?php

namespace MyApp\Query;

use PDO;
use PDOException;
use MyApp\Data\Database;

class Select
{
    public function seleccionar($qry)
    {
        try
        {
            $cc=new Database("bzshop","root","");
            $objetoPDO=$cc->getPDO();
            $resultado=$objetoPDO->query($qry);
            $fila=$resultado->fetchAll(PDO::FETCH_OBJ);
            $cc->desconectarDB();
            return $fila;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    
}
?>