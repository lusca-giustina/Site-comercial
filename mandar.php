<?PHP
	include_once('conexao_banco.php');
	$data = $_POST['data_nasc'];
	$cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $fone = $_POST['fone'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
	
		$sql = "insert into cliente(cpf, nome, senha, email, telefone, data_nasc)values ($cpf,'$nome',$senha,'$email','$fone','$data')";
		if($conn->query($sql)){
		         header("refresh: 3; url=cadastrar_cliente.php");}
		else
			echo"houve um problema.<br>".$conn->error;
		
	
	
	
	
	
	
	
	?>