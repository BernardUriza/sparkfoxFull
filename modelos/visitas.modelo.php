<?php
require_once "conexion.php";
class ModeloVisitas{
	static public function mdlSeleccionarIp($tabla, $ip){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ip = :ip ORDER BY fecha DESC");
		$stmt->bindParam(":ip", $ip, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
	}
	static public function mdlGuardarNuevaIp($tabla, $ip, $pais, $region, $city, $codigo, $visita, $fecha){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ip, pais, region, city, codigo, visitas, dia) VALUES (:ip, :pais, :region, :city, :codigo, :visitas, :fecha)");
		$stmt->bindParam(":ip", $ip, PDO::PARAM_STR);
		$stmt->bindParam(":pais", $pais, PDO::PARAM_STR);
		$stmt->bindParam(":region", $region, PDO::PARAM_STR);
		$stmt->bindParam(":city", $city, PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $codigo, PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
		$stmt->bindParam(":visitas", $visita, PDO::PARAM_INT);
		if($stmt->execute()){
				return "ok";
		}else{
				return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	static public function mdlSumarVisitaNuevaIp($tabla, $ip, $visita, $city, $fecha){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET city=:city, visitas = visitas + :visita WHERE ip = :ip AND dia = :fecha");
		$stmt->bindParam(":visita", $visita, PDO::PARAM_INT);
				$stmt->bindParam(":ip", $ip, PDO::PARAM_STR);
				$stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
				$stmt->bindParam(":city", $city, PDO::PARAM_STR);
		if($stmt->execute()){
				return "ok";
		}else{
				return "error";
		}
		$stmt->close();
		$stmt = null;
	}
}