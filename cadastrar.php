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
  background-color: lightblue;
	
}
		
	</style>
<body>

<div class="container">
	<br>
	<div class="panel panel-primary">
	 <div class="panel-heading text-center"><strong>cadastro de produto</strong></div>
	<form action="upload.php" enctype="multipart/form-data" method="post">
  <div class="form-group">
    <label for="arquivo">selecione o arquivo:</label>
    <input type="file" class="form-control" name="arquivo" accept="img/*">
  </div>
  <div class="form-group">
    <label for="descricao">descrição</label>
    <input type="text" class="form-control" name="nome">
  </div>
  <div class="form-group">
    <label for="valor">valor</label>
    <input type="text" class="form-control" name="valor" onKeyPress="return(event.charCode >=48 && event.charCode <=57) || event.charCode == 13 || event.charCode == 44" required >
  </div>
  <button type="submit" class="btn btn-primary">cadastrar produto</button>
</form>
	</div>
	</div>
	<p><br />
<div class="panel panel-primary">
      <div class="panel-heading text-center"><strong>Filtro de Pesquisa</strong></div>
      <div class="panel-body">
      
    <form action="#" method="post">
      <div class="form-group">
        <label for="primeiro">descrição</label>
        <input type="text" class="form-control" name="descricao" placeholder="Informe a descrição">
      </div>
      <button type="submit" class="btn btn-primary btn-block"><strong>Pesquisar</strong></button>
		<br>
		<div class="col-sm-6"><a href="home.php"><button type="button" class="btn btn-info btn-block"><strong>Voltar</strong></button></a></div>
		<div class="col-sm-6"><a href="consulta_cliente.php"><button type="button" class="btn btn-info btn-block"><strong>Alterar cadastro do cliente</strong></button></a></div>
    </form>
      
           
      </div>
</div>


<p><br/>
<table class="table table-striped">
  <thead>
      <tr>
		<th>id</th>
        <th>descrição</th>
        <th>valor</th>
        <th>img</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
<?php
include_once("conexao_banco.php");
if ($_POST)
{
	
    $descricao = $_POST['descricao'];
	
}
else
{

    $descricao='';

}

$sql = "select 
              id_produto, descricao, valor,img 
	    from 
			  produto
	    where 
		       descricao like '%$descricao%' 
	    order by id_produto
";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
  while($row = $result->fetch_assoc()) 
  {
     echo '<tr>';
	 echo '<td>'.$row['id_produto'].'</td>'; 
	 echo '<td>'.$row['descricao'].'</td>';
	 echo '<td>'.$row['valor'].'</td>';
	 echo '<td>'.$row['img'].'</td>'; 
	 echo '<td><a href="alterar_produto.php?id='.$row['id_produto'].'"><button type="button" class="btn btn-success btn-block">Alterar</button></a></td>';
	 echo '<td><a href="excluir_produto.php?id='.$row['id_produto'].'"><button type="button" class="btn btn-danger                     btn-block">Excluír</button></a></td>';
	  
	 echo '</tr>';
  }
} 
else 
   echo "Nenhum resultado encontrado";
$conn->close();
?>
   </tbody>
   </table>
 <?php
   echo '<h3>Total de Registros: '.$result->num_rows.'</h3>';
 ?>
</div>
</body>
</html>