<?php
$acao = 'recuperar';
require '../controller/RamalController.php';
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

	<script>
		function editar(id) {

			location.href = 'editar_ramal.php?acao=atualizar&id=' + id

		}

		function remover(id) {

			var resultado = confirm("Deseja excluir o item?");
			if (resultado == true) {
				location.href = '../controller/RamalController.php?acao=remover&id=' + id
			} else {
				location.href = 'listar_ramal.php'
			}

		}
	</script>

</head>


<?php include 'includes/header.php'; ?>


<div class="container app">
	<div class="row">
		<div class="col-sm-3 menu">
			<ul class="list-group">
				<li class="list-group-item"><a href="novo_ramal.php">Novo Ramal</a></li>
				<li class="list-group-item active"><a href="#">Listar Ramais</a></li>
			</ul>
		</div>

		<div class="col-sm-9">
			<div class="container pagina">
				<div class="row">
					<div class="col">
						<h4>Ramais</h4>
						<hr />
						<?php if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
							<div class="alert alert-success text-center">
								<h5>Ramal Atualizado com sucesso</h5>
							</div>
						<?php } elseif (isset($_GET['remocao']) && $_GET['remocao'] == 1) { ?>
							<div class="alert alert-danger text-center">
								<h5>Ramal Deletado com sucesso</h5>
							</div>
						<?php } ?>
						<?php if (!empty($ramais)) {
							foreach ($ramais as $indice => $ramal) { ?>
								<div class="row mb-3 d-flex align-items-center tarefa">
									<div class="col-sm-10" id="funcionario_<?= $ramal->id ?>">
										<?= $ramal->numero ?>
									</div>
									<div class="col-sm-2 mt-2 d-flex justify-content-between">
										<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $ramal->id ?>)"></i>
										<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $ramal->id ?>)"></i>
									</div>
								</div>
								<br>
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