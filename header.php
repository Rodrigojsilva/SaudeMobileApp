
<!DOCTYPE html>
<html lang="pt">
<head>
  <title>Saude Mobile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
<link rel="stylesheet" href="./css/index.css">
</head>
 <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
  <div class="container">
    <a class="navbar-brand" href="loginadm.php">MENU</a>
    <button class="navbar-toggler navbar-toggler-icon" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Cadastrar</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="cadastracliente.php">Usuário</a>
            <a class="dropdown-item" href="cadastramedico.php">Profissional</a>
            <a class="dropdown-item" href="cadastrapj.php">Clínica (PJ)</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sobre.php">Sobre</a>
        </li>
      </ul>
    </div>
  </div>
</nav>