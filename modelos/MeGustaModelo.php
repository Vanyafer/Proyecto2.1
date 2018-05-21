zz<?php 
	Class MeGustaModelo{

        public $id_megusta;
        public $tipo_me_gusta;
        public $id_publicacion;
        public $id_usuario;

         public function __construct(){

        }

        public function set( $id_megusta, $tipo_me_gusta, $id_publicacion, $id_usuario){
        	$this->id_megusta = $id_megusta;
            $this->tipo_me_gusta = $tipo_me_gusta;
        	$this->id_publicacion = $id_publicacion;
        	$this->id_usuario = $id_usuario;
        	
        }

    }
	
?>