<?php 
	$dia = date("d");
	$mes = date("m");
	$ano = date("Y");
	$fecha = "2004-".$mes."-".$dia;
?>

	<title>Configuraciones</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/Configuracion.css">
	<script src="./assets/jscolor/jscolor.js"></script>
	<script src="./assets/js/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">

<script type="text/javascript">
	$(document).ready(function(){
	    $(".Close").click(function(){
	        $(".overlay2").fadeOut(400);
	         $(".popup2").fadeOut(400);
	    });
	    
});
</script>


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
<div class="Configuracion">
	<input type="hidden" id="usuarioV">
<form  id="formdata" >
	<div class="General">
							<h1>Configuraciones</h1>
							<p>Nombre de usuario:</p>
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
			                <br>
			               
	</div>
	<div class="Artista" id="Artista">
		
							<h1>Editar Perfil</h1>
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
							<!--div class="Columna">
								<p>Foto de fondo:</p>
								<input type="file" name="perfil">
							</div-->
							<h3>Escoge un diseño</h3>
							<img src="imagenes/Perfil1.jpg"><input type="radio" name="Diseno" id="Diseno1" value="1">
							<img src="imagenes/Perfil2.jpg"><input type="radio" name="Diseno" id="Diseno2" value="2">
							<img src="imagenes/Perfil3.jpg"><input type="radio" name="Diseno" id="Diseno3" value="3">	
							<h3>Paleta de colores:</h3>
							<div><input type="radio" name="TipoP" value="BN" > Blanco/Negro <br>
							<input type="radio" name="TipoP" value="Frio"> Frio <br>
							<input type="radio" name="TipoP" value="Calido"> Calido <br>
							<input type="radio" name="TipoP" checked> Personalizado </div>	
							<div class="Columna">
									<p>Color de Bordes:</p>
									 <input class="jscolor" name="Bordes" id="Bordes"  value="<?php echo $d->color_bordes; ?>">
									<p>Color Texto:</p>
									 <input class="jscolor" name="Texto" id="Texto" value="<?php echo $d->color_titulos; ?>">
								</div>
								<div class="Columna">
									<p>Color de Fondo:</p>
									<input class="jscolor color" name="Fondo" id="Fondo" value="<?php echo $d->color_fondo; ?>">
									<p>Color de botones:</p>
									<input class="jscolor" name="Botones" id="Botones" value="<?php echo $d->color_botones; ?>">

								</div>	
						<a class="boton Aceptar">Aceptar</a>
	</div>
	<div class="Fan" id="Fan">
						<p>Informacion de contacto</p>
						<textarea name="DatosFan"><?php echo $f->informacion_contacto; ?>
						</textarea>
						<p>Perfil:</p>
						<textarea name="PerfilFan"><?php echo $f->perfil; ?></textarea>
						<p>Foto de perfil:</p>
						<input type="file" name="imagenF">
						<br>
						
						<a class="boton Aceptar">Aceptar</a>
						
	</div>

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
			if($_SESSION['tipo_usuario']==1){
				echo "<script Language='JavaScript'>
				document.getElementById('Artista').style.display='block';
				document.getElementById('Fan').style.display = 'none';
				</script>";

			}
			if($_SESSION['tipo_usuario']==2){
				echo "<script Language='JavaScript'>
				document.getElementById('Artista').style.display = 'none';
				document.getElementById('Fan').style.display = 'block';
				</script>";
			}
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
					        		location.reload();
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
