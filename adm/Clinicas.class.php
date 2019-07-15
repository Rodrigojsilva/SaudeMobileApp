<?php 

require "Conexao.class.php";

class clinicapj{
    
    public $codpj;
	public $nome;
    public $razaosocial;
    public $cnpj;
    public $email;
    public $senha;


  
    
 
    
    
     public function lista(){
        $pdo = Conexao::conexao();
        
        $sql  = "SELECT * FROM clinicapj;";
        $consulta = $pdo->query($sql);
        $dados = null;
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array(
            "codpj" => $linha['codpj'],
            "nome" => $linha['nome'],
            "razaosocial" => $linha['razaosocial'],
            "cnpj" => $linha['cnpj'],
            "email" => $linha['email'],
            "senha" => $linha['senha']       
            
                  
            );     
        }
        $pdo = null;
        return $dados;
    }
    
    public function visualizar($localdeatendimento){
        $pdo = Conexao::conexao();
        $sql = "SELECT * FROM clinicapj;";
        $consulta = $pdo->query($sql);
        
        $dados = null;
        
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados = new localdeatendimento();
            $dados -> $linha['codpj'];
            $dados -> $linha['nome'];
            $dados -> $linha['razaosocial'];
            $dados -> $linha['cnpj'];
            $dados -> $linha['email'];
            $dados -> $linha['senha'];

           
           
            
        }
        $pdo = null;
        return $dados;
        
        
    }
    

    public function excluir(){
        $pdo = Conexao::conexao();
        $sql = 'DELETE FROM clinicapj WHERE codpj = :codpj';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':codpj'=>$this->codpj
        ));        
        
    }
    
   
    
}