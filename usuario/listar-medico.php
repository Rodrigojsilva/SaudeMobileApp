<?php session_start(); ?>
<?php
    require "listarmedico.class.php";
    $especialidades = new medico();
	$dados = $especialidades->lista();

?>

<?php
    require "listarclinica.class.php";
    $clinica = new clinica();
	$dados2 = $clinica->lista2();
	
?>

<?php $title = "Profissionais"; ?>

<?php include "header.php" ?>

<body>
	<div class="container-fluid listarmedico">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="content-box-large">
		  			<div class="panel-heading">
						<div class="panel-title">
				  			<h3>Profissionais:</h3><br><br>
						</div>
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>	
							<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>	
						</div>
					</div>
		  			<div class="panel-body">
     					<?php if($dados==null){ ?>
            			<p>Nenhum Cadastrado</p> 
        				
        				<?php } else{ ?>
		  								<div class="row">		
		  									<div class="table-responsive-sm">
		  										<table class="table table-hover">
				              						<thead>
				                						<tr>
								  							<th>Nome do Profissional</th>
								  							<th>Especialidades</th>
				                  							<th>Telefone</th>
				                  							<th>Endereço</th>
				                  							<th>Numero</th>
				                  							<th>Bairro</th>
								  							<th>Cidade</th>
				                						</tr>
				              						</thead>
							  
													<?php
								 						foreach($dados2 as $dado2 => $coluna){
															echo "<tr>";
															echo "<td>".$coluna['nome']."</td>";
															echo "<td>".$coluna['nomeespecialidade']."</td>"; 
															echo "<td>".$coluna['telefone']."</td>"; 
															echo "<td>".$coluna['endereco']."</td>";
															echo "<td>".$coluna['numero']."</td>";
															echo "<td>".$coluna['bairro']."</td>";
															echo "<td>".$coluna['cidade']."</td>";
															echo '<td><a href="agendapj-cliente.php?nomeespecialidade='.$coluna['nomeespecialidade'].  "&endereco=" . $coluna['endereco'] . "&numero=" . $coluna['numero'] . "&bairro=" . $coluna['bairro'].'"><input type="submit" class="btn btn-info agendar"  value="Agendar"/></td><td></td>';
														}

								 						foreach($dados as $dado => $coluna){
															echo "<tr>";
															echo "<td>".$coluna['nome']."</td>";
															echo "<td>".$coluna['nomeespecialidade']."</td>"; 
															echo "<td>".$coluna['telefone']."</td>"; 
															echo "<td>".$coluna['endereco']."</td>";
															echo "<td>".$coluna['numero']."</td>";
															echo "<td>".$coluna['bairro']."</td>";
															echo "<td>".$coluna['cidade']."</td>";
															echo '<td>  <a href="agendapf-cliente.php?nomeespecialidade='.$coluna['nomeespecialidade'].  "&endereco=" . $coluna['endereco'] . "&numero=" . $coluna['numero'] . "&bairro=" . $coluna['bairro'].'"><input type="submit" class="btn btn-info agendar"  value="Agendar"/></td><td></td>';
														}					
													?>
													<?php } ?>
				            					</table>
		  									</div>
  										</div>
					</div>
		  		</div>	
			</div>
			<div class="col-sm-3"></div>			  		
		</div> 	
	</div>
</body>

  <?php include "../footer.php" ?>     