$(document).ready(function(){
  if (location.protocol != 'https:')
{
 location.href = 'https:' + window.location.href.substring(window.location.protocol.length);
}
//setTimeout(changeGoogleTranslate, 1500);

setInterval(function() {
 // alert(88);
 if(ConteoTraductor>0){
  ConteoTraductor--;
if(localStorage.getItem("lang")=="zh-CN")
{  
  $("#navbarToggler > ul > li > div > a > img").attr("src","https://raw.githubusercontent.com/hjnilsson/country-flags/master/png100px/cn.png");
  
    $("#navbarToggler > ul > li > div > a > font > font").text("CN");
    var gObj = $('.goog-te-combo');
            var db = gObj.get(0);
            gObj.val("zh-CN");
            fireEvent(db, 'change');
}
if(localStorage.getItem("lang")=="es")
{  
  $("#navbarToggler > ul > li > div > a > img").attr("src","https://raw.githubusercontent.com/hjnilsson/country-flags/master/png100px/es.png");
 
    $("#navbarToggler > ul > li > div > a > font > font").text("ES");
 var gObj = $('.goog-te-combo');
            var db = gObj.get(0);
            gObj.val("es");
            fireEvent(db, 'change');
            setTimeout(function() {              
                $("#navbarToggler > ul > li > div > ul > a:nth-child(3) > font > font").text("EN");
            },6000);
}
}
}, 1800);

});
var ConteoTraductor=4;
function changeGoogleTranslate() {
  TraducirFinal(localStorage.getItem("lang"));
    if ($('.goog-te-combo option:first-child').text() == "Select Language") {
        $('.goog-te-combo').selectBox().change(function() {
            var gObj = $('.goog-te-combo');
            var db = gObj.get(0);
            gObj.val($(this).val());
            //console.log("$(this).val()", $(this).val());
            fireEvent(db, 'change');
        });
    } else {
      // setTimeout(changeGoogleTranslate, 50);
    }
}

function TraducirOriginal() {
  localStorage.setItem("lang","");
            location.reload()
}

function Traducir(StrTra) {
  localStorage.setItem("lang",StrTra);
            location.reload()
}

function TraducirFinal(StrTra) {
  var gObj = $('.goog-te-combo');
            var db = gObj.get(0);
            gObj.val(StrTra);
            fireEvent(db, 'change');
}

function fireEvent(el, e) {
    if (document.createEventObject) {
        //for IE 
        var evt = document.createEventObject();
        return el.fireEvent('on' + e, evt)
    } else {
        // For other browsers 
        var evt = document.createEvent("HTMLEvents");
        evt.initEvent(e, true, true);
        return !el.dispatchEvent(evt);
    }
}

$('.colapsando').on("show.bs.collapse", function(){
  for (var i = $('.colapsando').length - 1; i >= 0; i--) {
    //alert()
    if(($(this).attr('arial-labelledby'))!=($($('.colapsando')[i]).attr('arial-labelledby')))
    {
      //$('.colapsando').collapse();
      //$($('.colapsando')[i]).collapse();
     // alert($($('.colapsando')[i]).attr('arial-labelledby'));
    }
  }  
  $('.nav-link').parent().removeClass('verdeTonal');
  $('.nav-link[aria-controls="'+$(this).attr('id')+'"]').parent().addClass('verdeTonal');
});

$('.colapsando').on("hide.bs.collapse", function(){
  $('.nav-link').parent().removeClass('verdeTonal');
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

$('#collapse1 > div > div > div > .xbox-one-play-station').click(function() {
  
    console.log("$(this).attr(\"idClase\")", $(this).attr("idClase"));
    localStorage.setItem("filtrandoClase", $(this).attr("idClase"));
    localStorage.setItem("filtrandoCategoria", "0");
    window.location="products";
})
$(document).mouseup(function(e) 
{
    var container = $("#navbarToggler");
    var btnn = $(".navbar-translate > button");
    if (!container.is(e.target)  && container.has(e.target).length === 0 && 
      !btnn.is(e.target) && $("#navbarToggler").hasClass("show") && btnn.has(e.target).length === 0) 
    {
      btnn.click()
   //    container.hide();
    }
    if (!$("#collapse1").is(e.target)  && $("#collapse1").has(e.target).length === 0 && 
      !$("#heading1 > a").is(e.target) && $("#collapse1").hasClass("show") && $("#heading1 > a").has(e.target).length === 0) 
    {
      $("#heading1 > a").click()
   //    container.hide();
    }
});



function AbrirArribaProductos() {

  if(!$(".colapsando").hasClass("show"))
    {
      $('#heading1 > a').click();
    }
  setTimeout(function() {    
        $('html,body').animate({ scrollTop: 0 }, 'slow');
        if(!$(".colapsando").hasClass("show"))
    {
      $('#heading1 > a').click();
    }
  },500);
}