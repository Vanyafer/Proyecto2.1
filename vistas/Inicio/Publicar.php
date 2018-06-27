
<div class="modal">

	<div class="body publicacion">

		<div class="photo container">
			<img id="photo-container"/>
			<button class="clean"><i class="fas fa-times"></i></button>
		</div>
		<form action="Control.php?c=Inicio&a=Publicar" method="POST" enctype="multipart/form-data">
			<h1 class="title">
				Publicar
				<input type="file" name="image" id="image">
				<label for="image">
					<i class="fas fa-link"></i>
				</label>
			</h1>
			<div class="content grid columns-1">
				<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-font"></i>
						<label for="des">Descripción:</label>
					</div>
					<textarea type="text" name="des" id="des"></textarea>
				</div>
				<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-cogs"></i>
						<label>Tipo de Usuario:</label>
					</div>
					<div class="radio-button">
						<input type="radio" name="tipoP" id="tipoP1" value="0" checked>
						<label for="tipoP1">
							<div class="circle"></div>
							Público
						</label>
					</div>
					<div class="radio-button">
						<input type="radio" name="tipoP" value="1" id="tipoP2">
						<label for="tipoP2">
							<div class="circle"></div>
							Solo amigos
						</label>
					</div>
				</div>
				<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-lock"></i>
						<label>Edad:</label>
					</div>
					<div class="checkbox-button">
						<input type="checkbox" name="edad" id="edad">
						<label for="edad">
							<div class="circle"></div>
							+18
						</label>
					</div>
				</div>
			</div>
			<p id="Terminos"></p>
			<div class="send">
				<input type="submit" name="Aceptar" value="Subir" class="btn border">
			</div>
		</form>

	</div>

</div>

<script>

	$('#image').change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
				$('#photo-container').attr('src', e.target.result);
				$('.photo').addClass('active')
            }
            reader.readAsDataURL(this.files[0]);
        }
	})

	const reset = e => {
		e.wrap('<form>').closest('form').get(0).reset();
		e.unwrap();
	}

	$('.clean').click(() => {
		reset($('#image'))
		$('#photo-container').attr('src', '')
		$('.photo').removeClass('active')
	})

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
