<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Untitled Document</title>
</head>

<body>
<div class="container">
<p><br />
<div class="panel panel-primary">
      <div class="panel-heading text-center"><strong>Filtro de Pesquisa</strong></div>
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
      
      <button type="submit" class="btn btn-primary btn-block"><strong>Pesquisar</strong></button>
    </form>
      
           
      </div>
</div>


<p><br />
<table class="table table-striped">
  <thead>
      <tr>
      <th>Id</th>
        <th>Primeiro Nome</th>
        <th>Ultimo Nome</th>
        <th>Email</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
<?php
include_once("conexao.php");
if ($_POST)
{
    $primeiro = $_POST['primeiro'];
	$ultimo   = $_POST['ultimo'];
	$email    = $_POST['email'];
}
else
{
    $primeiro='';
	$ultimo='';
	$email='';	
}

$sql = "select 
              cliente_id, primeiro_nome, ultimo_nome, lower(email) as email 
	    from 
			  cliente
	    where 
		       primeiro_nome like '%$primeiro%' and 
			   ultimo_nome like '%$ultimo%' and
			   email like '%$email%'
	    order by primeiro_nome
";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
  while($row = $result->fetch_assoc()) 
  {
     echo '<tr>';
	  echo '<td>'.$row['cliente_id'].'</td>';
	 echo '<td>'.$row['primeiro_nome'].'</td>';
	 echo '<td>'.$row['ultimo_nome'].'</td>';
	 echo '<td>'.strtolower($row['email']).'</td>';
	 echo '<td><a href="novo.php"><button type="button" class="btn btn-primary btn-block">Novo</button></a></td>';
	 echo '<td><button type="button" class="btn btn-success btn-block">Alterar</button></td>';
	 echo '<td><a href=excluir.php?id='.$row['cliente_id'].'><button type="button" class="btn btn-danger btn-block">Excluír</button></a></td>';
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