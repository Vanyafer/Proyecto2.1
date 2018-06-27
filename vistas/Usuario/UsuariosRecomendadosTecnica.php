<div><?php 
	$usuario = new UsuarioControlador();
								$us = $usuario->UsuariosRecomendadosTecnica();
								//var_dump($us);
								foreach ($us as $b) {
									echo "<p><a href='Control.php?c=Perfiles&a=Perfiles&id=".$b->id_usuario."' id='usuario'>$b->nombre_usuario</a></p>";
								}

					$edad = $usuario->MayorEdad($_SESSION['id_usuario']);
					var_dump($edad);		
?></div>