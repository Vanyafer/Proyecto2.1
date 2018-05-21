
<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/PerfilInvitado.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php 
$id_usuario = $_GET['id'];
$us = new UsuarioControlador();
$u = $us->Usuario($id_usuario);
	?>
<div class="Perfil">
	<div class="Datos">
		<div class="Box">
			<div class="Foto"><img src="<?php echo $result['imagen_perfil'] ?>"></div>
			<div class="mensaje"><a href="Mensajes.php">Enviar mensaje</a></div>
			<a href="reportarusuario.php?id=<?php echo $id_usuario ?>">Reportar Usuario</a>
				
		</div>
		
		
		<div class="Box">
			<div class="Nombre"><?php echo $u->nombre_usuario; ?><hr></div>
			<br>
			<div class="Informacion">
				<p>Informacion</p>
				<div class="InformacionP"> <?php echo $result['informacion_contacto']; ?></div>
			</div>
			<div class="Informacion">
				<p>Informacion</p>
				<div class="InformacionP"><?php echo $result['perfil']; ?></div>
			</div>
		</div>
		
		
	</div>



</div>
</body>
</html>