<?php 
$id= $_GET['id'];
$ini = new InicioControlador();
$p = $ini->PublicacionInfo($id);

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="./assets/css/Foro.css">
</head>
<body>
	<div class="Foros">
		<h1>Está reportando la publicación:</h1>
		<p><img src="<?php echo $p->imagen; ?>"></p>
		<p></p>
	<h3>Razón:</h3>
	<form action="Control.php?c=Reportes&a=ReportarPublicacion" method="POST">
			<input type="hidden" name="id_publicacion" id="id_publicacion" value="<?php echo $p->id_publicacion ?>">
			<input type="hidden" name="id_artista" id="id_artista" value="<?php echo $p->id_artista ?>">
			<select name="razon" id="razon">
			<option value="Contenido Explícito Sin Filtro">Contenido Explícito Sin Filtro</option>
			<option value="Spam">Spam</option>
			<option value="Plagio">Plagio</option>
			<option value="Lenguaje Ofensivo">Lenguaje Ofensivo</option>
			<option value="Acoso">Acoso</option>
		</select>
		<p></p>
		<input type="submit" name="Reportar" value="Reportar">
	</form>
	</div>
</body>
</html>



