<?php
    include'adm_header.php';
	include_once 'pdf/config.inc.php';
	if (isset($_POST['enviar'])) {
		$nome = $_FILES['arquivo']['name'];
		$tipo = $_FILES['arquivo']['type'];
		$tamanho = $_FILES['arquivo']['size'];
		$caminho = $_FILES['arquivo']['tmp_name'];
		$foto = $_FILES["foto"];
		$destino = "pdf/arquivos/" . $nome;
	
	// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) {
		
		// Largura máxima em pixels
		$largura = 2150;
		// Altura máxima em pixels
		$altura = 2180;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 1000000;

		$error = array();

    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
	
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($foto["tmp_name"]);
	
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}

		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
		
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($foto["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}

		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];

        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "foto/" . $nome_imagem;

			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
	
    
    if ($nome != "") {
        if (copy($caminho, $destino)) {
            $livro= $_POST['livro'];
            $titulo= $_POST['titulo'];
            $descri= $_POST['descricao'];
			$autor = $_POST['autor'];
            $db=new Conect_MySql();
            $sql = "INSERT INTO pdf (id_categoria, titulo,descricao, autor, foto, tamanho, tipo, nome_arquivo)
			VALUES('$livro','$titulo','$descri','$autor','$caminho_imagem','$tamanho','$tipo','$nome')";
            $query = $db->execute($sql);
            if($query){
                    echo '<script> alert("Livro enviado com sucesso!.");</script>';
                   echo '<script> window.location="enviar_pdf.php"; </script>';

            }
        } else {
              echo '<script> alert("Erro ao enviar livro.");</script>';
        }
    }
}

	}
	
	}
?>
<?php
    include_once 'pdf/config.inc.php';
    $db=new Conect_MySql();
    $consulta="select id_categoria, nome_categoria from categorias";
    $resultado=$db->execute($consulta);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Easy Book | Painel Administrativo</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="livros/css/estilo.css" rel="stylesheet">
<script src="livros/js/jquery.js"></script>
<script src="clientes/myjava.js"></script>

</head>
<body>
      

        <div id="page-wrapper">

          <div class="container-fluid">
             <br>
                

            <div class="row">
              <div class="col-lg-12">
               <br>
                 
              </div>

              </div>
               <h1 class="page-header2">
                            <small><img src="../imagens/logo.png"></small> Enviar livros
                </h1>
              <!-- /.row -->
            <br>
            <form method="post" action="" enctype="multipart/form-data">
                <table width="70%">
                    <tr>
                        <td><label>Título:</label></td>
                        <td><input type="text" name="titulo" class="form-control" required></td>
                    </tr>
                     <tr>
                        <td><label>Categoria:</label></td>
                      <td>
                      <select name="livro" class="form-control">
                      <?php 
                     if ($resultado->num_rows > 0) //se a variavel tiver pelo menos 1 fila entao seguimos com o codigo
                        {
                            while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) 
                            {
                         echo "<option value='".$row['id_categoria']."'>".$row['nome_categoria']."</option>";    }
                        }
                        else
                        {
                            echo "Não há resultados";
                        }
                                              ?>
                     </select>
                      </td>
                    </tr>
                    <tr>
                        <td><label>Descrição:</label></td>
                        <td><textarea name="descricao" class="form-control" required></textarea></td>
                    </tr>
					
					<tr>
                        <td><label>Autor:</label></td>
                        <td><textarea name="autor" class="form-control" required></textarea></td>
                    </tr>
					<tr>
					<td><label>Foto:</label></td>
                        <td><input type="file" class="form-control" required name="foto" maxlength="100"/></td>
                    </tr>
					
                    <tr>
                        <td><label>PDF:</label></td>
                        <td><input type="file" name="arquivo" class="form-control" required></td>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Enviar Livro" name="enviar" class="btn btn-success">
                        <a href="lista_pdf.php"><b style="color:#fff; padding:9px; background:#2329b1; border-radius:5px">Lista de Livros</b></a>

                        </td>
                    </tr>
                </table>
            </form>            
  
   
                <br>
            </div>
            
        </div>
       
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>
</html>