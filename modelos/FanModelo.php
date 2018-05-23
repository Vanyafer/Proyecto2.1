<?php
	Class FanModelo{
		public $id_fan;
		public $fn;
		public $imagen_perfil;
		public $informacion_contacto;
		public $perfil;
		public $id_pais;
		public $id_usuario;
		public function __construct(){

        }

        public function set( $id_fan,$fn, $imagen_perfil, $informacion_contacto,$perfil, $id_pais,$id_usuario){
        	$this->id_fan = $id_fan;
        	$this->fn =$fn;
        	$this->imagen_perfil = $imagen_perfil;
        	$this->informacion_contacto = $informacion_contacto;
        	$this->perfil =$perfil;
        	$this->pais = $pais;
        	$this->id_usuario = $id_usuario;
        	
        }
	}
?>