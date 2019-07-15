<?php session_start(); ?>
<?php
include "header.php";
?>
<?php
   if(!isset($_SESSION['clinica']));   
  
?>
<?php
// Conexão com o banco de dados
    include "conexao.php";
   
	if (isset($_POST['cadastrar'])) {
		// Recupera os dados dos campos
		$cep = $_POST['cep'];
		$endereco = $_POST['endereco'];
		$numero = $_POST['numero'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		$telefone = $_POST['telefone'];
		$celular = $_POST['celular'];
		$whatsapp = $_POST['whatsapp'];	
        $codpj = $_SESSION['clinica'];
       

			// Insere os dados no banco
			$sql = "insert into localdeatendimento values(null,'".$cep."','".$endereco."','".$numero."','".$bairro."','".$cidade."','".$estado."','".$telefone."','".$celular."','".$whatsapp."',null,'".$codpj."')";

			$consulta = mysqli_query($conexao, $sql);
			// Se os dados forem inseridos com sucesso
			if ($sql){
				echo "
					<script type=\"text/javascript\">
						alert(\"Cadastrado com Sucesso.\");
					</script>
					";
			}else{
                echo "Nao cadastrado";
            }
      }
		
		
	
?>

<body>
    <div class="container-fluid cadlocatendimento">
    	<div class="row">
    		<div class="col-sm-3"></div>
    		<div class="col-sm-6">
    			<h3>Cadastro de Local de Atendimento:</h3>
    		</div>
    		<div class="col-sm-3"></div>
    	</div>
    	<div class="row">
    		<div class="col-sm-3"></div>
    		<div class="col-sm-6">
    			<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" name="cadastro" >

					<div class="form-group">
						<label for="cep">CEP:</label>
						<input type="text" class="form-control" id="cep" placeholder="CEP" name="cep">  
							<span class="input-group-btn">
								<button class="btn btn-info" type="button" id="buscaCEP">Buscar</button>
							</span>
	 				</div>
					<div id="cepstatus" ></div>

					<div class="form-group">
						<label for="endereco">Endereço:</label>
						<input type="text" class="form-control" id="endereco" placeholder="Endereço" name="endereco" readonly/>
					</div>
					<div class="form-group">
	      				<label for="numero">Número:</label>
						<input type="text" class="form-control" id="numero" placeholder="Número" name="numero">
					</div>
					<div class="form-group">
	      				<label for="bairro">Bairro:</label>
						<input type="text" class="form-control" id="bairro" placeholder="Bairro" name="bairro" readonly/>
					</div>
					<div class="form-group">
	      				<label for="cidade">Cidade:</label>
						<input type="text" class="form-control" id="cidade" placeholder="Cidade" name="cidade" readonly/>
					</div>
					<div class="form-group">
						<label for="estado">Estado:</label>
						<input type="text" class="form-control" id="uf" placeholder="Estado" name="estado" readonly/>
					</div>
					<div class="form-group">
						<label for="telefone">Telefone:</label>
						<input type="text" class="form-control" id="telefone" placeholder="Telefone" name="telefone">
					</div>
					<div class="form-group">
						<label for="celular">Celular:</label>
						<input type="text" class="form-control" id="celular" placeholder="Celular" name="celular">
					</div>
					<div class="form-group">
						<label for="whatsapp">WhatsApp:</label>
						<input type="text" class="form-control" id="whatsapp" placeholder="WhatsApp" name="whatsapp">
					</div>

					<input type="submit" name="cadastrar" class="btn btn-info"value="Cadastrar"/>
	            	<button type="reset" class="btn btn-info">Limpar</button>
        		</form>
    		</div>
    		<div class="col-sm-3"></div>
    	</div>
    </div>
	<script src="../js/cep.js" type="text/javascript"></script>
	<script src="../js/cep.js" type="text/javascript"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#cep").mask("99.999-999");
});
</script>
</body>

<?php
include "../footer.php";
?>