<?php 
	/**
	* 
	*/
	class ComentarioControlador extends DBConexion
	{
		
		public function __construct()
		{
		}
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
					$Comentario["id_publicacion"]
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
					$Comentario["id_publicacion"]
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
                    "INSERT into comentario values(NULL,NOW(),'$comentario',$id_usuario,$id_publicacion)"
                );
            $stmt->execute();
             $this->stop();

           

		}
		public function EliminarComentario(){
			 $this->start();
			$id_comentario=$_POST['id_c'];
			$id_publicacion = $_POST['publicacionC'];
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
	}
 ?>