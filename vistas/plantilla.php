<?php
$ConteoRandom=42*100;
$RaNDOM= "TESTING"=="TESTING"?"?".rand($ConteoRandom, $ConteoRandom+100):"";
$RaNDOM_FORCED= "?".rand(30000, 30500);
$HayRuta=isset($_GET["ruta"])?$_GET["ruta"]!='#':false;
$Parametros=isset($_GET["ruta"])?explode('--',$_GET["ruta"]):["inicio"];
$RutaCortada=$Parametros[0];
if($HayRuta){
if($RutaCortada== "product") {
$RutaCortada= "producto";
}
if($RutaCortada== "en") {
header('Location: https://sparkfox.cn'); 
}
if($RutaCortada== "products") {
$RutaCortada= "catalogo";
}
if($RutaCortada== "contact") {
$RutaCortada= "contacto";
}
if($RutaCortada== "start") {
$RutaCortada= "inicio";
}
if($RutaCortada== "inicio" || $RutaCortada== "compliance"  || $RutaCortada== "whereToBuy" ||$RutaCortada== "catalogo" || $RutaCortada== "producto" || $RutaCortada== "carrito" || $RutaCortada== "contacto" || $RutaCortada== "blog"){
$RutaFinal=$RutaCortada;
}
else
{
$RutaFinal="404";
}
}
else
{
$RutaFinal="inicio";
}
$includeBueno = "/modulos/".$RutaFinal.".php";
$nombreProductoURLDECODE="Sparkfox ";
if($RutaFinal=="producto"){
  $nombreProductoURLDECODE=urldecode(str_replace("-","+",str_replace("/","",$Parametros[1]) ));
  $Producto = ControladorProductos::ctrMostrarProductos($nombreProductoURLDECODE)[0];  
  $Portada=$Producto['rutaImagenPortada']==""?"vistas/img/default.jpg":$Producto['rutaImagenPortada'];
}
else{
  $Portada="vistas/img/imgShare.jpg?8768567";
}
$scriptBueno= "<script src='vistas/js/gestor".ucfirst($RutaFinal).".js$RaNDOM'></script><script src='vistas/js/gestorPlantilla.js$RaNDOM'></script>";
$linkBueno='<link rel="stylesheet" href="vistas/css/'.$RutaFinal.'.css'.$RaNDOM.'"';
  //if($RutaFinal=="producto") $RutaFinal= "catalogo";
  /*=============================================
  CREADOR DE IP
  =============================================*/
  //https://www.browserling.com/tools/random-ip
  $ip = $_SERVER['REMOTE_ADDR'];
  //$ip = "177.249.210.223";
  //http://www.geoplugin.net/  189.178.116.229 152.206.0.0  23.206.48.0  23.217.195.25 38.65.128.1  64.117.143.255
  $informacionPais =  ControladorVisitas::file_get_contents_curl("http://www.geoplugin.net/json.gp?ip=".$ip);
  $datosPais = json_decode($informacionPais);
  $pais = !is_null($datosPais->geoplugin_countryName)?$datosPais->geoplugin_countryName:"local";
  $region = !is_null($datosPais->geoplugin_region)?$datosPais->geoplugin_region:"local";
  $city = !is_null($datosPais->geoplugin_city)?$datosPais->geoplugin_city:"local";
  $codigo = !is_null($datosPais->geoplugin_countryCode)?$datosPais->geoplugin_countryCode:"local";
//
  $enviarIp = ControladorVisitas::ctrEnviarIp($ip, $pais, $region, $city, $codigo);
  $plantilla = ControladorPlantilla::ctrEstiloPlantilla();

  $url = Ruta::ctrRuta();
  $servidor = $url.'admin/';
  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  ?>
  <!doctype html>
  <html class="no-js" lang="zxx">
    <head> 
      <meta charset="utf-8"> 
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title><?php echo $plantilla['titulo']; ?></title>
      <link rel="icon" href="<?php echo $url.'vistas/img/ico.png';?>?87687">
      <meta name="description" content="<?php echo $plantilla['metaDescripcion']; ?>">
      <meta name="keywords" content="E-commerce" />
      <!--=====================================
      Marcado de Open Graph FACEBOOK
      ======================================-->

      <meta property="og:title"   content="<?php echo $plantilla['metaTitulo'];?>">
      <meta property="og:url" content="<?php echo  $actual_link?>"> 
      <meta property="og:type"          content="website" />
  <meta property="og:description"   content="<?php  echo $nombreProductoURLDECODE." - ".$plantilla['metaDescripcion']; ?>" />
<meta property="og:image" content="<?php echo "http://sparkfox.cn/".$Portada; ?>" />
<meta property="og:image:secure_url" content="<?php echo "https://sparkfox.cn/".$Portada; ?>" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:image:width" content="400" />
<meta property="og:image:height" content="300" />
<meta property="og:image:alt" content="A shiny red apple with a bite taken out" />
      <!--=====================================
      Marcado para DATOS ESTRUCTURADOS GOOGLE
      ======================================-->
      <meta itemprop="name" content="<?php echo $plantilla['metaTitulo'];?>">
      <meta itemprop="url" content="<?php echo $url?>">
      <meta itemprop="description" content="<?php echo $plantilla['metaDescripcion'];?>">
      <meta itemprop="image" content="<?php echo $url.$plantilla['imgShare']."?".$plantilla['randomServer'];?>">
      <!--=====================================
      Marcado de TWITTER 
      ======================================-->

      <meta name="twitter:card" content="summary">
      <meta name="twitter:site" content="@flickr">
      <meta name="twitter:title" content="<?php echo $plantilla['metaTitulo'];?>">
      <meta name="twitter:description" content="<?php echo $plantilla['metaDescripcion'];?>">
      <meta name="twitter:image" content="<?php echo "http://sparkfox.cn/".$Portada; ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Bootstrap core CSS     -->
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
      <link href="vistas/assets/css/bootstrap.min.css" rel="stylesheet" />
      <link href="vistas/assets/css/paper-kit.css?<?php echo  $RaNDOM ?>" rel="stylesheet"/>
      <!--  CSS for Demo Purpose, don't include it in your project     -->
      <link href="vistas/assets/css/demo.css" rel="stylesheet" />
      <!--     Fonts and icons     -->
      <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
      <link href="vistas/assets/css/nucleo-icons.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
      <link href="vistas/css/plantilla.css<?php echo $RaNDOM ?>" rel="stylesheet" />
      <link href="vistas/css/animate.css" rel="stylesheet" />
      <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />
      <link rel="stylesheet" href="vistas/css/w3.css">
      <?php echo $linkBueno; ?>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-127582332-1"></script>
      <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-127582332-1');
      </script>
      <link rel="stylesheet" href="https://unpkg.com/modal-video@2.0.1/css/modal-video.min.css">
      <script src="https://unpkg.com/modal-video@2.0.1/js/modal-video.min.js"></script>
      <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body  data-spy="scroll" data-target=".navbar" data-offset="50">
      <div id="fb-root"></div>
<script async defer src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2"></script>
      <div id="google_translate_element" style="display: none;"></div>
      <input type="hidden" id="visita-plantilla-ip" value="<?php echo $ip; ?>">
      <input type="hidden" id="visita-plantilla-pais" value="<?php echo $pais; ?>">
      <input type="hidden" id="visita-plantilla-codigo" value="<?php echo $codigo; ?>">
      
      <?php require_once __DIR__ . '/modulos/plantilla/header.php';  ?>
      <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
        <?php require_once __DIR__ . '/modulos/plantilla/lateral.php';  ?>
      </div>
      <div id="main">
        <?php require_once __DIR__ . $includeBueno;  ?>
      </div>
      <?php require_once __DIR__ . '/modulos/plantilla/footer.php';  ?>
      
      <script src="vistas/assets/js/jquery-3.2.1.js" type="text/javascript"></script>
      <script src="vistas/assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.selectbox/1.2.0/jquery.selectBox.js" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>
      <script src="vistas/assets/js/popper.js" type="text/javascript"></script>
      <script src="vistas/assets/js/bootstrap.min.js" type="text/javascript"></script>
      <script src="vistas/assets/js/bootstrap-switch.min.js"></script>
      <script src="vistas/assets/js/nouislider.js"></script>
      <script src="vistas/assets/js/moment.min.js"></script>
      <script src="vistas/assets/js/bootstrap-datetimepicker.min.js"></script>
      <script src="vistas/assets/js/paper-kit.js?v=2.1.0"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.4/dist/sweetalert2.all.min.js" integrity="sha256-qtyU+b249rw/5PQ1KXGRtxjlgg6hfU2EK50YOlc0n50=" crossorigin="anonymous"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
      <?php echo $scriptBueno;  ?>
      <script type="text/javascript">
      function googleTranslateElementInit() {
      if(localStorage.getItem("lang")!=""){
      var elemento=new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
      console.log("elemento", elemento);}
      }
      </script>
      <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
      <script>
      function w3_open() {
      document.getElementById("mySidebar").style.width = "100%";
      document.getElementById("mySidebar").style.display = "block";
      document.getElementById("iconoPequeMobile").style.display = "none";
      document.getElementById("navbarOcultar").style.display = "none";
      document.getElementById("openNav").style.display = 'none';
      document.body.style.margin = "0";
      document.body.style.height = "100%";
      document.body.style.overflow = "hidden";
      
      document.getElementById("trasladarAbierto").innerHTML=document.getElementById("trasladarCerrado").innerHTML;
      document.getElementById("trasladarCerrado").innerHTML="";
setTimeout(function() {
      document.getElementById("main").style.transform = "translateX(100%)";
      RefrescarBusqueda();
      },1000);
      }
      function w3_close() {
      document.getElementById("main").style.transform = "translateX(0%)";
      document.getElementById("mySidebar").style.display = "none";
      document.getElementById("iconoPequeMobile").style.display = "block";
      document.getElementById("navbarOcultar").style.display = "flex";
      document.getElementById("openNav").style.display = "inline-block";
      document.body.style.margin = "inherit";
      document.body.style.height = "inherit";
      document.body.style.overflow = "inherit";
      document.getElementById("trasladarCerrado").innerHTML=document.getElementById("trasladarAbierto").innerHTML;
      document.getElementById("trasladarAbierto").innerHTML="";
      }
      </script>
      <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139992544-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-139992544-1');
</script>   
    </body>
  </html>