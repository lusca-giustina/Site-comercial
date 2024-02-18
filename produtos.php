<?php
session_start();
?>
<!doctype html>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
	
	
	<style>
	html,body
	{
		overflow-x: hidden;
	}
	a:link {
    color: #FFFFFF;
    text-decoration: none;
		}
		
.topo 
{
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 70px;
background-color: #B0E0E6;
color: aliceblue;
font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, "sans-serif";
z-index: 1;
	
}

/* Style the search box inside the navigation bar */
.topo input[type=text] {
  float: right;
  padding: 6px;
  border: none;
  margin-top: 8px;
  margin-right: 16px;
  font-size: 17px;
}

/* When the screen is less than 600px wide, stack the links and the search field vertically instead of horizontally */
@media screen and (max-width: 600px) {
  .topo a, .topnav input[type=text] {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topo input[type=text] {
    border: 1px solid #ccc;
  }
}
	
    </style>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	
	
</head>

<body>
<h2><div class="topo" ><center> <span> <img src="mari.png" width="60" height="60" alt=""/><span> <a href="home.php"> Ínicio</a> | <a href="produtos.php">Produtos</a> | <a href="carrinho.php">Carrinho</a> | <img src="imgs/2353441.png" width="16" height="16" alt=""/><?php if(isset($_SESSION['curso']))
		echo $_SESSION['curso'].'| <a href="logout.php"> Logout </a>';
		else
		echo '<a href=cadastrar_cliente.php>Login</a>';
		?> 
	</center></div></h2>
	
	<BR>
		<BR>
			<BR>
				<BR>
				
	<table class="table" align="center" width="100%">
<tbody>
<?php
          include_once("conexao_banco.php");          
          $sql = "SELECT * FROM produto where descricao like '%%' order by rand()";
          $result = $conn -> query($sql);           
		  $linha = 1;
		  echo'<tr>';
          while($row = $result->fetch_assoc())
		  {		
		  echo '<td align="center">';
		  echo '<h2><font color="#000099">'.$row['descricao'].'</font></h2><br>';           
          echo '<img src="img/'.$row['img'].'" width="130px" height="130px" /> ';
          echo '<br>Preço : R$ '.number_format($row['valor'], 2, ',', '.');
             echo '<a href="carrinho.php?acao=add&id='.$row['id_produto'].'">
			 <img src="img/carrinho.png" width="35px" height="35px"></a>';	
             echo '</td>';
			 //Alterar o Número de Colunas a ser exibido
			if ($linha==4)
			{
				$linha = 0;
				echo '</tr><tr>';
			}
			$linha++;			
		  }		
		 
     $conn ->close();
	?>

         </tbody>
   </table>
		
</body>
</html>