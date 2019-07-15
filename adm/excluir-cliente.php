<?php session_start(); ?>
<?php 

$codcliente = $_GET['codcliente'];

require "localdeaten.class.php";

$cliente = new cliente();
$cliente->codcliente = $codcliente;
$cliente->excluir();
$msg = "Excluido com sucesso!";

?>

<?php $title = "Excluir Medico"; ?>
<?php include "header.php"; ?>

<section class="container">
    <?php header("location:lista-cliente.php");?>

</section>

<?php include "../footer.php"; ?>