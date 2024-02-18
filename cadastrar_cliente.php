<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
	<style>
		
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
	<br>
	<div class="panel panel-primary">
	 <div class="panel-heading text-center"><strong>Cadastro de cliente</strong></div>
	<form action="mandar.php" enctype="multipart/form-data" method="post" class="formLogin">
  <div class="form-group">
	  <center><h1> Cadastre-se e aproveite ao máximo as nossas delícias!</h1></center>
    <label for="arquivo">CPF</label>
    <input type="number" class="form-control" name="cpf">
  </div>
	<div class="form-group">
    <label for="arquivo">Nome</label>
    <input type="text" class="form-control" name="nome">
  </div>	
  <div class="form-group">
    <label for="descricao">Email</label>
    <input type="email" class="form-control" name="email" placeholder="nome@email.com">
  </div>
	<div class="form-group">
    <label for="descricao">Telefone</label>	
	<input type="tel" class="form-control" name="fone" required pattern="[0-9]{2} [0-9]{5}-[0-9]{4}" placeholder="55 99999-9999">	
	</div>	
		<div class="form-group">
    <label for="descricao">Data de nascimento</label>
		<input type='date' class="form-control" name='data_nac'>
		</div>
	<div class="form-group">
    <label for="descricao">Senha</label>
    <input type="password" class="form-control" name="senha">
  </div>
		
  <button type="submit" class="btn btn-primary">Concluir cadastro</button>

</form>
		<p><br></p>
	Já é nosso cliente? <button type="button" class="btn btn-light"><a href="login.php">Faça agora seu login!</a></button>
	</div>
	</div>