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
					cpf, nome, senha, email, telefone 
			from 
		            cliente 
			where 
			        id_cliente= $id";
					
	$result = $conn->query($sql);
	$row    = $result -> fetch_assoc();
	$cpf   = $row['cpf'];
	$nome   = $row['nome'];
	$senha   = $row['senha'];
	$email = $row['email'];
	$telefone   = $row['telefone'];
}
		else
 header("location:consulta_cliente.php")
?>
<br/>
<div class="panel panel-primary">
      <div class="panel-heading text-center"><strong>alterar cliente</strong></div>
      <div class="panel-body">
      
    <form action="#" method="post">
      <div class="form-group">
        <label for="cpf"> CPF</label>
        <input type="text" class="form-control" name="cpf" value='<?php echo $cpf; ?>' >
      </div>
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" value='<?php echo $nome; ?>' >
      </div>
      <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="text" class="form-control" name="senha" value='<?php echo $senha; ?>' >
      </div>
		
		<div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" name="email" value='<?php echo $email; ?>' >
      </div>
		
		<div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="text" class="form-control" name="telefone" value='<?php echo $telefone; ?>' >
      </div>
		
        <div class="row">
          <div class="col-sm-6"><a href="consulta_cliente.php"><button type="button" class="btn btn-info btn-block"><strong>Voltar</strong></button></a></div>
          <div class="col-sm-6"><button type="submit" class="btn btn-primary btn-block"><strong>Salvar</strong></button></div>
        </div>
      
    </form>
      
           
      </div>
</div>
	<?php
	   if($_POST)
	   {
		   $cpf   = $_POST['cpf'];
	$nome   = $_POST['nome'];
	$senha   = $_POST['senha'];
	$email = $_POST['email'];
	$telefone   = $_POST['telefone'];
		   $sql = "UPDATE cliente SET cpf = '$cpf', nome= '$nome', senha='$senha', email='$email', telefone='$telefone' WHERE id_cliente ='$id'";
		
		   if($conn->query($sql))
		   {
			   
			   echo '<div class="alert alert-success">
  						<strong>Successo!</strong> Registro Salvo com Sucesso
					 </div>';
			   header("refresh: 1; url=consulta_cliente.php?id=".$id);
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