<?php

require_once "../../controladores/reportes.controlador.php";
require_once "../../modelos/reportes.modelo.php";

require_once "../../controladores/productos.controlador.php";
require_once "../../modelos/productos.modelo.php";

$reporte = new ControladorReportes();
$reporte -> ctrDescargarReporte();
