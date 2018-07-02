
<?php  include "Validacion.php"; if(isset($_GET['id'])){ ?>
	<form action="usuario.php?c=Usuario&a=CambiarContrasena" onsubmit="validarCon();" method="POST"  id="formContra">
		<input type="hidden" name="id_usuario" value="<?php echo $_GET['id'] ?>">
		<input type="password" name="Contrasena" id="Contrasena">
		<p id="ContraVal"></p>
		<input type="password" name="Contrasena1" id="Contrasena1">
		<p id="ContraVal1"></p>
		<input type="submit" name="">
	</form>

<script type="text/javascript">
	$("form").submit(function(e){
		validarContrasena();
		if(x == 1){
			alert("Hola");
		}else{
			e.preventDefault();
		}

	});
</script>

<?php }else{
		?>

		<input type="hidden" name="correoV" id="correoV">
	<form  method="POST" id="formdata">
		<input type="email" name="Correo">
		<p id="val"></p>
		<input type="submit" name="">
	</form>
	<h1 id="Confirmacion"></h1>
		

<script type="text/javascript">
	$("form").submit(function(e){

     e.preventDefault();

		 $.ajax({
					 			type:  "POST", //método de envio
				                data: $("#formdata").serialize(), //datos que se envian a traves de ajax
				                url:   "Ajax.php?c=Usuario&a=ValidarCorreo", //archivo que recibe la peticion
				                success: function(res) { //una vez que el archivo recibe el request lo procesa y lo devuelve
				                if(res == 0){

										$('#val').html("");
										 $.ajax({
										 			type:  "POST", //método de envio
									                data: $("#formdata").serialize(), //datos que se envian a traves de ajax
									                url:   "Ajax.php?c=Correo&a=Contra", //archivo que recibe la peticion
									                success: function(res) { //una vez que el archivo recibe el request lo procesa y lo devuelve
									                	$('#val').html("");
														$('#Confirmacion').html("El correo ha sido mandado");
														alert(res);
									                }
									        });
 
				             	 } if (res == 1) {
				              		$('#val').html("Este correo no esta registrado");
									$('#Confirmacion').html("");
				              		
				              		
				                }  
				                }
				        });

 });
	
</script>

<?php
	}?>