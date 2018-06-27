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
								<label for="Contrasena1">Confirmar contraseña:</label>
							</div>
							<input type="password" name="Contrasena1" id="Contrasena1">
						</div>
					</div>
					<div class="grid columns-2">
						<div class="input-group">
							<div class="placeholder">
								<i class="fas fa-globe"></i>
								<label for="Pais">País:</label>
							</div>
							<select name="Pais" id="Pais">
								<?php
										$us = new UsuarioControlador();
										$x = $us->Pais();
          								foreach ($x as $pa) {
	          								echo "<option value=".$pa->id_pais.">".$pa->nombre_pais.	"</option>";
          								}
        						?>
							</select>
						</div>
						<div class="input-group">
							<div class="placeholder">
								<i class="fas fa-calendar-alt"></i>
								<label for="Edad">Fecha de Nacimiento:</label>
							</div>
							<input type="date" name="Edad" id="Edad" max="<?php echo $fecha; ?>" value="<?php echo $u->fn; ?>">
						</div>
						<div class="checkbox">
							<input type="checkbox" name="permitir" id="permitir">
							<label for="permitir">
								<span class="check">
									<i class="fas fa-check"></i>
								</span>
								<span>Permitir contenido explicito</span>
							</label>
							<input type="hidden" name="permitir_18" id="permitir_18">
						</div>
					</div>
				</div>
			</div>
			<div class="container-step">
				<h1>Configuración general</h1>
				<div class="container min">
					<div class="grid columns-2">
						<div class="input-group">
							<div class="placeholder"><i class="fas fa-info"></i><label>Información:</label></div>
							<textarea name="InformacionA" id="InformacionA" cols="30" rows="5"><?php echo $a->informacion_contacto;?></textarea>
						</div>
						<div class="input-group">
							<div class="placeholder"><i class="fas fa-crosshairs"></i><label>Técnica de Interés</label></div>
							<textarea name="Tecnica" id="Tecnica" cols="30" rows="5"><?php echo $a->tecnica_interes;?></textarea>
						</div>
						<div class="input-group">
							<div class="placeholder"><i class="fas fa-bookmark"></i><label>Metas:</label></div>
							<textarea name="Metas" id="Metas" cols="30" rows="5"><?php echo $p->metas;?></textarea>
						</div>
						<div class="input-group">
							<div class="placeholder"><i class="fas fa-graduation-cap"></i><label>Estudios</label></div>
							<textarea name="Estudios" id="Estudios" cols="30" rows="5"><?php echo $p->estudios;?></textarea>
						</div>
						<div class="input-group">
							<div class="placeholder"><i class="fas fa-clock"></i><label>Tiempo como artista:</label></div>
							<textarea name="Exper" id="Exper" cols="30" rows="5"><?php echo $p->exper;?></textarea>
						</div>
						<div class="input-group">
							<div class="placeholder"><i class="fas fa-plus"></i><label>Algo mas para compartir:</label></div>
							<textarea name="Otro" id="Otro" cols="30" rows="5"><?php echo $p->otro;?></textarea>
						</div>
						<div class="input-group">
							<div class="placeholder">
								<i class="fas fa-image"></i>
								<label for="imagenA">Foto de perfil:</label>
							</div>
							<input type="file" name="imagenA" id="imagenA" value="<?php echo $a->imagen;?>">
						</div>
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
				<div class="container min">
					<div class="grid columns-4 colors">	
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
								<input class="jscolor" name="navbar" id="navbar"  value="<?php echo $d->color_titulos; ?>">
							</label>
						</div>
						<div class="hex">
							<p>Color de Fondo:</p>
							<label>
								<input class="jscolor color" name="bg" id="bg" value="<?php echo $d->color_fondo; ?>">
							</label>
						</div>
						<div class="hex">
							<p>Color de botones:</p>
							<label>
								<input class="jscolor" name="btn" id="btn" value="<?php echo $d->color_botones; ?>">
							</label>
						</div>
						<div class="hex">
							<p>Color de Inputs:</p>
							<label>
								<input class="jscolor" name="input" id="input" value="<?php echo $d->color_bordes; ?>">	
							</label>
						</div>
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
					validarUsuario();
					validarEdad();
					y = $("#Usuario").val();
					//(v==1) && (w==1) && (x==1) && (y==1) && (z==1)
					if((v==1) && (y!="") && (x==1)){
						$(".overlay2").fadeIn(400);
	        			$(".popup2").fadeIn(400);
		  			}
		    });

	    $(".Contra").click(function(){

					$.ajax({
		 			type:  "POST", //método de envio
	                data: $("#formdata").serialize(), //datos que se envian a traves de ajax
	                url:   "Ajax.php?c=Usuario&a=ValidarContrasena", //archivo que recibe la peticion
	        	}).done(function(res) { //una vez que el archivo recibe el request lo procesa y lo devuelve
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
	            	}).fail(function (re) {
						console.log(res);
					})
		    });
		$('#Diseno<?php echo $d->tipo_perfil;?>').attr('checked', true);
		if(<?php echo $u->permitir_18 ?> == 1){
			$('#permitir').attr('checked', true);
		}
});
	
</script>

<script src="assets/js/app/app.color.js"></script>