
<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/Perfil2.css">
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
	<div class="Foto">Hola</div>
		
			<div class="Opciones">
					<div class="mensaje"><a href="">Enviar mensaje</a></div>
					<a href="">Portafolio</a>
					
					<a href="">Portafolio</a>
					<a href="Control.php?c=Seguidores&a=Seguir&id_usuario=<?php echo $id_usuario ?>" id="Seguir">Seguir</a>
					<a href="Control.php?c=Amigos&a=Agregar&id_usuario=<?php echo $id_usuario ?>" id="Amigo" class="Artista">Agregar Amigo</a>
					<a href="Control.php?c=Reportes&a=ReportarUsuario&id=<?php echo $id_usuario ?>">Reportar Usuario</a>				
			</div>
		
		
		<div class="Informacion">
			<p>Informacion</p>
			<div class="InformacionP"></div>
		</div>
	</div>

<div class="Nombre"><?php echo $u->nombre_usuario; ?><hr></div>

</div>
<?php include "ConfiguracionPerfil.php"; ?>
</body>
</html>
