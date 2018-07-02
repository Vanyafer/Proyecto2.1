
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
			<img src="./Imagenes/hexagono.png" alt="">
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
			<a href="usuario.php?c=Usuario&a=CambiarContrasena">Recuperar contraseña</a>
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
<div class="Overlay2">
	<input type="hidden" id="idp" name="idp">     			
	<div class="Imagen"></div>
</div>

<script type="text/javascript">

bandera = 0;
	$(document).ready(function(){
		
		$("#Close").click(function(){
			   $(".overlay2").fadeOut(400);
		});
		$(".Abrir2").click(function(){
			id=$(this).attr("id");

			$("#idp").val(id);

			usuario = $(this).attr("idu");
			direccion = "Control.php?c=Perfiles&a=Perfiles&id="+usuario;
			$(".usuario").attr("href",direccion);
			
			usuario = $(this).attr("name");
			
			$.ajax({
				url:'Ajax.php?c=Inicio&a=PublicacionSola',
				method:'POST',
				data: $("#idp").serialize(),
				success: function(res){
					console.log($('#idp').val());
					$(".Imagen").html(res);
					$(".name").html(usuario);
				 }	
				});
			$(".overlay2").fadeIn(400);
		});

	   
	});
	</script>
