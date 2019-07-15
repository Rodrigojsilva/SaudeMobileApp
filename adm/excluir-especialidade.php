<?php session_start(); ?>
<?php 

$codespecialidade = $_GET['codespecialidade'];

require "especialidades.class.php";

$especialidades = new especialidades();
$especialidades->codespecialidade = $codespecialidade;
$especialidades->excluir();
$msg = "Excluido com sucesso!";

?>

<?php $title = "Excluir Especialidade"; ?>
<?php include "header.php"; ?>

<section class="container">
    <?php header("location:lista-especialidades.php");?>

</section>

<?php include "../footer.php"; ?>