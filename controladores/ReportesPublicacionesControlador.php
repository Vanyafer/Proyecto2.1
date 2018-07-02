<?php 
	Class ReportesPublicacionesControlador extends DBConexion{
		
		public function ReportarPublicacion($idreporpub, $idreportado,$razon){
			$this->start();
                $idreportero = $_SESSION['id_usuario'];
                $stmt = $this->pdo->prepare(
                    "INSERT into reportes_publicaciones VALUES(NULL, $idreporpub, $idreportado, $idreportero, '$razon',0,NOW())"
                );
                $stmt->execute();
            $this->stop();
			
		}
		public function ListaPublicaciones(){
 		    $this->start();
                $stmt = $this->pdo->prepare("SELECT * FROM reportes_publicaciones where estatus = 0");
                $stmt->execute();
                $lista = array();
                while($R = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $Reporte = new ReportesPublicacionesModelo();
                    $Reporte->set(
                        $R['id_reporte'],
						$R['id_publicacion'],
						$R['id_reportado'],
						$R['id_reportero'],
						$R['razon'],
                        $R['estatus'],
                        $R['fecha']
                    );
                    $lista[] = $Reporte;
                }
            $this->stop();
            return $lista;
 	}
 	public function ListaPublicacionesUsuario($id_usuario){
 		$this->start();
            $stmt = $this->pdo->prepare("SELECT * FROM reportes_publicaciones where id_reportado = $id_usuario");
            $stmt->execute();
            $lista = array();
            while($R = $stmt->fetch(PDO::FETCH_ASSOC)){
                $Reporte = new ReportesPublicacionesModelo();
                $Reporte->set(
                    $R['id_reporte'],
                    $R['id_publicacion'],
                    $R['id_reportado'],
                    $R['id_reportero'],
                    $R['razon'],
                    $R['estatus'],
                    $R['fecha']
                );
                $lista[] = $Reporte;
            }
        $this->stop();
        return $lista;
 	}
	public function EstatusReporte(){
        $this->start();
            $id_reporte = $_GET['id_reporte'];
            $estatus = $_GET['estatus'];
            $stmt = $this->pdo->prepare(
                        "UPDATE reportes_publicaciones set estatus = $estatus where id_reporte = $id_reporte "
                    );
            $stmt->execute();
            header("location: Control.php?c=Moderador&a=Moderador");
        $this->stop();
    }
	}
?>