<?php session_start(); ?>
<?php
    require "Consulta.class.php";
    $especialidades = new consulta();
    $dados = $especialidades->lista();
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

            		<p>Nenhuma Consulta</p>

        			<?php } else{ ?>
				  			 <div class="row">		
		  						<div class="table-responsive">
		  							<table class="table table-hover">
				              			<thead>
				                			<tr>
				                  			<th>COD Consulta</th>
                                  			<th>Data</th>
                                  			<th>Hora</th>
                                  			<th>Cliente</th>
				                			</tr>
				              			</thead>
					<?php foreach($dados as $dado => $coluna){
						  	echo "<tr>";
							echo "<td>".$coluna['codconsulta']."</td>"; 
                            echo "<td>".$coluna['data']."</td>";
                            echo "<td>".$coluna['hora']."</td>";
                            echo "<td>".$coluna['cliente']."</td>";
                            //echo "<td>".$coluna['codmedico']."</td>";
                            //echo "<td>".$coluna['codpj']."</td>";
							echo '<td><a href="editar-especialidade.php?agendamentocliente.codconsulta='.  "&data=" . $coluna['data'] .'"></td>
								  <td><a href="excluir-consulta.php?codconsulta='.$coluna['codconsulta'].'"> <input type="submit" class="btn btn-danger" value="Excluir"/></a></td>';
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