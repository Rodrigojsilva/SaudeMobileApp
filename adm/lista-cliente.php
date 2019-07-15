<?php session_start(); ?>
<?php
    require "Cliente.class.php";
    $cliente = new cliente();
    $dados = $cliente->lista();
?> 

<?php $title = "Clientes Cadastrados"; ?>
<?php include "header.php" ?>

<body>
	<div class="container-fluid listarcliente">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="content-box-large">
		  			<div class="panel-heading">
						<div class="panel-title">
				  			<h3>Clientes Cadastrados:</h3><br><br>
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
								  							<th>COD do Cliente</th>
				                  							<th>Nome</th>
				                  							<th>Email</th>
				                  							<th>Senha</th>
								  							<th>telefone</th>
				                						</tr>
				              						</thead>
							  
													<?php
								 						foreach($dados as $dado => $coluna){
															echo "<tr>";
															echo "<td>".$coluna['codcliente']."</td>"; 
														    echo "<td>".$coluna['nome']."</td>";
															echo "<td>".$coluna['email']."</td>";
														    echo "<td>".$coluna['senha']."</td>";
															echo "<td>".$coluna['telefone']."</td>";
															echo '<td>  <a href="editar-cliente.php?codcliente='.$coluna['codcliente'].  "&nome=" . $coluna['nome'] . "&email=" . $coluna['email'] . "&senha=" . $coluna['senha']."&telefone=". $coluna['telefone'].'"> <input type="submit" class="btn btn-info editar"  value="Editar"/></td><td>
                                                				<a href="excluir-cliente.php?codcliente='.$coluna['codcliente'].'"> <input type="submit" class="btn btn-danger"  value="Excluir"/></a></td></td>';
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