<?php

session_start();  

include('conexao.php');

$email = $_POST['email'];
$senha = $_POST['senha'];
$tipologin = $_POST["usuario"];
echo $tipologin;

if($tipologin == "cliente") {

$sql = "select * from cliente where email='$email' and senha='$senha'";
$resultado = mysqli_query($conexao, $sql);
$total     = mysqli_num_rows($resultado);

if ( $total>0 ) {
	$dados = mysqli_fetch_array($resultado);
	$_SESSION['cliente']     = $dados['codcliente'];
	$_SESSION['clientenome'] = $dados['nome'];
	$_SESSION['clientecpf']  = $dados['cpf'];
	
	$_SESSION['clienteemail'] = $dados['email'];
	$_SESSION['clientesenha'] = $dados['senha'];
	echo "<script>
	        location.href='usuario/index.php';
          </script>";
          
    
    }else {
        echo "<script>
                alert('Cliente não encontrado');
                location.href='login.php';
            </script>";
    }

}if($tipologin == "medico"){
        $sql = "select * from medico where email='$email' and senha='$senha'";
        
        $resultado = mysqli_query($conexao, $sql);
        $total     = mysqli_num_rows($resultado);

    if ( $total>0 ) {
        $dados = mysqli_fetch_array($resultado);
        $_SESSION['medico']     = $dados['codmedico'];
        $_SESSION['mediconome'] = $dados['nome'];
        $_SESSION['medicocpf']  = $dados['cpf'];
        
        $_SESSION['medicoemail'] = $dados['email'];
        $_SESSION['medicosenha'] = $dados['senha'];
        echo "<script>
                location.href='profissional/index.php';
            </script>";
        }else {
            echo "<script>
                  alert('Cliente não encontrado');
                    location.href='login.php';
                  </script>";
         }

}if($tipologin == "clinicapj"){
        $sql = "select * from clinicapj where email='$email' and senha='$senha'";
        $resultado = mysqli_query($conexao, $sql);
        $total     = mysqli_num_rows($resultado);

    if ( $total>0 ) {
        $dados = mysqli_fetch_array($resultado);
        $_SESSION['clinica']      = $dados['codpj'];
        $_SESSION['clinicanome']  = $dados['nome'];
        $_SESSION['clinicacnpj']  = $dados['cnpj'];
        
        $_SESSION['clinicaemail'] = $dados['email'];
        $_SESSION['clinicasenha'] = $dados['senha'];
        echo "<script>
                location.href='clinicapj/index.php';
            </script>";          

    
    } else {
        echo "<script>
                alert('Cliente não encontrado');
                location.href='login.php';
            </script>";
    }
}

?>