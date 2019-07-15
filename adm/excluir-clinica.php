<?php session_start(); ?>
<?php 

$codclinica = $_GET['codpj'];

require "localdeaten.class.php";

$clinica = new cliente();
$clinica->codclinica = $codclinica;
$clinica->excluir();
$msg = "Excluido com sucesso!";

?>

<?php $title = "Excluir Clínica"; ?>
<?php include "header.php"; ?>

<section class="container">
    <?php header("location:lista-clinica.php");?>

</section>

<?php include "../footer.php"; ?>