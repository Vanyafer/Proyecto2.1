
	<link rel="stylesheet" type="text/css" href="./assets/css/Publicacion.css">
<?php
//require ("/xampp\htdocs\Proyecto2.1\controladores\InicioControlador.php");
if($_SERVER['REQUEST_METHOD']=='POST'){
	$GLOBALS['id_p'] = $_POST['idp'];

}
if($_SERVER['REQUEST_METHOD']=='GET'){
	$GLOBALS['id_p'] = $_GET['idp'];

}
			$id = $GLOBALS['id_p'];
			$ini = new InicioControlador();
			$p = $ini->PublicacionInfo($id);
			$me = new MeGustaControlador();
			$m = $me->MeGustaConsulta($id);
			
	

		?>
<script type="text/javascript">
	function Enviar(){
		
			$.ajax({

		    		url:'Ajax.php?c=Comentario&a=Comentar',
		    		method:'POST',
		    		data: $("#ComentarioN").serialize(),
		    		 success: function(res){
			    		 $.ajax({
				    		url:'Ajax.php?c=Inicio&a=Publicacion',
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

		$(".Like").click(function(){
		     	id=$(this).attr("id");
		     	$('#tipoLike').val(id);
		     	$.ajax({
		     		url:'Ajax.php?c=Comentario&a=ValidarComentario',
		    		method:'POST',
		    		data: $('#ComentarioN').serialize(),
		    		 success: function(res){
		    		 		bandera = res;
		    		 	
		    		 }	
		    	});
		     	if((id==0 && bandera == 1) || (id == 2) ){
		     		
		     		$.ajax({
		    		url:'Ajax.php?c=MeGusta&a=MeGusta',
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
		    		if(id == 0 && document.getElementById(2).style.color == 'blue'){
		    				document.getElementById(2).style.color = 'black';
		    		}
							
		    		if(id == 2 && document.getElementById(0).style.color == 'blue'){
		    				document.getElementById(0).style.color = 'black';
		    		}
		    		bandera = 0;
		     	}else{
		     		alert("Deja un comentario");
		     	}
		    	
		    	
		    });

		$(".EliminarComentario").click(function(){
				id=$(this).attr("id");
		    	$("#id_c").val(id);
				$.ajax({

		    		url:'Ajax.php?c=Comentario&a=EliminarComentarioUsuario',
		    		method:'POST',
		    		data: $("#ComentarioN").serialize(),
		    		 success: function(res){
			    		 $.ajax({
				    		url:'Ajax.php?c=Inicio&a=Publicacion',
				    		method:'POST',
				    		data: $("#idp").serialize(),
				    		 success: function(res){
				    		 	$(".Imagen").html(res);
			    		 }	
			    		});
		    		 	$("#Comentario").val("");
		    		 }	
		    		});
				bandera = 1;
		  });
		
	

</script>
	<div class="Contenedor">
		<div class="Box">
		<img src="<?php echo  $p->imagen ?>">
		<input type="hidden" name="" id="idI" value="<?php echo $id;?>">
	</div>
	<div class="Box1">
			<div><textarea readonly="readonly" ><?php echo $p->contenido; ?></textarea></div>
			<div>

					<a class="Like" id="0">Dislike</a>

					<a class="Like" id="2">like</a> 
			</div>
			<div class="Comentarios">
				<div>
					<?php
						$Com = new ComentarioControlador();
						$co = $Com->Comentarios($id);
		
						foreach ($co as $c) {
							$us = new UsuarioControlador();
						$u = $us->Usuario($c->id_usuario);
						if($c->ocultar == 1){
							echo "<div class='Comentario'>
									<a href='Control.php?c=Perfiles&a=Perfiles&id=".$c->id_usuario."' id='usuario'>$u->nombre_usuario</a>
									<div class='contenido' id=$c->id_comentario>Este comentario fue borrado</div>
									<div class='fecha'>$c->fecha</div>
								</div>";
						}else{
							$us = new UsuarioControlador();
						$u = $us->Usuario($c->id_usuario);
						if($c->id_usuario == $_SESSION['id_usuario'] || $_SESSION['tipo_usuario']==3){
							$class = "EliminarComentario";
							$x = "Eliminar Comentario";
							$href = "";
		
						}else{
							$class = "";
							$x = "Reportar";
							$href = "href='Control.php?c=Reportes&a=ReportarComentario&id=$c->id_comentario'";
						}
						
							echo "<div class='Comentario'>
							<a href='Control.php?c=Perfiles&a=Perfiles&id=".$c->id_usuario."' id='usuario'>$u->nombre_usuario</a>
							<div class='contenido' id=$c->id_comentario>$c->contenido</div>
							<div class='fecha'>$c->fecha</div>
							<a  ".$href." id='$c->id_comentario' class='AccionComentario ".$class."'>$x</a>
							</div>";
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
			echo '<a href="Control.php?c=Reportes&a=ReportarPublicacion&id='.$id.'" id="Accion">Reportar publicación</a>';
		?>
		
	</div>
			
			
	</div>
	</div>





<?php
if($m != null){
				if($m->tipo_me_gusta==2){
					echo "<script> 
							document.getElementById('2').style.color = 'blue' ;</script>";
						
				}else{
					echo "<script> 
							document.getElementById('0').style.color = 'blue' ;</script>";
				
				}
}

if((isset( $_SESSION['id_artista']) && $p->id_artista == $_SESSION['id_artista']) || $_SESSION['tipo_usuario']==3){
	echo "<script>
				$('#Accion').attr('href','Control.php?c=Inicio&a=EliminarPublicacionUsuario&id=".$id."');
				$('#Accion').html('Eliminar publicacion');
				
		</script>";
	}

if($_SESSION['tipo_usuario']==3){
	echo "<script Language='JavaScript'>
				$('.Like').css('display','none');
				</script>";
	echo "<script Language='JavaScript'>
				$('.ComentarioNuevo').css('display','none');
				</script>";
}

	
?>