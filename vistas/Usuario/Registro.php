<?php 
	$dia = date("d");
	$mes = date("m");
	$ano = date("Y");
	$fecha = "2004-".$mes."-".$dia;
?>
	<title>Registro</title>

	<div class="full-screen flex no-navbar space">

		<form enctype="multipart/form-data"  action="usuario.php?c=Usuario&a=Registro" id="formdata" method="POST" class="default container min scroll-y">
			<h1 class="title">Registrarse</h1>
			<div class="grid columns-2" id="first">
				<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-user"></i>
						<label for="Usuario">Nombre de Usuario:</label>
					</div>
					<input type="text" name="Usuario" id="Usuario">
				</div>
				<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-calendar-alt"></i>
						<label for="Edad">Fecha de Nacimiento:</label>
					</div>
					<input type="date" name="Edad" id="Edad" max="<?php echo $fecha; ?>" value="<?php echo $fecha; ?>">
				</div>

				<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-at"></i>
						<label for="Correo">Correo:</label>
					</div>
					<input type="email" name="Correo" id="Correo">
				</div>
				<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-key"></i>
						<label for="Contrasena">Contraseña:</label>
					</div>
					<input type="password" name="Contrasena" id="Contrasena">
				</div>
				<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-key"></i>
						<label for="CContrasena">Confirmar contraseña:</label>
					</div>
					<input type="password" name="CContrasena" id="CContrasena">
				</div>
				<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-user"></i>
						<label>Tipo de Usuario</label>
					</div>
					<div class="radio-button">
						<input type="radio" name="TipoU" id="tipoU1" value="1" checked>
						<label for="tipoU1">
							<div class="circle"></div>
							Artista
						</label>
					</div>
					<div class="radio-button">
						<input type="radio" name="TipoU" id="tipoU2" value="2" >
						<label for="tipoU2">
							<div class="circle"></div>
							Fan
						</label>
					</div>
				</div>
								<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-globe"></i>
						<label for="Pais">País:</label>
					</div>
					<select name="Pais" id="Pais">
						<?php
						$us = new UsuarioControlador();
						$u = $us->Pais();
							foreach ($u as $p) {
								echo "<option value=".$p->id_pais.">".$p->nombre_pais."</option>";
							}				
						?>
					</select>
				</div>
				<div class="input-group">
							<div class="placeholder">
								<i class="fas fa-globe"></i>
								<label for="Pais">Estado:</label>
							</div>
							<select name="Estado" id="Estado">
								<?php
									$es = $us->Estado();
									foreach ($es as $e) {
										echo "<option value=".$e->id_estado.">".$e->estado."</option>";

									}
        						?>
							</select>
				</div>
				<div class="input-group">
					<div class="checkbox-button">
						<input type="checkbox" name="Terminos" id="Terminos">
						<label for="Terminos">
							<div class="circle"></div>
							Acepto Términos y Condiciones
						</label>
					</div>
				</div>
			</div>
			<div class="grid columns-2" id="second">
				<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-info"></i>
						<label for="InformacionA">Información de Contacto:</label>
					</div>
					<textarea name="InformacionA" id="InformacionA"></textarea>
				</div>
				<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-crosshairs"></i>
						<label for="Tecnica">Técnica de Interés:</label>
					</div>
					<textarea name="Tecnica" id="Tecnica"></textarea>
				</div>
				<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-bookmark"></i>
						<label for="Metas">Metas:</label>
					</div>
					<textarea name="Metas" id="Metas"></textarea>
				</div>
				<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-graduation-cap"></i>
						<label for="Estudios">Estudios:</label>
					</div>
					<textarea name="Estudios" id="Estudios"></textarea>
				</div>
				<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-clock"></i>
						<label for="Exper">Tiempo como Artista:</label>
					</div>
					<textarea name="Exper" id="Exper"></textarea>
				</div>
				<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-plus"></i>
						<label for="Otro">Algo mas para compartir:</label>
					</div>
					<textarea name="Otro" id="Otro"></textarea>
				</div>
				<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-image"></i>
						<label for="imagenA">Foto de perfil:</label>
					</div>
					<input type="file" name="imagenA" id="imagenA">
				</div>
			</div>
			<div class="grid columns-2" id="third">
				<div class="radio">
					<input type="radio" name="Diseno" id="Diseno1" value="1">
					<label for="Diseno1">
						<img src="imagenes/Perfil1.jpg">
						<div class="icon">
							<i class="fas fa-check"></i>
						</div>
					</label>
				</div>
				<div class="radio">
					<input type="radio" name="Diseno" id="Diseno2" value="2">
					<label for="Diseno2">
						<img src="imagenes/Perfil2.jpg">
						<div class="icon">
							<i class="fas fa-check"></i>
						</div>
					</label>
				</div>
				<div class="radio">
					<input type="radio" name="Diseno" id="Diseno3" value="3">
					<label for="Diseno3">
						<img src="imagenes/Perfil3.jpg">
						<div class="icon">
							<i class="fas fa-check"></i>
						</div>
					</label>
				</div>
			</div>
			<div class="grid columns-4 colors" id="final">	
				<div class="color">
					<input type="radio" name="TipoP" value="Y" id="Y">
					<label for="Y">
						Amarillos
						<div class="template" style="background-image: linear-gradient(to right, #7F7606, #7F7606 25%, #E5D53E 25%, #E5D53E 50%, #BFB20A 50%, #BFB20A 75%, #FFED0A 75%, #FFED0A 100%);"></div>
					</label>
				</div>
				<div class="color">
					<input type="radio" name="TipoP" value="C" id="C">
					<label for="C">
						Frio
						<div class="template" style="background-image: linear-gradient(to right, #121F27, #121F27 25%, #E4EEF0 25%, #E4EEF0 50%, #416275 50%, #416275 75%, #BBCFDA 75%, #BBCFDA 100%);"></div>
					</label>
				</div>
				<div class="color">
					<input type="radio" name="TipoP" value="W" id="W">
					<label for="W">
						Calido
						<div class="template" style="background-image: linear-gradient(to right, #AA0000, #AA0000 25%, #F2F2F2 25%, #F2F2F2 50%, #D43600 50%, #D43600 75%, #FFCA00 75%, #FFCA00 100%);"></div>
					</label>
				</div>
				<div class="color">
					<input type="radio" name="TipoP" id="P">
					<label for="P">
						Personalizado
						<div class="template"></div>
					</label>
				</div> 
				<div class="hex">
					<p>Color de la Barra de navegación:</p>
					<label>
						<input class="jscolor" name="navbar" id="navbar"  value="000000">
					</label>
				</div>
				<div class="hex">
					<p>Color de Fondo:</p>
					<label>
						<input class="jscolor color" name="bg" id="bg" value="000000">
					</label>
				</div>
				<div class="hex">
					<p>Color de botones:</p>
					<label>
						<input class="jscolor" name="btn" id="btn" value="000000">
					</label>
				</div>
				<div class="hex">
					<p>Color de Inputs:</p>
					<label>
						<input class="jscolor" name="input" id="input" value="000000">	
					</label>
				</div>
			</div>
			<!-- Botón del Primer Paso -->
			<div class="grid columns-1 pud">
				<div class="right">
					<button class="btn border first">
						<span>Continuar</span>
						<i class="fa fa-angle-double-right"></i>
					</button>
				</div>
			</div>
			<!-- Botón del Segundo Paso -->
			<div class="grid columns-1 pud">
				<div class="space-between">
					<button class="btn border back-first hidden">
						<i class="fa fa-angle-double-left"></i>
						<span>Regresar</span>
					</button>
					<button class="btn border second hidden">
						<span>Continuar</span>
						<i class="fa fa-angle-double-right"></i>
					</button>
				</div>
			</div>
			<!-- Botón del Tercer Paso -->
			<div class="grid columns-1 pud">
				<div class="space-between">
					<button class="btn border back-second hidden">
						<i class="fa fa-angle-double-left"></i>
						<span>Regresar</span>
					</button>
					<button class="btn border third hidden">
						<span>Continuar</span>
						<i class="fa fa-angle-double-right"></i>
					</button>
				</div>
			</div>
			<!-- Botón del Paso Final -->
			<div class="grid columns-1 pud">
				<div class="space-between">
					<button class="btn border back-third hidden">
						<i class="fa fa-angle-double-left"></i>
						<span>Regresar</span>
					</button>
					<button class="btn border final hidden">
						<span>Registrarse</span>
						<i class="fa fa-check"></i>
					</button>
				</div>
			</div>
		</form>
	</div>

	<script src="assets/jscolor/jscolor.js"></script>
	<script src="assets/js/app/app.cookies.js"></script>
	<script src="assets/js/app/app.color.js"></script>

	<script>
		$('.first').click(e => {
			if($('[name=TipoU]:checked').val() === '1') {
				e.preventDefault();
				$('.first').hide();
				$('#first').slideUp(400);
				$('.back-first').fadeIn(600);
				$('.second').fadeIn(600);
				setTimeout(() => {
					$('#second').slideDown(400).css('display', 'grid');
				}, 400);
			}
		})
		$('.second').click(e => {
			e.preventDefault();
			$('.second').hide();
			$('.back-first').hide();
			$('#second').slideUp(400);
			$('.back-second').fadeIn(600);
			$('.third').fadeIn(600);
			setTimeout(() => {
				$('#third').slideDown(400).css('display', 'grid');
			}, 400);
		})
		$('.third').click(e => {
			e.preventDefault();
			$('.third').hide();
			$('.back-second').hide();
			$('#third').slideUp(400);
			$('.back-third').fadeIn(600);
			$('.final').fadeIn(600);
			setTimeout(() => {
				$('#final').slideDown(400).css('display', 'grid');
			}, 400);
		})
		$('.back-first').click(e => {
			e.preventDefault();
			$('.first').show();
			$('#second').slideUp(400);
			$('.back-first').fadeOut(600);
			$('.second').fadeOut(600);
			setTimeout(() => {
				$('#first').slideDown(400).css('display', 'grid');
			}, 400);
		})
		$('.back-second').click(e => {
			e.preventDefault();
			$('.second').show();
			$('#third').slideUp(400);
			$('.third').fadeOut(400);
			$('.back-second').fadeOut(600);
			$('.back-first').fadeIn(600);			
			setTimeout(() => {
				$('#second').slideDown(400).css('display', 'grid');
			}, 400);
		})
		$('.back-third').click(e => {
			e.preventDefault();
			$('.third').show();
			$('.final').fadeOut(400);
			$('#final').slideUp(400);
			$('.back-second').fadeIn(600);
			$('.back-third').fadeOut(600);
			setTimeout(() => {
				$('#third').slideDown(400).css('display', 'grid');
			}, 400);
		})

		$('.final').click(e => {
			updateColors();
		})
		
	</script>
	
<?php include ("Validacion.php"); ?>
<script type="text/javascript">
$(document).ready(function(){
	    	$(".Aceptar").click(function(){
		       		validarCorreo();
					validarContrasena();
					validarUsuario();
					validarTerminos();
					validarEdad();
					z = $("#correoV").val();
					y = $("#usuarioV").val();
					//(v==1) && (w==1) && (x==1) && (y==1) && (z==1)
					if((v==1) && (w==1) && (x==1) && (y==1) && (z==1)){

		    	document.getElementById('Fila').style.visibility="hidden";
						document.getElementById('Fila').style.display="none";
								if($('input:radio[name=TipoU]:checked').val() == '1'){
									document.getElementById('Artista').style.visibility="visible";
									document.getElementById('Artista').style.display="block";
								}
								else{
									document.getElementById('Fan').style.display="block";
									document.getElementById('Fan').style.visibility="visible";
								}
						
					}
		    });
		    $(".Regreso").click(function(){
		    	document.getElementById('Fila').style.visibility="visible";
		    	document.getElementById('Fila').style.display="block";
		    	document.getElementById('Fan').style.display="none";
		    	document.getElementById('Artista').style.display="none";
		    });
			
});
</script>
