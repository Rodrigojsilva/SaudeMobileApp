<?php 

require "Conexao.class.php";

class especialidades{
    
    public $codespecialidade;
    public $nomeespecialidade;
    public $codmedico;
    public $codpj;
    
 
    
    
     public function lista(){
        $pdo = Conexao::conexao();
        
        $sql  = "SELECT * FROM especialidades";
        $consulta = $pdo->query($sql);
        $dados = null;
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array(
            "codespecialidade" => $linha['codespecialidade'],
            "nomeespecialidade" => $linha['nomeespecialidade'],
            "codmedico" => $linha['codmedico'],
            "codpj" => $linha['codpj']
           
                  
            );     
        }
        $pdo = null;
        return $dados;
    }
    
    

    public function excluir(){
        $pdo = Conexao::conexao();
        $sql = 'DELETE FROM especialidades WHERE codespecialidade = :codespecialidade';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':codespecialidade'=>$this->codespecialidade
        ));        
        
    }
    
   
    
}