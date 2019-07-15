<?php session_start(); ?>

<?php
    require "especialidades.class.php";
    $especialidades = new especialidades();
    $dados = $especialidades->lista();
?> 

<?php $title = "Suas Especialidades"; ?>

<?php include "header.php" ?>

<body>
	<div class="container-fluid listarespc">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="content-box-large">
		  			<div class="panel-heading">
						<div class="panel-title">
				  			<h3>Especialidades:</h3><br><br>
						</div>
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>		
							<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
						</div>
					</div>
		  			<div class="panel-body">

     				<?php if($dados==null){ ?>

            		<p>Nenhuma Especialidade Cadastrada</p>
					<input type="submit" value="Cadastrar Nova" class="btn btn-info" onclick="window.location='form-especialidades.php';"/>

        			<?php } else{ ?>
				  			 <input type="submit" value="Cadastrar Nova" class="btn btn-info" onclick="window.location='form-especialidades.php';"/><br><br>
				  			 <div class="row">		
		  						<div class="table-responsive">
		  							<table class="table table-hover">
				              			<thead>
				                			<tr>
				                  				<th>COD</th>
				                  				<th>Especialidades</th>
				                			</tr>
				              			</thead>
					<?php foreach($dados as $dado => $coluna){
						  	echo "<tr>";
							echo "<td>".$coluna['codespecialidade']."</td>"; 
							echo "<td>".$coluna['nomeespecialidade']."</td>";
                            echo '<td><a href="editar-especialidade.php?codespecialidade='.$coluna['codespecialidade'].  "&nomeespecialidade=" . $coluna['nomeespecialidade'] .'"><input type="submit" class="btn btn-info editar"  value="Editar"/></td>
								  <td><a href="excluir-especialidade.php?codespecialidade='.$coluna['codespecialidade'].'"> <input type="submit" class="btn btn-danger" value="Excluir"/></a></td></td>';
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