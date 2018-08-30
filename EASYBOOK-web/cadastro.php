<?php
session_start();
ob_start();
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
	include_once ("conexao/conexao.php");
	//$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	$nome_usuario = $_POST['nome'];
	$senha_usuario = md5($_POST['senha']);
	$email_usuario = $_POST['email'];
	$validade = date('Y-m-d H:i:s', strtotime('+30 days'));
	
	$result_usuario = "INSERT INTO usuarios(nome,senha,email, niveis_acesso_id, validade, created) VALUES ('$nome_usuario','$senha_usuario','$email_usuario', 3, '$validade', NOW())";
	//var_dump($dados);
	//$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
	
	//$result_usuario = "INSERT INTO usuarios (nome, email, senha) VALUES (
	//				'" .$dados['nome']. "',
		//			'" .$dados['email']. "',
			//		'" .$dados['senha']. "',
				//	)";
	$resultado_usario = mysqli_query($conn, $result_usuario);
	if(mysqli_insert_id($conn)){
		$_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
		header("Location: entrar.php");
	}else{
		$_SESSION['msg'] = "Erro ao cadastrar o usuário";
	}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>EASYBOOK - Cadastrar</title>
	</head>
	<body>
		<h2>Cadastro</h2>
		<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>
		<form method="POST" action="">
			<label>Nome</label>
			<input type="text" name="nome" placeholder="Digite o nome e o sobrenome"><br><br>
			
			<label>E-mail</label>
			<input type="text" name="email" placeholder="Digite o seu e-mail"><br><br>
			
			
			<label>Senha</label>
			<input type="password" name="senha" placeholder="Digite a senha"><br><br>
			
			<input type="submit" name="btnCadUsuario" value="Cadastrar"><br><br>
			
			
		
		</form>
	</body>
</html>