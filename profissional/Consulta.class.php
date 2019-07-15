<?php 

require "Conexao.class.php";

class consulta{
    
    public $codconsulta;
    public $data;
    public $hora;
    public $cliente;

  


 
    
    
 
    
    
     public function lista(){
        $pdo = Conexao::conexao();
        
        $sql  = "SELECT * FROM agendamentocliente INNER JOIN medico ON agendamentocliente.codmedico = medico.codmedico
         INNER JOIN cliente ON agendamentocliente.codcliente = cliente.codcliente;";
        
        $consulta = $pdo->query($sql);
        $dados = null;
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array(
            "codconsulta" => $linha['codconsulta'],
            "data" => $linha['data'],
            "hora" => $linha['hora'],
            "cliente" => $linha['nome']
    
      
           
                  
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
    