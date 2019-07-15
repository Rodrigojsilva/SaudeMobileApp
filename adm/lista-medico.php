<?php session_start(); ?>

<?php
    require "Medico.class.php";
    $medico = new medico();
    $dados = $medico->lista();
?> 

<?php $title = "Medicos Cadastrados"; ?>
<?php include "header.php" ?>

<body>
	<div class="container-fluid listarmedico">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="content-box-large">
		  			<div class="panel-heading">
						<div class="panel-title">
				  			<h3>Médicos Cadastrados:</h3><br><br>
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
								  							<th>COD do Médico</th>
				                  							<th>Nome</th>
				                  							<th>Email</th>
				                  							<th>Senha</th>
								  							<th>CRM</th>
				                						</tr>
				              						</thead>
							  
													<?php
								 						foreach($dados as $dado => $coluna){
															echo "<tr>";
															echo "<td>".$coluna['codmedico']."</td>"; 
															echo "<td>".$coluna['nome']."</td>";
															echo "<td>".$coluna['email']."</td>";
															echo "<td>".$coluna['senha']."</td>";
															echo "<td>".$coluna['crm']."</td>";
															echo '<td>  <a href="editar-medico.php?codmedico='.$coluna['codmedico'].  "&nome=" . $coluna['nome'] . "&email=" . $coluna['email'] . "&senha=" . $coluna['senha']."&crm=". $coluna['crm'].'"> <input type="submit" class="btn btn-info editar"  value="Editar"/></td><td>
                                                				<a href="excluir-medico.php?codmedico='.$coluna['codmedico'].'"> <input type="submit" class="btn btn-danger"  value="Excluir"/></a></td></td>';
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