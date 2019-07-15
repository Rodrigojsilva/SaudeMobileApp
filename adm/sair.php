<?php
	session_start();
	session_destroy();


	$msg = "logout efetuado";
	header("location:../index.php?msg=".$msg);
?>