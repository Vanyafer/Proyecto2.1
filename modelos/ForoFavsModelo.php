<?php
	class ForoFavsModelo{
		public $id_favs;
		public $id_usuario;
		public $id_forohilo;


        public function set($id_favs, $id_usuario, $id_forohilo){
        	$this->id_favs = $id_favs;
            $this->id_usuario = $id_usuario;
            $this->id_forohilo = $id_forohilo;
            
        }
	}
?>