<?php 
	Class PerfilControlador extends DBConexion{
		public function __construct()
		{
		}
		public function Perfil($id_diseno){
				$this->start();
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM perfil where id_diseno = $id_diseno"
                );
                $stmt->execute();
                $perfiles = new PerfilModelo;
                $perfil = $stmt->fetch(PDO::FETCH_ASSOC);
                $perfiles->set(
                       	$perfil['id_perfil'],
						$perfil['metas'],
						$perfil['exper'],
						$perfil['otro'],
						$perfil['estudios']
                    );
                $this->stop();
				return $perfiless;
			
		}
		public function Insert($Metas,$Exper,$Otro,$Estudios){
				$this->start();
                $stmt = $this->pdo->prepare(
                    "INSERT into perfil VALUES(NULL,'$Metas','$Exper','$Otro','$Estudios')"
                );
                $stmt->execute();
                $stmt = $this->pdo->prepare(
                   "SELECT MAX(id_perfil) as id FROM perfil"
                );
                $stmt->execute();
                $perfil = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->stop();
                return $perfil["id"];

		}
	}
?>