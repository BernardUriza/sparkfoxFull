<?php

require_once "../controladores/visitas.controlador.php";
require_once "../modelos/visitas.modelo.php";

class TablaVisitas{

 	/*=============================================
  	MOSTRAR LA TABLA DE VISITAS
  	=============================================*/ 

 	public function mostrarTabla(){

 		$visitas = ControladorVisitas::ctrMostrarVisitas();

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($visitas); $i++){

		/*=============================================
		DEVOLVER DATOS JSON
		=============================================*/

		$datosJson	 .= '[
			      "'.($i+1).'",
			      "'.$visitas[$i]["ip"].'",
			      "'.$visitas[$i]["pais"].'",
			      "'.$visitas[$i]["region"].'",
			      "'.$visitas[$i]["city"].'",
			      "'.$visitas[$i]["visitas"].'",
			      "'.$visitas[$i]["fecha"].'"    
			    ],';

		}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
		  
		}'; 

		echo $datosJson;

 	}


}

/*=============================================
ACTIVAR TABLA DE VISITAS
=============================================*/ 
$activar = new TablaVisitas();
$activar -> mostrarTabla();