/****************** *PDF* ****************************/
function Mostrar(url) {
var extension = url.split('.').pop(); 
  if(extension == 'pdf'){
	var loadingTask = pdfjsLib.getDocument(url);
	loadingTask.promise.then(function(pdfDoc_) {
    pdfDoc = pdfDoc_;
    document.getElementById('page_count').textContent = pdfDoc.numPages;
    renderPage(pageNum);
  });
}

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

  pdfDoc.getPage(num).then(function(page) {
    console.log('Page loaded');
    
    var scale = 1.5;
    var viewport = page.getViewport({scale: scale});

    // Prepare canvas using PDF page dimensions
    var canvas = document.getElementById('the-canvas');
    var context = canvas.getContext('2d');
    canvas.height = viewport.height;
    canvas.width = viewport.width;

    // Render PDF page into canvas context
    var renderContext = {
      canvasContext: context,
      viewport: viewport
    };
    var renderTask = page.render(renderContext);
    renderTask.promise.then(function () {
      console.log('Page rendered');
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


function SubirArchivo(id, callback) {
  var file = document.getElementById(id).files[0];
  SubirArchivo_FILE(file,callback);
}
function SubirArchivo_FILE(file, callback) {
  var reader = new FileReader();

  reader.onloadend = function() {
    var formData = new FormData();
    var NombreArchivo =file.name==null?'javascriptCuadrado.'+file.type.split('/')[1]:file.name;
    console.log("NombreArchivo", NombreArchivo);
    formData.append('NombreArchivo', NombreArchivo); 
     formData.append('Archivo', file);
    console.log("file", file);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/archivos.ajax.php", true);
    xhr.upload.onprogress = function(evt) {
      if (evt.lengthComputable) {
        var percentLoaded = Math.round((evt.loaded / evt.total) * 100);
        if (percentLoaded < 100) {
          BarraCargando(percentLoaded);
          //console.log("percentLoaded", percentLoaded);
        }
      }
    };
    xhr.upload.onloadstart = function(e) {
      console.log("Subiendo Imagen.");
    };
    xhr.upload.onloadend = function(e) {
      console.log("Imagen en servidor.");
    };
    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        callback(this.responseText);
        BarraCargando();
      }
    };
    xhr.send(formData);
  };

  if (file) {
    reader.readAsDataURL(file); //reads the data as a URL
  } 
}