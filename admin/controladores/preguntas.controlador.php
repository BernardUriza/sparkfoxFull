<?php
class ControladorPreguntas{
	/*=============================================
	MOSTRAR PREGUNTAS
	=============================================*/
	static public function ctrMostrarPreguntas($item, $valor){
		$tabla = "preguntas";
		$respuesta = ModeloPreguntas::mdlMostrarPreguntas($tabla, $item, $valor);
		return $respuesta;
	}
	/*=============================================
	CREAR PREGUNTAS
	=============================================*/
	static public function ctrCrearPregunta(){
		if(isset($_POST["tituloPregunta"]) && isset($_POST["respuestaPregunta"])){
			if($_POST["tituloPregunta"] !="" && $_POST["respuestaPregunta"]!="" &&
				!ctype_space($_POST["tituloPregunta"]) && !ctype_space($_POST["respuestaPregunta"])
		){
				$datos = array("pregunta"=>($_POST["tituloPregunta"]),"respuesta"=>($_POST["respuestaPregunta"]),
								   "estado"=> 1);
				$respuesta = ModeloPreguntas::mdlIngresarPregunta("preguntas", $datos);
				if($respuesta == "ok"){
					return '<script>PreguntaCreadaCorrectamente();</script>';
				}
			}
		}
		return '<script>PreguntaNOCreadaCorrectamente();</script>';
	}
	/*=============================================
	EDITAR PREGUNTAS
	=============================================*/
	static public function ctrEditarPregunta(){
		if(isset($_POST["editarTituloPregunta"]) && isset($_POST["respuestaPregunta"])){
			if($_POST["editarTituloPregunta"]!="" && $_POST["respuestaPregunta"]!="" &&
				!ctype_space($_POST["editarTituloPregunta"]) && !ctype_space($_POST["respuestaPregunta"])){
				$datos = array("id"=>$_POST["editarIdPregunta"],"seleccionarCountry"=>$_POST["seleccionarCountry"],
								   "pregunta"=>($_POST["editarTituloPregunta"]),"respuesta"=>($_POST["respuestaPregunta"]),
								   "estado"=> 1);
				$respuesta = ModeloPreguntas::mdlEditarPregunta("preguntas", $datos);
				//ModeloArchivos::mdlLimpiezaArchivos();
				if($respuesta == "ok"){
					return '<script>PreguntaEditadaCorrectamente();</script>';
				}
			}
		}
		return '<script>PreguntaNOEditadaCorrectamente();</script>';
	}
	/*=============================================
	ELIMINAR PREGUNTA
	=============================================*/
	static public function ctrEliminarPregunta(){
		if(isset($_POST["idPregunta"])){
			$respuesta = ModeloPreguntas::mdlEliminarPregunta("preguntas", $_POST["idPregunta"]);
			if($respuesta == "ok"){
				return '<script>
				PreguntaBorradaCorrectamente('.$_POST["idPregunta"].');
				</script>';
			}		
		}
	}
}