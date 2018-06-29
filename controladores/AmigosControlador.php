<?php 
	Class AmigosControlador extends DBConexion{
	
		public function ListaAmigos(){
			$this->start();
				$id_usuario = $_SESSION['id_usuario'];
				$stmt = $this->pdo->prepare(
                    "SELECT * FROM amigos where estado = 1 and (id_usuario2 = $id_usuario or id_usuario1= $id_usuario)"
                );

                $stmt->execute();
                $lista = array();
                while($Amigo = $stmt->fetch(PDO::FETCH_ASSOC)):
                $Amigos = new AmigosModelo();
                $Amigos->set(
                    $Amigo["id_amigos"],
                    $Amigo["estado"],
                    $Amigo["id_usuario1"],
                    $Amigo["id_usuario2"]
                );
                $lista[] = $Amigos;

            endwhile;
           

			$this->stop();
			return $lista;

		}
        public function Amigo($id_usuario2){
            $this->start();
                $id_usuario1 = $_SESSION['id_usuario'];
                //$id_usuario2 = $_GET['id_usuario'];
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM amigos where ((id_usuario1 = $id_usuario1 and id_usuario2 = $id_usuario2) or (id_usuario1 = $id_usuario2 and id_usuario2 = $id_usuario1))"
                );
                $stmt->execute();

               $Amigo = $stmt->fetch(PDO::FETCH_ASSOC);
                $Amigos = new AmigosModelo();
                $Amigos->set(
                    $Amigo["id_amigos"],
                    $Amigo["estado"],
                    $Amigo["id_usuario1"],
                    $Amigo["id_usuario2"]
                );
               $this->stop();
            return $Amigos;
        
        }
        public function Estado($id_usuario2){
            $this->start();
                $id_usuario1 = $_SESSION['id_usuario'];
                //$id_usuario2 = $_GET['id_usuario'];
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM amigos where estado = 1 and ((id_usuario1 = $id_usuario1 and id_usuario2 = $id_usuario2) or (id_usuario1 = $id_usuario2 and id_usuario2 = $id_usuario1))"
                );

                $stmt->execute();
            if($stmt->rowCount() > 0){
                $this->stop();
                return 1;
            }else{
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM amigos where estado = 0 and  id_usuario1 = $id_usuario2 and id_usuario2 = $id_usuario1"
                );

                $stmt->execute();
                if($stmt->rowCount() > 0){
                    $this->stop();
                    return 2;
                }else{

                    $stmt = $this->pdo->prepare(
                        "SELECT * FROM amigos where estado = 0 and  id_usuario1 = $id_usuario1 and id_usuario2 = $id_usuario2"
                    );

                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        $this->stop();
                        return 3;
                    }else{
                        $this->stop();
                        return 0;
                }
             }
            
        }
    }
        public function Solicitudes(){
            $this->start();
                $id_usuario = $_SESSION['id_usuario'];
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM amigos where estado = 0 and id_usuario2 = $id_usuario"
                );

                $stmt->execute();
                $lista = array();
                while($Amigo = $stmt->fetch(PDO::FETCH_ASSOC)):
                $Amigos = new AmigosModelo();
                $Amigos->set(
                    $Amigo["id_amigos"],
                    $Amigo["estado"],
                    $Amigo["id_usuario1"],
                    $Amigo["id_usuario2"]
                );
                $lista[] = $Amigos;

            endwhile;

            $this->stop();
            return $lista;

        }
        public function Agregar(){
            $this->start();
                $id_usuario1 = $_SESSION['id_usuario'];
                $id_usuario2 = $_GET['id_usuario'];
                $stmt = $this->pdo->prepare(
                    "INSERT INTO amigos VALUES( NULL,0,$id_usuario1,$id_usuario2)"
                );

                $stmt->execute();
                $Noti = new NotificacionesControlador();
                $Noti->Insert(6,$id_usuario1,$id_usuario1,$id_usuario2);
                $this->stop();
                header("Location: Control.php?c=Perfiles&a=Perfiles&id=$id_usuario2");
        }
        public function Eliminar(){
            $this->start();
                $id_usuario = $_GET['id_usuario'];
                $id_amigos = $_GET['id'];
                $stmt = $this->pdo->prepare(
                    "DELETE FROM amigos where id_amigos= $id_amigos"
                );

                $stmt->execute();
                $this->stop();
                header("Location: Control.php?c=Perfiles&a=Perfiles&id=$id_usuario");
        }
        public function Aceptar(){
                 $this->start();
                $id_usuario = $_GET['id_usuario'];
                $id_amigos = $_GET['id'];
                $stmt = $this->pdo->prepare(
                    "UPDATE amigos SET estado = 1 where id_amigos= $id_amigos"
                );

                $stmt->execute();

                $amigo = new AmigosControlador();
                $a = $amigo->Amistad($id_amigos);
                $Noti = new NotificacionesControlador();
                $Noti->Insert(5,$a->id_usuario2,$a->id_usuario2,$a->id_usuario1);
                

                $this->stop();
                header("Location: Control.php?c=Perfiles&a=Perfiles&id=$id_usuario");
        }
        public function Amistad($id_amigos){
                $this->start();
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM amigos where id_amigos = $id_amigos"
                );
                $stmt->execute();

                $Amigo = $stmt->fetch(PDO::FETCH_ASSOC);
                $Amigos = new AmigosModelo();
                $Amigos->set(
                    $Amigo["id_amigos"],
                    $Amigo["estado"],
                    $Amigo["id_usuario1"],
                    $Amigo["id_usuario2"]
                );
               $this->stop();
               return $Amigos;
        }
	}
?>