<?php session_start(); ?>
<?php 

$coddeatendimento = $_GET['coddeatendimento'];

require "localdeaten.class.php";

$localdeatendimento = new localdeatendimento();
$localdeatendimento->coddeatendimento = $coddeatendimento;
$localdeatendimento->excluir();
$msg = "Excluido com sucesso!";

?>

<?php $title = "Excluir Local"; ?>
<?php include "header.php"; ?>

<section class="container">
    <?php header("location:lista-locais.php");?>

</section>

<?php include "../footer.php"; ?>