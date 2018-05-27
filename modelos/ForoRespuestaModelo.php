<?php
	class ForoModelo{
		public $id_fororespuesta;
		public $fecha;
		public $contenido;
		public $id_forohilo;
		public $id_usuario;
		
		  public function __construct(){

        }

        public function set(  $id_fororespuesta, $fecha, $contenido, $id_forohilo, $id_usuario){
        	$this->id_fororespuesta = $id_fororespuesta;
        	$this->fecha = $fecha;
        	$this->contenido = $contenido;
        	$this->titulo = $titulo;
        	$this->id_forohilo = $id_forohilo;
            $this->id_usuario = $id_usuario;
            
        }
	}
?>