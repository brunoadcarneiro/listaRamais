<?php

/* $acao = 'editar'; */
require '../controller/SetorController.php';
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
				<li class="list-group-item active"><a href="#">Novo Setor</a></li>
				<li class="list-group-item"><a href="listar_setor.php">Listar Setores</a></li>
			</ul>
		</div>

		<div class="col-md-9">
			<div class="container pagina">
				<div class="row">
					<div class="col">

						<h4><b>Setor:</b></h4>
						<hr />
						<form method="post" action="../controller/SetorController.php?acao=editar">
							<div class="form-group">
								<input type="" class="form-control" name="id" value="<?= $_GET['id'] ?>" hidden>
								<label>Setor:</label>
								<input type="text" class="form-control" name="setor" value="<?= $setorReg['setor'] ?>">
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