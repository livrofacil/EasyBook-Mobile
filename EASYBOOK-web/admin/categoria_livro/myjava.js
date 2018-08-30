$(document).ready(paginacao(1));
$(function(){
	$('#bd-desde').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var url = 'clientes/busca_produto_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(dados){
			$('#agrega-registros').html(dados);
		}
	});
	return false;
	});
	
	
	$('#novo-produto').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra-produto').modal({
			show:true,
			backdrop:'static'
		});
	});
	
	$('#bs-prod').on('keyup',function(){
		var dados = $('#bs-prod').val();
		var url = 'categoria_livro/busca_categoria.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dados='+dados,
		success: function(dados){
			$('#agrega-registros').html(dados);
		}
	});
	return false;
	});
	
});

function agregaEmpregado(){
	var url = 'categoria_livro/criar_categoria.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#mensagem').addClass('bien').html('Registro completado com exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}else{
			$('#mensagem').addClass('bien').html('Edição completada com exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}
		}
	});
	return false;
}
function reportePDF(){
	window.open('categoria_livro/categoriaPDF.php');
}
function eliminarEmpregado(id){
	var url = 'categoria_livro/elimina_categoria.php';
	var pregunta = confirm('Tem certeza que deseja eliminar esta categoria?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}

function editarEmpregado(id){
	$('#formulario')[0].reset();
	var url = 'categoria_livro/edita_categoria.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var dados = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Ediçao');
				$('#id-prod').val(id);
				$('#nome').val(dados[0]);
				$('#subcate').val(dados[1]);
				$('#registra-produto').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function paginacao(partida){
	var url = 'categoria_livro/paginar_categoria.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'partida='+partida,
		success:function(data){
			var array = eval(data);
			$('#agrega-registros').html(array[0]);
			$('#paginacao').html(array[1]);
		}
	});
	return false;
}