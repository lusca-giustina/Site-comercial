<?php
session_start(); 
if(isset($_SESSION['curso']))
	echo"curso da pagina 1:".$_SESSION['curso'];
else
	echo"sessão invàlida!";
?>