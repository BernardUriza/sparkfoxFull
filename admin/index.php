<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/administradores.controlador.php";
require_once "controladores/archivos.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/clases.controlador.php";
require_once "controladores/grupos.controlador.php";
require_once "controladores/marcas.controlador.php";
require_once "controladores/servicios.controlador.php";
require_once "controladores/comercio.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/slide.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/visitas.controlador.php";
require_once "controladores/notificaciones.controlador.php";
require_once "controladores/proyectos.controlador.php";
require_once "controladores/preguntas.controlador.php";
require_once "controladores/programas.controlador.php";

require_once "modelos/administradores.modelo.php";
require_once "modelos/archivos.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/grupos.modelo.php";
require_once "modelos/marcas.modelo.php";
require_once "modelos/clases.modelo.php";
require_once "modelos/servicios.modelo.php";
require_once "modelos/comercio.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/slide.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/visitas.modelo.php";
require_once "modelos/notificaciones.modelo.php";
require_once "modelos/proyectos.modelo.php";
require_once "modelos/preguntas.modelo.php";
require_once "modelos/programas.modelo.php";

require_once "modelos/rutas.php";

$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();