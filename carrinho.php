<?php
  date_default_timezone_set('America/Sao_Paulo'); 
  session_start(); 
  if(!isset($_SESSION['carrinho'])){ 
    $_SESSION['carrinho'] = array(); 
  }
  if(isset($_GET['acao'])){ 
  
    //ADICIONAR CARRINHO 
    if($_GET['acao'] == 'add'){ 
      $id = $_GET['id']; 
      if(!isset($_SESSION['carrinho'][$id]))
        $_SESSION['carrinho'][$id] = 1; 
      else  
        $_SESSION['carrinho'][$id] += 1; 
      } 
	  
	
	//REMOVER DO CARRINHO 
    if($_GET['acao'] == 'del'){ 
      $id = $_GET['id']; 
      if(isset($_SESSION['carrinho'][$id])){ 
        unset($_SESSION['carrinho'][$id]); 
      } 
    } 
	
	//ALTERAR QUANTIDADE 
    if($_GET['acao'] == 'up'){ 
      if(is_array($_POST['prod'])){ 
        foreach($_POST['prod'] as $id => $qtd){
            if(!empty($qtd) || $qtd <> 0)
              $_SESSION['carrinho'][$id] = $qtd;
            else
              unset($_SESSION['carrinho'][$id]);    
        }
      }
    }
          
   }
          
          
    ?>
   <!DOCTYPE html>
<html lang="en">
<head>
  <title>Carrinho</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
    <body>
    <div class="container">
    
      

      <div class="content" align="center">

    <div class="table-responsive" align="center">


  <table class="table center-block" align="center">
    <caption>Carrinho de Compras</caption>
    <thead>
      <tr>
        <th >Imagem</th>
        <th >Produto</th>
        <th >Quantidade</th>
        <th >Preço</th>
        <th >SubTotal</th>
      </tr>
    </thead>
     <form action="?acao=up" method="post">
    <tfoot>   
      <tr>
        <td colspan="6"><input type="submit" value="Atualizar Carrinho" /></td>
     
      <td colspan="5"> <button type="button" class="btn btn-light"><a href="produtos.php">Continuar Comprando</a></td></button>
       </tr>       
    </tfoot>
    <tbody>
     <?php
        if(count($_SESSION['carrinho']) == 0){
          echo '
        <tr>
          <td colspan="5">Não há produto no carrinho <br> <img src="tristeza.jpg" width="130px" height="130px"></td>
        </tr>';
          } else {
                require("conexao_banco.php");
                $total = 0;
                foreach($_SESSION['carrinho'] as $id => $qtd){
                        $sql   = "SELECT *  FROM produto WHERE id_produto= $id";
                        $qr    = $conn-> query($sql);
                        $ln = $qr->fetch_assoc();
                        $nome  = $ln['descricao'];
                        $preco = number_format($ln['valor'], 2, ',', '.');
                        $sub   = number_format($ln['valor'] * $qtd, 2, ',', '.');
                        $total += ($ln['valor'] * $qtd);
                         echo '
              <tr>';  
			         echo '<td><img src="img/'.$ln['img'].'"  class="img-responsive  center-block width="120px" height="120px" ></td>';    
              echo'  <td>'.$nome.'</td>
                <td><input type="number" min="1" name="prod['.$id.']" value="'.$qtd.'" /></td>
                <td>R$ '.$preco.'</td>
                <td>R$ '.$sub.'</td>
                <td><a href="?acao=del&id='.$id.'"><img src="lixeira.png" width="60px" height="40px" ></a></td>
                 </tr>';
                }
                $total = number_format($total, 2, ',', '.');
                echo '<tr>                         
              <td colspan="5"><b>Total</b></td>
              <td><b>R$ '.$total.'</b></td>
			 <td><img src="obrigado.gif" width="240px" height="240px" ></td>
                    </tr>';
          }
		
                   ?>
       
         </tbody>
    </form>  
 </table>



</div>



      <div class="content" align="center">

    <div class="table-responsive" align="center">


  <table class="table center-block" align="center">   
     <tr>
        <th > Finalizar Compra</th>
        <th ><form action="finalizar.php" method="post" name="pgto">
        <select name="FORMA">
  <option value="BOLETO">BOLETO</option>
  <option value="CARTÃO">CARTÃO</option>
  <option value="DEPOSITO">DEPOSITO</option>
      </select>
</th>
        <th ></th>
        <th ></th>
        <th ></th>      
      </tr>
        <tr>    
        <th ><input type="submit" value="FINALIZAR VENDA"></th>
            <th ></th>
        <th ></th>
        <th ></th>
        <th ></th>
      
      </tr>       
   </table>
   </form>

   </body>
</html>

