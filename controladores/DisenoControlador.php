<?php 
	Class DisenoControlador extends DBConexion{

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
		public function Insert($color_bordes,$color_titulos,$color_botones,$color_fondo,$tipo_perfil){
				$this->start();
                $stmt = $this->pdo->prepare(
                    "INSERT INTO diseno VALUES(NULL,NULL,'$color_bordes','$color_titulos','$color_botones','$color_fondo',$tipo_perfil)"
                );
                $stmt->execute();
                $stmt = $this->pdo->prepare(
                   "SELECT MAX(id_diseno) as id FROM diseno"
                );
                $stmt->execute();
                $diseno = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->stop();
                return $diseno["id"];

		}
        public function Update($color_bordes,$color_titulos,$color_botones,$color_fondo,$tipo_perfil,$id_diseno){
                $this->start();
                $stmt = $this->pdo->prepare(
                    "UPDATE diseno set color_bordes = '$color_bordes', color_titulos ='$color_titulos', color_botones = '$color_botones', color_fondo = '$color_fondo', tipo_perfil = $tipo_perfil where id_diseno = $id_diseno"
                );
                $stmt->execute();
                $this->stop();
        }
	}
?>