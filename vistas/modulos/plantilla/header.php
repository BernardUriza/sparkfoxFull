<nav class="navbar navbar-expand-lg" id="navbarOcultar">

  <button id="openNav" class="w3-button d-lg-none w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
   <a class="d-block d-lg-none py-0" id="iconoPequeMobile" href="start"><img src="<?php echo $url ?>/vistas/img/Sparkfox-icon.svg?54" style="    height: 28px; top: 0px;   margin: auto;
    display: block;
    position: relative;
    right: 20px;" alt=""></a>
    <div class="container mw-100 esconderEnPeque">
        <div class="navbar-translate">
            <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar"></span>
            <span class="navbar-toggler-bar"></span>
            <span class="navbar-toggler-bar"></span>
            </button>
            <a class="navbar-brand d-none d-lg-block py-0" href="start"><img src="<?php echo $url ?>admin/vistas/img/sparkfox-logo.png?54" style="height: 45px" alt=""></a>
            
        </div>
        <div class=" " id="navbarToggler">
            <ul class="navbar-nav ml-auto">
                <li class="order-7 order-lg-1 nav-item pb-0" id="heading1">
                    <a class="nav-link mb-0" data-placement="bottom" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                        PRODUCTS
                    </a>
                </li>
                <li class="order-6 order-lg-2 nav-item pb-0 d-none" id="heading2">
                    <a class="nav-link mb-0" data-placement="bottom" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        ODM / OEM
                    </a>
                </li>
                <li class="order-5 order-lg-3 nav-item pb-0" id="heading3">
                    <a class="nav-link mb-0" href="whereToBuy"> 
                        WHERE TO BUY
                    </a>
                </li>
                <li class="order-4 order-lg-4 nav-item pb-0" id="heading4">
                    <a class="nav-link mb-0" href="contact">
                        CONTACT
                    </a>
                </li>
                <li class="order-3 order-lg-5 nav-item pb-0 d-none d-md-block" id="heading5">
                    <div class="row h-100">
                        <div  class="col p-0 align-self-center" style="height: 15px; width: 1px; border-left: solid 1px gray;"></div>
                    </div>
                </li>
                <li class="order-1 order-lg-6 nav-item pb-0">
                    <div class="row h-100 align-items-center">
                        <div class="col" id="trasladarCerrado">
                            <form id="demo-2" onsubmit="localStorage.setItem('paraBuscarEnCatalogo' ,($('.searchCatalogo').val())); location='products'; return false;">
                                <input type="search" placeholder="Search" class="py-2 searchCatalogo">
                            </form>
                        </div>
                    </div>
                <li>
                <li class="order-2 order-lg-7 nav-item pb-0">
                    <div class="dropdown ddLenguaje" >
                        <a href="#" class="btn btn-default dropdown-toggle ddeLenguaje" data-toggle="dropdown">
                            <img src="vistas/img/ing.png" class="ddeiLenguaje">EN
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" style="left: -45px; cursor: pointer;" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item"  onclick="Traducir('zh-CN')"><img src="https://raw.githubusercontent.com/hjnilsson/country-flags/master/png100px/cn.png" class="ddeiLenguaje">CN</a>
                            <a class="dropdown-item" onclick="Traducir('es')"><img src="https://raw.githubusercontent.com/hjnilsson/country-flags/master/png100px/es.png" class="ddeiLenguaje">ES</a>
                            <a class="dropdown-item" onclick="TraducirOriginal()"><img src="vistas/img/ing.png" class="ddeiLenguaje">EN</a>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container w-100 mw-100" id="accordion">
    <div class="collapse colapsando" arial-labelledby="heading1" data-parent="#accordion" id="collapse1">
        <div class="row h-100 align-items-center" style="    background-color: #19BD78;">
            <div class="col-12">
                <div class="d-flex justify-content-center flex-lg-row flex-column">
                    <?php
                    $Clases = ControladorClases::ctrMostrarClases();
                    //echo '<pre>'; print_r($Clases); echo '</pre>';
                    for ($IndexClases=count($Clases)-1; $IndexClases >= 0; $IndexClases--) 
                        if($Clases[$IndexClases]["estado"]==1){ ?>
                    <div class="xbox-one-play-station px-4 my-lg-0 my-3" idClase="<?php echo $Clases[$IndexClases]["id"]; ?>"><?php echo $Clases[$IndexClases]["clase"]; ?></div>
                    <?php  } ?>
                </div>
            </div>
        </div>
    </div>
</div>