<!DOCTYPE html>
<html lang="en">
<head>
  <title>Consulta cliente</title>
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

<div class="panel panel-primary">
      <div class="panel-heading text-center"><strong>Filtro de Pesquisa</strong></div>
      <div class="panel-body">
      
    <form action="#" method="post">
      <div class="form-group">
        <label for="primeiro">Nome</label>
        <input type="text" class="form-control" name="id_cliente" placeholder="Informe o nome do cliente">
      </div>
      <button type="submit" class="btn btn-primary btn-block"><strong>Pesquisar</strong></button>
		<br>
		<div class="col-sm-6"><a href="home.php"><button type="button" class="btn btn-info btn-block"><strong>Voltar</strong></button></a></div>
    </form>
      
           
      </div>
</div>


<p><br/>
<table class="table table-striped">
  <thead>
      <tr>
		<th>id_cliente</th>
        <th>cpf</th>
        <th>nome</th>
        <th>email</th>
        <th>telefone</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
<?php
include_once("conexao_banco.php");
if ($_POST)
{
	
    $descricao = $_POST['id_cliente'];
	
}
else
{

    $descricao='';

}

$sql = "select 
              id_cliente, cpf, nome, email, telefone 
	    from 
			  cliente
	    where 
		       nome like '%$descricao%' 
	    order by id_cliente
";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
  while($row = $result->fetch_assoc()) 
  {
     echo '<tr>';
	 echo '<td>'.$row['id_cliente'].'</td>'; 
	 echo '<td>'.$row['cpf'].'</td>';
	 echo '<td>'.$row['nome'].'</td>';
	 echo '<td>'.$row['email'].'</td>'; 
	  echo '<td>'.$row['telefone'].'</td>';
	 echo '<td><a href="alterar.php?id='.$row['id_cliente'].'"><button type="button" class="btn btn-success btn-block">Alterar</button></a></td>';
	 echo '<td><a href="excluir.php?id='.$row['id_cliente'].'"><button type="button" class="btn btn-danger                     btn-block">Excluír</button></a></td>';
	  
	 echo '</tr>';
  }
} 
else 
   echo "Nenhum resultado encontrado :(";
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