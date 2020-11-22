$( ".rutaPagina > a" ).click(function( event ) {
  event.preventDefault();
 //alert($(this).attr("href"));
  if($(this).attr("href")=="inicio") location="";
  if($(this).attr("href")=="products") {
    if($(this).attr("idCategoria")>0){
       localStorage.setItem("filtrandoClase", "0");
       localStorage.setItem("filtrandoCategoria", $(this).attr("idCategoria"));
        window.location="products";
    }
    if($(this).attr("idClase")>0){
       localStorage.setItem("filtrandoClase", $(this).attr("idClase"));
       localStorage.setItem("filtrandoCategoria", "0");
      window.location="products";

    }
  }


});



$(document).ready(function() {

    var $owl = $('.carousel-products');

$owl.find('.obtenerSlides').each( function( index ) {
  $(this).attr( 'position', index ); // NB: .attr() instead of .data()

});


  $('.carousel-products').owlCarousel({
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
      responsive : {
        0:{
            items:2,
            nav:false
        },
        900:{
            items:5,
            nav:false
        }
      },
    margin: 10,
    stagePadding: 10,
    smartSpeed: 450,
    center: true,
    loop: true,
    nav: true,
    navText: ['<i class="fa fa-angle-left leftCopiando" aria-hidden="true"></i>', '<i class="fa fa-angle-right rightCopiando" aria-hidden="true"></i>']
  });

$(".carousel-products .obtenerSlides").click(function() {  console.log("index+1",  $(this).attr( 'position' ) );

  $('.carousel-products').trigger('to.owl.carousel', $(this).attr( 'position' ) );
}); 
    $('.carousel-multimedia').owlCarousel({
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
     margin: 40,
    stagePadding: 30,
    smartSpeed: 450,
    center: true,
    loop: true,
      responsive : {
        0:{
            items:1,
            nav:false
        },
        900:{
            items:2,
            nav:false
        }
      }
  });    
    $('.carousel-reviews').owlCarousel({
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    items: 1,
    margin: 10,
    stagePadding: 10,
    smartSpeed: 450,
    center: true,
    loop: true,
    nav: true,
  });
    $('.carousel-related').owlCarousel({
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
      responsive : {
        0:{
            items:1,
            nav:false
        },
        900:{
            items:5,
            nav:false
        }
      },
    margin: 10,
    stagePadding: 10,
    smartSpeed: 450,
    center: true,
    loop: true,
  });
});


$('.carousel-products').on('changed.owl.carousel', function(event) {
     $(".imgCarruselProducto").css("background-image","vistas/img/default.jpg");
setTimeout(function function_name(argument) {
  if ($(".owl-item.active.center").find(".producto-obtenerSlides").css("background-image")) {
    var URL = $(".owl-item.active.center").find(".producto-obtenerSlides").css("background-image");//.slice(4, -1).replace(/"/g, "");
    $(".imgCarruselProducto").css("background-image",URL);
  }
},700);
})