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

    public static function selecionarId(){

        $dados = explode('/',filter_input(INPUT_GET,'pag',FILTER_SANITIZE_STRING));
        $id = $dados[2];

        $sql = "SELECT * FROM postagem WHERE id = :id";
        $con = Conexao::getInstance()->prepare($sql);
        $con->bindvalue('id',$id, PDO::PARAM_INT);
        $con->execute();
        
        $resultado = array();

        $resultado = $con->fetchObject('Postagem');

        if (empty($resultado)) {
            throw new Exception("Aconteceu algum erro");
        }

       return $resultado;
        
    }
}


?>