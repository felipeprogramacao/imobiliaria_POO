<?php require 'pages/header.php'; ?>
<title>Imoveis Casas</title>
<?php require 'pages/topo.php'; ?>



<?php
if(empty($_SESSION['logado'])) {
	?>
	<script type="text/javascript">window.location.href="login.php";</script>
	<?php
	exit;
}

require 'classes/Casas.class.php';
$a = new Casas();
if(isset($_POST['proprietario']) && !empty($_POST['proprietario'])) {
	$proprietario = addslashes($_POST['proprietario']);
	$imovel = addslashes($_POST['imovel']);
	$valor = addslashes($_POST['valor']);
	$descricao = addslashes($_POST['descricao']);
	
	if(isset($_FILES['fotos'])) {
		$fotos = $_FILES['fotos'];
	} else {
		$fotos = array();
	}	

	$a->inserirImovel($proprietario, $imovel, $valor, $descricao, $fotos);

	?>
	<div class="alert alert-success">
		Produto adicionado com sucesso!
	</div>
	<?php
}
?>
<div class="container">
	<h1>Meus Anúncios - Adicionar Anúncio</h1>
<br>
	<form method="POST" enctype="multipart/form-data">

		
		<div class="form-group">
			<label for="proprietario">Proprietário:</label>
			<input type="text" name="proprietario" id="proprietario" class="form-control" />
		</div>
		<div class="form-group">
			<label for="valor">Valor:</label>
			<input type="text" name="valor" id="valor" class="form-control" />
		</div>
        <div class="form-group">
			<label for="imovel">Imóvel:</label>
			<input type="text" name="imovel" id="imovel" class="form-control" />
		</div>
		<div class="form-group">
			<label for="descricao">Descrição:</label>
			<textarea class="form-control" name="descricao"></textarea>
		</div>
		

		<div class="form-group">
			<label for="add_foto">Fotos do imóveis:</label>
			<input type="file" name="fotos[]" multiple /><br/>

			<div class="panel panel-default">
				<div class="panel-heading">Fotos do Imóveis</div>
				<div class="panel-body">
					
				</div>
			</div>
		</div>

		<input type="submit" value="Adicionar" class="btn btn-default" />
	</form>

</div>


<?php require 'pages/footer1.php'; ?>
<?php require 'pages/footer2.php'; ?>