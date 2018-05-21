<?php 
	Class PerfilesControlador extends DBConexion{
		public function __construct()
		{
		}
		public function Perfiles(){
			$id_usuario=$_GET['id'];
			$us = new UsuarioControlador();
			$u = $us->Usuario($id_usuario);
			if($u->tipo_usuario == 1){

				$art = new ArtistaControlador();
				$a = $art->ArtistaUsuario($id_usuario);
				$di = new DisenoControlador();
				$d = $di->Diseno($a->id_diseno);
				$tipo = "Perfil".$d->tipo_perfil;
				header("Location: Control.php?c=Perfiles&a=".$tipo."&id=$id_usuario");
				

			}else{
				header("Location: Control.php?c=Perfiles&a=PerfilInvitado&id=$id_usuario");
			}
		}
		public function Perfil1(){

		}
		public function Perfil2(){

		}
		public function Perfil3(){

		}

		public function PerfilInvitado(){

		}
	}
?>