<div class="content-wrapper">
  <section class="content-header">
    <h1>
    Categories manager
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Start</a></li>
      <li class="active">Categories manager</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
        Add Category
        </button>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablaCategorias" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Category</th>
              <th>State</th>
              <th>Image</th>
              <th>Background</th>
              <th>Accions</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>
</div>
<!--=====================================
MODAL AGREGAR CATEGORÍA
======================================-->
<div id="modalAgregarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add category</h4>
        </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--=====================================
            ENTRADA DEL TITULO DE LA CATEGORÍA
            ======================================-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg tituloCategoria" placeholder="Enter Category" name="tituloCategoria" required>
              </div>
            </div>
            <!--=====================================
            ENTRADA DEL SERVICIOS DE LA CATEGORÍA
            ======================================-->
            <div class="form-group" style="display: none">
              <label>Ingresar Servicios</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-exclamation-circle"></i></span>
                <textarea rows="5"  type="text" class="form-control input-lg serviciosTexto" placeholder="Ingresar
                Servicios" name="serviciosTexto" required> </textarea>
              </div>
            </div>
            <!--=====================================
            ENTRADA DE PRODUCTOS DE LA CATEGORÍA
            ======================================-->
            <div class="form-group" style="display: none">
              <label>Ingresar Texto de productos</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-eercast"></i></span>
                <textarea rows="5"  type="text" class="form-control input-lg productosTexto" placeholder="Ingresar
                Servicios" name="productosTexto" required> </textarea>
              </div>
            </div>
            <!--=====================================
            AGREGAR FOTO
            ======================================-->
            <div class="form-group">
              <div class="panel">MAIN ICON</div>
              <input type="file" class="fotoPrincipal"  accept="image/jpg, image/jpeg, image/png" >
              <input type="text" style="display: none" class="rutaImagenPortada" name="rutaImagenPortada">
              <input type="text" style="display: none" class="idArchivoImagenPortada" name="idArchivoImagenPortada">
              <img src="vistas/img/productos/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="100%">
            </div>
            <!--=====================================
            AGREGAR FOTO
            ======================================-->
            <div class="form-group">
              <div class="panel">BACKGROUND IMAGE</div>
              <input type="file" class="fotoFondo"  accept="image/jpg, image/jpeg, image/png" >
              <input type="text" style="display: none" class="rutaImagenFondo" name="rutaImagenFondo">
              <input type="text" style="display: none" class="idArchivoImagenFondo" name="idArchivoImagenFondo">
              <img src="vistas/img/productos/default/default.jpg" class="img-thumbnail previsualizarFondo" width="100%">
            </div>
          </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Exit</button>
          <button type="submit" class="btn btn-primary">Save category</button>
        </div>
      </form>
      <?php
      $crearCategoria = new ControladorCategorias();
      $crearCategoria -> ctrCrearCategoria();
      ?>
    </div>
  </div>
</div>
<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->
<div id="modalEditarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit category</h4>
        </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--=====================================
            ENTRADA DEL TITULO DE LA CATEGORÍA
            ======================================-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg tituloCategoria" placeholder="Ingresar Categoria" name="editarTituloCategoria" required>
                <input type="hidden" class="editarIdCategoria" name="editarIdCategoria">
              </div>
            </div>
            <!--=====================================
            ENTRADA DEL SERVICIOS DE LA CATEGORÍA
            ======================================-->
            <div class="form-group" style="display: none">
              <label>Ingresar Servicios</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-exclamation-circle"></i></span>
                <textarea rows="5"  type="text" class="form-control input-lg serviciosTexto" placeholder="Ingresar
                Servicios" name="serviciosTexto" required> </textarea>
              </div>
            </div>
            <!--=====================================
            ENTRADA DE PRODUCTOS DE LA CATEGORÍA
            ======================================-->
            <div class="form-group" style="display: none">
              <label>Ingresar Texto de productos</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-eercast"></i></span>
                <textarea rows="5"  type="text" class="form-control input-lg productosTexto" placeholder="Ingresar
                Servicios" name="productosTexto" required> </textarea>
              </div>
            </div>
            <!--=====================================
            AGREGAR FOTO
            ======================================-->
            <div class="form-group" >
              <div class="panel">MAIN CATEGORY PICTURE ICON</div>
              <input type="file" class="fotoPrincipal"  accept="image/jpg, image/jpeg, image/png" >
              <input type="text" style="display: none" class="rutaImagenPortada" name="rutaImagenPortada">
              <input type="text" style="display: none" class="idArchivoImagenPortada" name="idArchivoImagenPortada">
              <img src="vistas/img/productos/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="100%">
            </div>
            <!--=====================================
            AGREGAR FOTO
            ======================================-->
            <div class="form-group">
              <div class="panel">BACKGROUND IMAGE</div>
              <input type="file" class="fotoFondo"  accept="image/jpg, image/jpeg, image/png" >
              <input type="text" style="display: none" class="rutaImagenFondo" name="rutaImagenFondo">
              <input type="text" style="display: none" class="idArchivoImagenFondo" name="idArchivoImagenFondo">
              <img src="vistas/img/productos/default/default.jpg" class="img-thumbnail previsualizarFondo" width="100%">
            </div>
          </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">EXIT</button>
          <button type="submit" class="btn btn-primary">SAVE CATEGORY</button>
        </div>
      </form>
      <?php
      $editarCategoria = new ControladorCategorias();
      $editarCategoria -> ctrEditarCategoria();
      ?>
    </div>
  </div>
</div>
<?php
$eliminarCategoria = new ControladorCategorias();
$eliminarCategoria -> ctrEliminarCategoria();
?>