	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./assets/css/BarraNavegacion.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/Popup.css">
    <link rel="stylesheet" href="./assets/css/icomoon/style.css">
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

<nav class="barra">
<ul>
	<?php
		/* if ($_SESSION['tipo_usuario']==3){
		 		echo '<li><a href="Moderador.php">M</a></li>';
		 }*/
		 $id_usuario = $_SESSION['id_usuario'];
	?>
	<li><a href="Control.php?c=Inicio&a=Inicio" id="inicio">Inicio</a></li>
	<li><a href="Control.php?c=Foro&a=Foro" class="icon-bullhorn"></a></li>
	<li><a id="reto" href="Control.php?c=Reto&a=Reto" class="icon-pen Artista"></a></li>
	
	<li><a href="" class="icon-newspaper"></a></li>
	<li><a class="icon-quill Abrir Artista moderador"></a></li>
	<li><a href="Control.php?c=Mensajes&a=BandejaEntrada" class="icon-bubbles4"></a></li>
	<li><a href="Control.php?c=UsuarioR&a=UsuarioR">U</a></li>
	<li><a href="Control.php?c=Perfiles&a=Perfiles&id=<?php echo $id_usuario; ?>" class="icon-user moderador"></a></li>
	<li><a href="Control.php?c=Usuario&a=Configuracion" class="icon-cog moderador"></a></li>

	<li><a href="Control.php?c=Usuario&a=Cerrarsesion" class="abajo">C</a></li>
</ul>	
</nav>
<div class="overlay">
	<div class="popup">
		    		<?php 
		    		
		    		require("./vistas/Inicio/Publicar.php"); ?>
	
</div>

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
		    	$(".usuario").html(usuario);

		    	$.ajax({
		    		url:'Ajax.php?c=Inicio&a=Publicacion',
		    		method:'POST',
		    		data: $("#idp").serialize(),
		    		 success: function(res){
		    		 	$(".Imagen").html(res);
		    		 }	
		    		});
		        $(".overlay2").fadeIn(400);
		    });

		   
		});
		</script>
<div class="overlay2">
     			<input type="hidden" id="idp" name="idp">
     		<div class="PopImagen">
     		<h1 ><a href=""  class="usuario"></a><samp id="Close">x</samp></h1>
     		<fieldset>
     			
     			<div class="Imagen">
     			
							
     			</div>
     		
     		</fieldset>
</div>
</div>