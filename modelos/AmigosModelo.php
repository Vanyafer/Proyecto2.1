<?php 
	Class AmigosModelo{

        public $id_amigos;
        public $estado;
        public $id_usuario1;
        public $id_usuario2;

        public function set( $id_amigos, $estado, $id_usuario1, $id_usuario2){
        	$this->id_amigos = $id_amigos;
        	$this->estado = $estado;
        	$this->id_usuario1 = $id_usuario1;
        	$this->id_usuario2 = $id_usuario2;
        	
        }

    }
	
?>