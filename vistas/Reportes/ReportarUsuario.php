<?php 
$id_usuario = $_GET['id'];
$us = new UsuarioControlador();
$u = $us->Usuario($id_usuario);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="./assets/css/Foro.css">
</head>
<body>
	<div class="Foros">
		<h1>Está reportando al usuario:</h1>
		<p><?php echo $u->nombre_usuario; ?></p>
		<p></p>
	<h3>Razón:</h3>
	<form action="Control.php?c=Reportes&a=ReportarUsuario" method="POST">
		<p></p>
		<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $id_usuario ?>">
		<input type="text" name="razon" id="razon">
		<p></p>
		<input type="submit" name="Reportar" value="Reportar">
	</form>
	</div>
</body>
</html>
