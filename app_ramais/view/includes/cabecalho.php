<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">
				<img src="../img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
				App Ramais
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="listar_funcionarios.php">Funcionario</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="listar_ramal.php">Ramal</span></a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="listar_setor.php">Setor</a>
					</li>
					<?php
					if ($_SESSION["permissao"] == 1) {
					?>
						<li class="nav-item active">
							<a class="nav-link" href="listar_usuario.php">Usuário</a>
						</li>
					<?php
					}
					?>
				</ul>
				<ul class="navbar-nav float-right">
					<li class="nav-item active">
						<a class="nav-link" href="../controller/LoginController.php?acao=logout"><img src="../img/sair.png" width="30" height="30" class="d-inline-block align-top" alt=""></a>
					</li>

				</ul>

			</div>
		</div>
	</nav>