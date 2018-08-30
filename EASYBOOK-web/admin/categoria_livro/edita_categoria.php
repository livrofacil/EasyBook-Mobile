<?php
include('../conexao.php');
$id = $_POST['id'];
$valores = mysqli_query($conn,"SELECT * FROM categorias WHERE id_categoria = '$id'");
$valores2 = mysqli_fetch_array($valores);

$dados = array(
				0 => $valores2['nome_categoria'], 
				); 
echo json_encode($dados);
?>