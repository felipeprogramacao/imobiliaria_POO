<?php require 'pages/header.php'; ?>
<title>Imoveis Meus Imoveis</title>
<?php require 'pages/topo.php'; ?>
<?php require 'pages/carrossel.php'; ?>

<?php
if(empty($_SESSION['cLogin'])) {
	?>
	<script type="text/javascript">window.location.href="login.php";</script>
	<?php
	exit;
}

?>
<div class="container">
	<h1>Meus Anúncios</h1>

	<a href="add-casa.php" class="btn btn-default">Adicionar Anúncio</a>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Foto</th>
				<th>Titulo</th>
				<th>Valor</th>
				<th>Ações</th>
			</tr>
		</thead>
		<?php
		require 'classes/Casas.class.php';
		$a = new Casas();
                //lista de casas
		$casas = $a->VendaCasas();
              //retorna todos os casas do usuario logado
		foreach($casas as $casa){
		?>
		<tr>
			<td>
                            <!--verifica se tá preenchido a url-->
				<?php if(!empty($casa['url'])){ ?>
				<img src="assets/images/casas/<?php echo $casa['url']; ?>" height="50" border="0" />
				<?php }else{ ?>
                                <!-- se não tiver preenchido a url joa a imagem padrao-->
				<img src="assets/images/default.jpg" height="50" border="0" />
				<?php } ?>
			</td>
			<td><?php echo $casa['proprietario']; ?></td>
			<td>R$ <?php echo number_format($casa['valor'], 2); ?></td>
			<td>
                           
				<a href="editar-casa.php?id_casa=<?php echo $casa['id_casa']; ?>" class="btn btn-default">Editar</a>
				<a href="excluir_casa.php?id_casa=<?php echo $casa['id_casa']; ?>" class="btn btn-danger">Excluir</a>
			</td>
		</tr>
		<?php } ?>
	</table>
</div>

<?php require 'pages/footer1.php'; ?>
<?php require 'pages/footer2.php'; ?>