<?php 
	Class PortafolioControlador extends DBConexion{
	
		public function Portafolio($id_portafolio){
				$this->start();
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM portafolio where id_portafolio = $id_portafolio"
                );
                $stmt->execute();
                $Portafolios = new PortafolioModelo;
                $portafolio = $stmt->fetch(PDO::FETCH_ASSOC);
                $Portafolios->set(
                       	$portafolio['id_portafolio'],
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
        public function Update(){
            $this->start();
                $id_portafolio =$_POST['id_portafolio'];
                $descripcion = $_POST['descripcion'];
                    $stmt = $this->pdo->prepare(
                    "UPDATE portafolio set descripcion = $descripcion where id_portafolio = $id_portafolio"
                    );
                    $stmt->execute();
            $this->stop();
        }
	}
?>