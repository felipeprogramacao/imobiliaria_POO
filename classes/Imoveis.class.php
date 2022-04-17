<?php
class Imoveis{

    public function buscaImoveis(){
        global $pdo;

        $id_casa=array();
        $dados=$pdo->prepare("SELECT *,(SELECT nome_imagem from imagem_casa WHERE fk_id_casa = casa.id_casa LIMIT 1)as foto_capa FROM casa where id_casa= :id_casa");
        $dados->bindValue(":id_casa", $id_casa);
        $dados->execute();

    }

}

?>