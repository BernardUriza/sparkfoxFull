<?php
if($_SESSION["perfil"] != "administrador"){
echo '<script>
  window.location = "inicio";
</script>';
return;
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Template Editor
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Start</a></li>
      <li class="active">Template Editor</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-6 col-xs-12">

      <?php
        include "comercio/documentos.php";
      ?>
      </div>
      <div class="col-md-6 col-xs-12">
      <?php
        include "comercio/redSocial.php";
      ?>
      </div>

      <div class="col-md-6 col-xs-12">

      <?php
        include "comercio/paises.php";
      ?>
      </div>
       <div class="col-md-6 col-xs-12">

      <?php
        include "comercio/defaultCatalogo.php";
      ?>
      </div>
      <div class="col-md-6 col-xs-12">      <?php
        /*=============================================
        ADMINISTRACIÓN DE LOGOTIPO E ICONO
        =============================================*/
        include "comercio/logotipo.php";
      ?>
      </div>
       <!--====     <div class="col-md-6">
      ================================
      BLOQUE 2
      ====================================
        <?php
       /*=====================================
        ADMINISTRAR CÓDIGOS
        ======================================*/
    /*   include "comercio/codigos.php";*/
        /*=====================================
        ADMINISTRAR COMERCIO
        ======================================*/
   /*     include "comercio/informacion.php";*/
        ?>
      </div>=======-->
    </div>
  </section>
</div>