<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example 1</title>
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
		$sql="select descricao, valor, img from produto where id_produto=$id";
		$result=$conn->query($sql);
		$row = $result->fetch_assoc();
		$nome = $row['descricao'];
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
		  <h3><label for="primeiro"> confirma a exclusão ?</label></h3>
        
        <div class="row">
          <div class="col-sm-6"><a href="cadastrar.php"><button type="button" class="btn btn-info btn-block"><strong>Voltar</strong></button></a></div>
			</form>
      
           
      </div>
      </div>
</div>
			<?php
          echo'<a href=?id='.$id.'&resp=S > <button type="button" class="btn btn-danger btn-block"><strong>confirmar</strong></button></a>';
			?>
        
      
    
	<?php
	include_once('conexao_banco.php');
	$result = $conn->query($sql);
	if($_GET){
		if(isset($_GET['id']) and isset($_GET['resp']))
		{
			$id = $_GET['id'];
			$sql="delete from produto where id_produto=".$id;
			if($conn->query($sql))
			   {

			   echo '<div class="alert alert-success">
							<strong>Successo!</strong> Registro deletado com Sucesso
						 </div>';
						 
			   }
			   else
			   {
					echo '<div class="alert alert-danger text-center">
							<strong>Erro!</strong> Erro ao deletar o Registro.<br>'.$conn->error.'
						 </div>';
			   }
		}
		   
	   }
	   
	   $conn -> close();
	
	
	
	
	
	
	?>
</body>
</html>