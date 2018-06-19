
	<link rel="stylesheet" type="text/css" href="./assets/css/Diseno.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/Popup.css">
	<script src="./assets/js/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	    $(".Close").click(function(){
	        $(".overlay").fadeOut(400);
	         $(".popup").fadeOut(400);
	    });
	    $(".Abrir").click(function(){
	        $(".overlay").fadeIn(400);
	        $(".popup").fadeIn(400);
	    });
});
</script>

	<nav id="Barra">
		<a class="Abrir">Iniciar Sesion</a>
	    <a href="usuario.php?c=Usuario&a=Registro">Registro</a>
	</nav>

<div class="overlay">
	<div class="popup">
	<div id="Sesion">

	        <h1>Iniciar sesion</h1>

	        <fieldset>

	            <form action="usuario.php?c=Usuario&a=IniciarSesion" method="POST">

	                <input type="email" name="Correo" value="Correo" onBlur="if(this.value=='')this.value='Correo'" onFocus="if(this.value=='Correo')this.value='' "> 
	                <!--input type="Text" name="Usuario" value="Usuario" onBlur="if(this.value=='')this.value='Usuario'" onFocus="if(this.value=='Usuario')this.value='' "-->
	                <input type="password" name="Password" value="Password" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' "><br>
	                <a href="validarContrasena">No recuerdo mi contrasena</a><br>
	                <input type="submit" value="Aceptar">
	            </form>
	            	<input type="submit" value="Cerrar" class="Close">
	        </fieldset>


	</div>
	
</div>

</div>
