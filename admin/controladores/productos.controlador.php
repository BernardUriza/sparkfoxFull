<?php
class ControladorProductos{
	/*=============================================
	MOSTRAR TOTAL PRODUCTOS
	=============================================*/
	static public function ctrMostrarTotalProductos($orden){
		$tabla = "productos";
		$respuesta = ModeloProductos::mdlMostrarTotalProductos($tabla, $orden);
		return $respuesta;
	}
	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	
	static public function verVideos(){
		$respuesta = ModeloProductos::verVideos();
		return $respuesta;
	}

	static public function ctrMostrarProductos($item, $valor){
		$tabla = "productos";
		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);
		return $respuesta;
	}
	/*=============================================
	CREAR PRODUCTOS
	=============================================*/
	static public function ctrCrearProducto($datos){
		if(isset($datos["tituloProducto"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["tituloProducto"])){
			$datosProducto = array(
				   "titulo"=>$datos["tituloProducto"],
				   "idCategoria"=>$datos["categoria"],
				   "idClase"=>$datos["clase"],
				   "idGrupo"=>$datos["grupo"],
				   "idMarca"=>$datos["marca"],
				   "codigo"=>$datos["codigo"],
				   "detalles"=>$datos["detalles"],
				   "multimedia"=>$datos["multimedia"],
				   "ruta"=>$datos["rutaProducto"],
				   "estado"=> 1,
				   "titular"=> substr($datos["descripcionProducto"], 0, 225)."...",
				   "descripcion"=> $datos["descripcionProducto"],
				   "caracteristicas_especiales"=> $datos["caracteristicasProducto"],
				   "palabrasClaves"=> $datos["pClavesProducto"],
				   "empaque"=> $datos["empaque"],
				   "precio"=> $datos["precio"],
				   "RutaFicha"=>$datos["RutaFicha"],
				   "IdArchivoFicha"=>$datos["IdArchivoFicha"],
				   "idArchivoImagenPortada"=>$datos["idArchivoImagenPortada"],
				   "rutaImagenPortada"=>$datos["rutaImagenPortada"],
				   "idArchivoImagenHeader"=>$datos["idArchivoImagenHeader"],
				   "rutaImagenHeader"=>$datos["rutaImagenHeader"]
			   );	
		//	echo '<pre>'; print_r($datosProducto); echo '</pre>';
				$respuesta = ModeloProductos::mdlIngresarProducto("productos", $datosProducto);
				if($respuesta>0)
					ModeloProductos::mdlIngresarMultimedia($respuesta, $datosProducto["multimedia"]);
				ModeloArchivos::mdlLimpiezaArchivos();
				return $respuesta>0?'<script>ProductoCreadaCorrectamente();</script>':'<script>ProductoNOCreadaCorrectamente();</script>';
			}
		}
		return '<script>ProductoNOCreadaCorrectamente();</script>';
	}
	/*=============================================
	EDITAR PRODUCTOS
	=============================================*/
	static public function ctrEditarProducto($datos){
		if(isset($datos["idProducto"])){
					$datosProducto = array(
						 		   "id"=>$datos["idProducto"],
								   "titulo"=>$datos["tituloProducto"],
								   "idCategoria"=>$datos["categoria"],
								   "idClase"=>$datos["clase"],
								   "idGrupo"=>$datos["grupo"],
								   "idMarca"=>$datos["marca"],
						   		   "codigo"=>$datos["codigo"],
								   "detalles"=>$datos["detalles"],
								   "multimedia"=>$datos["multimedia"],
								   "multimediaEjemplo"=>$datos["multimediaEjemplo"],
								   "empaque"=>$datos["empaque"],
								   "videos"=>$datos["videos"],
								   "reviews"=>$datos["reviews"],
								   "tiendas"=>$datos["tiendas"],
								   "ruta"=>$datos["rutaProducto"],
								   "estado"=> 1,
								   "titular"=> substr($datos["descripcionProducto"], 0, 225)."...",
								   "descripcion"=> $datos["descripcionProducto"],
								   "caracteristicas_especiales"=> $datos["caracteristicasProducto"],
								   "palabrasClaves"=> $datos["pClavesProducto"],
								   "RutaFicha"=>$datos["RutaFicha"],
								   "idArchivoImagenPortada"=>$datos["idArchivoImagenPortada"],
								   "rutaImagenPortada"=>$datos["rutaImagenPortada"],
								   "idArchivoImagenHeader"=>$datos["idArchivoImagenHeader"],
								   "rutaImagenHeader"=>$datos["rutaImagenHeader"],
								   "IdArchivoFicha"=>$datos["IdArchivoFicha"],
								   	"IDS_PRESENTACIONES"=>$_POST['IDS_PRESENTACIONES'],
									"NOMBRES_PRESENTACIONES"=>$_POST['NOMBRES_PRESENTACIONES'],
									"SKU_PRESENTACIONES"=>$_POST['SKU_PRESENTACIONES'],
									"COLORES_PRESENTACIONES"=>$_POST['COLORES_PRESENTACIONES']
								   );
				ModeloProductos::mdlIngresarMultimedia($datosProducto["id"], $datosProducto["multimedia"]);
				ModeloProductos::mdlIngresarMultimediaEjemplo($datosProducto["id"], $datosProducto["multimediaEjemplo"]);
				
				$respuesta = ModeloProductos::mdlEditarProducto("productos", $datosProducto);
				ModeloArchivos::mdlLimpiezaArchivos();
				return $respuesta=="ok"?'<script>ProductoEditadaCorrectamente();</script>':'<script>ProductoNOEditadaCorrectamente();</script>';
			}
		return '<script>ProductoNOEditadaCorrectamente();</script>';
	}
	/*=============================================
	ELIMINAR PRODUCTO
	=============================================*/

	static public function ctrEliminarProducto(){
		if(isset($_POST["idProducto"])){
			$datos = $_POST["idProducto"];
			/*=============================================
			ELIMINAR MULTIMEDIA
			=============================================*/
			if(is_dir("../vistas/img/multimedia/".$_POST["rutaCabecera"])){
				rmdir("../vistas/img/multimedia/".$_POST["rutaCabecera"]);
			}
			$respuesta = ModeloProductos::mdlEliminarProducto("productos", $datos);
			if($respuesta == "ok"){
				return '<script>
				ProductoBorradaCorrectamente()
				</script>';
			}	
		}
	}
}