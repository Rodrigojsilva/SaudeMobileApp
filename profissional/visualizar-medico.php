<?php session_start(); ?>
<?php
   if(!isset($_SESSION['medico']));  
  
?>
<?php
	include_once("conexao.php");
	$codmedico = $_SESSION['medico'];
	//Buscar os dados referente ao medico situado neste id
	$result_medico= "SELECT * FROM medico WHERE codmedico = '$codmedico' LIMIT 1";
	$resultado_medico = mysqli_query($conexao, $result_medico);
	$row_medico = mysqli_fetch_assoc($resultado_medico);	
?>

<?php include "header.php" ?>

<body>
<div class="container-fluid perfilmedico">
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
			<div class="content-box-large">
				<div class="panel-heading">
					<div class="panel-title">
						<h3>Perfil:</h3>
					</div>
					<div class="panel-options">
						<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
						<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
						<a href="editar-medico.php?codmedico=<?php echo $row_medico['codmedico']; ?>">
						<button type="button" class="btn btn-info">Editar</button>
						</a>
					</div>
					<dl class="dl-horizontal">
						<br><br>
						<dt>Imagem: </dt>
						<dd><?php echo "<td><img src='../fotosmedico/".$row_medico['imagem']."' height='140'/>";?></dd>

						<dt>Nome: </dt>
						<dd><?php echo $row_medico['nome']; ?></dd>
					
						<dt>E-mail: </dt>
						<dd><?php echo $row_medico['email']; ?></dd>
					
						<dt>Senha: </dt>
						<dd><?php echo $row_medico['senha']; ?></dd>

						<dt>CPF: </dt>
						<dd><?php echo $row_medico['cpf']; ?></dd>
						
						<dt>Identidade: </dt>
						<dd><?php echo $row_medico['identidade']; ?></dd>

						<dt>Data de Nascimento: </dt>
						<dd><?php echo $row_medico['datanasc']; ?></dd>

						<dt>Sexo: </dt>
						<dd><?php echo $row_medico['sexo']; ?></dd>

						<dt>CRM: </dt>
						<dd><?php echo $row_medico['crm']; ?></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="col-sm-2"></div>
	</div>
</body>


		
<?php include "../footer.php" ?>