<!--=====================================
MENU
======================================-->	
<ul class="sidebar-menu">
<li class=""><a href="inicio"><i class="fa fa-home"></i> <span>Start</span></a></li>
<!-- 
	
  
  <li><a href="slide"><i class="fa fa-edit"></i> <span>Gestor Slide</span></a></li>
  <li><a href="categorias"><i class="fa fa-th-list"></i> <span>Gestor Categorías</span></a></li> 
  <li><a href="proyectos"><i class="fa fa-product-hunt"></i> <span>Gestor Proyectos</span></a></li>
  <li><a href="cotizaciones"><i class="fa fa-usd"></i> <span>Gestor Cotizaciones</span></a></li>
  <li><a href="preguntas"><i class="fa fa-product-hunt"></i> <span>Gestor Preguntas</span></a></li> -->


  <li><a href="template"><i class="fa fa-edit"></i> <span>Template</span></a></li> 
  <li><a href="slide"><i class="fa fa-slideshare" aria-hidden="true"></i> <span>Main Slide</span></a></li> 
  <li><a href="videos"><i class="fa fa-video-camera" aria-hidden="true"></i><span>Videos</span></a></li> 
  <li><a href="stores"><i class="fa fa-university" aria-hidden="true"></i><span>Stores</span></a></li> 
  <li><a href="compatibilities"><i class="fa fa-table"></i> <span>Compatibilities Manager</span></a></li> 
  <li><a href="categories"><i class="fa fa-th-list"></i> <span>Categories Manager</span></a></li> 
  <li><a href="products"><i class="fa fa-product-hunt"></i> <span>Products Manager</span></a></li>
  <li><a href="blog"><i class="fa fa-rss"></i> <span>Blog</span></a></li>
  <li><a href="subscribers"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>Subscribers</span></a></li>
  <li><a href="visits"><i class="fa fa-map-marker"></i> <span>Visits Manager</span></a></li>
  <!-- 
  <li><a href="suscriptores"><i class="fa fa-newspaper-o"></i> <span>Gestor Suscriptores</span></a></li> -->
  <?php
   if($_SESSION["perfil"] == "administrador"){
    echo '<li><a href="profiles"><i class="fa fa-key"></i> <span>Profiles Manager</span></a></li>';
  }
  ?>
</ul>	