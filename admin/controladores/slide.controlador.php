<?php
class ControladorSlide{
	/*=============================================
	MOSTRAR SLIDE
	=============================================*/
	static public function ctrMostrarSlide(){
		$tabla = "slide";
		$respuesta = ModeloSlide::mdlMostrarSlide($tabla);
		return $respuesta;
	}
	/*=============================================
	CREAR SLIDE
	=============================================*/
	static public function ctrCrearSlide(){
		$tabla = "slide";
		$traerSlide = ModeloSlide::mdlMostrarSlide($tabla);
		foreach ($traerSlide as $key => $value) {
		}
		$orden = $value["orden"] + 1;
		$respuesta = ModeloSlide::mdlCrearSlide($tabla, $orden);
		return $respuesta;
	}
	/*=============================================
	ACTUALIZAR ORDEN SLIDE
	=============================================*/
	static public function ctrActualizarOrdenSlide($datos){
		$tabla = "slide";
		$respuesta = ModeloSlide::mdlActualizarOrdenSlide($tabla, $datos);
		return $respuesta;
	}
	/*=============================================
	ACTUALIZAR SLIDE
	=============================================*/
	static public function ctrActualizarSlide($datos){
		$tabla = "slide";
		$respuesta = ModeloSlide::mdlActualizarSlide($tabla,$datos);
		ModeloArchivos::mdlLimpiezaArchivos();
		return $respuesta;
	}
	/*=============================================
	ELIMINAR SLIDE
	=============================================*/
	public function ctrEliminarSlide(){
		if(isset($_GET["idSlide"])){
			$tabla = "slide";
			$id = $_GET["idSlide"];
			$respuesta = ModeloSlide::mdlEliminarSlide($tabla, $id);
			if($respuesta == "ok"){
				echo'<script>
				swal({
					  type: "success",
					  title: "El slide ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",		
					  }).then((result) => {
								if (result.value) {
								window.location = "slide";
								}
							})
				</script>';
			}		
		}
	}
}