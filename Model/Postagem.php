<?php

class Postagem 
{
 
    public static function listarTodasPostagem()
    {
        $sql = "SELECT * FROM postagem ORDER BY id DESC";
        $con = Conexao::getInstance()->prepare($sql);
        $con->execute();

        if ($con->rowCount() >= 1) {
        
        $resultado = array();
        
        while ($row = $con->fetchObject('Postagem')) 
        {
            $resultado[] = $row;
        }
        return $resultado;
        } else {
            throw new Exception("Ocorreu algum erro!");
        }
    }
}


?>