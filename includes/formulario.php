<main class="container">
	<h2 class="mt-3"><?= TITLE ?></h2>

	<section>
		<a href="index.php">
			<button class="btn btn-success">Voltar</button>
		</a>
	</section>

	<form method="post">
		<div class="container">

			<div class="form-group">
				<label>Descrição</label>
				<input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição do veiculo" value="<?= $obCarro->descricao ?>" required>
			</div>
			<div class="form-group">
				<label>Placa</label>
				<input type="text" class="form-control" name="placa" id="placa" maxlength="7" placeholder="Placa do veiculo" value="<?= $obCarro->placa ?>" required>
			</div>
			<div class="form-group">
				<label>Código Renavam</label>
				<input type="text" class="form-control" name="codRenavam" id="codRenavam" placeholder="Código Renavam com 11 digitos" maxlength="11" value="<?= $obCarro->codRenavam ?>" required>
			</div>
			<div class="form-group">
				<label>Ano Modelo</label>
				<input type="number" class="form-control" name="anoModelo" id="anoModelo" max="4" value="<?= $obCarro->anoModelo ?>" required>
			</div>
			<div class="form-group">
				<label>Ano Fabricação</label>
				<input type="number" class="form-control" name="anoFabricacao" id="anoFabricacao" value="<?= $obCarro->anoFabricacao ?>" required>
			</div>
			<div class="form-group">
				<label>Cor</label>
				<input type="text" class="form-control" name="cor" id="cor" placeholder="Cor do veiculo Ex: Vermelho" value="<?= $obCarro->cor ?>" required>
			</div>
			<div class="form-group">
				<label>Km</label>
				<input type="number" class="form-control" name="km" id="km" value="<?= $obCarro->km ?>" required>
			</div>
			<div class="form-group">
				<label>Marca</label>
				<input type="text" class="form-control" name="marca" id="marca" value="<?= $obCarro->marca ?>" required>
			</div>
			<div class="form-group">
				<label>Preço R$:</label>
				<input type="number" class="form-control" name="preco" id="preco" placeholder="Valor do Veiculo Ex: 10,000.00" value="<?= $obCarro->preco ?>" required>
			</div>
			<div class="form-group">
				<label>Preço Fipe R$:</label>
				<input type="number" class="form-control" name="precoFipe" id="precoFipe" value="<?= $obCarro->precoFipe ?>" required>
			</div>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-success">Enviar</button>
		</div>
	</form>

</main>