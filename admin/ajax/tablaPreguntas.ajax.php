<?php
require_once "../controladores/preguntas.controlador.php";
require_once "../modelos/preguntas.modelo.php";
class TablaPreguntas{
  /*=============================================
  MOSTRAR LA TABLA DE PREGUNTAS
  =============================================*/ 
 	public function mostrarTabla(){	
 	$item = null;
 	$valor = null;
 	$preguntas = ControladorPreguntas::ctrMostrarPreguntas($item, $valor);	
 	$datosJson = '{
		  "data": [ ';
	for($i = 0; $i < count($preguntas); $i++){
		 $imagenPrincipal = $preguntas[$i]["rutaImagenPortada"]==""?"":"<img src='".str_replace('admin/', '', $preguntas[$i]["rutaImagenPortada"]) ."?".rand(1, 1)."' class='img-thumbnail imgTablaPrincipal' width='100px'>";
			/*=============================================
			REVISAR ESTADO
			=============================================*/ 
			if( $preguntas[$i]["estado"] == 0){
				$colorEstado = "btn-danger";
				$textoEstado = "Disabled"; 
				$estadoPregunta = 1;
			}else{
				$colorEstado = "btn-success";     
				$textoEstado = "Enable";
				$estadoPregunta = 0; 
			}
		 	$estado = "<button class='btn ".$colorEstado." btn-xs btnActivar' estadoPregunta='".$estadoPregunta."' idPregunta='".$preguntas[$i]["id"]."'>".$textoEstado."</button>";
			/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/
		    $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPregunta' idPregunta='".$preguntas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPregunta'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarPregunta' idPregunta='".$preguntas[$i]["id"]."'><i class='fa fa-times'></i></button></div>";
			$datosJson	 .= '[
				      "'.($i+1).'",
				      '.json_encode($preguntas[$i]["pregunta"]).',
				      '.json_encode('<a href="'.$preguntas[$i]["respuesta"].'" target="_blank">Ver</a>').',
				      '.json_encode($preguntas[$i]["pais"]).',
				     "'.$imagenPrincipal.'",
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
ACTIVAR TABLA DE PREGUNTAS
=============================================*/ 
$activar = new TablaPreguntas();
$activar -> mostrarTabla();