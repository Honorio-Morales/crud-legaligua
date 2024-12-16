document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, {});
});

// Conversión a mayúsculas
function may(obj, id) {
    obj = obj.toUpperCase();
    document.getElementById(id).value = obj;
}

// Validación del nick de usuario
$('#nick').change(function() {
    $.ajax({
        url: 'ajax_validacion_nick.php',
        method: 'POST',
        data: { nick: $('#nick').val() },
        beforeSend: function() {
            $('.validacion').html("Espere un momento por favor...");
        },
        success: function(respuesta) {
            $('.validacion').html(respuesta);
        },
        error: function() {
            $('.validacion').html("Ocurrió un error en la validación.");
        }
    });
});

// Verificación del producto de la tabla
$('#producto').change(function() {
    $.ajax({
        url: 'ajax_validacion_producto.php',
        method: 'POST',
        data: { producto: $('#producto').val() },
        beforeSend: function() {
            $('.verificar').html("Espere un momento por favor...");
        },
        success: function(respuesta) {
            $('.verificar').html(respuesta);
        },
        error: function() {
            $('.verificar').html("Ocurrió un error en la validación.");
        }
    });
});

// Búsqueda en la tabla
$('#buscar').keyup(function(event) {
    var contenido = new RegExp($(this).val(), 'i');
    $('tr').hide();
    $('tr').filter(function() {
        return contenido.test($(this).text());
    }).show();
});
