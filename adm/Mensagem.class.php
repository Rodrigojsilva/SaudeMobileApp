<?php 

require "Conexao.class.php";

class mensagem{
    
    public $codcontato;
	public $nome;
    public $email;
    public $telefone;
    public $assunto;
    public $mensagem;
    public $codcliente;
    
 
    
    
     public function lista(){
        $pdo = Conexao::conexao();
        
        $sql  = "SELECT * FROM contato;";
        $consulta = $pdo->query($sql);
        $dados = null;
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array(
            "codcontato" => $linha['codcontato'],
            "nome" => $linha['nome'],
            "email" => $linha['email'],
            "telefone" => $linha['telefone'],
            "assunto" => $linha['assunto'],
            "mensagem" => $linha['mensagem'],
            "codcliente" => $linha['codcliente']

            
                  
            );     
        }
        $pdo = null;
        return $dados;
    }
    

    

    public function excluir(){
        $pdo = Conexao::conexao();
        $sql = 'DELETE FROM medico WHERE codcontato = :codcontato';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':codcontato'=>$this->codcontato
        ));        
        
    }
    
   
    
}