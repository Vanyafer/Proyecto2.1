
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
			<div class="Foto"><img src="<? ?>"></div>
			<div class="mensaje"><a href="Control.php?c=Mensajes&a=Mensajes&id=<?php echo $id_usuario ?>">Enviar mensaje</a></div>
			<a href="Control.php?c=Reportes&a=ReportarUsuario&id=<?php echo $id_usuario ?>" >Reportar Usuario</a>
				
		</div>
		
		
		<div class="Box">
			<div class="Nombre"><?php echo $u->nombre_usuario; ?><hr></div>
			<br>
			<div class="Informacion">
				<p>Informacion</p>
				<div class="InformacionP"> <?php  ?></div>
			</div>
			<div class="Informacion">
				<p>Informacion</p>
				<div class="InformacionP"><?php ?></div>
			</div>
		</div>
		
		
	</div>



</div>
</body>
</html>