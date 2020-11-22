<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Video Manager
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Start</a></li>
      <li class="active">Video Manager</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPrograma">
            Add Video
          </button>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablaProgramas" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Id</th>
              <th>Picture thumbnail</th>
              <th>Link</th>
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
MODAL AGREGAR PROGRAMA
======================================-->
<div id="modalAgregarPrograma" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
 <form method="post" enctype="multipart/form-data" onsubmit="return false" id="AgregarFORM_ID">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Video</h4>
        </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--=====================================
            ENTRADA DEL TITULO DE LA PROGRAMA
            ======================================-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg validarPrograma tituloPrograma" placeholder="Enter tittle" name="tituloPrograma" required> 
              </div> 
            </div>
           <!--=====================================
            ENTRADA PARA tituloDescriptivo
            ======================================-->
            <div class="form-group hidden">
              <div class="panel">Título Descriptivo <small>(opcional libre y alfanumérico)</small></div>
                <div class="input-group">              
                  <span class="input-group-addon"><i class="fa fa-barcode"></i></span> 
                  <input type="text" class="form-control input-md tituloDescriptivo" placeholder="ejem. Obras de Vivienda">
                </div>
            </div>           
            <!--=====================================
            AGREGAR DESCRIPCIÓN
            ======================================-->
            <div class="form-group hidden">
              <div class="panel">DESCRIPCIÓN DE LAS OBRAS </div>              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 
                <textarea type="text" rows="6" class="form-control input-md descripcion" placeholder="Ingresar descripción de las obras"></textarea>
              </div>
            </div>
           <!--=====================================
            AGREGAR LISTA DE OBRAS
            ======================================-->
            <div class="form-group hidden">              
              <div class="panel">LISTA DE OBRAS<small>(separar presionando enter)</small></div>
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span> 
                <textarea type="text" rows="6" class="form-control input-md listaProgramas descripcionProducto"   placeholder="Ingresar lista de programas"></textarea>
              </div>
            </div>
            <!--=====================================
            AGREGAR FOTO
            ======================================-->
            <div class="form-group hidden">
              <div class="panel">SUBIR FOTO PRINCIPAL DEL PRODUCTO</div>
              <input type="file" class="fotoPrincipal"  accept="image/jpg, image/jpeg, image/png" >
              <input type="text" style="display: none" class="rutaImagen">
              <input type="text" style="display: none" class="idArchivoImagen">
              <p class="help-block">Tamaño recomendado 400px * 450px <br> Tamaño máximo de la foto 1080px * 1080px</p>
              <img src="vistas/img/productos/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="100%">
            </div>
          </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Exit</button>
          <button type="submit" class="btn btn-primary guardarPrograma">Save</button>
        </div>
    </form>
    </div>
  </div>
</div>
<!--=====================================
MODAL EDITAR PROGRAMA
======================================-->
<div id="modalEditarPrograma" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
 <form method="post" enctype="multipart/form-data" onsubmit="return false" id="EditarFORM_ID">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Set Video</h4>
        </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--=====================================
            ENTRADA DEL TITULO DE LA PROGRAMA
            ======================================-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg validarPrograma tituloPrograma" placeholder="Enter title" name="editarTituloPrograma" required> 
                <input type="text" style="display: none" class="editarIdPrograma" name="editarIdPrograma">
              </div> 
            </div>
            <!--=====================================
            ENTRADA PARA tituloDescriptivo
            ======================================-->
            <div class="form-group">
              <div class="panel">Link Youtube </div>
                <div class="input-group">              
                  <span class="input-group-addon"><i class="fa fa-barcode"></i></span> 
                  <input type="text" class="form-control input-md tituloDescriptivo" placeholder="example. 9IZKcb3LndA">
                </div>
            </div>           
            <!--=====================================
            AGREGAR DESCRIPCIÓN
            ======================================-->
            <div class="form-group hidden">
              <div class="panel">DESCRIPCIÓN DE LAS OBRAS </div>              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 
                <textarea type="text" rows="6" class="form-control input-md descripcion" placeholder="Ingresar descripción de las obras"></textarea>
              </div>
            </div>
           <!--=====================================
            AGREGAR LISTA DE OBRAS
            ======================================-->
            <div class="form-group hidden">              
              <div class="panel">LISTA DE OBRAS<small>(separar presionando enter)</small></div>
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span> 
                <textarea type="text" rows="6" class="form-control input-md listaProgramas"   placeholder="Ingresar lista de programas"></textarea>
              </div>
            </div>
            <!--=====================================
            AGREGAR FOTO
            ======================================-->
            <div class="form-group">
              <div class="panel">UPLOAD THUMBNAIL</div>
              <input type="file" class="fotoPrincipal"  accept="image/jpg, image/jpeg, image/png" >
              <input type="text" style="display: none" class="rutaImagen">
              <input type="text" style="display: none" class="idArchivoImagen">
              <img src="vistas/img/productos/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="100%">
            </div>
          </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Exit</button>
          <button type="submit" class="btn btn-primary guardarCambiosPrograma">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>