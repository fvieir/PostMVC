<?php

Class PostController{

    public function index(){

        try 
        {
            $postagem = Postagem::selecionarId();
            /*echo"<pre>";
            var_dump($postagem);
            echo"</pre>"*/;

            $loader =  new \Twig\Loader\FilesystemLoader('View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('single.html');

            $parametro = array();

            $parametro['id'] = $postagem->id;
            $parametro['titulo']   = $postagem->titulo;
            $parametro['conteudo'] = $postagem->conteudo;
            $parametro['comentarios'] = $postagem->comentarios;
            //$parametro['id_coment'] = $postagem->id_coment;


            $conteudo = $template->render($parametro);
            print_r($conteudo);

        }catch (Exception $e) {
            echo "Erro ->".$e->getMessage();
        }

    }

    public function addComentario(){
        
        $id = explode('/',filter_input(INPUT_GET,'pag',FILTER_SANITIZE_STRING));
        $id = $id[2];

        try {    
            Comentario::addComentario($_POST);

           echo("<script>
                window.location.href='http://localhost/postagem/post/index/{$id}'
            </script>");

        } catch (Exception $e) {
            echo("<script>
                window.alert('".$e->getMessage()."')
                window.location.href='http://localhost/postagem/Post/index/{$id}'
            </script>");
        }
    }
    
    public function apagarComent(){

        $id = explode('/',filter_input(INPUT_GET,'pag',FILTER_SANITIZE_STRING));
        $id_comet = explode('-',$id[2]); 
        $id = $id_comet[0]; // id do post para redirecionar a pagina
        $id_comet = $id_comet[2]; // id do comentario
        /*var_dump($id_comet, $id);
        exit;*/

        try {
            Comentario::apagarComent($id_comet);
            echo("<script>
                window.location.href='http://localhost/postagem/post/index/{$id}'
            </script>");
        } catch (Exception $e) {
           echo"Erro ->".$e->getMessage();
        }
       
    }
}


?>