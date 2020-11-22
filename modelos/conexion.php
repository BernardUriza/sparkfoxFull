<?php
class Conexion{
	static public function conectar(){
	if(strpos($_SERVER["SCRIPT_FILENAME"], 'xampp') != ''){
		$link = new PDO("mysql:host=localhost;dbname=sparkfox",
						"root",
						"",
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);
	}
	else{
		$link = new PDO("mysql:host=mysql.ar2hosting.net;dbname=sparkfox19_db",
						"dashinewebs",
						"!Mta99xK",
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);
	}
		return $link;
	}
}