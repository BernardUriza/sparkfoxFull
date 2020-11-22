<?php
class ControladorMarcas{

	/*=============================================
	MOSTRAR MARCAS
	=============================================*/

	static public function ctrMostrarMarcas($item, $valor, $DesdeProductos=null){

		$tabla = "marcas";

		$respuesta = ModeloMarcas::mdlMostrarMarcas($tabla, $item, $valor, $DesdeProductos);

		return $respuesta;

	}

	/*=============================================
	CREAR MARCAS
	=============================================*/

	static public function ctrCrearMarca(){

		if(isset($_POST["tituloMarca"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloMarca"])){

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

						$rutaPortada = "../vistas/img/cabeceras/".$_POST["rutaMarca"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoPortada"]["tmp_name"]);	

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaPortada);

					}

					if($_FILES["fotoPortada"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaPortada = "../vistas/img/cabeceras/".$_POST["rutaMarca"].".png";

						$origen = imagecreatefrompng($_FILES["fotoPortada"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaPortada);

					}


				}


					$datos = array("marca"=>strtoupper($_POST["tituloMarca"]),
								   "ruta"=>$_POST["rutaMarca"],
								   "estado"=> 1,
								   "titulo"=>$_POST["tituloMarca"],
								   "descripcion"=> $_POST["descripcionMarca"],
								   "palabrasClaves"=>$_POST["pClavesMarca"],		   
								   "imgPortada"=>$IngresandoImagenNueva?substr($rutaPortada,3):$rutaPortada,
								   "oferta"=>0,
								   "precioOferta"=>0,
								   "descuentoOferta"=>0,
								   "imgOferta"=>"",								   
								   "finOferta"=>"");

				ModeloCabeceras::mdlIngresarCabecera("cabeceras", $datos);

				$respuesta = ModeloMarcas::mdlIngresarMarca("marcas", $datos);

				if($respuesta == "ok"){
					return '<script>MarcaCreadaCorrectamente();</script>';
				}
			}
		}
		return '<script>MarcaNOCreadaCorrectamente();</script>';
	}

	static public function ctrCrearMarcaNueva($value,$DesdeProductos)
	{
		$datos = array("marca"=>strtoupper($value),
					   "ruta"=>strtoupper($value),
					   "estado"=> 1,	 
					   "oferta"=>0,
					   "CreadaDesdeProductos"=>$DesdeProductos,
					   "precioOferta"=>0,
					   "descuentoOferta"=>0,
					   "imgOferta"=>"",								   
					   "finOferta"=>"");
		return ModeloMarcas::mdlIngresarMarcaNueva($datos);
	}
	/*=============================================
	EDITAR MARCAS
	=============================================*/

	static public function ctrEditarMarca(){

		if(isset($_POST["editarTituloMarca"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTituloMarca"])){

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

						$rutaPortada = "../vistas/img/cabeceras/".$_POST["rutaMarca"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoPortada"]["tmp_name"]);	

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaPortada);

					}

					if($_FILES["fotoPortada"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaPortada = "../vistas/img/cabeceras/".$_POST["rutaMarca"].".png";

						$origen = imagecreatefrompng($_FILES["fotoPortada"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaPortada);

					}


				}


					$datos = array("id"=>$_POST["editarIdMarca"],
								   "marca"=>strtoupper($_POST["editarTituloMarca"]),
								   "ruta"=>$_POST["rutaMarca"],
								   "estado"=> 1,
								   "idCabecera"=>$_POST["editarIdCabecera"],
								   "titulo"=>$_POST["editarTituloMarca"],
								   "descripcion"=> $_POST["descripcionMarca"],
								   "palabrasClaves"=>$_POST["pClavesMarca"],
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

				$respuesta = ModeloMarcas::mdlEditarMarca("marcas", $datos);

				if($respuesta == "ok"){
					return '<script>MarcaEditadaCorrectamente();</script>';
				}
			}else{
				return '<script>
					MarcaNOEditadaCorrectamente();
			  	</script>';
			}

		}

	}

	/*=============================================
	ELIMINAR MARCA
	=============================================*/

	static public function ctrEliminarMarca(){

		if(isset($_POST["idMarca"])){


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

			$respuesta = ModeloMarcas::mdlEliminarMarca("marcas", $_POST["idMarca"]);

			if($respuesta == "ok"){

				return '<script>
				MarcaBorradaCorrectamente('.$_POST["idMarca"].');
				</script>';

			}		


		}

	}


}