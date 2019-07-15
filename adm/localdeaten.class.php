<?php 

require "Conexao.class.php";

class localdeatendimento{
    
    public $coddeatendimento;
	public $endereco;
    public $numero;
    public $bairro;
    public $cidade;
    public $estado;
    public $celular;
    public $whatsapp;
    public $codmedico;
    public $codpj;

  
    
 
    
    
     public function lista(){
        $pdo = Conexao::conexao();
        
        $sql  = "SELECT * FROM localdeatendimento;";
        $consulta = $pdo->query($sql);
        $dados = null;
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array(
            "coddeatendimento" => $linha['coddeatendimento'],
            "endereco" => $linha['endereco'],
            "numero" => $linha['numero'],
            "bairro" => $linha['bairro'],
            "codmedico" => $linha['codmedico'],
            "codpj" => $linha['codpj']       
            
                  
            );     
        }
        $pdo = null;
        return $dados;
    }
    
    public function visualizar($localdeatendimento){
        $pdo = Conexao::conexao();
        $sql = "SELECT * FROM localdeatendimento;";
        $consulta = $pdo->query($sql);
        
        $dados = null;
        
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados = new localdeatendimento();
            $dados -> $linha['coddeatendimento'];
            $dados -> $linha['endereco'];
            $dados -> $linha['numero'];
            $dados -> $linha['bairro'];
            $dados -> $linha['cidade'];
            $dados -> $linha['estado'];
            $dados -> $linha['celular'];
            $dados -> $linha['whatsapp'];
           
           
            
        }
        $pdo = null;
        return $dados;
        
        
    }
    

    public function excluir(){
        $pdo = Conexao::conexao();
        $sql = 'DELETE FROM localdeatendimento WHERE coddeatendimento = :coddeatendimento';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':coddeatendimento'=>$this->coddeatendimento
        ));        
        
    }
    
   
    
}