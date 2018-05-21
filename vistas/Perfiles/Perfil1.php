<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/Perfil1.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php 
$id_usuario = $_GET['id'];
$us = new UsuarioControlador();
$u = $us->Usuario($id_usuario);


?>
<div class="Perfil">
	<div class="Imagen">
		<div class="Foto derecha">Hola</div>
	</div>
	<div class="Datos">
		<div>
			<div class="Nombre"><?php echo $u->nombre_usuario; ?></div>
			<div class="Opciones">
					<a href="">Portafolio</a>
					<a href="Seguir.php?id_usuario=<?php echo $id_usuario ?>" id="Seguir">Seguir</a>
					<a href="Amigos.php?id_usuario=<?php echo $id_usuario ?>" id="Amigo">Agregar Amigo</a>
					<a href="">Enviar mensaje</a>
					
					<a href="Mensajes.php">Enviar mensaje</a>
					<a href="reportarusuario.php?id=<?php echo $id_usuario ?>">Reportar Usuario</a>
				
			</div>
		</div>
		
		<div class="Informacion">
			<p>Informacion</p>
			<div class="InformacionP"></div>
		</div>
	</div>
</div>
<div class="Portafolio"><a href="Portafolio.php">Portafolio</a></div>
</body>
</html>
