<?php require 'pages/header.php'; ?>
<title>Imoveis Casas</title>
<link rel="stylesheet" href="assets/css/casas.css">

<?php 
require 'classes/Casas.class.php';
require 'pages/topo.php'; ?>


<br>
<form method="POST" id="form_cadast">
<br>
<h2 id="cab_casas" align="center"  ><u>CASAS</u></h2>
<br><br>
</form>



<?php
        

         $venda= new Casas();
         $casas_venda=$venda->VendaCasas();   		
                
        foreach($casas_venda as $value){
                            
                $ft_capa=$value["foto_capa"];
                $imovel=$value["imovel"];
                $terreno=$value["garagem"]; 
               $proprietario=$value["proprietario"];			
       
                ?>

<div>
<div class="row">
<div class="col-xl">
<br>
<img src="imagens/<?php  echo    $ft_capa; ?>" class="img-fluid m-2 width: 30px" alt="Imagem responsiva">
</div>

<div class="col-sm  mt-4">
<ul class="list-group">

<li class="list-group-item list-group-item-success"><?php echo    '<h2>'.$imovel.'</h2>'; ?> </li>
<li class="list-group-item list-group-item-light">Terreno  <b><?php echo   $terreno; ?></b></li>
<li class="list-group-item list-group-item-light">Área Total <b><?php echo   $imovel; ?></b></li>
<li class="list-group-item list-group-item-light">2 Banheiros <b><?php echo   $imovel; ?></b></li>
<li class="list-group-item list-group-item-light">2 Suítes</li>
<li class="list-group-item list-group-item-light">Piscina</li>
<li class="list-group-item list-group-item-light">2 Vagas na Garagem</li>
<li class="list-group-item list-group-item-light">Corretor <b><?php echo   $proprietario; ?></b>             <a href="https://wa.me/55519999999"><img src="imagens/designe/wht.jpg" width="280" height="46"></a></li>

</ul>
</div>
</div>
</div>
</div>
<?php } ?>


<?php require 'pages/footer1.php'; ?>
<?php require 'pages/footer2.php'; ?>