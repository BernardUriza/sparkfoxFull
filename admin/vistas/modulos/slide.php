<?php
 $slide = ControladorSlide::ctrMostrarSlide();
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Main Slide
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Start</a></li>
      <li class="active">Main Slide</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary agregarSlide">
          Add slide
        </button>
      </div>
      <div class="box-body">
        <ul class="todo-list">
<?php
foreach ($slide as $key => $value) {  
$rutaPortadaCurrent=($value["rutaImagenPortada"]==""?'../vistas/img/default.jpg':str_replace("admin/","",$value["rutaImagenPortada"]));
$rutaPortadaCurrentHidden = ($value["rutaImagenPortada"]==""?'':$value["rutaImagenPortada"]);
$idPortadaCurrentHidden = ($value["rutaImagenPortada"]==""?'-1':$value["idArchivoImagenPortada"]);
  echo '<li class="itemSlide" id="'.$value["id"].'">
          <div class="box-group" id="accordion">
            <!--=====================================
            CAJA GESTOR SLIDE
            ======================================-->                  
            <div class="panel box box-info">
              <!--=====================================
              CABEZA DE LA CAJA GESTOR SLIDE
              ======================================-->      
              <div class="box-header with-border">
                <span class="handle">
                  <i class="fa fa-ellipsis-v"></i>
                  <i class="fa fa-ellipsis-v"></i>
                </span>
                <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$value["id"].'">';
                if($value["titulo"] != ""){
                   echo '<p class="text-uppercase">'.$value["titulo"].'</p>';
                }else{
                  echo 'Slide '.$value["id"];
                }
                echo '</a>
                </h4>
                <div class="btn-group pull-right">
                  <button class="btn btn-primary guardarSlide"
                   id="'.$value["id"].'"
                   indice="'.$key.'"
                   tituloSlide="'.$value["titulo"].'"
                   descripcion="'.$value["descripcion"].'"
                    >
                  <i class="fa fa-floppy-o"></i>
                  </button>
                  <button class="btn btn-danger eliminarSlide"
                   id="'.$value["id"].'">
                   <i class="fa fa-times"></i></button>
                </div>
              </div>
              <!--=====================================
              MÓDULOS COLAPSABLES
              ======================================-->      
              <div id="collapse'.$value["id"].'" class="panel-collapse collapse collapseSlide">
                <!--=====================================
                EDITOR SLIDE
                ======================================-->    
                <div class="row">
                  <!--=====================================
                  PRIMER BLOQUE
                  ======================================--> 
                  <div class="col-md-4 col-xs-12">
                    <div class="box-body">
                      <!--=====================================
                      MODIFICAR NOMBRE SLIDE
                      ======================================-->      
                      <div class="form-group">                    
                        <label>Link:</label>
                        <input id="uri'.$value["id"].'" type="text" class="form-control uriSlide" indice="'.$key.'" value="'.$value["uri"].'">
                      </div>  
                          <div class="form-group">                     
                        <label>
                        <input type="hidden" class="'.($value["tituloBool"]=="0"?"":"checked").'"  id="HIDtituloBool'.$value["id"].'"> <input type="checkbox" class="icheckvar tituloBool" '.($value["tituloBool"]=="0"?"":"checked").' id="tituloBool'.$value["id"].'"> Title:</label>
                        <input id="titulo'.$value["id"].'" type="text" class="form-control tituloSlide" indice="'.$key.'" value="'.$value["titulo"].'">
                      </div>  
                      <!--=====================================
                      MODIFICAR DESc
                      ======================================--> 
                      <div class="form-group">
                        <label>
                        <input type="hidden" class="'.($value["descripcionBool"]=="0"?"":"checked").'" id="HIDdescripcionBool'.$value["id"].'">
                      <input type="checkbox" class="icheckvar descripcionBool" '.($value["descripcionBool"]=="0"?"":"checked").'  id="descripcionBool'.$value["id"].'"> Description:</label>
                        <textarea id="descripcion'.$value["id"].'" type="text" class="form-control descripcion" value="" indice="'.$key.'">'.$value["descripcion"].'</textarea>
                      </div> 
                      <div class="form-group">
                        <label>Picture:</label>
                        <input id="imagen'.$value["id"].'" type="file" class="form-control imagen" indice="'.$key.'">
                      </div> 
                </div>
              </div>
               <div class="col-md-8 col-xs-12">
                    <div class="box-body">
                      <!--=====================================
                      MODIFICAR LA IMAGEN
                      ======================================--> 
                      <input type="hidden" id="rutaImagenPortada'.$value["id"].'" value="'.$rutaPortadaCurrentHidden.'">
                      <input type="hidden" id="idArchivoImagenPortada'.$value["id"].'" value="'.$idPortadaCurrentHidden.'">
                      <div class="form-group">
                        <img src="'.$rutaPortadaCurrent.'" id="imagenPortada'.$value["id"].'" class="img-thumbnail imagenPortada" width="100%">
                      </div> 
                </div>
              </div>
            </div>
          </div>
        </li>';
}
?>   
        </ul>
      </div>
    </div>
  </section>
</div>
<?php
  $eliminarSlide = new ControladorSlide();
  $eliminarSlide -> ctrEliminarSlide();
?>