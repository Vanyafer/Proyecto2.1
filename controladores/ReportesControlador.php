<?php 
	Class ReportesControlador extends DBConexion{
		public function ReportesUsuario(){}

		public function ReportarComentario(){
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$this->start();
				$razon = $_POST['razon'];
				$idreportado = $_POST['id_usuario'];
				$idreporcom = $_POST['id_comentario'];

				$co = new ComentarioControlador();
				$c = $co->Comentario($idreporcom);

                $re = new ReportesComentariosControlador();
                $re->ReportarComentario($idreporcom, $idreportado, $razon);

                $Noti = new NotificacionesControlador();
                $Noti->Insert(7,$idreportado,$c->id_publicacion,$idreportado);

                $Correo = new CorreoControlador();
                $Correo->Correo(2,$idreportado);
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

                $Noti = new NotificacionesControlador();
	            $Noti->Insert(8,$idreportado,$idreporpub,$idreportado);

	             $Correo = new CorreoControlador();
                $Correo->Correo(2,$idreportado);

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

                $Noti = new NotificacionesControlador();
                $Noti->Insert(9,$idreporusu,$idreporusu,$idreporusu);

                 $Correo = new CorreoControlador();
                $Correo->Correo(2,$idreportado);
                $this->stop();
                header("Location: Control.php?c=Perfiles&a=Perfiles&id=".$idreporusu);
			}
		}

			}
?>