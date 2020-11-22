<?php
class ControladorPlantilla{
	public function plantilla(){
		$plantilla = ControladorComercio::ctrSeleccionarPlantilla();
		include "vistas/plantilla.php";
	}
	public function write_log($cadena,$tipo)
	{
		$arch = fopen(realpath( '.' )."/logs/milog.txt", "a+"); 
		fwrite($arch, "[".date("Y-m-d H:i:s.u")." ".$_SERVER['REMOTE_ADDR']." ".
	                   $_SERVER['HTTP_X_FORWARDED_FOR']." - $tipo ] ".$cadena."\n");
		fclose($arch);
	}
}