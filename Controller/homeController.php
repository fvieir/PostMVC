<?php

require_once "Model/Conexao.php";
require_once "Model/Postagem.php";

Class HomeController
{
    public function index(){
        
        try {
            $postagem = Postagem::listarTodasPostagem(); // Chama o metodo 

            $loader = new \Twig\Loader\FilesystemLoader('View'); // Faz um autoload do template
            $twig = new \Twig\Environment($loader); // Carrega a varial $loader
            $template = $twig->load('home.html'); // Carrega a pagina dentro do template

            $parametro = array();
            $parametro['post'] = $postagem;

            $conteudo = $template->render($parametro);
            print_r($conteudo);
            
        } catch (Exception $e) {
            echo "Erro -> ".$e->getMessage();
        }
       
    }
}
?>