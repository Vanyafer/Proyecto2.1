<?php 
	$id_forohilo = $_GET['id'];
	$Hil = new ForoControlador();
	$hi = $Hil->Hilo();
	$us = new UsuarioControlador();
	$u = $us->Usuario($hi->id_usuario);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="./assets/css/Foro.css">
</head>
<body>

<div class="container">
	<div class="grid columns-1">
		<h1 class="margin-top"><?php echo $hi->titulo.' - '.$u->nombre_usuario;?></h1>
		<ul class="collection">
			<li class="header">
				<?php echo $hi->contenido;?>
			</li>
			<?php
				$Res = new ForoRespuestaControlador();
				$re = $Res->Respuestas($id_forohilo);

				foreach ($re as $r) {
					
					$us = new UsuarioControlador();
					$u = $us->Usuario($r->id_usuario); ?>
				
					<li class="item">
						<div><a><?php echo 'Respuesta: '.$r->contenido;?></a></div>
						<div><a class="author margin-top right" href="Control.php?c=Perfiles&a=Perfiles&id=<?php echo $r->id_usuario;?>"><?php echo 'Autor: '.$u->nombre_usuario;?></a></div>
					</li>
					

				<?php /*
				if($r->id_usuario == $_SESSION['id_usuario'] || $_SESSION['tipo_usuario']==3){
					?>
					<div class="actions">
						<a class="AccionnComentario EliminarRespuesta">
							Eliminar Respuesta
						</a>
					</div>
					<?php
				}*/
			} ?>
		</ul>
	</div>
</div>


<form class="container min" onSubmit="Enviar(); return false" id="RespuestaN">
	<h1 class="title">Responder</h1>
	<input type="hidden" id="id_forohilo" name="id_forohilo" value="<?php echo $id_forohilo; ?>">
	<div class="grid columns-1">
		<div class="input-group">
			<div class="placeholder">
				<i class="fas fa-font"></i>
				<label for="contenido">Contenido:</label>
			</div>
			<input type="text" name="contenido" id="contenido">	
		</div>
		<div class="right">
			<button type="submit" class="btn border">
				Continuar
				<i class="fa fa-angle-double-right"></i>
			</button>
		</div>
	</div>
</form>
<div class="container keep">
	<div class="space-between">
		<a href="Control.php?c=Foro&a=AgregarFavs&id=<?php echo $id_forohilo; ?>" id='fav' class="btn border">
			Agregar a Favoritos
			<i class="fas fa-star"></i>
		</a>
		<a href="" id="Accion" class="btn border"></a>
	</div>
</div>
<br>
<script type="text/javascript">
	function Enviar(){
		
			$.ajax({

		    		url:'usuario.php?c=ForoRespuesta&a=Responder',
		    		method:'POST',
		    		data: $("#RespuestaN").serialize(),
		    		 success: function(res){
			    		location.reload();
		    		 }	
		    		});
}
</script>
<?php 
	$fav = $Hil->ConfirmarFavs($_GET['id']);
	if($fav == 1){
		echo "<script>$('#fav').html('Eliminar de favoritos'); $('#fav').attr('href','Control.php?c=Foro&a=EliminarFavs&id=".$id_forohilo."');</script>";
	}
	if($hi->id_usuario == $_SESSION['id_usuario'] || $_SESSION['tipo_usuario'] == 3){

			echo "<script>$('#Accion').html('Eliminar foro'); $('#Accion').attr('href','Control.php?c=Foro&a=EliminarForoUsuario&id_f=".$id_forohilo."');</script>";
	}
?>