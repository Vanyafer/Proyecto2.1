<?php 
	Class ReportesControlador extends DBConexion{
		public function ReportesUsuario(){
			
		}
		public function ReportarComentario(){

			if($_SERVER['REQUEST_METHOD']=='POST'){
				$this->start();
				$razon = $_POST['razon'];
				$idreportado = $_POST['id_usuario'];
				$idreporcom = $_POST['id_comentario'];

                $re = new ReportesComentariosControlador();
                $re->ReportarComentario($idreporcom, $idreportado, $razon);
                $this->stop();
                header("Location: Control.php?c=Inicio&a=Inicio");
			}
		}
		
		public function ReportarPublicacion(){
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$this->start();
		$razon = $_POST['razon'];
		$idreportado = $_POST['id_artista'];
		$idreportero = $_SESSION['id_usuario'];
		$idreporpub = $_POST['id_publicacion'];
				$re = new ReportesPublicacionesControlador();
                $re->ReportarPublicacion($idreporpub, $idreportado, $razon);
                $this->stop();
                header("Location: Control.php?c=Inicio&a=Inicio");
	}
		}
		public function ReportarUsuario(){

			if($_SERVER['REQUEST_METHOD']=='POST'){
				$this->start();
				$razon = $_POST['razon'];
				$idreporusu = $_POST['id_usuario'];
				
				$re = new ReportesUsuariosControlador();
                $re->ReportarUsuario($idreporusu, $razon);
                $this->stop();
                header("Location: Control.php?c=Perfiles&a=Perfiles&id=".$idreporusu);
			}
		}

			}
?>