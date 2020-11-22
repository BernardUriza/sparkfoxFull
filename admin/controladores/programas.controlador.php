<?php
class ControladorProgramas{
	/*=============================================
	MOSTRAR PROGRAMAS
	=============================================*/
	static public function ctrMostrarProgramas($item, $valor){
		$tabla = "videos";
		$respuesta = ModeloProgramas::mdlMostrarProgramas($tabla, $item, $valor);
		return $respuesta;
	}
	/*=============================================
	CREAR PROGRAMAS
	=============================================*/
	static public function ctrCrearPrograma(){
		if(isset($_POST["tituloPrograma"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloPrograma"])){
					$datos = array("estado"=> 1,
								   "titulo"=>$_POST["tituloPrograma"],
								   "rutaImagen"=>$_POST["rutaImagen"],
								   "tituloDescriptivo"=>$_POST["tituloDescriptivo"],
								   "descripcion"=>$_POST["descripcion"],
								   "listaProgramas"=>$_POST["listaProgramas"]);
				$respuesta = ModeloProgramas::mdlIngresarPrograma("programas", $datos);
				if($respuesta == "ok"){
					return '<script>ProgramaCreadaCorrectamente();</script>';
				}
			}
		}
		return '<script>ProgramaNOCreadaCorrectamente();</script>';
	}
	/*=============================================
	EDITAR PROGRAMAS
	=============================================*/
	static public function ctrEditarPrograma(){
		if(isset($_POST["editarTituloPrograma"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTituloPrograma"])){
					$datos = array("id"=>$_POST["editarIdPrograma"],
								   "titulo"=>($_POST["editarTituloPrograma"]),
								   "estado"=> 1,
								   "rutaImagen"=>$_POST["rutaImagen"],
								   "tituloDescriptivo"=>$_POST["tituloDescriptivo"],
								   "descripcion"=>$_POST["descripcion"],
								   "listaProgramas"=>$_POST["listaProgramas"]);
				$respuesta = ModeloProgramas::mdlEditarPrograma("programas", $datos);
				if($respuesta == "ok"){
					return '<script>ProgramaEditadaCorrectamente();</script>';
				}
			}else{
				return '<script>
					ProgramaNOEditadaCorrectamente();
			  	</script>';
			}
		}
	}
	/*=============================================
	ELIMINAR PROGRAMA
	=============================================*/
	static public function ctrEliminarPrograma(){
		if(isset($_POST["idPrograma"])){
			$respuesta = ModeloProgramas::mdlEliminarPrograma("programas", $_POST["idPrograma"]);
			if($respuesta == "ok"){
				return '<script>
				ProgramaBorradaCorrectamente('.$_POST["idPrograma"].');
				</script>';
			}		
		}
	}
}