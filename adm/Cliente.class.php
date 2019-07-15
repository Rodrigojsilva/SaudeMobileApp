<?php 

require "Conexao.class.php";

class cliente{
    
    public $codcliente;
	public $nome;
    public $email;
    public $senha;
    public $telefone;

  
    
 
    
    
     public function lista(){
        $pdo = Conexao::conexao();
        
        $sql  = "SELECT * FROM cliente;";
        $consulta = $pdo->query($sql);
        $dados = null;
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array(
            "codcliente" => $linha['codcliente'],
            "nome" => $linha['nome'],
            "email" => $linha['email'],
            "senha" => $linha['senha'],
            "telefone" => $linha['telefone']

            
                  
            );     
        }
        $pdo = null;
        return $dados;
    }
    

    

    public function excluir(){
        $pdo = Conexao::conexao();
        $sql = 'DELETE FROM cliente WHERE codcliente = :codcliente';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':codcliente'=>$this->codcliente
        ));        
        
    }
    
   
    
}