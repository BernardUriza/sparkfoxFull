<?php
class ControladorVisitas{
	/*=============================================
	GUARDAR IP
	=============================================*/
	static public function ctrEnviarIp($ip, $pais, $region, $city, $codigo){
		$tabla = "visitaspersonas";
		$visita = 1;
		$respuestaInsertarIp = null;
		$respuestaActualizarIp = null;
		if($pais == ""){
			$pais = "Unknown";
		}
		date_default_timezone_set('America/Mexico_City');
		$fechaActual = date('Y-m-d');
		/*=============================================
		BUSCAR IP EXISTENTE
		=============================================*/
		$buscarIpExistente = ModeloVisitas::mdlSeleccionarIp($tabla, $ip);
		if(!$buscarIpExistente){
			/*=============================================
			GUARDAR IP NUEVA
			=============================================*/
			$respuestaInsertarIp = ModeloVisitas::mdlGuardarNuevaIp($tabla, $ip, $pais, $region, $city, $codigo, $visita,$fechaActual);
		}else{
			/*=============================================
			SI LA IP EXISTE Y ES OTRO DIA VOLVERLA A GUARDAR
			=============================================*/
			foreach ($buscarIpExistente as $key => $value) {
				if($key=="fecha")
				$compararFecha = substr($value["fecha"],0,10);
			}
			$city.="[$fechaActual] - [$compararFecha]";
			if($fechaActual != $compararFecha){
				$respuestaActualizarIp = ModeloVisitas::mdlGuardarNuevaIp($tabla, $ip, $pais, $region, $city, $codigo, $visita,$fechaActual);	
			}
			else{
				$respuestaActualizarIp = ModeloVisitas::mdlSumarVisitaNuevaIp($tabla, $ip, $visita, $city,$fechaActual);	
			}
		}
	}
	static public function file_get_contents_curl($url)
	{
		 $ch = curl_init();
    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
	}
}