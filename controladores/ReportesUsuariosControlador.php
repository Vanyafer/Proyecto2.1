<?php 
	Class ReportesUsuariosControlador extends DBConexion{
		
		public function ReportarUsuario($idreporusu, $razon){

				$this->start();
				$idreportero = $_SESSION['id_usuario'];
                $stmt = $this->pdo->prepare(
                    "INSERT into reportes_usuarios VALUES(NULL, $idreporusu, $idreportero, '$razon',0,NOW())"
                );
                $stmt->execute();
                $this->stop();			
		}
		public function ListaUsuarios(){
 		$this->start();
                $stmt = $this->pdo->prepare("SELECT * FROM reportes_usuarios where estatus = 0");
                $stmt->execute();
                $lista = array();
                while($R = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $Reporte = new ReportesUsuariosModelo();
                    $Reporte->set(
                        $R['id_reporte'],
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
                    "UPDATE reportes_usuarios set estatus = $estatus where id_reporte = $id_reporte "
                );
        $stmt->execute();
        header("location: Control.php?c=Moderador&a=Moderador");
        $this->stop();
    }
	}
?>