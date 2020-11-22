<?php
$visitas = ControladorVisitas::ctrMostrarTotalVisitas();
$proyectos = ControladorProductos::ctrMostrarTotalProductos("id");
$totalProyectos = count($proyectos);
?>
<!-- col -->
<div class="col-lg-6 col-xs-12">
  <!-- small box -->
  <div class="small-box bg-green">
    <!-- inner -->
    <div class="inner">
      <h3><?php echo number_format($visitas["total"]); ?></h3>
      <p>Visits</p>
    </div>
    <!-- inner -->
    <!-- icon -->
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <!-- icon -->
    <a href="visits" class="small-box-footer"> Info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
  <!-- small box -->
</div>
<!-- col -->
<div class="col-lg-6 col-xs-12">
  <!-- small box -->
  <div class="small-box bg-red">
    <!-- inner -->
    <div class="inner">
      <h3><?php echo number_format($totalProyectos); ?></h3>
      <p>Products</p>
    </div>
    <!-- inner -->
    <!-- icon -->
    <div class="icon">
      <i class="ion ion-pie-graph"></i>
    </div>
    <!-- icon -->
    <a href="products" class="small-box-footer"> Info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
  <!-- small box -->
</div>
<!-- col -->