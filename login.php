<?php require 'pages/header.php'; ?>
<title>Imoveis Logar</title>
<?php require 'pages/topo.php'; ?>

<div class="container">
    <BR>
    <h1>Login</h1>
    <BR>
    <?php
    require 'classes/Usuarios.class.php';
    $u = new Usuarios();
    if(isset($_POST['email']) && !empty($_POST['email'])) {
        $email = addslashes($_POST['email']);
        $senha = $_POST['senha'];

        if($u->login($email, $senha)) {
            ?>

            <script type="text/javascript">window.location.href="./";</script>
            <?php
        } else {
            ?>
            <div class="alert alert-danger">
                Usuário e/ou Senha errados!
            </div>
            <?php
        }
    }
    ?>
    <form method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" />
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control" />
        </div>
        <input type="submit" value="Fazer login" class="btn btn-default" />
    </form>

</div>
<BR>
<?php require 'pages/footer2.php'; ?>