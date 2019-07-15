<?php session_start(); ?>
<?php
	error_reporting( ~E_NOTICE );
	
	require_once 'conexao2.php';
	
	if(isset($_GET['codmedico']) && !empty($_GET['codmedico']))
	{
		$codmedico = $_GET['codmedico'];
		$sql = 'SELECT nome, email, senha, cpf, identidade, datanasc, crm, sexo FROM medico WHERE codmedico =:codmedico';
		
		$stmt = $conn ->prepare($sql);
		
		
		$stmt->execute(array(':codmedico'=>$codmedico));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
	}
	else{
		echo "Medico não cadastrado";
	}
	
	if(isset($_POST['alterar']))
	{
		$nome = $_POST['nome'];
		$email = $_POST['email'];
        $senha = $_POST['senha'];
        $cpf = $_POST['cpf'];
        $identidade = $_POST['identidade'];
		$datanasc = $_POST['datanasc'];
        $crm = $_POST['crm'];
        $sexo = $_POST['sexo'];
     


		if(!isset($errMSG))
		{				
		
			$sql = 'UPDATE medico SET nome=:nome,email=:email,senha=:senha, cpf=:cpf, identidade=:identidade,
			 datanasc=:datanasc, crm=:crm, sexo=:sexo WHERE codmedico=:codmedico';
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':nome',$nome);
			$stmt->bindParam(':email',$email);
            $stmt->bindParam(':senha',$senha);
            $stmt->bindParam(':cpf',$cpf);
            $stmt->bindParam(':identidade',$identidade);
            $stmt->bindParam(':datanasc',$datanasc);
			$stmt->bindParam(':crm',$crm);
            $stmt->bindParam(':sexo',$sexo);

			$stmt->bindParam(':codmedico',$codmedico);
			
		
			if($stmt->execute()){
			
				?>
                <script>
				alert('Alteração realizada com sucesso');
				window.location.href='lista-medico.php';
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
	<div class="container-fluid editarmedico">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <h3>Editar Médico:</h3>
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
          <label for="email">E-mail:</label>
          <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" value="<?php echo $row['email']; ?>">
        </div>
        <div class="form-group">
          <label for="senha">Senha:</label>
          <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha" value="<?php echo $row['senha']; ?>">
        </div>  
        <div class="form-group">
          <label for="cpf">CPF:</label>
          <input type="text" class="form-control" id="cpf" placeholder="CPF" name="cpf" maxlength="14" value="<?php echo $row['cpf']; ?>">
        </div> 
        <div class="form-group">
          <label for="identidade">Identidade:</label>
          <input type="text" class="form-control" id="identidade" placeholder="Identidade" name="identidade" value="<?php echo $row['identidade']; ?>">
        </div> 
        <div class="form-group">
          <label for="datadenascimento">Data de Nascimento:</label>
          <input type="date" class="form-control" id="datadenascimento" placeholder="Data de Nascimento" name="datadenascimento" value="<?php echo $row['datadenascimento']; ?>">
        </div> 	
        <div class="form-group">
          <label for="sexo">Sexo:</label>
          <select name="sexo" value="<?php echo $row['sexo']; ?>">
              <option value="feminino">Feminino</option> 
              <option value="masculino">Masculino</option>
          </select>
        </div>

        <div class="form-group">
					<label for="crm">CRM:</label>
					<input type="text" class="form-control" id="crm" placeholder="CRM" name="crm" value="<?php echo $row['crm']; ?>">
		</div>
        <button type="submit" name="alterar" class="btn btn-info">
        <span class="glyphicon glyphicon-save"></span>Alterar</button>
      </form>
    </div>
    <div class="col-sm-3"></div>
  </div>
  <script src="js/cep.js" type="text/javascript"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
  <script>
    $(document).ready(function () { 
        var $cpf = $("#cpf");
        $cpf.mask('000.000.000-00', {reverse: true});
    });
</script>
 </div>
</body>

<?php include "../footer.php" ?>