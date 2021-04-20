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

            $parametro['titulo']   = $postagem->titulo;
            $parametro['conteudo'] = $postagem->conteudo;
            $parametro['comentarios'] = $postagem->comentarios;

            $conteudo = $template->render($parametro);
            print_r($conteudo);

        }catch (Exception $e) {
            echo "Erro ->".$e->getMessage();
        }

    }
}


?>