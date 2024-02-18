<?php
$servername = "25dejulho.info";
$username = "lucas";
$password = "aula2023";
$banco    = "lucas";

// Create connection
$conn = new mysqli($servername, $username, $password,$banco);

// Check connection
if ($conn->connect_error) {
  echo '<div class="alert alert-danger text-center">
  <strong>Falha na Conexão!</strong><p>';
  die("Falha na Conexão: " . $conn->connect_error);
  
  echo '</div>'; 
 
}
//echo "Conexao efetuada com sucesso";
?>