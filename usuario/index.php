<?php session_start(); ?>

<?php if(!isset($_SESSION['cliente'])); ?>

<?php include "header.php"; ?>

<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <img class="img-fluid mx-auto d-block" src="../img/thilogo1.png">
      <!--<h1>Bem vindo ao Saúde-Mobile!</h1>-->
      <h3>Bem vindo(a), <?php echo $_SESSION["clientenome"];?>!</h3>
      <h3>Área do Cliente:</h3>
    </div>
    <div class="col-sm-2"></div>
  </div>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8 button">
      <input type="submit" value="Procurar Profissionais" class="btn btn-info" onclick="window.location='listar-medico.php';"/>
    </div>
    <div class="col-sm-2"></div>
  </div>
</div>
</body>

<?php include "../footer.php"; ?>