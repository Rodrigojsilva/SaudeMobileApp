<?php session_start(); ?>

<?php
    require "localdeaten.class.php";
    $localdeatendimento = new localdeatendimento();
    $dados = $localdeatendimento->lista();
?> 

<?php $title = "Seus Locais de Atendimento"; ?>

<?php include "header.php" ?>

<body>
	<div class="container-fluid listarlocais">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="content-box-large">
		  			<div class="panel-heading">
						<div class="panel-title">
				  			<h3>Locais Cadastrados:</h3><br><br>
						</div>
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>		
							<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
						</div>
					</div>
		  			<div class="panel-body">

     				<?php if($dados==null){ ?>

            		<p>Nenhum Local Cadastrado</p>
					<input type="submit" value="Cadastrar Novo" class="btn btn-info" onclick="window.location='form-lcatendimento.php';"/>

        			<?php } else{ ?>
				  			 <input type="submit" value="Cadastrar Novo" class="btn btn-info" onclick="window.location='form-lcatendimento.php';"/><br><br>
				  			 <div class="row">		
		  						<div class="table-responsive">
		  							<table class="table table-hover">
				              			<thead>
				                			<tr>
				                  				<th>COD do Local</th>
				                  				<th>Endereço</th>
				                  				<th>Numero</th>
				                  				<th>Bairro</th>
				                			</tr>
				              			</thead>
					<?php foreach($dados as $dado => $coluna){
						  	echo "<tr>";
							echo "<td>".$coluna['coddeatendimento']."</td>"; 
							echo "<td>".$coluna['endereco']."</td>";
							echo "<td>".$coluna['numero']."</td>";
							echo "<td>".$coluna['bairro']."</td>";
                            echo '<td>  <a href="editar-local.php?coddeatendimento='.$coluna['coddeatendimento'].  "&endereco=" . $coluna['endereco'] . "&numero=" . $coluna['numero'] . "&bairro=" . $coluna['bairro'].'"> <input type="submit" class="btn btn-info editar"  value="Editar"/></td>
								  <td><a href="excluir-local.php?coddeatendimento='.$coluna['coddeatendimento'].'"><input type="submit" class="btn btn-danger"  value="Excluir"/></a></td></td>';
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