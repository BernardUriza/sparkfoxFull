<div class="content-wrapper">
    
  <section class="content-header">
      
    <h1>
      Gestor de Marcas
    </h1>
 
    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor marcas</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
         
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMarca">

            Agregar marca

          </button>

      </div>

      <div class="box-body">
         
        <table class="table table-bordered table-striped dt-responsive tablaMarcas" width="100%">

          <thead>
            
            <tr>
              
              <th style="width:10px">#</th>
              <th>Marca</th>
              <th>Ruta</th>
              <th>Imagen</th>
              <th>Estado</th>
              <th>Acciones</th>

            </tr>

          </thead>

        </table> 

      </div>
        
    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR MARCA
======================================-->

<div id="modalAgregarMarca" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">
 <form method="post" enctype="multipart/form-data" onsubmit="return false" id="AgregarFORM_ID">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        
        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Agregar marca</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          
          <div class="box-body">

            <!--=====================================
            ENTRADA DEL TITULO DE LA MARCA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg validarMarca tituloMarca" placeholder="Ingresar Marca" name="tituloMarca" required> 

              </div> 

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DE LA MARCA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-link"></i></span>

                <input type="text" class="form-control input-lg rutaMarca" placeholder="Ruta url para el marca" name="rutaMarca" readonly required> 

              </div> 

            </div>

            <!--=====================================
            ENTRADA PARA SUBIR FOTO DE PORTADA
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO LOGOTIPO</div>

               <input type="file" class="fotoPortada" name="fotoPortada">

               <p class="help-block">Tamaño recomendado 1280px * 720px <br> Peso máximo de la foto 2MB</p>

                <img src="vistas/img/cabeceras/default/default.jpg" class="img-thumbnail previsualizarPortada" width="100%">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary guardarMarca">Guardar marca</button>

        </div>

    </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR MARCA
======================================-->

<div id="modalEditarMarca" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">

 <form method="post" enctype="multipart/form-data" onsubmit="return false" id="EditarFORM_ID">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        
        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Editar marca</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          
          <div class="box-body">

            <!--=====================================
            ENTRADA DEL TITULO DE LA MARCA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg validarMarca tituloMarca" placeholder="Ingresar Marca" name="editarTituloMarca" required> 

                <input type="hidden" class="editarIdMarca" name="editarIdMarca">
                <input type="hidden" class="editarIdCabecera" name="editarIdCabecera">

              </div> 

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DE LA MARCA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-link"></i></span>

                <input type="text" class="form-control input-lg rutaMarca" placeholder="Ruta url para el marca" name="rutaMarca" readonly required> 

              </div> 

            </div>
            <!--=====================================
            ENTRADA PARA SUBIR FOTO DE PORTADA
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO LOGOTIPO</div>

               <input type="file" class="fotoPortada" name="fotoPortada">
               <input type="hidden" class="antiguaFotoPortada" name="antiguaFotoPortada">

               <p class="help-block">Tamaño recomendado 1280px * 720px <br> Peso máximo de la foto 2MB</p>

                <img src="vistas/img/cabeceras/default/default.jpg" class="img-thumbnail previsualizarPortada" width="100%">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary guardarCambiosMarca">Guardar cambios marca</button>

        </div>

      </form>


    </div>

  </div>

</div>

<!--=====================================
BLOQUEO DE LA TECLA ENTER
======================================-->

<script>
  
$(document).keydown(function(e){

  if(e.keyCode == 13){

    e.preventDefault();

  }

})


</script>


