<?php
require_once "../controladores/programas.controlador.php";
require_once "../modelos/programas.modelo.php";
class TablaProgramas{
  /*=============================================
  MOSTRAR LA TABLA DE PROGRAMAS
  =============================================*/ 
 	public function mostrarTabla(){	
 	$item = null;
 	$valor = null;
 	$programas = ControladorProgramas::ctrMostrarProgramas($item, $valor);	
 	$datosJson = '{
		  "data": [ ';
	for($i = 0; $i < count($programas); $i++){
			/*=============================================
			REVISAR ESTADO
			=============================================*/ 
			if( $programas[$i]["estado"] == 0){
				$colorEstado = "btn-danger";
				$textoEstado = "Disable"; 
				$estadoPrograma = 1;
			}else{
				$colorEstado = "btn-success";
				$textoEstado = "Enable";
				$estadoPrograma = 0;
			}
		 	$estado = "<button class='btn ".$colorEstado." btn-xs btnActivar' estadoPrograma='".$estadoPrograma."' idPrograma='".$programas[$i]["id"]."'>".$textoEstado."</button>";
		 	/*=============================================
  			TRAER IMAGEN PRINCIPAL
  			=============================================*/
  			$imagenPrincipal = $programas[$i]["rutaImagen"]==""?"":"<img src='".str_replace('admin/', '', $programas[$i]["rutaImagen"]) ."?".rand(1, 1)."' class='img-thumbnail imgTablaPrincipal' width='120px'>";
			/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/
		    $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarPrograma' idPrograma='".$programas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPrograma'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarPrograma' idPrograma='".$programas[$i]["id"]."' imgPortada='".$cabeceras["portada"]."'  rutaCabecera='".$programas[$i]["ruta"]."' imgOferta='".$programas[$i]["imgOferta"]."'><i class='fa fa-times'></i></button></div>";
			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$programas[$i]["titulo"].'",
				      "'. $imagenPrincipal.'",
				      "'.($programas[$i]["idYoutube"]==""?"":"<iframe width='320' height='145' src='//www.youtube.com/embed/".$programas[$i]["idYoutube"]."?autoplay=0&showinfo=0&controls=0'></iframe>").'",
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
ACTIVAR TABLA DE PROGRAMAS
=============================================*/ 
$activar = new TablaProgramas();
$activar -> mostrarTabla();