<?php 
	Class PerfilControlador extends DBConexion{
		public function __construct()
		{
		}
		public function Perfil($id_perfil){
				$this->start();
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM perfil where id_perfil = $id_perfil"
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
				return $perfiles;
			
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
        public function Update($Metas,$Exper,$Otro,$Estudios,$id_perfil){
            $this->start();
                $stmt = $this->pdo->prepare(
                    "UPDATE perfil SET metas= '$Metas', exper = '$Exper', otro ='$Otro', estudios ='$Estudios' where id_perfil = $id_perfil"
                ); 
                $stmt->execute();
                $this->stop();
        }
	}
?>