<!DOCTYPE html>
<html lang="en">
<head>
  <title>Meus Pedidos</title>
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
    <div class="container center-block"> 
     

     <?php
	     include_once("conexao_banco.php");
		 $sql = 'SELECT * FROM cliente where id_cliente='.$_GET['idcliente'];
		 $result = $conn ->query($sql);
		 $linha  = $result ->fetch_assoc();
		 $codigo = $linha['id_cliente'];
		 $nome   = $linha['nome'];	 
     ?>
     <p><br>
     <h2><center>Cliente: <?php echo $codigo.' - '.$nome; ?> - Bem vindo(a)!</center> </h2>
     <p><br>

		<h2> <center>Lista de pedidos do cliente</center></h2>
     <?php
	   
	     $sql = 'SELECT * FROM vendas where id_cliente='.$_GET['idcliente'];
		 $result = $conn ->query($sql);
		 while ($linha  = $result ->fetch_assoc())
		 {
		 echo '<h3> Pedido n°: '.$linha['idvendas'].' - Valor total do pedido: R$ '.$linha['total_nota'].' - Forma de Pagamento: '.$linha['forma_pgto'].'<p>';	
		 $sql_item = "SELECT id_venda, preco_unitario, img, total_item, quantidade, preco_unitario, p.descricao FROM vendas_item v, produto p where v.id_produto = p.id_produto and id_venda = ".$linha['idvendas']." order by id_venda";
					
			 if ($_POST)
{
	
    $descricao = $_POST['pedido'];
	
}
else
{

    $descricao='';

}
			 $sql = "select id_venda, preco_unitario, img, total_item, quantidade, preco_unitario, p.descricao
              
	    from 
			  vendas_item v, produto p
	    where 
		       id_venda like '%$descricao%' 
	    order by id_venda
";
		
				
				$result_item = $conn ->query($sql_item);
				//Laço de Repetição do Item
				 while ($linha_item  = $result_item ->fetch_assoc())
				 {
					 echo '<img src="img/'.$linha_item['img'].'" width="100px" height="100px">'.
					      '<br>Nome: '.$linha_item['descricao'].' - '.
					      'Preço: R$ '.$linha_item['preco_unitario'].' - '.
					      'Quantidade: '.$linha_item['quantidade'].' - '.
					      'Total: R$ '.$linha_item['total_item'].'<br>';
				 }
		          echo '<center>---------------------------------------------------</center>';
		 	
		 }
	 
	 
	 
	 
	 
	 
	 
	 ?>
	<button type="button" class="btn btn-light"><a href="home.php">Retornar à Página Inicial</a></button>
</div>

</body>
</html>