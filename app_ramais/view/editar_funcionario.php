<?php

/* $acao = 'editar'; */
require '../controller/FuncionarioController.php';
require '../controller/LogadoController.php';

?>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ramais Santa Cruz Acabamentos</title>

	<link rel="stylesheet" href="../css/estilo.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<?php include 'includes/header.php'; ?>


<div class="container app">
	<div class="row">
		<div class="col-sm-3 menu">
			<ul class="list-group">
				<li class="list-group-item active"><a href="#">Novo Funcionario</a></li>
				<li class="list-group-item"><a href="listar_funcionarios.php">Listar Funcionarios</a></li>
			</ul>
		</div>

		<div class="col-md-9">
			<div class="container pagina">
				<div class="row">
					<div class="col">

						<h4><b>Funcionario:</b> <?= $funcionarioReg['nome'] ?></h4>
						<hr />
						<form method="post" action="../controller/FuncionarioController.php?acao=editar">
							<div class="form-group">
								<input type="" class="form-control" name="id" value="<?= $_GET['id'] ?>" hidden>
								<label>Nome:</label>
								<input type="text" class="form-control" name="nome" value="<?= $funcionarioReg['nome'] ?>">
								<label>Ramal:</label>
								<select class="form-control" name="ramal_id">
									<?php if (!empty($ramais)) {
										foreach ($ramais as $indice => $ramal) {
											$selecionado = "";

											if (isset($funcionarioReg['ramal_id']))
												$selecionado = ($ramal->id == $funcionarioReg['ramal_id']) ? "selected" : "";
									?>
											<option value="<?= $ramal->id ?>" <?= $selecionado ?>><?= $ramal->numero ?></option>
									<?php
										}
									} ?>
								</select>
								<label>Setor:</label>
								<select class="form-control" name="setor_id">
									<?php if (!empty($setores)) {
										foreach ($setores as $indice => $setor) {

											$selecionado = "";

											if (isset($funcionarioReg['setor_id']))
												$selecionado = ($setor->id == $funcionarioReg['setor_id']) ? "selected" : "";
									?>
											<option value="<?= $setor->id ?>" <?= $selecionado ?>><?= $setor->setor ?></option>
									<?php

										}
									} ?>
								</select>
							</div>

							<button class="btn btn-success">Atualizar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

</html>