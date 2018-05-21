<div class="overlayAmigo">
     		<?php include "ListaAmigos.php"; ?>
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
}else{
	$id_usuario1 = $_SESSION['id_usuario'];
	$consultaSeguidos = mysqli_query($conexion,"SELECT * FROM seguidores where id_usuario1 = $id_usuario1 and id_usuario2 = $id_usuario");
	
		if(mysqli_num_rows($consultaSeguidos)==1){
			echo "<script>$('#Seguir').html('Dejar de seguir');</script>";
		}
	$consultaAmigos = mysqli_query($conexion,"SELECT * FROM amigos where id_usuario1 = $id_usuario1 and id_usuario2 = $id_usuario");

		if(mysqli_num_rows($consultaAmigos)==1){
			$resultAmigos=mysqli_fetch_array($consultaAmigos);
			if($resultAmigos['estado']==0){
			echo "<script>$('#Amigo').html('Solicitud enviada');</script>";
			}else{
				echo "<script>$('#Amigo').html('Eliminar amigo');</script>";
			}
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
<?php
			if($_SESSION['tipo_usuario']==1){
				echo "<script Language='JavaScript'>
				document.getElementById('reto').style.visibility='visible';
				</script>";
			}
			if($_SESSION['tipo_usuario']==2){
				echo "<script Language='JavaScript'>document.getElementById('Amigo').style.display='none';</script>";
			}
	?>