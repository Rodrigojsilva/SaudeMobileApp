<?php session_start(); ?>
<?php 

$codmedico = $_GET['codmedico'];

require "localdeaten.class.php";

$medico = new cliente();
$medico->codmedico = $codmedico;
$medico->excluir();
$msg = "Excluido com sucesso!";

?>

<?php $title = "Excluir Medico"; ?>
<?php include "header.php"; ?>

<section class="container">
    <?php header("location:lista-medico.php");?>

</section>

<?php include "../footer.php"; ?>