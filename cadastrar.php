<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar carro');

use \App\Entity\Carro;

$obCarro = new Carro;

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
		$obCarro->cadastrar();

	header('location: index.php?status=success');
	exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
