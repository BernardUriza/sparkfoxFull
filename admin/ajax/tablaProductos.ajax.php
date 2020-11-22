<?php
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";
require_once "../../modelos/rutas.php";
class TablaProductos{
  /*=============================================
  MOSTRAR LA TABLA DE PRODUCTOS
  =============================================*/ 
  public function mostrarTablaProductos(){  
    $item = null;
    $valor = null; 
    $productos = ControladorProductos::ctrMostrarProductos($item, $valor);
    $datosJson = '{"data":[';
    for($i = 0; $i < count($productos); $i++){
      /*=============================================
        TRAER LAS CATEGORÍAS
        =============================================*/
      $item = "id";
      $valor = $productos[$i]["id_categorias_productos_nombres"];
      $videosA = explode(",",$productos[$i]["id_videos"]);
      $videos='<div class='."'flex-container'".'>';
      for ($indexVideo=0; $indexVideo < count($videosA); $indexVideo++) { 
        if($videosA[$indexVideo]!="")
        $videos=$videos."<iframe style='margin: 15px' width='350' height='250' src='//www.youtube.com/embed/".$videosA[$indexVideo]."?autoplay=0&showinfo=0&controls=0'></iframe>";
      }
    $videos=$videos.'</div>';
      if(!isset($valor)){
        $categoria = "EMPTY CATEGORY";
      }else{
        $categoria = $valor;
      }
     /*=============================================
        TRAER LAS CLASES
        =============================================*/
      $item = "id";
      $valor = $productos[$i]["id_clases_productos_nombres"];
      if(!isset($valor)){
        $clase = "EMPTY COMPATIBILITY";
      }else{
        $clase = $valor;
      }
      /*=============================================
        TRAER LAS GRUPOS
        =============================================*/
      $item = "id";
      $valor = $productos[$i]["grupo_nombre"];
      if(!isset($valor)){
        $grupo = "EMPTY GROUP";
      }else{
        $grupo = $valor;
      }
      /*=============================================
        AGREGAR ETIQUETAS DE ESTADO
        =============================================*/
        if($productos[$i]["estado"] == 0){
          $colorEstado = "btn-danger";
          $textoEstado = "Disable";
          $estadoProducto = 1;
        }else{
          $colorEstado = "btn-success";
          $textoEstado = "Enable";
          $estadoProducto = 0;
        }
        $estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' idProducto='".$productos[$i]["id"]."' estadoProducto='".$estadoProducto."'>".$textoEstado."</button>";
        $linkFichaTecnica = $productos[$i]["IdArchivoFicha"]>0?"<button class='btn btn-xs btnLinkFichaTecnica btn-info' IdArchivoFicha='".$productos[$i]["IdArchivoFicha"]."' RutaFicha='".Ruta::ctrRuta().$productos[$i]["RutaFicha"]."'>Open data sheet</button>":"";
      /*=============================================
        TRAER IMAGEN PRINCIPAL
        =============================================*/
        $imagenPrincipal = $productos[$i]["rutaImagenPortada"]==""?"":"<img src='".str_replace('admin/', '', $productos[$i]["rutaImagenPortada"]) ."?".rand(1, 1)."' class='img-thumbnail imgTablaPrincipal' width='100px'>";
        $imagenHeader = $productos[$i]["rutaArchivoImagenHeader"]==""?"":"<img src='".str_replace('admin/', '', $productos[$i]["rutaArchivoImagenHeader"]) ."?".rand(1, 1)."' class='img-thumbnail imgTablaPrincipal' width='100px'>";
        $imagenCover = $productos[$i]["rutaImagenPaquete"]==""?"":"<img src='".str_replace('admin/', '', $productos[$i]["rutaImagenPaquete"]) ."?".rand(1, 1)."' class='img-thumbnail imgTablaPrincipal' width='100px'>";
        /*=============================================
      TRAER MULTIMEDIA
        =============================================*/
      $vistaMultimedia = $productos[$i]["rutas_multimedia"]==""?/*"<img src='vistas/img/multimedia/default/default.jpg?".rand(1000, 1500)."' class='img-thumbnail imgTablaMultimedia' width='100px'>"*/'':"<img src='". str_replace('admin/', '', explode(",",$productos[$i]["rutas_multimedia"]))[0] ."?".rand(1, 1)."' class='img-thumbnail imgTablaMultimedia' width='100px'>";
      $vistaEjemplos = $productos[$i]["rutas_ejemplos"]==""?/*"<img src='vistas/img/multimedia/default/default.jpg?".rand(1000, 1500)."' class='img-thumbnail imgTablaMultimedia' width='100px'>"*/'':"<img src='". str_replace('admin/', '', explode(",",$productos[$i]["rutas_ejemplos"]))[0] ."?".rand(1, 1)."' class='img-thumbnail imgTablaMultimedia' width='100px'>";
        /*=============================================
        TRAER DETALLES
        =============================================*/
        $detalles = json_decode($productos[$i]["detalles"],true);
        $Presentacion = json_encode($detalles["Presentacion"]);
        $vistaDetalles = "".str_replace(array("[","]",'"'), "", $Presentacion);
        /*=============================================
        TRAER PRECIO
        =============================================*/
        if($productos[$i]["precio"] == 0){
          $precio = "Gratis";
        }else{
          $precio = "$ ".number_format($productos[$i]["precio"],2);
        }
        /*=============================================
        TRAER LAS ACCIONES
        =============================================*/
        $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]["id"]."' imgOferta=''  imgPortada='' imgPrincipal=''><i class='fa fa-times'></i></button></div>";
        /*=============================================
        CONSTRUIR LOS DATOS JSON
        =============================================*/
        $stores=str_replace("\n","<br><i class='fa fa-bullseye AsteriscoCaracteristica' aria-hidden='true'></i><b>",$productos[$i]["tiendas"]);
          $stores=str_replace("\", \"","\":</b> \"",$stores);
          $stores=str_replace("\",\"","\":</b> \"",$stores);
          $stores=str_replace("\"","",$stores);
        if($stores!="")
          $stores="<br><i class='fa fa-bullseye AsteriscoCaracteristica' aria-hidden='true'></i><b>".$stores;


        $reviews=str_replace("\n","<br><i class='fa fa-bullseye AsteriscoCaracteristica' aria-hidden='true'></i><b>",$productos[$i]["reviews"]);
          $reviews=str_replace("\", \"","\":</b> \"",$reviews);
          $reviews=str_replace("\",\"","\":</b> \"",$reviews);
          $reviews=str_replace("\"","",$reviews);
        if($reviews!="")
          $reviews="<br><i class='fa fa-bullseye AsteriscoCaracteristica' aria-hidden='true'></i><b>".$reviews;

        $caracteristicas_especiales=preg_replace( "/\r|\n/", '<br>', ($productos[$i]["caracteristicas_especiales"]));
        $caracteristicas_especiales=str_replace("<br>","<br><i class='fa fa-bullseye AsteriscoCaracteristica' aria-hidden='true'></i>", $caracteristicas_especiales); 
        if($caracteristicas_especiales!="")
          $caracteristicas_especiales="<br><i class='fa fa-bullseye AsteriscoCaracteristica' aria-hidden='true'></i>".$caracteristicas_especiales;

         $empaque=preg_replace( "/\r|\n/", '<br>', ($productos[$i]["empaque"]));
        $empaque=str_replace("<br>","<br><i class='fa fa-bullseye AsteriscoCaracteristica' aria-hidden='true'></i>", $empaque); 
        if($empaque!="")
          $empaque="<br><i class='fa fa-bullseye AsteriscoCaracteristica' aria-hidden='true'></i>".$empaque;

      $datosJson .='[
          "'.$productos[$i]["id"].'",
          "'.$productos[$i]["titulo"].'",
          '.json_encode($categoria).',
          '.json_encode($clase).',
          "'.preg_replace( "/\r|\n/", " ", $productos[$i]["codigo"]).'",
          "'.$imagenPrincipal.'",
          "'.$imagenHeader.'",
          "'.$imagenCover.'",
          "'.$vistaMultimedia.'",
          "'.$vistaEjemplos.'",
          "'.$linkFichaTecnica.'",
          '.json_encode('<div class="DescripcionesDeCaracteristicas">'.$caracteristicas_especiales.'</div>').', 
          '.json_encode('<div class="DescripcionesDeCaracteristicas">'.$empaque.'</div>').',  
          "<div class=\"DescripcionesDeProducto\">'.str_replace(array("\r\n", '"', "\r", "\n"), "<br>", ($productos[$i]["descripcion"])).'</div>",  
          "'.$stores.'",
          "'.$reviews.'",
          "'.$videos.'",
          "'.$estado.'",
          "'.$acciones.'"    
      ],';
    }
    $datosJson = substr($datosJson, 0, -1);
    $datosJson .= ']}';
    echo $datosJson=='{"data":]}'?'{  "data":[] }':($datosJson);
  }
}
/*=============================================
ACTIVAR TABLA DE PRODUCTOS
borrar archivos
UPDATE  `db7454_cmateriales`.`productos` SET  `RutaFicha` =  '' , `idArchivoFicha` =  '-1', `rutaImagenPortada` =  '',`idArchivoImagenPortada` =  '-1'
               <th style="width:10px">#</th>
               <th>Titulo</th>
               <th>Categorías</th>
               <th>Grupo</th>
               <th>Ruta</th>
               <th>Estado</th>
               <th>Código</th>
               <th>Imagen Principal</th>
               <th>Multimedia</th>
               <th>Detalles</th>
               <th>Precio</th>
               <th>Características Especiales</th>
               <th>Descripción</th>
               <th>Acciones</th>
=============================================*/ 
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();