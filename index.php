<?php
function GetFormatCatalog($value)
{   
	$valor = ucwords(strtolower($value));
	$valor = str_replace("Pc", "PC", $valor);
	$valor = str_replace("Vr", "VR", $valor);
	$valor = str_replace("Playstation", "PlayStation", $valor);
	return $valor;
}

								function roundUpToAny($n,$x=5) {
								    return (ceil($n)%$x === 0) ? ceil($n) : round(($n+$x/2)/$x)*$x;
								}
function parse_csv ($csv_string, $delimiter = ",", $skip_empty_lines = true, $trim_fields = true)
{
    $enc = preg_replace('/(?<!")""/', '!!Q!!', $csv_string);
    $enc = preg_replace_callback(
        '/"(.*?)"/s',
        function ($field) {
            return urlencode(utf8_encode($field[1]));
        },
        $enc
    );
    $lines = preg_split($skip_empty_lines ? ($trim_fields ? '/( *\R)+/s' : '/\R+/s') : '/\R/s', $enc);
    return array_map(
        function ($line) use ($delimiter, $trim_fields) {
            $fields = $trim_fields ? array_map('trim', explode($delimiter, $line)) : explode($delimiter, $line);
            return array_map(
                function ($field) {
                    return str_replace('!!Q!!', '"', utf8_decode(urldecode($field)));
                },
                $fields
            );
        },
        $lines
    );
}

function Iniciar()
{
	require_once "controladores/plantilla.controlador.php";
	require_once "controladores/blogs.controlador.php";
	require_once "controladores/slider.controlador.php";
	require_once "controladores/visitas.controlador.php";
	require_once "controladores/servicios.controlador.php";
	require_once "controladores/productos.controlador.php";
	require_once "controladores/categorias.controlador.php";
	require_once "controladores/clases.controlador.php";
	require_once "controladores/preguntas.controlador.php";
	require_once "modelos/productos.modelo.php";
	require_once "modelos/preguntas.modelo.php";
	require_once "modelos/plantilla.modelo.php";
	require_once "modelos/visitas.modelo.php";
	require_once "modelos/clases.modelo.php";
	require_once "modelos/slider.modelo.php";
	require_once "modelos/servicios.modelo.php";
	require_once "modelos/blog.modelo.php";
	require_once "modelos/categorias.modelo.php";
	require_once "modelos/rutas.php";
	$Ruta = new Ruta();
	$Ruta -> ctrRuta();
	$plantilla = new ControladorPlantilla();
	$plantilla -> plantilla();
}
if(isset($_GET["ruta"])){
	if($_GET["ruta"]== "mail"){
		include "CorreoElectronico.php";
	}
	else{
		Iniciar();
	}
}else{
Iniciar();
}