<?php require 'pages/header.php'; ?>
<title>Imoveis Casas</title>
<?php require 'pages/topo.php'; ?>
<?php require 'pages/carrossel.php'; ?>

<?php if(empty($_SESSION['logado'])) { ?>
	<script type="text/javascript">window.location.href="login.php";</script>
<?php
	exit;
}
?>

<div class="container">
	<h2> - Seus Imóveis - & -  Seus Clientes - </h2>
<br>
	<a href="novo_imovel.php" class="btn btn-default">Adicionar Imóvel</a>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Foto</th>
				<th>Proprietarios</th>
				<th>Descrição</th>
				<th>Valor</th>
			</tr>
		</thead>
		<?php
		require 'classes/Casas.class.php';
		$casa = new Casas();
               
		$casas = $casa->LocalizaCasas();
              
		foreach($casas as $casavenda){
		?>
		<tr>
			<td>
                           
				<?php if(!empty($casavenda['foto'])): ?>
				<a href="imovel_foto.php?id_casa=<?php echo $casavenda['id_casa']; ?>"><img src="assets/images/imoveis/<?php echo $casavenda['foto']; ?>" height="50" border="0" /></a>
				<?php else: ?>
                                
				<img src="assets/images/default.jpg" height="50" border="0" />
				<?php endif; ?>
			</td>
			<td><?php echo utf8_encode($casavenda['proprietario']); ?></td>
			<td><?php echo ($casavenda['descricao']); ?></td>
			<td>R$ <?php echo number_format($casavenda['valor'], 2); ?></td>
			<td>
                
				<a href="excluir_casa.php?id_casa=<?php echo $casavenda['id_casa']; ?>" class="btn btn-danger">Excluir</a>
							
			</td>
			
		</tr>
		
		
		<?php } ?>
	</table>
</div>
<br>
<?php require 'pages/footer2.php'; ?>