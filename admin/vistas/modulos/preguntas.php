<div class="content-wrapper">
  <section class="content-header">
    <h1>
    Stores Manager
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Start</a></li>
      <li class="active">Stores Manager</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPregunta">
        Add Store
        </button>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablaPreguntas" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Title</th>
              <th>Link</th>
              <th>Country</th>
              <th>Image</th>
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
MODAL AGREGAR PREGUNTA
======================================-->
<div id="modalAgregarPregunta" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" onsubmit="return false" id="AgregarFORM_ID">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Store</h4>
        </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--=====================================
            ENTRADA DEL TITULO DE LA PREGUNTA
            ======================================-->
            <div class="form-group">
              <label>Entrer title</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
                <textarea type="text" class="form-control input-lg validarPregunta tituloPregunta" placeholder="Entrer title" name="tituloPregunta" required> </textarea>
              </div>
            </div>
            <div class="form-group">
              <label>Entrer link</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-exclamation-circle"></i></span>
                <textarea type="text" class="form-control input-lg respuestaPregunta" placeholder="Entrer link" name="respuestaPregunta" required> </textarea>
              </div>
            </div>
          </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Exit</button>
          <button type="submit" class="btn btn-primary guardarPregunta">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--=====================================
MODAL EDITAR PREGUNTA
======================================-->
<div id="modalEditarPregunta" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" onsubmit="return false" id="EditarFORM_ID">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit</h4>
        </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--=====================================
            ENTRADA DEL TITULO DE LA PREGUNTA
            ======================================-->
            <div class="form-group">
              <label>Enter title</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
                <textarea  type="text" class="form-control input-lg validarPregunta tituloPregunta" placeholder="Enter title" name="editarTituloPregunta" required> </textarea>
                <input type="hidden" class="editarIdPregunta" name="editarIdPregunta">
                <input type="hidden" class="editarIdCabecera" name="editarIdCabecera">
              </div>
            </div>
            <div class="form-group">
              <label>Enter link</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-exclamation-circle"></i></span>
                <textarea type="text" class="form-control input-lg respuestaPregunta" placeholder="Enter link" name="respuestaPregunta" required> </textarea>
              </div>
            </div>
            <!--=====================================
            AGREGAR GRUPO
            ======================================-->
            <div class="form-group entradaGrupo">
              <div class="panel">COUNTRY</div>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-globe" aria-hidden="true"></i></span>
                <select class="form-control input-md seleccionarCountry"  id="seleccionarCountry_EDIT" style="width: 100% !important; height: inherit !important;">
                  <?php
                  $paises = ControladorComercio::ctrSeleccionarPaises();
                  ?>
                  <?php
                  for ($IndexPaises=0; $IndexPaises < count($paises); $IndexPaises++) {    ?>
                  <option <?php echo in_array($paises[$IndexPaises]["id"],explode(",",$plantilla["paises"]))?"":"disabled style='display:none'" ;?>  value="<?php echo $paises[$IndexPaises]["id"] ?>"><?php echo $paises[$IndexPaises]["titulo"] ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="panel">Package Image</div>
              <input type="file" class="fotoPrincipal" accept="image/jpg, image/jpeg, image/png" >
              <input type="text" style="display: none" class="antiguaFotoPrincipal">
              <input type="text" style="display: none" class="rutaImagenPortada">
              <input type="text" style="display: none" class="idArchivoImagenPortada">
              <img src="vistas/img/productos/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="100%">
            </div>
          </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Exit</button>
          <button type="submit" class="btn btn-primary guardarCambiosPregunta">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>