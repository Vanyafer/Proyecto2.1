	<?php
			if($_SESSION['tipo_usuario']==1){
				echo "<script Language='JavaScript'>
				$('.Artista').style.visibility='visible';
				</script>";
			}
			if($_SESSION['tipo_usuario']==2){
				echo "<script Language='JavaScript'>
				$('.Artista').style.display='none';
				</script>";
			}

		
	?>