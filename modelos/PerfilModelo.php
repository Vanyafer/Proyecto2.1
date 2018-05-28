<?php
	class PerfilModelo{
		public $id_perfil;
		public $metas;
		public $exper;
		public $otro;
		public $estudios;
		  public function __construct(){

        }

        public function set( $id_perfil,$metas,$exper,$otro,$estudios){
        	$this->id_perfil = $id_perfil;
        	$this->metas = $metas;
        	$this->exper = $exper;
        	$this->otro = $otro;
        	$this->estudios = $estudios;
        }
	}
?>