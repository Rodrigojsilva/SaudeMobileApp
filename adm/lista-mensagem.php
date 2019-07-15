<?php session_start(); ?>
<?php
    require "Mensagem.class.php";
    $mensagem = new mensagem();
    $dados = $mensagem->lista();
?> 

<?php $title = "Mensagens de Clientes"; ?>
<?php include "header.php" ?>

<body>
	<div class="container-fluid listarmedico">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="content-box-large">
		  			<div class="panel-heading">
						<div class="panel-title">
				  			<h3>Mensagens de Clientes:</h3><br><br>
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
								  							<th>COD da Mensagem</th>
				                  							<th>Nome</th>
				                  							<th>Email</th>
				                  							<th>Telefone</th>
								  							<th>Assunto</th>
								  							<th>Mensagem</th>
                                  							<th>Cod Cliente</th>
				                						</tr>
				              						</thead>
							  
													<?php
								 						foreach($dados as $dado => $coluna){
															echo "<tr>";
															echo "<td>".$coluna['codcontato']."</td>"; 
															echo "<td>".$coluna['nome']."</td>";
															echo "<td>".$coluna['email']."</td>";
															echo "<td>".$coluna['telefone']."</td>";
															echo "<td>".$coluna['assunto']."</td>";
                                                			echo "<td>".$coluna['mensagem']."</td>";
                                                			echo "<td>".$coluna['codcliente']."</td>";
															
															echo '<td>  <a href="editar-mensagem.php?codcontato='.$coluna['codcontato'].  "&nome=" . $coluna['nome'] . "&email=" . $coluna['email'] . "&telefone=" . $coluna['telefone'].'"></td><td>
                                                				  <a href="excluir-mensagem.php?codcontato='.$coluna['codcontato'].'"> <input type="submit" class="btn btn-danger"  value="Excluir"/></a></td></td>';
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