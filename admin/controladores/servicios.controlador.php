<?php
class ControladorServicios{
	/*=============================================
	MOSTRAR SERVICIOS
	=============================================*/
	static public function ctrMostrarServicios($item, $valor){
		$tabla = "servicios";
		$respuesta = ModeloServicios::mdlMostrarServicios($tabla, $item, $valor);
		return $respuesta;
	}
	/*=============================================
	EDITAR SERVICIOS
	=============================================*/
	static public function ctrEditarServicio(){
		if(isset($_POST["idServicio"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["titulo"])){
				$datos = array("id"=>$_POST["idServicio"],
							   "servicio"=>($_POST["titulo"]),
							   "descripcion"=> $_POST["descripcion"]);
				return ModeloServicios::mdlEditarServicio("servicios", $datos);
			}
		}
		return "no-ok";
	}
	/*=============================================
	ELIMINAR SERVICIO
	=============================================*/
	static public function ctrEliminarServicio(){
		if(isset($_GET["idServicio"])){
			$respuesta = ModeloServicios::mdlEliminarServicio("servicios", $_GET["idServicio"]);
			if($respuesta == "ok"){
				echo'<script>
				swal({
					  type: "success",
					  title: "La servicio ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {
								window.location = "servicios";
								}
							})
				</script>';
			}		
		}
	}
}