<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Carro;
use \App\Banco\Pagination;

//Filtro
$filtro = filter_input(INPUT_GET, 'filtro', FILTER_SANITIZE_STRING);

//CONDIÇOES SQL
$condicoes = [
	strlen($filtro) ? 'descricao LIKE "%'.str_replace(' ', '%', $filtro).'%" OR placa LIKE "%'.str_replace(' ', '%', $filtro).'%" OR marca LIKE "%'.str_replace(' ', '%', $filtro).'%"': null
];

$where = implode(' AND ',$condicoes);

$quantidadeCarros = Carro::getQuantidadeCarros($where);

//Paginação
$obPagination = new Pagination($quantidadeCarros, $_GET['pagina'] ?? 1, 5);

$carros = Carro::getCarros($where, null, $obPagination->getLimit());

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';
