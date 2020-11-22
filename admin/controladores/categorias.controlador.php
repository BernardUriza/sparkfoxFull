<?php
class ControladorCategorias{
	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/
	static public function ctrMostrarCategorias($item, $valor){
		$tabla = "categorias";
		$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);
		return $respuesta;
	}
	/*=============================================
	CREAR CATEGORIAS
	=============================================*/
	static public function ctrCrearCategoria(){
		if(isset($_POST["tituloCategoria"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloCategoria"])){
				$datos = array("categoria"=>strtoupper($_POST["tituloCategoria"]),
							   "estado"=> 1,
							   "titulo"=>$_POST["tituloCategoria"],
							   "serviciosTexto"=>$_POST["serviciosTexto"],
							   "productosTexto"=>$_POST["productosTexto"],
							   "rutaImagenPortada"=>$_POST["rutaImagenPortada"],
							   "idArchivoImagenPortada"=>$_POST["idArchivoImagenPortada"]);
				$respuesta = ModeloCategorias::mdlIngresarCategoria("categorias", $datos);
				ModeloArchivos::mdlLimpiezaArchivos();
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "The category has been saved correctly",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
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
						  title: "The category can not go empty or carry special characters!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {
							}
						})
			  	</script>';
			  	return;
			}
		}
	}

	static public function ctrCrearCategoriaAJAX(){
		$datos = array("categoria"=>strtoupper($_POST["crearCategoria"]),
					   "estado"=> 1,
					   "titulo"=>strtoupper($_POST["crearCategoria"]),
					   "serviciosTexto"=>'',
					   "productosTexto"=>'',
					   "rutaImagenPortada"=>'',
					   "idArchivoImagenPortada"=>-1);
		return ModeloCategorias::mdlIngresarCategoriaID("categorias", $datos);
	}
	/*=============================================
	EDITAR CATEGORIAS
	=============================================*/
	static public function ctrEditarCategoria(){
		if(isset($_POST["editarTituloCategoria"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTituloCategoria"])){
				$datos = array("id"=>$_POST["editarIdCategoria"],
							   "categoria"=>strtoupper($_POST["editarTituloCategoria"]),
							   "estado"=> 1,
							   "titulo"=>$_POST["editarTituloCategoria"],
							   "serviciosTexto"=>$_POST["serviciosTexto"],
							   "productosTexto"=>$_POST["productosTexto"],
							   "rutaImagenPortada"=>$_POST["rutaImagenPortada"],
							   "idArchivoImagenPortada"=>$_POST["idArchivoImagenPortada"],
							   "rutaImagenFondo"=>$_POST["rutaImagenFondo"],
							   "idArchivoImagenFondo"=>$_POST["idArchivoImagenFondo"]);
				$respuesta = ModeloCategorias::mdlEditarCategoria("categorias", $datos);
				ModeloArchivos::mdlLimpiezaArchivos();
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "The category has been edited correctly",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {
							window.location = "categorias";
							}
						})
					</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "The category can not go empty or carry special characters!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  })
			  	</script>';
			  	return;
			}
		}
	}
	/*=============================================
	ELIMINAR CATEGORIA
	=============================================*/
	static public function ctrEliminarCategoria(){
		if(isset($_GET["idCategoria"])){
			$respuesta = ModeloCategorias::mdlEliminarCategoria("categorias", $_GET["idCategoria"]);
			if($respuesta == "ok"){
				echo'<script>
				swal({
					  type: "success",
					  title: "The category has been deleted correctly",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){
								if (result.value) {
								window.location = "categories";
								}
							})
				</script>';
			}		
		}
	}
}