<?php
include "header.php";
?>

<?php
// Conexão com o banco de dados
	include "conexao.php";
	if (isset($_POST['cadastrar'])) {
		// Recupera os dados dos campos
		$nome = $_POST['nome'];
        $razaosocial = $_POST['razaosocial'];
        $cnpj = $_POST['cnpj'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
		$imagem = $_FILES["imagem"];
		// Se a foto estiver sido selecionada
	if (!empty($imagem["name"])) {
		// Largura máxima em pixels
		$largura = 95000;
		// Altura máxima em pixels
		$altura = 980000;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 1000000000;
		$error = array();
    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){
     	   $error[1] = "Isso não é uma imagem válida.";
   	 	} 
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($imagem["tmp_name"]);
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}
		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}	
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($imagem["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}
		// Se não houver nenhum erro
		if (count($error) == 0) {
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "fotospj/" . $nome_imagem;
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
			// Insere os dados no banco
			$sql = "insert into clinicapj values(null,'".$nome."','".$razaosocial."','".$cnpj."','".$email."','".$senha."','".$nome_imagem."')";

			$consulta = mysqli_query($conexao, $sql);
			// Se os dados forem inseridos com sucesso
			if ($sql){
				
				echo "
						<script type=\"text/javascript\">
							alert(\"Cadastrado com Sucesso.\");
						</script>
						";
				header("location:login.php");				
				
			}
		}
		// Se houver mensagens de erro, exibe-as
		if (count($error) != 0) {
			foreach ($error as $erro) {
				echo $erro . "<br />";
			}
		}
		}
	}
?>

<body>
	<div class="container-fluid cadastropj">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <h3>Cadastro de Clínica:</h3>
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
            <label for="razaosocial">Razão Social:</label>
            <input type="text" class="form-control" id="razaosocial" placeholder="Razão Social" name="razaosocial">
          </div>
          <div class="form-group">
            <label for="cnpj">CNPJ:</label>
            <input type="text" class="form-control" id="cnpj" placeholder="CNPJ" name="cnpj" maxlength="18">
          </div>  
          <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" placeholder="E-mail" name="email">
          </div> 
          <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha">
          </div>                
          <div class="form-group">
            <label for="imagem">Foto:</label>
            <input type="file" class="form-control-file border" id="imagem" name="imagem">
          </div>

          <input type="submit" name="cadastrar" class="btn btn-info" value="Cadastrar"/>
          <button type="reset" class="btn btn-info">Limpar</button>
        </form>
      </div>
      <div class="col-sm-3"></div>
    </div>
 </div>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
	 <script type="text/javascript">
	$(document).ready(function(){	
		$("#cnpj").mask("99.999.999/9999-99");
	});
</script>
</body>

<?php
include "footer.php";
?>