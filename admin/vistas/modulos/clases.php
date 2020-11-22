<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Compatibility Manager
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Start</a></li>
      <li class="active">Compatibility Manager</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarClase">
            Add compatibility
          </button>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablaClases" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Compatibility</th>
              <th>Header Image</th>
              <th>State</th>
              <th>Actions</th>
            </tr>
          </thead>
        </table> 
      </div>
    </div>
  </section>
</div>
<!--=====================================
MODAL AGREGAR CLASE
======================================-->
<div id="modalAgregarClase" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add compatibility</h4>
        </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--=====================================
            ENTRADA DEL TITULO DE LA CLASE
            ======================================-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg validarClase tituloClase" placeholder="Enter compatibility" name="tituloClase" required> 
              </div> 
            </div>
            </div>
          </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Exit</button>
          <button type="submit" class="btn btn-primary">Exit compatibility</button>
        </div>
      </form>
      <?php
$crearClase = new ControladorClases();
$crearClase->ctrCrearClase();
?>
   </div>
  </div>
</div>
<!--=====================================
MODAL EDITAR CLASE
======================================-->
<div id="modalEditarClase" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar clase</h4>
        </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--=====================================
            ENTRADA DEL TITULO DE LA CLASE
            ======================================-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg validarClase tituloClase" placeholder="Enter compatibility" name="editarTituloClase" required> 
                <input type="hidden" class="editarIdClase" name="editarIdClase">
              </div> 
            </div>
            <div class="form-group">
              <div class="panel">Header Image</div>
              <input type="file" class="fotoPrincipal" accept="image/jpg, image/jpeg, image/png" >
              <input type="text" style="display: none" class="rutaImagenPortada" name="rutaPortada">
              <input type="text" style="display: none" class="idArchivoImagenPortada" name="idPortada">
              <img src="vistas/img/productos/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="100%">
            </div>
            </div>
          </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Exit</button>
          <button type="submit" class="btn btn-primary">Save compatibility</button>
        </div>
      </form>
      <?php
$editarClase = new ControladorClases();
$editarClase->ctrEditarClase();
?>
   </div>
  </div>
</div>
 <?php
$eliminarClase = new ControladorClases();
$eliminarClase->ctrEliminarClase();
?>