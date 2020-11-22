<?php
require_once "../controladores/clases.controlador.php";
require_once "../modelos/clases.modelo.php";
class TablaClases{
  /*=============================================
  MOSTRAR LA TABLA DE CLASES
  =============================================*/ 
 	public function mostrarTabla(){	
 	$item = null;
 	$valor = null;
 	$clases = ControladorClases::ctrMostrarClases($item, $valor);	
 	$datosJson = '{
		  "data": [ ';
	for($i = 0; $i < count($clases); $i++){
			/*=============================================
			REVISAR ESTADO
			=============================================*/ 
			if( $clases[$i]["estado"] == 0){
				$colorEstado = "btn-danger";
				$textoEstado = "Disable";
				$estadoClase = 1;
			}else{
				$colorEstado = "btn-success";
				$textoEstado = "Enable";
				$estadoClase = 0;
			}
        	$imagenHeader = $clases[$i]["rutaImagen"]==""?"":"<img src='".str_replace('admin/', '', $clases[$i]["rutaImagen"]) ."?".rand(1, 1)."' class='img-thumbnail imgTablaPrincipal' width='100px'>";
		 	$estado = "<button class='btn ".$colorEstado." btn-xs btnActivar' estadoClase='".$estadoClase."' idClase='".$clases[$i]["id"]."'>".$textoEstado."</button>";
			/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/
		    $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarClase' idClase='".$clases[$i]["id"]."' data-toggle='modal' data-target='#modalEditarClase'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarClase' idClase='".$clases[$i]["id"]."' imgPortada='".$cabeceras["portada"]."'  rutaCabecera='".$clases[$i]["ruta"]."' imgOferta='".$clases[$i]["imgOferta"]."'><i class='fa fa-times'></i></button></div>";
			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$clases[$i]["clase"].'",
				      "'. $imagenHeader.'",
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
ACTIVAR TABLA DE CLASES
=============================================*/ 
$activar = new TablaClases();
$activar -> mostrarTabla();