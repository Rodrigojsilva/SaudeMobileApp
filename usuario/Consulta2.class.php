<?php 

require "Conexao2.php";

class consulta2{
    
    public $codconsulta;
    public $data;
    public $hora;
    public $clinicapj;
    public $endereco;
    public $numero;
    public $bairro;
    public $cidade;

    
     public function lista2(){
        $pdo = Conexao::conexao();
        
        $sql  = "SELECT * FROM agendamentocliente INNER JOIN cliente ON agendamentocliente.codcliente = cliente.codcliente
        INNER JOIN clinicapj ON agendamentocliente.codpj = clinicapj.codpj INNER JOIN localdeatendimento ON localdeatendimento.codpj = clinicapj.codpj;";
        $consulta = $pdo->query($sql);
        $dados2 = null;
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados2[] = array(
            "codconsulta" => $linha['codconsulta'],
            "data" => $linha['data'],
            "hora" => $linha['hora'],
            "clinicapj" => $linha['nome'],
            "endereco" => $linha['endereco'],
            "numero" => $linha['numero'],
            "bairro" => $linha['bairro'],
            "cidade" => $linha['cidade']
           
                  
            );     
        }
        $pdo = null;
        return $dados2;
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
    