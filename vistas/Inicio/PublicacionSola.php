
	<link rel="stylesheet" type="text/css" href="./assets/css/Publicacion.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/Pop.css">
<?php
//require ("/xampp\htdocs\Proyecto2.1\controladores\InicioControlador.php");



			$id = $_POST['idp'];
			$ini = new InicioControlador();
			$p = $ini->PublicacionInfo($id);
			
	

		?>



<div class="PopImagen">
     		<h1 ><a href=""  class="usuario"></a><samp id="Close">x</samp></h1>
     		<fieldset>
     			
     			<div class="Imagen">
     					<div class="Contenedor">
		<div class="Box">
		<img src="<?php echo  $p->imagen ?>">
		<input type="hidden" name="" id="idI" value="<?php echo $id;?>">
	</div>
	<div class="Box1">
			<div><textarea readonly="readonly" ><?php echo $p->contenido; ?></textarea></div>
			
			<div class="Comentarios">
				<div>
					<?php
						$Com = new ComentarioControlador();
						$co = $Com->Comentarios($id);
		
						foreach ($co as $c) {
							$us = new UsuarioControlador();
							$u = $us->Usuario($c->id_usuario);
						if($c->ocultar == 1){
							echo "<div class='Comentario'>
									<a href='Control.php?c=Perfiles&a=Perfiles&id=".$c->id_usuario."' id='usuario'>$u->nombre_usuario</a>
									<div class='contenido' id=$c->id_comentario>Este comentario fue borrado</div>
									<div class='fecha'>$c->fecha</div>
								</div>";
						}else{
							$us = new UsuarioControlador();
						$u = $us->Usuario($c->id_usuario);
						if($c->id_usuario == $_SESSION['id_usuario'] || $_SESSION['tipo_usuario']==3){
							$class = "EliminarComentario";
							$x = "Eliminar Comentario";
							$href = "";
		
						}else{
							$class = "";
							$x = "Reportar";
							$href = "href='Control.php?c=Reportes&a=ReportarComentario&id=$c->id_comentario'";
						}
						
							echo "<div class='Comentario'>
							<a href='Control.php?c=Perfiles&a=Perfiles&id=".$c->id_usuario."' id='usuario'>$u->nombre_usuario</a>
							<div class='contenido' id=$c->id_comentario>$c->contenido</div>
							<div class='fecha'>$c->fecha</div>
							<a  ".$href." id='$c->id_comentario' class='AccionComentario ".$class."'>$x</a>
							</div>";
						}
						}
							
					
					?>

				</div>
				
			</div>
			
	</div>
	</div>

					
     			</div>
     		
     		</fieldset>
</div>



