<title>Nombre de nuestra pagina</title>	

<div class="full-screen flex no-navbar">

	<form action="usuario.php?c=Usuario&a=IniciarSesion" method="POST" class="default small-form">
		<h1 class="title">Iniciar Sesion</h1>
		<div class="input-group">
			<div class="placeholder">
				<i class="fas fa-at"></i>
				<label for="Correo">Correo electrónico:</label>
			</div>
			<input type="email" name="Correo" id="Correo" onBlur="if(this.value=='')this.value='Correo'" onFocus="if(this.value=='Correo')this.value='' "/>
		</div>
		<div class="input-group margin-top">
			<div class="placeholder">
				<i class="fas fa-key"></i>
				<label for="Password">Contraseña:</label>
			</div>
			<input type="password" name="Password" id="Password" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' ">
		</div>
		<div class="right margin-top">
			<button class="btn border">
				<span>Continuar</span>
				<i class="fa fa-angle-double-right"></i>
			</button>
		</div>
	</form>

</div>
