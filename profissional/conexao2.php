<?php
$servidor = 'localhost';
$usuario  = 'root';
$senha 	  = '';
$banco 	  = 'appmobile';
	try{
	  $conexao = new PDO('mysql:host='.$servidor.';dbname=appmobile', $usuario, $senha);  
	  $conn = new PDO('mysql:host='.$servidor.';dbname=appmobile', $usuario, $senha);  
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
?>