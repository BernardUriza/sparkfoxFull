<?php
class ControladorProyectos{
	/*=============================================
	MOSTRAR PROYECTOS
	=============================================*/
	static public function ctrMostrarProyectos($item, $valor){
		$tabla = "proyectos";
		$respuesta = ModeloProyectos::mdlMostrarProyectos($tabla, $item, $valor);
		return $respuesta;
	}
	/*=============================================
	CREAR PROYECTOS
	=============================================*/
	static public function ctrCrearProyecto(){
		if(isset($_POST["tituloProyecto"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloProyecto"])){
				/*=============================================
				VALIDAR IMAGEN PORTADA
				=============================================*/
				$rutaPortada = "vistas/img/cabeceras/default/default.jpg";
				$IngresandoImagenNueva=isset($_FILES["fotoPortada"]["tmp_name"]) && !empty($_FILES["fotoPortada"]["tmp_name"]);
				if($IngresandoImagenNueva){
					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/
					list($ancho, $alto) = getimagesize($_FILES["fotoPortada"]["tmp_name"]);
					$nuevoAncho = $ancho>1080?1080:$ancho;
					$nuevoAlto = $alto>1080?1080:$alto;
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/	
					if($_FILES["fotoPortada"]["type"] == "image/jpeg"){
						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
						$rutaPortada = "../vistas/img/cabeceras/".$_POST["rutaProyecto"].".jpg";
						$origen = imagecreatefromjpeg($_FILES["fotoPortada"]["tmp_name"]);	
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $rutaPortada);
					}
					if($_FILES["fotoPortada"]["type"] == "image/png"){
						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
						$rutaPortada = "../vistas/img/cabeceras/".$_POST["rutaProyecto"].".png";
						$origen = imagecreatefrompng($_FILES["fotoPortada"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagealphablending($destino, FALSE);
    					imagesavealpha($destino, TRUE);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $rutaPortada);
					}
				}
					$datos = array("proyecto"=>strtoupper($_POST["tituloProyecto"]),
								   "ruta"=>$_POST["rutaProyecto"],
								   "estado"=> 1,
								   "titulo"=>$_POST["tituloProyecto"],
								   "descripcion"=> $_POST["descripcionProyecto"],
								   "servicioConsorcio"=> $_POST["servicioProyecto"],
								   "palabrasClaves"=>$_POST["pClavesProyecto"],		   
								   "imgPortada"=>$IngresandoImagenNueva?substr($rutaPortada,3):$rutaPortada,
								   "oferta"=>0,
								   "precioOferta"=>0,
								   "descuentoOferta"=>0,
								   "imgOferta"=>"",								   
								   "finOferta"=>"");
				ModeloCabeceras::mdlIngresarCabecera("cabeceras", $datos);
				$respuesta = ModeloProyectos::mdlIngresarProyecto("proyectos", $datos);
				if($respuesta == "ok"){
					return '<script>ProyectoCreadaCorrectamente();</script>';
				}
			}
		}
		return '<script>ProyectoNOCreadaCorrectamente();</script>';
	}
	/*=============================================
	EDITAR PROYECTOS
	=============================================*/
	static public function ctrEditarProyecto(){
		if(isset($_POST["editarTituloProyecto"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTituloProyecto"])){
				/*=============================================
				VALIDAR IMAGEN PORTADA
				=============================================*/
				$rutaPortada = $_POST["antiguaFotoPortada"];
				$IngresandoImagenNueva=isset($_FILES["fotoPortada"]["tmp_name"]) && !empty($_FILES["fotoPortada"]["tmp_name"]);
				if($IngresandoImagenNueva){
					/*=============================================
					BORRAMOS ANTIGUA FOTO PORTADA
					=============================================*/
					if(is_file("../".$_POST["antiguaFotoPortada"]) && !is_dir("../".$_POST["antiguaFotoPortada"]) && ($_POST["antiguaFotoPortada"] != "vistas/img/cabeceras/default/default.jpg")){
						unlink("../".$_POST["antiguaFotoPortada"]);
					}
					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/
					list($ancho, $alto) = getimagesize($_FILES["fotoPortada"]["tmp_name"]);
					$nuevoAncho = $ancho>1080?1080:$ancho;
					$nuevoAlto = $alto>1080?1080:$alto;
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/	
					if($_FILES["fotoPortada"]["type"] == "image/jpeg"){
						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
						$rutaPortada = "../vistas/img/cabeceras/".$_POST["rutaProyecto"].".jpg";
						$origen = imagecreatefromjpeg($_FILES["fotoPortada"]["tmp_name"]);	
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $rutaPortada);
					}
					if($_FILES["fotoPortada"]["type"] == "image/png"){
						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
						$rutaPortada = "../vistas/img/cabeceras/".$_POST["rutaProyecto"].".png";
						$origen = imagecreatefrompng($_FILES["fotoPortada"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagealphablending($destino, FALSE);
    					imagesavealpha($destino, TRUE);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $rutaPortada);
					}
				}
					$datos = array("id"=>$_POST["editarIdProyecto"],
								   "proyecto"=>strtoupper($_POST["editarTituloProyecto"]),
								   "ruta"=>$_POST["rutaProyecto"],
								   "estado"=> 1,
								   "idCabecera"=>$_POST["editarIdCabecera"],
								   "titulo"=>$_POST["editarTituloProyecto"],
								   "descripcion"=> $_POST["descripcionProyecto"],
								   "servicioConsorcio"=> $_POST["servicioProyecto"],
								   "palabrasClaves"=>$_POST["pClavesProyecto"],
								   "imgPortada"=>$IngresandoImagenNueva?substr($rutaPortada,3):$rutaPortada,
								   "oferta"=>0,
								   "precioOferta"=>0,
								   "descuentoOferta"=>0,
								   "imgOferta"=>"",								   
								   "finOferta"=>"");
					if($_POST["antiguaFotoOferta"] != ""){
						unlink($_POST["antiguaFotoOferta"]);
					}
				if($datos["idCabecera"]=="")
					ModeloCabeceras::mdlIngresarCabecera("cabeceras", $datos);
				else
					ModeloCabeceras::mdlEditarCabecera("cabeceras", $datos);
				$respuesta = ModeloProyectos::mdlEditarProyecto("proyectos", $datos);
				if($respuesta == "ok"){
					return '<script>ProyectoEditadaCorrectamente();</script>';
				}
			}else{
				return '<script>
					ProyectoNOEditadaCorrectamente();
			  	</script>';
			}
		}
	}
	/*=============================================
	ELIMINAR PROYECTO
	=============================================*/
	static public function ctrEliminarProyecto(){
		if(isset($_POST["idProyecto"])){
			/*=============================================
			ELIMINAR IMAGEN OFERTA
			=============================================*/			
			if($_POST["imgOferta"] != ""){
				if(is_file("../".$_POST["imgOferta"]) && !is_dir("../".$_POST["imgOferta"])){
					unlink("../".$_POST["imgOferta"]);
				}		
			}
			/*=============================================
			ELIMINAR CABECERA
			=============================================*/
			if($_POST["imgPortada"] != "" && $_POST["imgPortada"] != "vistas/img/cabeceras/default/default.jpg"){
				if(is_file("../".$_POST["imgPortada"]) && !is_dir("../".$_POST["imgPortada"])){
					unlink("../".$_POST["imgPortada"]);
				}		
			}
			ModeloCabeceras::mdlEliminarCabecera("cabeceras", $_POST["rutaCabecera"]);
			$respuesta = ModeloProyectos::mdlEliminarProyecto("proyectos", $_POST["idProyecto"]);
			if($respuesta == "ok"){
				return '<script>
				ProyectoBorradaCorrectamente('.$_POST["idProyecto"].');
				</script>';
			}		
		}
	}
}