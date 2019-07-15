<?php session_start(); ?>

<?php include "header.php"; ?>

<?php
   if(!isset($_SESSION['medico']));
?>

<?php
// Conexão com o banco de dados
    include "conexao.php";
   
	if (isset($_POST['cadastrar'])) {
		// Recupera os dados dos campos
        $nomeespecialidade = $_POST['nomeespecialidade'];
        $codmedico = $_SESSION['medico']; 
       

			// Insere os dados no banco
			$sql = "insert into especialidades values(null,'".$nomeespecialidade."','".$codmedico."',null)";

			$consulta = mysqli_query($conexao, $sql);
			// Se os dados forem inseridos com sucesso
			if ($sql){
				echo "
					<script type=\"text/javascript\">
						alert(\"Cadastrado com Sucesso.\");
					</script>
					";
			}else{
                echo "Não cadastrado";
            }
      }	
	
?>

<body>
    <div class="container-fluid cadespecialidade">
    	<div class="row">
    		<div class="col-sm-3"></div>
    	 	<div class="col-sm-6">
    	 	<h3>Cadastrar Especialidade:</h3>
    	 	</div>
    	 	<div class="col-sm-3"></div>
    	</div>
    	<div class="row">
    		<div class="col-sm-3"></div>
    	 	<div class="col-sm-6">
	    	 	<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" name="cadastro" >
					<div class="form-group">
						<label for="nomeespecialidade">Nome da Especialidade:</label>
						<input type="text" class="form-control" id="nomeespecialidade" placeholder="Especialidade" name="nomeespecialidade">  
	 				</div>

					<input type="submit" name="cadastrar" class="btn btn-info"value="Cadastrar"/>
	            	<button type="reset" class="btn btn-info">Limpar</button>
	        	</form>
    	 	</div>
    	 	<div class="col-sm-3"></div>
    	</div>
    </div>
</body>

<?php include "../footer.php"; ?>