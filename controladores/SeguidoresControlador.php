<?php 
	Class SeguidoresControlador extends DBConexion{
		public function __construct()
		{
		}
		public function ListaSeguidores(){
			$this->start();
				$id_usuario = $_SESSION['id_usuario'];
				$stmt = $this->pdo->prepare(
                    "SELECT * FROM seguidores where id_usuario2 = $id_usuario"
                );

                $stmt->execute();
                $lista = array();
                while($Seguidor = $stmt->fetch(PDO::FETCH_ASSOC)):
                $Seguidores = new SeguidoresModelo();
                $Seguidores->set(
                    $Seguidor["id_seguidores"],
                    $Seguidor["id_usuario1"],
                    $Seguidor["id_usuario2"]
                );
                $lista[] = $Seguidores;

            endwhile;
           

			$this->stop();
			return $lista;

		}
        public function ListaSiguiendo(){
            $this->start();
                $id_usuario = $_SESSION['id_usuario'];
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM seguidores where id_usuario1 = $id_usuario"
                );

                $stmt->execute();
                $lista = array();
                while($Seguidor = $stmt->fetch(PDO::FETCH_ASSOC)):
                $Seguidores = new SeguidoresModelo();
                $Seguidores->set(
                    $Seguidor["id_seguidores"],
                    $Seguidor["id_usuario1"],
                    $Seguidor["id_usuario2"]
                );
                $lista[] = $Seguidores;

            endwhile;
           

            $this->stop();
            return $lista;
        }
        public function Siguiendo($id_usuario2){
            $this->start();
                $id_usuario1 = $_SESSION['id_usuario'];
                //$id_usuario2 = $_GET['id_usuario'];
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM seguidores where id_usuario1 = $id_usuario1 and id_usuario2 = $id_usuario2"
                );

                $stmt->execute();
            if($stmt->rowCount() > 0){
                $this->stop();
                return 1;
            }else{
                $this->stop();
                return 0;

            }
            
        }
        public function Seguir(){
            $this->start();
                $id_usuario1 = $_SESSION['id_usuario'];
                $id_usuario2 = $_GET['id_usuario'];
                $stmt = $this->pdo->prepare(
                    "INSERT INTO seguidores VALUES( NULL,$id_usuario1,$id_usuario2)"
                );

                $stmt->execute();

                header("Location: Control.php?c=Perfiles&a=Perfiles&id=$id_usuario2");
        }
        public function DejarSeguir(){
            $this->start();
                $id_usuario1 = $_SESSION['id_usuario'];
                $id_usuario2 = $_GET['id_usuario'];
                $stmt = $this->pdo->prepare(
                    "DELETE FROM seguidores where id_usuario1 = $id_usuario1 and id_usuario2 = $id_usuario2"
                );

                $stmt->execute();

                header("Location: Control.php?c=Perfiles&a=Perfiles&id=$id_usuario2");
        }
	}
?>