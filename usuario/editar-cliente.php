<?php session_start(); ?>

<?php
	error_reporting( ~E_NOTICE );
	
	require_once 'conexao2.php';
	
	if(isset($_GET['codcliente']) && !empty($_GET['codcliente']))
	{
		$codcliente = $_GET['codcliente'];
		$sql = 'SELECT nome, email, senha, cpf, identidade, datadenascimento, sexo, tiposanguineo, doencapreexistente, medicacao, cep, 
        endereco, numero, bairro, cidade, estado, telefone, celular, whatsapp, tipopaciente, convenio, tipoconvenio,  titular FROM cliente WHERE codcliente =:codcliente';
		
		$stmt = $conn ->prepare($sql);
		
		
		$stmt->execute(array(':codcliente'=>$codcliente));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
	}
	else{
		echo "Cliente não cadastrado";
	}
	
	if(isset($_POST['alterar']))
	{
		$nome = $_POST['nome'];
		$email = $_POST['email'];
        $senha = $_POST['senha'];
        $cpf = $_POST['cpf'];
        $identidade = $_POST['identidade'];
		$datadenascimento = $_POST['datadenascimento'];
        $sexo = $_POST['sexo'];
        $tiposanguineo = $_POST['tiposanguineo'];
        $doencapreexistente = $_POST['doencapreexistente'];
        $medicacao = $_POST['medicacao'];
		$cep = $_POST['cep'];
        $endereco = $_POST['endereco'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
        $telefone = $_POST['telefone'];
        $celular = $_POST['celular'];
        $whatsapp = $_POST['whatsapp'];
        $tipopaciente = $_POST['tipopaciente'];
		$convenio = $_POST['convenio'];
        $tipoconvenio = $_POST['tipoconvenio'];
        $titular = $_POST['titular'];
     


		if(!isset($errMSG))
		{				
		
			$sql = 'UPDATE cliente SET nome=:nome,email=:email,senha=:senha, cpf=:cpf, identidade=:identidade,
			 datadenascimento=:datadenascimento, sexo=:sexo, tiposanguineo=:tiposanguineo, 
			doencapreexistente=:doencapreexistente, medicacao=:medicacao, cep=:cep, 
			endereco=:endereco, numero=:numero, bairro=:bairro, cidade=:cidade, 
			estado=:estado, telefone=:telefone, celular=:celular, 
			whatsapp=:whatsapp, tipopaciente=:tipopaciente, 
			convenio=:convenio, tipoconvenio=:tipoconvenio,
			titular=:titular  WHERE codcliente=:codcliente';
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':nome',$nome);
			$stmt->bindParam(':email',$email);
            $stmt->bindParam(':senha',$senha);
            $stmt->bindParam(':cpf',$cpf);
            $stmt->bindParam(':identidade',$identidade);
            $stmt->bindParam(':datadenascimento',$datadenascimento);
			$stmt->bindParam(':sexo',$sexo);
            $stmt->bindParam(':tiposanguineo',$tiposanguineo);
            $stmt->bindParam(':doencapreexistente',$doencapreexistente);
            $stmt->bindParam(':medicacao',$medicacao);
            $stmt->bindParam(':cep',$cep);
			$stmt->bindParam(':endereco',$endereco);
            $stmt->bindParam(':numero',$numero);
            $stmt->bindParam(':bairro',$bairro);
            $stmt->bindParam(':cidade',$cidade);
            $stmt->bindParam(':estado',$estado);
			$stmt->bindParam(':telefone',$telefone);
            $stmt->bindParam(':celular',$celular);
            $stmt->bindParam(':whatsapp',$whatsapp);
            $stmt->bindParam(':tipopaciente',$tipopaciente);
            $stmt->bindParam(':convenio',$convenio);
			$stmt->bindParam(':tipoconvenio',$tipoconvenio);
            $stmt->bindParam(':titular',$titular);

			$stmt->bindParam(':codcliente',$codcliente);
			
		
			if($stmt->execute()){
			
				?>
                <script>
				alert('Alteração realizada com sucesso');
				window.location.href='index.php';
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
	<div class="container-fluid editarcliente">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <h3>Editar Cliente:</h3>
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
          <input type="text" class="form-control" id="cpf" placeholder="CPF" name="cpf" value="<?php echo $row['cpf']; ?>">
        </div> 
        <div class="form-group">
          <label for="identidade">Identidade:</label>
          <input type="text" class="form-control" id="identidade" placeholder="Identidade" name="identidade"  maxlength="14" value="<?php echo $row['identidade']; ?>">
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
          <label for="tiposanguineo">Tipo Sanguineo:</label>
          <select name="tiposanguineo" value="<?php echo $row['tiposanguineo']; ?>">
            <option value="a+">A+</option> 
            <option value="a-">A-</option>
            <option value="b+">B+</option>
            <option value="b-">B-</option>
            <option value="ab+">AB+</option>
            <option value="ab-">AB-</option>
            <option value="o+">O+</option>
            <option value="o-">O-</option>
          </select>
        </div>
        <div class="form-group">
          <label for="doencapreexistente">Doença Pré Existentes:</label>
          <textarea type="text" class="form-control" id="doencapreexistente" placeholder="Digite Aqui" name="doencapreexistente" value="<?php echo $row['doencapreexistente']; ?>"></textarea>
        </div>
        <div class="form-group">
          <label for="medicacao">Medicação:</label>
          <textarea type="text" class="form-control" id="medicacao" placeholder="Digite Aqui" name="medicacao" value="<?php echo $row['medicacao']; ?>"></textarea>
        </div>
        <div class="form-group">
          <label for="cep">CEP:</label>
          <input type="text" class="form-control" id="cep" placeholder="CEP" name="cep" value="<?php echo $row['cep']; ?>">   	
          <span class="input-group-btn">
            <button class="btn btn-info" type="button" id="buscaCEP">Buscar</button>
          </span>
        </div>         
        <div id="cepstatus"></div>

        <div class="form-group">
          <label for="endereco">Endereço:</label>
          <input type="text" class="form-control" id="endereco" placeholder="Endereço" name="endereco" value="<?php echo $row['endereco']; ?>" readonly/>
        </div>
        <div class="form-group">
          <label for="numero">Número:</label>
          <input type="text" class="form-control" id="numero" placeholder="Número" name="numero" value="<?php echo $row['numero']; ?>">
        </div>
        <div class="form-group">
          <label for="bairro">Bairro:</label>
          <input type="text" class="form-control" id="bairro" placeholder="Bairro" name="bairro" value="<?php echo $row['Bairro']; ?>" readonly/>
        </div>
        <div class="form-group">
          <label for="cidade">Cidade:</label>
          <input type="text" class="form-control" id="cidade" placeholder="Cidade" name="cidade" value="<?php echo $row['cidade']; ?>" readonly/>
        </div>
        <div class="form-group">
          <label for="estado">Estado:</label>
          <input type="text" class="form-control" id="uf" placeholder="Estado" name="estado" value="<?php echo $row['estado']; ?>" readonly/>
        </div>
        <div class="form-group">
          <label for="telefone">Telefone:</label>
          <input type="text" class="form-control" id="telefone" placeholder="Telefone" name="telefone" maxlength="11" value="<?php echo $row['telefone']; ?>">
        </div>
        <div class="form-group">
          <label for="celular">Celular:</label>
          <input type="text" class="form-control" id="celular" placeholder="Celular" name="celular"  maxlength="11" value="<?php echo $row['celular']; ?>">
        </div>
        <div class="form-group">
          <label for="whatsapp">WhatsApp:</label>
          <input type="text" class="form-control" id="whatsapp" placeholder="WhatsApp" name="whatsapp" maxlength="11" value="<?php echo $row['whatsapp']; ?>">
        </div>
        <div class="form-group">
          <label for="tipopaciente">Tipo de Paciente:</label>
          <select name="tipopaciente" value="<?php echo $row['tipopaciente']; ?>">
            <option value="plano de saude">Plano de Saúde</option> 
            <option value="particular">Particular</option>
          </select>
        </div>
        <div class="form-group">
          <label for="convenio">Convenio:</label>
          <input type="text" class="form-control" id="convenio" placeholder="Convenio" name="convenio" value="<?php echo $row['convenio']; ?>">
        </div>
        <div class="form-group">
          <label for="tipoconvenio">Tipo de Convenio:</label>
          <input type="text" class="form-control" id="tipoconvenio" placeholder="Tipo de Convenio" name="tipoconvenio" value="<?php echo $row['tipoconvenio']; ?>">
        </div>
        <div class="form-group">
          <label for="titular">Titular do Plano:</label>
          <input type="text" class="form-control" id="titular" placeholder="Titular do Plano" name="titular" value="<?php echo $row['titular']; ?>">
        </div>   
        <button type="submit" name="alterar" class="btn btn-info">
        <span class="glyphicon glyphicon-save"></span>Alterar</button>
      </form>
    </div>
    <div class="col-sm-3"></div>
  </div>
  <script src="../js/cep.js" type="text/javascript"></script>
 </div>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
  <script>
    $(document).ready(function () { 
        var $cpf = $("#cpf");
        $cpf.mask('000.000.000-00', {reverse: true});
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
	$("#cep").mask("99.999-999");
});
</script>
</body>

<?php include "../footer.php" ?>