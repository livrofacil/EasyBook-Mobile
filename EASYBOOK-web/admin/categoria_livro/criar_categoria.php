
<?php
include('../conexao.php');

$id = $_POST['id-prod'];
$processo = $_POST['pro'];
$cate = $_POST['nome'];

switch($processo){
	case 'Registro': mysqli_query($conn,"INSERT INTO categorias (nome_categoria) VALUES('$cate')");
	break;

	case 'Edição': mysqli_query($conn, "UPDATE categorias SET nome_categoria = '$cate' where id_categoria = '$id'");
	break;
   }
    $registro = mysqli_query($conn, "SELECT * FROM categorias ORDER BY id_categoria ASC");

    echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="200">Categoria</th>
				<th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['nome_categoria'].'</td>
				<td> <a href="javascript:editarEmpregado('.$registro2['id_categoria'].');" class="glyphicon glyphicon-edit eliminar"     title="Editar"></a>
				 <a href="javascript:eliminarEmpregado('.$registro2['id_categoria'].');">
				 <img src="../images/delete.png" width="15" height="15" alt="delete" title="Eliminar" /></a>
				 </td>
				</tr>';
	}
   echo '</table>';
?>