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
    $cpf = $_POST['cpf'];
    $identidade = $_POST['identidade'];
		$datadenascimento = $_POST['datadenascimento'];
		$sexo = $_POST['sexo'];
		$tiposanguineo = $_POST['tiposanguineo'];
		$doencapreexistente = $_POST['doencapreexistente'];
		$medicacao = $_POST['medicacao'];
		$cep = $_POST['cep'];
		$endereco = $_POST['endereco'];
		$numero = $_POST['numero'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		$telefone = $_POST['telefone'];
		$celular = $_POST['celular'];
		$whatsapp = $_POST['whatsapp'];
		$tipopaciente = $_POST['tipopaciente'];
		$convenio = $_POST['convenio'];
		$tipoconvenio = $_POST['tipoconvenio'];
		$titular = $_POST['titular'];		
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
        	$caminho_imagem = "fotoscliente/" . $nome_imagem;
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
			// Insere os dados no banco
			$sql = "insert into cliente values(null,'".$nome."','".$email."','".$senha."','".$cpf."','".$identidade."','".$datadenascimento."','".$sexo."','".$tiposanguineo."','".$doencapreexistente."','".$medicacao."',
			'".$cep."','".$endereco."','".$numero."','".$bairro."','".$cidade."','".$estado."','".$telefone."','".$celular."','".$whatsapp."','".$tipopaciente."','".$convenio."','".$tipoconvenio ."','".$titular."','".$nome_imagem."')";

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
	<div class="container-fluid cadastrocliente">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <h3>Cadastro de Usuário:</h3>
    </div>
    <div class="col-sm-3"></div>
  </div>
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" name="cadastro">
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
        <div class="form-group">
          <label for="cpf">CPF:</label>
          <input type="text" class="form-control" id="cpf" placeholder="CPF" name="cpf" maxlength="14">
        </div> 
        <div class="form-group">
          <label for="identidade">Identidade:</label>
          <input type="text" class="form-control" id="identidade" placeholder="Identidade" name="identidade" maxlength="14">
        </div> 
        <div class="form-group">
          <label for="datadenascimento">Data de Nascimento:</label>
          <input type="date" class="form-control" id="datadenascimento" placeholder="Data de Nascimento" name="datadenascimento">
        </div> 	
        <div class="form-group">
          <label for="sexo">Sexo:</label>
          <select name="sexo">
              <option value="feminino">Feminino</option> 
              <option value="masculino">Masculino</option>
          </select>
        </div>
        <div class="form-group">
          <label for="tiposanguineo">Tipo Sanguineo:</label>
          <select name="tiposanguineo">
            <option value="a+">A+</option> 
            <option value="a-">A-</option>
            <option value="b+">B+</option>
            <option value="b-">B-</option>
            <option value="ab+">AB+</option>
            <option value="ab-">AB-</option>
            <option value="o+">O+</option>
            <option value="o-">O-</option>
          </select>
        </div>
        <div class="form-group">
          <label for="doencapreexistente">Doença Pré Existentes:</label>
          <textarea type="text" class="form-control" id="doencapreexistente" placeholder="Digite Aqui" name="doencapreexistente"></textarea>
        </div>
        <div class="form-group">
          <label for="medicacao">Medicação:</label>
          <textarea type="text" class="form-control" id="medicacao" placeholder="Digite Aqui" name="medicacao"></textarea>
        </div>
        <div class="form-group">
          <label for="cep">CEP:</label>
          <input type="text" class="form-control" id="cep" placeholder="CEP" name="cep">   	
          <span class="input-group-btn">
            <button class="btn btn-info" type="button" id="buscaCEP">Buscar</button>
          </span>
        </div>         
        <div id="cepstatus"></div>

        <div class="form-group">
          <label for="endereco">Endereço:</label>
          <input type="text" class="form-control" id="endereco" placeholder="Endereço" name="endereco" readonly/>
        </div>
        <div class="form-group">
          <label for="numero">Número:</label>
          <input type="text" class="form-control" id="numero" placeholder="Número" name="numero">
        </div>
        <div class="form-group">
          <label for="bairro">Bairro:</label>
          <input type="text" class="form-control" id="bairro" placeholder="Bairro" name="bairro" readonly/>
        </div>
        <div class="form-group">
          <label for="cidade">Cidade:</label>
          <input type="text" class="form-control" id="cidade" placeholder="Cidade" name="cidade" readonly/>
        </div>
        <div class="form-group">
          <label for="estado">Estado:</label>
          <input type="text" class="form-control" id="uf" placeholder="Estado" name="estado" readonly/>
        </div>
        <div class="form-group">
          <label for="telefone">Telefone:</label>
          <input type="text" class="form-control" id="telefone" placeholder="Telefone" name="telefone" maxlength="11">
        </div>
        <div class="form-group">
          <label for="celular">Celular:</label>
          <input type="text" class="form-control" id="celular" placeholder="Celular" name="celular" maxlength="11">
        </div>
        <div class="form-group">
          <label for="whatsapp">WhatsApp:</label>
          <input type="text" class="form-control" id="whatsapp" placeholder="WhatsApp" name="whatsapp" maxlength="11">
        </div>
        <div class="form-group">
          <label for="tipopaciente">Tipo de Paciente:</label>
          <select name="tipopaciente">
            <option value="plano de saude">Plano de Saúde</option> 
            <option value="particular">Particular</option>
          </select>
        </div>
        <div class="form-group">
          <label for="convenio">Convenio:</label>
          <input type="text" class="form-control" id="convenio" placeholder="Convenio" name="convenio">
        </div>
        <div class="form-group">
          <label for="tipoconvenio">Tipo de Convenio:</label>
          <input type="text" class="form-control" id="tipoconvenio" placeholder="Tipo de Convenio" name="tipoconvenio">
        </div>
        <div class="form-group">
          <label for="titular">Titular do Plano:</label>
          <input type="text" class="form-control" id="titular" placeholder="Titular do Plano" name="titular">
        </div>   
        <div class="form-group imagem">
          <label for="imagem">Foto:</label>
          <input type="file" class="form-control-file border" id="imagem" placeholder="Foto" name="imagem">
        </div>
        
          <input type="submit" name="cadastrar" class="btn btn-info" value="Cadastrar"/>
          <button type="reset" class="btn btn-info">Limpar</button>
      </form>
    </div>
    <div class="col-sm-3"></div>
  </div>
  <script src="js/cep.js" type="text/javascript"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
  <script>
    $(document).ready(function () { 
        var $cpf = $("#cpf");
        $cpf.mask('000.000.000-00', {reverse: true});
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
	$("#cep").mask("99.999-999");
});
</script>
 </div>
</body>

<?php
include "footer.php";
?>