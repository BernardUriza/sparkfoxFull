<?php
require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";
class TablaClientes{
  /*=============================================
  MOSTRAR LA TABLA DE CLIENTES
  =============================================*/ 
 	public function mostrarTabla(){	
 	$item = null;
 	$valor = null;
 	$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);	
 	$datosJson = '{
		  "data": [ ';
	for($i = 0; $i < count($clientes); $i++){
			/*=============================================
			REVISAR ESTADO
			=============================================*/ 
			if( $clientes[$i]["estado"] == 0){
				$colorEstado = "btn-danger";
				$textoEstado = "Desactivado"; 
				$estadoCliente = 1;
			}else{
				$colorEstado = "btn-success";
				$textoEstado = "Activado";
				$estadoCliente = 0;
			}
		 	$estado = "<button class='btn ".$colorEstado." btn-xs btnActivar' estadoCliente='".$estadoCliente."' idCliente='".$clientes[$i]["id"]."'>".$textoEstado."</button>";
		 	/*=============================================
  			TRAER IMAGEN PRINCIPAL
  			=============================================*/

  			$imagenPrincipal = $clientes[$i]["rutaImagenPortada"]==""?"":"<img src='".str_replace('admin/', '', $clientes[$i]["rutaImagenPortada"]) ."?".rand(1, 1)."' class='img-thumbnail imgTablaPrincipal' width='100px'>";

			/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/
		    $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCliente' idCliente='".$clientes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCliente'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCliente' idCliente='".$clientes[$i]["id"]."' imgPortada='".$cabeceras["portada"]."'  rutaCabecera='".$clientes[$i]["ruta"]."' imgOferta='".$clientes[$i]["imgOferta"]."'><i class='fa fa-times'></i></button></div>";
			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$clientes[$i]["cliente"].'",
				      '.json_encode("<div style='display: block;
    max-height: 180px !important;
    overflow: hidden;'>".$clientes[$i]["servicioConsorcio"]."</div>").',
				      "'. $imagenPrincipal.'",
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
ACTIVAR TABLA DE CLIENTES
=============================================*/ 
$activar = new TablaClientes();
$activar -> mostrarTabla();