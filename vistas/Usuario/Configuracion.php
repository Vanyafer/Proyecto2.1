<title>Configuraciones</title>

<script src="./assets/jscolor/jscolor.js"></script>

<?php 

	$id_usuario = $_SESSION['id_usuario'];
	$us = new UsuarioControlador();
	$u = $us->Usuario($id_usuario);

	if($_SESSION['tipo_usuario']==1){	
		
		$id_artista = $_SESSION['id_artista'];
		$ar = new ArtistaControlador();
		$a = $ar->Artista($id_artista);

		$di = new DisenoControlador();
		$d = $di->Diseno($a->id_diseno);

		$pe = new PerfilControlador();
		$p = $pe->Perfil($a->id_perfil);

	}if($_SESSION['tipo_usuario']==2){	
		$Fan = new FanControlador();
		$f = $Fan->Fan($id_usuario);

	}

?>

<div class="configuration">
	<form id="formdata">
		<div class="steps-bar">
			<div class="left-btn btn-custom">
				<i class="fas fa-angle-left"></i>
			</div>
			<div class="steps">
				<div class="step active"></div>
				<div class="step"></div>
				<div class="step"></div>
				<div class="step"></div>
			</div>
			<div class="right-btn btn-custom">
				<i class="fas fa-angle-right"></i>
			</div>
		</div>
		<div class="container-steps">
			<div class="container-step">
				<h1>Configuración de la cuenta</h1>
				<div class="container min">
					<div class="grid columns-2">
						<div class="input-group">
							<div class="placeholder active">
								<i class="fas fa-user"></i>
								<label for="Usuario">Nombre de Usuario:</label>
							</div>
							<input type="text" name="Usuario" id="Usuario" value="<?php echo $u->nombre_usuario;?>">
						</div>
						<div class="input-group">
							<div class="placeholder">
								<i class="fas fa-lock"></i>
								<label for="Contrasena">Contraseña:</label>
							</div>
							<input type="password" name="Contrasena" id="Contrasena">
						</div>
						<div class="input-group">
							<div class="placeholder">
								<i class="fas fa-lock"></i>
								<label for="Contrasena1">Comfirmar contraseña:</label>
							</div>
							<input type="password" name="Contrasena1" id="Contrasena1">
						</div>

					</div>
								<input type="text" name="Usuario" id="Usuario" value="<?php echo $u->nombre_usuario; ?>"></p>
								<p id="valUsuario"></p>
								<br>
							<div class="Columna">
								
			                	<br>
			                	<p>Contrasena:</p>
			                	<input type="password" id="Contrasena" name="Contrasena" >
			                	<p id="valContra"></p>
			                	<br>
			                	<p>Confirme contrasena:</p>
				                <input type="password" id="Contrasena1"  >
				                <p id="valCon"></p>
							</div>
							<div class="Columna">
								<p>Pais:</p>
								<select name="Pais">
									<?php
										$us = new UsuarioControlador();
										$x = $us->Pais();
          							foreach ($x as $pa) {
          								echo "<option value=".$pa->id_pais.">".$pa->nombre_pais."</option>";
          							}
        						?>
	
			       				</select>
								<br>
								<p>Fecha de nacimiento:</p>
								<input type="date" name="Edad" id="Edad" max="<?php echo $fecha; ?>" value="<?php echo $u->fn; ?>">
								<p id="valEdad"></p>
								<br>

						<input type="checkbox" name="permitir" id="permitir" > Permitir contenido explicito	
						<input type="hidden" name="permitir_18" id="permitir_18">
							</div>
				</div>
			</div>
			<div class="container-step">
				<h1>Configuración general</h1>
					<div class="container">
							<div>
								Informacion:<br>
								<textarea name="InformacionA"><?php echo $a->informacion_contacto ?></textarea>
							</div>
							<div>
								Tecnica de interes:<br>
								<textarea name="Tecnica"><?php echo $a->tecnica_interes ?></textarea>
							</div>
							<div>
								Metas:<br>
								<textarea name="Metas"><?php echo $p->metas; ?></textarea>
							</div>
							<div>
								Estudios:<br>
								<textarea name="Estudios"><?php echo $p->estudios; ?></textarea>
							</div>
							<div>
								Tiempo como Artista:<br>
								<textarea name="Exper"><?php echo $p->exper; ?></textarea>
							</div>
							<div>
								Algo mas para compartir:<br>
								<textarea name="Otro"><?php echo $p->otro; ?></textarea>
							</div>
							<div class="Columna">
								<p>Foto de perfil:</p>
								<input type="file" name="imagenA" value="<?php echo $a->imagen;?>">
							</div>
					</div>
			</div>
			<div class="container-step">
				<h1>Diseño de la página</h1>
				
				<div class="container min">
					<div class="grid columns-2">
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
				</div>
			</div>
			<div class="container-step">
				<h1>Paleta de colores</h1>
				<div class="container">
				<div class="grid columns-4">		
					<input type="radio" name="TipoP" value="Y" > Amarillos 
					<input type="radio" name="TipoP" value="C"> Frio 
					<input type="radio" name="TipoP" value="W"> Calido
					<input type="radio" name="TipoP"> Personalizado 
						<p>Color de la Barra de navegación:</p>
							<input class="jscolor" name="navbar" id="navbar"  value="<?php echo $d->color_bordes; ?>">
						<p>Color de Fondo:</p>
						<input class="jscolor color" name="bg" id="bg" value="<?php echo $d->color_fondo; ?>">
						<p>Color de botones:</p>
						<input class="jscolor" name="btn" id="btn" value="<?php echo $d->color_botones; ?>">
						<p>Color de Inputs:</p>
							<input class="jscolor" name="input" id="input" value="<?php echo $d->color_titulos; ?>">					
							</div>	
				</div>
			</div>
		</div>
		<div class="save">
			<a class="btn Aceptar">
				Guardar cambios
				<i class="fas fa-save"></i>
			</a>
		</div>
	</form>
</div>

<script>

	let left = 100;
	let pos = 0;
	let container = $('.container-steps');
	
	$('.left-btn').click(e => {
		if($('.step.active').index() > 0) {
			let current = $('.step.active')
			let idx = current.index() - 1
			pos = idx * left;
			container.css('left',`-${pos}%`)
			$('.step').eq(idx).addClass('active')
			current.removeClass('active')
		}
	});

	$('.right-btn').click(e => {
		let current = $('.step.active')
		let idx = current.index() + 1
		if(idx < $('.step').length) {
			pos = idx * left;
			container.css('left',`-${pos}%`)
			$('.step').eq(idx).addClass('active')
			current.removeClass('active')
		}
	});
</script>

<div class="overlay2">
		<div class="popup2">
				<div class="Pop">
					<h1>Confirmar contraseña actual</h1>
					<fieldset>
							<input type="password" name="ContraA" >
							<p id="ContraA"></p>
							<a class ="boton Contra"> Aceptar </a>
						<n>
						<a class="boton Close">Cerrar</a>
					</fieldset>
				</div>
		
		</div>
	</div>
	</form>

</div>	
	<?php
	include ("Validacion.php");
			
	?>
<script type="text/javascript">
	$(document).ready(function(){
			
	    $(".Aceptar").click(function(){
					if($('#Contrasena').val() != ''){
						validarContrasena();
					}else{
						x=1;
					}
					if($('#permitir').prop('checked')){
							$('#permitir_18').val('1');
						}else{
							$('#permitir_18').val('0');
						}
						alert($('#permitir_18').val());
					validarUsuario();
					validarEdad();
					y = $("#usuarioV").val();
					//(v==1) && (w==1) && (x==1) && (y==1) && (z==1)
					if((v==1) && (y==1) && (x==1)){
						
						$(".overlay2").fadeIn(400);
	        			$(".popup2").fadeIn(400);
		  			}
		    });

	    $(".Contra").click(function(){

					$.ajax({
		 			type:  "POST", //método de envio
	                data: $("#formdata").serialize(), //datos que se envian a traves de ajax
	                url:   "Ajax.php?c=Usuario&a=ValidarContrasena", //archivo que recibe la peticion
	                success: function(res) { //una vez que el archivo recibe el request lo procesa y lo devuelve
	                 	if(res == 1){ 
	                 	document.getElementById('ContraA').innerHTML="La contrasena es incorrecta";
	                 	}
	                 	if( res== 0){
	                 		$.ajax({
				 					type:  "POST", //método de envio
					                data: $("#formdata").serialize(), //datos que se envian a traves de ajax
					                url:   "Ajax.php?c=Usuario&a=Configuracion", //archivo que recibe la peticion
					                success: function(res) { //una vez que el archivo recibe el request lo procesa y lo devuelve
					        		//location.reload();
					            	}
			        		});
	                 	}
	            	}
	        	});
		    });
		$('#Diseno<?php echo $d->tipo_perfil;?>').attr('checked', true);
		if(<?php echo $u->permitir_18 ?> == 1){
			$('#permitir').attr('checked', true);
		}
});
	
</script>

<script src="assets/js/app/app.color.js"></script>