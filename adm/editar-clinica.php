<?php session_start(); ?>
<?php
	error_reporting( ~E_NOTICE );
	
	require_once 'conexao2.php';
	
	if(isset($_GET['codpj']) && !empty($_GET['codpj']))
	{
		$codpj = $_GET['codpj'];
		$sql = 'SELECT nome, razaosocial, cnpj, email, senha FROM clinicapj WHERE codpj =:codpj';
		
		$stmt = $conn ->prepare($sql);
		
		
		$stmt->execute(array(':codpj'=>$codpj));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
	}
	else{
		echo "Produto não cadastrado";
	}
	
	if(isset($_POST['alterar']))
	{
		
	
	
		$nome = $_POST['nome'];
		$razaosocial = $_POST['razaosocial'];
        $cnpj = $_POST['cnpj'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
		


		if(!isset($errMSG))
		{				
		
			$sql = 'UPDATE clinicapj SET nome=:nome,razaosocial=:razaosocial,cnpj=:cnpj,email=:email,senha=:senha WHERE codpj=:codpj';
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':nome',$nome);
			$stmt->bindParam(':razaosocial',$razaosocial);
            $stmt->bindParam(':cnpj',$cnpj);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':senha',$senha);
		
			$stmt->bindParam(':codpj',$codpj);
			
		
			if($stmt->execute()){
			
				?>
                <script>
				alert('Alteração realizada com sucesso');
				window.location.href='lista-clinica.php';
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
	<div class="container-fluid editarclinica">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <h3>Editar Clínica:</h3>
    </div>
    <div class="col-sm-3"></div>
  </div>
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
	  <form class="form-horizontal" method="POST" enctype="multipart/form-data">

	  <?php if(isset($errMSG)){ ?>
        <div class="alert alert-danger">
		  <span class="glyphicon glyphicon-info-sign"></span> &nbsp; 
		  <?php echo $errMSG; ?>
        </div>
      <?php } ?>

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" value="<?php echo $row['nome']; ?>">
        </div>
        <div class="form-group">
            <label for="razaosocial">Razão Social:</label>
            <input type="text" class="form-control" id="razaosocial" placeholder="Razão Social" name="razaosocial" value="<?php echo $row['razaosocial']; ?>">
        </div>
        <div class="form-group">
            <label for="cnpj">CNPJ:</label>
            <input type="text" class="form-control" id="cnpj" placeholder="CNPJ" name="cnpj"  maxlength="18" value="<?php echo $row['cnpj']; ?>">
        </div>  
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" value="<?php echo $row['email']; ?>">
         </div> 
         <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha" value="<?php echo $row['senha']; ?>">
         </div>
        <button type="submit" name="alterar" class="btn btn-info">
        <span class="glyphicon glyphicon-save"></span>Alterar</button>
      </form>
    </div>
    <div class="col-sm-3"></div>
  </div>
  <script src="js/cep.js" type="text/javascript"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
	 <script type="text/javascript">
	$(document).ready(function(){	
		$("#cnpj").mask("99.999.999/9999-99");
	});
</script>
 </div>
</body>

<?php include "../footer.php" ?>