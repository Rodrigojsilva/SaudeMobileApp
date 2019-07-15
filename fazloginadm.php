<?php

session_start();  

include('conexao.php');

$email = $_POST['email'];
$senha = $_POST['senha'];




$sql = "select * from adm where email='$email' and senha='$senha'";
$resultado = mysqli_query($conexao, $sql);
$total     = mysqli_num_rows($resultado);

if ( $total>0 ) {
	$dados = mysqli_fetch_array($resultado);
	$_SESSION['adm']     = $dados['codadm'];
	$_SESSION['admnome'] = $dados['nome'];
	
	$_SESSION['admemail'] = $dados['email'];
	$_SESSION['admsenha'] = $dados['senha'];
	echo "<script>
	        location.href='adm/index.php';
          </script>";
          
    
    }else {
        echo "<script>
                alert('Administrador não encontrado');
                location.href='loginadm.php';
            </script>";
    }