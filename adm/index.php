<?php session_start(); ?>
<?php
   if(!isset($_SESSION['adm']));

?>
<?php
include "header.php";
?>

<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <img class="img-fluid mx-auto d-block" src="../img/thilogo1.png">
      <!--<h1>Bem vindo ao Saúde-Mobile!</h1>-->
      <h3>Bem vindo(a), <?php echo $_SESSION["admnome"];?>!</h3>
      <h3>Área Administrativa</h3>
    </div>
    <div class="col-sm-2"></div>
  </div>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8 button">
      <input type="submit" value="Cadastrar Novo ADM" class="btn btn-info" onclick="window.location='cadastraadm.php';"/>
    </div>
    <div class="col-sm-2"></div>
  </div>
</div>
</body>

<?php
include "../footer.php";
?>