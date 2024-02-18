<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	
</head>
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');	
		body {
  background-image: url('../Trabalho final/fundo.jpg');
	}
	
	.formLogin {
    display: flex;
    flex-direction: column;
    background-color: #fff;
    border-radius: 7px;
    padding: 40px;
    box-shadow: 10px 10px 40px rgba(0, 0, 0, 0.4);
    gap: 5px
}

.areaLogin img {
    width: 420px;
}

.formLogin h1 {
    padding: 0;
    margin: 0;
    font-weight: 500;
    font-size: 2.3em;
}

.formLogin p {
    display: inline-block;
    font-size: 14px;
    color: #666;
    margin-bottom: 25px;
}

.formLogin input {
    padding: 15px;
    font-size: 14px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    margin-top: 5px;
    border-radius: 4px;
    transition: all linear 160ms;
    outline: none;
}


.formLogin input:focus {
    border: 1px solid #f72585;
}

.formLogin label {
    font-size: 14px;
    font-weight: 600;
}

.formLogin a {
    display: inline-block;
    margin-bottom: 20px;
    font-size: 13px;
    color: #555;
    transition: all linear 160ms;
}

.formLogin a:hover {
    color: #f72585;
}

.btn {
    background-color: #f72585;
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    border: none !important;
    transition: all linear 160ms;
    cursor: pointer;
    margin: 0 !important;

}

.btn:hover {
    transform: scale(1.05);
    background-color: #ff0676;

}

	</style>
<body>

<div class="container">
	<p>
		<br>
	</p>
	<h2><center>Bem vindo(a)!</center></h2>
<div class="page">
        <form action="#" method="post" class="formLogin">
            <h1>Login</h1>
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" placeholder="Digite o email cadastrado" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Senha:</label>
      <input type="password" class="form-control"  placeholder="Digite a senha cadastrada" name="senha">
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
		$_SESSION['id_cliente']	= $row['id_cliente'];
			
	
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
