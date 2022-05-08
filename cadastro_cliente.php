<?php require 'pages/header.php'; ?>
<title>Imoveis Cadastro</title>
<?php require 'pages/topo.php'; ?>
<br>
<div class="container">
	<h1>Cadastre-se</h1>
  <br>
	<?php
	require 'classes/usuarios.class.php';
	$u = new Usuarios();
	if(isset($_POST['nome']) && !empty($_POST['nome'])) {
		$nome = addslashes($_POST['nome']);
		$email = addslashes($_POST['email']);
		$senha = $_POST['senha'];
		$telefone = addslashes($_POST['telefone']);
                 //verifica se nome, email, telefone não estar vazio
		if(!empty($nome) && !empty($email) && !empty($senha)) {
                    //efetuando o cadastro
			if($u->cadastrar($nome, $email, $senha, $telefone)) {
				?>
                           <!-- se foi cadastrado-->
				<div class="alert alert-success">
					<strong>Parabéns!</strong> Cadastrado com sucesso. <a href="login.php" class="alert-link">Faça o login agora</a>
				</div>
				<?php
			} else {
				?>
                             <!-- se já existir um email cadastrado-->
				<div class="alert alert-warning">
					Este usuário já existe! <a href="login.php" class="alert-link">Faça o login agora</a>
				</div>
				<?php
			}
		} else {
			?>
			<div class="alert alert-warning">
				Preencha todos os campos!
			</div>
			<?php
		}

	}
	?>
	<form method="POST">
		<div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" name="nome" id="nome" class="form-control" />
		</div>
		<div class="form-group">
			<label for="email">E-mail:</label>
			<input type="email" name="email" id="email" class="form-control" />
		</div>
		<div class="form-group">
			<label for="senha">Senha:</label>
			<input type="password" name="senha" id="senha" class="form-control" />
		</div>
		<div class="form-group">
			<label for="telefone">Telefone:</label>
			<input type="text" name="telefone" id="telefone" class="form-control" />
		</div>
		<input type="submit" value="Cadastrar" class="btn btn-default" />
	</form>

</div>

<?php require 'pages/footer1.php'; ?>
<?php require 'pages/footer2.php'; ?>