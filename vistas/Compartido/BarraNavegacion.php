	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./assets/css/BarraNavegacion.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/Popup.css">
    <link rel="stylesheet" href="./assets/css/icomoon/style.css">
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

	<?php
		/* if ($_SESSION['tipo_usuario']==3){
		 		echo '<li><a href="Moderador.php">M</a></li>';
		 }*/
		 $id_usuario = $_SESSION['id_usuario'];
	?>
<nav class=" sidebar">
	<ul>
		<li>
			<a href="Control.php?c=Inicio&a=Inicio" class="btn border" id="inicio">
				<i class="fas fa-home"></i>
			</a>
		</li>
		<li>
			<a href="Control.php?c=Foro&a=Foro" class="btn border">
				<i class="fas fa-bullhorn"></i>
			</a>
		</li>
		<li>
			<a id="reto" href="Control.php?c=Reto&a=Reto" class="btn border">
				<i class="fas fa-pencil-alt"></i>
			</a>
		</li>
		<li>
			<a href="Control.php?c=Notificaciones&a=Notificaciones" class="btn border">
				<i class="fas fa-newspaper"></i>
				<?php $notificaciones = 1; if($notificaciones > 0): ?>
		 		<i class="bubble">1</i>
				<?php endif; ?>
			</a>
		</li>
		<li>
			<a class="btn border open">
				<i class="fas fa-edit"></i>
			</a>
		</li>
		<li>
			<a href="Control.php?c=Mensajes&a=BandejaEntrada" class="btn border">
				<i class="far fa-comments"></i>
				<?php $notificaciones = 1; if($notificaciones > 0): ?>
		 		<i class="bubble">20</i>
				<?php endif; ?>
			</a>
		</li>
		<li>
			<a href="Control.php?c=Perfiles&a=Perfiles&id=<?php echo $id_usuario; ?>" class="btn border moderador">
				<i class="fas fa-user"></i>
			</a>
		</li>
		<li>
			<a href="Control.php?c=Usuario&a=Configuracion" class="btn border moderador">
				<i class="fas fa-cogs"></i>
			</a>
		</li>
		<li>
			<a href="Control.php?c=Usuario&a=Cerrarsesion" class="abajo btn border">
				<i class="fas fa-sign-out-alt"></i>
			</a>
		</li>
	</ul>	
</nav>

<?php require("./vistas/Inicio/Publicar.php"); ?>

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
					url:'Ajax.php?c=Inicio&a=Publicacion',
		    		method:'POST',
		    		data: $("#idp").serialize(),
					success: function(res){
						$(".Imagen").html(res);
						$(".name").html(usuario);
		    		 }	
		    		});
		        $(".overlay2").fadeIn(400);
		    });

		   
		});
		</script>
<div>
	<input type="hidden" id="idp" name="idp">     			
	<div class="Imagen"></div>
</div>