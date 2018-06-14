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
            public function Insert($Edad,$imagen,$infomracion,$tecnica,$Pais,$id_usuario,$id_diseno,$id_portafolio,$id_perfil){
                $this->start();
                $stmt = $this->pdo->prepare(
                            "INSERT into artista VALUES(NULL,'$Edad','$imagen','$informacion','$tecnica',$Pais,$id_usuario,$id_diseno,$id_portafolio,$id_perfil)"
                        );
                        $stmt->execute();
                         $stmt = $this->pdo->prepare(
                            "SELECT MAX(id_artista) as id FROM artista"
                        );
                        $stmt->execute();
                        $artista = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->stop();
                return $artista["id_artista"];
            }
            public function Update($Edad,$imagen,$informacion,$tecnica,$Pais,$id_artista){
                 $this->start();
                $stmt = $this->pdo->prepare(
                            "UPDATE artista set fn = '$Edad', imagen_perfil = '$imagen', informacion_contacto ='$informacion', tecnica_interes = '$tecnica', id_pais = $Pais where id_artista = $id_artista"
                        );
                        $stmt->execute();
                         
                $this->stop();
            }
 		}
?>