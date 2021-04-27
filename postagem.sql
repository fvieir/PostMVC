-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Abr-2021 às 03:51
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `postagem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `id_coment` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `mensagem` text NOT NULL,
  `id_postagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id_coment`, `nome`, `mensagem`, `id_postagem`) VALUES
(34, 'Fabrício Dourado Vieira', 'O HTML5 possui uma ferramenta gráfica ponderosa, chamada de Canvas (tela, em Inglês). Com o Canvas, é muito mais fácil de criar animações, desenhos e outros visuais complexos sem a necessidade de usar um aplicativo externo. Embora o seu uso aumente diariamente, nem todos os navegadores são compatíveis com o HTML5', 30),
(37, 'Fabrício Dourado Vieira', 'Onde aprender o CSSS ?', 31),
(52, 'Tiago', 'É possível fazer toda a instalação com composer install. Dessa forma ele vai instalar o composer.json e .phar', 32),
(57, 'Lucas', 'O DataTables já possui algumas formas de você fazer isso. Irei demonstrar uma forma com dados fixos, mas basta alterar para o seu exemplo:', 33),
(59, 'Tiago', 'Para exibir os dados de retorno das colunas eu geralmente uso no formato: \r\n\r\n{ &#39;targets&#39;: \r\nindicedacoluna, &#34;data&#34;: function ( data, type, row ) { return data[&#39;nomedocampo&#39;]; } }', 33),
(61, 'Tiago', 'Sim, funciona perfeitamente', 40),
(63, 'Fabrício Vieira', 'Obrigado pela dica!!', 40),
(64, 'Fabrício Vieira', 'como usar o rest ???', 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

CREATE TABLE `postagem` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `conteudo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id`, `titulo`, `conteudo`) VALUES
(30, 'Qual é a diferença entre HTML e HTML5?', 'A principal diferença entre HTML e HTML5 pode ser que nem áudio e nem vídeo sejam um componente de HTML, enquanto que ambos podem ser considerados partes integrantes da linguagem HTML5 ?'),
(31, 'O que é HTML5 e CSS3?', 'Melhor Curso de HTML5 e CSS3: Por que aprender HTML5 e CSS3? ... E, HTML5 é uma linguagem de marcação para estruturar e exibir conteúdo para a World Wide Web (WWW). É uma versão aprimorada do padrão HTML original que foi criado em 1990 com o objetivo de definir a plataforma Ope.'),
(32, 'Instalação Twig', 'A instalação do Twig é feita de forma bastante simples por meio do Composer, o gerenciador de dependências amplamente utilizado em projetos PHP. Tendo o Composer instalado, basta executar o seguinte comando na pasta do projeto e o Twig será instalado e registrado no arquivo composer.json:'),
(33, 'Data Tables php', 'Eu fiz um sistema, onde o user pode criar tabela para o banco, e tbm pode criar colunas, então, não sei quais as colunas que foram criadas, mas com o script do banco eu consigo listar as colunas desta tabela'),
(34, 'O que é Post', 'Post é uma palavra estrangeira, sendo a forma original da palavra em inglês. É um substantivo masculino. Postagem é a forma aportuguesada da palavra.'),
(35, 'diferença entre Post e Get', 'Vejamos algumas diferenças entre GET e POST: ... Assim a requisição GET é enviada como string anexada a URL, e a requisição POST é encapsulada junto ao corpo da requisição HTTP e não podendo ser visualizada. Como a requisição GET é montada via URL ela possui um tamanho limitado de mensagem que pode ser enviada.'),
(36, 'Qual a função de uma API?', 'API é um conjunto de padrões, rotinas e instruções de programação que permite que softwares ou aplicativos diferentes se conectem. Por meio de uma API é possível, por exemplo, fazer com que dois computadores “entendam” as instruções um do outro e gerem novas instruções a serem realizadas'),
(37, 'Como funciona a API ?', 'API é um conjunto de rotinas e padrões de programação para acesso a um aplicativo de software ou plataforma baseado na Web. A sigla API refere-se ao termo em inglês &#34;Application Programming Interface&#34; que significa em tradução para o português &#34;Interface de Programação de Aplicativos&#34;.'),
(38, 'API Rest Full', 'API RESTful é uma interface que fornece dados em um formato padronizado baseado em requisições HTTP. ... Ela fornece dados do Facebook para essas aplicações, facilitando o cadastro e o acesso. API RESTful fica parada até que acontece uma requisição.'),
(39, 'O que Postman', 'O Postman é uma ferramenta que dá suporte à documentação das requisições feitas pela API. Ele possui ambiente para a documentação, execução de testes de APIs e requisições em geral.'),
(42, 'web service', 'Um Web service é um conjunto de métodos acedidos e invocados por outros programas utilizando tecnologias Web. ... Um Web service é utilizado para transferir dados através de protocolos de comunicação para diferentes plataformas, independentemente das linguagens de programação utilizadas nessas plataformas.\r\n\r\natulizando...');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_coment`);

--
-- Indexes for table `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_coment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `postagem`
--
ALTER TABLE `postagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
