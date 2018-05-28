
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


</div>
</body>
</html>
