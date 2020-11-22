<?php

require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";

require_once "../controladores/cabeceras.controlador.php";
require_once "../modelos/cabeceras.modelo.php";

class TablaMarcas{

  /*=============================================
  MOSTRAR LA TABLA DE MARCAS
  =============================================*/ 

 	public function mostrarTabla(){	

 	$item = null;
 	$valor = null;

 	$marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor);	

 	$datosJson = '{
		 
		  "data": [ ';

	for($i = 0; $i < count($marcas); $i++){
	
			/*=============================================
			REVISAR ESTADO
			=============================================*/ 

			if( $marcas[$i]["estado"] == 0){
				
				$colorEstado = "btn-danger";
				$textoEstado = "Desactivado"; 
				$estadoMarca = 1;

			}else{

				$colorEstado = "btn-success";
				$textoEstado = "Activado";
				$estadoMarca = 0;

			}

		 	$estado = "<button class='btn ".$colorEstado." btn-xs btnActivar' estadoMarca='".$estadoMarca."' idMarca='".$marcas[$i]["id"]."'>".$textoEstado."</button>";

		 	/*=============================================
			REVISAR IMAGEN PORTADA
			=============================================*/ 

			$item = "ruta";
			$valor = $marcas[$i]["ruta"];

			$cabeceras = ControladorCabeceras::ctrMostrarCabeceras($item, $valor);
 
			if($cabeceras["portada"] != "" && $cabeceras["portada"]!="vistas/img/cabeceras/default/default.jpg"){

				 $imgPortada = "<img class='img-thumbnail imgPortadaMarcas' src='".$cabeceras["portada"]."?".rand(1000, 1500)."' width='100px'>"; 

			}else{

				$imgPortada = "<img class='img-thumbnail imgPortadaMarcas' src='vistas/img/cabeceras/default/default.jpg' width='100px'>";
			}

			/*=============================================
			REVISAR OFERTAS
			=============================================*/

			if($marcas[$i]["oferta"] != 0){

				if($marcas[$i]["precioOferta"] != 0){

					$tipoOferta = "PRECIO";
					$valorOferta = "$ ".number_format($marcas[$i]["precioOferta"],2);

				}else{

					$tipoOferta = "DESCUENTO";
					$valorOferta = $marcas[$i]["descuentoOferta"]." %";

				}


			}else{

				$tipoOferta = "No tiene oferta";
				$valorOferta = 0;

			}

			if($marcas[$i]["imgOferta"] != ""){

				 $imgOfertas = "<img class='img-thumbnail imgOfertaMarcas' src='".$marcas[$i]["imgOferta"]."?".rand(1000, 1500)."' width='100px'>";

			}else{

				$imgOfertas = "<img class='img-thumbnail imgOfertaMarcas' src='vistas/img/ofertas/default/default.jpg?".rand(1000, 1500)."' width='100px'>";

			}

			/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/
	    
		    $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarMarca' idMarca='".$marcas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarMarca'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarMarca' idMarca='".$marcas[$i]["id"]."' imgPortada='".$cabeceras["portada"]."'  rutaCabecera='".$marcas[$i]["ruta"]."' imgOferta='".$marcas[$i]["imgOferta"]."'><i class='fa fa-times'></i></button></div>";
				    
			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$marcas[$i]["marca"].'",
				      "'.$marcas[$i]["ruta"].'",
				      "'.$imgPortada.'",
				      "'. $estado.'",
				      "'.$acciones.'"		    
				    ],';

	}

	$datosJson = substr($datosJson, 0, -1);

	$datosJson.=  ']
		  
	}'; 

	echo $datosJson;


 	}


}

/*=============================================
ACTIVAR TABLA DE MARCAS
=============================================*/ 
$activar = new TablaMarcas();
$activar -> mostrarTabla();