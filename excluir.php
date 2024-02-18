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
	<?php
	if($_GET){
	include_once('conexao_banco.php');
	
		$id= $_GET['id'];
		$sql="select cpf, nome, senha, email, telefone from cliente where id_cliente=$id";
		$result=$conn->query($sql);
		$row = $result->fetch_assoc();
		$nome = $row['nome'];
	}
	
	
	
	
	
	?>
<div class="container">
<p><br/>
<div class="panel panel-primary">
      <div class="panel-heading text-center"><strong>exclusão de registro</strong></div>
      <div class="panel-body">
      ,
    <form action="#" method="post">
      <div class="form-group">
		  <h3><label for="primeiro"> confirma a exclusão º-º?</label></h3>
        
        <div class="row">
          <div class="col-sm-6"><a href="consulta_cliente.php"><button type="button" class="btn btn-info btn-block"><strong>Voltar</strong></button></a></div>
			</form>
      
           
      </div>
      </div>
</div>
			<?php
          echo'<a href=?id='.$id.'&resp=S > <button type="button" class="btn btn-danger btn-block"><strong>confirmar</strong></button></a>';
			?>
        
      
    
	<?php
	
	include_once('conexao_banco.php');
	if($_GET){
		if(isset($_GET['id']) and isset($_GET['resp']))
		{
			$id = $_GET['id'];
			$sql="delete from cliente where id_cliente=".$_GET['id'];
			if($conn->query($sql))
			   {

				   echo '<div class="alert alert-success">
							<strong>Successo!</strong> Registro deletado com Sucesso
						 </div>';
						 
			   }
			   else
			   {
					echo '<div class="alert alert-danger text-center">
							<strong>Erro!</strong> Erro ao deletar Registro.<br>'.$conn->error.'
						 </div>';
			   }
		}
		   
	   }
	   
	   $conn -> close();
	
	
	
	
	
	
	?>
</body>
</html>