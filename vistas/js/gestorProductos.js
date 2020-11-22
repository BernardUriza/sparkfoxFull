$(document).ready(function(){
    $('.carousel-products').owlCarousel({
      animateOut: 'slideOutDown',
      animateIn: 'flipInX',
      items:3,
      margin:30,
      stagePadding:30,
      smartSpeed:450,
      center: true,
      loop:true
  });
});