function validarYPrevisualizar(inputSelector, previsualizarSelector) {
    $(document).on('change', inputSelector, function () {
        let imagen = this.files[0]; // Obtener el archivo del input específico

        if (!imagen) return; // Si no hay archivo seleccionado, salir.

        // Validación del tipo de archivo
        if (imagen['type'] !== 'image/jpeg' && imagen['type'] !== 'image/png') {
            $(this).val(''); // Limpiar solo el input que disparó el evento

            swal({
                title: "Error al subir la imagen",
                text: "La imagen debe estar en formato JPEG o PNG.",
                type: "error",
                confirmButtonText: "Cerrar"
            });
            return;
        }

        // Validación del tamaño de archivo
        if (imagen['size'] > 2000000) { // 2 MB
            $(this).val(''); // Limpiar solo el input que disparó el evento

            swal({
                title: "Error al subir la imagen",
                text: "La imagen no debe pesar más de 2MB.",
                type: "error",
                confirmButtonText: "Cerrar"
            });
            return;
        }

        // Previsualización de la imagen
        let datosImagen = new FileReader();
        datosImagen.readAsDataURL(imagen);

        datosImagen.onload = function (event) {
            let rutaImagen = event.target.result;
            // Seleccionar la previsualización específica relacionada con el input
            $(previsualizarSelector).attr('src', rutaImagen);
        };
    });
}

// Llamadas para cada input y previsualización correspondiente
validarYPrevisualizar('.logoCarrusel', '.previsualizarCarrusel');


/**
 * JQUERY Y AJAX EDITAR VALORES
 */

$(document).on("click", ".btnEditarCarrusel", function (){
    let idCarrusel = $(this).attr("idCarrusel");
    // console.log(idPie);
    let datos = new FormData();
    datos.append("idCarrusel", idCarrusel);

    $.ajax({
        url: "ajax/carrusel.ajax.php",
        method: "post",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function(respuesta){
            // console.log(respuesta);
            $("#fotoActual").val(respuesta["imagen"]);
            $(".previsualizarCarrusel").attr("src", respuesta["imagen"]);
            $("#fotoActual").val(respuesta["imagen"]);

            $("#Editartitulo").val(respuesta["titulo"]);
            $("#Editarsubtitulo").val(respuesta['subtitulo']);

            $("#editarId").val(respuesta['id']);

        }
    })
})


/*=============================================
ELIMINAR CARRUSEL
=============================================*/
$(document).on("click", ".btnEliminarCarrusel", function() {
    let idCarrusel = $(this).attr("idCarrusel");
    let imagenCarrusel = $(this).attr("imagenCarrusel");

    swal({
        title: '¿Está seguro de borrar el usuario?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar usuario!'
    }).then(function(result) {
        if(result.value) {
            window.location = "?idCarrusel=" +idCarrusel+ "&imagenCarrusel=" +imagenCarrusel;
        }
    });
});