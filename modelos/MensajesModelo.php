<?php 
	Class MensajesModelo{
			public $id_mensaje;
			public $fecha;
			public $texto;
			public $id_conversacion;
			public $id_usuario;

		public function __construct(){

        }

        public function set($id_mensaje, $fecha, $texto, $id_conversacion, $id_usuario ){
        	$this->id_mensaje = $id_mensaje;
        	$this->fecha = $fecha;
        	$this->texto = $texto;
        	$this->id_conversacion = $id_conversacion;
        	$this->id_usuario = $id_usuario;
        }
	}
?>