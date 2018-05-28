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
			echo "<a href='Control.php?c=Perfiles&a=Perfiles&id=$s->id_usuario1'>$u->nombre_usuario</a> <br>";
		}			
	?>
	</div>
	<input type="submit" value="Cerrar" class="Close" id="CloseSeguidores">
	</fieldset>
	</div>
</div>

<div class="overlayAmigo">
	<div class="Pop">
		
		<fieldset>
		<div class="Box">
			<h1>Amigos</h1>
			<?php
			$am = new AmigosControlador();
			$amig = $am->ListaAmigos();
				foreach ($amig as $a) {
					$us = new UsuarioControlador();
						if($a->id_usuario1 == $_SESSION['id_usuario']){
							$u = $us->Usuario($a->id_usuario2);
						}
						if($a->id_usuario2 == $_SESSION['id_usuario']){
							$u = $us->Usuario($a->id_usuario1);
						}
								

					echo "<a href='Control.php?c=Perfiles&a=Perfiles&id=$u->id_usuario'>$u->nombre_usuario</a> <a href='Control.php?c=Amigos&a=Eliminar&id=".$a->id_amigos."&id_usuario=".$id_usuario."'>Eliminar</a><br>";
				}
			?>
		</div>

		<div class="Box">
		<h1>Solicitudes de amistad</h1>
		<?php
			$sol = $am->Solicitudes();
			foreach ($sol as $a) {
				$us = new UsuarioControlador();
				$u = $us->Usuario($a->id_usuario1);
				echo "<a href='Control.php?c=Perfiles&a=Perfiles&id=$u->id_usuario'>$u->nombre_usuario</a><a href='Control.php?c=Amigos&a=Aceptar&id=".$a->id_amigos."&id_usuario=".$id_usuario."'>Aceptar</a><a href='Control.php?c=Amigos&a=Eliminar&id=".$a->id_amigos."'>Denegar</a><br>";
			}
		?>
		</div>
		<input type="submit" value="Cerrar" class="Close" id="CloseAmigo">
		</fieldset>
	</div>
</div>

<?php

if($id_usuario == $_SESSION['id_usuario']){
	echo "<script>
				$('#Seguir').removeAttr('href');
				$('#Seguir').addClass('AbrirSeguidores');
				$('#Seguir').html('Seguidores');
		</script>";
	echo "<script>
				$('#Amigo').removeAttr('href');
				$('#Amigo').addClass('AbrirAmigo');
				$('#Amigo').html('Amigos');
		</script>";
	echo "<script>
			$('.Dueno').css('display','none');
			$('#Bandeja').attr('href','Control.php?c=Mensajes&a=BandejaEntrada');
			$('#Bandeja').html('Ver Mensajes');
		</script>";
}else{
	$seguidos = $se->Siguiendo($id_usuario);
	if($seguidos == 1){

			echo "<script>$('#Seguir').html('Dejar de seguir'); $('#Seguir').attr('href','Control.php?c=Seguidores&a=DejarSeguir&id_usuario=".$id_usuario."');</script>";

	}

	$estado = $am->Estado($id_usuario);
	if($estado == 1){
		$amigo = $am->Amigo($id_usuario);
		echo "<script>$('#Amigo').html('Eliminar Amigo'); $('#Amigo').attr('href','Control.php?c=Amigos&a=Eliminar&id=".$amigo->id_amigos."&id_usuario=".$id_usuario."');</script>";
	}
	if($estado == 2){
		$amigo = $am->Amigo($id_usuario);
		echo "<script>$('#Amigo').html('Aceptar Solicitud'); $('#Amigo').attr('href','Control.php?c=Amigos&a=Aceptar&id=".$amigo->id_amigos."&id_usuario=".$id_usuario."');</script>";
	}
	if($estado == 3){
		$amigo = $am->Amigo($id_usuario);
		echo "<script>$('#Amigo').html('Solicitud pendiente'); $('#Amigo').attr('href','Control.php?c=Amigos&a=Eliminar&id=".$amigo->id_amigos."&id_usuario=".$id_usuario."');</script>";
	}
}
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#CloseAmigo").click(function(){
		       	$(".overlayAmigo").fadeOut(400);
		    });
		$("#CloseSeguidores").click(function(){
		       	$(".overlaySeguidores").fadeOut(400);
		    });
		    $(".AbrirAmigo").click(function(){
		    	
		        $(".overlayAmigo").fadeIn(400);
		    });
		    $(".AbrirSeguidores").click(function(){
		    	
		        $(".overlaySeguidores").fadeIn(400);
		    });

	});
</script>
