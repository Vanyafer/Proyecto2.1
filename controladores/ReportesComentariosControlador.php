<?php 
	Class ReportesComentariosControlador extends DBConexion{

		public function ReportarComentario($idreporcom, $idreportado, $razon){
				$this->start();
				
				$idreportero = $_SESSION['id_usuario'];
                $stmt = $this->pdo->prepare(
                    "INSERT into reportes_comentarios VALUES(NULL, $idreporcom, $idreportado, $idreportero, '$razon',0,NOW())"
                );
                $stmt->execute();
                $this->stop();
                header("Location: Control.php?c=Inicio&a=Inicio");
	}
	public function ListaComentarios(){
 		$this->start();
                $stmt = $this->pdo->prepare("SELECT * FROM reportes_comentarios where estatus = 0");
                $stmt->execute();
                $lista = array();
                while($R = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $Reporte = new ReportesComentariosModelo();
                    $Reporte->set(
                        $R['id_reporte'],
						$R['id_comentario'],
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
 	public function ListaComentariosUsuario($id_usuario){
 		$this->start();
                $stmt = $this->pdo->prepare("SELECT * FROM reportes_comentarios where id_reportado = $id_usuario");
                $stmt->execute();
                $lista = array();
                while($R = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $Reporte = new ReportesComentariosModelo();
                    $Reporte->set(
                        $R['id_reporte'],
						$R['id_comentario'],
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
                    "UPDATE reportes_comentarios set estatus = $estatus where id_reporte = $id_reporte "
                );
        $stmt->execute();
        header("location: Control.php?c=Moderador&a=Moderador");
        $this->stop();
    }
 }
?>