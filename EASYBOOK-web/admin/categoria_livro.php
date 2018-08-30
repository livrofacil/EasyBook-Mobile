<?php include('adm_header.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Easy Book | Painel Administrativo</title>
    <link rel="shortcut icon" href="../imagens/control.ico">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/estilo.css" rel="stylesheet">
<script src="js/jquery.js"></script>
<script src="categoria_livro/myjava.js"></script>

</head>
<body>

        <div id="page-wrapper">

            <div class="container-fluid">
             <br>
                <!-- cabeçalho -->
                <div class="row">
                    <div class="col-lg-12">   
                    </div>
                </div>
                <h1 class="page-header">
                             Categorias
                        </h1>
                <!-- /.row -->
    <section>
    <table border="0" align="left">
        <tr>
        <td style="margin-rigth:20px;"><B> Buscar Categoria: </B></td>
        <td>&nbsp; &nbsp;</td>
        <td width="335"><input type="text" placeholder="Busca por Nome" id="bs-prod" style="border-radius:10px; padding-left:5px; heigth:25px; width:90%" /></td>
            <td></td>
            <td></td>
            <td></td>
            <td width="100"><button id="novo-produto" class="btn btn-success">Nova Categoria</button></td>
            <td>&nbsp; &nbsp;</td>
            <td width="200"></td>
        </tr>
    </table>
    </section>
 <br>
 <br>
    <div class="registros" style="width:100%;" id="agrega-registros"></div>
    <center>
        <ul class="paginacao" id="paginacao"></ul>
    </center>
    <!-- MODAL PARA  REGISTRO DE PRODUTOS-->
    <div class="modal fade" id="registra-produto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background:#839ca9;">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" style="color:white;" id="myModalLabel"><b>Manutenção de Categorias</b></h4>
            </div>
            <form id="formulario" class="form-group" onsubmit="return agregaEmpregado();">
            <div class="modal-body">
                <table border="0" width="100%">
                     <tr>
           <td colspan="2"><input type="text" class="form-control" required readonly id="id-prod" name="id-prod" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
                    </tr>
                     <tr>
                        <td width="150">Processo: </td>
                        <td><input type="text" class="form-control" required readonly id="pro" name="pro"/></td>
                    </tr>
                    <tr>
                        <td>Nome da categoria: </td>
                        <td><input type="text" class="form-control" required name="nome" id="nome" maxlength="100"/></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="mensagem"></div>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="modal-footer">
                <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
            </div>
            </form>
          </div>
        </div>
      </div>
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
<?php

?>
