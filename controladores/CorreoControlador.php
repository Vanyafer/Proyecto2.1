<?php 
class Correo  {


	public function Correo($tipo,$id_usuario){
		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
		$hoy = $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;

		$titulos = array("Bienvenido","Descubre el reto de la semana","Reportes");
		$cuerpo = array("Bienvenido a la familia hivemind","¿Ya viste el reto de la semana? Te invitamos a que participes  <br> <a>Reto de la semana</a>","Has recibido un reporte, te invitamos a que lo revices y consideres tomar acciones sobre el asunto");
		$href = array("http://www.a-hivemind.com","http://www.a-hivemind.com/Control.php?c=Reto&a=Reto","http://www.a-hivemind.com/Control.php?c=Reportes&a=ReportesUsuarios");
		$etiqueta = array("Inicio","Reto de la semana","Revisar mis reportes");
		$us = new UsuarioControlador(); 
		$u = $us->Usuario($id_usuario);

		$para = $u->correo;
		$titulo = 		$titulos[$tipo];
 
		$mensaje = '<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
					<tr>
						<td align="center" bgcolor="#FFED0A" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif; ">
							<img src="hexagono.png" alt="Creating Email Magic" width="100"  style="display: inline-block;" /> <b style="display: inline-block; color: black;">Hivemind</b>
						</td>
						<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
										
						</td>
					</tr><tr>
							<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
								
								Hola <b>'.$u->nombre.'<b>,<br>
								'.$Cuerpo[$tipo].'
								<a href="'.$href.'" style=" border-radius: 5px; margin: 20px; background-color: #FFED0A; padding: 5px; color: black; text-decoration: none; font-family: Arial, sans-serif;" >'.$etiqueta.'</a>

							</td>
						</tr><tr>
						<td bgcolor="7F7606" style="padding: 30px 30px 30px 30px;">
							
									<p style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
										Equipo Hivemind,'.$hoy.' <br> 
										<a href="http://www.a-hivemind.com" style="color: #ffffff;">www.a-hivemind.com</a></p>
								
						</td>
					</tr>
				</table>';
					
	
		$cabeceras = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$cabeceras .= 'From: Hivemind';

		$enviado = mail($para, $titulo, $mensaje, $cabeceras);
 
	}

	public function Contra(){
		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
		$hoy = $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
		$correo = $_POST['Correo'];
		$us = new UsuarioControlador(); 
		$u = $us->Correo($correo);

		$para = $correo;
		$titulo = 	"Cambio de contraseña";
 
		$mensaje = '<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
					<tr>
						<td align="center" bgcolor="#FFED0A" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif; ">
							<img src="hexagono.png" alt="Creating Email Magic" width="100"  style="display: inline-block;" /> <b style="display: inline-block; color: black;">Hivemind</b>
						</td>
						<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
										
						</td>
					</tr><tr>
							<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
								
								Hola parece existir un problema con la cuenta del usuario <b>'.$u->nombre_usuario.'<b>,
								precione el siguiente boton para cambiar la contraseña<br>
								<a href="http://www.a-hivemind.com/usuario.php?c=Usuario&a=CambiarContrasena&id='.$u->id.'" style=" border-radius: 5px; margin: 20px; background-color: #FFED0A; padding: 5px; color: black; text-decoration: none; font-family: Arial, sans-serif;" >Cambiar Contraseña</a>

							</td>
						</tr><tr>
						<td bgcolor="7F7606" style="padding: 30px 30px 30px 30px;">
							
									<p style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
										Equipo Hivemind,'.$hoy.' <br> 
										<a href="http://www.a-hivemind.com" style="color: #ffffff;">www.a-hivemind.com</a></p>
								
						</td>
					</tr>
				</table>';
					
	
		$cabeceras = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$cabeceras .= 'From: Hivemind';

		$enviado = mail($para, $titulo, $mensaje, $cabeceras);
		if($enviado){
			echo "enviado";
		}
		else {
			echo "error";
		}
	}
}
?>