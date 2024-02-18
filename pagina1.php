<?php
session_start();
$a="tecnico em imformatica";
$_SESSION['curso']=$a;
if(isset($_SESSION['curso']))
	echo"meu curso e :".$_SESSION['curso'];
else
	echo"sessão invalida";

?>