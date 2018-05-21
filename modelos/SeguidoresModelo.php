<?php 
	Class SeguidoresModelo{

        public $id_seguidores;
        public $id_usuario1;
        public $id_usuario2;

         public function __construct(){

        }

        public function set( $id_seguidores, $id_usuario1, $id_usuario2){
        	$this->id_seguidores = $id_seguidores;
        	$this->id_usuario1 = $id_usuario1;
        	$this->id_usuario2 = $id_usuario2;
        	
        }

    }
	
?>