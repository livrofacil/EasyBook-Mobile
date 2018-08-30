<?php
	$servidor = "localhost";
	$usuario = "u225746644_root";
	$senha = "bsiufra2018";
	$dbname = "u225746644_eb";
	
	//Criar a conexão
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	if(!$conn){
		die("Falha na conexao: " . mysqli_connect_error());
	}//else{
		//echo "Conexao realizada com sucesso";
	//}
?>
