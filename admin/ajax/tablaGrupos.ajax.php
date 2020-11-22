<?php

require_once "../controladores/grupos.controlador.php";
require_once "../modelos/grupos.modelo.php";

require_once "../controladores/cabeceras.controlador.php";
require_once "../modelos/cabeceras.modelo.php";

class TablaGrupos{

  /*=============================================
  MOSTRAR LA TABLA DE GRUPOS
  =============================================*/ 

 	public function mostrarTabla(){	

 	$item = null;
 	$valor = null;

 	$grupos = ControladorGrupos::ctrMostrarGrupos($item, $valor);	

 	$datosJson = '{
		 
		  "data": [ ';

	for($i = 0; $i < count($grupos); $i++){
	
			/*=============================================
			REVISAR ESTADO
			=============================================*/ 

			if( $grupos[$i]["estado"] == 0){
				
				$colorEstado = "btn-danger";
				$textoEstado = "Desactivado"; 
				$estadoGrupo = 1;

			}else{

				$colorEstado = "btn-success";
				$textoEstado = "Activado";
				$estadoGrupo = 0;

			}

		 	$estado = "<button class='btn ".$colorEstado." btn-xs btnActivar' estadoGrupo='".$estadoGrupo."' idGrupo='".$grupos[$i]["id"]."'>".$textoEstado."</button>";

		 	/*=============================================
			REVISAR IMAGEN PORTADA
			=============================================*/ 

			$item = "ruta";
			$valor = $grupos[$i]["ruta"];

			$cabeceras = ControladorCabeceras::ctrMostrarCabeceras($item, $valor);
 
			if($cabeceras["portada"] != "" && $cabeceras["portada"]!="vistas/img/cabeceras/default/default.jpg"){

				 $imgPortada = "<img class='img-thumbnail imgPortadaGrupos' src='".$cabeceras["portada"]."?".rand(1000, 1500)."' width='100px'>"; 

			}else{

				$imgPortada = "<img class='img-thumbnail imgPortadaGrupos' src='vistas/img/cabeceras/default/default.jpg' width='100px'>";
			}

			/*=============================================
			REVISAR OFERTAS
			=============================================*/

			if($grupos[$i]["oferta"] != 0){

				if($grupos[$i]["precioOferta"] != 0){

					$tipoOferta = "PRECIO";
					$valorOferta = "$ ".number_format($grupos[$i]["precioOferta"],2);

				}else{

					$tipoOferta = "DESCUENTO";
					$valorOferta = $grupos[$i]["descuentoOferta"]." %";

				}


			}else{

				$tipoOferta = "No tiene oferta";
				$valorOferta = 0;

			}

			if($grupos[$i]["imgOferta"] != ""){

				 $imgOfertas = "<img class='img-thumbnail imgOfertaGrupos' src='".$grupos[$i]["imgOferta"]."?".rand(1000, 1500)."' width='100px'>";

			}else{

				$imgOfertas = "<img class='img-thumbnail imgOfertaGrupos' src='vistas/img/ofertas/default/default.jpg?".rand(1000, 1500)."' width='100px'>";

			}

			/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/
	    
		    $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarGrupo' idGrupo='".$grupos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarGrupo'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarGrupo' idGrupo='".$grupos[$i]["id"]."' imgPortada='".$cabeceras["portada"]."'  rutaCabecera='".$grupos[$i]["ruta"]."' imgOferta='".$grupos[$i]["imgOferta"]."'><i class='fa fa-times'></i></button></div>";
				    
			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$grupos[$i]["grupo"].'",
				      "'.$grupos[$i]["ruta"].'",
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
ACTIVAR TABLA DE GRUPOS
=============================================*/ 
$activar = new TablaGrupos();
$activar -> mostrarTabla();