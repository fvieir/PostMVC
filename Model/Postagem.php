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

    public static function listarfromDataTables(){
        //Receber a requisão da pesquisa 
        $requestData= $_REQUEST;

        //Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
        $columns = array(
            0 => 'id',
            1 => 'titulo'
        );

        //Obtendo registros de número total sem qualquer pesquisa
        $sql = "SELECT id, titulo FROM postagem";
        $con = Conexao::getInstance()->prepare($sql);
        $con->execute();
        $qtd_linhas = $con->rowCount();

        //Obter os dados a serem apresentados
        $sql_2 = "SELECT id, titulo FROM postagem WHERE 1=1";
        $con2= Conexao::getInstance()->prepare($sql_2);
        $result_post = $con2->execute();
        $totalfilter = $con2->rowCount();

        //Ordenar o resultado
        $sql_2.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
        $con3= Conexao::getInstance()->prepare($sql_2);
        $result_post= $con3->execute();
        
        // Ler e criar o array de dados
        $dados = array();
        while ($row = $con2->fetchall()) {
            $dado = array();
            $dado[] = $row[0];
            $dado[] = $row[1];
            $dados[] = $dado;
        }
        
        $json_data = array(
            "draw" => intval($requestData['draw']),
            "recordsTotal" => intval($qtd_linhas),
            "recordsFiltered" =>intval($totalfilter),
            "data" => $dados
       );

       echo json_encode($json_data);
    }
}

?>