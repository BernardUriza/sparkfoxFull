<?php
class ControladorArchivos{
	/*=============================================
	CREAR ARCHIVOS ;
	=============================================*/
	static public function ctrGuardarArchivo($datos,$Nombre){

		$path = $Nombre;
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		$NumeroIrrepetible=ModeloArchivos::mdlGuardarArchivo("archivos", $Nombre,$ext);
		$directorio = "../vistas/img/archivos";
		if (!file_exists($directorio)){
				mkdir($directorio, 0755);
		}
		if($datos["type"] == "application/pdf" || $datos["type"] == "image/png" || $datos["type"] == "image/gif" || $datos["type"] == "image/jpeg"){
			/*=============================================
			GUARDAMOS LA IMAGEN EN EL DIRECTORIO
			=============================================*/
			$origen = $datos["tmp_name"];
			$destino = $directorio."/$NumeroIrrepetible.".$ext;
			move_uploaded_file($origen, $destino);
		}
		//var_dump($destino);
		$datos = array("Nombre"=>$Nombre);
		return 'admin/'.substr($destino,3);//
	}
}