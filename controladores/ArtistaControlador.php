<?php 
 		class ArtistaControlador extends DBConexion{
 			public $artista;
 			public function Artista($id_artista){
 				$this->start();
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM artista where id_artista = $id_artista"
                );

                $stmt->execute();
                $Artistas = new ArtistaModelo;
                $Artista = $stmt->fetch(PDO::FETCH_ASSOC);
                $Artistas->set(
                	$Artista["id_artista"],
			        $Artista["fn"],
			        $Artista["imagen_perfil"],
			        $Artista["informacion_contacto"],
			        $Artista["tecnica_interes"],
			        $Artista["id_pais"],
			        $Artista["id_usuario"],
			        $Artista["id_diseno"],
			        $Artista["id_portafolio"],
			        $Artista["id_perfil"]
                	);

           

            $this->stop();
            return $Artistas;
 			}
 			public function ArtistaUsuario($id_usuario){
 				$this->start();
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM artista where id_usuario = $id_usuario"
                );

                $stmt->execute();
                $Artistas = new ArtistaModelo;
                $Artista = $stmt->fetch(PDO::FETCH_ASSOC);
                $Artistas->set(
                	$Artista["id_artista"],
			        $Artista["fn"],
			        $Artista["imagen_perfil"],
			        $Artista["informacion_contacto"],
			        $Artista["tecnica_interes"],
			        $Artista["id_pais"],
			        $Artista["id_usuario"],
			        $Artista["id_diseno"],
			        $Artista["id_portafolio"],
			        $Artista["id_perfil"]
                	);

           

            $this->stop();
            return $Artistas;
 			}
 		}
?>