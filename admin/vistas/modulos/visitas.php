<div class="content-wrapper">
  <section class="content-header">
    <h1>
    Visits Manager
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Start</a></li>
      <li class="active">Visits Manager</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">  
      <div class="box-header with-border">
      <?php
        include "inicio/grafico-visitas.php";
      ?>
      </div>
      <div class="box-body">
        <div class="box-tools">
          <a href="vistas/modulos/reportes.php?reporte=visitaspersonas">
            <button class="btn btn-success" style="margin-top:5px">Excel report&emsp;<i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
          </a>
        </div> 
        <br>
        <table class="table table-bordered table-striped dt-responsive tablaVisitas" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>IP</th>
              <th>Country</th>
              <th>Region</th>
              <th>City</th>
              <th>Visits</th>
              <th>Day</th>
            </tr>
          </thead>
        </table> 
      </div>
    </div>
  </section>
</div>