<?php 
require_once "Core/Core.php";

require_once "Controller/ErrorController.php";
require_once "Controller/HomeController.php";

require_once "Model/Conexao.php";
require_once "Model/Postagem.php";

require_once "Vendor/autoload.php";


$template = file_get_contents('View/template.html'); // Função pega dados de um documento e joga na Variavel

ob_start(); // Inicia um buffer
    $core = new Core(); // Instacia o objeto da classe Core
    $core->run($_GET); // Chama o metodo run que é responsavel em chamar a classe e metodo corretos
$saida = ob_get_clean(); // armazane em mémoria o resultado do trecho entre Ob_start e limpa o buffer

$tppronto = str_replace('{{conteudo dinamico}}',$saida,$template); // Variavel recebe o template com o conteudo para listar

echo $tppronto; // imprimi todo o codigo html com o conteudo dinâmico

?>