	<script type="text/javascript">
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
function validarEdad(){
					if($("#Edad").val()!=""){
						$("#valEdad").html("");
						v = 1;
					}else{
						$("#valEdad").html("Introduce una fecha");
						v = 0;
					}
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
				function validarTerminos(){
					if($("#Terminos").prop('checked')){
						w = 1;
						$("#valTerminos").html("");
					}else{
						$("#valTerminos").html("Aceptar terminos y condiciones");
						w = 0;
					}
				}

</script>

