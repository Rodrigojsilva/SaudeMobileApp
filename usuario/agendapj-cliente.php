<?php session_start(); ?>

<?php include "header.php"; ?>

<?php
   if(!isset($_SESSION['cliente']));  
?>


<?php
include "conexao.php";
	
	if (isset($_POST['cadastrar'])) {
		// Recupera os dados dos campos
        $data = $_POST['data'];
        $hora = $_POST['hora'];
		$codpj = $_POST["codpj"];
		$codespecialidade = $_POST['codespecialidade'];
		$coddeatendimento = $_POST['coddeatendimento'];
		$codcliente = $_SESSION['cliente'];

			// Insere os dados no banco
			$sql = "insert into agendamentocliente values(null,'".$data."','".$hora."', null,'".$codpj."','".$codespecialidade."','".$coddeatendimento."','".$codcliente."')";

			$consulta = mysqli_query($conexao, $sql);
			// Se os dados forem inseridos com sucesso
	   if ($sql){
					echo "
						<script type=\"text/javascript\">
							alert(\"Cadastrado com Sucesso.\");
						</script>
						";
					
				}else{
					echo "Não Agendado";
				}
				
			}		
			
			
		
	
?>

<body>
    <div class="container-fluid agendamentoclinica">
    	<div class="row">
    		<div class="col-sm-3"></div>
    		<div class="col-sm-6">
    			<h3>Agendamento:</h3>
    		</div>
    		<div class="col-sm-3"></div>
    	</div>
    	<div class="row">
    		<div class="col-sm-3"></div>
    		<div class="col-sm-6">
    			<form class="form-horizontal" method="POST" enctype="multipart/form-data" name="cadastro" >

                <div class="form-group">
                    <label for="data">Data:</label>
                    <input type="date" class="form-control" id="data" placeholder="Data" name="data">
                </div>
                <div class="form-group">
                    <label for="hora">Hora:</label>
                    <input type="text" class="form-control" id="hora" placeholder="Hora" name="hora">
                </div>
				<div class="form-group d-flex justify-content-center">
					<label>Clinica:</label>
					<select name="codpj" id="codpj">
						<option value="">Escolha a Clinica</option>
						<?php
							$result_clinicapj = "SELECT * FROM clinicapj";
							$resultado_clinicapj = mysqli_query($conexao, $result_clinicapj);
							while($row_clinicapj = mysqli_fetch_assoc($resultado_clinicapj) ) {
								echo '<option value="'.$row_clinicapj['codpj'].'">'.$row_clinicapj['nome'].'</option>';
							}
						?>
					</select><br><br>
				</div>
				<div class="form-group d-flex justify-content-center">
					<label>Especialidade:</label>
					<span class="carregando">Aguarde, carregando...</span>
					<select name="codespecialidade" id="codespecialidade">
						<option value="">Escolha a Especialidade</option>
					</select><br><br>
				</div>

				<div class="form-group d-flex justify-content-center">
					<label>Local de Atendimento:</label>
					<span class="carregando">Aguarde, carregando...</span>
					<select name="coddeatendimento" id="coddeatendimento">
						<option value="">Escolha o Local</option>
					</select><br><br>
				</div>



            <input type="submit" name="cadastrar" class="btn btn-info"value="Agendar"/>
            <button type="reset" class="btn btn-info">Limpar</button>
        </form>

    		</div>
    		<div class="col-sm-3"></div>
    	</div>
            
        		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
		  google.load("jquery", "1.4.2");
		</script>
		
		<script type="text/javascript">
		$(function(){
			$('#codpj').change(function(){
				if( $(this).val() ) {
					$('#codespecialidade').hide();
					$('.carregando').show();
					$.getJSON('escolhepj-especialidade.php?search=',{codpj: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Escolha Especialidade</option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].codespecialidade + '">' + j[i].nomeespecialidade + '</option>';
						}	
						$('#codespecialidade').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#codespecialidade').html('<option value="">– Escolha Especialidade –</option>');
				}
			});
		});
		</script>
		<script type="text/javascript">
		$(function(){
			$('#codpj').change(function(){
				if( $(this).val() ) {
					$('#coddeatendimento').hide();
					$('.carregando').show();
					$.getJSON('escolhepj-local.php?search=',{codpj: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Escolha Local</option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].coddeatendimento + '">' + j[i].endereco + " " + j[i].numero + ", " + j[i].bairro + " - " + j[i].cidade +'</option>';
						}	
						$('#coddeatendimento').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#coddeatendimento').html('<option value="">– Escolha Local –</option>');
				}
			});
		});
		</script>
	<br>
	<br>
</body>


<?php
include "../footer.php";
?>