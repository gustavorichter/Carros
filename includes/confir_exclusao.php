<main class="container">

	<h2 class="mt-3">Remover carro</h2>

	<form method="post">

		<div class="form-group">
			<p>Realmente deseja remover o carro <strong><?= $obCarro->descricao ?></strong>?</p>
		</div>

		<div class="form-group">
			<a href="index.php">
				<button type="button" class="btn btn-success">Cancelar</button>
			</a>

			<button type="submit" name="remover" class="btn btn-danger">Remover</button>
		</div>

	</form>

</main>