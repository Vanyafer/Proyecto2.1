<script type="text/javascript">
	$(document).ready(function(){
		$(".usuario").click(function(){
		    	usuario = $(this).attr("id");
		    	direccion = "Perfiles.php?id_usuario="+usuario;
		    	$(".usuarioComentario").attr("href",direccion);
		    });
		    	
	});
</script>
<div class="Pop">
	
	<fieldset>
	<div class="Box">
	<h1>Amigos</h1>
	<?php
	$id_usuarioA = $_SESSION['id_usuario'];
			$consultaAmigos = mysqli_query($conexion,"SELECT * FROM amigos where estado = 1 and (id_usuario1 = $id_usuarioA or id_usuario2 = $id_usuarioA)");
			if(mysqli_num_rows($consultaAmigos)){
				while($result = mysqli_fetch_array($consultaAmigos)){
					$usuario1 = $result['id_usuario1'];
					$usuario2 = $result['id_usuario2'];
					if($usuario1 == $id_usuarioA){
						$usuarioX = $usuario2;
					}else{
						$usuarioX = $usuario1;
					}
					$amigos = $result['id_amigos'];
					$consultaUsuario = mysqli_query($conexion,"SELECT * FROM usuario where id_usuario = $usuarioX ");
					$resultUsuario = mysqli_fetch_array($consultaUsuario);
					echo "<a href='Perfiles.php?id_usuario=".$usuario1."'>".$resultUsuario['nombre_usuario']."</a>
					<a href='AceptarAmigo.php?id=".$amigos."'>Eliminar amigo</a> <br>";
					}
					
			}
	?>
	</div>

	<div class="Box">
	<h1>Solicitudes de amistad</h1>
	<?php
	$id_usuarioA = $_SESSION['id_usuario'];
			$consultaAmigos = mysqli_query($conexion,"SELECT * FROM amigos where estado = 0 and id_usuario2 = $id_usuarioA");
			if(mysqli_num_rows($consultaAmigos)){
				while($resultAmigos = mysqli_fetch_array($consultaAmigos)){
					$usuario1 = $resultAmigos['id_usuario1'];
					$amigos = $resultAmigos['id_amigos'];
					$consultaUsuario = mysqli_query($conexion,"SELECT * FROM usuario where id_usuario = $usuario1");
					$resultUsuario = mysqli_fetch_array($consultaUsuario);
					echo "<a href='Perfiles.php?id_usuario=".$usuario1."'>".$resultUsuario['nombre_usuario']."</a>
						<a href='AceptarAmigo.php?id=".$amigos."'>Aceptar solicitud</a><br>";
					}
				}
	?>
	</div>
	<input type="submit" value="Cerrar" class="Close" id="CloseAmigo">
	</fieldset>
</div>