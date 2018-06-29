
<link rel="stylesheet" type="text/css" href="./assets/css/Popup.css">
<script type="text/javascript">
	$(document).ready(function(){
		$(window).click(e => {
			if(e.target == $('.modal')[0]) {
				$('.modal').fadeOut(400);
			}
		})
	    $(".Abrir").click(() => {
	        $(".modal").fadeIn(400).css('display','flex');
	    });
	});
</script>

<nav class="default">
	<ul>
		<li>
			<a class="Abrir btn border">
				<span>Iniciar Sesión</span>
				<i class="fa fa-sign-in-alt"></i>
			</a>
		</li>
		<li>
			<a href="usuario.php?c=Usuario&a=Registro" class="btn border">
				<span>Registrarse</span>
				<i class="fa fa-user-plus"></i>
			</a>
		</li>
	</ul>
</nav>

<div class="modal">

	<div class="body login">
		<div class="img">
			<img src="./Imagenes/reto.png" alt="">
		</div>
		<form action="usuario.php?c=Usuario&a=IniciarSesion" method="POST" class="default">
			<h1 class="title">Iniciar Sesion</h1>
			<div class="input-group">
				<div class="placeholder">
					<i class="fas fa-at"></i>
					<label for="Correo">Correo electrónico:</label>
				</div>
				<input type="email" name="Correo" id="Correo" onBlur="if(this.value=='')this.value=''" onFocus="if(this.value=='Correo')this.value='' "/>
			</div>
			<div class="input-group margin-top">
				<div class="placeholder">
					<i class="fas fa-key"></i>
					<label for="Password">Contraseña:</label>
				</div>
				<input type="password" name="Password" id="Password" onBlur="if(this.value=='')this.value=''" onFocus="if(this.value=='Password')this.value='' ">
			</div>
			<div class="right margin-top">
				<button class="btn border">
					<span>Continuar</span>
					<i class="fa fa-angle-double-right"></i>
				</button>
			</div>
		</form>
	</div>

</div>

</div>
