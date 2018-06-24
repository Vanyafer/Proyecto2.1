	
<head>
	<title>Inicio</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/InicioUsuario.css"/>
	<script src="./assets/js/modernizr.custom.js"></script>
	<script src="./assets/js/imagesloaded.js"></script>
	<script src="./assets/js/classie.js"></script>
	<script src="./assets/js/AnimOnScroll.js"></script>
	<script type="text/javascript">


		$(document).ready(function(){
			
	    	$("#Close").click(function(){
		       	$(".overlay2").fadeOut(400);
		    });
		    $(".Abrir2").click(function(){
		    	id=$(this).attr("id");

		    	$("#idp").val(id);

		    	usuario = $(this).attr("idu");
		    	direccion = "Usuario.php?c=Perfiles&a=Perfiles&id="+usuario;
		    	$(".usuario").attr("href",direccion);
		    	
		    	usuario = $(this).attr("name");
		    	$(".usuario").html(usuario);

		    	$.ajax({
		    		url:'Ajax.php?c=Inicio&a=PublicacionSola',
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

</head>
<div class="masonry-layout" id="gallery">
	<?php

		$ini = new InicioControlador();
		$publicacion = $ini->InicioUsuario();
		foreach ($publicacion as $publi){

			$art = new ArtistaControlador();
			$a = $art->Artista($publi->id_artista);
			$us = new UsuarioControlador();
			$u = $us->Usuario($a->id_usuario);
			if(isset($publi->imagen)){ ?>

				<li class="gallery-item">
					<a>
						<img src="<?php echo $publi->imagen;?>" class="Abrir2" name="<?php echo $u->nombre_usuario;?>" id="<?php $publi->id_publicacion;?>" idu="<?php echo $a->id_usuario;?>">
					</a>
				</li>		

			<?php } else { ?>

				<li class="Abrir2" name="<?php echo $u->nombre_usuario;?>" id="<?php $publi->id_publicacion;?>" idu="<?php echo $a->id_usuario;?>">
					<a>
						<textarea><?php $publi->contenido;?></textarea>
					</a>
				</li>

			<?php }	
		}
	?>

</div>

<div class="overlay2">
<input type="hidden" id="idp" name="idp">
<div class="PopImagen">
<h1 ><a href=""  class="usuario"></a><samp id="Close">x</samp></h1>
<fieldset>

<div class="Imagen">


</div>

</fieldset>
</div>
<script src="assets/js/app/masonry.js"></script>