<?php 
require 'pages/header.php';

?>
<?php
if(empty($_SESSION['cLogin'])) {
	?>
	<script type="text/javascript">window.location.href="login.php";</script>
	<?php
	exit;
}
require 'pages/topo.php';
require 'classes/Casas.class.php';
$a = new Casas();
if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {
	$titulo = addslashes($_POST['titulo']);
	$categoria = addslashes($_POST['categoria']);
	$valor = addslashes($_POST['valor']);
	$descricao = addslashes($_POST['descricao']);
	if(isset($_FILES['fotos'])) {
		$fotos = $_FILES['fotos'];
	} else {
		$fotos = array();
	}

	$a->updadeImoveis($titulo, $categoria, $valor, $descricao, $fotos, $_GET['id_casa']);

	?>
	<div class="alert alert-success">
		Produto editado com sucesso!
	</div>
	<?php
}
//se tiver anuncio ele retorna, se não ele volta para meus-anuncios

if(isset($_GET['id_casa']) && !empty($_GET['id_casa'])) {
	$info = $a->vendaCasas($_GET['id_casa']);
} else {
	
}

?>
<div class="container">
	<br>
	<h1>Imóveis Editar</h1>
	<br>

	<form method="POST" enctype="multipart/form-data">

		
		<div class="form-group">
			<label for="titulo">Titulo:</label>
			<input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $info['titulo']; ?>" />
		</div>
		<div class="form-group">
			<label for="valor">Valor:</label>
			<input type="text" name="valor" id="valor" class="form-control" value="<?php echo $info['valor']; ?>" />
		</div>
		<div class="form-group">
			<label for="descricao">Descrição:</label>
			<textarea class="form-control" name="descricao"><?php echo $info['descricao']; ?></textarea>
		</div>
		<div class="form-group">
			<label for="add_foto">Fotos do anúncio:</label>
			<input type="file" name="fotos[]" multiple /><br/>

			<div class="panel panel-default">
				<div class="panel-heading">Fotos do Anúncio</div>
				<div class="panel-body">
					<?php foreach($info['fotos'] as $foto): ?>
					<div class="foto_item">
						<img src="assets/images/anuncios/<?php echo $foto['url']; ?>" class="img-thumbnail" border="0" /><br/>
						<a href="excluir-foto.php?id=<?php echo $foto['id_imagem_casa']; ?>" class="btn btn-default">Excluir Imagem</a>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>

		<input type="submit" value="Salvar" class="btn btn-default" />
	</form>

</div>
<?php require 'pages/footer1.php'; ?>