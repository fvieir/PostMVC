<?php

class Comentario 
{
    public static function SelecionarComentarios($id_post){

        $id = $id_post;

        $sql = "SELECT * FROM comentario WHERE id_postagem = :id";
        $con = Conexao::getInstance()->prepare($sql);
        $con->bindvalue('id',$id);
        $con->execute();

        $resultado = array();

        while ($row = $con->fetchObject('Postagem')) {
            $resultado[] = $row;
        }
        
        return $resultado;

    }
}


?>