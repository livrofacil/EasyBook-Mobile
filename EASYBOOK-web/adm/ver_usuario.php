<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Easy Book">
		<link rel="icon" href="imagens/favicon.ico">

		<title>Administrativo - Easy Book</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="css/theme.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>
	</head>

	<body role="document">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="administrativo.php">Dashboard</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="#">Usuários</a></li>
					<li><a href="ver_contatos.php">Contatos</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Livros<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Sugestões</a></li>
							<li><a href="#">Biblioteca</a></li>
						</ul>
					</li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
    </nav>


<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>

		<a href="administrativo.php">Listar</a><br>
		<h1>Ver Usuário</h1>
		
		<div class="row">
			<div class="col-md-12">
				<table class="table">
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		echo"
					<thead>
						<tr>
							<th>Inscrição</th>
							<th>Nome</th>
							<th>Situação</th>
							<th>Nivel de acesso</th>
							<th>Cadastrado</th>
							<th>Ações</th>
						</tr>
					</thead>	
					
					<tbody>
						<tr>
							<td>". $row_usuario['id'] ."</td>
							<td>". $row_usuario['nome'] ."</td>
							<td>". $row_usuario['situacoe_id'] ."</td>
							<td>". $row_usuario['niveis_acesso_id'] ."</td>
							<td>". $row_usuario['created'] ."</td>
							<td>
								<a button type='button' class='btn btn-xs btn-primary' href='ver_usuario.php?id=" .$row_usuario['id']."'>Visualizar</button>
								<a button type='button' class='btn btn-xs btn-warning' href='edit_usuario.php?id=" . $row_usuario['id'] . "'>Editar</button>
								<a button type='button' class='btn btn-xs btn-danger' href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</button>
							</td>
						</tr>              
					</tbody>";
		?>
		</table>
		</div>
		</div>
		
		
	</body>
</html>