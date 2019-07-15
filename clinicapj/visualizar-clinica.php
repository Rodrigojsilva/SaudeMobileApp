<?php session_start(); ?>
<?php
   if(!isset($_SESSION['clinica']));  
  
?>
<?php
	include_once("conexao.php");
	$codpj = $_SESSION['clinica'];
	//Buscar os dados referente ao clinica situado neste id
	$result_clinica= "SELECT * FROM clinicapj WHERE codpj = '$codpj' LIMIT 1";
	$resultado_clinica = mysqli_query($conexao, $result_clinica);
	$row_clinica = mysqli_fetch_assoc($resultado_clinica);	
?>

<?php include "header.php" ?>

<body>
<div class="container-fluid perfilclinica">
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
						<a href="editar-clinica.php?codpj=<?php echo $row_clinica['codpj']; ?>">
						<button type="button" class="btn btn-info">Editar</button>
						</a>
					</div>
					<dl class="dl-horizontal">
						<br><br>
						<dt>Imagem: </dt>
						<dd><?php echo "<td><img src='../fotospj/".$row_clinica['imagem']."' height='140'/>";?></dd>

						<dt>Nome: </dt>
						<dd><?php echo $row_clinica['nome']; ?></dd>
					
						<dt>Razao Social: </dt>
						<dd><?php echo $row_clinica['razaosocial']; ?></dd>
					
						<dt>CNPJ: </dt>
						<dd><?php echo $row_clinica['cnpj']; ?></dd>

						<dt>E-mail: </dt>
						<dd><?php echo $row_clinica['email']; ?></dd>
						
						<dt>Senha: </dt>
						<dd><?php echo $row_clinica['senha']; ?></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="col-sm-2"></div>
	</div>
</body>
		
<?php include "../footer.php" ?>