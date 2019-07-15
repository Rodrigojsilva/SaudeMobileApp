<?php session_start(); ?>
<?php
	error_reporting( ~E_NOTICE );
	
	require_once 'conexao2.php';
	
	if(isset($_GET['codespecialidade']) && !empty($_GET['codespecialidade']))
	{
		$codespecialidade = $_GET['codespecialidade'];
		$sql = 'SELECT nomeespecialidade FROM especialidades WHERE codespecialidade =:codespecialidade';
		
		$stmt = $conn ->prepare($sql);
		
		
		$stmt->execute(array(':codespecialidade'=>$codespecialidade));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
	}
	else{
		echo "Especialidade não cadastrada";
	}
	
	if(isset($_POST['alterar']))
	{
		
	
	
		$nomeespecialidade = $_POST['nomeespecialidade'];

		


		if(!isset($errMSG))
		{				
		
			$sql = 'UPDATE especialidades SET nomeespecialidade=:nomeespecialidade WHERE codespecialidade=:codespecialidade';
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':nomeespecialidade',$nomeespecialidade);
			
		
			$stmt->bindParam(':codespecialidade',$codespecialidade);
			
		
			if($stmt->execute()){
			
				?>
                <script>
				alert('Alteração realizada com sucesso');
				window.location.href='lista-especialidades.php';
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
    <div class="container-fluid cadespecialidade">
    	<div class="row">
    		<div class="col-sm-3"></div>
    	 	<div class="col-sm-6">
    	 	<h3>Editar Especialidade:</h3>
    	 	</div>
    	 	<div class="col-sm-3"></div>
    	</div>
    	<div class="row">
    		<div class="col-sm-3"></div>
    	 	<div class="col-sm-6">
	    	 	<form class="form-horizontal" method="POST" enctype="multipart/form-data">
	    	 		
	    	 		<?php if(isset($errMSG)){ ?>
        			<div class="alert alert-danger">
          				<span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        			</div>
        			<?php } ?>

					<div class="form-group">
						<label for="nomeespecialidade">Nome da Especialidade:</label>
						<input type="text" class="form-control" id="nomeespecialidade" placeholder="Especialidade" name="nomeespecialidade" value="<?php echo $row['nomeespecialidade']; ?>"/>  
	 				</div>

					<button type="submit" name="alterar" class="btn btn-info">
                    	<span class="glyphicon glyphicon-save"></span> Alterar
               		</button>

	        	</form>
    	 	</div>
    	 	<div class="col-sm-3"></div>
    	</div>
    </div>
</body>

<?php include "../footer.php" ?>