<?php 
	Class PortafolioControlador extends DBConexion{
		public function __construct()
		{
		}
		public function Portafolio($id_portafolio){
				$this->start();
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM portafolio where id_portafolio = $id_portafolio"
                );
                $stmt->execute();
                $Portafolios = new PortafolioModelo;
                $portafolio = $stmt->fetch(PDO::FETCH_ASSOC);
                $Portafolios->set(
                       	$portafolio['id_diseno'],
						$portafolio['descripcion']
                    );
                $this->stop();
				return $Portafolios;
			
		}
		public function Insert(){
				$this->start();
                $stmt = $this->pdo->prepare(
                    "INSERT into portafolio VALUES(NULL,NULL)"
                );
                $stmt->execute();
                $stmt = $this->pdo->prepare(
                   "SELECT MAX(id_portafolio) as id FROM portafolio"
                );
                $stmt->execute();
                $portafolio = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->stop();
                return $portafolio["id"];

		}
	}
?>