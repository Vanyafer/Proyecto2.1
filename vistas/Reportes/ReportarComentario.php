<?php 
$id_comentario = $_GET['id'];
$Com = new ComentarioControlador();
$co = $Com->Comentario($id_comentario);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="./assets/css/Foro.css">
</head>
<body>
	<div class="Foros">
		<h1>Está reportando el comentario:</h1>
		<p><?php echo $co->contenido; ?></p>
		<p></p>
	<h3>Razón:</h3>
	
	<form action="Control.php?c=Reportes&a=ReportarComentario" method="POST">
		<input type="hidden" name="id_comentario" id="id_comentario" value="<?php echo $co->id_comentario ?>">
		<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $co->id_usuario ?>">
		<select name="razon" id="razon">
			<option value="Spam">Spam</option>
			<option value="Lenguaje Ofensivo">Lenguaje Ofensivo</option>
			<option value="Acoso">Acoso</option>
		</select>
		<p></p>
		<input type="submit" name="Reportar" value="Reportar">
	</form>
	</div>
</body>
</html>

