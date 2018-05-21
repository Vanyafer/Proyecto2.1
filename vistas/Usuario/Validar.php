<?php
		
		$u = new UsuarioControlador();
		if(isset($_POST['Usuario'])){
			$x = $u->validarUsuario();

		}
		if(isset($_POST['Correo'])){
			$x = $u->validarCorreo();
			
		}
		echo $x;
?>