<?php 
$dia = date("d");
					$mes = date("m");
					$ano = date("Y");
					$fecha = "2004-".$mes."-".$dia;
?>
<html>
<head>
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="assets/css/Diseno.css">
	<script src="assets/jscolor/jscolor.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script type="text/javascript">
				function validarEdad(){
					if($("#Edad").val()!=""){
						$("#valEdad").html("");
						v = 1;
					}else{
						$("#valEdad").html("Introduce una fecha");
						v = 0;
					}
				}
				function validarTerminos(){
					if($("#Terminos").prop('checked')){
						w = 1;
						$("#valTerminos").html("");
					}else{
						$("#valTerminos").html("Aceptar terminos y condiciones");
						w = 0;
					}
				}
				function validarContrasena(){
					var Contrasena = document.getElementById("Contrasena").value;
								var Contrasena1 = document.getElementById("Contrasena1").value;
								if(Contrasena.length < 8 || Contrasena.match(/[A-Z]/) == null || Contrasena.match(/[0-9]/) == null){
									document.getElementById('valContra').innerHTML="*La contraseña debe de tener minimo 8 carateres, un número y una mayúscula";
									x=0
								}else{
									document.getElementById('valContra').innerHTML="";
									if(Contrasena1 != Contrasena){
										document.getElementById('valCon').innerHTML='*Las contraseñas no coinciden';
										x=0;

									}else{
										document.getElementById('valCon').innerHTML="";
										x=1;
									}
								}

				}
				function validarUsuario(){

					$.ajax({
					 			type:  "POST", //método de envio
				                data: $("#formdata").serialize(), //datos que se envian a traves de ajax
				                url:   "Ajax.php?c=Usuario&a=ValidarUsuario", //archivo que recibe la peticion
				                success: function(res) { //una vez que el archivo recibe el request lo procesa y lo devuelve
				        
				                 if(res == 0){ 
				                 	document.getElementById('valUsuario').innerHTML="Este nombre de usuario ya existe";
				                                    $('#usuarioV').val(0);
				                }if(res == 1 ){
				                	document.getElementById('valUsuario').innerHTML="";
				                                    $('#usuarioV').val(1) ;
				                }
				            }
				        });
				}
				function validarCorreo(){
					 $.ajax({
					 			type:  "POST", //método de envio
				                data: $("#formdata").serialize(), //datos que se envian a traves de ajax
				                url:   "Ajax.php?c=Usuario&a=ValidarCorreo", //archivo que recibe la peticion
				                success: function(res) { //una vez que el archivo recibe el request lo procesa y lo devuelve
				             
				                if(res == 0){

				                    document.getElementById('valCorreo').innerHTML="Este correo ya esta registrado";
				                    $("#correoV").val(0);

				              } if (res == 1) {
				              		document.getElementById('valCorreo').innerHTML="";
				              		$("#correoV").val(1);
				              		
				                }  
				                }
				        });
					
				}
				
	</script>
</head>
<body>
<Br>
	<h1 id="titulo">Registrarse<hr style="color: #1c83a8;"></h1>
	<div id="Datos">
	<input type="hidden" id="correoV" >
	<input type="hidden" id="usuarioV">
	 	<form enctype="multipart/form-data"  action="usuario.php?c=Usuario&a=Registro" id="formdata" method="POST">
				<div id="Fila">
					<div id="Columna">
							<p>Nombre de usuario:</p>
							<input type="text" id="Usuario" name="Usuario" value="Usuario" onBlur="if(this.value=='')this.value='Usuario'" onFocus="if(this.value=='Usuario')this.value='' ">
							<p id="valUsuario"></p>
							<br>
							<p>Correo:</p>
			                <input type="email" id="Correo" value="Correo" name="Correo" id="Correo" onBlur="if(this.value=='')this.value='Correo'" onFocus="if(this.value=='Correo')this.value='' ">
			                <p id="valCorreo"></p> 
			                <br>
			                <p>Contrasena:</p>
			                <input type="password" id="Contrasena" name="Contrasena" value="Contrasena" onBlur="if(this.value=='')this.value='Contrasena'" onFocus="if(this.value=='Contrasena')this.value='' ">
			                <p id="valContra"></p>
			                <br>
			                <p>Confirme contrasena:</p>
			                <input type="password" id="Contrasena1" value="Contrasena" onBlur="if(this.value=='')this.value='Contrasena'" onFocus="if(this.value=='Contrasena')this.value='' ">
			                <p id="valCon"></p>
			                <br>

					</div>
					<div id="Columna">
							<p>Pais:</p>
							<select name="Pais">
		       					<?php
								$us = new UsuarioControlador();
								$u = $us->Pais();
          							foreach ($u as $p) {
          								echo "<option value=".$p->id_pais.">".$p->nombre_pais."</option>";
          							}
												
           							
													
          								
        						?>
	
		          							

			
							</select>
							<br>
							<p>Fecha de nacimiento:</p>
							<input type="date" name="Edad" id="Edad" max="<?php echo $fecha; ?>" value="<?php echo $fecha; ?>">
							<p id="valEdad"></p>
							<br>
							<p>Tipo de usuario:</p>
							<p><input type="radio" name="TipoU" value="1" checked=""> Artista </p>
							<p><input type="radio" name="TipoU" value="2"> Fan </p>
							<br>
							<p> <input type="checkbox" name="Terminos" id="Terminos"> Acepto <a href="">Terminos y condiciones </a></p>
							<p id="valTerminos"></p>
					<br>
					<!--input type="submit" value="siguiente"-->
					<div class="Subir"><a class="Aceptar">Siguiente</a></div>
					</div>
					
					                
		
			
				</div>

				<div id="Artista">
					<div id="Fila">
						<div id="Columna">
						<p>
								Informacion de contacto:<br>
								<textarea name="InformacionA"></textarea>
							</p>
							<p>
								Tecnica de interes:<br>
								<textarea name="Tecnica" ></textarea>
							</p>
							<p>
								Metas:<br>
								<textarea name="Metas"></textarea>
							</p>
							<p>
								Estudios:<br>
								<textarea name="Estudios"></textarea>
							</p>
								<p>Tiempo como Artista:<br>
								<textarea name="Exper"></textarea>
							</p>
							<p>
								Algo mas para compartir:<br>
								<textarea name="Otro"></textarea>
							</p>
								<p>Foto de perfil:</p>
								<input type="file" name="imagenA">
						</div>
						<div id="Columna">
							<h3>Escoge un diseño</h3>
							<img src="imagenes/Perfil1.jpg"><input type="radio" name="Diseno" checked="" value="1">
							<img src="imagenes/Perfil2.jpg"><input type="radio" name="Diseno" value="2">
							<img src="imagenes/Perfil3.jpg"><input type="radio" name="Diseno" value="3">
							<h3>Paleta de colores:</h3>
							<p><input type="radio" name="TipoP"> Blanco/Negro <br>
							<input type="radio" name="TipoP"> Frio <br>
							<input type="radio" name="TipoP"> Calido <br>
							<input type="radio" name="TipoP"> Personalizado </p>
							<div id="Fila">
								<div id="Columna2">
									<p>Color de Bordes:</p>
									 <input class="jscolor" value="1c83a8" name="Bordes">
									<p>Color Texto:</p>
									 <input class="jscolor" value="1c83a8" name="Texto">
								</div>
								<div id="Columna2">
									<p>Color de Fondo:</p>
									<input class="jscolor" value="1c83a8" name="Fondo">
									<p>Color de botones:</p>
									<input class="jscolor" value="1c83a8" name="Botones">
								</div>
							</div>
						</div>
					
					
					</div>
					<div class="Subir Regreso"><a">Regresar</a></div>
					<input type="submit" value="Aceptar">
				</div>
				<div id="Fan">
						<p>Informacion de contacto</p>
						<textarea name="DatosFan">
							
						</textarea>
						<p>Perfil:</p>
						<textarea name="PerfilFan">
							
						</textarea>
						<p>Foto de perfil:</p>
						<input type="file" name="imagenF">
						<br>
						<div class="Subir Regreso"><a>Regresar</a></div>
						<!-input type="submit" value="Aceptar" class="subir"-->
						<div class="Subir"><a class="Aceptar">Siguiente</a></div>
						<br>
			</div>
		</form>	
	</div>		
		

</body>
</html>
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
