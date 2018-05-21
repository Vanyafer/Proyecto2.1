
<?php
//require ("/xampp\htdocs\Proyecto2.1\controladores\InicioControlador.php");
if($_SERVER['REQUEST_METHOD']=='POST'){
	$GLOBALS['id_p'] = $_POST['idp'];

}

			$id = $GLOBALS['id_p'];
			$ini = new InicioControlador();
			$p = $ini->Publicacion($id);

	

		?>

	<div class="Contenedor">
		<div class="Box">
		<img src="<?php echo  $p->imagen ?>">
		<input type="hidden" name="" id="idI" value="<?php echo $id;?>">
	</div>
	<div class="Box1">
			<div><textarea readonly="readonly" ><?php echo $p->contenido; ?></textarea></div>
			<div>
					<a class="Like" id="1">like</a> 
					<a class="Like" id="0">Dislike</a>
			</div>
			<div class="Comentarios">
				<div>
					<?php
						$Com = new ComentarioControlador();
						$co = $Com->Comentarios($id);
		
						foreach ($co as $c) {
							
						$us = new UsuarioControlador();
						$u = $us->Usuario($c->id_usuario);

							echo "<div class='Comentario'><a>$u->nombre_usuario</a><div class='contenido' id=$c->id_comentario>$c->contenido</div><div class='fecha'>$c->fecha</div><a href='Control.php?c=Reportar&a=Comentario' id='$c->id_comentario' class='AccionComentario'>Reportar</a></div>";
							if($c->id_usuario == $_SESSION['id_usuario']){
		echo "<script>

		$('.AccionComentario').removeAttr('href');
		$('.AccionComentario').addClass('EliminarComentario');
		$('.AccionComentario').html('Eliminar comentario');
			</script>";
	}
						}
					
					?>

				</div>
				
			</div>
	<div  class="ComentarioNuevo">
				<form onSubmit="Enviar(); return false" id="ComentarioN">

	<input type="hidden" name="id_c" id="id_c">
					<input type="hidden" name="tipoLike" id="tipoLike">
					<input type="hidden" id="publicacionC" name="publicacionC" value="<?php echo $id; ?>">
					<input type="text" name="Comentario" id="Comentario">
					<input type="submit" name="" value=">" >
			</form>
			</div>

	<div>
		<?php  
			echo '<a href="reportarpublicacion.php?id='.$id.'" id="Accion">Reportar publicación</p>';
		?>
		
	</div>
			
			
	</div>
	</div>



<script type="text/javascript">
	function Enviar(){
		
			$.ajax({

		    		url:'usuario.php?c=Comentario&a=Comentar',
		    		method:'POST',
		    		data: $("#ComentarioN").serialize(),
		    		 success: function(res){
			    		 $.ajax({
				    		url:'usuario.php?c=Inicio&a=Publicacion',
				    		method:'POST',
				    		data: $("#idp").serialize(),
				    		 success: function(res){
				    		 	$(".Imagen").html(res);
				    		 }	
			    		});
		    		 	$("#Comentario").val("");
		    		 }	
		    		});
}
	$(document).ready(function(){
		$(".Like").click(function(){
		     	id=$(this).attr("id");
		     	$('#tipoLike').val(id);
		    	$.ajax({

		    		url:'usuario.php?c=MeGusta&a=MeGusta',
		    		method:'POST',
		    		data: $('#ComentarioN').serialize(),
		    		 success: function(res){

		    		 }	
		    		});
		    	
		    		if(document.getElementById(id).style.color == 'blue'){

		    			document.getElementById(id).style.color = 'black';
		    		}else{
		    			document.getElementById(id).style.color = 'blue';
		    		}
		    		if(id == 0 && document.getElementById(1).style.color == 'blue'){
		    				document.getElementById(1).style.color = 'black';
		    		}
							
		    		if(id == 1 && document.getElementById(0).style.color == 'blue'){
		    				document.getElementById(0).style.color = 'black';
		    		}
		    	
		    });
		$(".EliminarComentario").click(function(){
				id=$(this).attr("id");
		    	$("#id_c").val(id);
				$.ajax({

		    		url:'usuario.php?c=Comentario&a=EliminarComentario',
		    		method:'POST',
		    		data: $("#ComentarioN").serialize(),
		    		 success: function(res){
			    		 $.ajax({
				    		url:'usuario.php?c=Inicio&a=Publicacion',
				    		method:'POST',
				    		data: $("#idp").serialize(),
				    		 success: function(res){
				    		 	$(".Imagen").html(res);
			    		 }	
			    		});
		    		 	$("#Comentario").val("");
		    		 }	
		    		});
		  });
		
	});


</script>

<?php
$art = new ArtistaControlador();
$a = $art->Artista($p->id_artista);

if($p->id_artista == $_SESSION['id_artista']){
	echo "<script>
				$('#Accion').attr('href','Control.php?c=Inicio&a=EliminarPublicacion.php?id=".$id."');
				$('#Accion').html('Eliminar publicacion');
				
		</script>";
	}

	
?>