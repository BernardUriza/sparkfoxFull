/****************** *PDF* ****************************/
function Mostrar(url) {
  pdfjsLib.getDocument(url).then(function(pdfDoc_) {
    pdfDoc = pdfDoc_;
    document.getElementById('page_count').textContent = pdfDoc.numPages;
    renderPage(pageNum);
  });
}
var pdfjsLib = window['pdfjs-dist/build/pdf'];
pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';
var pdfDoc = null,
  pageNum = 1,
  pageRendering = false,
  pageNumPending = null,
  scale = 0.8,
  canvas = document.getElementById('the-canvas'),
  ctx = canvas.getContext('2d');

function renderPage(num) {
  pageRendering = true;
  // Using promise to fetch the page
  pdfDoc.getPage(num).then(function(page) {
    var viewport = page.getViewport(scale);
    canvas.height = viewport.height;
    canvas.width = viewport.width;

    // Render PDF page into canvas context
    var renderContext = {
      canvasContext: ctx,
      viewport: viewport
    };
    var renderTask = page.render(renderContext);

    // Wait for rendering to finish
    renderTask.promise.then(function() {
      pageRendering = false;
      if (pageNumPending !== null) {
        // New page rendering is pending
        renderPage(pageNumPending);
        pageNumPending = null;
      }
    });
  });
  document.getElementById('page_num').textContent = num;
}

function queueRenderPage(num) {
  if (pageRendering) {
    pageNumPending = num;
  } else {
    renderPage(num);
  }
}

function onPrevPage() {
  if (pageNum <= 1) {
    return;
  }
  pageNum--;
  queueRenderPage(pageNum);
}
document.getElementById('prev').addEventListener('click', onPrevPage);

function onNextPage() {
  if (pageNum >= pdfDoc.numPages) {
    return;
  }
  pageNum++;
  queueRenderPage(pageNum);
}
document.getElementById('next').addEventListener('click', onNextPage);

function SubirArchivo(id, callback){
       var preview = document.getElementById(id); 
       var file    = document.getElementById(id).files[0]; //sames as here
       var reader  = new FileReader();

       reader.onloadend = function () {
           preview.src = reader.result;
            var formData = new FormData();
            formData.append('image', $('#'+id)[0].files[0]); 
            formData.append('NombreFoto', file.name);//(new Date()).getTime()
            formData.append('NombreFolder', 'projects');
          /*  $.ajax({
                url: "Upload.php",
                type: 'POST',
                data: formData,
                async: false,
                success: callback,
                cache: false,
                contentType: false,
                processData: false
            });*/
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "Upload.php", true);
            xhr.upload.onprogress = function (evt) {
              if (evt.lengthComputable) {
                  var percentLoaded = Math.round((evt.loaded / evt.total) * 100);
                  // Increase the progress bar length.
                  if (percentLoaded < 100) {
                    $('#myProgress').show();
                    $('#btnEnviar').hide();
                    $('#myBar').css('width',percentLoaded+"%");
                  }
              }
            };
            xhr.upload.onloadstart = function (e) {
                    $('#btnEnviar').hide();
                    $('#myProgress').show();
                    Tostar("Subiendo Imagen.");
            };
            xhr.upload.onloadend = function (e) {
                    $('#myProgress').hide(); 
                    $('#btnEnviar').show();
                    Tostar("Imagen en servidor.");
            };
            xhr.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  callback(this.responseText);
              }
            };
            xhr.send(formData);
       };

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "";
       }
  }