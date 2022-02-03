<?php

session_start();

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

	<div class="container">
		<div class="row justify-content-center align-items-center" style="height:100vh">
			<div class="col-4">
				<div class="card">



					<div class="card-body">
						<h4 class="card-title text-center">Login</h4>
						<hr>
						<br>
						<form method="POST" action="../controller/LoginController.php?acao=login" autocomplete="off">
							<div class="form-group">
								<label>Usuário:</label>
								<input type="text" class="form-control" name="nome" placeholder="">
							</div>
							<div class="form-group">
								<label>Senha:</label>
								<input type="password" class="form-control" name="senha" placeholder="*********">
							</div>
							<?php
							if (isset($_SESSION['erro_senha'])) :
							?>
								<div class="alert alert-danger">
									Senha Inválida.
								</div>
							<?php
							endif;
							unset($_SESSION['erro_senha']);
							?>
							<?php
							if (isset($_SESSION['erro_user'])) :
							?>
								<div class="alert alert-danger">
									Usuário inexistente ou Permissão incorreta.
								</div>
							<?php
							endif;
							unset($_SESSION['erro_user']);
							?>
							<div class="text-center">
								<button type="submit" class="btn btn-outline-success">Entar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>