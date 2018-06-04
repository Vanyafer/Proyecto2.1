	<?php
	if(isset($_SESSION['id_usuario'])){
			if($_SESSION['tipo_usuario']==1){
				echo "<script Language='JavaScript'>
				$('.Artista').css('visibility','visible');
				</script>";
			}
			if($_SESSION['tipo_usuario']==2){
				echo "<script Language='JavaScript'>
				$('.Artista').css('display','none');
				</script>";
			}

}
	?>