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
validarYPrevisualizar('.portada', '.previsualizarPortada');
validarYPrevisualizar('.horizontal', '.previsualizarHorizontal');

/**
 * JQUERY Y AJAX EDITAR VALORES
 */

$(document).on("click", ".btnEditarNoticias", function (){
    let idNoticias = $(this).attr("idNoticias");
    // console.log(idPie);
    let datos = new FormData();
    datos.append("idNoticias", idNoticias);

    $.ajax({
        url: "ajax/noticias.ajax.php",
        method: "post",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function(respuesta){
            // console.log(respuesta);
            $("#portadaActual").val(respuesta["imagen_portada"]);
            $(".previsualizarPortada").attr("src", respuesta["imagen_portada"]);
            $("#portadaActual").val(respuesta["imagen_portada"]);

            $("#horizontalActual").val(respuesta["imagen_horizontal"]);
            $(".previsualizarHorizontal").attr("src", respuesta["imagen_horizontal"]);
            $("#horizontalActual").val(respuesta["imagen_horizontal"]);

            $("#Editartitulo").val(respuesta["titulo"]);
            $("#Editarnoticia").val(respuesta['nombre_noticia']);
            $("#EditarnotaCorta").val(respuesta['nota_corta']);
            $("#Editarp1").val(respuesta['p1']);
            $("#Editarp2").val(respuesta['p2']);
            $("#Editarp3").val(respuesta['p3']);
            $("#Editarp4").val(respuesta['p4']);
            $("#Editarp5").val(respuesta['p5']);
            $("#Editarp6").val(respuesta['p6']);
            $("#Editarautor").val(respuesta['autor']);
            $("#Editarfecha").val(respuesta['fecha']);

            $("#editarId").val(respuesta['id']);

        }
    })
})

/*=============================================
ELIMINAR NOTICIA
=============================================*/
$(document).on("click", ".btnEliminarNoticia", function() {
    let idNoticia = $(this).attr("idNoticia");
    let imagenPortada = $(this).attr("imagenPortada");
    let imagenHorizontal = $(this).attr("imagenHorizontal");

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
            window.location = "?idNoticia=" +idNoticia+ "&imagenPortada=" +imagenPortada + "&imagenHorizontal=" + imagenHorizontal;
        }
    });
});