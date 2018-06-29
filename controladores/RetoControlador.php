<?php
	Class RetoControlador extends DBConexion{
		 public function __construct(){}

        public function Reto(){
        	$this->start();
        	 $stmt = $this->pdo->prepare(
                    "SELECT * FROM retos where  fecha <= NOW() order by id_reto DESC"
                );
                $stmt->execute();
                $stmt->execute();
                $Reto = $stmt->fetch(PDO::FETCH_ASSOC);
                $Retos = new RetoModelo();
                $Retos->set(
                    $Reto["id_reto"],
                    $Reto["fecha"],
                    $Reto["descripcion"]
                );
              $this->stop();
            return $Retos;
        }

        public function SubirReto(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $this->start();
                $folder="./Imagenes/imgReto/";
                $tmp_name = $_FILES["image"]["tmp_name"];
                if(!move_uploaded_file( $tmp_name,"$folder".$_FILES["image"]["name"])){
                    echo "error;";
                }else{

                    $id_reto = $_POST['id_reto'];
                    $RetoA = new RetoAceptadoControlador();
                    $ra = $RetoA->AceptarReto($id_reto);
                    
                    $id_aceptado = $ra->id_aceptado;
                    
                    $stmt = $this->pdo->prepare(
                                "INSERT into imagen_reto VALUES(NULL,'$folder".$_FILES["image"]["name"]."',$id_aceptado)"
                            );
                    $stmt->execute();

                    $this->stop();
                    header("Location: Control.php?c=Reto&a=Reto");
                }
            }
	   } 
}
?>