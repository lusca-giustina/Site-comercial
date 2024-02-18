<?PHP
	include_once('conexao_banco.php');
	$uploaddir = 'img/';
	$nome = $_POST['nome'];
	$valor = str_replace(",",".",$_POST['valor']);
  $imagem =  $_FILES['arquivo']['name'];
	$uploadfile = $uploaddir . $_FILES['arquivo']['name'];
	if(move_uploaded_file($_FILES['arquivo']['tmp_name'],$uploadfile))
	{
		$sql = "insert into produto(descricao, valor, img)value ('$nome',$valor,'$imagem')";
		if($conn->query($sql)){
			echo"arquivo enviado".'<br>'.$_FILES['arquivo']['name'];
		         header("refresh: 3; url=cadastrar.php");}
		else
			echo"houve um problema no upload do arquivo no banco de dados.<br>".$conn->error;
		
	}
	else
		echo"houve um ploblema no upload do arquivo<br>";
	
	
	
	
	
	?>
