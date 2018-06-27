
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
			<img src="assets/imgs/reto.png" alt="">
		</div>
		<form action="usuario.php?c=Usuario&a=IniciarSesion" method="POST" >
			<h1 class="title">Iniciar Sesion</h1>
			<div class="input-group">
				<label for="Correo">Correo electrónico:</label>
				<div class="input-field">
					<p><i class="fas fa-at"></i></p>
					<input type="email" name="Correo" id="Correo" onBlur="if(this.value=='')this.value='Correo'" onFocus="if(this.value=='Correo')this.value='' ">
				</div>
			</div>
			<div class="input-group margin-top">
				<label for="Password">Contraseña:</label>
				<div class="input-field">
					<p><i class="fas fa-key"></i></p>
					<input type="password" name="Password" id="Password" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' ">
				</div>
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
