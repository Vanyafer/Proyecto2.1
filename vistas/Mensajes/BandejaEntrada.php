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
		<div class="contact"></div>
	</div>
</div>
