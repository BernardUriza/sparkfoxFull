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
	MOSTRAR TOTAL PROYECTOS
	=============================================*/
	static public function ctrMostrarTotalProyectos($item){
		$tabla = "proyectos";
		$respuesta = ModeloProyectos::mdlMostrarTotalProyectos($tabla, $item);
		return $respuesta;
	}
	/*=============================================
	CREAR PROYECTOS
	=============================================*/
	static public function ctrCrearProyecto(){
		if(isset($_POST["tituloProyecto"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloProyecto"])){
					$datos = array("proyecto"=>($_POST["tituloProyecto"]),
								   "estado"=> 1,
								   "titulo"=>$_POST["tituloProyecto"]);
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
					$datos = array("id"=>$_POST["editarIdProyecto"],
								   "proyecto"=>($_POST["editarTituloProyecto"]),
								   "estado"=> 1);
				$respuesta = ModeloProyectos::mdlEditarProyecto("proyectos", $datos);
				ModeloArchivos::mdlLimpiezaArchivos();
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
			$respuesta = ModeloProyectos::mdlEliminarProyecto("proyectos", $_POST["idProyecto"]);
			if($respuesta == "ok"){
				return '<script>
				ProyectoBorradaCorrectamente('.$_POST["idProyecto"].');
				</script>';
			}		
		}
	}
}