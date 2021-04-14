<?php

require_once "Model/Conexao.php";

Class HomeController
{
    public function index(){

        $sql = "SELECT * FROM postagem ORDER BY id DESC";
        $con = Conexao::getInstance()->prepare($sql);
        $con->execute();

        var_dump($con->fetchall());

    }
}

?>