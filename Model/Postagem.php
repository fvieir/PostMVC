<?php

class Postagem {
 
    public static function listarTodasPostagem()
    {
      $sql = "SELECT * FROM postagem ORDER BY 1 DESC";
      $con = Conexao::getInstance()->prepare($sql);
      $con->execute();

      $resultado = array();

      while ($row = $con->fetchObject('Postagem')) {
          $resultado[] = $row;
      }
     return $resultado;
    }
}


?>