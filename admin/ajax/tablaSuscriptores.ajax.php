<?php

require_once "../controladores/suscriptores.controlador.php";
require_once "../modelos/suscriptores.modelo.php";

class TablaSuscriptores{

 	/*=============================================
  	MOSTRAR LA TABLA DE SUSCRIPTORE
  	=============================================*/ 

 	public function mostrarTabla(){

 		$suscriptores = ControladorSuscriptores::ctrMostrarSuscriptores();

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($suscriptores); $i++){

		/*=============================================
		DEVOLVER DATOS JSON
		=============================================*/

		$datosJson	 .= '[
			      "'.($i+1).'",
			      "'.$suscriptores[$i]["ip"].'",
			      "'.$suscriptores[$i]["pais"].'",
			      "'.$suscriptores[$i]["correo"].'",
			      "'.$suscriptores[$i]["fecha"].'"    
			    ],';

		}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
		  
		}'; 

		echo $datosJson;

 	}


}

/*=============================================
ACTIVAR TABLA DE SUSCRIPTORE
=============================================*/ 
$activar = new TablaSuscriptores();
$activar -> mostrarTabla();