<?php session_start(); ?>
<?php 

$codconsulta = $_GET['codconsulta'];

require "Consulta.class.php";

$consulta = new consulta();
$consulta->codconsulta = $codconsulta;
$consulta->excluir();
$msg = "Excluido com sucesso!";

?>

<?php $title = "Excluir Consulta"; ?>
<?php include "header.php"; ?>

<section class="container">
    <?php header("location:lista-consulta.php");?>

</section>

<?php include "../footer.php"; ?>