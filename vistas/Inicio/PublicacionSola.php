
	<link rel="stylesheet" type="text/css" href="./assets/css/Publicacion.css">
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$GLOBALS['id_p'] = $_POST['idp'];

}
if($_SERVER['REQUEST_METHOD']=='GET'){
	$GLOBALS['id_p'] = $_GET['idp'];

}
			$id = $GLOBALS['id_p'];
			$ini = new InicioControlador();
			$p = $ini->PublicacionInfo($id);
			
	

		?>

	<div class="modal data">

		<div class="body publicacion">

			<div class="photo container active">
				<img src="<?php echo  $p->imagen ?>">
			</div>
			<div class="form">
				<h1 class="title name"></h1>
				<div class="grid columns-1">
					<?php if(!empty($p->contenido)): ?>
						<div class="description">
							<label class="subtitle">
								<i class="fas fa-font"></i>
								Descripción
							</label>
							<p class="post-item" readonly="readonly" ><?php echo $p->contenido; ?></p>
						</div>
					<?php endif;?>
					<div class="comments">
						<label class="subtitle">
							<i class="fas fa-comments"></i>
							Comentarios
						</label>
						<?php

							$Com = new ComentarioControlador();
							$co = $Com->Comentarios($id);
			
							foreach ($co as $c) {
								$us = new UsuarioControlador();
								$u = $us->Usuario($c->id_usuario);
								if($c->ocultar == 1){ ?>
								<div class="comment">
									<div class="owner">
										<a href="Control.php?c=Perfiles&a=Perfiles&id=<?php echo $c->id_usuario;?>" id="usuario"><?php echo $u->nombre_usuario;?></a>
										<div class="date"><?php echo $c->fecha;?></div>
									</div>
									<div class="message" id="<?php echo $c->id_comentario;?>">
										Este comentario fue borrado
									</div>
								</div>
								<?php } else {
									$us = new UsuarioControlador();
									$u = $us->Usuario($c->id_usuario);
									?>
										<div class="comment">
											<div class="owner">
												<a href="Control.php?c=Perfiles&a=Perfiles&id=<?php echo $c->id_usuario;?>" id="usuario"><?php echo $u->nombre_usuario;?></a>
												<div class="date"><?php echo $c->fecha;?></div>
											</div>
											<div class="message" id="<?php echo $c->id_comentario;?>">
												<?php echo $c->contenido;?>
											</div>
										</div>
									<?php }
								}
							?>
						
					</div>
				</div>
			</div>

		</div>
	</div>


<script>
	$(document).ready(function(){
		$(window).click(e => {
			if(e.target == $('.data')[0]) {
				$('.data').fadeOut(400);
			}
		})
		$(".data").fadeIn(400).css('display','flex');
	});
</script>