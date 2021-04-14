<?php

class Conexao {

    public static $con;

    public function getInstance(){

        if(!isset(self::$con)){

            try {
                $con = new PDO('mysql:host=localhost;dbname=postagem', 'root', '');
            } catch (Exception $e) {
               echo "Erro".$e;
            }
            
        }
        return self::$con;

    }

}


?>