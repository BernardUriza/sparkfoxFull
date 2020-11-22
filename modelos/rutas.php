<?php

class Ruta{
	static public function ctrRuta(){
		return  "https://$_SERVER[HTTP_HOST]".((strpos($_SERVER["SCRIPT_FILENAME"], 'devSparkfox') !== false)?"/devSparkfox/":"/");//"http://ar2design.com/devSparkfox/";
	}
}