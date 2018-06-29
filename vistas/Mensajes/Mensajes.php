<?php $id_usuario = $_GET["id"]; ?>
<title>Mensajes</title>
<div class="messages-container">
	<div class="contacts">
		<div class="contact header">
			Bandeja de entrada
		</div>
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
			} ?>
			
			<div class="contact" id="<?php echo $u->id_usuario;?>">		
				<a href="Control.php?c=Mensajes&a=Mensajes&id=<?php echo $u->id_usuario;?>"><?php echo $u->nombre_usuario;?></a>
			</div>
		<?php }	?>
	</div>
	<div class="messages">
		<?php $us = new UsuarioControlador(); $u = $us->Usuario($id_usuario);?>
		<div class="contact"><?php echo $u->nombre_usuario;?></div>
		<div class="content">
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
		<div  class="new">
			<form onSubmit="Enviar(); return false" id="Mensaje">
				<input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_GET["id"]; ?>">
				<div class="input-group">
					<input name="Texto" id="Texto" autocomplete="off"/>
					<button type="submit">
						<i class="fas fa-location-arrow"></i>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

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
		    		 	$(".content").html(res);
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
		    		 	$(".content").html(res);
		    		 }	
		    		});

}, 500);
</script>