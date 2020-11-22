<?php
require_once "../controladores/proyectos.controlador.php";
require_once "../modelos/proyectos.modelo.php";
class TablaProyectos{
  /*=============================================
  MOSTRAR LA TABLA DE PROYECTOS
  =============================================*/ 
 	public function mostrarTabla(){	
 	$item = null;
 	$valor = null;
 	$proyectos = ControladorProyectos::ctrMostrarProyectos($item, $valor);	
 	$datosJson = '{
		  "data": [ ';
	for($i = 0; $i < count($proyectos); $i++){
		 	/*=============================================
			REVISAR IMAGEN PORTADA
			=============================================*/ 
    $imagenPrincipal = $proyectos[$i]["rutaImagenPortada"]==""?"":"<img src='".str_replace('admin/', '', $proyectos[$i]["rutaImagenPortada"]) ."?".rand(1, 1)."' class='img-thumbnail imgTablaPrincipal' width='100px'>";
			
			/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/
		    $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarProyecto' idProyecto='".$proyectos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProyecto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProyecto' idProyecto='".$proyectos[$i]["id"]."' ><i class='fa fa-times'></i></button></div>";
			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$proyectos[$i]["titulo"].'",
				      "'. $imagenPrincipal.'",
				      '.json_encode("<a href='../blog--".str_replace("+","-",urlencode($proyectos[$i]["titulo"]))."' target='_blank'>Ver</a>").',
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
ACTIVAR TABLA DE PROYECTOS
=============================================*/ 
$activar = new TablaProyectos();
$activar -> mostrarTabla();