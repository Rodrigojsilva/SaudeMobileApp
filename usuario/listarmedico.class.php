<?php 

require "Conexao.class.php";

class medico{
    
    public $nome;
    public $nomeespecialidade;
    public $endereco;
    public $numero;
    public $bairro;
    public $cidade;
    public $telefone;
    
     public function lista(){
        $pdo = Conexao::conexao();
        
        $sql  = "SELECT * FROM especialidades INNER JOIN medico ON especialidades.codmedico = medico.codmedico
        INNER JOIN localdeatendimento ON localdeatendimento.codmedico = medico.codmedico;";
        
        
        $consulta = $pdo->query($sql);
        $dados = null;
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $dados[] = array(
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
        return $dados;
    }
    
    


   
    
}