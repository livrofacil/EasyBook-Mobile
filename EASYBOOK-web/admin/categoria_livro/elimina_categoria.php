<?php
include('../conexao.php');
$id = $_POST['id'];

		mysqli_query($conn,"DELETE FROM categorias WHERE id_categoria = '$id'");
		$registro = mysqli_query($conn,"SELECT * FROM categorias ORDER BY id_categoria ASC");
		echo '<table class="table table-striped table-condensed table-hover table-responsive">
		        	<tr>
		            	<th width="200">Categoria</th>
						<th width="50">Opções</th>
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