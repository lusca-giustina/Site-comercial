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
background-color: #F08080;
color: aliceblue;
font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, "sans-serif";
z-index: 1;
	

	
    </style>
	<script src="sliderengine/jquery.js"></script>
    <script src="sliderengine/amazingslider.js"></script>
    <link rel="stylesheet" type="text/css" href="sliderengine/amazingslider-1.css">
    <script src="sliderengine/initslider-1.js"></script>
	
</head>

<body>
	<h2><div class="topo" ><center> <span> <img src="mari.png" width="40" height="40" alt=""/><span> <a href="home.php"> Ínicio</a> | <a href="produtos.php">Produtos</a> | <a href="carrinho.php">Carrinho</a> | <?php if(isset($_SESSION['curso']))
		echo $_SESSION['curso']?> <img src="imgs/2353441.png" width="16" height="16" alt=""/>  | <?php if(isset($_SESSION['curso']))
		echo $_SESSION['curso'].'| <a href="logout.php"> Logout </a>';
		else
		echo '<a href=cadastrar_cliente.php>Login</a>';
		?> |
	<a href="cadastrar.php">adm</a> | <a href="pedidos.php?idcliente=<?php echo $_SESSION['id_cliente'];?>">Meus Pedidos</a>
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
      <th width="230" scope="col"><img  src="imgs/3.jpg" width="230" height="222" alt=""/></th>
      <th width="230" scope="col"><img src="imgs/4.jpg" width="230" height="222" alt=""/></th>
      <th width="230" scope="col"><img src="imgs/5.jpg" width="230" height="222" alt=""/></th>
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