<?php
require_once "../controladores/cotizaciones.controlador.php";
require_once "../modelos/cotizaciones.modelo.php";
class TablaCotizaciones{
 	/*=============================================
  	MOSTRAR LA TABLA DE SUSCRIPTORE
  	=============================================*/ 
 	public function mostrarTabla(){
 		$suscriptores = ControladorCotizaciones::ctrMostrarCotizaciones();
 		$datosJson = '{
	 	"data": [ ';
	 	for($i = 0; $i < count($suscriptores); $i++){
		/*=============================================
		DEVOLVER DATOS JSON
		=============================================*/
		$acciones = json_encode("<div class='btn-group'><button class='btn btn-info btnVerProductos' idCotizacion='".$suscriptores[$i]["id"]."' idProductos='".$suscriptores[$i]["idProductos"]."' cantidades='".$suscriptores[$i]["cantidades"]."' nombres='".$suscriptores[$i]["nombres"]."' sku_colores='".$suscriptores[$i]["sku_colores"]."' sku_nombres='".$suscriptores[$i]["sku_nombres"]."'><i class='fa fa-eye'></i></button><button idCotizacion='".$suscriptores[$i]["id"]."' class='btn btn-danger btnEliminar'><i class='fa fa-times'></i></button></div>");
		$datosJson	 .= '[
			      "'.($i+1).'",
			      "'.$suscriptores[$i]["ip"].'",
			      "'.$suscriptores[$i]["pais"].'",
			      "'.$suscriptores[$i]["nombre"].'",
			      "'.$suscriptores[$i]["puesto"].'",
			      "'.$suscriptores[$i]["empresa"].'",
			      "'.$suscriptores[$i]["telefono"].'",
			      "'.$suscriptores[$i]["correo"].'",
			      "'.$suscriptores[$i]["fecha"].'",
			      "'.$suscriptores[$i]["modelos"].'",
			      "'.$suscriptores[$i]["articulos"].'",
			      '.$acciones.'    
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
$activar = new TablaCotizaciones();
$activar -> mostrarTabla();