<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<p><br />
		
<?php
if ($_GET)
{
	include_once("conexao_banco.php");
	$id =  $_GET['id'];
	$sql = "select 
					descricao, valor, img 
			from 
		            produto
			where 
			        id_produto= $id";
					
	$result = $conn->query($sql);
	$row    = $result -> fetch_assoc();
	$nome   = $row['descricao'];
	$valor = $row['valor'];
	$img   = $row['img'];
}
		else
 header("location:cadastrar.php")
?>
<br/>
<div class="panel panel-primary">
      <div class="panel-heading text-center"><strong>alterar Produto</strong></div>
      <div class="panel-body">
      
    <form action="#" method="post">
      <div class="form-group">
        <label for="primeiro"> Descrição </label>
        <input type="text" class="form-control" name="descricao" value='<?php echo $nome; ?>' >
      </div>
      <div class="form-group">
        <label for="valor">Valor</label>
        <input type="text" class="form-control" name="valor" value='<?php echo $valor; ?>' >
      </div>
       <div class="form-group">
    <label for="arquivo">selecione o arquivo:</label>
    <input type="file" class="form-control" name="img" accept="image/*" value='<?php echo $img; ?>' >
      </div>
        <div class="row">
          <div class="col-sm-6"><a href="cadastrar.php"><button type="button" class="btn btn-info btn-block"><strong>Voltar</strong></button></a></div>
          <div class="col-sm-6"><button type="submit" class="btn btn-primary btn-block"><strong>Salvar</strong></button></div>
        </div>
      
    </form>
      
           
      </div>
</div>
	<?php
	   if($_POST)
	   {
		   $nome = $_POST['descricao'];
	       $valor   = $_POST['valor'];
	       $img    = $_POST['img']; 
		   $sql = "UPDATE produto SET descricao = '$nome', valor= '$valor', img='$img' WHERE id_produto ='$id'";
		   if($conn->query($sql))
		   {
			   
			   echo '<div class="alert alert-success">
  						<strong>Successo!</strong> Registro Salvo com Sucesso
					 </div>';
			   header("refresh: 1; url=cadastrar.php?id=".$id);
		   }
		   else
		   {
			    echo '<div class="alert alert-danger text-center">
  						<strong>Erro!</strong> Erro ao Salvar Registro.<br>'.$conn->error.'
					 </div>';
		   }
		   
	   }
	   
	   $conn -> close();
  ?>
	</div>
</body>
</html>