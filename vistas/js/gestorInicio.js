$(document).ready(function(){
  $('.carousel-events').owlCarousel({
      animateOut: 'slideOutDown',
      animateIn: 'flipInX',
      items:1,
      margin:30,
      stagePadding:30,
      smartSpeed:250,
    loop:true,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true
  });
    $('.carousel-products').owlCarousel({
      animateOut: 'slideOutDown',
      animateIn: 'flipInX',
      margin:30,
      stagePadding:30,
      smartSpeed:450,
      center: true,
      loop:true,
      responsive : {
        0:{ 
            items:1,
            nav:true
        },
        500:{
            items:3,
            nav:false
        }
      }
  });
    $('.carousel-products.owl-loaded.owl-drag > div.owl-dots.disabled').removeClass('disabled');
});

$(".dnoneHover-cat").click(function() {
    console.log("$(this).attr(\"idCategoria\")", $(this).attr("idCategoria"));
    localStorage.setItem("filtrandoCategoria", $(this).attr("idCategoria"));
    localStorage.setItem("filtrandoClase", "0");
    window.location="products";
})
$(".uri").click(function() {
  location=$(this).attr("uri");
})


$(".btnSubscribir").click(function() {
  var vchSubscribir = ($(".vchSubscribir").val());
  if(validateEmail(vchSubscribir)){
     var datos = new FormData();
        datos.append("ip", $('#visita-plantilla-ip').val());
        datos.append("pais", $('#visita-plantilla-pais').val());
        datos.append("codigo", $('#visita-plantilla-codigo').val());
        datos.append("correo", vchSubscribir);
        $.ajax({
            url: "ajax/suscriptores.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                console.log("respuesta", respuesta);
                TostandoMensaje('Subscribed user: '+vchSubscribir);
                setTimeout(function() {
                  location.reload();
                },2000);
            }
        }); 
  }
  else{
    TostandoMensaje('Please correct the email','error');
  }
});



function TostandoMensaje(msj, type='success') {
  const toast = Swal.mixin({
  toast: true,
  position: 'center',
  showConfirmButton: false,
  timer: 3000
});

toast({
  type: type,
  title: msj
})
}
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}