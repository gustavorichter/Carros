<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar carro');

use \App\Entity\Carro;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
	header('location: index.php?status=error');
	exit;
}

$obCarro = Carro::getCarro($_GET['id']);

if (!$obCarro instanceof Carro) {
	header('location: index.php?status=error');
	exit;
}

if (isset(
	$_POST['descricao'],
	$_POST['placa'],
	$_POST['codRenavam'],
	$_POST['anoModelo'],
	$_POST['anoFabricacao'],
	$_POST['cor'],
	$_POST['km'],
	$_POST['marca'],
	$_POST['preco'],
	$_POST['precoFipe']
)) {

	$obCarro->descricao = $_POST['descricao'];
	$obCarro->placa = $_POST['placa'];
	$obCarro->codRenavam = $_POST['codRenavam'];
	$obCarro->anoModelo = $_POST['anoModelo'];
	$obCarro->anoFabricacao = $_POST['anoFabricacao'];
	$obCarro->cor = $_POST['cor'];
	$obCarro->km = $_POST['km'];
	$obCarro->marca = $_POST['marca'];
	$obCarro->preco = $_POST['preco'];
	$obCarro->precoFipe = $_POST['precoFipe'];
	$obCarro->atualizar();

	header('location: index.php?status=success');
	exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
