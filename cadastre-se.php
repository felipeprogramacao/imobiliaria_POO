<?php require 'pages/header.php'; ?>
<title>Imoveis Cadastro</title>
<?php require 'pages/topo.php'; ?>

<div class="container">
    <br><br>
    <h1>TELA DE CADASTRO</h1>
    <br>
    <?php
    require 'classes/Usuarios.class.php';
    $u = new Usuarios();
    if (isset($_POST['nome']) && !empty($_POST['nome'])) {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = $_POST['senha'];
        $telefone = addslashes($_POST['telefone']);

        if (!empty($nome) && !empty($email) && !empty($senha)) {
            if ($u->cadastrar($nome, $email, $senha, $telefone)) {
    ?>
                <div class="alert alert-success">Faça seu login agora. <a href="login.php" class="alert-link">Faça o login agora.</a></div>
            <?php
            } else {
            ?>
                <div class="alert alert-warning">Este usuário já exite. <a href="login.php" class="alert-link">Faça o login agora.</a></div>
            <?php
            }
        } else {
            ?>
            <div class="alert alert-danger">Preencha todos os campos.</div>
    <?php
        }
    }
    ?>
    <form method="POST">

        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" id="nome" class="form-control">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="senha" id="senha" class="form-control">
        </div>

        <div class="form-group">
            <label>Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control">
            <br>
            <input type="submit" value="CADASTRAR" class="btn btn-default">
        </div>
    </form>

</div>

<?php require 'pages/footer2.php'; ?>