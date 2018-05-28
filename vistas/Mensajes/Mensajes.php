<?php $id_usuario = $_GET["id"]; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Mensajes</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/Mensajes.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="todo">
<div class="Conversaciones">
<input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
	<p>Mensajes</p>
	<div class="Todos">

		<?php
				$Con = new ConversacionControlador();
						$co = $Con->Conversaciones();
		
						foreach ($co as $c) {
							
						$us = new UsuarioControlador();
								if($c->id_usuario1 == $_SESSION['id_usuario']){
									$u = $us->Usuario($c->id_usuario2);
								}
								if($c->id_usuario2 == $_SESSION['id_usuario']){
									$u = $us->Usuario($c->id_usuario1);
								}
							
							echo "<div class='Usuarios' id='$u->id_usuario'><a href='Control.php?c=Mensajes&a=Mensajes&id=$u->id_usuario'>$u->nombre_usuario</a> </div>";
						}	
		?>
	</div>
</div>
<div class="Conversacion">
<?php $us = new UsuarioControlador(); $u = $us->Usuario($id_usuario); echo "<p>$u->nombre_usuario</p>" ?>

	<div class="Mensajes">
		<?php
						$Men = new MensajesControlador();
						$me = $Men->Conversacion($id_usuario);
		
						foreach ($me as $m) {
							
						$us = new UsuarioControlador();
						$u = $us->Usuario($m->id_usuario);
						
							echo "<div class='Mensaje'><a href='Control.php?c=Perfiles&a=Perfiles&id=".$m->id_usuario."'>$u->nombre_usuario</a><div class='contenido'> $m->texto</div><div class='fecha'>$m->fecha</div></div>";
						}	
					
					?>
	</div>
	
	<div  class="MensajeNuevo">
		<form onSubmit="Enviar(); return false" id="Mensaje">
							<input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_GET["id"]; ?>">
							<input type="text" name="Texto" id="Texto">
							<input type="submit" name="" value=">" >
		</form>
	</div>

	
</div>
</div>
</body>
</html>
<script type="text/javascript">
	
	function Enviar(){
		
			$.ajax({

		    		url:'Ajax.php?c=Mensajes&a=Mandar',
		    		method:'POST',
		    		data: $("#Mensaje").serialize(),
		    		 success: function(res){
		    		 	$.ajax({

		    		url:'Ajax.php?c=Mensajes&a=MensajesNuevos',
		    		method:'POST',
		    		data: $("#id_usuario").serialize(),
		    		 success: function(res){
		    		 	$(".Mensajes").html(res);
		    		 }	
		    		});
			    		$("#Texto").val("");
		    		 }	
		    		});
}
setInterval(function(){

$.ajax({

		    		url:'Ajax.php?c=Mensajes&a=MensajesNuevos',
		    		method:'POST',
		    		data: $("#id_usuario").serialize(),
		    		 success: function(res){
		    		 	$(".Mensajes").html(res);
		    		 }	
		    		});

}, 500);
</script>