<?php 
 		class ArtistaControlador extends DBConexion{
 			
 			public function Artista($id_artista){
 				$this->start();
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM artista where id_artista = $id_artista"
                );

                $stmt->execute();
                $Artista = $stmt->fetch(PDO::FETCH_ASSOC);
                $Artistas = new ArtistaModelo();
                $Artistas->set(
                	$Artista["id_artista"],
			        $Artista["informacion_contacto"],
			        $Artista["tecnica_interes"],
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
                $Artistas = new ArtistaModelo();
                $Artista = $stmt->fetch(PDO::FETCH_ASSOC);
                $Artistas->set(
                	$Artista["id_artista"],
			        $Artista["informacion_contacto"],
			        $Artista["tecnica_interes"],
			        $Artista["id_usuario"],
			        $Artista["id_diseno"],
			        $Artista["id_portafolio"],
			        $Artista["id_perfil"]
                	);
                $this->stop();
                return $Artistas;
 			}
            public function Insert($infomracion,$tecnica,$id_usuario,$id_diseno,$id_portafolio,$id_perfil){
                $this->start();
                $stmt = $this->pdo->prepare(
                            "INSERT into artista VALUES(NULL,'$informacion','$tecnica',$id_usuario,$id_diseno,$id_portafolio,$id_perfil)"
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
            public function Update($informacion,$tecnica,$id_artista){
                 $this->start();
                $stmt = $this->pdo->prepare(
                            "UPDATE artista set  informacion_contacto ='$informacion', tecnica_interes = '$tecnica' where id_artista = $id_artista"
                        );
                        $stmt->execute();
                         
                $this->stop();
            }
 		}
?>