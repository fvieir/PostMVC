<?php

Class SobreController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('sobre.html');

        $paramentro = array();

        $conteudo = $template->render($paramentro);
        echo($conteudo);

    }

}   
?>