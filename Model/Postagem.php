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
            throw new Exception("Houve alguma erro, entre em contato com Administrador");
        }
    }

    public static function selecionarId()
    {

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
        } else {
            $resultado->comentarios = Comentario::SelecionarComentarios($resultado->id);     
        } 
            
        return $resultado;
    }

    public static function insert()
    {
        $acao = filter_input(INPUT_POST, 'cadastrar', FILTER_SANITIZE_STRING);
        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
        $conteudo = filter_input(INPUT_POST, 'conteudo', FILTER_SANITIZE_STRING);
        
        // Verifica se clicou no botão Cadastrar, se não tiver clicado e chamado o else
        if (!isset($acao)) 
        {
            throw new Exception("Pagina não encontrada");
        } else {
            //Verifica se esta passando Titulo e conteudo
           if (!isset($titulo) OR !isset($conteudo) OR empty($titulo) OR empty($conteudo)) 
           {
            throw new Exception("Pagina não encontrada");
           } else {
                $sql= "INSERT INTO postagem (titulo,conteudo) VALUES (:titulo, :conteudo)";
                $con = Conexao::getInstance()->prepare($sql);
                $con->bindvalue('titulo',$titulo,PDO::PARAM_STR);
                $con->bindvalue('conteudo',$conteudo,PDO::PARAM_STR);
                $con->execute();

                if ($con->rowCount() == 1) 
                {
                   return true;
                }
           }
        }
        
    }

    public static function update ()
    {

        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
        $conteudo = filter_input(INPUT_POST, 'conteudo', FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

        $sql = "UPDATE postagem SET titulo = :titulo, conteudo = :conteudo WHERE id =:id";
        $con = Conexao::getInstance()->prepare($sql);
        $con->bindValue('titulo',$titulo,PDO::PARAM_STR);
        $con->bindValue('conteudo',$conteudo,PDO::PARAM_STR);
        $con->bindValue('id',$id,PDO::PARAM_INT);
        $con->execute();

        if($con->rowCount() == 1){
            return true;
        } else {
            
            throw new Exception("Erro ao atualizar");
            return false;
        }
    }

    public static function delete(){

        $dados = explode('/',filter_input(INPUT_GET,'pag',FILTER_SANITIZE_STRING));
        $id = $dados[2];

        $sql = "DELETE FROM postagem WHERE id =:id";
        $con = Conexao::getInstance()->prepare($sql);
        $con->bindValue('id',$id,PDO::PARAM_INT);
        $con->execute();

        if ($con->rowCount() == 1
        ) {
            return true;
        } else {
            throw new Exception("Erro ao Deletar registro");
            return false;
        }
    }

    public static function addComentario(){

        $dados = explode('/',filter_input(INPUT_GET,'pag',FILTER_SANITIZE_STRING));
        $id = $dados[2];

        $comentario = filter_input(INPUT_POST, 'comentario',FILTER_SANITIZE_STRING);

        if (!isset($comentario) OR empty($comentario)) {
            throw new Exception("Não é possível fazer comentario vazio!");
        } 

        $sql = "UPDATE comentario SET mensagem = :mensagem WHERE id_postagem = :id";
        $con = Conexao::getInstance()->prepare($sql);
        $con->bindValue('id',$id,PDO::PARAM_STR);
        $con->execute();

        if ($con->rowCount() == 1) {
            return true;
        } else {
            throw new Exception("Erro ao cadastrar comentario");
            
            $id = $con->fetchObject('Postagem');
            return $id;
        }
    }

}

?>