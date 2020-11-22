<?php
require_once "conexion.php";
class ModeloSuscriptores{
	/*=============================================
	MOSTRAR SUSCRIPTORES
	=============================================*/	
	static public function mdlCrearSuscriptor($tabla,$ip,$pais,$codigo,$correo){
		$BDBD=Conexion::conectar();
		$stmt = $BDBD->prepare("INSERT INTO $tabla(ip,pais,codigo,correo) VALUES (:ip,:pais,:codigo,:correo)");
		$stmt->bindParam(":ip", $ip, PDO::PARAM_STR);
		$stmt->bindParam(":pais", $pais, PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $codigo, PDO::PARAM_STR);
		$stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
		if($stmt->execute()){
				return $BDBD->lastInsertId();
		}else{
			return "error";
		
		}
		$stmt->close();
		$stmt = null;
	}
}