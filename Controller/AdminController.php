<?php

Class AdminController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('admin.html');

        $paramentro = array();

        $conteudo = $template->render($paramentro);
        echo($conteudo);

    }

    public function create(){

        $loader = new \Twig\Loader\FilesystemLoader('View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('create.html');

        $paramentro = array();

        $conteudo = $template->render($paramentro);
        echo $conteudo;
    }

    public function insert (){

        $dados = array();
        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
        $conteudo = filter_input(INPUT_POST, 'conteudo', FILTER_SANITIZE_STRING);
        $dados = array($titulo,$conteudo);

        $postagem = Postagem::insert($dados);

        
        
    }

}   
?>