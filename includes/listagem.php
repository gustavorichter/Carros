<?php

$mensagem = '';
if (isset($_GET['status'])) {
	switch ($_GET['status']) {
		case 'success':
			$mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
			break;

		case 'error':
			$mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
			break;
	}
}

$resultados = '';
	foreach ($carros as $carro) {
	$resultados .= '<tr>
					<td>' . $carro->id . '</td>
					<td>' . $carro->descricao . '</td>
					<td>' . $carro->placa . '</td>
					<td>' . $carro->marca . '</td>
			<td>
				<a href="alterar.php?id=' . $carro->id . '">
				<button type="button" class="btn btn-primary">Editar</button>
				</a>
					<a href="remover.php?id=' . $carro->id . '">
					<button type="button" class="btn btn-danger">Excluir</button>
				</a>
		 	</td>
		</tr>';
	}

		$resultados = strlen($resultados) ? $resultados : '<tr>
			<td colspan="6" class="text-center">
				Nenhum carro encontrado
			</td>
		</tr>';

	/*$paginas = $obPagination->getPages();
	echo "<pre>";
	print_r($paginas);
	echo "</pre>"; exit;
	*/

	//Gets da url
	unset($_GET['status']);
	unset($_GET['pagina']);
	$gets = http_build_query($_GET);

	//Paginação
	$paginacao = '';
	$paginas = $obPagination->getPages();
	foreach($paginas as $key=>$pagina) {
		$class = $pagina['atual'] ? 'btn-primary' : 'btn-dark';
		$paginacao .= '<a href="?pagina='.$pagina['pagina'].'&'.$gets.'">
			<button type="button" class="btn '.$class.'">'.$pagina['pagina'].'</button>
		</a>';
	}

?>
<main>

	<?= $mensagem ?>

	<section>
		<div class="text-center my-3">
			<a href="cadastrar.php">
				<button class="btn btn-success">Cadastrar novo carro</button>
			</a>
	</section>

	<section>
		<form method="GET">
			<div class="row my-3">
				<div class="col">
					<label>Buscar carro</label>
					<input type="text" name="filtro" class="form-control" value="<?=$filtro?>">
				</div>

				<div class="col d-flex align-items-end">
					<button type="submit" class="btn btn-primary">Filtrar</button>
				</div>

			</div>
		</form>
	</section>

	<section>
		<div class="container">
			<table class="table bg-light mt-3">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Descrição</th>
						<th scope="col">Placa</th>
						<th scope="col">Marca</th>
						<th scope="col">Ações</th>
					</tr>
				</thead>
				<tbody>
					<?= $resultados ?>
				</tbody>
			</table>
		</div>
	</section>

	<section>
		<?php echo $paginacao; ?>
	</section>

</main>