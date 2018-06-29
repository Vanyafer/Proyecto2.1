
<div class="modal listFriends data">

	<div class="body">
		
		<div class="list">
			<h1>Lista de Amigos</h1>
			<?php

				$am = new AmigosControlador();
				$amig = $am->ListaAmigos();
				if(!empty($amig)):
					foreach ($amig as $a) {
						$us = new UsuarioControlador();
							if($a->id_usuario1 == $_SESSION['id_usuario']){
								$u = $us->Usuario($a->id_usuario2);
							}
							if($a->id_usuario2 == $_SESSION['id_usuario']){
								$u = $us->Usuario($a->id_usuario1);
							}
									

						echo "<a class='space-between' href='Control.php?c=Perfiles&a=Perfiles&id=$u->id_usuario'>$u->nombre_usuario<a href='Control.php?c=Amigos&a=Eliminar&id=".$a->id_amigos."&id_usuario=".$id_usuario."'><i class='fas fa-trash-alt'></i></a></a>";
					}
				else:
					echo "<a>No tienes ningún amigo</a>";
				endif;

			?>
			<h1>Solicitudes</h1>
			<?php
		
				
				$sol = $am->Solicitudes();
				if(!empty($sol)):
				foreach ($sol as $a) {
					$us = new UsuarioControlador();
					$u = $us->Usuario($a->id_usuario1);
					echo "<a href='Control.php?c=Perfiles&a=Perfiles&id=$u->id_usuario'>$u->nombre_usuario</a><a href='Control.php?c=Amigos&a=Aceptar&id=".$a->id_amigos."&id_usuario=".$id_usuario."'>Aceptar</a><a href='Control.php?c=Amigos&a=Eliminar&id=".$a->id_amigos."'>Denegar</a><br>";
				}
				else:
					echo "<a>No tienes solicitudes de amistad</a>";
				endif;

			?>
		</div>

	</div>

</div>

<div class="modal listFollowers data">
	
	<div class="body">
		<div class="list">
			<h1>Lista de Seguidores</h1>
			<?php

				$se = new SeguidoresControlador();
				$seg = $se->ListaSeguidores();
			
				if(!empty($seg)):
					foreach ($seg as $s) {
						$us = new UsuarioControlador();
									$u = $us->Usuario($s->id_usuario1);
						echo "<a href='Control.php?c=Perfiles&a=Perfiles&id=$s->id_usuario1'>$u->nombre_usuario</a>";
					}	
				else:		
					echo "<a>No tienes ningun seguidor</a>";
				endif;
			?>
		</div>
	</div>

</div>

<?php
if(isset($_SESSION['id_usuario'])){
if($id_usuario == $_SESSION['id_usuario']|| $_SESSION['tipo_usuario']==3 ){
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
	if($_SESSION['tipo_usuario']==3){
		echo "<script>
				$('#Bandeja').attr('href','Control.php?c=Reportes&a=ReportesUsuario&id_usuario=".$id_usuario."');
				$('#Bandeja').html('Reportes Usuario');
			</script>";
	}
}else{
	echo "<script>
			$('.Dueno').css('display','none');
			$('#Seguir').css('display','none');
			$('#Amigo').css('display','none');
			$('#Bandeja').css('display','none');
		</script>";

}

?>
<script type="text/javascript">
	$(document).ready(function(){

		    $(".AbrirAmigo").click(function(){
		    	$('.listFriends').fadeIn(400).css('display','flex');
		    });
		    $(".AbrirSeguidores").click(function(){
				$('.listFollowers').fadeIn(400).css('display','flex');
			});
			
			$(window).click(e => {
				if(e.target == $('.modal.listFriends')[0]) {
					$('.modal.listFriends').fadeOut(400)
				} else if(e.target == $('.modal.listFollowers')[0]) {
					$('.modal.listFollowers').fadeOut(400)
				}
			})

	});
</script>
