<?php 
	Class ImagenColeccionModelo{

        public $id_imagencoleccion;
        public $imagen;
        public $id_coleccion;

        public function set( $id_imagencoleccion, $imagen, $id_coleccion){
        	$this->id_imagencoleccion = $id_imagencoleccion;
        	$this->imagen = $imagen;
        	$this->id_coleccion = $id_coleccion;
        	
        }

    }
	
?>