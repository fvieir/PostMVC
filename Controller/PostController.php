<?php

Class PostController{

    public function index(){

        try {
            $postagem = Postagem::selecionarId();

            $loader = new \Twig\Loader\FilesystemLoader('View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('single.html');

            $parametro = array();
            $parametro['titulo'] = $postagem->titulo;
            $parametro['conteudo'] =$postagem->conteudo;

            $comentario = Postagem::listaComentarios();
            var_dump($comentario);

            $conteudo = $template->render($parametro,$comentario);
            print_r($conteudo);
    

        } catch (Exception $e) {
            echo "Erro ->".$e->getMessage();
        }

    }
}


?>