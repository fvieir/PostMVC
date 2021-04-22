<?php

Class HomeController
{
    public function index()
    {
    
       try {
            $postagem = Postagem::listarTodasPostagem();
            /*print_r($postagem);
            exit;*/

            $loader = new \Twig\Loader\FilesystemLoader('View'); // Faz um autoload do Template
            $twig = new \Twig\Environment($loader); // Carrega o diretorio do template
            $template = $twig->load('home.html'); //  Carrega a pagina dentro do template

            $parametro = array();
            $parametro['post'] = $postagem; // Armazena os dados vindo do banco de dados
            
            $conteudo = $template->render($parametro); 
            print_r($conteudo);

       } catch (Exception $e) { 
         echo("<script>
                    window.alert('Ainda não existe nenhuma Postagem, crie sua primeira post :-)')
                    window.location.href='http://localhost/postagem/admin/create'
               </script>");
       }
    }
}
?>