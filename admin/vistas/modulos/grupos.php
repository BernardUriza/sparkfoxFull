<div class="content-wrapper">
    
  <section class="content-header">
      
    <h1>
      Gestor Grupos
    </h1>
 
    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor grupos</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
         
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarGrupo">

            Agregar grupo

          </button>

      </div>

      <div class="box-body">
         
        <table class="table table-bordered table-striped dt-responsive tablaGrupos" width="100%">

          <thead>
            
            <tr>
              
              <th style="width:10px">#</th>
              <th>Grupo</th>
              <th>Ruta</th>
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
MODAL AGREGAR GRUPO
======================================-->

<div id="modalAgregarGrupo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        
        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Agregar grupo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          
          <div class="box-body">

            <!--=====================================
            ENTRADA DEL TITULO DE EL GRUPO
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg validarGrupo tituloGrupo" placeholder="Ingresar Grupo" name="tituloGrupo" required> 

              </div> 

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DE EL GRUPO
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-link"></i></span>

                <input type="text" class="form-control input-lg rutaGrupo" placeholder="Ruta url para el grupo" name="rutaGrupo" readonly required> 

              </div> 

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar grupo</button>

        </div>

      </form>

      <?php

        
          $crearGrupo = new ControladorGrupos();
          $crearGrupo -> ctrCrearGrupo();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR GRUPO
======================================-->

<div id="modalEditarGrupo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        
        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Editar grupo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          
          <div class="box-body">

            <!--=====================================
            ENTRADA DEL TITULO DE EL GRUPO
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg validarGrupo tituloGrupo" placeholder="Ingresar Grupo" name="editarTituloGrupo" required> 

                <input type="hidden" class="editarIdGrupo" name="editarIdGrupo">
                <input type="hidden" class="editarIdCabecera" name="editarIdCabecera">

              </div> 

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DE EL GRUPO
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-link"></i></span>

                <input type="text" class="form-control input-lg rutaGrupo" placeholder="Ruta url para el grupo" name="rutaGrupo" readonly required> 

              </div> 

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios grupo</button>

        </div>

      </form>

      <?php

        
          $editarGrupo = new ControladorGrupos();
          $editarGrupo -> ctrEditarGrupo();

      ?>

    </div>

  </div>

</div>

 <?php

        
    $eliminarGrupo = new ControladorGrupos();
    $eliminarGrupo -> ctrEliminarGrupo();

  ?>


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


