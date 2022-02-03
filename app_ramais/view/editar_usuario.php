<?php

/* $acao = 'editar'; */
require '../controller/UsuarioController.php';
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
				<li class="list-group-item active"><a href="#">Novo Usuário</a></li>
				<li class="list-group-item"><a href="listar_usuario.php">Listar Usuários</a></li>
			</ul>
		</div>

		<div class="col-md-9">
			<div class="container pagina">
				<div class="row">
					<div class="col">

						<h4><b>Setor:</b></h4>
						<hr />
						<form method="post" action="../controller/UsuarioController.php?acao=editar">
							<div class="form-group">
								<input type="" class="form-control" name="id" value="<?= $_GET['id'] ?>" hidden>
								<label>Nome:</label>
								<input type="text" class="form-control" name="nome" value="<?= $usuarioReg['nome'] ?>">
								<label>Senha:</label>
								<input type="password" class="form-control" name="senha" placeholder="*********" required>
								<label>Permissão:</label>
								<select class="form-control" name="permissao">
									<?php if (isset($usuarioReg['permissao']) && $usuarioReg['permissao'] == 1) {

									?>
										<option value="1" selected>Administrador</option>
										<option value="0">Usuário</option>
									<?php
									} else {
									?>
										<option value="1">Administrador</option>
										<option value="0" selected>Usuário</option>
									<?php
									}
									?>
								</select>

								<label>Status:</label>
								<select class="form-control" name="status">
									<?php if (isset($usuarioReg['status']) && $usuarioReg['status'] == 1) {

									?>
										<option value="1" selected>Ativo</option>
										<option value="0">Inativo</option>
									<?php
									} else {
									?>
										<option value="1">Ativo</option>
										<option value="0" selected>Inativo</option>
									<?php
									}
									?>
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