<?php 
		session_start();
	if(isset($_SESSION['id_usuario'])){
		header("location: Control.php?c=Inicio&a=Inicio");
	}
		else{

		echo "<script>alert('Usuario');</script>";
		header("location: usuario.php");
	}
	 ?>
