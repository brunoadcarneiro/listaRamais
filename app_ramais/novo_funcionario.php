<?php

$acao = 'novo';
require '../controller/FuncionarioController.php';
require '../controller/LogadoController.php';

?>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>App Ramais</title>

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

						<h4>Cadastro de Funcionario</h4>
						<hr />
						<?php if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
							<div class="alert alert-success text-center">
								<h5>Funcionario inserido com sucesso</h5>
							</div>
						<?php } ?>
						<form method="post" action="../controller/FuncionarioController.php?acao=inserir">
							<div class="form-group">
								<label>Nome:</label>
								<input type="text" class="form-control" name="nome" placeholder="Nome do Funcionario a cadastrar">
								<label>Ramal:</label>
								<select class="form-control" name="ramal_id">
									<option selected disabled value="">Selecione o Ramal</option>
									<?php if (!empty($ramais)) {
										foreach ($ramais as $indice => $ramal) { ?>
											<option value="<?= $ramal->id ?>"><?= $ramal->numero ?></option>
									<?php }
									} ?>
								</select>
								<label>Setor:</label>
								<select class="form-control" name="setor_id">
									<option selected disabled value="">Selecione o Setor</option>
									<?php if (!empty($setores)) {
										foreach ($setores as $indice => $setor) { ?>
											<option value="<?= $setor->id ?>"><?= $setor->setor ?></option>
									<?php }
									} ?>
								</select>
							</div>

							<button class="btn btn-success">Cadastrar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

</html>