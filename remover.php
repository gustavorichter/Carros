<?php

require __DIR__ . '/vendor/autoload.php';

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

if (isset($_POST['remover'])) {

	$obCarro->remover();

	header('location: index.php?status=success');
	exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confir_exclusao.php';
include __DIR__ . '/includes/footer.php';
