<?php 
	class ComentarioControlador extends DBConexion
	{
		
		
		public function Comentarios($id_publicacion){
			 $this->start();
			$stmt = $this->pdo->prepare(
                    "SELECT * FROM comentario WHERE  id_publicacion = $id_publicacion"
                );
                $stmt->execute();
                $lista = array();
            
            while($Comentario = $stmt->fetch(PDO::FETCH_ASSOC)):
                $Comentarios = new ComentarioModelo();
                $Comentarios->set(
                    $Comentario["id_comentario"],
					$Comentario["fecha"],
					$Comentario["contenido"],
					$Comentario["id_usuario"],
					$Comentario["id_publicacion"],
					$Comentario["ocultar"]
					);
                $lista[] = $Comentarios;

            endwhile;
           

            $this->stop();
            return $lista;

		}
		public function Comentario($id_comentario){
			$this->start();
			$stmt = $this->pdo->prepare(
                    "SELECT * FROM comentario WHERE  id_comentario = $id_comentario"
                );
                $stmt->execute();
                $lista = array();
            
            $Comentario = $stmt->fetch(PDO::FETCH_ASSOC);
                $Comentarios = new ComentarioModelo();
                $Comentarios->set(
                    $Comentario["id_comentario"],
					$Comentario["fecha"],
					$Comentario["contenido"],
					$Comentario["id_usuario"],
					$Comentario["id_publicacion"],
					$Comentario["ocultar"]
					);
                

            $this->stop();
            return $Comentarios;
		}
		public function Comentar(){
			 $this->start();
			$id_publicacion = $_POST['publicacionC'];
			$comentario = $_POST['Comentario'];
			$id_usuario = $_SESSION['id_usuario'];
			$stmt = $this->pdo->prepare(
                    "INSERT into comentario values(NULL,NOW(),'$comentario',$id_usuario,$id_publicacion,0)"
                );
            $stmt->execute();
             $this->stop();

           

		}
		public function ELiminarComentarioUsuario(){
			 $this->start();
			$id_comentario=$_POST['id_c'];
            $stmt = $this->pdo->prepare(
                    "UPDATE comentario set ocultar = 1 WHERE  id_comentario = $id_comentario"
                );
            $stmt->execute();
             $this->stop();
		}
		public function EliminarComentario(){
			 $this->start();
			$id_comentario=$_POST['id_c'];
			$stmt = $this->pdo->prepare(
                    "DELETE FROM reportes_comentarios WHERE  id_comentario = $id_comentario"
                );
            $stmt->execute();
            $stmt = $this->pdo->prepare(
                    "DELETE FROM comentario WHERE  id_comentario = $id_comentario"
                );
            $stmt->execute();
             $this->stop();
		}
		public function ValidarComentario(){
			$this->start();
			$id_publicacion = $_POST['publicacionC'];
			$id_usuario = $_SESSION['id_usuario'];
			$stmt = $this->pdo->prepare(
                    "SELECT * FROM comentario WHERE  id_publicacion = $id_publicacion AND id_usuario = $id_usuario AND ocultar = 0"
                );
            $stmt->execute();
                if($stmt->rowCount() > 0){ 
                	$this->stop();
            		echo "1";
                }else{
                	$this->stop();
            		echo "0";
                }
                

            
		}
	}
 ?>