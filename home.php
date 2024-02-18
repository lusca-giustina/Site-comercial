<?php
session_start();
?>
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
	

	
    </style>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="sliderengine/jquery.js"></script>
    <script src="sliderengine/amazingslider.js"></script>
    <link rel="stylesheet" type="text/css" href="sliderengine/amazingslider-1.css">
    <script src="sliderengine/initslider-1.js"></script>
	
</head>

<body>
	<p><br></p>
	<h1><br><center> Bem vindo(a) <?php if(isset($_SESSION['curso'])) echo $_SESSION['curso']; ?></center></h1>
	<p></p>
<h2><div class="topo" ><center>  <img src="mari.png" width="60" height="60" alt=""/><span>  <a href="home.php"> Ínicio</a>  | <a href="produtos.php">Produtos</a> | <a href="carrinho.php">Carrinho</a> |
		<img src="imgs/2353441.png" width="16" height="16" alt=""/> 
		<?php if(isset($_SESSION['curso']))
		echo $_SESSION['curso'].'| <a href="logout.php"> Logout </a>';
		else
		echo '<a href=cadastrar_cliente.php>Login</a>';
		?> | <a href="pedidos.php?idcliente=<?php echo $_SESSION['id_cliente'];?>">Meus Pedidos</a> |
	<a href="cadastrar.php">adm</a> 
	</center></div></h2>
	
<div class="amazingslider-wrapper" id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:100%; margin:0 auto;">
<div class="amazingslider" id="amazingslider-1" style="display: block; position: relative; margin: 0 auto; background-color:white; layer-background-color: #000000 ; border:0px none #000000;">
            <ul class="amazingslider-slides" style="display:none;">
                <li><img src="images/1.jpg" alt="R"  title="R" />
                </li>
                <li><img src="images/2.jpg" alt="R (1)"  title="R (1)" />
                </li>
				<li><img src="images/4.png" alt="R (1)"  title="R (1)" />
				</li>	
            </ul>
        </div>
    </div>
		<BR>
	<CENTER><table  width="716" border="0" align="center">
  <tbody>
    <tr>
      <th width="230" scope="col"><img  src="imgs/3.jpg" width="125" height="150" alt=""/></th>
      <th width="230" scope="col"><img src="imgs/4.jpg" width="125" height="150" alt=""/></th>
      <th width="230" scope="col"><img src="imgs/5.jpg" width="125" height="150" alt=""/></th>
      </tr>
    <tr>
      <th>Cupcake Veludo Vermelho (red velvet)</th>
      <th>Cupcake Natalino (para fim de ano)</th>
      <th>Cupcake de jabuticaba</th>
      </tr>
    <tr>
      <th>R$ 4,50</th>
      <th>R$ 4,50</th>
      <th>R$ 4,50</th>
      </tr>
  </tbody>
</table>
</CENTER>
	
		
		
</body>
</html>