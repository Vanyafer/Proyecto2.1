<?php
	Class FanModelo{
		public $id_fan;
		public $informacion_contacto;
		public $perfil;
		public $id_usuario;
		public function __construct(){

        }

        public function set( $id_fan,  $informacion_contacto,$perfil,$id_usuario){
        	$this->id_fan = $id_fan;
        	$this->informacion_contacto = $informacion_contacto;
        	$this->perfil =$perfil;
        	
        	$this->id_usuario = $id_usuario;
        	
        }
	}
?>