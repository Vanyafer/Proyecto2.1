<?php
	class RetoModelo{
		public $id_reto;
		public $fecha;
		public $descripcion;


        public function set(  $id_reto, $fecha, $descripcion){
        	$this->id_reto = $id_reto;
        	$this->fecha = $fecha;
        	$this->descripcion = $descripcion;        
        }
	}
?>