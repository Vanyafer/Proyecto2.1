<?php 
	Class MeGustaControlador extends DBConexion{
		public function MeGusta(){
  			$tipo_me_gusta= $_POST['tipoLike'];
  			$id_publicacion = $_POST['publicacionC'];
  			$id_usuario = $_SESSION['id_usuario'];
  			$this->start();
        $noti = new NotificacionesControlador();
  			$stmt = $this->pdo->prepare(
                      "SELECT * FROM me_gusta WHERE id_usuario = $id_usuario and id_publicacion = $id_publicacion"
                  );
                  $stmt->execute();
              
               if($stmt->rowCount() > 0){ 
               	$MeGusta = $stmt->fetch(PDO::FETCH_ASSOC);
                  $MeGustas = new MeGustaModelo();
                  $MeGustas->set(
                      $MeGusta["id_megusta"],
  					$MeGusta["tipo_me_gusta"],
  					$MeGusta["id_publicacion"],
  					$MeGusta["id_usuario"]
  					);
                  if($MeGustas->tipo_me_gusta==$tipo_me_gusta){
                  		$stmt = $this->pdo->prepare(
                      "DELETE FROM me_gusta WHERE id_megusta = $MeGustas->id_megusta"
                  );
                  $stmt->execute();
                  } else{
                  		$stmt = $this->pdo->prepare(
                      "UPDATE me_gusta set tipo_me_gusta = $tipo_me_gusta WHERE id_megusta = $MeGustas->id_megusta "
                  );
                  $stmt->execute();
                  }
               }else{
               	$stmt = $this->pdo->prepare(
                      "INSERT into me_gusta VALUES(NULL,$tipo_me_gusta,$id_publicacion,$id_usuario)"
                      

                  );

                  $stmt->execute();
                  $Noti = new NotificacionesControlador();
                  $publicacion = new InicioControlador();
                  $p = $publicacion->PublicacionInfo($id_publicacion);
                  $ar = new ArtistaControlador();
                  $a = $ar->Artista($p->id_artista);
                  if($id_usuario != $a->id_usuario){
                  $Noti->Insert(1,$id_usuario,$id_publicacion,$a->id_usuario);
                }
           }
            $this->stop();
    }
    public function MeGustaConsulta($id_publicacion){
          	$id_usuario = $_SESSION['id_usuario'];
			     $this->start();
          	$stmt = $this->pdo->prepare(
                    "SELECT * FROM me_gusta WHERE id_usuario = $id_usuario and id_publicacion = $id_publicacion"
                );
                $stmt->execute();
              if($stmt->rowCount() > 0){ 
             	  $MeGusta = $stmt->fetch(PDO::FETCH_ASSOC);
                $MeGustas = new MeGustaModelo();
                $MeGustas->set(
                    $MeGusta["id_megusta"],
      					$MeGusta["tipo_me_gusta"],
      					$MeGusta["id_publicacion"],
      					$MeGusta["id_usuario"]
      					);
                $this->stop();
                      return $MeGustas;
    					}else{
                $this->stop();
    						return null;
    					}              
		}
	 public function ListaMeGusta($id_publicacion){
       $this->start();
        $stmt = $this->pdo->prepare(
                    "SELECT * FROM me_gusta WHERE  id_publicacion = $id_publicacion"
                );
                $stmt->execute();
                $lista = array();
            while($MeGusta = $stmt->fetch(PDO::FETCH_ASSOC)){
          
                $MeGustas = new MeGustaModelo();
                  $MeGustas->set(
                      $MeGusta["id_megusta"],
                      $MeGusta["tipo_me_gusta"],
                      $MeGusta["id_publicacion"],
                      $MeGusta["id_usuario"]
                  );

                $lista[] = $MeGustas;
            }
            $this->stop();
            return $lista;
    }
  }
?>