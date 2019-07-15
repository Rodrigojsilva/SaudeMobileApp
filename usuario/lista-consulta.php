<?php session_start(); ?>

<?php
    require "Consulta.class.php";
    $consulta = new consulta();
    $dados = $consulta->lista();
?> 
<?php
    require "Consulta2.class.php";
    $consulta2 = new consulta2();
    $dados2 = $consulta2->lista2();
?>

<?php $title = "Suas Consultas"; ?>

<?php include "header.php" ?>

<body>
	<div class="container-fluid listarconsulta">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="content-box-large">
		  			<div class="panel-heading">
						<div class="panel-title">
				  			<h3>Consultas:</h3><br><br>
						</div>
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>		
							<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
						</div>
					</div>
		  			<div class="panel-body">

     				<?php if($dados==null){ ?>

            		<p>Nenhum Consulta</p>
					<input type="submit" value="Agendar Nova" class="btn btn-info" onclick="window.location='listar-medico.php';"/>

        			<?php } else{ ?>
				  			 <input type="submit" value="Agendar Nova" class="btn btn-info" onclick="window.location='listar-medico.php';"/><br><br>
				  			 <div class="row">		
		  						<div class="table-responsive">
		  							<table class="table table-hover">
				              			<thead>
				                			<tr>
                                  			<th>Data</th>
                                  			<th>Hora</th>
                                  			<th>Profissional</th>
								  			<th>Endereço</th>
								  			<th>Numero</th>
								  			<th>Bairro</th>
								  			<th>Cidade</th>
				                			</tr>
				              			</thead>
					<?php foreach($dados2 as $dados2 => $coluna){
												echo "<tr>";
                                                echo "<td>".$coluna['data']."</td>";
												echo "<td>".$coluna['hora']."</td>";
												echo "<td>".$coluna['clinicapj']."</td>";
												echo "<td>".$coluna['endereco']."</td>";
												echo "<td>".$coluna['numero']."</td>";
												echo "<td>".$coluna['bairro']."</td>";
												echo "<td>".$coluna['cidade']."</td>";
                                                //echo "<td>".$coluna['codmedico']."</td>";
                                                //echo "<td>".$coluna['codpj']."</td>";
												
											 
										
												echo '<td>  <a href="editar-especialidade.php?agendamentocliente.codconsulta='.  "&data=" . $coluna['data'] .'"> 
												</td>
												<td>
                                                <a href="excluir-consulta.php?codconsulta='.$coluna['codconsulta'].'"> <input type="submit" class="btn btn-danger"  value="Excluir"/></a></td>
                                                
												 
												 </td>';
												echo "</tr>";
												echo "</tr>";
											}
    
								
											foreach($dados as $dados => $coluna){
											echo "<tr>";
											echo "<td>".$coluna['data']."</td>";
											echo "<td>".$coluna['hora']."</td>";
											echo "<td>".$coluna['medico']."</td>";
											echo "<td>".$coluna['endereco']."</td>";
											echo "<td>".$coluna['numero']."</td>";
											echo "<td>".$coluna['bairro']."</td>";
											echo "<td>".$coluna['cidade']."</td>";
											//echo "<td>".$coluna['codmedico']."</td>";
											//echo "<td>".$coluna['codpj']."</td>";
											
											
									
											echo '<td>  <a href="editar-especialidade.php?agendamentocliente.codconsulta='.  "&data=" . $coluna['data'] .'"> 
											</td>
											<td>
											<a href="excluir-consulta.php?codconsulta='.$coluna['codconsulta'].'"> <input type="submit" class="btn btn-danger"  value="Excluir"/></a></td>
				   
													
													</td>';
												echo "</tr>";
												echo "</tr>";
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
</body>

<?php include "../footer.php" ?>    