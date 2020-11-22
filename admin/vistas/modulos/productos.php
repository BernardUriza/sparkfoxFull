<div class="content-wrapper">
   <section class="content-header">
      <h1>
      Product Manager  <input type="hidden" value="<?php echo $Parametros[1]; ?>" id="levantarProductoID">
      </h1>
      <ol class="breadcrumb">
         <li><a href="inicio"><i class="fa fa-dashboard"></i> Start</a></li>
         <li class="active">Product Manager</li>
      </ol>
   </section>
   <section class="content">
      <div class="box">
         <div class="box-header with-border">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
            Add Product
            </button>
         </div>
         <div class="box-body">
            <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">
               <thead>
                  <tr>
                     <th style="width:10px">#</th>
                     <th>Title</th>
                     <th>Categories</th>
                     <th>Compatibilities</th>
                     <th>SKU</th>
                     <th>Cover</th>
                     <th>Header</th>
                     <th>Package</th>
                     <th>Multimedia</th>
                     <th>Examples</th>
                     <th>DataSheet</th>
                     <th>SpecialFeatures</th>
                     <th>Contents</th>
                     <th>Description</th>
                     <th>Stores</th>
                     <th>Reviews</th>
                     <th>Videos</th>
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
MODAL AGREGAR PRODUCTO
======================================-->
<div id="modalAgregarProducto" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <form role="form" method="post" enctype="multipart/form-data"  onsubmit="return false" id="AgregarFORM_ID">
            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->
            <div class="modal-header" style="background:#3c8dbc; color:white">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Add product</h4>
            </div>
            <!--=====================================
            CUERPO DEL MODAL
            ======================================-->
            <div class="modal-body">
               <div class="box-body">
                  <!--=====================================
                  ENTRADA PARA EL TÍTULO
                  ======================================-->
                  <div class="form-group">
                     <h2>Product Information</h2>
                  </div>
                  <div class="form-group">
                     <div class="panel">*NAME <small>(required, name without special characters)</small></div>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                        <input type="text" class="form-control input-md validarProducto tituloProducto"  placeholder="Enter product title">
                     </div>
                  </div>
                  <!--=====================================
                  ENTRADA PARA CODIGO
                  ======================================-->
                  <div class="form-group">
                     <div class="panel">CODE <small>(free and optional alphanumeric)</small></div>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <input type="text" class="form-control input-md codigoProducto" placeholder="Product code">
                     </div>
                  </div>
                  <!--=====================================
                  AGREGAR DESCRIPCIÓN
                  ======================================-->
                  <div class="form-group">
                     <div class="panel">PRODUCT DESCRIPTION </div>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                        <textarea type="text" rows="3" class="form-control input-md descripcionProducto" placeholder="Enter description"></textarea>
                     </div>
                  </div>
                  <!--=====================================
                  AGREGAR CATEGORÍA
                  ======================================-->
                  <div class="form-group">
                     <div class="panel">*CATEGORY  <small>(mandatory, choose at least one)</small></div>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-th-large"></i></span>
                        <select class="form-control input-md seleccionarCategoria CategoriaCrearSelect2" name="categorias[]" style="width: 100%;" multiple="multiple">
                           <?php
                           $item = null;
                           $valor = null;
                           $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                           foreach ($categorias as $key => $value) {
                           echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                           }
                           ?>
                        </select>
                     </div>
                  </div>
                  <!--=====================================
                  AGREGAR CLASE
                  ======================================-->
                  <div class="form-group ">
                     <div class="panel">*COMPATIBILITIES <small>(mandatory, choose at least one)</small></div>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                        <select class="form-control input-md seleccionarClase ClaseCrearSelect2" name="clases[]" style="width: 100%;" multiple="multiple">
                           <?php
                           $item = null;
                           $valor = null;
                           $clases = ControladorClases::ctrMostrarClases($item, $valor);
                           foreach ($clases as $key => $value) {
                           echo '<option value="'.$value["id"].'">'.$value["clase"].'</option>';
                           }
                           ?>
                        </select>
                     </div>
                  </div>
                  <div class="form-group hidden">
                     <h2>Features & Specs:</h2>
                  
                  <!--=====================================
                  AGREGAR MARCA
                  ======================================-->
                  <div class="form-group   hidden">
                     <div class="panel">MARCA <small>(si no existe para éste producto, cree una marca nueva)</small></div>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>
                        <select class="form-control input-md seleccionarMarca" id="seleccionarMarca_ADD" style="width: 100% !important; height: inherit !important;">
                        </select>
                     </div>
                  </div>
                  <!--=====================================
                  AGREGAR GRUPO
                  ======================================-->
                  <div class="form-group  entradaGrupo hidden">
                     <div class="panel">GRUPO DE RELACIONADOS <small>(si no existe para éste producto, cree un grupo nuevo)</small></div>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-object-group"></i></span>
                        <select class="form-control input-md seleccionarGrupo" id="seleccionarGrupo_ADD" style="width: 100% !important; height: inherit !important;">
                        </select>
                     </div>
                  </div>
                  <!--=====================================
                  ENTRADA PARA DETALLE PRESENTACION
                  ======================================-->
                  <div class="form-group hidden">
                     <div class="panel">PRESENTACIÓN</div>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-info-circle"></i></span>
                        <input class="form-control input-md detallePresentacion" type="text" placeholder="Presentation of the product">
                     </div>
                  </div>
                  <!--=====================================
                  AGREGAR Características Especiales
                  ======================================-->
                  <div class="form-group">
                     <div class="panel">PRODUCT FEATURES <small>(separated by pressing enter)</small></div>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                        <textarea type="text" rows="3" class="form-control input-md caracteristicasProducto" placeholder="Enter features"></textarea>
                     </div>
                  </div>
                  <!--=====================================
                  AGREGAR Características Especiales
                  ======================================-->
                  <div class="form-group">
                     <div class="panel">PACKAGE CONTENT <small>(separated by pressing enter)</small></div>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                        <textarea type="text" rows="3" class="form-control input-md empaqueProducto" placeholder="Enter package content"></textarea>
                     </div>
                  </div>
                  <!--=====================================
                  AGREGAR FICHA TECNICA
                  ======================================-->
                  <div class="form-group" id="FichaTecnicaCrear">
                  </div>
                  <!--=====================================
                  AGREGAR PALABRAS CLAVES
                  ======================================-->
                  <div class="form-group" style="display: none;">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="text" class="form-control input-md tagsInput pClavesProducto" data-role="tagsinput"  placeholder="Ingresar palabras claves">
                     </div>
                  </div>
                  <!--=====================================
                  AGREGAR FOTO
                  ======================================-->
                  <div class="form-group">
                     <div class="panel">MAIN PRODUCT IMAGE</div>
                     <input type="file" class="fotoPrincipal"  accept="image/jpg, image/jpeg, image/png" >
                     <input type="text" style="display: none" class="rutaImagenPortada">
                     <input type="text" style="display: none" class="idArchivoImagenPortada">
                     <img src="vistas/img/productos/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="100%">
                  </div>
                  <div class="form-group">
                     <h2>Add Reviews</h2>
                  </div>
                  <div class="form-group">
                     <h2>Header Image Product</h2>
                  </div>
                  <!--=====================================
                  AGREGAR FOTO
                  ======================================-->
                  <div class="form-group">
                     <div class="panel">MAIN PRODUCT IMAGE</div>
                     <input type="file" class="fotoPrincipal"  accept="image/jpg, image/jpeg, image/png" >
                     <input type="text" style="display: none" class="rutaImagenPortada">
                     <input type="text" style="display: none" class="idArchivoImagenPortada">
                     <img src="vistas/img/productos/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="100%">
                  </div>
                  <div class="form-group">
                     <h2>Multimedia</h2>
                  </div>
                  <!--=====================================
                  ENTRADA PARA AGREGAR MULTIMEDIA
                  ======================================-->
                  <div class="form-group agregarMultimedia">
                     <div class="panel">PRODUCT IMAGES MULTIMEDIA</div>
                     <!--=====================================
                     SUBIR MULTIMEDIA DE PRODUCTO FÍSICO
                     ======================================-->
                     <div class="multimediaFisica needsclick dz-clickable" style="display:none">
                     </div>
                  </div>
                  </div>
               </div>
            </div>
            <!--=====================================
            PIE DEL MODAL
            ======================================-->
            <div class="modal-footer">
               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Exit</button>
               <button type="button" class="btn btn-primary guardarProducto">Save product</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->
<div id="modalEditarProducto" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <form role="form" method="post" enctype="multipart/form-data"  onsubmit="return false" id="EditarFORM_ID">
            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->
            <div class="modal-header" style="background:#3c8dbc; color:white">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Edit product</h4>
            </div>
            <!--=====================================
            CUERPO DEL MODAL
            ======================================-->
            <div class="modal-body">
               <div class="box-body">
                  <!--=====================================
                  ENTRADA PARA EL TÍTULO
                  ======================================-->
                  <div class="form-group">
                     <h2>Product Information</h2>
                  </div>
                  <div class="form-group">
                     <div class="panel">*NAME <small>(required, name without special characters)</small></div>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                        <input type="text" class="form-control input-md validarProducto tituloProducto">
                        <input type="text" style="display: none" class="idProducto">
                        <input type="text" style="display: none" class="idCabecera">
                     </div>
                  </div>
                  <!--=====================================
                  ENTRADA PARA CODIGO
                  ======================================-->
                  <div class="form-group">
                     <div class="panel">CODE </div>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <input type="text" class="form-control input-md codigoProducto" placeholder="Código del producto">
                     </div>
                  </div>
                  <!--=====================================
                  AGREGAR DESCRIPCIÓN
                  ======================================-->
                  <div class="form-group">
                     <div class="panel">PRODUCT DESCRIPTION </div>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                        <textarea type="text" rows="3" class="form-control input-md descripcionProducto"></textarea>
                     </div>
                  </div>
                  <!--=====================================
                  AGREGAR CATEGORÍA
                  ======================================-->
                  <div class="form-group">
                     <div class="panel">*CATEGORY  <small>(mandatory, choose at least one)</small></div>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-th-large"></i></span>
                        <select class="form-control input-md seleccionarCategoria CategoriaEditarSelect2" name="categorias[]" style="width: 100%;" multiple="multiple">
                           <?php
                           $item = null;
                           $valor = null;
                           $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                           foreach ($categorias as $key => $value) {
                           echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                           }
                           ?>
                        </select>
                     </div>
                  </div>
                  <!--=====================================
                  AGREGAR CLASE
                  ======================================-->
                  <div class="form-group ">
                     <div class="panel">*COMPATIBILITIES <small>(mandatory, choose at least one)</small></div>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                        <select class="form-control input-md seleccionarClase ClaseEditarSelect2" name="clases[]" style="width: 100%;" multiple="multiple">
                           <?php
                           $item = null;
                           $valor = null;
                           $clases = ControladorClases::ctrMostrarClases($item, $valor);
                           foreach ($clases as $key => $value) {
                           echo '<option value="'.$value["id"].'">'.$value["clase"].'</option>';
                           }
                           ?>
                        </select>
                     </div>
                  </div>
                  <!--=====================================
                  AGREGAR MARCA
                  ======================================-->
                  <div class="form-group  entradaGrupo hidden">
                     <div class="panel">MARCA <small>(si no existe para éste producto, cree una marca nueva)</small></div>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>
                        <select class="form-control input-md seleccionarMarca" id="seleccionarMarca_EDIT" style="width: 100% !important; height: inherit !important;">
                        </select>
                     </div>
                  </div>
                  <!--=====================================
                  AGREGAR GRUPO
                  ======================================-->
                  <div class="form-group entradaGrupo hidden">
                     <div class="panel">GRUPO DE RELACIONADOS <small>(si no existe para éste producto, cree uno)</small></div>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-object-group"></i></span>
                        <select class="form-control input-md seleccionarGrupo"  id="seleccionarGrupo_EDIT" style="width: 100% !important; height: inherit !important;">
                           <option class="optionEditarGrupo"></option>
                        </select>
                     </div>
                  </div>
                  <!--=====================================
                  ENTRADA PARA DETALLE PRESENTACION
                  ======================================-->
                  <div class="form-group hidden">
                     <div class="panel">PRESENTATION</div>
                     <div class="input-group editarPresentacion1">
                     </div>
                  </div>
                  
                  <div class="box">
                     <div class="box-header">
                        <h3 class="box-title">
                        <div class="row">
                           <div class="col-sm-4">
                              <input type="text" class="form-control input-sm agregar-presentacion" placeholder="Presentation">
                           </div>
                           <div class="col-sm-3 no-padding">
                              <input type="text" class="form-control input-sm agregar-sku" placeholder="SKU">
                           </div>
                           <div class="col-sm-3" data-toggle="tooltip" title="Color">
                              <div class="input-group  agregar-color"><div class="input-group-addon">
                                 <i></i>
                              </div>
                              <input type="text" class="form-control input-sm">
                           </div>
                        </div>
                        <div class="col-sm-2">
                           <div class="btn-group"><button class="btn btn-success btnAgregarPresentacion"><i class="fa fa-plus"></i></button></div>
                        </div>
                     </div>
                     </h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                     <table class="table table-condensed">
                        <tr class="contenido-presentaciones">
                           <th style="width: 10px"></th>
                           <th style="width: 10px">#</th>
                           <th>Presentation</th>
                           <th>SKU</th>
                           <th style="width: 40px">Color</th>
                        </tr>
                     </table>
                  </div>
                  <!-- /.box-body -->
               </div>

              <div class="form-group">
                  <div class="panel">Retail Stores</div>
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fas fa-free-code-camp"></i></span>
                     <textarea type="text" rows="3" class="form-control input-md tiendas" placeholder="Enter as CSV"></textarea>
                  </div>
               </div>
               <div class="form-group">
                  <h2>Features & Specs:</h2>
               </div>
               <!--=====================================
               AGREGAR Características Especiales
               ======================================-->
               <div class="form-group">
                  <div class="panel">PRODUCT FEATURES <small>(separated by pressing enter)</small></div>
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                     <textarea type="text" rows="3" class="form-control input-md caracteristicasProducto" placeholder="Ingresar características especiales del producto"></textarea>
                  </div>
               </div>
               
               <!--=====================================
               AGREGAR Características Especiales
               ======================================-->
               <div class="form-group">
                  <div class="panel">PACKAGE CONTENT <small>(separated by pressing enter)</small></div>
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                     <textarea type="text" rows="3" class="form-control input-md empaqueProducto" placeholder="Enter package content"></textarea>
                  </div>
               </div>
               <!--=====================================
               AGREGAR FICHA TECNICA
               ======================================-->
               <div class="form-group" id="FichaTecnicaEditar">
               </div>
               <div style="display: none">
                  <div id="FichaTecnicaHTML">
                     <div class="panel">DATA SHEET <small>(User manual)</small></div>
                     <label for="ImagenFicha" class="labelInputFile">Set data sheet<i class="fa fa-cloud-upload ImagenLabel"></i></label>
                     <input type="file" class="form-control-file" id="ImagenFicha" aria-describedby="fileHelp" accept="application/pdf">
                     <input type="text" style="display: none" id="RutaFicha" name="RutaFicha" value="">
                     <input type="text" style="display: none" id="IdArchivoFicha" name="IdArchivoFicha" value="-1">
                     <div class="PDF_VIEWER">
                        <div class="row">
                           <div class="col-sm-8"><span>Page: <span id="page_num"></span> / <span id="page_count"></span></span></div>
                           <div class="col-sm-2"><a id="prev"><i class="fa fa-arrow-left"></i></a></div>
                           <div class="col-sm-2"><a id="next"><i class="fa fa-arrow-right"></i></a></div>
                        </div>
                        <div class="row">
                           <canvas id="the-canvas"></canvas>
                        </div>
                     </div>
                  </div>
               </div>
             <!--=====================================
               AGREGAR FOTO DE MULTIMEDIA
               ======================================-->
               <div class="form-group">
                  <div class="panel">Cover Image</div>
                  <input type="file" class="fotoPrincipal" accept="image/jpg, image/jpeg, image/png" >
                  <input type="text" style="display: none" class="antiguaFotoPrincipal">
                  <input type="text" style="display: none" class="rutaImagenPortada">
                  <input type="text" style="display: none" class="idArchivoImagenPortada">
                  <img src="vistas/img/productos/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="100%">
               </div>
               <div class="form-group">
                  <div class="panel">Package Image</div>
                  <input type="file" class="fotoCover" accept="image/jpg, image/jpeg, image/png" >
                  <input type="text" style="display: none" class="rutaImagenPaquete">
                  <input type="text" style="display: none" class="idArchivoImagenPaquete">
                  <img src="vistas/img/productos/default/default.jpg" class="img-thumbnail previsualizarCover" width="100%">
               </div>
                  <div class="form-group">
                     <h2>Add Reviews</h2>
                  </div>

              <div class="form-group">
                  <div class="panel">Reviews <small></small></div>
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-star-half-o" aria-hidden="true"></i></span>
                     <textarea type="text" rows="3" class="form-control input-md reviews" placeholder="Enter revies as CSV"></textarea>
                  </div>
               </div>
                  <div class="form-group">
                     <h2>Image Product</h2>
                  </div>
               <!--=====================================
               AGREGAR PALABRAS CLAVES
               ======================================-->
               <div class="form-group editarPalabrasClaves" style="display: none;">
               </div>
               <div class="form-group">
                  <div class="panel">Header Image</div>
                  <input type="file" class="fotoHeader" accept="image/jpg, image/jpeg, image/png" >
                  <input type="text" style="display: none" class="rutaImagenHeader">
                  <input type="text" style="display: none" class="idArchivoImagenHeader">
                  <img src="vistas/img/productos/default/default.jpg" class="img-thumbnail previsualizarHeader" width="100%">
               </div>
               <div class="form-group agregarEjemplos">
                  <div class="panel">Examples Image</div>
                  <!--=====================================
                  SUBIR MULTIMEDIA DE PRODUCTO FÍSICO
                  ======================================-->
                  <div class="row previsualizarImgEjemplo"></div>
                  <div class="multimediaEjemplo needsclick dz-clickable" style="display:none">
                     <div class="dz-message needsclick">
                        Drag or click to add image.
                     </div>
                  </div>
               </div>
               <!--=====================================
               ENTRADA PARA AGREGAR MULTIMEDIA
               ======================================-->
               <div class="form-group">
                     <h2>Multimedia</h2>
                  </div>
               <div class="form-group agregarMultimedia">
                  <div class="panel">MULTIMEDIA IMAGES</div>
                  <!--=====================================
                  SUBIR MULTIMEDIA DE PRODUCTO FÍSICO
                  ======================================-->
                  <div class="row previsualizarImgFisico"></div>
                  <div class="multimediaFisica needsclick dz-clickable" style="display:none">
                     <div class="dz-message needsclick">
                        Drag or click to add image.
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="panel">VIDEOS </div>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                        <select class="form-control input-md seleccionarVideo VideoEditarSelect2" name="videos[]" style="width: 100%;" multiple="multiple">
                           <?php
                           $item = null;
                           $valor = null;
                           $clases = ControladorProductos::verVideos($item, $valor);
                           foreach ($clases as $key => $value) {
                           echo '<option value="'.$value["id"].'">'.$value["titulo"].'</option>';
                           }
                           ?>
                        </select>
                     </div>
               </div>

            </div>
            <!--=====================================
            PIE DEL MODAL
            ======================================-->
            <div class="modal-footer">
               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Exit</button>
               <button type="button" class="btn btn-primary guardarCambiosProducto">Save product</button>
            </div>
         </div>
      </form>
   </div>
</div>