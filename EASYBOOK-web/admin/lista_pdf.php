<?php include 'adm_header.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Easy Book</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS costumizado -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/morris.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="libros/css/estilo.css" rel="stylesheet">
<script src="libros/js/jquery.js"></script>
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
                            <small><img src="../imagens/logo.png"></small> Lista de livros
                </h1>
            <br> 
            <form action="enviar_pdf.php">
                <input class="btn btn-primary" type="submit" value="Enviar PDF">
            </form>  
            <br>       
             <table class="table table-condensed table-stripped">
            <tr>
				<td>Foto</td>
                <td>Categoria</td>
                <td>Título</td>
                <td>Descrição</td>
				<td>Autor</td>
                <td>Tamanho</td>
                <td>Tipo</td>
                <td>Nome</td>
                <td></td>
            </tr>
        <?php
        include 'pdf/config.inc.php';
        $db=new Conect_MySql();
            $sql = "select * from pdf";
            $query = $db->execute($sql);
            while($dados=$db->fetch_row($query)){?>
            <tr>
				<td><?php echo "<img src='".$dados['foto']."' alt='Foto de exibição' width='90px' height='70px' />"; ?></td>
                <td><?php echo $dados['id_categoria']; ?></td>
                <td><?php echo $dados['titulo']; ?></td>
                <td><?php echo $dados['descricao']; ?></td>
				<td><?php echo $dados['autor']; ?></td>
                <td><?php echo $dados['tamanho']; ?></td>
                <td><?php echo $dados['tipo']; ?></td>
                <td><button class="btn btn-warning"><a href="pdf/arquivo.php?id=<?php echo $dados['id_pdf']?>"><b>Ver</b></a></button></td>
                <td></td>
            </tr>
                
          <?php  } ?>
            
        </table>
   
                            
                       
                <br>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
