/* VALIDAR CONTRASEÑAS */
$('#pass').keyup(function (e) {
    var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
    var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
    var enoughRegex = new RegExp("(?=.{6,}).*", "g");
    if (false == enoughRegex.test($(this).val())) {
        $('#passstrength').html('Más caracteres.');
    } else if (strongRegex.test($(this).val())) {
        $('#passstrength').className = 'ok';
        $('#passstrength').html('Fuerte!');
    } else if (mediumRegex.test($(this).val())) {
        $('#passstrength').className = 'alert';
        $('#passstrength').html('Media!');
    } else {
        $('#passstrength').className = 'error';
        $('#passstrength').html('Débil!');
    }
    return true;
});


/* EDITOR DE TEXTO */
$('#summernote').summernote({
    placeholder: 'Esta es una descripción genérica, si lo necesita la puede cambiar.',
    tabsize: 2,
    height: 100
});


/* HABILITAR O DESHABILITAR CLAVE */
// Le doy a la variable el valor del checkbox
var determine = document.getElementById("proteger");
// Según el valor del checkbox me va a habilitar o deshabilitar el input para poner la clave
var disableCheckboxConditioned = function () {
    if (determine.checked) {
        document.getElementById("pass").disabled = false;
    } else {
        document.getElementById("pass").disabled = true;
    }
}
// Activar la funcion con un click
determine.onclick = disableCheckboxConditioned;
disableCheckboxConditioned();


/* NOMBRE Y TIPO DE ARCHIVO */
function myFunction() {
    var x = document.getElementById("customFileLang");
    //Colocamos el nombre del archivo
    document.getElementById("nombre").value = x.files[0].name;

    //Seleccionamos el tipo de archivo
    var nombreArchivo = x.files[0].name;
    //alert(nombreArchivo);
    var extension = getFileExtension(nombreArchivo);
    //alert(extension);
    checkTipoArchivo(extension);
}

/* OBTENEMOS TIPO ARCHIVO */
function getFileExtension(filename) {
    var ext = filename.split('.').pop();
    return ext;
}

/* ACTIVAMOS EL TIPO DE ARCHIVO */
function checkTipoArchivo(extension) {
    if (extension == "jpg" || extension == "png" || extension == "gif" || extension == "jpeg") {
        $("#tipo1").prop("checked", true);
        $("#tipo2").prop("checked", false);
        $("#tipo3").prop("checked", false);
        $("#tipo4").prop("checked", false);
        $("#tipo5").prop("checked", false);
    } else if (extension == "zip") {
        $("#tipo1").prop("checked", false);
        $("#tipo2").prop("checked", true);
        $("#tipo3").prop("checked", false);
        $("#tipo4").prop("checked", false);
        $("#tipo5").prop("checked", false);
    } else if (extension == "docx" || extension == "doc") {
        $("#tipo1").prop("checked", false);
        $("#tipo2").prop("checked", false);
        $("#tipo3").prop("checked", true);
        $("#tipo4").prop("checked", false);
        $("#tipo5").prop("checked", false);
    } else if (extension == "pdf") {
        $("#tipo1").prop("checked", false);
        $("#tipo2").prop("checked", false);
        $("#tipo3").prop("checked", false);
        $("#tipo4").prop("checked", true);
        $("#tipo5").prop("checked", false);
    } else if (extension == "xls" || extension == "xlsx") {
        $("#tipo1").prop("checked", false);
        $("#tipo2").prop("checked", false);
        $("#tipo3").prop("checked", false);
        $("#tipo4").prop("checked", false);
        $("#tipo5").prop("checked", true);
    }
}


/* GENERAR HASH */
function generarHash() {
    var nombre = document.getElementById("customFileLang");
    var nombreArchivo = nombre.files[0].name;
    var dias = document.getElementById("dias").value;
    var descargas = document.getElementById("descargas").value;

    if (dias == 0 && descargas == 0) {
        var hash = "9007199254740991";
    } else {
        var cadena = "";
        cadena += dias + descargas + nombreArchivo;
        var hash = md5(cadena);
    }

    document.getElementById("link").value = hash;
}


/*
//Validator bootstrap
(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Obtener todos los formularios a los que queremos aplicar estilos de validación personalizados de Bootstrap
      var forms = document.getElementsByClassName('needs-validation');
      // No dejamos envíar si todos los campos no son validos
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();*/