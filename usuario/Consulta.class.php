<?php 

require "Conexao.class.php";

class consulta{
    
    public $codconsulta;
    public $data;
    public $hora;
    public $medico;
    public $endereco;
    public $numero;
    public $bairro;
    public $cidade;





    
    
     public function lista(){
        $pdo = Conexao::conexao();
        
        $sql  = "SELECT * FROM agendamentocliente INNER JOIN cliente ON agendamentocliente.codcliente = cliente.codcliente
        INNER JOIN medico ON agendamentocliente.codmedico = medico.codmedico INNER JOIN localdeatendimento ON localdeatendimento.codmedico = medico.codmedico;";
        $consulta = $pdo->query($sql);
        $dados = null;
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array(
            "codconsulta" => $linha['codconsulta'],
            "data" => $linha['data'],
            "hora" => $linha['hora'],
            "medico" => $linha['nome'],
            "endereco" => $linha['endereco'],
            "numero" => $linha['numero'],
            "bairro" => $linha['bairro'],
            "cidade" => $linha['cidade']
           
                  
            );     
        }
        $pdo = null;
        return $dados;
    }
    
    

    public function excluir(){
        $pdo = Conexao::conexao();
        $sql = 'DELETE FROM agendamentocliente WHERE codconsulta = :codconsulta';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':codconsulta'=>$this->codconsulta
        ));        
        
    }
}
    