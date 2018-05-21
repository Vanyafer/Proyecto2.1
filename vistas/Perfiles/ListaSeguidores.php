
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
			echo "<a href='Control.php?c=Perfiles&a=Perfiles&id=$s->id_usuario1;'>$u->nombre_usuario</a> <br>";
		}
					
				
			
	?>
	</div>

	
	<input type="submit" value="Cerrar" class="Close" id="CloseSeguidores">
	</fieldset>
</div>