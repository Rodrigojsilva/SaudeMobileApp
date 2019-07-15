<?php 

require "Conexao.class.php";

class medico{
    
    public $codmedico;
	public $nome;
    public $email;
    public $senha;
    public $crm;

  
    
 
    
    
     public function lista(){
        $pdo = Conexao::conexao();
        
        $sql  = "SELECT * FROM medico;";
        $consulta = $pdo->query($sql);
        $dados = null;
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array(
            "codmedico" => $linha['codmedico'],
            "nome" => $linha['nome'],
            "email" => $linha['email'],
            "senha" => $linha['senha'],
            "crm" => $linha['crm']

            
                  
            );     
        }
        $pdo = null;
        return $dados;
    }
    

    

    public function excluir(){
        $pdo = Conexao::conexao();
        $sql = 'DELETE FROM medico WHERE codmedico = :codmedico';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':codmedico'=>$this->codmedico
        ));        
        
    }
    
   
    
}