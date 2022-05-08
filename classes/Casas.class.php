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


    public function updadeImoveis($titulo, $categoria, $valor, $descricao, $fotos, $id) {
      global $pdo;
  
      $sql = $pdo->prepare("UPDATE anuncios SET titulo = :titulo, id_categoria = :id_categoria, id_usuario = :id_usuario, descricao = :descricao, valor = :valor WHERE id = :id");
      $sql->bindValue(":titulo", $titulo);
      $sql->bindValue(":id_categoria", $categoria);
      $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
      $sql->bindValue(":descricao", $descricao);
      $sql->bindValue(":valor", $valor);
      $sql->bindValue(":id", $id);
      $sql->execute();
  
      if(count($fotos) > 0) {
        for($q=0;$q<count($fotos['tmp_name']);$q++) {
          $tipo = $fotos['type'][$q];
          if(in_array($tipo, array('image/jpeg', 'image/png'))) {
            $tmpname = md5(time().rand(0,9999)).'.jpg';
            move_uploaded_file($fotos['tmp_name'][$q], 'assets/images/anuncios/'.$tmpname);
  
            list($width_orig, $height_orig) = getimagesize('assets/images/anuncios/'.$tmpname);
            $ratio = $width_orig/$height_orig;
                                          
            $width = 500;
            $height = 500;
                                          
            if($width/$height > $ratio) {
              $width = $height*$ratio;
            } else {
              $height = $width/$ratio;
            }
  
            $img = imagecreatetruecolor($width, $height);
            if($tipo == 'image/jpeg') {
              $origi = imagecreatefromjpeg('assets/images/casas/'.$tmpname);
            } elseif($tipo == 'image/png') {
              $origi = imagecreatefrompng('assets/images/casas/'.$tmpname);
            }
  
            imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
  
            imagejpeg($img, 'assets/images/anuncios/'.$tmpname, 80);
  
            $sql = $pdo->prepare("INSERT INTO anuncios_imagens SET id_anuncio = :id_anuncio, url = :url");
            $sql->bindValue(":id_anuncio", $id);
            $sql->bindValue(":url", $tmpname);
            $sql->execute();
  
          }
        }
      }
  
    }

    public function excluirCasa($id) {
		global $pdo;

		$sql = $pdo->prepare("DELETE FROM imagem_casa WHERE id_imagem_casa = :id_casa");
		$sql->bindValue(":id_casa", $id);
		$sql->execute();

		$sql = $pdo->prepare("DELETE FROM casa WHERE id_casa = :id_casa");
		$sql->bindValue(":id_casa", $id);
		$sql->execute();
	}

}

?>