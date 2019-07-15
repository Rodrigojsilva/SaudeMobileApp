<?php session_start(); ?>
<?php
include "header.php";
?>
<?php
// Conexão com o banco de dados
	include "conexao.php";
	if (isset($_POST['cadastrar'])) {
		// Recupera os dados dos campos
		$nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);

			$sql = "insert into adm values(null,'".$nome."','".$email."','".$senha."')";

			$consulta = mysqli_query($conexao, $sql);
			// Se os dados forem inseridos com sucesso
			if ($sql){
				
				echo "
						<script type=\"text/javascript\">
							alert(\"Cadastrado com Sucesso.\");
						</script>
						";
			
			}else{
                echo "Não Cadastrado";
            }
		
    }
		
	
?>

<body>
    <div class="container-fluid cadastroadm">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h3>Cadastro de Administrador:</h3>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" name="cadastro" >
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" id="email" placeholder="E-mail" name="email">
                    </div> 
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha">
                    </div>                

                    <input type="submit" name="cadastrar" class="btn btn-info"value="Cadastrar"/>
                    <button type="reset" class="btn btn-info">Limpar</button>
                </form>
            </div>
        </div>
    </div>
</body>

<?php
include "../footer.php";
?>