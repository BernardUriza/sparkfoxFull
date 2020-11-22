<?php
class ControladorGrupos{

	/*=============================================
	MOSTRAR GRUPOS
	=============================================*/

	static public function ctrMostrarGrupos($item, $valor){

		$tabla = "grupos";

		$respuesta = ModeloGrupos::mdlMostrarGrupos($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	CREAR GRUPOS
	=============================================*/

	static public function ctrCrearGrupo(){

		if(isset($_POST["tituloGrupo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloGrupo"])){

				/*=============================================
				VALIDAR IMAGEN PORTADA
				=============================================*/

				$rutaPortada = "vistas/img/cabeceras/default/default.jpg";

				if(isset($_FILES["fotoPortada"]["tmp_name"]) && !empty($_FILES["fotoPortada"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoPortada"]["tmp_name"]);

					$nuevoAncho = 1280;
					$nuevoAlto = 720;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/	

					if($_FILES["fotoPortada"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaPortada = "vistas/img/cabeceras/".$_POST["rutaGrupo"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoPortada"]["tmp_name"]);	

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaPortada);

					}

					if($_FILES["fotoPortada"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaPortada = "vistas/img/cabeceras/".$_POST["rutaGrupo"].".png";

						$origen = imagecreatefrompng($_FILES["fotoPortada"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaPortada);

					}


				}

				/*=============================================
				VALIDAR IMAGEN OFERTA
				=============================================*/

				$rutaOferta = "";

				if(isset($_FILES["fotoOferta"]["tmp_name"]) && !empty($_FILES["fotoOferta"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoOferta"]["tmp_name"]);

					$nuevoAncho = 640;
					$nuevoAlto = 430;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/	

					if($_FILES["fotoOferta"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaOferta = "vistas/img/ofertas/".$_POST["rutaGrupo"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoOferta"]["tmp_name"]);	

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaOferta);

					}

					if($_FILES["fotoOferta"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaOferta = "vistas/img/ofertas/".$_POST["rutaGrupo"].".png";

						$origen = imagecreatefrompng($_FILES["fotoOferta"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaOferta);

					}


				}

				/*=============================================
				PREGUNTAMOS SI VIENE OFERTA EN CAMINO
				=============================================*/
				if($_POST["selActivarOferta"] == "oferta"){

					$datos = array("grupo"=>strtoupper($_POST["tituloGrupo"]),
								   "ruta"=>$_POST["rutaGrupo"],
								   "estado"=> 1,
								   "titulo"=>$_POST["tituloGrupo"],
								   "descripcion"=> $_POST["descripcionGrupo"],
								   "palabrasClaves"=>$_POST["pClavesGrupo"],
								   "imgPortada"=>$rutaPortada,
								   "oferta"=>1,
								   "precioOferta"=>$_POST["precioOferta"],
								   "descuentoOferta"=>$_POST["descuentoOferta"],
								   "imgOferta"=>$rutaOferta,								   
								   "finOferta"=>$_POST["finOferta"]);


				}else{

					$datos = array("grupo"=>strtoupper($_POST["tituloGrupo"]),
								   "ruta"=>$_POST["rutaGrupo"],
								   "estado"=> 1,
								   "titulo"=>$_POST["tituloGrupo"],
								   "descripcion"=> $_POST["descripcionGrupo"],
								   "palabrasClaves"=>$_POST["pClavesGrupo"],
								   "imgPortada"=>$rutaPortada,
								   "oferta"=>0,
								   "precioOferta"=>0,
								   "descuentoOferta"=>0,
								   "imgOferta"=>"",								   
								   "finOferta"=>"");


				}



				ModeloCabeceras::mdlIngresarCabecera("cabeceras", $datos);

				$respuesta = ModeloGrupos::mdlIngresarGrupo("grupos", $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El grupo ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {


							}
						})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El grupo no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {


							}
						})

			  	</script>';

			  	return;

			}

		}

	}
	/*=============================================
	CREAR GRUPOS
	=============================================*/

	static public function ctrCrearGrupoId($GRUPO){

					$datos = array("grupo"=>strtoupper($GRUPO),
								   "ruta"=>($GRUPO),
								   "estado"=> 1,
								   "titulo"=>$GRUPO,
								   "descripcion"=> $GRUPO,
								   "palabrasClaves"=>$GRUPO,
								   "imgPortada"=>"",
								   "oferta"=>0,
								   "precioOferta"=>0,
								   "descuentoOferta"=>0,
								   "imgOferta"=>"",								   
								   "finOferta"=>"");

				//ModeloCabeceras::mdlIngresarCabecera("cabeceras", $datos);

				return ModeloGrupos::mdlIngresarGrupo("grupos", $datos, true);


	}

	/*=============================================
	EDITAR GRUPOS
	=============================================*/

	static public function ctrEditarGrupo(){

		if(isset($_POST["editarTituloGrupo"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTituloGrupo"])){

				/*=============================================
				VALIDAR IMAGEN PORTADA
				=============================================*/

				$rutaPortada = $_POST["antiguaFotoPortada"];

				if(isset($_FILES["fotoPortada"]["tmp_name"]) && !empty($_FILES["fotoPortada"]["tmp_name"])){

					/*=============================================
					BORRAMOS ANTIGUA FOTO PORTADA
					=============================================*/

					unlink($_POST["antiguaFotoPortada"]);

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoPortada"]["tmp_name"]);

					$nuevoAncho = 1280;
					$nuevoAlto = 720;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/	

					if($_FILES["fotoPortada"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaPortada = "vistas/img/cabeceras/".$_POST["rutaGrupo"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoPortada"]["tmp_name"]);	

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaPortada);

					}

					if($_FILES["fotoPortada"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaPortada = "vistas/img/cabeceras/".$_POST["rutaGrupo"].".png";

						$origen = imagecreatefrompng($_FILES["fotoPortada"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaPortada);

					}


				}

				/*=============================================
				VALIDAR IMAGEN OFERTA
				=============================================*/

				$rutaOferta = $_POST["antiguaFotoOferta"];

				if(isset($_FILES["fotoOferta"]["tmp_name"]) && !empty($_FILES["fotoOferta"]["tmp_name"])){

					/*=============================================
					BORRAMOS ANTIGUA FOTO OFERTA
					=============================================*/

					unlink($_POST["antiguaFotoOferta"]);

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoOferta"]["tmp_name"]);

					$nuevoAncho = 640;
					$nuevoAlto = 430;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/	

					if($_FILES["fotoOferta"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaOferta = "vistas/img/ofertas/".$_POST["rutaGrupo"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoOferta"]["tmp_name"]);	

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaOferta);

					}

					if($_FILES["fotoOferta"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaOferta = "vistas/img/ofertas/".$_POST["rutaGrupo"].".png";

						$origen = imagecreatefrompng($_FILES["fotoOferta"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaOferta);

					}


				}

				/*=============================================
				PREGUNTAMOS SI VIENE OFERTA EN CAMINO
				=============================================*/
				if($_POST["selActivarOferta"] == "oferta"){

					$datos = array("id"=>$_POST["editarIdGrupo"],
								   "grupo"=>strtoupper($_POST["editarTituloGrupo"]),
								   "ruta"=>$_POST["rutaGrupo"],
								   "estado"=> 1,
								   "idCabecera"=>$_POST["editarIdCabecera"],
								   "titulo"=>$_POST["editarTituloGrupo"],
								   "descripcion"=> $_POST["descripcionGrupo"],
								   "palabrasClaves"=>$_POST["pClavesGrupo"],
								   "imgPortada"=>$rutaPortada,
								   "oferta"=>1,
								   "precioOferta"=>$_POST["precioOferta"],
								   "descuentoOferta"=>$_POST["descuentoOferta"],
								   "imgOferta"=>$rutaOferta,								   
								   "finOferta"=>$_POST["finOferta"]);					

				}else{

					$datos = array("id"=>$_POST["editarIdGrupo"],
								   "grupo"=>strtoupper($_POST["editarTituloGrupo"]),
								   "ruta"=>$_POST["rutaGrupo"],
								   "estado"=> 1,
								   "idCabecera"=>$_POST["editarIdCabecera"],
								   "titulo"=>$_POST["editarTituloGrupo"],
								   "descripcion"=> $_POST["descripcionGrupo"],
								   "palabrasClaves"=>$_POST["pClavesGrupo"],
								   "imgPortada"=>$rutaPortada,
								   "oferta"=>0,
								   "precioOferta"=>0,
								   "descuentoOferta"=>0,
								   "imgOferta"=>"",								   
								   "finOferta"=>"");

					if($_POST["antiguaFotoOferta"] != ""){

						unlink($_POST["antiguaFotoOferta"]);

					}

				}

				if($datos["idCabecera"]=="")
					ModeloCabeceras::mdlIngresarCabecera("cabeceras", $datos);
				else
					ModeloCabeceras::mdlEditarCabecera("cabeceras", $datos);

				$respuesta = ModeloGrupos::mdlEditarGrupo("grupos", $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El grupo ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "grupos";

							}
						})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El grupo grupo no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

			  	return;

			}

		}

	}

	/*=============================================
	ELIMINAR GRUPO
	=============================================*/

	static public function ctrEliminarGrupo(){

		if(isset($_GET["idGrupo"])){


			/*=============================================
			ELIMINAR IMAGEN OFERTA
			=============================================*/

			if($_GET["imgOferta"] != ""){

				unlink($_GET["imgOferta"]);		

			}

			/*=============================================
			ELIMINAR CABECERA
			=============================================*/

			if($_GET["imgPortada"] != "" && $_GET["imgPortada"] != "vistas/img/cabeceras/default/default.jpg"){

				unlink($_GET["imgPortada"]);		

			}

			ModeloCabeceras::mdlEliminarCabecera("cabeceras", $_GET["rutaCabecera"]);

			$respuesta = ModeloGrupos::mdlEliminarGrupo("grupos", $_GET["idGrupo"]);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El grupo ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "grupos";

								}
							})

				</script>';

			}		


		}

	}


}