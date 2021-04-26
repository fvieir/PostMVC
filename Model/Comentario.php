<?php

class Comentario 
{
    public static function SelecionarComentarios($id_post)
    {
        $id = $id_post;

        $sql = "SELECT * FROM comentario WHERE id_postagem = :id ORDER BY id_coment DESC";
        $con = Conexao::getInstance()->prepare($sql);
        $con->bindvalue('id',$id);
        $con->execute();

        $resultado = array();

        while ($row = $con->fetchObject('Postagem')) {
            $resultado[]= $row;
        }

       /* echo"<pre>";
        var_dump($resultado);
        echo"</pre>";
        exit;*/
        return $resultado;

    }

    public static function addComentario()
    {
        $id = explode('/',filter_input(INPUT_GET,'pag',FILTER_SANITIZE_STRING));
        $id = $id[2];
        $nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
        $comentario = filter_input(INPUT_POST,'comentario',FILTER_SANITIZE_STRING);

        if (!isset($comentario) OR empty($comentario)) {

            throw new Exception("Não é possível fazer um comentário em branco!");
        }

        $sql = "INSERT INTO comentario (nome, mensagem, id_postagem) VALUES (:nome, :comentario, :id)";
        $con = Conexao::getInstance()->prepare($sql);
        $con->bindValue('nome',$nome,PDO::PARAM_STR);
        $con->bindValue('comentario',$comentario,PDO::PARAM_STR);
        $con->bindValue('id',$id,PDO::PARAM_STR);
        $con->execute();

        if ($con->rowCount()== 1) {
            return true;            
        } else {
            throw new Exception("Erro ao inserir comentário!");
        }

    }

    public static function apagarComent($id)
    {

        $sql = "DELETE FROM comentario WHERE id_coment = :id";
        $con = Conexao::getInstance()->prepare($sql);
        //var_dump($con = Conexao::getInstance()->prepare($sql));
        $con->bindValue('id', $id);
        $con->execute();

        if ($con->execute()) {
            return true;
        } else {
            throw new Exception("Erro ao deletar registo!");
        }
    }
}


?>