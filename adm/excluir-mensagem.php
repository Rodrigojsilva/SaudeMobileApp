<?php session_start(); ?>
<?php 

$codcontato = $_GET['codcontato'];

require "localdeaten.class.php";

$cliente = new cliente();
$cliente->codcontato = $codcontato;
$cliente->excluir();
$msg = "Excluido com sucesso!";

?>

<?php $title = "Excluir Mensagem"; ?>
<?php include "header.php"; ?>

<section class="container">
    <?php header("location:lista-mensagem.php");?>

</section>

<?php include "../footer.php"; ?>