<?php
require_once "conexion.php";
class ModeloComercio{
	/*=============================================
	SELECCIONAR PAISES 
	=============================================*/
	static public function mdlSeleccionarPaises(){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM paises");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
		/*=============================================
	SELECCIONAR PAISES 
	=============================================*/
	static public function mdlCambiarCampo(){
		$stmt = Conexion::conectar()->prepare("UPDATE plantilla SET ".$_POST["campo"]." = '".$_POST["dato"]."' WHERE id = 1");
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}

	static public function mdlCambiarDefaults(){
		$stmt = Conexion::conectar()->prepare("UPDATE plantilla SET mensajeHeader = '".$_POST["mensajeHeader"]."', rutaHeader = '".$_POST["rutaImagen"]."' WHERE id = 1");
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
		/*=============================================
	SELECCIONAR PLANTILLA
	=============================================*/
	static public function mdlSeleccionarPlantilla($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}
	/*=============================================
	ACTUALIZAR LOGO O ICONO
	=============================================*/
	static public function mdlActualizarLogoIcono($tabla, $id, $item, $valor){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item, randomSaver = :randomSaver WHERE id = :id");
		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		$stmt->bindParam(":randomSaver",rand(999, 999999), PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	ACTUALIZAR COLORES
	=============================================*/
	static public function mdlActualizarColores($tabla, $id, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET barraSuperior = :barraSuperior, textoSuperior = :textoSuperior, colorFondo = :colorFondo, colorTexto = :colorTexto  WHERE id = :id");
		$stmt->bindParam(":barraSuperior", $datos["barraSuperior"], PDO::PARAM_STR);
		$stmt->bindParam(":textoSuperior", $datos["textoSuperior"], PDO::PARAM_STR);
		$stmt->bindParam(":colorFondo", $datos["colorFondo"], PDO::PARAM_STR);
		$stmt->bindParam(":colorTexto", $datos["colorTexto"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	ACTUALIZAR SCRIPT
	=============================================*/
	static public function mdlActualizarScript($tabla, $id, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET apiFacebook = :apiFacebook, pixelFacebook = :pixelFacebook, googleAnalytics = :googleAnalytics WHERE id = :id");
		$stmt->bindParam(":apiFacebook", $datos["apiFacebook"], PDO::PARAM_STR);
		$stmt->bindParam(":pixelFacebook", $datos["pixelFacebook"], PDO::PARAM_STR);
		$stmt->bindParam(":googleAnalytics", $datos["googleAnalytics"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	SELECCIONAR COMERCIO
	=============================================*/
	static public function mdlSeleccionarComercio($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}
	/*=============================================
	ACTUALIZAR INFORMACION
	=============================================*/
	static public function mdlActualizarInformacion($tabla, $id, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET impuesto = :impuesto,
		envioNacional = :envioNacional, envioInternacional = :envioInternacional, tasaMinimaNal = :tasaMinimaNal, tasaMinimaInt = :tasaMinimaInt, pais = :pais,
		modoPaypal = :modoPaypal, clienteIdPaypal = :clienteIdPaypal, llaveSecretaPaypal = :llaveSecretaPaypal, modoPayu = :modoPayu, merchantIdPayu = :merchantIdPayu, accountIdPayu = :accountIdPayu, apiKeyPayu = :apiKeyPayu WHERE id = :id");
		$stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
		$stmt->bindParam(":envioNacional", $datos["envioNacional"], PDO::PARAM_STR); 
		$stmt->bindParam(":envioInternacional", $datos["envioInternacional"], PDO::PARAM_STR); 
		$stmt->bindParam(":tasaMinimaNal", $datos["tasaMinimaNal"], PDO::PARAM_STR); 
		$stmt->bindParam(":tasaMinimaInt", $datos["tasaMinimaInt"], PDO::PARAM_STR); 
		$stmt->bindParam(":pais", $datos["seleccionarPais"], PDO::PARAM_STR);
		$stmt->bindParam(":modoPaypal", $datos["modoPaypal"], PDO::PARAM_STR); 
		$stmt->bindParam(":clienteIdPaypal", $datos["clienteIdPaypal"], PDO::PARAM_STR); 
		$stmt->bindParam(":llaveSecretaPaypal", $datos["llaveSecretaPaypal"], PDO::PARAM_STR);
		$stmt->bindParam(":modoPayu", $datos["modoPayu"], PDO::PARAM_STR); 
		$stmt->bindParam(":merchantIdPayu", $datos["merchantIdPayu"], PDO::PARAM_STR); 
		$stmt->bindParam(":accountIdPayu", $datos["accountIdPayu"], PDO::PARAM_STR); 
		$stmt->bindParam(":apiKeyPayu", $datos["apiKeyPayu"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	ACTUALIZAR INFORMACION
	=============================================*/
	static public function mdlActualizarPDF($tabla, $columna, $dato){
		$IDARCHIVO=explode(".", basename($dato))[0];
		$columna2=str_replace("ruta", "idArchivo", $columna);
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $columna = :dato");
		$stmt->bindParam(":dato", $dato, PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
}