<?php
	class DisenoModelo{
		public $id_diseno;
		public $imagen_fondo;
		public $color_bordes;
		public $color_titulos;
		public $color_botones;
		public $color_fondo;
		public $tipo_perfil;

        public function set(  $id_diseno, $imagen_fondo, $color_bordes, $color_titulos,$color_botones,$color_fondo,$tipo_perfil){
        	$this->id_diseno = $id_diseno;
        	$this->imagen_fondo = $imagen_fondo;
        	$this->color_bordes = $color_bordes;
        	$this->color_titulos = $color_titulos;
        	$this->color_botones = $color_botones;
        	$this->color_fondo =$color_fondo;      
        	$this->tipo_perfil = $tipo_perfil;
        }
	}
?>