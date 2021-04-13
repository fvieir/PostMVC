<?php 
require_once "Core/Core.php";
require_once "Controller/ErrorController.php";
require_once "Controller/HomeController.php";

$template = file_get_contents('View/template.html');

ob_start(); // Conteudo a ser caputurado entre o bloco ob_start ate ob_clean()
    $core = new Core();
    $core->run($_GET);
    $saida = ob_get_contents(); // Recupera o valor e jogar para dentro da variavel
ob_clean();
$tpPronto = str_replace('{{conteudo dinamico}}',$saida, $template);

echo $tpPronto;

?>