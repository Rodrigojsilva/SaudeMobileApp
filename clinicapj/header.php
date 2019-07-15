
<!DOCTYPE html>
<html lang="pt">
<head>
  <title>Saude Mobile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../css/index.css">
</head>


<nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">SAÚDE MOBILE</a>
    <button class="navbar-toggler navbar-toggler-icon" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <!--<li class="nav-item active">
          <h4>Bem Vindo Dr(a). <?php echo $_SESSION["clinicanome"];?><span class="sr-only"></span></h4>
        </li>-->
        <li class="nav-item">
          <a class="nav-link" href="index.php">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="visualizar-clinica.php">Perfil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="lista-consulta.php">Agenda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="lista-locais.php">Locais de Atendimento</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="lista-especialidades.php">Especialidades</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sair.php">Sair</a>
        </li>
      </ul>
    </div>
 </nav>