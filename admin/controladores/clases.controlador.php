<?php
class ControladorClases{
	/*=============================================
	MOSTRAR CLASES
	=============================================*/
	static public function ctrMostrarClases($item, $valor){
		$tabla = "clases";
		$respuesta = ModeloClases::mdlMostrarClases($tabla, $item, $valor);
		return $respuesta;
	}
	/*=============================================
	CREAR CLASES
	=============================================*/
	static public function ctrCrearClase(){
		if(isset($_POST["tituloClase"])){
				$datos = array("clase"=>strtoupper($_POST["tituloClase"]),
							   "estado"=> 1);
				$respuesta = ModeloClases::mdlIngresarClase("clases", $datos);
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "La clase ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							}
						})
					</script>';
				}

		}
	}
	/*=============================================
	EDITAR CLASES
	=============================================*/
	static public function ctrEditarClase(){
		if(isset($_POST["editarTituloClase"])){
				$datos = array("id"=>$_POST["editarIdClase"],
							   "clase"=>strtoupper($_POST["editarTituloClase"]),
							   "rutaImagen"=>($_POST["rutaPortada"]),
							   "idArchivoImagen"=>($_POST["idPortada"]),
							   "estado"=> 1);
				$respuesta = ModeloClases::mdlEditarClase("clases", $datos);
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "La clase ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "clases";
							}
						})
					</script>';
				}

		}
	}
	/*=============================================
	ELIMINAR CLASE
	=============================================*/
	static public function ctrEliminarClase(){
		if(isset($_GET["idClase"])){
			$respuesta = ModeloClases::mdlEliminarClase("clases", $_GET["idClase"]);
			if($respuesta == "ok"){
				echo'<script>
				swal({
					  type: "success",
					  title: "The compatibility has been deleted correctly",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){
								if (result.value) {
								window.location = "compatibilities";
								}
							})
				</script>';
			}		
		}
	}
}