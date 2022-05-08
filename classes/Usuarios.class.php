<?php
class Usuarios{

public function cadastrar($nome, $email, $senha, $telefone){
global $pdo;
    $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
    $sql->bindValue(":email", $email);
    $sql->execute();

    if($sql->rowCount() == 0){
$sql= $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha= :senha, telefone= :telefone");
$sql->bindValue(":nome", $nome);
$sql->bindValue(":email", $email);
$sql->bindValue(":senha", $senha);
$sql->bindValue(":telefone", $telefone);
$sql->execute();

return true;
    }else{
        return false;
        }
    }

    public function login($email, $senha){
        global $pdo;
        $sql=$pdo->prepare("SELECT id_usuarios FROM usuarios WHERE email = :email and senha = :senha");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();
    
        if($sql->rowCount()>0){
    $dado=$sql->fetch();
    $_SESSION['cLogin']= $dado['id_usuarios'];
    
    return true;
        }else{
            return false;
        }
    
    }
}
?>