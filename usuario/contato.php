<?php session_start(); ?>

<?php
include "header.php";
?>

<?php
   if(!isset($_SESSION['cliente']));   
  
?>
<?php
// Conexão com o banco de dados
	include "conexao.php";
	if (isset($_POST['cadastrar'])) {
		
		// Recupera os dados dos campos
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$assunto = $_POST['assunto'];
		$mensagem = $_POST['mensagem'];
        $codcliente = $_SESSION['cliente'];
		
		// Insere os dados no banco
		$sql = "insert into contato values(null,'".$nome."','".$email."','".$telefone."','".$assunto."','".$mensagem."','".$codcliente."')";	
		$consulta = mysqli_query($conexao, $sql);

		// Se os dados forem inseridos com sucesso
		if ($sql){
			echo "<script type=\"text/javascript\">
				  alert(\"Menssagem enviada com sucesso.\");
				  </script>";
			} else{
                echo "Não Enviada.";
            }
      }
		
		
	
?>

<body>
    <div class="container-fluid contato">
      <div class="row">
    	<div class="col-sm-3"></div>
    	<div class="col-sm-6">
    		<h3>Envie sua Menssagem: </h3>

			<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" name="cadastro">
				<div class="form-group">
					<label for="nome">Nome:</label>
					<input type="text" class="form-control" id="nome" placeholder="Nome" name="nome"/>
				</div>
				<div class="form-group">
      				<label for="email">E-mail:</label>
					<input type="email" class="form-control" id="email" placeholder="E-mail" name="email">
				</div>
				<div class="form-group">
      				<label for="telefone">Telefone:</label>
					<input type="text" class="form-control" id="telefone" placeholder="Telefone" name="telefone"/>
				</div>
				<div class="form-group">
      				<label for="assunto">Assunto:</label>
					<input type="text" class="form-control" id="assunto" placeholder="Assunto" name="assunto"/>
				</div>
				<div class="form-group">
					<label for="mensagem">Mensagem:</label>
					<textarea type="text" class="form-control" id="mensagem" placeholder="Mensagem" name="mensagem"></textarea>
				</div>

				<input type="submit" name="cadastrar" class="btn btn-info"value="Enviar"/>
            	<button type="reset" class="btn btn-info">Limpar</button>
        	</form>
        </div>
    	<div class="col-sm-3"></div>
    </div>
   </div>
</body>

<?php
include "../footer.php";
?>