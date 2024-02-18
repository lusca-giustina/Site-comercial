<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
	<style>
		
	body {
  background-image: url("mari.png");
		opaacity: 0.6;
		background-repeat: no-repeat;
		 background-position: center;
}
		
	</style>
<body>

<div class="container">
  <h2>LOGIN</h2>
  <form action="#" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" placeholder="escreva o email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">SENHA:</label>
      <input type="password" class="form-control"  placeholder="escreva a senha" name="senha">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember">lembre-me</label>
    </div>
    <button type="submit" class="btn btn-primary">logar</button>
	  <a href=home.php>voltar</a>
  </form>
</div>
<?php
	if($_POST)
	{ 
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	include_once("conexao_banco.php");
 	$sql="select
		id_cliente, nome,email,senha 
		from
		   cliente
		where
		email='$email'and
		senha='$senha'";
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
$row= $result->fetch_assoc();
			
		$nome = $row['nome'];
$_SESSION['curso']=$nome;
	
	echo'<div class="alert alert-success">
	<strong>sucesso!</strong>login efetuado com sucesso. nome:'.$nome.'
	</div>';
			header("refresh: 5; url=home.php");
		}
	else 
	{ 
	echo'<div class="alert alert-danger">
	<strong>erro de login</strong></div>';
		}
	$conn->close();
	}
	
	
?>
	
</body>
</html>