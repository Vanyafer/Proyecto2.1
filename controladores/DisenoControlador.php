<?php 
	Class DisenoControlador extends DBConexion{
		public function __construct()
		{
		}
		public function Diseno($id_diseno){
				$this->start();
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM diseno where id_diseno = $id_diseno"
                );
                $stmt->execute();
                $disenos = new DisenoModelo;
                $diseno = $stmt->fetch(PDO::FETCH_ASSOC);
                $disenos->set(
                       	$diseno['id_diseno'],
						$diseno['imagen_fondo'],
						$diseno['color_bordes'],
						$diseno['color_titulos'],
						$diseno['color_botones'],
						$diseno['color_fondo'],
						$diseno['tipo_perfil']
                    );
                $this->stop();
				return $disenos;
			
		}
	}
?>