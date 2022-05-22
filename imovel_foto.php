<?php require 'pages/header.php'; ?>
<title>Imoveis Casas</title>
<?php require 'pages/topo.php'; ?>
<?php require 'pages/carrossel.php'; ?>


<?php
require 'classes/Casas.class.php';

$casa = new Casas();


	$id = addslashes($_GET['id_casa']);
  


$imovel = $casa->LocalizaCasasId($id);
 

        
        $fot=$imovel['fotos'];
        
        foreach($fot as $fot2){
          
  ?>
        



<div>
  <div>
  <div class="row">
    <div class="col-xl">
    
   
    <img src="assets/images/imoveis/<?php echo $fot2['nome_imagem']; ?>" class="img-fluid m-2 width: 30px" alt="Imagem responsiva" />
        <?php } ?>
      
  </div>
    
    <div class="col-sm  mt-3 mr-0">
      <ul class="list-group">
 
  <li class="list-group-item list-group-item-success"><strong>ATENDIMENTO</strong> </li>
  <li class="list-group-item list-group-item-light"><b>Proprietário</b><br>  <?php echo $imovel['proprietario']; ?></li>
  <li class="list-group-item list-group-item-light"><b>Imóvel</b> <br><?php echo $imovel['imovel']; ?></li>
  <li class="list-group-item list-group-item-light"><b>Descrição</b><br><?php echo $imovel['descricao']; ?></li>
  <li class="list-group-item list-group-item-light"><b>Valor</b><br><?php echo $imovel['valor']; ?></li>
  <li class="list-group-item list-group-item-light"><br><b>Corretor / Responsável</b><br><a href="https://wa.me/55519999999"><img src="assets/images/fone/wht.jpg" width="280" height="46"></a></li>
  
</ul>
	 </div>
    </div>
  </div>
  </div>


<?php require 'pages/footer1.php'; ?>
<?php require 'pages/footer2.php'; ?>