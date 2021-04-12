<?php

Class Core{

    public function __construct()
    {
        $this->run();
        
    }

    public function run(){

       if (isset($_GET['pag']) && !empty($_GET['pag'])) 
       {
            
            $url = filter_input(INPUT_GET,'pag',FILTER_SANITIZE_STRING);
            $url = str_replace(' ','',$url);
            $url = explode('/',$url);

            $controller = $url[0]."Controller";
            echo "Controller = ".$controller;
            array_shift($url);

            if (isset($url) && !empty($url)) 
            {
            
                $metodo = $url[0];
                echo "metodo = ".$metodo;
               array_shift($url);

            } else {
               
                $metodo = 'index';
                echo "metodo = ".$metodo;

            }
        
       }

    }

}

?>