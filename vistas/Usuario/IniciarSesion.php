<!DOCTYPE html>
<html>
<head>
	<title>Nombre de nuestra pagina</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/Diseno.css">
	<script type="text/javascript">

	function Inicio(showhide){
	if(showhide == "show"){
    document.getElementById('Sesion').style.visibility="visible";
	}else if(showhide == "hide"){
    document.getElementById('Sesion').style.visibility="hidden"; 
	}
	}
</script>
</head>
<body>
	<nav id="Barra">
		<a href="javascript:Inicio('show');" id="Inicio">Iniciar Sesion</a>
	    <a href="usuario.php?c=Usuario&a=Registro">Registro</a>
	</nav>

	<div id="Sesion">

	        <h1>Iniciar sesion</h1>

	        <fieldset>

	            <form action="usuario.php?c=Usuario&a=IniciarSesion" method="POST">

	                <input type="email" name="Correo" value="Correo" onBlur="if(this.value=='')this.value='Correo'" onFocus="if(this.value=='Correo')this.value='' "> 
	                <!--input type="Text" name="Usuario" value="Usuario" onBlur="if(this.value=='')this.value='Usuario'" onFocus="if(this.value=='Usuario')this.value='' "-->
	                <input type="password" name="Password" value="Password" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' "> 
	                <a href="validarContrasena">No recuerdo mi contrasena</a>
	                <input type="submit" value="Aceptar">
	            </form>
	            	<input type="submit" value="Cerrar" onclick="Inicio('hide');">
	        </fieldset>


	</div>

</body>
</html>
<script type="text/javascript">
	
	
</script>