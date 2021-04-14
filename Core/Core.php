<?php

require_once "Controller/HomeController.php";
require_once "Controller/ErrorController.php";

Class Core{

    public function run($pag)
    {
        if (isset($_GET['pag']) && !empty($_GET['pag']))  // Verifica se existe ou se não esta vazio  url
        {
             // Armazena e faz tratativas na varial Get e armazena em variavel
             $url = filter_input(INPUT_GET,'pag',FILTER_SANITIZE_STRING);
             $url = str_replace(' ','',$url);
             $url = explode('/',$url);
 
             // Controler recebe o primeira posição do array
             $controller = ucfirst($url[0]."Controller"); // função converte para maiscula a primeira palavra
             array_shift($url);
 
             // Verifica se tem o metodo na varial Get
             if (isset($url) && !empty($url)) 
             {
                 $metodo = $url[0];

                 array_shift($url);
             } else { // senão existir variavel recebe o valor padrão
                 $metodo = 'index';
             }
        } else { // se a Url vier vazia ou sem preenchimento e setado os valores padrões
            $controller = 'HomeController';
            $metodo = 'index';
        }
        
        // Se não existir a classe chama a pagina de erro.
        $caminho = 'Controller/'.$controller.'php';

        if (!file_exists($caminho) && !class_exists($controller)) {

            $controller = 'ErrorController';
        }

         $objeto = new $controller;
         call_user_func_array(array($objeto, $metodo), array());    
    }
}

?>