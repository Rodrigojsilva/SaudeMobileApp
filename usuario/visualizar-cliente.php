<?php session_start(); ?>
<?php
   if(!isset($_SESSION['cliente']));  
  
?>
<?php
	include_once("conexao.php");
	$codcliente = $_SESSION['cliente'];
	//Buscar os dados referente ao cliente situado neste id
	$result_cliente= "SELECT * FROM cliente WHERE codcliente = '$codcliente' LIMIT 1";
	$resultado_cliente = mysqli_query($conexao, $result_cliente);
	$row_cliente = mysqli_fetch_assoc($resultado_cliente);	
?>

<?php include "header.php" ?>

<body>
<div class="container-fluid perfilcliente">
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
						<a href="editar-cliente.php?codcliente=<?php echo $row_cliente['codcliente']; ?>">
						<button type="button" class="btn btn-info">Editar</button>
						</a>
					</div>
					<dl class="dl-horizontal">
						<br><br>
						<dt>Imagem: </dt>
						<dd><?php echo "<td><img src='../fotoscliente/".$row_cliente['imagem']."' height='140'/>";?></dd>

						<dt>Nome: </dt>
						<dd><?php echo $row_cliente['nome']; ?></dd>
					
						<dt>E-mail: </dt>
						<dd><?php echo $row_cliente['email']; ?></dd>
					
						<dt>Senha: </dt>
						<dd><?php echo $row_cliente['senha']; ?></dd>

						<dt>CPF: </dt>
						<dd><?php echo $row_cliente['cpf']; ?></dd>
						
						<dt>Identidade: </dt>
						<dd><?php echo $row_cliente['identidade']; ?></dd>

						<dt>Data de Nascimento: </dt>
						<dd><?php echo $row_cliente['datadenascimento']; ?></dd>

						<dt>Sexo: </dt>
						<dd><?php echo $row_cliente['sexo']; ?></dd>

						<dt>Tipo Sanguineo: </dt>
						<dd><?php echo $row_cliente['tiposanguineo']; ?></dd>

						<dt>Doença Preexistente: </dt>
						<dd><?php echo $row_cliente['doencapreexistente']; ?></dd>

						<dt>Medicação: </dt>
						<dd><?php echo $row_cliente['medicacao']; ?></dd>

						<dt>CEP: </dt>
						<dd><?php echo $row_cliente['cep']; ?></dd>

						<dt>Endereço: </dt>
						<dd><?php echo $row_cliente['endereco']; ?></dd>

						<dt>Numero: </dt>
						<dd><?php echo $row_cliente['numero']; ?></dd>

						<dt>Bairro: </dt>
						<dd><?php echo $row_cliente['bairro']; ?></dd>

						<dt>Cidade: </dt>
						<dd><?php echo $row_cliente['cidade']; ?></dd>

						<dt>Estado: </dt>
						<dd><?php echo $row_cliente['estado']; ?></dd>

						<dt>Telefone: </dt>
						<dd><?php echo $row_cliente['telefone']; ?></dd>

						<dt>Celular: </dt>
						<dd><?php echo $row_cliente['celular']; ?></dd>

						<dt>WhatsApp: </dt>
						<dd><?php echo $row_cliente['whatsapp']; ?></dd>

						<dt>Tipo Paciente: </dt>
						<dd><?php echo $row_cliente['tipopaciente']; ?></dd>

						<dt>Convenio: </dt>
						<dd><?php echo $row_cliente['convenio']; ?></dd>

						<dt>Tipo Convenio: </dt>
						<dd><?php echo $row_cliente['tipoconvenio']; ?></dd>

						<dt>Titular: </dt>
						<dd><?php echo $row_cliente['titular']; ?></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="col-sm-2"></div>
	</div>
</body>
		
<?php include "../footer.php" ?>