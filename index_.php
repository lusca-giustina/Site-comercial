<!DOCTYPE html>
<html lang="en">
<head>
  <title>Exemplo E-Commerce</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<center>
<table class="table" align="center" width="100%">
<tbody>
<?php
          include_once("conexao_banco.php");          
          $sql = "SELECT * FROM produto where nome like '%%' order by rand()";
          $result = $conn -> query($sql);           
		  $linha = 1;
		  echo'<tr>';
          while($row = $result->fetch_assoc())
		  {		
		  echo '<td align="center">';
		  echo '<h2><font color="#000099">'.$row['descricao'].'</font></h2><br>';           
          echo '<img src="img/'.$row['img'].'" width="130px" height="130px" /> ';
          echo '<br>Preço : R$ '.number_format($row['valor'], 2, ',', '.');
             echo '<a href="carrinho.php?acao=add&id='.$row['idproduto'].'">
			 <img src="img/carrinho.jpg" width="35px" height="35px"></a>';	
             echo '</td>';}
			 //Alterar o Número de Colunas a ser exibido
			if ($linha==4)
			{
				$linha = 0;
				echo '</tr><tr>';
			}
			$linha++;			
		  	
		 
     $conn ->close();
	?>

         </tbody>
   </table>

    </body>

    </html>
