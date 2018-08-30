<?php
include('../conexao.php');
	$paginaAtual = $_POST['partida'];

    $nroProdutos = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM categorias"));
    $nroLotes = 8;
    $nroPaginas = ceil($nroProductos/$nroLotes);
    $lista = '';
    $tabla = '';

    if($paginaAtual > 1){
        $lista = $lista.'<li><a href="javascript:paginacao('.($paginaAtual-1).');">Anterior</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaAtual){
            $lista = $lista.'<li class="active"><a href="javascript:paginacao('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:paginacao('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaAtual < $nroPaginas){
        $lista = $lista.'<li><a href="javascript:paginacao('.($paginaAtual+1).');">Próxima</a></li>';
    }
              	if($paginaAtual <= 1){
              		$limit = 0;
              	}else{
              		$limit = $nroLotes*($paginaAtual-1);
              	}
  	$registro = mysqli_query($conn, "SELECT * FROM categorias LIMIT $limit, $nroLotes ");
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-responsive">
			           <tr>
                 <th width="200">Categoria</th>
                 <th width="50">Opções</th>
                 </tr>';			
        	while($registro2 = mysqli_fetch_array($registro)){
        		$tabla = $tabla.'<tr>
                 <td>'.$registro2['nome_categoria'].'</td>
                 <td> <a href="javascript:editarEmpregado('.$registro2['id_categoria'].');" class="glyphicon glyphicon-edit eliminar"     title="Editar"></a>
                 <a href="javascript:eliminarEmpregado('.$registro2['id_categoria'].');">
                 <img src="../images/delete.png" width="15" height="15" alt="delete" title="Eliminar" /></a>
                 </td>
                </tr>';		
        	}
    $tabla = $tabla.'</table>';
    $array = array(0 => $tabla,
    			   1 => $lista);
    echo json_encode($array);
?>