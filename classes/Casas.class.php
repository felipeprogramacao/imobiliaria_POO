<?php

    class Casas{

    public function VendaCasas(){
        global $pdo;
         $array= array();                          
        $dados=$pdo->prepare("SELECT *,(SELECT nome_imagem from imagem_casa WHERE fk_id_casa = casa.id_casa LIMIT 1)as foto_capa FROM casa");
          $dados->execute();  
          
          $array= $dados->fetchAll();

          return $array;

    }
}

?>