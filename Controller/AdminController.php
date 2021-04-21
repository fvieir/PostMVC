<?php

Class AdminController
{
    public function index()
    {
        $postagem = Postagem::listarTodasPostagem();

        $loader = new \Twig\Loader\FilesystemLoader('View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('admin.html');

        $paramentro = array();
        $paramentro['post'] = $postagem;

        /*var_dump($paramentro);
        exit;*/
        $conteudo = $template->render($paramentro);
        print_r($conteudo);
    }

    public function create(){

        $loader = new \Twig\Loader\FilesystemLoader('View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('create.html');

        $paramentro = array();

        $conteudo = $template->render($paramentro);
        echo $conteudo;
    }

    public function insert ()
    {

        try {
            $postagem = Postagem::insert($_POST);
            echo("<script>
                    window.alert('Dados Salvo com sucesso')
                    window.location.href='http://localhost/postagem/admin'
                </script>");
            
        } catch (Exception $e) {
            echo("<script>
                    window.alert('".$e->getMessage()."')
                    window.location.href='http://localhost/postagem/admin/create'
               </script>");
        }
    }

    public function update()
    {
        var_dump($_GET);
        exit;

    }

    public function delete(){

        var_dump($_GET);
        exit;
    }

}   
?>