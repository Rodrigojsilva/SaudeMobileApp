<?php include_once("conexao.php");

	$codmedico = $_REQUEST['codmedico'];
	
	$result_localdeatendimento = "SELECT * FROM localdeatendimento WHERE codmedico=$codmedico";
	$resultado_localdeatendimento = mysqli_query($conexao, $result_localdeatendimento);
	
	while ($row_localdeatendimento = mysqli_fetch_assoc($resultado_localdeatendimento) ) {
		$localdeatendimento[] = array(
			'coddeatendimento'	=> $row_localdeatendimento['coddeatendimento'],
            'endereco' => utf8_encode($row_localdeatendimento['endereco']),
            'numero' => utf8_encode($row_localdeatendimento['numero']),
            'bairro' => utf8_encode($row_localdeatendimento['bairro']),
            'cidade' => utf8_encode($row_localdeatendimento['cidade']),
		);
	}
	
    echo(json_encode($localdeatendimento));