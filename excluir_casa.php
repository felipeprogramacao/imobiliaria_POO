<?php
require 'config.php';
if(empty($_SESSION['cLogin'])) {
	header("Location: login.php");
	exit;
}

require 'classes/Casas.class.php';
$casa = new Casas();
//verifica se aconteceu o envio do id ele chama excluir
if(isset($_GET[id_casa]) && !empty($_GET[id_casa])) {
	$casa->excluirCasa($_GET['id_casa']);
	
}

header("Location: imoveis_cliente.php");