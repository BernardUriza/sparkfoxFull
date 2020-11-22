<?php
require_once "../controladores/servicios.controlador.php";
require_once "../modelos/servicios.modelo.php";
class TablaServicios{
  /*=============================================
  MOSTRAR LA TABLA DE SERVICIOS
  =============================================*/ 
 	public function mostrarTabla(){	
 	$item = null;
 	$valor = null;
 	$servicios = ControladorServicios::ctrMostrarServicios($item, $valor);	
 	$datosJson = '{
		  "data": [ ';
	for($i = 0; $i < count($servicios); $i++){
			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$servicios[$i]["titulo"].'",
				      "'. $servicios[$i]["descripcion"].'"	    
				    ],';
	}
	$datosJson = substr($datosJson, 0, -1);
	$datosJson.=  ']
	}'; 
	echo $datosJson;
 	}
}
/*=============================================
ACTIVAR TABLA DE SERVICIOS
=============================================*/ 
$activar = new TablaServicios();
$activar -> mostrarTabla();