<?php
	class ForoModelo{
		public $id_favs;
		public $id_usuario;
		public $id_forohilo;
		
		  public function __construct(){

        }

        public function set(  $id_hilo, $id_usuario, $id_forohilo){
        	$this->id_hilo = $id_hilo;
            $this->id_usuario = $id_usuario;
            $this->id_forohilo = $id_forohilo;
            
        }
	}
?>