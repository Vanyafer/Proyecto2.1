<?php 
	Class ConversacionModelo{

        public $id_conversacion;
        public $id_usuario1;
        public $id_usuario2;


        public function set( $id_conversacion, $id_usuario1, $id_usuario2){
        	$this->id_conversacion = $id_conversacion;
        	$this->id_usuario1 = $id_usuario1;
        	$this->id_usuario2 = $id_usuario2;
        	
        }

    }
	
?>