<?php

$acao = 'novo';
require '../controller/UsuarioController.php';
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

<?php
include 'includes/header.php';
?>


<div class="container app">
	<div class="row">
		<div class="col-sm-3 menu">
			<ul class="list-group">
				<li class="list-group-item active"><a href="#">Novo Usuário</a></li>
				<li class="list-group-item"><a href="listar_usuario.php">Listar Usuários</a></li>
			</ul>
		</div>

		<div class="col-md-9">
			<div class="container pagina">
				<div class="row">
					<div class="col">

						<h4>Cadastro de Usuários</h4>
						<hr />
						<?php if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
							<div class="alert alert-success text-center">
								<h5>Usuário inserido com sucesso</h5>
							</div>
						<?php } ?>
						<form method="post" action="../controller/UsuarioController.php?acao=inserir">
							<div class="form-group">
								<label>Nome:</label>
								<input type="text" class="form-control" name="nome" placeholder="Nome do Usuário a cadastrar">
								<label>Senha:</label>
								<input type="password" class="form-control" name="senha" placeholder="*********">
								<label>Permissão:</label>
								<select class="form-control" name="permissao">
									<option selected disabled value="">Selecione a Permissão</option>
									<option value="1">Administrador</option>
									<option value="0">Usuário</option>
								</select>
								<label>Status:</label>
								<select class="form-control" name="status">
									<option selected disabled value="">Selecione a Permissão</option>
									<option value="1">Ativo</option>
									<option value="0">Inativo</option>
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