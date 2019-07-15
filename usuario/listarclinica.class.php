<?php 

require "Conexao2.class.php";

class clinica{
    
    public $nome;
    public $nomeespecialidade;
    public $endereco;
    public $numero;
    public $bairro;
    public $cidade;
    public $telefone;
    
     public function lista2(){
        $pdo = Conexao2::conexao2();
        
        $sql  = "SELECT * FROM especialidades INNER JOIN clinicapj ON especialidades.codpj = clinicapj.codpj
        INNER JOIN localdeatendimento ON localdeatendimento.codpj = clinicapj.codpj;";       
        
        $consulta = $pdo->query($sql);
        $dados2 = null;
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados2[] = array(
            "nome" => $linha['nome'],
            "nomeespecialidade" => $linha['nomeespecialidade'],
            "endereco" => $linha['endereco'],
            "numero" => $linha['numero'],
            "bairro" => $linha['bairro'],
            "cidade" => $linha['cidade'],
            "telefone" => $linha['telefone']                       
            
                  
            );     
        }
        $pdo = null;
        return $dados2;
    }
    
    

    public function excluir(){
        $pdo = Conexao2::conexao2();
        $sql = 'DELETE FROM especialidades WHERE codespecialidade = :codespecialidade';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':codespecialidade'=>$this->codespecialidade
        ));        
        
    }
    
   
    
}