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
	}
?>