<?php

class Conexao {

    public static $con;

    public static function getInstance(){

        if (!isset(self::$con)) 
        {
            try {
                self::$con = new PDO('mysql:host=localhost;dbname=postagem','root','',
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); // retorno das informações do banco em formato UTF8
                self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                echo "Erro->".$e->getMessage();
            }
        }
        return self::$con;
    }    
}


?>