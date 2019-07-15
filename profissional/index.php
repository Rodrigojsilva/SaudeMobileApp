<?php session_start(); ?>

<?php if(!isset($_SESSION['medico'])); ?>

<?php include "header.php"; ?>

<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <img class="img-fluid mx-auto d-block" src="../img/thilogo1.png">
      <!--<h1>Bem vindo ao Saúde-Mobile!</h1>-->
      <h3>Bem vindo(a), Dr(a). <?php echo $_SESSION["mediconome"];?>!</h3>
      <h3>Área do Profissional:</h3>
    </div>
    <div class="col-sm-2"></div>
  </div>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8 button">
      <input type="submit" value="Agenda" class="btn btn-info" onclick="window.location='lista-consulta.php';"/>
    </div>
    <div class="col-sm-2"></div>
  </div>
</div>
</body>

<?php include "../footer.php"; ?>