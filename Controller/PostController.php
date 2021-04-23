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

            $conteudo = $template->render($parametro);
            print_r($conteudo);

        }catch (Exception $e) {
            echo "Erro ->".$e->getMessage();
        }

    }

    public function addComentario(){
        
        try {
            $postagem = Postagem::addComentario($_POST);

            var_dump($postagem);
            
        } catch (Exception $e) {
            echo("<script>
                window.alert('".$e->getMessage()."')
                window.location.href='http://localhost/Postagem/Post/index'
            </script>");
        }
    }    
}


?>