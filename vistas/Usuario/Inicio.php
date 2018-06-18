	
<html>
<head>
	<title>Inicio</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/InicioUsuario.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/Publicacion.css">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="./assets/js/jquery.min.js"></script>
	<script src="./assets/js/modernizr.custom.js"></script>
	<script src="./assets/js/masonry.pkgd.min.js"></script>
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
<body>		
<div class="grid effect-3" id="grid">
		<?php
								$ini = new InicioControlador();
								$publicacion = $ini->InicioUsuario();
								foreach ($publicacion as $publi){
											$art = new ArtistaControlador();
											$a = $art->Artista($publi->id_artista);
											$us = new UsuarioControlador();
											$u = $us->Usuario($a->id_usuario);
											if(isset($publi->imagen)){
           									echo "<li><a ><img src='$publi->imagen' id='$publi->id_publicacion' class='Abrir2' idu='$a->id_usuario' name='$u->nombre_usuario'></a></li>";
											}else{
												echo "<li class='Abrir2 texto' name='$u->nombre_usuario' id='$publi->id_publicacion' idu='a->id_usuario'><a ><textbox  >$publi->contenido </textbox></a></li>";
											}	
											
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
</div>
</body>
</html>
<script>
			new AnimOnScroll( document.getElementById( 'grid' ), {
				minDuration : 0.4,
				maxDuration : 0.7,
				viewportFactor : 0.2
			} );
		</script>
