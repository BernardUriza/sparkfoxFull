
$(".btnEnviarContacto").click(function function_name(argument) {
  if (grecaptcha.getResponse() == ''){swal("Tell me you're not a robot, please."); return;}
  
	var valName = $(".txtName").val() != "";
	if (!valName) {
		swal("Enter Name");
    return;
	}
	var valEmail = $(".txtEmail").val() != "" && validateEmail($(".txtEmail").val());
	if (!valEmail) {
		swal("Enter a valid email");
    return;
	}
	sendMail($(".txtEmail").val())
})

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}



function sendMail(CorreoConfirmacion) {
    var DatosPrincipales = [];
    var correos="sales@dragonslay.zone;contact@dragonslay.zone";

     DatosPrincipales.push({ 
            "Dato" : "Name",
            "Contenido"  : $(".txtName").val()
        });
     DatosPrincipales.push({ 
            "Dato" : "Email",
            "Contenido"  : $(".txtEmail").val()
        });
     DatosPrincipales.push({ 
            "Dato" : "Message",
            "Contenido"  : $(".txtMSG").val()
        });
    var formData = new FormData();
    formData.append('Destinatarios', correos); 
    formData.append('Titulo', ("Contact to "+$(".txtName").val()));
    formData.append('Texto',JSON.stringify( DatosPrincipales));
    formData.append('CorreoConfirmacion',CorreoConfirmacion);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "CorreoElectronico.php", true);
    xhr.upload.onprogress = function (evt) {
      if (evt.lengthComputable) {
          var percentLoaded = Math.round((evt.loaded / evt.total) * 100);
          if (percentLoaded < 100) {
          }
      }
    };
    xhr.upload.onloadstart = function (e) {
    };
    xhr.upload.onloadend = function (e) {
    };
    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

        swal('Datos recibidos. <i class="far fa-check-circle" style="color: green;"></i>');
       location.reload();
      }
    };
    xhr.send(formData);
}