<?php include_once("conexao.php");

	$codmedico = $_REQUEST['codmedico'];
	
	$result_especialidade = "SELECT * FROM especialidades WHERE codmedico=$codmedico";
	$resultado_especialidade = mysqli_query($conexao, $result_especialidade);
	
	while ($row_especialidade = mysqli_fetch_assoc($resultado_especialidade) ) {
		$especialidade[] = array(
			'codespecialidade'	=> $row_especialidade['codespecialidade'],
			'nomeespecialidade' => utf8_encode($row_especialidade['nomeespecialidade']),
		);
	}
	
    echo(json_encode($especialidade));
    
    