<?php 
$ruta= Ruta::ctrRuta();
echo '<div style="display: none" id="rutaBlog">'; print_r($ruta); echo '</div>';
 ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
    Blog Manager
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Start</a></li>
      <li class="active">Blog Manager</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProyecto">
        Add page
        </button>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablaProyectos" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Title</th>
              <th>Cover</th>
              <th>Link</th>
              <th>Actions</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>
</div>
<!--=====================================
MODAL AGREGAR PROYECTO
======================================-->
<div id="modalAgregarProyecto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" onsubmit="return false" id="AgregarFORM_ID">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add page</h4>
        </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--=====================================
            ENTRADA DEL TITULO DE LA PROYECTO
            ======================================-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg validarProyecto tituloProyecto" placeholder="Enter title" name="tituloProyecto" required>
              </div>
            </div>
          </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Exit</button>
          <button type="submit" class="btn btn-primary guardarProyecto">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--=====================================
MODAL EDITAR PROYECTO
======================================-->
<div id="modalEditarProyecto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" onsubmit="return false" id="EditarFORM_ID">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit page</h4>
        </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--=====================================
            ENTRADA DEL TITULO DE LA PROYECTO
            ======================================-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg validarProyecto tituloProyecto" placeholder="Enter title" name="editarTituloProyecto" required>
                <input type="hidden" class="editarIdProyecto" name="editarIdProyecto">
              </div>
            </div>
            <div class="form-group">
              <div class="panel">Header Image</div>
              <input type="file" class="fotoPrincipal" accept="image/jpg, image/jpeg, image/png" >
              <input type="text" style="display: none" class="rutaImagenPortada">
              <input type="text" style="display: none" class="idArchivoImagenPortada">
              <img src="vistas/img/productos/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="100%">
            </div> <div id="wysihtml5-editor-toolbar">
            <header>
              <ul class="commands">
                <li data-wysihtml5-command="bold" title="Make text bold (CTRL + B)" class="command"></li>
                <li data-wysihtml5-command="italic" title="Make text italic (CTRL + I)" class="command"></li>
                <li data-wysihtml5-command="insertUnorderedList" title="Insert an unordered list" class="command" style="display: none;"></li>
                <li data-wysihtml5-command="insertOrderedList" title="Insert an ordered list" class="command" style="display: none;"></li>
                <li data-wysihtml5-command="createLink" title="Insert a link" class="command"></li>
                <li data-wysihtml5-command="insertImage" title="Insert an image" class="command"></li>
                <li data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1" title="Insert headline 1" class="command"></li>
                <li data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2" title="Insert headline 2" class="command" style="display: none;"></li>
                <li data-wysihtml5-command-group="foreColor" class="fore-color" title="Color the selected text" class="command" style="display: none;">
                  <ul>
                    <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="silver"></li>
                    <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="gray"></li>
                    <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="maroon"></li>
                    <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red"></li>
                    <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="purple"></li>
                    <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="green"></li>
                    <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="olive"></li>
                    <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="navy"></li>
                    <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="blue"></li>
                  </ul>
                </li>
                <li data-wysihtml5-command="insertSpeech" title="Insert speech" class="command"></li>
                <li data-wysihtml5-action="change_view" title="Show HTML" class="action"></li>
              </ul>
            </header>
            <div data-wysihtml5-dialog="createLink" style="display: none;">
              <label>
                Link:
                <input data-wysihtml5-dialog-field="href" value="http://">
              </label>
              <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
            </div>
            <div data-wysihtml5-dialog="insertImage" style="display: none;">
              <label>
                
                <input type="file" class="fotoBlog" accept="image/jpg, image/jpeg, image/png" >
                <input data-wysihtml5-dialog-field="src" value="http://" style="display: none;" id="recuperarLinkFoto">
              </label>
              <div data-wysihtml5-dialog-action="save"  id="servirClickLinkFoto" style="display: none;">OK</div>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
            </div>
          </div>
          
          <section>
            <textarea id="wysihtml5-editor" spellcheck="false" wrap="off" autofocus placeholder="Enter something ...">
            </textarea>
          </section>
        </div>
      </div>
      <!--=====================================
      PIE DEL MODAL
      ======================================-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Exit</button>
        <button type="submit" class="btn btn-primary guardarCambiosProyecto">Save</button>
      </div>
    </form>
  </div>
</div>
</div>
<!--=====================================
BLOQUEO DE LA TECLA ENTER
======================================-->
<script>
</script>