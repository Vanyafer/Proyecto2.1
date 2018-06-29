
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

<div class="profile-3">
	<div class="container">
		<div class="grid-profile-1">
			<div class="img">
				<img src="imagenes/imgPerfil/test.jpeg">
			</div>
			<div class="details">
				<div class="grid columns-1">
					<div class="topbar">
						<a href="">Portafolio</a>
						<a href="Control.php?c=Seguidores&a=Seguir&id_usuario=<?php echo $id_usuario ?>" id="Seguir">Seguir</a>
						<a href="Control.php?c=Amigos&a=Agregar&id_usuario=<?php echo $id_usuario ?>" id="Amigo" class="Amigo">Agregar Amigo</a>
						
						<a href="Control.php?c=Mensajes&a=Mensajes&id=<?php echo $id_usuario ?>" id="Bandeja">Enviar mensaje</a>
						<a href="Control.php?c=Reportes&a=ReportarUsuario&id=<?php echo $id_usuario ?>" class="Dueno">Reportar Usuario</a>
					</div>
				</div>
			</div>
			<div>
				<div class="grid columns-1">
					<div class="name"><?php echo $u->nombre_usuario;?></div>
					<div class="info">
						<div class="header">Información</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<?php include "ConfiguracionPerfil.php"; ?>

</body>
</html>
