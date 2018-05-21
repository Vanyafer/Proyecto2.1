
<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/Perfil3.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="./assets/js/jquery.min.js"></script>
</head>
<body>
<?php 

$id_usuario = $_GET['id'];
$us = new UsuarioControlador();
$u = $us->Usuario($id_usuario);


?>
<div class="Perfil">
	<div class="Datos">
	<div class="Foto">Hola</div>
		
		
<div class="Nombre"><?php echo $u->nombre_usuario; ?><hr></div>

		<div class="Informacion">
			<p>Informacion</p>
			<div class="InformacionP"></div>
		</div>
	</div>
<div class="Opciones">
					
					<a href="">Portafolio</a>
					<a href="Seguir.php?id_usuario=<?php echo $id_usuario ?>" id="Seguir">Seguir</a>
					<a href="Amigos.php?id_usuario=<?php echo $id_usuario ?>" id="Amigo" class="Artista">Agregar Amigo</a>
					<a href="">Enviar mensaje</a>
					<a href="Control.php?c=Reportes&a=ReportarUsuario&id=<?php echo $id_usuario ?>">Reportar Usuario</a>
				
			</div>
</div>
<?php include "ConfiguracionPerfil.php"; ?>
<div class="overlaySeguidores">
     		
<div class="Pop">
	<fieldset>
	<div class="Box">
	<h1>Seguidores</h1>
	<?php
	$se = new SeguidoresControlador();
	$seg = $se->ListaSeguidores();
		foreach ($seg as $s) {
			$us = new UsuarioControlador();
						$u = $us->Usuario($s->id_usuario1);
			echo "<a href='Control.php?c=Perfiles&a=Perfiles&id=$s->id_usuario1;'>$u->nombre_usuario</a> <br>";
		}			
	?>
	</div>
	<input type="submit" value="Cerrar" class="Close" id="CloseSeguidores">
	</fieldset>
</div>
</div>
</body>
</html>
