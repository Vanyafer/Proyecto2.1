<title>Perfil</title>
<?php 
$id_usuario = $_GET['id'];
$us = new UsuarioControlador();
$u = $us->Usuario($id_usuario);

	?>

<div class="profile-1">
	<div class="container min">
		<div class="grid-profile-1">
			<div class="img">
				<img src="imagenes/imgPerfil/test2.jpeg">
			</div>
			<div class="details">
				<div class="grid columns-1">
					<div class="topbar">
						<div class="name"><?php echo $u->nombre_usuario; ?></div>
						<a href="Control.php?c=Mensajes&a=Mensajes&id=<?php echo $id_usuario ?>" id="Bandeja">Enviar mensaje</a>
						<a href="Control.php?c=Reportes&a=ReportarUsuario&id=<?php echo $id_usuario ?>" class="Dueno " id="Moderador">Reportar Usuario</a>
					</div>
					<div class="info">
						<div class="header">Información</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include "ConfiguracionPerfil.php"; ?>