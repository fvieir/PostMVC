<?php

Class AdminController
{
    public function index()
    {
        try {
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
        } catch (Exception $e) {
            echo "Erro -> ".$e->getMessage();
        }  
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

    public function changeId()
    {
        $loader = new \Twig\Loader\FilesystemLoader('View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('update.html');

        $postagem = Postagem::selecionarId();
        $paramentro = array();

        $paramentro['titulo'] = $postagem->titulo;
        $paramentro['conteudo'] = $postagem->conteudo;
        $paramentro['id'] = $postagem->id;

        $conteudo = $template->render($paramentro);
        print_r($conteudo);

    }

    public function update ()
    {

        try {
            $postagem = Postagem::update();
            echo("<script>
                    window.alert('Dados Salvo com sucesso')
                    window.location.href='http://localhost/postagem/admin'
                </script>");
        } catch (Exception $e) {
            echo("<script>
                window.alert('".$e->getMessage()."')
                window.location.href='http://localhost/postagem/admin/changeId/".$_POST['id']."'
             </script>");
        }

    }

    public function delete(){
      
        try {
            $postagem = Postagem::delete();
            echo("<script>
                window.alert('Registro apagado')
                window.location.href='http://localhost/postagem/admin'
            </script>");
        } catch (Exception $e) {
            echo("<script>
                window.alert('".$e->getMessage()."')
                window.location.href='http://localhost/postagem/admin/'
            </script>");
        }
    }

    public function listarfromDataTables(){
        
        Postagem::listarfromDataTables();

    }
}   
?>