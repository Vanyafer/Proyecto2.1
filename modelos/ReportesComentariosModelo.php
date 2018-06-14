<?php
	class ReportesComentariosModelo{
		public $id_reporte;
		public $id_comentario;
		public $id_reportado;
		public $id_reportero;
		public $razon;
		public $estatus;
		public $fecha;

        public function set(  $id_reporte, $id_comentario, $id_reportado, $id_reportero, $razon, $estatus, $fecha){
        	$this->id_reporte = $id_reporte;
        	$this->id_comentario = $id_comentario;
        	$this->id_reportado = $id_reportado;
        	$this->id_reportero = $id_reportero;
        	$this->razon = $razon;
            $this->estatus = $estatus;
        	$this->fecha = $fecha;
        }
	}
?>