<?php

    class Casas{

    public function LocalizaCasas(){
        global $pdo;
         $array= array();                          
        $dados=$pdo->prepare("SELECT *,(SELECT nome_imagem from imagem_casa WHERE fk_id_casa = casa.id_casa LIMIT 1)as foto FROM casa");
          $dados->execute();  
          
          $array= $dados->fetchAll();

          return $array;
//where id_casa=:$id
    }

    public function LocalizaCasasId($id){
      $array = array();
      global $pdo;
                                
      $dados=$pdo->prepare("SELECT *,(SELECT nome_imagem from imagem_casa WHERE fk_id_casa = casa.id_casa LIMIT 1)as fotos FROM casa");
      $dados->execute();  
      if($dados->rowCount() > 0) {
        $array = $dados->fetch();
        $array['fotos'] = array();
  
        $dados = $pdo->prepare("SELECT id,url FROM anuncios_imagens WHERE id_anuncio = :id_anuncio");
        $dados->bindValue(":id_anuncio", $id);
        $dados->execute();
  
        if($dados->rowCount() > 0) {
          $array['fotos'] = $dados->fetchAll();
        }
  
      }
        

        return $array;

  }

    public function inserirImovel($proprietario, $imovel, $valor, $descricao, $fotos) {
      global $pdo;
  
      $sql = $pdo->prepare("INSERT INTO casa SET proprietario = :proprietario, imovel = :imovel, id_usuario = :id_usuario,  descricao = :descricao, valor = :valor ");
      $sql->bindValue(":proprietario", $proprietario);
      $sql->bindValue(":imovel", $imovel);
      $sql->bindValue(":id_usuario", $_SESSION['logado']);
      $sql->bindValue(":descricao", $descricao);
      $sql->bindValue(":valor", $valor);
     
      $sql->execute();
      
      $ult_id = $pdo -> LastInsertId();

      if(count($fotos) > 0) {
        for($i=0;$i<count($fotos['tmp_name']);$i++) {
          $tipo = $fotos['type'][$i];
          if(in_array($tipo, array('image/jpeg', 'image/png'))) {
            $tmpname = time().rand(0,9999).'.jpg';
            move_uploaded_file($fotos['tmp_name'][$i], 'assets/images/imoveis/'.$tmpname);
  
            list($width_orig, $height_orig) = getimagesize('assets/images/imoveis/'.$tmpname);
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
              $origi = imagecreatefromjpeg('assets/images/imoveis/'.$tmpname);
            } elseif($tipo == 'image/png') {
              $origi = imagecreatefrompng('assets/images/imoveis/'.$tmpname);
            }
  
            imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
  
            imagejpeg($img, 'assets/images/imoveis/'.$tmpname, 80);
  
            $sql = $pdo->prepare("INSERT INTO imagem_casa SET  nome_imagem = :nome_imagem, fk_id_casa = :fk_id_casa");
            $sql->bindValue(":fk_id_casa", $ult_id);
            
            $sql->bindValue(":nome_imagem", $tmpname);
            $sql->execute();
  
          }
        }
      }
  
    }


    public function excluirImovel($id) {
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