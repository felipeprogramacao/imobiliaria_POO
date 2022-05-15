<?php
require 'config.php';
if(empty($_SESSION['logado'])) {
	header("Location: login.php");
	exit;
}

require 'classes/Casas.class.php';
$a = new Casas();

if(isset($_GET['id_casa']) && !empty($_GET['id_casa'])) {
	$a->excluirImovel($_GET['id_casa']);
}

header("Location: meus_imoveis.php");