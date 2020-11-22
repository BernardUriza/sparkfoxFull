<?php
session_start();
$RaNDOM= "TESTING"=="TESTING"?"?".rand(900,1000):"";
$RaNDOM_FORCED= "?".rand(4000, 4500);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Control Panel | Sparkfox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Consorsio de materiales">
    <meta name="author" content="Consorsio">
    
    <meta property="og:title" content="<?php echo $comercio["tituloSitio"]; ?>" />
    
    <meta property="og:image"              content="<?php echo $comercio["urlSitio"].$plantilla["logo"]."?".$plantilla["randomSaver"]; ?>" />
    <meta property="og:url"                content="<?php echo $comercio["urlSitio"]; ?>" />
    <meta property="og:type"               content="article" />
    <meta property="og:description"        content="<?php echo $comercio["descripcionSitio"]; ?>" />
    <meta property="twitter:image"              content="<?php echo $comercio["urlSitio"].$plantilla["logo"]."?".$plantilla["randomSaver"]; ?>" />
    <meta property="twitter:url"                content="<?php echo $comercio["urlSitio"]; ?>" />
    <meta property="twitter:type"               content="article" />
    <meta property="twitter:title"              content="<?php echo $comercio["tituloSitio"]; ?>" />
    <meta property="twitter:description"        content="<?php echo $comercio["descripcionSitio"]; ?>" />
    <link rel="icon" href="vistas/img/plantilla/icono.png">
    
    <!--=====================================
    PLUGINS DE CSS
    ======================================-->
    <!-- Bootstrap 3.3.7 -->

    <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css<?php echo $RaNDOM; ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css<?php echo $RaNDOM; ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css<?php echo $RaNDOM; ?>">
    <link rel="stylesheet" href="vistas/dist/css/AdminLTE.min.css<?php echo $RaNDOM; ?>">
    
    <link rel="stylesheet" href="vistas/dist/css/skins/skin-blue.min.css<?php echo $RaNDOM; ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="vistas/plugins/iCheck/square/blue.css<?php echo $RaNDOM; ?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css<?php echo $RaNDOM; ?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="vistas/bower_components/jvectormap/jquery-jvectormap.css<?php echo $RaNDOM; ?>">
    <!-- Google Font -->
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      <!-- Bootstrap Color Picker -->
      <link rel="stylesheet" href="vistas/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css<?php echo $RaNDOM; ?>">
      <!-- bootstrap slider -->
      <link rel="stylesheet" href="vistas/plugins/bootstrap-slider/slider.css<?php echo $RaNDOM; ?>">
      <!-- DataTables -->
      <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css<?php echo $RaNDOM; ?>">
      <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css<?php echo $RaNDOM; ?>">
      <!-- bootstrap tags input -->
      <link rel="stylesheet" href="vistas/plugins/tags/bootstrap-tagsinput.css<?php echo $RaNDOM; ?>">
      <!-- bootstrap datepicker -->
      <link rel="stylesheet" href="vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css<?php echo $RaNDOM; ?>">
      <!-- Dropzone -->
      <link rel="stylesheet" href="vistas/plugins/dropzone/dropzone.css<?php echo $RaNDOM; ?>">
      <link rel="stylesheet" href="vistas/bower_components/select2/dist/css/select2.css<?php echo $RaNDOM; ?>"/>
      <!--=====================================
      CSS PERSONALIZADO
      ======================================-->
      <link rel="stylesheet" href="vistas/css/plantilla.css<?php echo $RaNDOM; ?>">
      <link rel="stylesheet" href="vistas/css/productos.css<?php echo $RaNDOM; ?>">
      <link rel="stylesheet" href="vistas/css/slide.css<?php echo $RaNDOM; ?>">
      <!--=====================================
      PLUGINS DE JAVASCRIPT
      ======================================-->
      <!-- jQuery 3 -->
      <script src="vistas/bower_components/jquery/dist/jquery.min.js<?php echo $RaNDOM; ?>"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="vistas/bower_components/jquery-ui/jquery-ui.min.js<?php echo $RaNDOM; ?>"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js<?php echo $RaNDOM; ?>"></script>
      <!-- AdminLTE App -->
      <script src="vistas/dist/js/adminlte.min.js<?php echo $RaNDOM; ?>"></script>
      <!-- iCheck http://icheck.fronteed.com/-->
      <script src="vistas/plugins/iCheck/icheck.min.js<?php echo $RaNDOM; ?>"></script>
      <!-- Morris.js charts -->
      <script src="vistas/bower_components/raphael/raphael.min.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/bower_components/morris.js/morris.min.js<?php echo $RaNDOM; ?>"></script>
      <!-- jQuery Knob Chart -->
      <script src="vistas/bower_components/jquery-knob/dist/jquery.knob.min.js<?php echo $RaNDOM; ?>"></script>
      <!-- jvectormap -->
      <script src="vistas/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/plugins/jvectormap/jquery-jvectormap-world-mill-en.js<?php echo $RaNDOM; ?>"></script>
      <!-- ChartJS -->
      <script src="vistas/bower_components/chart.js/Chart.js"></script>
      <!-- SweetAlert 2 https://sweetalert2.github.io/-->
      <script src="vistas/plugins/sweetalert2/sweetalert2.all.js<?php echo $RaNDOM; ?>"></script>
      <!-- bootstrap color picker https://farbelous.github.io/bootstrap-colorpicker/v2/-->
      <script src="vistas/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js<?php echo $RaNDOM; ?>"></script>
      <!-- Bootstrap slider http://seiyria.com/bootstrap-slider/-->
      <script src="vistas/plugins/bootstrap-slider/bootstrap-slider.js<?php echo $RaNDOM; ?>"></script>
      <!-- DataTables https://datatables.net/-->
      <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js<?php echo $RaNDOM; ?>"></script>
      <!-- bootstrap tags input https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/-->
      <script src="vistas/plugins/tags/bootstrap-tagsinput.min.js<?php echo $RaNDOM; ?>"></script>
      <!-- bootstrap datetimepicker http://bootstrap-datepicker.readthedocs.io-->
      <script src="vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js<?php echo $RaNDOM; ?>"></script>
      <!-- Dropzone http://www.dropzonejs.com/-->
      <script src="vistas/plugins/dropzone/dropzone.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/bower_components/select2/dist/js/select2.min.js<?php echo $RaNDOM; ?>"></script>
      <script src="//mozilla.github.io/pdf.js/build/pdf.js<?php echo $RaNDOM; ?>"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page loading" onload="AlCargar();">
      <div class="modal modalClienteEnEspera"><div class="progress BarraDeProgreso">
        <div class="progress-bar BarraDeProgresoValor" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:0%">
          0%
        </div>
      </div></div>
      <?php
      if(isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok"){
      echo '<div class="wrapper">';
        /*=============================================
        CABEZOTE
        =============================================*/
        include "modulos/cabezote.php";
        /*=============================================
        LATERAL
        =============================================*/
        include "modulos/lateral.php";
        /*=============================================
        CONTENIDO
        =============================================*/
        if($RutaCortada=="") $RutaCortada="inicio";

        $HayRuta=isset($_GET["ruta"])?$_GET["ruta"]!='#':false;
        $Parametros=isset($_GET["ruta"])?explode('--',$_GET["ruta"]):["inicio"];
        if($HayRuta){
        $RutaCortada=$Parametros[0];
        if($RutaCortada=="products") $RutaCortada="productos";
        if($RutaCortada=="categories") $RutaCortada="categorias";
        if($RutaCortada=="compatibilities") $RutaCortada="clases";
        if($RutaCortada=="profiles") $RutaCortada="perfiles";
        if($RutaCortada=="visits") $RutaCortada="visitas";
        if($RutaCortada=="start") $RutaCortada="inicio";
        if($RutaCortada=="blog") $RutaCortada="proyectos";
        if($RutaCortada=="stores") $RutaCortada="preguntas";
        if($RutaCortada=="template") $RutaCortada="comercio";
        if($RutaCortada=="videos") $RutaCortada="programas";
        if($RutaCortada=="subscribers") $RutaCortada="suscriptores";
        if($RutaCortada=="") $RutaCortada="inicio";
        if(
        $RutaCortada== "comercio" ||
        $RutaCortada== "slide" ||
        $RutaCortada== "categorias" ||
        $RutaCortada== "grupos" ||
        $RutaCortada== "abastecimiento" ||
        $RutaCortada== "cotizaciones" ||
        $RutaCortada== "proyectos" ||
        $RutaCortada== "preguntas" ||
        $RutaCortada== "marcas" ||
        $RutaCortada== "clases" ||
        $RutaCortada== "productos" ||
        $RutaCortada== "preguntas" ||
        $RutaCortada== "ventas" ||
        $RutaCortada== "programas" ||
        $RutaCortada== "visitas" ||
        $RutaCortada== "usuarios" ||
        $RutaCortada== "mensajes" ||
        $RutaCortada== "perfiles" ||
        $RutaCortada== "perfil" ||
        $RutaCortada== "suscriptores" ||
        $RutaCortada== "salir"){
        include "modulos/".$RutaCortada.".php";
        $scriptBueno= "<script src='vistas/js/gestor".ucfirst($RutaCortada).".js$RaNDOM;'></script>";
        $linkBueno= "<link rel='stylesheet' href='vistas/css/$RutaCortada.css$RaNDOM'>";
        }else{
        include "modulos/".$RutaCortada.".php";
        $scriptBueno= "<script src='vistas/js/gestor".ucfirst($RutaCortada).".js$RaNDOM;'></script>";
        $linkBueno= "<link rel='stylesheet' href='vistas/css/$RutaCortada.css$RaNDOM'>";
        }
        }else{
        include "modulos/".$RutaCortada.".php";
        $scriptBueno= "<script src='vistas/js/gestor".ucfirst($RutaCortada).".js$RaNDOM;'></script>";
        $linkBueno= "<link rel='stylesheet' href='vistas/css/$RutaCortada.css$RaNDOM'>";
        }
        /*=============================================
        FOOTER
        =============================================*/
        /*   include "modulos/footer.php";*/
      echo '</div>';
      }else{
      include "modulos/login.php";
      }
      
      ?>
      <!--=====================================
      JS PERSONALIZADO
      ======================================-->
      <?php echo isset($linkBueno)?$linkBueno:""; ?>
      <script src="vistas/js/plantilla.js<?php echo $RaNDOM; ?>"></script>
      <!--
      <script src="vistas/js/gestorComercio.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/js/gestorSlide.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/js/gestorCategorias.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/js/gestorGrupos.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/js/gestorMarcas.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/js/gestorProgramas.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/js/gestorClientes.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/js/gestorProyectos.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/js/gestorPreguntas.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/js/gestorSubCategorias.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/js/gestorProductos.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/js/gestorBanner.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/js/gestorVentas.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/js/gestorVisitas.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/js/gestorSuscriptores.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/js/gestorUsuarios.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/js/gestorAdministradores.js<?php echo $RaNDOM; ?>"></script>
      <script src="vistas/js/gestorNotificaciones.js<?php echo $RaNDOM; ?>"></script>-->

     <script src="../vistas/js/advanced1.js" ></script>
    <script src="../vistas/js/wysihtml5-0.3.0.js" ></script>
      <script src="vistas/js/gestorArchivos.js<?php echo $RaNDOM; ?>"></script>
      <?php echo isset($scriptBueno)?$scriptBueno:""; ?>
    </body>
  </html>