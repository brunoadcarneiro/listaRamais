<?php

$acao = 'recuperar';
require '../controller/FuncionarioController.php';
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
<body>
	<nav class="navbar navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">
				<img src="../img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
				App Ramais
			</a>
			<a class="navbar-brand" href="login.php">
				<img src="../img/fechadura.png" width="30" height="30" class="d-inline-block align-top" alt="">
			</a>
		</div>
	</nav>
	<div class="container app">
		<div class="row">
			<div class="col-sm-12">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Ramais</h4>
							<hr />
							<?php if (!empty($funcionarios)) {
								foreach ($funcionarios as $indice => $funcionario) { ?>
									<div class="row mb-3 d-flex align-items-center tarefa">
										<div class="col-sm-5" id="funcionario_<?= $funcionario->id ?>">
											<?= $funcionario->nome ?>
										</div>
										<div class="col-sm-2">
											<?= $funcionario->numero ?>
										</div>
										<div class="col-sm-5">
											<?= $funcionario->setor ?>
										</div>
									</div>
							<?php }
							} ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>