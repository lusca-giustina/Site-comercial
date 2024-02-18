<?php 
 date_default_timezone_set('America/Sao_Paulo');
  session_start(); 
  if(!isset($_SESSION['carrinho'])){ 
    $_SESSION['carrinho'] = array(); 
//header("location: index.php");
  }   
  
  if(!isset($_SESSION['id_cliente'])){  
		header("location: login.php");
		exit;
  } 
  

    ?>
   <!DOCTYPE html>
<html lang="br">
<head>
  <title>Finalizar</title>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
    <body>
    
          <div class="container">
    
       <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" align="center">
       </div>
       <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" align="center">


      <div class="content" align="center">


    <div class="table-responsive" align="center">




     <?php
        if(count($_SESSION['carrinho']) == 0){
          echo '
        <tr>
          <td colspan="5">ERRO: Não há produto no carrinho <br> <img src="tristeza.jpg" width="130px" height="130px"></td>
        </tr>';
		  header('refresh:3; url=index_.php');
          } else {
					 	require_once("conexao_banco.php");
						$total = 0;
					    $data = date("Y-m-d");
						$hora = date("H:i:s");				 	
					 
					  if (!empty($_POST["FORMA"])) 
						 $forma_pgto = $_POST["FORMA"];    
					   else
						 $forma_pgto = '';
                                
				   $id_cliente = $_SESSION['id_cliente'] ;
                   $sql_vendas = "insert into vendas(data_emissao, hora, forma_pgto,id_cliente) values ('$data','$hora', '$forma_pgto', $id_cliente);";				   			    
				   $result     = $conn->query($sql_vendas);  
				   $idvenda    = $conn -> insert_id;   
                 // INSERINDO OS ITENS DA VENDA DO CARRINHO
                $total_qtd = 0;
                foreach($_SESSION['carrinho'] as $id => $qtd){

                        $sql   = "SELECT *  FROM produto WHERE id_produto= $id";
                        $qr    = $conn->query($sql);
                        $ln    = $qr ->fetch_assoc();
                        $id_produto  = $ln['id_produto'];  
                        $preco_unitario = $ln['valor'];                      
                        $total_item   = $preco_unitario * $qtd;// TOTAL DO ITEM
                        $total_qtd   += $qtd;
                        //$total_qtd   = $total_qtd + $qtd;
                        $total       +=  $total_item;
//inserção
                       
						$sql = "insert into vendas_item (id_produto, quantidade,preco_unitario, id_venda, total_item) values (
						$id_produto, $qtd, $preco_unitario, $idvenda, $total_item)";
						
						$qr    = $conn ->query($sql);
      
                }

$sql = "update vendas set total_nota = $total, numero_itens = $total_qtd where idvendas = $idvenda";
                        
						$qr    = $conn ->query($sql);
						
						unset($_SESSION['carrinho']);
						


echo "<h1> <center> COMPRA REALIZADA COM SUCESSO!<br>COMPRA NÚMERO: $idvenda </center></h1><br>";
echo '<h1> <center> Total da Compra: R$ '.number_format($total, 2, ',', '.').' </center></h1><br>';
echo "<a href=pedidos.php?idcliente=".$id_cliente."> MEUS PEDIDOS</a>";             
              
          }
                   ?>
		<h1><center><img src="obrigado.gif" width="240px" height="240px" ></center></h1>


 </div>
 </div>
 </div>
   <div class="col-xs-1 col-sm-1 col-md-1">
       </div>
</body>
</html>