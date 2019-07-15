<?php session_start(); ?>
<?php
    require "clinicas.class.php";
    $clinicapj = new clinicapj();
    $dados = $clinicapj->lista();
?> 

<?php $title = "Seus Locais de Atendimento"; ?>
<?php include "header.php" ?>

<body>
	<div class="container-fluid listarclinica">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="content-box-large">
		  			<div class="panel-heading">
						<div class="panel-title">
				  			<h3>Clínicas Cadastradas:</h3><br><br>
						</div>
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>	
							<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>	
						</div>
					</div>
		  			<div class="panel-body">
     					<?php if($dados==null){ ?>
            			<p>Nenhuma Cadastrada</p> 
        				
        				<?php } else{ ?>
		  								<div class="row">		
		  									<div class="table-responsive-sm">
		  										<table class="table table-hover">
				              						<thead>
				                						<tr>
								  							<th>COD da Clínica</th>
				                  							<th>Nome</th>
				                  							<th>Razão Social</th>
				                  							<th>CNPJ</th>
								  							<th>E-Mail</th>
								  							<th>Senha</th>
				                						</tr>
				              						</thead>
							  
													<?php
								 						foreach($dados as $dado => $coluna){
															echo "<tr>";
															echo "<td>".$coluna['codpj']."</td>"; 
															echo "<td>".$coluna['nome']."</td>";
															echo "<td>".$coluna['razaosocial']."</td>";
															echo "<td>".$coluna['cnpj']."</td>";
															echo "<td>".$coluna['email']."</td>";
															echo "<td>".$coluna['senha']."</td>";
															echo '<td>  <a href="editar-clinica.php?codpj='.$coluna['codpj'].  "&nome=" . $coluna['nome'] . "&cnpj=" . $coluna['cnpj'] . "&email=" . $coluna['email'].'"> <input type="submit" class="btn btn-info editar"  value="Editar"/></td><td>
                                                						<a href="excluir-clinica.php?codpj='.$coluna['codpj'].'"> <input type="submit" class="btn btn-danger"  value="Excluir"/></a></td></td>';
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