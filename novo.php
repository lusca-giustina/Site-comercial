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
<div class="panel panel-primary">
      <div class="panel-heading text-center"><strong>Cadastrar Cliente</strong></div>
      <div class="panel-body">
      
    <form action="#" method="post">
      <div class="form-group">
        <label for="primeiro"> Primeiro Nome</label>
        <input type="text" class="form-control" name="primeiro" placeholder="Informe o primeiro nome">
      </div>
      <div class="form-group">
        <label for="ultimo">Ultimo Nome</label>
        <input type="text" class="form-control" name="ultimo" placeholder="Informe o ultimo nome">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" name="email" placeholder="Informe o email">
      </div>
        <div class="row">
          <div class="col-sm-6"><a href="selecao.php"><button type="button" class="btn btn-info btn-block"><strong>Voltar</strong></button></a></div>
          <div class="col-sm-6"><button type="submit" class="btn btn-primary btn-block"><strong>Salvar</strong></button></div>
        </div>
      
    </form>
      
           
      </div>
</div>
  <?php
       include_once('conexao.php');
	   
	   if($_POST)
	   {
		   $primeiro = $_POST['primeiro'];
	       $ultimo   = $_POST['ultimo'];
	       $email    = $_POST['email']; 
		   
		   $sql = "insert into cliente(primeiro_nome, ultimo_nome, email) values
		   ('$primeiro', '$ultimo', '$email')";
		   if($conn->query($sql))
		   {
			   
			   echo '<div class="alert alert-success">
  						<strong>Successo!</strong> Registro Salvo com Sucesso
					 </div>';
					 //header("location: http://www.terra.com.br");
					 header("refresh: 5; url=selecao.php");
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
