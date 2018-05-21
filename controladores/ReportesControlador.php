<?php 
	Class ReportesControlador extends DBConexion{
		public function __construct()
		{
		}
		public function ReportarComentario(){

			if($_SERVER['REQUEST_METHOD']=='POST'){
				$this->start();
				$razon = $_POST['razon'];
				$idreportado = $_POST['id_usuario'];
				$idreportero = $_SESSION['id_usuario'];
				$idreporcom = $_POST['id_comentario'];
                $stmt = $this->pdo->prepare(
                    "INSERT into reportes_comentarios VALUES(NULL, $idreporcom, $idreportado, $idreportero, '$razon')"
                );
                $stmt->execute();
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
		$stmt = $this->pdo->prepare(
                    "INSERT into reportes_publicaciones VALUES(NULL, $idreporpub, $idreportado, $idreportero, '$razon')"
                );
                $stmt->execute();
                $this->stop();
                header("Location: Control.php?c=Inicio&a=Inicio");
	}
		}
		public function ReportarUsarios(){

			if($_SERVER['REQUEST_METHOD']=='POST'){
				$this->start();
				$razon = $_POST['razon'];
				$idreporusu = $_POST['id_usuario'];
				$idreportero = $_SESSION['id_usuario'];
                $stmt = $this->pdo->prepare(
                    "INSERT into reportes_usuarios VALUES(NULL, $idreporusu, $idreportero, '$razon')"
                );
                $stmt->execute();
                $this->stop();
                header("Location: Control.php?c=Inicio&a=Inicio");
			}
		}

			}
?>