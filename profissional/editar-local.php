<?php session_start(); ?>

<?php
	error_reporting( ~E_NOTICE );
	
	require_once 'conexao2.php';
	
	if(isset($_GET['coddeatendimento']) && !empty($_GET['coddeatendimento']))
	{
		$coddeatendimento = $_GET['coddeatendimento'];
		$sql = 'SELECT cep, endereco, numero, bairro, cidade, estado, telefone, celular, whatsapp FROM localdeatendimento WHERE coddeatendimento =:coddeatendimento';
		
		$stmt = $conn ->prepare($sql);
		
		
		$stmt->execute(array(':coddeatendimento'=>$coddeatendimento));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
	}
	else{
		echo "Produto não cadastrado";
	}
	
	if(isset($_POST['alterar']))
	{
		
	
	
		$cep = $_POST['cep'];
		$endereco = $_POST['endereco'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $telefone = $_POST['telefone'];
        $celular = $_POST['celular'];
        $whatsapp = $_POST['whatsapp'];
		


		if(!isset($errMSG))
		{				
		
			$sql = 'UPDATE localdeatendimento SET cep=:cep,endereco=:endereco,numero=:numero,bairro=:bairro,cidade=:cidade,estado=:estado,telefone=:telefone,celular=:celular,whatsapp=:whatsapp WHERE coddeatendimento=:coddeatendimento';
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':cep',$cep);
			$stmt->bindParam(':endereco',$endereco);
            $stmt->bindParam(':numero',$numero);
            $stmt->bindParam(':bairro',$bairro);
            $stmt->bindParam(':cidade',$cidade);
            $stmt->bindParam(':estado',$estado);
            $stmt->bindParam(':telefone',$telefone);
            $stmt->bindParam(':celular',$celular);
            $stmt->bindParam(':whatsapp',$whatsapp);
		
			$stmt->bindParam(':coddeatendimento',$coddeatendimento);
			
		
			if($stmt->execute()){
			
				?>
                <script>
				alert('Alteração realizada com sucesso');
				window.location.href='lista-locais.php';
				</script>
                <?php
			
			}else{
				$errMSG = "Não foi possível realizar a alteração";
			}
		
		}
		
						
	}
	
?>

<?php include "header.php" ?>

<body>
    <div class="container-fluid edlocatendimento">
    	<div class="row">
    		<div class="col-sm-3"></div>
    		<div class="col-sm-6">
    			<h3>Editar Local:</h3>
    		</div>
    		<div class="col-sm-3"></div>
    	</div>
    	<div class="row">
    		<div class="col-sm-3"></div>
    		<div class="col-sm-6">
    			<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" name="cadastro" >

    		        <?php if(isset($errMSG)){ ?>
        			<div class="alert alert-danger">
          				<span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        			</div>
        			<?php } ?>

					<div class="form-group">
						<label for="cep">CEP:</label>
						<input type="text" class="form-control" id="cep" placeholder="CEP" name="cep" value="<?php echo $row['cep']; ?>">  
							<span class="input-group-btn">
								<button class="btn btn-info" type="button" id="buscaCEP">Buscar</button>
							</span>
	 				</div>
					<div id="cepstatus" ></div>

					<div class="form-group">
						<label for="endereco">Endereço:</label>
						<input type="text" class="form-control" id="endereco" placeholder="Endereço" name="endereco" readonly value="<?php echo $row['endereco']; ?>"/>
					</div>
					<div class="form-group">
	      				<label for="numero">Número:</label>
						<input type="text" class="form-control" id="numero" placeholder="Número" name="numero" value="<?php echo $row['numero']; ?>">
					</div>
					<div class="form-group">
	      				<label for="bairro">Bairro:</label>
						<input type="text" class="form-control" id="bairro" placeholder="Bairro" name="bairro" readonly value="<?php echo $row['bairro']; ?>"/>
					</div>
					<div class="form-group">
	      				<label for="cidade">Cidade:</label>
						<input type="text" class="form-control" id="cidade" placeholder="Cidade" name="cidade" readonly value="<?php echo $row['cidade']; ?>"/>
					</div>
					<div class="form-group">
						<label for="estado">Estado:</label>
						<input type="text" class="form-control" id="uf" placeholder="Estado" name="estado" readonly value="<?php echo $row['estado']; ?>"/>
					</div>
					<div class="form-group">
						<label for="telefone">Telefone:</label>
						<input type="text" class="form-control" id="telefone" placeholder="Telefone" name="telefone" maxlength="11" value="<?php echo $row['telefone']; ?>">
					</div>
					<div class="form-group">
						<label for="celular">Celular:</label>
						<input type="text" class="form-control" id="celular" placeholder="Celular" name="celular" maxlength="11" value="<?php echo $row['celular']; ?>">
					</div>
					<div class="form-group">
						<label for="whatsapp">WhatsApp:</label>
						<input type="text" class="form-control" id="whatsapp" placeholder="WhatsApp" name="whatsapp" maxlength="11" value="<?php echo $row['whatsapp']; ?>">
					</div>

					<button type="submit" name="alterar" class="btn btn-info">
        				<span class="glyphicon glyphicon-save"></span> Alterar
        			</button>
        		</form>
    		</div>
    		<div class="col-sm-3"></div>
    	</div>
    </div>
	<script src="../js/cep.js" type="text/javascript"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#cep").mask("99.999-999");
});
</script>
</body>
<?php include "../footer.php" ?>



